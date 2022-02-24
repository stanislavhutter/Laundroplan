@extends('layouts.main_app')

@section('content')
    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">

            @php
                $i = 0;
            @endphp
            @foreach ($notes as $note)
            <tr>
                <td>{{ $note }}</td>
                <td>{{ ++$i }}</td>
                <td>{{ $note->note_text }}</td>
                <td>{{ \Str::limit($note->note_text, 100) }}</td>
                <td>
                    <form action="{{ route('note.destroy',$note) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('note.show',$note) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('note.edit',$note) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
@endsection
