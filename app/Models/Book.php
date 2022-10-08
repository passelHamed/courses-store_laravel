<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\publisher;
use App\Models\Author;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'isbn', 
        'cover_image', 
        'price', 
        'publisher_id', 
        'category_id',
        'publisher_year',
        'number_of_pages',
        'number_of_copies',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(publisher::class);
    }

    public function Authors()
    {
        return $this->belongsToMany(Author::class , 'book_author');
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
