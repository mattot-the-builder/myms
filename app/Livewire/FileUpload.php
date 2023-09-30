<?php

namespace App\Livewire;

use App\Models\Career;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $name = '';
    public $email = '';
    public $contact = '';
    public $position_to_apply = '';
    public $resume;
    public $upload_status;

    public function render()
    {
        return view('livewire.file-upload');
    }

    public function upload(Career $career)
    {

    }

    public function store()
    {
        $career = new Career();
        $this->upload_status = '<p class="text-yellow-500">uploading...</p>';
        $career->addMedia($this->resume)->toMediaCollection('resume');
        $this->upload_status = '<p class="text-green-500">Uploaded</p>';
        $this->upload($career);
        $career->name = $this->name;
        $career->email = $this->email;
        $career->contact = $this->contact;
        $career->resume = 'bla blabla ';
        $career->position_to_apply = $this->position_to_apply;
        $career->save();
    }

}
