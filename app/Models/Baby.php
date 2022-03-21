<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    use HasFactory;

    protected $guarded=[];

    // protected $dates=["birth_date","death_date"];

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    protected function middleName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
        );
    }

    protected function lastName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
        );
    }

    public function fullName(){
        return $this->first_name . " " . $this->middle_name . " " . $this->last_name;
    }

    public function storyDescription(){
        if(strlen(strip_tags($this->story)) > 100){
            return substr(strip_tags($this->story), 0, 50) . "...";
        }
        else{
            return strip_tags($this->story);
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
