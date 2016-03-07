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
    $fn = $_FILES["file"]["name"];
    $target = "files/$fn";
    move_uploaded_file($fn, $target) or die( "Could not copy file!");
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

<?php echo isset($_FILES['file']['name']) ? $_FILES['file']['name'] : "-"; ?>
