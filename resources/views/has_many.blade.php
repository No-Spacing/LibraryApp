@extends('layouts.app')

@section('content')

<div class="container mt-3 pt-3">
    <form id="searchForm" action="{{ route('has-many') }}" method="GET">
        <div class="d-flex mb-2" style="width:600px">
            <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <table class="table">
        <tbody>
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Title - Date Published</th>
                </tr>
            </thead>
            @foreach ($libraries as $item)
            <tr>
                <th scope="row">{{ $item->name }}</th>
                @foreach ($item->books as $books)
                    <td>{{ $books->title }}</td>
                    <td>{{ $books->published_date }}</td>  
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $libraries->links('pagination::bootstrap-5') }}
</div>

@endsection