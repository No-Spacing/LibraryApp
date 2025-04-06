<form action="{{ route('books.destroy', [ $item->id ]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Delete Author</h5>
        </div>
        <div class="modal-body">
            <span>Do you want to delete this Book?</span>
            <div class="my-3">
                <span>Title: <strong>{{ $item->title }}</strong></span>
                <br>
                <span>Author ID: {{ $item->author_id }}</span>
                <br>
                <span>Date Published: {{ $item->published_date }}</span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary shadow-sm">Yes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>                                                                    
        </div>
    </div>
</form>