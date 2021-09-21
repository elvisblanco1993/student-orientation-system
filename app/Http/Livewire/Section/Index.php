<?php

namespace App\Http\Livewire\Section;

use App\Models\Section;
use Livewire\Component;

class Index extends Component
{
    public $orientation, $sections;

    public function updateSectionOrder($list)
    {
        foreach($list as $item) {
            Section::find($item['value'])->update(['position' => (string) $item['order']]);
        }
    }

    public function deleteSection($section)
    {
        Section::findOrFail($section)->delete();
    }

    public function render()
    {
        $this->sections = Section::where('orientation_id', $this->orientation->id)->orderBy('position')->get();
        return view('livewire.section.index');
    }
}
