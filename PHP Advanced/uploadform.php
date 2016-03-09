<html>
    <head>
        <title>File Uploading Form</title>
    </head>
    <body>
        <h3>File Upload:</h3>
        Select a file to upload: <br />
        <form action="uploadform.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" /> <br />
            <input type="submit" value="Upload File" />
        </form>
    </body>
</html>

<?php
if ( $_FILES != array() ) {
    $target_dir = "files/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Moet tmp_name zijn met name werkt die niet.
    $fn = $_FILES["file"]["tmp_name"];
    move_uploaded_file($fn, $target_file) or die( "Could not copy file!");
} else {
    die("No file specified!");
}
?>

<html>
    <head>
        <title>Uploading Complete</title>
    </head>
    <body>
    <h2>Uploaded File Info:</h2>
    <ul>
        <li>Sent file: <?php echo $_FILES['file']['name']; ?>
        <li>File size: <?php echo $_FILES['file']['size']; ?> bytes
        <li>File type: <?php echo $_FILES['file']['type']; ?>
    </ul>
    </body>
</html>
