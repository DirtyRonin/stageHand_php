<?php

namespace App\Models;

use App\Models\Band;
use App\Models\Setlist;
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
        return $this->belongsTo(Setlist::class,'setlistId','id');
    }
    public function location(){
        return $this->belongsTo(Location::class,'locationId','id');
    }
}
