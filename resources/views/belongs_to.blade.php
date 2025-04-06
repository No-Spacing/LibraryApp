@extends('layouts.app')

@section('content')

<div class="container mt-3 pt-3">
    <form id="searchForm" action="{{ route('belongs-to') }}" method="GET">
        <div class="d-flex mb-2" style="width:600px">
            <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <table class="table">
        <tbody>
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Date Published</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            @foreach ($libraries as $item)
            <tr>
                <th scope="row">{{ $item->title }}</th>
                <td>{{ $item->published_date }}</td>  
                <td>{{ $item->authors->name ?? null }}</td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $libraries->links('pagination::bootstrap-5') }}
</div>

@endsection