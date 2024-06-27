<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="border">
        <div class="login">
                <a href="/">Balik</a>
            </div>
        <form action="" method= "post">
            @csrf
            <div class="head"><b>Admin</b></div>
            <div class="input-text">
                <label for="Email">Email:</label>
                <input type="text" name="Email"  placeholder="Email">
                @if ($errors->has('Email'))
                    <div class="error-message">{{ $errors->first('Email') }}</div>
                @endif
            </div>

            <div class="input-password">
                <label for="Passsword">Password: </label>
                <input type="password" name="password" placeholder="password">
                @if ($errors->has('password'))
                    <div class="error-message">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="submit">
                <input type="submit" name="Login" value="Login">
                @if ($errors->has('error'))
                <div class="error-message">{{ $errors->first('error') }}</div>
                @endif
            </div>
        </form>
    </div>

</body>
</html>