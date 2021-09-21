<?php

namespace App\Http\Livewire\Orientation;

use App\Mail\InviteUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Participants extends Component
{
    public $participants, $invitations, $invite, $search, $orientation, $email;

    public function attach()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        // Check if the user already exists
        if ( User::where('email', $this->email)->count() == 1 ) {
            try {
                $this->orientation->students()->attach(
                    User::where('email', $this->email)->first()->id
                );
                session()->flash('flash.banner', 'Invitation sent!');
                session()->flash('flash.bannerStyle', 'success');
            } catch (\Throwable $th) {
                Log::error($th);
                session()->flash('flash.banner', $th);
                session()->flash('flash.bannerStyle', 'error');
            }
        } else {
            try {
                $token = Str::uuid();

                DB::table('user_invitations')
                ->insert([
                    'email' => $this->email,
                    'token' => $token,
                ]);
                Mail::to($this->email)->send(new InviteUser($token, $this->orientation->id));
                session()->flash('flash.banner', 'Invitation sent!');
                session()->flash('flash.bannerStyle', 'success');

            } catch (\Throwable $th) {
                Log::error($th);
                session()->flash('flash.banner', $th);
                session()->flash('flash.bannerStyle', 'error');
            }
        }
        // Send invitation to create account
        return redirect()->route('orientation.participants', ['orientation' => $this->orientation->id]);
    }

    public function notify($email)
    {
        $token = DB::table('user_invitations')->where('email', $email)->first()->token;
        Mail::to($email)->send(new InviteUser($token, $this->orientation->id));
        session()->flash('flash.banner', 'Invitation sent!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('orientation.participants', ['orientation' => $this->orientation->id]);
    }

    public function detach($id)
    {
        $this->orientation->students()->detach($id);
    }

    public function cancelInvite($id)
    {
        DB::table('user_invitations')->where('id',$id)->delete();
    }

    public function render()
    {
        $this->participants = $this->orientation->students()->where('name', 'like', '%'.$this->search.'%')->get();
        $this->invitations = DB::table('user_invitations')->where('email', 'like', '%'.$this->search.'%')->get();
        return view('livewire.orientation.participants');
    }
}
