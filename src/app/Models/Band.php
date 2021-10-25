<?php

namespace App\Models;

use App\Models\User;
use App\Models\Song;
use App\Models\Setlist;
use App\Models\CustomEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    protected $table = 'bands';

    public function users()
    {
        return $this->belongsToMany(User::class, 'bandUsers', 'bandId', 'userId');
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'bandSongs', 'bandId', 'songId')
            ->withPivot('popularity')
            ->withTimestamps();
    }

    public function setlists()
    {
        return $this->hasMany(Setlist::class, 'bandId', 'id');
    }

    public function customEvents(){
        return $this->hasMany(CustomEvent::class, 'bandId', 'id');
    }
}
