<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayah = Wilayah::with('parent', 'child')->get();

        return view('section.wilayah.konten', compact('wilayah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wilayah = new Wilayah();
        $wilayah->name = $request->name;
        $wilayah->type = $request->type;
        $wilayah->parent_id = $request->parent_id;
        $wilayah->save();

        return redirect('/wilayah');
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
        $wilayah = Wilayah::with('parent', 'child')->find($id);
        $allWilayah = Wilayah::all();

        return view('section.wilayah.edit', compact('wilayah', 'allWilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $wilayah = Wilayah::find($id);
        $wilayah->name = $request->name;
        $wilayah->type = $request->type;
        $wilayah->parent_id = $request->parent_id;
        $wilayah->save();

        return redirect('/wilayah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wilayah = Wilayah::find($id);

        if($wilayah){
            $wilayah->delete();
        }

        return redirect('/wilayah');
    }
}