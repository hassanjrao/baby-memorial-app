<?php

namespace App\Http\Livewire\Admin\Babies;

use App\Models\Baby;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBaby extends Component
{
    use WithFileUploads;

    public Baby $baby;

    public $image;
    public $oldimage;

    public $story;

    public $content="asdasda";


    protected $rules = [
        "baby.first_name" => "required|string|max:255",
        "baby.middle_name" => "nullable|string|max:255",
        "baby.last_name" => "nullable|string|max:255",
        "baby.gender" => "required",
        "baby.twin_multiple" => "required",
        "baby.birth_date" => "required|date",
        "baby.death_date" => "required|date",
        "baby.story" => "required|string|min:5",
        "baby.in_tshirts" => "nullable|boolean",
        "baby.approved" => "nullable|boolean",
        "image" => "nullable|image|mimes:jpg,png,jpeg,gif,svg",

    ];

    public function mount()
    {
        $this->story= $this->baby->story;
        $this->oldimage= $this->baby->image;

        // session()->put('_old_input', ["asdasd"=>"asdasd"]);
        session(['_old_input.key' => 'hassan']);
        // old("asjkdasdasd");
    }


    public function export()
    {
        return Storage::download('public/babies/'.$this->baby->image);
    }

    public function updateRequest()
    {

        $this->validate();




        $this->baby->save();

        if ($this->image) {
            $file = $this->image->store("public/babies");

            $this->baby->update([
                "image" => basename($file)
            ]);
        }


        $this->dispatchBrowserEvent("show-status", ["msg" => "Your request has been submitted successfully", "type" => "success"]);

    }

    public function render()
    {
        return view('livewire.admin.babies.edit-baby');
    }
}
