<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["fileToUpload"]) && is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
        $uploadOk = 1;
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            echo "<div class='notification error'>File already exists.</div>";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 1048576000000) {
            echo "<div class='notification error'>File size is too large. Maximum allowed is 100 MB.</div>";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<div class='notification success'>File <strong>" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "</strong> was successfully uploaded.</div>";
            } else {
                echo "<div class='notification error'>An error occurred while uploading the file.</div>";
            }
        } 

    } else {
        echo "<div class='notification error'>No file selected.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', 'Helvetica Neue', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            background-attachment: fixed;
            color: #e0e0e0;
        }

        .container {
            max-width: 480px;
            margin: 80px auto;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 0 40px rgba(0, 255, 255, 0.05);
            padding: 40px;
            backdrop-filter: blur(10px);
        }

        h2 {
            margin-top: 0;
            font-size: 26px;
            font-weight: 600;
            color: #ffffff;
            text-align: center;
            letter-spacing: 1px;
        }

        .upload-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        input[type="file"] {
            padding: 12px;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            font-size: 14px;
            color: #ffffff;
        }

        input[type="file"]::file-selector-button {
            background-color: #00c9ff;
            border: none;
            padding: 8px 16px;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="file"]::file-selector-button:hover {
            background-color: #00a7d7;
        }

        .button {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            border: none;
            color: #ffffff;
            padding: 14px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .button:hover {
            background: linear-gradient(to right, #0072ff, #00c6ff);
        }

        .notification {
            max-width: 500px;
            margin: 20px auto;
            padding: 16px;
            border-radius: 12px;
            font-weight: 500;
            text-align: center;
            backdrop-filter: blur(6px);
        }

        .notification.success {
            background: rgba(0, 255, 127, 0.15);
            color: #00ff9d;
            border: 1px solid rgba(0, 255, 127, 0.3);
        }

        .notification.error {
            background: rgba(255, 0, 60, 0.1);
            color: #ff6b6b;
            border: 1px solid rgba(255, 0, 60, 0.3);
        }

        label {
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
        }

        .credit {
            margin-top: 20px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 14px;
            text-align: center;
            color: #9bd3ff;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .credit2 {
            margin-top: 0px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 14px;
            text-align: center;
            color: #9bd3ff;
            letter-spacing: 1px;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload File</h2>
        <form class="upload-form" action="index.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Select file to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload File" name="submit" class="button">
            <div class="credit">Developed by limmmw</div>
            <div class="credit2">https://github.com/limmmw</div>
        </form>
    </div>
</body>
</html>
