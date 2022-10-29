<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\video;
use App\Models\Explainer;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image', 
        'price', 
        'Explainer_id',
        'publisher_year',
        'number_of_videos',
        'number_of_hours',
    ];

    public function videos()
    {
        return $this->hasMany(video::class);
    }

    public function Explainer()
    {
        return $this->belongsTo(Explainer::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function rate()
    {
        return $this->ratings->isNotEmpty() ? $this->ratings()->sum('value') / $this->ratings()->count() : 0 ;
    }

}
