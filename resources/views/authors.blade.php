@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <form action="{{ route('create-author') }}" method="POST" class="">
            @csrf
            <div class="mb-3" style="width: 800px">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                    <p class="text-danger" for="name"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Birthdate</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date">
                @error('birth_date')
                    <p class="text-danger" for="birth_date"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container mt-3 pt-3">
        <form id="searchForm" action="{{ route('authors') }}" method="GET">
            <div class="d-flex mb-2" style="width:600px">
                <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->birth_date }}</td>
                    <td>
                        <button 
                        class="btnUpdateAuthor btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#modalAuthorUpdate" 
                        data-role="update" 
                        data-id="{{ $item->id }}" 
                        data-name="{{ $item->name }}"
                        data-bdate="{{ $item->birth_date }}"
                        >Update</button>
                        <a class="btn btn-danger" href="{{ route('delete-author', [$item->id]) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>      
        </table>
        <div class="modal fade" id="modalAuthorUpdate">
            <div class="modal-dialog">
                @include('layouts.modal_author_update')
            </div>
        </div>
        {{ $authors->links('pagination::bootstrap-5') }}
    </div>

    <script 
    src="https://code.jquery.com/jquery-3.7.1.min.js" 
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous">
    </script>

    <script>
        $(document).on('click','.btnUpdateAuthor',function(){
            var id=$(this).attr('data-id');
            var authorName=$(this).attr('data-name');
            var authorBdate = $(this).attr('data-bdate');
            $('#id').val(id); 
            $('#authorName').val(authorName);
            $('#authorBdate').val(authorBdate);
            $('#authorNameError').text("");
            $('#authorBdateError').text("");
        });
    </script>

    @if ($errors->has('authorName') || $errors->has('authorBdate'))
        <script>
            $( document ).ready(function() {
                $('#modalAuthorUpdate').modal('show');
            });
        </script>
    @endif
@endsection
