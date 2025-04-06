@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <form action="{{ route('books.store') }}" method="POST" style="width: 1000px">
            @csrf
            <div class="mb-3" style="width: 800px">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control form-control-lg" id="title" name="title">
                @error('title')
                    <p class="text-danger" for="title"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author ID</label>
                <input type="text" class="form-control form-control-lg" id="author_id" name="author_id">
                @error('author_id')
                    <p class="text-danger" for="author_id"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">Date Published</label>
                <input type="date" class="form-control form-control-lg" id="published_date" name="published_date">
                @error('published_date')
                    <p class="text-danger" for="published_date"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="container mt-3 pt-3">
        <form id="searchForm" action="{{ route('books.index') }}" method="GET">
            <div class="d-flex mb-2" style="width:600px">
                <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                <button type="submit" class="btn btn-primary mx-2">Search</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author ID</th>
                    <th scope="col">Date Published</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->author_id }}</td>
                    <td>{{ $item->published_date }}</td>
                    <td>
                        <button 
                        class="btnUpdateBook btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#modalBookUpdate" 
                        data-id="{{ $item->id }}" 
                        data-title="{{ $item->title }}"
                        data-author-id="{{ $item->author_id }}"
                        data-published-date="{{ $item->published_date }}"
                        >Update</button>

                        <div class="modal fade" id="modalBookUpdate">
                            <div class="modal-dialog">
                                @include('layouts.modal_book_update')
                            </div>
                        </div>

                        <button 
                        class="btn btn-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#modalBookDestroy{{ $item->id }}"
                        >Delete</button>

                        <div class="modal fade" id="modalBookDestroy{{ $item->id }}">
                            <div class="modal-dialog">
                                @include('layouts.modal_book_destroy')
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links('pagination::bootstrap-5') }}
    </div>
    <script 
    src="https://code.jquery.com/jquery-3.7.1.min.js" 
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>

    @if ($errors->has('bookTitle') || $errors->has('bookAuthorId') || $errors->has('bookPublishedDate'))
        <script>
            $( document ).ready(function() {
                $('#modalBookUpdate').modal('show');
            });
        </script>
    @endif

    <script>
        $(document).on('click','.btnUpdateBook',function(){
            var id=$(this).attr('data-id');
            var bookTitle=$(this).attr('data-title');
            var bookAuthorId = $(this).attr('data-author-id');
            var bookPublishedDate = $(this).attr('data-published-date');
            $('#id').val(id); 
            $('#bookTitle').val(bookTitle);
            $('#bookAuthorId').val(bookAuthorId);
            $('#bookPublishedDate').val(bookPublishedDate);
            $('#bookTitleError').text("");
            $('#bookAuthorIdError').text("");
            $('#bookPublishedDateError').text("");
        });
    </script>
@endsection