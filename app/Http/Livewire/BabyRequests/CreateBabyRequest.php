<?php

namespace App\Http\Livewire\BabyRequests;

use App\Models\Baby;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class CreateBabyRequest extends Component
{
    use WithFileUploads;

    public $image;
    public $firstName;
    public $middleName;
    public $lastName;
    public $email;
    public $relationship;
    public $gender;
    public $twinMultiple;
    public $birthDate;
    public $note;
    public $deathDate;
    public $story;
    public $inTshirts;


    protected $rules = [
        "image" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
        "firstName" => "required|string|max:255",
        "middleName" => "nullable|string|max:255",
        "lastName" => "nullable|string|max:255",
        "email" => "nullable|string|max:255",
        "relationship" => "nullable|string|max:255",
        "gender" => "required",
        "twinMultiple" => "nullable",
        "note" => "nullable",
        "birthDate" => "required",
        "deathDate" => "required",
        "story" => "nullable|string|min:5",
    ];


    public function submitRequest()
    {

        $this->validate();

        $status = 0;
        if(Auth::user()->getRoleNames()[0] == "admin"){
            $status = 1;
        }

        $baby = Baby::create([
            "user_id" => auth()->user()->id,
            "user_name" => auth()->user()->name,
            "note" => $this->note,
            "first_name" => $this->firstName,
            "middle_name" => $this->middleName,
            "last_name" => $this->lastName,
            "email" => $this->email,
            "relationship" => $this->relationship,
            "gender" => $this->gender,
            "twin_multiple" => $this->twinMultiple,
            "birth_date" => $this->birthDate,
            "death_date" => $this->deathDate,
            "story" => $this->story,
            "in_tshirts" => $this->inTshirts,
            "approved" => $status,
        ]);

        if ($this->image) {
            $file = $this->image->store("public/babies");

            $baby->update([
                "image" => basename($file)
            ]);
        }

        $this->dispatchBrowserEvent("show-status", ["msg" => "Your request has been submitted successfully", "type" => "success"]);

        $this->reset();
        $this->emit('reinit');
    }


    public function render()
    {
        return view('livewire.baby-requests.create-baby-request');
    }
}
