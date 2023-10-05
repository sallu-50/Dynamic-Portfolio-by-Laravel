<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Information extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function url()
    {
        return Storage::url($this->image_path);
    }
    public function link()
    {
        return route('home', $this);
    }
}
