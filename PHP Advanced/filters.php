<!DOCTYPE html>
<html>
    <body>
        <form action="filters.php" method="post">
            <input type="text" name="username" id="username" placeholder="username">
            <input type="password" name="password" id="password" placeholder="password">
            <input type="submit">
        </form>
    </body>
</html>

<?php
    if (!empty($_POST["username"]) and !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $hpassword = md5("teststring");
        if (filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS)) {
            echo "valid username";
        }
        echo "<br>";
        if ($password == $hpassword) {
            echo "passwords are the same";
        } else {
            echo "passwords are not the same";
        }
    }
