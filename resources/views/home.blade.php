<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

    @auth
        <p>batman is great :)</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>

        <div style="border: 3px solid black">
            <h2>Create a new post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title"/>
                <input name="body"/>
                <button>Create post</button>
            </form>
        </div>

        <div style="border: 3px solid black">
            <h2>All posts</h2>
            @foreach($posts as $post)

                <div style="background: grey; padding: 10px; margin:10px">
                    <h3>{{$post['title']}} - {{$post->user->name}}</h3>
                    {{$post['body']}}
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/edit-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>

            @endforeach
        </div>

    @else
        <div style="border: 3px solid black">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type="text" placeholder="name"/>
                <input name="email" type="text" placeholder="email"/>
                <input name="password" type="password" placeholder="password"/>
                <button>Register</button>
            </form>
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="name"/>
                <input name="loginpassword" type="password" placeholder="password"/>
                <button>Login</button>
            </form>
        </div>
    @endauth


</body>
</html>
