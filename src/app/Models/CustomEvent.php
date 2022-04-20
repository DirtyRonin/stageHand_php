<?php

namespace App\Models;

use App\Models\Band;
use App\Models\Setlist;
use App\Models\SetlistSong;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomEvent extends Model
{
    use HasFactory;

    protected $table = 'customEvents';

    protected $fillable = [
        'date',
    ];

    public function band(){
        return $this->belongsTo(Band::class,'bandId','id');
    }
    public function setlist(){
        return $this->hasOne(Setlist::class,'id');
    }

    public function setlistSongs(){
        return $this->hasManyThrough(Song::class,Setlist::class,'songId','setlistId','id','id');
    }

    public function location(){
        return $this->belongsTo(Location::class,'locationId','id');
    }
}
