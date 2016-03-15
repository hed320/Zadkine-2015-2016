<html>
    <head>
        <title>File Uploading Form</title>
    </head>
    <body>
        <h3>File Upload:</h3>
        Select a file to upload: <br />
        <form action="encryption.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" /> <br />
            <input type="submit" value="Upload File" />
        </form>
    </body>
</html>

<?php
if ( $_FILES != array() ) {
    $target_dir = "files/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    $key = "idekrandomshit";

    function encrypt($sValue, $sSecretKey)
    {
        return rtrim(
            base64_encode(
                mcrypt_encrypt(
                    MCRYPT_RIJNDAEL_256,
                    $sSecretKey, $sValue,
                    MCRYPT_MODE_ECB,
                    mcrypt_create_iv(
                        mcrypt_get_iv_size(
                            MCRYPT_RIJNDAEL_256,
                            MCRYPT_MODE_ECB
                        ),
                        MCRYPT_RAND)
                )
            ), "\0"
        );
    }

    function decrypt($sValue, $sSecretKey)
    {
        return rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_256,
                $sSecretKey,
                base64_decode($sValue),
                MCRYPT_MODE_ECB,
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256,
                        MCRYPT_MODE_ECB
                    ),
                    MCRYPT_RAND
                )
            ), "\0"
        );
    }

    // Moet tmp_name zijn met name werkt die niet.
    $fn = $_FILES["file"]["tmp_name"];

    $content = file_get_contents($fn);

    $encrypted = encrypt($content, $key);
    $decrypted = decrypt($encrypted, $key);

    print "Encrypted text: <br>";
    foreach (str_split($encrypted, 210) as $value) {
        print $value."<br>";
    }
    print "<br>";
    print "Decrypted text: <br>".$decrypted."<br>";
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
