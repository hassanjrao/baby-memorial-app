<?php

namespace App\Http\Livewire\BabyRequests;

use App\Models\Baby;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBabyRequest extends Component
{
    use WithFileUploads;

    public $image;
    public $firstName;
    public $middleName;
    public $lastName;
    public $gender;
    public $twinMultiple;
    public $birthDate;
    public $deathDate;
    public $story;
    public $inTshirts;


    protected $rules = [
        "image" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
        "firstName" => "required|string|max:255",
        "middleName" => "nullable|string|max:255",
        "lastName" => "nullable|string|max:255",
        "gender" => "required",
        "twinMultiple" => "required",
        "birthDate" => "required|date",
        "deathDate" => "required|date",
        "story" => "required|string|min:5",
    ];


    public function submitRequest()
    {

        $this->validate();


        $baby = Baby::create([
            "user_id" => auth()->user()->id,
            "first_name" => $this->firstName,
            "middle_name" => $this->middleName,
            "last_name" => $this->lastName,
            "gender" => $this->gender,
            "twin_multiple" => $this->twinMultiple,
            "birthDate" => $this->birthDate,
            "deathDate" => $this->deathDate,
            "story" => $this->story,
            "in_tshirts" => $this->inTshirts,
        ]);

        if ($this->image) {
            $file = $this->image->store("public/babies");

            $baby->update([
                "image" => basename($file)
            ]);
        }

        $this->dispatchBrowserEvent("show-status", ["msg" => "Your request has been submitted successfully", "type" => "success"]);

        $this->reset();
    }


    public function render()
    {
        return view('livewire.baby-requests.create-baby-request');
    }
}
