<html>

<head>
    <title>User registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                User registration example
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url('user') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" id="username" name="username" class="form-control" required="">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>