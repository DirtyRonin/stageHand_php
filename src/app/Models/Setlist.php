<?php

namespace App\Models;

use App\Models\Band;
use App\Models\CustomEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Setlist extends Model
{

    use HasFactory;

    protected $fillable = [
        'title', 'comment'
    ];

    protected $table = 'setlists';

    public function songs():BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'setlistSongs', 'setlistId', 'songId')
            ->withPivot('order')
            ->withTimestamps();
    }

    public function band(){
        return $this->belongsTo(Band::class,'bandId','id');
    }
    public function customEvents(){
        return $this->hasMany(CustomEvent::class, 'bandId', 'id');
    }
}