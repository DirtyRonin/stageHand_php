<?php

namespace App\Models;


use App\Models\Band;
use App\Models\Setlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model
{
    use HasFactory;

    protected $table = 'songs';

    protected $fillable = [
        'artist',
        'title',
        'genre'
    ];
    
    public function bands()
    {
        return $this->belongsToMany(Band::class,'bandSongs','songId','bandId')
            ->withPivot('popularity')
            ->withTimestamps();
    }
    public function setlists()
    {
        return $this->belongsToMany(Setlist::class,'setlistSongs','songId','setlistId')
            ->withTimestamps();
    }
}
