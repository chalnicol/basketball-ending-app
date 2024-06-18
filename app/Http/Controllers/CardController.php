<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Card;
use Inertia\Inertia;

class CardController extends Controller
{
    //
    public function show($id)
    {
        $card = Card::with(['slots.owner'])->findOrFail($id);

        return Inertia::render('Cards/Show', [
            'user_id' => auth()->user()->id,
            'card' => $card
        ]);
    }
}
