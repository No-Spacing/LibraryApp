@extends('layouts.app')

@section('content')

<div class="container mt-3 pt-3">
    <form id="searchForm" action="{{ route('library') }}" method="GET">
        <div class="d-flex mb-2" style="width:600px">
            <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">Date Published</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libraries as $item)
            <tr>
                <th scope="row">{{ $item->name }}</th>
                <td>{{ $item->title }}</td>
                <td>{{ $item->published_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $libraries->links('pagination::bootstrap-5') }}
</div>

@endsection