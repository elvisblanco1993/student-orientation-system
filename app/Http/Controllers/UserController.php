<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Orientation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function register($token, $orientation)
    {
        $email = DB::table('user_invitations')
                    ->where('token', $token)
                    ->first()->email;

        return view('auth.invitation.register', ['email' => $email, 'orientation' => $orientation]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role' => 'attendee',
            ]);

        // Enroll in orientation
        $orientation = Orientation::findOrFail($input['orientation']);
        $orientation->students()->attach($user->id);

        DB::table('user_invitations')->where('email', $user->email)->delete();

        Auth::loginUsingId($user->id);

        return redirect()->route('dashboard');
    }
}
