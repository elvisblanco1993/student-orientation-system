<?php

namespace App\Http\Livewire\Section;

use Livewire\Component;

class Edit extends Component
{
    public $section, $title, $content, $url, $file;

    public function save()
    {
        $this->section->update([
            'title' => $this->title,
            'content' => $this->content,
            'url' => $this->url,
            'file' => $this->file,
        ]);

        session()->flash('flash.banner', 'Changes saved!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('orientation.show', ['orientation' => $this->section->orientation_id]);
    }

    public function render()
    {
        $this->title = $this->section->title;
        $this->content = $this->section->content;
        $this->url = $this->section->url;
        $this->file = $this->section->file;

        return view('livewire.section.edit');
    }
}
