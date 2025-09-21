<?php
$uploadDir = 'uploads/';
$files = array_diff(scandir($uploadDir), ['.', '..', '.htaccess']); // tambahkan '.htaccess' di sini

// Handler download
if (isset($_GET['file'])) {
    $file = basename($_GET['file']); // amankan nama file
    $filePath = $uploadDir . $file;

    if (file_exists($filePath)) {
        // Tentukan MIME type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $filePath);
        finfo_close($finfo);

        // Header untuk force download
        header('Content-Description: File Transfer');
        header('Content-Type: ' . $mime);
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));
        header('Pragma: public');
        header('Cache-Control: must-revalidate');
        flush();
        readfile($filePath);
        exit;
    } else {
        http_response_code(404);
        echo "File not found.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File List</title>
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
            max-width: 640px;
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

        ul.file-list {
            list-style: none;
            padding: 0;
        }

        ul.file-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.05);
            margin-bottom: 10px;
            padding: 10px 20px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .file-name {
            word-break: break-all;
            color: #ffffff;
        }

        .download-btn {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            border: none;
            color: #ffffff;
            padding: 8px 14px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Rajdhani', sans-serif;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
        }

        .download-btn:hover {
            background: linear-gradient(to right, #0072ff, #00c6ff);
        }

        .credit {
            margin-top: 30px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 16px;
            text-align: center;
            color: #9bd3ff;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        @media (max-width: 600px) {
       .container {
        max-width: 98vw;
        margin: 20px 1vw;
        padding: 18px 6px;
        border-radius: 12px;
        }
        h2, .head {
        font-size: 20px;
        }
        .upload-form, ul.file-list {
        gap: 10px;
        }
        input[type="file"], .button, a.button, .download-btn {
        font-size: 13px;
        padding: 10px;
        }
        .notification {
        padding: 10px;
        font-size: 13px;
        }
        ul.file-list li {
        flex-direction: column;
        align-items: flex-start;
        padding: 10px 8px;
        font-size: 13px;
        }
        .file-name {
        margin-bottom: 6px;
        }
        .credit, .credit2 {
        font-size: 12px;
        }
}
    </style>
</head>
<body>
    <div class="container">
        <h2>SAVED FILE</h2>

        <?php if (empty($files)): ?>
            <p>No File in Folder.</p>
        <?php else: ?>
            <ul class="file-list">
                <?php foreach ($files as $file): ?>
                    <li>
                        <span class="file-name"><?= htmlspecialchars($file) ?></span>
                        <a class="download-btn" href="?file=<?= rawurlencode($file) ?>">Download</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="credit">Developed by limmmw | <a href="index.php" style="color: #00c9ff; text-decoration: underline;">Back To Upload Page</a></div>
    </div>
</body>
</html>
