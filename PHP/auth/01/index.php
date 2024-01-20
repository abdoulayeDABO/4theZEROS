<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
</head>
<body>
    <h1>Login page</h1>

    <?php
        function check($username, $password){
            $secret_username = "admin";
            $secret_password = "secret";

            if($username == $secret_username && $password == $secret_password){
                echo "<h3 style=\"color: green;\">You're Logged in</h3>";
            }else{
                echo "<h3 style=\"color: red;\">Wrong password or username</h3>";       
            }
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_REQUEST['username']);
            $password = htmlspecialchars($_REQUEST['password']);
            if (empty($name) || empty($password)) {
                echo "<h3 style=\"color: red;\">Please fill all the fields</h3>";
            }else{
                check($name, $password);
            }
        }
    ?>

    <form method="post">
        <div>
            <label for="username">
                Username
                <input type="text" name="username" id=username">
            </label>
        </div>
        <div>
            <label for="password">
                Password
                <input type="password" name="password" id=password">
            </label>
        </div>
        <input type="submit" value="Submit">
    </form>






</body>
</html>