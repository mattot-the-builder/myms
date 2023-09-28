<?php

namespace App\Livewire;

use App\Models\Inquiry;
use Livewire\Component;

class InquiryForm extends Component
{
    public $name;
    public $email;
    public $contact;
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
            'contact' => 'required|numeric',
            'message' => 'required'
        ]);

        $inquiry = new Inquiry();
        $inquiry->name = $this->name;
        $inquiry->email = $this->email;
        $inquiry->contact = $this->contact;
        $inquiry->message = $this->message;

        if ($inquiry->save()) {
            $this->response = true;
        } else {
            $this->response = false;
        }
    }

}
