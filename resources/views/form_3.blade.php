<html>

<head>
    <style>
        .invalid {
            color: red
        }
    </style>
</head>

<body>
    <div class="add-books__form-wrapper">
        <form name="add-new-book" id="add-new-book" method="post" action="{{ Route('post_book_form') }}">
            @csrf
            <div class="form-section">
                <label for="title" @error('title') class="invalid" @enderror>Title @error('title') <b>{{ $message }}</b> @enderror</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-section">
                <label for="author" @error('author') class="invalid" @enderror>Author @error('title') <b>{{ $message }}</b> @enderror</label>
                <input type="text" id="author" name="author" class="form-control">
            </div>
            <div class="form-section">
                <label for="genre">Choose Genre:</label>
                <select name="genre" id="genre">
                    <option value="fantasy">Fantasy</option>
                    <option value="sci-fi">Sci-Fi</option>
                    <option value="mystery">Mystery</option>
                    <option value="drama">Drama</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>