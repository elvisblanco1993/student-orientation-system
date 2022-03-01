<?php

namespace App\Http\Livewire\Section;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $section_options = false;
    public $videoSectionModal, $imageSectionModal, $fileSectionModal, $websiteSectionModal, $textSectionModal, $questionSectionModal;
    public $orientation, $position, $type, $title, $content, $url, $file, $option_1, $option_2, $option_3, $option_4, $correct_answer;

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
                'title' => $this->title,
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

    /**
     * Create question section
     */
    public function addQuestionSection()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'correct_answer' => 'required'
        ]);

        try {

            $section = Section::create([
                'orientation_id' => $this->orientation->id,
                'title' => $this->title,
                'content' => $this->content,
                'type' => 'question',
            ]);

            $question = Question::create([
                'section_id' => $section->id,
                'question' => $section->content,
            ]);

            Answer::create([
                'question_id' => $question->id,
                'content' => $this->option_1,
                'is_correct' => ($this->correct_answer == 'option_1') ? 1 : 0,
            ]);

            Answer::create([
                'question_id' => $question->id,
                'content' => $this->option_2,
                'is_correct' => ($this->correct_answer == 'option_2') ? 1 : 0,
            ]);

            if ($this->option_3) {
                Answer::create([
                    'question_id' => $question->id,
                    'content' => $this->option_3,
                    'is_correct' => ($this->correct_answer == 'option_3') ? 1 : 0,
                ]);
            }

            if ($this->option_4) {
                Answer::create([
                    'question_id' => $question->id,
                    'content' => $this->option_4,
                    'is_correct' => ($this->correct_answer == 'option_4') ? 1 : 0,
                ]);
            }

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
