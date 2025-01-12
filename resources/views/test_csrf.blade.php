<html>
<form name="test_csrf" mathod="post" action="{{ Route('show_security_form') }}">
    @csrf
    <input type="text" name="test_name">
    <input type="submit" value="send">
</form>

</html>