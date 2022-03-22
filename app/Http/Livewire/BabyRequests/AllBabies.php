<?php

namespace App\Http\Livewire\BabyRequests;

use App\Models\Baby;
use Livewire\Component;
use Livewire\WithPagination;

class AllBabies extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        $babies=Baby::latest()->where("approved",1)->paginate(9);
        return view('livewire.baby-requests.all-babies',compact('babies'));
    }
}
