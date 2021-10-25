<?php

namespace App\Models;

use App\Models\CustomEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','address'
    ];

    protected $table = 'locations';

    public function customEvents(){
        return $this->hasMany(CustomEvent::class, 'bandId', 'id');
    }

}
