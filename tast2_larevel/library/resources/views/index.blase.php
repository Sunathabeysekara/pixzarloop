<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <header>
    </header>

    <form method="POST" action="{{ route('login.submit') }}">
    @csrf
        <h2 style="text-align: center;">Admin Login</h2>

        <!-- User ID -->
        <input type="text" id="userid" style="text-align: center; margin-left: 680px;" name="userid" placeholder="ID" required><br>
        <br>

        <!-- Password -->
        <input type="password" style="text-align: center; margin-left: 680px;" id="password" name="password" placeholder="Password" required><br>

        <input type="submit" value="Log In" style="margin-left: 740px; margin-top: 12px;">
    </form>

    @if ($errors->any())
        <p style="color: red; text-align: center;">{{ $errors->first('error') }}</p>
    @endif

    <footer>
    </footer>
</body>
</html>