<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slot;
use Illuminate\Support\Facades\Auth;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $slots = Slot::whereIn( 'id', $request->toPass )->get();
        $slots->each(function ($slot) {
            $slot->owner_id = Auth::id();
            $slot->save();
        });

        // return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
