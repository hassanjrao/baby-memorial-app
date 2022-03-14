<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    use HasFactory;

    protected $guarded=[];

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
        return substr($this->story, 0, 200) . "...";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
