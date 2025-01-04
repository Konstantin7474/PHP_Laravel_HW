<html>

<body>
    <form name="file-upload" enctype="multipart/form-data" method="post" action="{{Route('uploadFile')}}">
        <input type="file" name="upload_photo[]">
        <input type="file" name="upload_photo[]">
        <input type="file" name="upload_photo[]">
        <input type="submit" value="Send">
        @csrf

    </form>
</body>

</html>