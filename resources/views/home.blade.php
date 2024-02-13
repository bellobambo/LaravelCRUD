<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="border: 3px solid gray">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name">
            <input type="text" name="email">
            <input type="password" name="password">
            <button>Register</button>
        </form>
    </div>
</body>

</html>
