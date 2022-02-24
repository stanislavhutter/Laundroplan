<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Student;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $notes = Note::all();
        return view('note.index',compact('notes'));

        /*
        $data = Note::latest()->paginate(5);

        return view('Notes.index',compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'note_text'=>'required'
        ]);

        Note::create($request->all());


        return redirect()->route('note.index')
        ->with('succes','Note created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //



        return view('note.edit',compact('note'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        //$note = Note::find($id);
        $request->validate([
            'note_text'=>'required'
        ]);

        $note = Note::find($id);
        $note->note_text = $request->get('note_text');
        $note->update();

        return redirect()->route('note.index')
        ->with('succes','Note update succesfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
        $note->delete();
        return redirect()->route('note.index')->with('success','Note was deleted');

    }
}
