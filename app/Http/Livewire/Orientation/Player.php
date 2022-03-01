<?php

namespace App\Http\Livewire\Orientation;

use App\Models\Question;
use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Player extends Component
{
    public $orientation;

    public function next($section)
    {
        // Check if section with ID $section exists for the current orientation
        if ( ! is_null( $this->orientation->sections->where('position', $section + 1)->first() ) ) {
            // Update progress with new $section progress number
            DB::table('student_progress')
            ->where('student_id', auth()->user()->id)
            ->where('orientation_id', $this->orientation->id)
            ->update([
                'section_id' => $section + 1
            ]);
        }

        // If there is no next section
        if ($this->orientation->sections->where('position', $section + 1)->count() == 0) {
            DB::table('student_progress')
            ->where('student_id', auth()->user()->id)
            ->where('orientation_id', $this->orientation->id)
            ->update([
                'section_id' => $section,
                'completed_at' => \Carbon\Carbon::now()
            ]);
            return redirect()->route('orientation.finish', ['orientation' => $this->orientation->id]);
        }
    }

    public function prev($section)
    {
        if ( ! is_null( $this->orientation->sections->where('position', $section - 1)->first() ) ) {
            // Update progress with new $section progress number
            DB::table('student_progress')
                ->where('student_id', auth()->user()->id)
                ->where('orientation_id', $this->orientation->id)
                ->update([
                    'section_id' => $section - 1
                ]);
        }
    }

    public function render()
    {

        $progress = auth()->user()->progress($this->orientation->id);


        if (!isset($progress)) {
            DB::table('student_progress')
            ->insert([
                'student_id' => auth()->user()->id,
                'orientation_id' => $this->orientation->id,
                'section_id' => '1'
            ]);
            $progress = auth()->user()->progress($this->orientation->id);
        }

        if ($this->orientation->sections->count() > 0) {
            $section = $this->orientation->sections->where('position', $progress->section_id)->first() ?? $this->orientation->sections->where('position', '1')->first();
        } else {
            return view('livewire.orientation.not-ready');
        }

        $this->sections = $this->orientation->sections()->orderBy('position', 'asc')->get();

        return view('livewire.orientation.player', [
            'section' => $section,
        ]);
    }
}
