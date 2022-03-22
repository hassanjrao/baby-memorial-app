<?php

namespace App\Http\Livewire\Admin\Babies;

use App\Models\Baby;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBaby extends Component
{

    use WithFileUploads;

    public $image;
    public $oldimage;
    public $firstName;
    public $middleName;
    public $lastName;
    public $gender;
    public $twinMultiple;
    public $birthDate;
    public $deathDate;
    public $story;
    public $inTshirts;
    public $approved=false;


    protected $rules = [
        "image" => "nullable|image|mimes:jpg,png,jpeg,gif,svg",
        "firstName" => "required|string|max:255",
        "middleName" => "nullable|string|max:255",
        "lastName" => "nullable|string|max:255",
        "gender" => "required",
        "twinMultiple" => "required",
        "birthDate" => "required|date",
        "deathDate" => "required|date",
        "story" => "required|string|min:5",
        "approved"=>"nullable|boolean",

    ];


    public function addRequest()
    {

        $this->validate();


        $baby = Baby::create([
            "user_id" => auth()->user()->id,
            "approved" => $this->approved,
            "first_name" => $this->firstName,
            "middle_name" => $this->middleName,
            "last_name" => $this->lastName,
            "gender" => $this->gender,
            "twin_multiple" => $this->twinMultiple,
            "birth_date" => $this->birthDate,
            "death_date" => $this->deathDate,
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
        $this->emit('reinit');
    }


    public function render()
    {
        return view('livewire.admin.babies.create-baby');
    }
}
