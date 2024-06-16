<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Inertia\Inertia;

class PagesController extends Controller
{
    //
    public function home () {

        return Inertia::render('Home',[
            'user' => auth()->user(),
            'cards' =>  Card::with('slots')
                            ->orderBy('game_date', 'asc')
                            ->get(),
        ]);
    }

    public function about () {
        return Inertia::render('About');
    }
}
