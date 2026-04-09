<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <h1>Sign up</h1>

    <form action="process-signup.php" method="post" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div>
            <input type="radio" id="t_user" name="type" value="user">
            <label for="t_user">User</label><br>
            <input type="radio" id="css" name="type" value="admin">
            <label for="t_admin">Admin</label><br>
        </div>

        <button>Sign up</button>
    </form>
</body>
</html>