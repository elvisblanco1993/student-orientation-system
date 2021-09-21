<?php

namespace App\Http\Livewire\Section;

use App\Models\Section;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $section_options = false;
    public $videoSectionModal, $imageSectionModal, $fileSectionModal, $websiteSectionModal, $textSectionModal;
    public $orientation, $position, $type, $title, $content, $url, $file;

    /**
     * Create Video Section
     */
    public function addVideoSection()
    {
        $this->validate([
            'url' => 'required|url',
            'title' => 'required'
        ]);

        try {
            Section::create([
                'orientation_id' => $this->orientation->id,
                'title' => $this->title,
                'content' => $this->content ?? null,
                'url' => $this->url,
                'type' => 'video'
            ]);

            session()->flash('flash.banner', 'Section added!');
            session()->flash('flash.bannerStyle', 'success');

        } catch (\Throwable $th) {
            session()->flash('flash.banner', 'Whoops! We ran into an error and notified our experts. Please try again later.');
            session()->flash('flash.bannerStyle', 'error');
            Log::error($th);
        }

        return redirect()->route('orientation.show', ['orientation' => $this->orientation->id]);
    }

    /**
     * Create Image Section
     */
    public function addImageSection()
    {
        $this->validate([
            'file' => 'file|image|max:2048',
            'title' => 'required'
        ]);

        try {

            $this->file->storeAs('public/sections/', $this->file->getFileName());
            Section::create([
                'orientation_id' => $this->orientation->id,
                'title' => $this->title,
                'file' => $this->file->getFileName(),
                'type' => 'image'
            ]);
            session()->flash('flash.banner', 'Section added!');
            session()->flash('flash.bannerStyle', 'success');

        } catch (\Throwable $th) {
            session()->flash('flash.banner', 'Whoops! We ran into an error and notified our experts. Please try again later.');
            session()->flash('flash.bannerStyle', 'error');
            Log::error($th);
        }

        return redirect()->route('orientation.show', ['orientation' => $this->orientation->id]);
    }

    /**
     * Create File Section
     */
    public function addFileSection()
    {
        $this->validate([
            'file' => 'file|mimes:pdf',
            'title' => 'required'
        ]);

        try {

            $this->file->storeAs('public/sections/pdf/', $this->file->getFileName());
            Section::create([
                'orientation_id' => $this->orientation->id,
                'title' => $this->title,
                'file' => $this->file->getFileName(),
                'type' => 'file'
            ]);
            session()->flash('flash.banner', 'Section added!');
            session()->flash('flash.bannerStyle', 'success');

        } catch (\Throwable $th) {
            session()->flash('flash.banner', 'Whoops! We ran into an error and notified our experts. Please try again later.');
            session()->flash('flash.bannerStyle', 'error');
            Log::error($th);
        }

        return redirect()->route('orientation.show', ['orientation' => $this->orientation->id]);
    }

    /**
     * Create Embedded Website Section
     */
    public function addWebsiteSection()
    {
        $this->validate([
            'url' => 'required|url|active_url'
        ]);

        try {
            Section::create([
                'orientation_id' => $this->orientation->id,
                'title' => $this->url,
                'url' => $this->url,
                'type' => 'website'
            ]);
            session()->flash('flash.banner', 'Section added!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            session()->flash('flash.banner', 'Whoops! We ran into an error and notified our experts. Please try again later.');
            session()->flash('flash.bannerStyle', 'error');
            Log::error($th);
        }

        return redirect()->route('orientation.show', ['orientation' => $this->orientation->id]);
    }

    /**
     * Create Text Section (Supports Markdown)
     */
    public function addTextSection()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        try {
            Section::create([
                'orientation_id' => $this->orientation->id,
                'title' => $this->title,
                'content' => $this->content ?? null,
                'type' => 'text'
            ]);

            session()->flash('flash.banner', 'Section added!');
            session()->flash('flash.bannerStyle', 'success');

        } catch (\Throwable $th) {
            session()->flash('flash.banner', 'Whoops! We ran into an error and notified our experts. Please try again later.');
            session()->flash('flash.bannerStyle', 'error');
            Log::error($th);
        }

        return redirect()->route('orientation.show', ['orientation' => $this->orientation->id]);
    }

    public function render()
    {
        return view('livewire.section.create');
    }
}
