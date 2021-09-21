<?php

namespace App\Http\Controllers;

use App\Models\Orientation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrientationController extends Controller
{
    // Display all orientations
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $orientations = auth()->user()->currentTeam->orientations;
        } else {
            $orientations = auth()->user()->orientations;
        }

        return view('orientations.index', [
            'orientations' => $orientations
        ]);
    }

    // Show Orientation
    public function show(Orientation $orientation)
    {
        if (auth()->user()->role == 'admin') {
            return view('orientations.show', [
                'orientation' => $orientation,
            ]);
        }

        // Check if the student finished the orientation
        $status = DB::table('student_progress')->where('student_id', auth()->user()->id)->where('orientation_id', $orientation->id)->first();

        if (!isset($status->completed_at)) {
            return view('orientations.player', [
                'orientation' => $orientation,
            ]);
        } else {
            return redirect()->route('orientation.finish', ['orientation' => $orientation]);
        }
    }

    // Create Orientation
    public function create()
    {
        return view('orientations.create');
    }

    // Saves orientation sections position and redirects to Dashboard
    public function close(Orientation $orientation)
    {
        // Check if the sections already have a position designated
        if ($orientation->sections->count() > 0 && is_null($orientation->sections->first()->position)) {
            foreach ($orientation->sections as $section) {
                $section->update([
                    $section->position = $section->id
                ]);
            }
        }

        // Redirect back to dashboard
        return redirect()->to('/dashboard');
    }

    // Shows the student the orientation has been completed
    public function finish(Orientation $orientation)
    {
        return view('orientations.finish', [
            'orientation' => $orientation,
        ]);
    }

    public function certificate(User $user, Orientation $orientation)
    {
        $recordOfCompletion = DB::table('student_progress')->where('student_id', $user->id)->where('orientation_id', $orientation->id)->whereNotNull('completed_at')->first();
        return view('orientations.certificate', [
            'name' => $user->name,
            'orientation' => $orientation->name,
            'completed' => $recordOfCompletion->completed_at
        ]);
    }

    /**
     * Show orientation participants list
     */
    public function participants (Orientation $orientation)
    {
        return view('orientations.participants.index', [
            'orientation' => $orientation,
            'participants' => $orientation->participants,
        ]);
    }

    /**
     * Show orientation statistics
     */
    public function stats (Orientation $orientation)
    {
        return view('orientations.stats', [
            'orientation' => $orientation,
        ]);
    }

    /**
     * Show orientation statistics
     */
    public function edit (Orientation $orientation)
    {
        return view('orientations.settings', [
            'orientation' => $orientation,
        ]);
    }
}
