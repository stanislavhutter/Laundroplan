@extends('layouts.main_app')

@section('content')
    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value }}</td>
                <td>{{ ++$i }}</td>
                <td>{{ $value->note_text }}</td>
                <td>{{ \Str::limit($value->note_text, 100) }}</td>
                <td>
                    <form action="{{ route('Notes.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('Notes.show',$value->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('Notes.edit',$value->id) }}">Edit</a>
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
