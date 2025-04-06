<form id="bookUpdate" action="{{ route('books.update', [$item->id]) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Edit Book</h5>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <input type="hidden" id="id" name="id" class="form-control">
                <label for="bookTitle" class="form-label">Title</label>
                <input id="bookTitle" name="bookTitle" class="form-control" value="{{ old('bookTitle') }}">
                @error('bookTitle')
                    <p class="text-danger" for="bookTitle" id="bookTitleError"> 
                        {{ $message }}
                    </p>
                @enderror
                <label for="bookAuthorId" class="form-label">Author ID</label>
                <input type="text" id="bookAuthorId" name="bookAuthorId" class="form-control" value="{{ old('bookAuthorId') }}">
                @error('bookAuthorId')
                    <p class="text-danger" for="bookAuthorId" id="bookAuthorIdError"> 
                        {{ $message }}
                    </p>
                @enderror
                <label for="bookPublishedDate" class="form-label">Date Published</label>
                <input type="date" id="bookPublishedDate" name="bookPublishedDate" class="form-control" value="{{ old('bookPublishedDate') }}">
                @error('bookPublishedDate')
                    <p class="text-danger" for="bookPublishedDate" id="bookPublishedDateError"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary shadow-sm">Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                                                                    
        </div>
    </div>
</form>