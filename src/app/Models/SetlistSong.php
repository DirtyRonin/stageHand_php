<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setlist;

class SetlistSong extends Model
{
    use HasFactory;

    protected $table='setlistSongs';

    protected $fillable = [
        'order','setlistId'
    ];

    public function setlist(){
        return $this->belongsTo(Setlist::class,'setlistId','id');
    }
}
