<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class video extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected $fillable = ['name' , 'description' , 'video' , 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
