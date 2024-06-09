<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="border">
        <form action="" method="post">
            @csrf
            <div class="head"><b>Registration</b></div>

            <div class="input-text">
                <label for="Email">Email:</label>
                <input type="text" name="Email" placeholder="Email">
                @if ($errors->has('Email'))
                    <div class="error-message">{{ $errors->first('Email') }}</div>
                @endif
            </div>

            <div class="input-password">
                <label for="password">Password: </label>
                <input type="password" name="password" placeholder="password">
                @if ($errors->has('password'))
                    <div class="error-message">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="input-check-password">
                <label for="check-password">Check Password: </label>
                <input type="password" name="check-password" placeholder="check-password">
                @if ($errors->has('check-password'))
                    <div class="error-message">{{ $errors->first('check-password') }}</div>
                @endif
            </div>

            <div class="input-login">
                <label for="login">Already Have an Account?</label>
                <a href="/">Login</a>
            </div>

            <div class="submit">
                <input type="submit" name="Login" value="Registrasi">
            </div>
        </form>
    </div>
</body>
</html>
