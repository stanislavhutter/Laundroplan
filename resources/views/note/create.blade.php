
@extends('layouts.main_app')

@section('content')
    <div class="container">
        <h2>Create a new Note</h2>

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

        <form action="{{route('note.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="note_textarea">Note</label>
                <textarea class="form-control" id="note_texarea" name="note_text"></textarea>
                <small>Write Note</small>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </div>

@endsection

