<html>

<head>
    <title>User information</title>
</head>

<body @if($user['id']==0) style="background-color: yellow" @endif>
    <table border="4">
        <tr>
            <td>
                User name:
            </td>
            <td>
                {{ $user['user_name'] }}
            </td>
        </tr>
        <tr>
            <td>
                First name:
            </td>
            <td>
                {{ $user['first_name'] }}
            </td>
        </tr>
        <tr>
            <td>
                Last name:
            </td>
            <td>
                {{ $user['last_name'] }}
            </td>
        </tr>
        <tr>
            <td>
                List of books:
            </td>
            <td>
                @foreach($user['list_of_books'] as $item)
                {{ $item }} <br>
                @endforeach
            </td>
        </tr>
    </table>

</body>

</html>