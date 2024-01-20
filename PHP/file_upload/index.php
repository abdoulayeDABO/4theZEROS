<!DOCTYPE html>
<html lang="en">
<he>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
<div style="margin: 0 auto; margin-top: 120px; width:50%">
    <h2>UPLOAD PAGE</h2>

    <?php
        // $file = $_FILES['fichier']['name'];
        // $size = $_FILES['fichier']['size'];
        // $tmp = $_FILES['fichier']['tmp_name'];
        // $type = $_FILES['fichier']['type'];
        // $error = $_FILES['fichier']['error'];
        // move_uploaded_file($tmp, 'nouveau_nom');
    
        $message = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_FILES["file"]) && !empty($_FILES["file"]['name'])){
                $target_dir = "./uploads/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $uploadOk = 1;
                $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $allowed=['pdf','word','odt','rar','zip'];
                
                if(!in_array($FileType,$allowed)){
                    $message = '<h3 style="color:red;">Allowed types: file type: PDF, Word, Odt, Rar, ZIP</h3>';
                    $uploadOk = 0;
                }

                if (file_exists($target_file)) {
                    $message = '<h3 style="color:red;">File: '.basename($_FILES["file"]["name"]).' already exists</h3>';
                    $uploadOk = 0;
                }

                if ($_FILES["file"]["size"] > 15000000) {
                    $message = '<h3 style="color:red;">File size too large </h3>';
                    $uploadOk = 0;
                }

                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                        $message = '<h3 style="color:green;">File: '. basename($_FILES["file"]["name"]).' uploaded successfully </h3>';
                    } else {
                        $message = '<h3 style="color:red;">Error when uploading </h3>';
                    }
                }
            }
        }
    ?>

    <?php
        if (!empty($message)){
            echo $message;
        }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <input name="file" type="file" required>
        <p>
            <input type="submit" value="Upload file"> 
        </p>
             
    </form>
</div>
</body>
</html>