<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // destroy the session
            setcookie('user_name', '', time()-3600);
            setcookie('is_authenticated', false, time()-3600);
            header("Location: index.php");
        }
    ?>

    <?php
        // protect the home page
        if(!isset($_COOKIE['is_authenticated']) && $_COOKIE['is_authenticated'] != true){
            header("Location: index.php");
        }
        echo "<div>Welcome". $_COOKIE["user_name"]."</div>";
        echo "<div>You're Logged in</div>";
    ?>

    <form method="post">
        <input type="submit" value="Logout">
    </form>

</body>
</html>