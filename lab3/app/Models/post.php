<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class post extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "image",
        "description",
        "postedBy",
        "user_id"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getHumanReadableDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('F j, Y, g:i a');
    }

}
