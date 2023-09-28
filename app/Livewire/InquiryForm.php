<?php

namespace App\Livewire;

use App\Models\Inquiry;
use Livewire\Component;

class InquiryForm extends Component
{
    public $name;
    public $email;
    public $message;
    public $response = null;

    public function render()
    {
        return view('livewire.inquiry-form');
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $inquiry = new Inquiry();
        $inquiry->name = $this->name;
        $inquiry->email = $this->email;
        $inquiry->message = $this->message;

        if ($inquiry->save()) {
            $this->response = true;
        } else {
            $this->response = false;
        }
    }

}
