<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Slot;



class Card extends Model
{
    use HasFactory;

    protected $fillable = ['reference_id', 'game', 'status', 'winning_prize', 'price_per_slot', 'game_date', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function slots()
    {
        return $this->hasMany(Slot::class);
    }
}
