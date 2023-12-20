<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appoiinment extends Model
{
    use HasFactory,SoftDeletes;
    public function Team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
    public function Slot()
    {
        return $this->belongsTo(Slot::class, 'slot_id');
    }
}
