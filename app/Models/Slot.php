<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Card;
use App\Models\User;


class Slot extends Model
{
    use HasFactory;

    protected $fillable = ['card_id', 'number', 'is_taken'];
    
    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    
}
