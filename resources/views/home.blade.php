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
        <div style="border: 3px solid gray">
            <h2>Create A new Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title">
                <textarea name="body" placeholder="text...."></textarea>
                <button>Save Post</button>
            </form>
        </div>

        <div style="border: 3px solid gray">
            <h2>All Post</h2>
            @foreach ($posts as $post)
                <div style="background-color : gray ; padding : 10px; margin 10px">
                    <h3>

                        {{ $post['title'] }} by {{$post->user->name}}
                    </h3>
                    {{ $post['body'] }}
                    <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
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
