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
    <link rel="icon" type="image/png" href="assets/favicon1.png">
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
        font-weight: 600;
        font-family: 'Rajdhani', sans-serif;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.3s ease;
        text-align: center;
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
            font-size: 15px;
            text-align: center;
            color: #9bd3ff;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .head {
            margin-top: 10px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 30px;
            text-align: center;
            color:rgb(243, 245, 247);
            letter-spacing: 1px;  - /home/sno
            opacity: 0.8;
        }

        .credit2 {
            margin-top: -10px;
            margin-bottom: -20px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 15px;
            text-align: center;
            color: #9bd3ff;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .credit3 {
            margin-top: 0px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 14px;
            text-align: center;
            color: #9bd3ff;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        a.button {
        display: inline-block;
        text-align: center;
        padding: 14px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        color: #ffffff;
        background: linear-gradient(to right, #00c6ff, #0072ff);
        text-decoration: none;
        transition: background 0.3s ease;
        }

        a.button:hover {
        background: linear-gradient(to right, #0072ff, #00c6ff);
        }

        #loading-bar {
        width: 100%;
        height: 6px;
        background: linear-gradient(to right, #00c6ff, #0072ff);
        border-radius: 8px;
        overflow: hidden;
        position: relative;
        margin-bottom: 20px;
        display: none;
        }

        #loading-bar::before {
        content: '';
        position: absolute;
        height: 100%;
        width: 40%;
        background: rgba(255, 255, 255, 0.5);
        animation: loadingMove 1.5s linear infinite;
        border-radius: 8px;
        }

        @keyframes loadingMove {
        0% { left: -40%; }
        50% { left: 30%; }
        100% { left: 100%; }
        }

         @media (max-width: 600px) {
    .container {
        max-width: 100vw;
        width: 100vw;
        margin: 0;
        padding: 7vw 3vw 7vw 3vw;
        border-radius: 0;
        box-sizing: border-box;
    }
    h2, .head {
        font-size: 26px;
    }
    .upload-form, ul.file-list {
        gap: 18px;
    }
    input[type="file"], .button, a.button, .download-btn {
        font-size: 18px;
        padding: 16px;
    }
    .notification {
        padding: 16px;
        font-size: 16px;
    }
    ul.file-list li {
        flex-direction: column;
        align-items: flex-start;
        padding: 16px 8px;
        font-size: 16px;
    }
    .file-name {
        margin-bottom: 10px;
    }
    .credit, .credit2 {
        font-size: 15px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h2 class="head">Upload File</h2>
        <div id="loading-bar"></div>
        <div id="progress-text" style="text-align:center; font-weight:bold; color:#9bd3ff; margin-bottom:20px; display:none;">0%</div>
        <form id="uploadForm" class="upload-form" action="index.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Select file to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload File" name="submit" class="button">
            <a href="list.php" class="button">Saved File</a>
            <div class="credit">Developed by limmmw®</div>
            <div class="credit2">Contact Me</div>
            <div class="credit3"> 
                <a href="https://github.com/limmmw" style="color: #00c9ff; text-decoration: underline;">Github.com/limmmw</a> | 
                <a href="https://nightcoding.my.id" style="color: #00c9ff; text-decoration: underline;">nightcoding.my.id</a> |
                <a href="https://instagram.com/limmmw" style="color: #00c9ff; text-decoration: underline;">Instagram@limmmw</a>
            </div>
    </div> 
    <script>
    const form = document.getElementById('uploadForm');
    const loadingBar = document.getElementById('loading-bar');
    const progressText = document.getElementById('progress-text');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Stop form dari reload halaman

        const fileInput = document.getElementById('fileToUpload');
        const file = fileInput.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('fileToUpload', file);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php', true);

        // Tampilkan bar dan persentase
        loadingBar.style.display = 'block';
        progressText.style.display = 'block';

        xhr.upload.onprogress = function (e) {
            if (e.lengthComputable) {
                const percent = Math.round((e.loaded / e.total) * 100);
                progressText.innerText = percent + '%';
            }
        };

        xhr.onload = function () {
            if (xhr.status === 200) {
                // Ganti isi halaman dengan respons dari PHP
                document.body.innerHTML = xhr.responseText;
            } else {
                progressText.innerText = 'Upload failed!';
            }
        };

        xhr.send(formData);
    });
</script>
</body>
</html>
