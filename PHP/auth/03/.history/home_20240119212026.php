<?php
    // start the session
    session_start();
      
?>

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
            session_destroy();
            header("Location: index.php");
        }
    ?>

    <?php
        // protect the home page
        if(!isset($_SESSION['is_authenticated']) && $_SESSION['is_authenticated'] != true){
            header("Location: index.php");
        }
        echo "<div>Welcome ". $_SESSION["user_name"]."</div>";
        echo "<div>You're Logged in</div>";
    ?>

    <form method="post">
        <input type="submit" value="Logout">
    </form>

</body>
</html>