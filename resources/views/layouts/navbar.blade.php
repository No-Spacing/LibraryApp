<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('library') }}">Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('authors.index') }}">Author</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('books.index') }}">Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('has-many') }}">Has Many</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('belongs-to') }}">Belongs To</a>
          </li>
        </ul>
      </div>
    </div>
</nav>