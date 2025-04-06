<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
</head>
<body>
    <a href="{{ route('google.redirect') }}" class="btn btn-primary">Login with Google</a>

<form method="POST" action="{{ route('login.submit') }}">
    @csrf
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Login</button>
</form>

<div>
    <p>Don't have an account? <a href="{{ route('register') }}">Create Account</a></p>
</div>


    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

</body>
</html>
