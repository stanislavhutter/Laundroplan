
@extends('layouts.main_app')

@section('content')
    <div class="container">
        <h2>Edit Note</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Arrrrrrrrr!</strong> Something conflicts the Pirate Codex.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('note.update',$note->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="note_textarea">Note</label>
                <textarea class="form-control" id="note_texarea" name="note_text">{{$note->note_text}}</textarea>
                <small>Edit your note</small>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>

@endsection

