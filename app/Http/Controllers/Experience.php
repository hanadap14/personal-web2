<?php

namespace App\Http\Controllers;

use App\Models\Experience as ModelsExperience;
use Illuminate\Http\Request;

class Experience extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $data = [
            'title' => $r->title,
            'place' => $r->place,
            'start' => $r->start,
            'end' => $r->end
        ];

        ModelsExperience::create($data);

        return redirect('admin')->with([
            'status' => 'success',
            'message' => $r->title.' has ben added'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect('admin');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exp = ModelsExperience::find($id);

        return view('experience.edit',[
            'exp' => $exp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $exp = ModelsExperience::find($id);

        $exp->title = $r->title;
        $exp->place = $r->place;
        $exp->start = $r->start;
        $exp->end = $r->end;

        $exp->save();

        return redirect('admin')->with([
            'status' => 'success',
            'message' => $exp->title.' has ben updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exp = ModelsExperience::find($id);
        $exp->delete();

        return redirect('admin')->with([
            'status' => 'success',
            'message' => $exp->title.' has ben deleted'
        ]);
    }
}
