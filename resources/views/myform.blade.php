<html>

<body>
    <form action="{{Route('post_form')}}" method="post" name="myname">
        <label>Name: </label><input type="text" name="my_name">
        <label>Password: </label><input type="password" name="password"><br>
        <input type="hidden" name="age" value="35">

        <label>Notebooks</label><input type="checkbox" name="category[]" value="notebooks">
        <label>Monitors</label><input type="checkbox" name="category[]" value="monitors">
        <label>Keyboards</label><input type="checkbox" name="category[]" value="keyboards">
        <br>

        <input type="submit" value="Отправить">
        @csrf
    </form>
</body>

</html>