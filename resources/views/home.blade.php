<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @auth
        <p>Dashboard</p>
        <form action="/logout" method="POST">
            @csrf
            <button>logout</button>
        </form>
    @else
        <div style="border: 3px solid gray">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" required>
                <input type="text" name="email" required>
                <input type="password" name="password" required>
                <button type="submit">Register</button>
            </form>
        </div>
        <div style="border: 3px solid gray">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="loginname" required>
                <input type="password" name="loginpassword" required>
                <button type="submit">Login</button>
            </form>
            @error('loginname')
                <div>{{ $message }}</div>
            @enderror
        </div>
    @endauth
</body>

</html>
