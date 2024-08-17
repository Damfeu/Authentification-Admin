{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation d'email</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <div style="text-align: center; padding: 20px;">
        <h3>Bonjour, un compte a ete cree pour vous </h3>
        <h1 style="font-size: 2em; margin: 20px 0;">{{ $password }}</h1>
        <h4>Utilisez ce mot de passe  suivant pour vous connecter</h4>
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
</head>
<body>
    <p>Hello,</p>
    @if($password)
        <p>Your account has been created successfully. Here is your password: <strong>{{ $password }}</strong></p>
    @endif

    @if($authCode)
        <p>Your authentication code is: <strong>{{ $authCode }}</strong></p>
    @endif

    <p>Please use this information to log in.</p>
</body>
</html>
