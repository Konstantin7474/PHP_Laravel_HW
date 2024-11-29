<html>

<head>
    <title>File upload</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <form name="add-new-book" id="add-new-book" method="post" enctype="multipart/form-data" action="{{ route('upload-file') }}">
                    @csrf
                    <div class="form-group">
                        <label for="book_name">Name</label>
                        <input type="text" id="file_name" name="file_name" class="form-control" required="">
                        <input type="file" name="uploaded_file">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>