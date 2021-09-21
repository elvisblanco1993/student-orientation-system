<?php

namespace App\Http\Livewire\Orientation;
use Livewire\WithFileUploads;

use Livewire\Component;

class Edit extends Component
{
    use WithFileUploads;

    public $orientation, $name, $description, $banner, $image, $active;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($this->banner) {
            $this->banner->storeAs('public/banners/', $this->banner->getFileName());
        }

        $active = ($this->active == true) ? true : false;

        try {

            $this->orientation->update([
                'name' => $this->name,
                'description' => $this->description,
                'banner' => ($this->banner) ? $this->banner->getFileName() : $this->orientation->banner,
                'active' => $active,
            ]);

            session()->flash('flash.banner', 'The orientation was successfully updated.');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('orientation.settings', ['orientation' => $this->orientation->id]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        $this->name = $this->orientation->name;
        $this->description = $this->orientation->description;
        $this->active = ($this->orientation->active == true) ? 'on' : null;
        $this->image = $this->orientation->banner;

        return view('livewire.orientation.edit');
    }
}
