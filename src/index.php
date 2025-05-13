<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 10737418241073741824) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Maaf, file tidak dapat diupload.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " berhasil diupload.";
        } else {
            echo "Maaf, terjadi error saat mengupload file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .upload-form {
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="upload-form">
        <h2>Upload File</h2>
        <form action="index.php" method="post" enctype="multipart/form-data">
            Pilih file untuk diupload:
            <br><br>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><br>
            <input type="submit" value="Upload File" name="submit" class="button">
        </form>
    </div>
</body>
</html>