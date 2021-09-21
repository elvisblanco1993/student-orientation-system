<?php

namespace App\Http\Livewire\Orientation;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Stats extends Component
{
    use WithPagination;
    public $orientation;
    public $total_participants;
    public $total_completed;
    public function render()
    {
        $this->total_participants = DB::table('student_progress')->where('orientation_id', $this->orientation->id)->count() ?? 0;
        $this->total_completed = DB::table('student_progress')->where('orientation_id', $this->orientation->id)->whereNotNull('completed_at')->count() ?? 0;
        return view('livewire.orientation.stats', [
            'participants' => \App\Models\Orientation::find($this->orientation->id)->students()->paginate(10)
        ]);
    }
}
