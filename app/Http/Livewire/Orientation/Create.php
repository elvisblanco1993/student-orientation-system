<?php

namespace App\Http\Livewire\Orientation;

use App\Models\Orientation;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $name, $description, $banner;

    public function create()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'banner' => 'required|file|image'
        ]);

        $this->banner->storeAs('public/banners/', $this->banner->getFileName());

        try {
            Orientation::create([
                'team_id' => auth()->user()->currentTeam->id,
                'name' => $this->name,
                'description' => $this->description,
                'banner' => $this->banner->getFileName()
            ]);

            session()->flash('flash.banner', 'Orientation created!');
            session()->flash('flash.bannerStyle', 'success');

        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops! We encountered an error while creating the orientation.');
            session()->flash('flash.bannerStyle', 'error');
        }

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.orientation.create');
    }
}
