<?php

namespace App\Models;

use App\Models\CustomEvent;
use App\Models\SetlistSong;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Setlist extends Model
{

    use HasFactory;

    protected $fillable = [
        'title', 'comment', 'customEventId'
    ];

    protected $table = 'setlists';

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'setlistSongs', 'setlistId', 'songId')
            ->withPivot('order', 'id')
            ->withTimestamps();
    }
    public function customEvent()
    {
        return $this->belongsTo(CustomEvent::class, 'customEventId');
    }

    public function setlistSongs()
    {
        return $this->hasMany(SetlistSong::class, 'setlistId', 'id');
            
    }
}
