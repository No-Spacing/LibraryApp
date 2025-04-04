<form id="authorUpdate" action="{{ route('update-author') }}" method="POST">
    @csrf
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Edit Author</h5>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <input type="hidden" id="id" name="id" class="form-control">
                <label for="authorName" class="form-label">Name</label>
                <input id="authorName" name="authorName" class="form-control" value="{{ old('authorName') }}">
                @error('authorName')
                    <p class="text-danger" for="authorName" id="authorNameError"> 
                        {{ $message }}
                    </p>
                @enderror
                <label for="authorBdate" class="form-label">Birthdate</label>
                <input type="date" id="authorBdate" name="authorBdate" class="form-control" value="{{ old('authorBdate') }}">
                @error('authorBdate')
                    <p class="text-danger" for="authorBdate" id="authorBdateError"> 
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