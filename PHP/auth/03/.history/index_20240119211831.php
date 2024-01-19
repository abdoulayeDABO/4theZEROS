<?php
    // define cookies
    session_start();
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
</head>
<body>
    <?php
        function check($username, $password){
            $secret_username = "admin";
            $secret_password = "secret";

            if($username == $secret_username && $password == $secret_password){
                $_SESSION['user_name'] = $username;
                $_SESSION['is_authenticated'] = true;
                header("Location: home.php");
            }else{
                echo "<div>Wrong password or username</div>";       
            }
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_REQUEST['username']);
            $password = htmlspecialchars($_REQUEST['password']);
            if (empty($name) || empty($password)) {
                echo "<div>Please fill all the fields</div>";
            }else{
                check($name, $password);
            }
        }
    ?>


    <h1>Login page</h1>
    <form method="post">
        <label for="username">
            Username
            <input type="text" name="username" id=username">
        </label>
        <label for="password">
            Username
            <input type="password" name="password" id=password">
        </label>
        <input type="submit" value="OK">
    </form>

</body>
</html>