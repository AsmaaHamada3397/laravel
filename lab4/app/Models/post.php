<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

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

    use SoftDeletes;

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
