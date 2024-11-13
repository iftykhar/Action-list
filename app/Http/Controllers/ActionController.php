<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actions = DB::table('actions')
        ->where('user_id', auth()->user()->id)
        ->get();
        // dd($actions);
        return view("Action.Home",compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('Action.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content'=>'required|max:255|string',
        ]);

        // dd($validated) ;
        $action = DB::table('actions')->insert([
            'user_id'=> auth()->user()->id,
            'content'=> $validated['content'],
            'status'=> 0,
            'created_at'=> now(),
            'updated_at'=> now()

        ]);
        if($action){
            return redirect()->route('Action.index');
        }
        return back();

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
