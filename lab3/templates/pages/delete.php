<?php
if (isset($_POST['login']) && isset($_POST['password'])) {
    $path = './usersFolders/';
    $login = $_POST['login'];
    $folder = $path . $login;

    if (file_exists($folder)) {
        $subFolders = glob($folder . '/*', GLOB_ONLYDIR);
        foreach ($subFolders as $subFolder) {
            $files = glob($subFolder . '/*');
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir($subFolder);
        }
        rmdir($folder);
        echo "Папка '$folder' видалена.";
    } else {
        echo "Папка '$folder' не існує.";
    }
}

?>

<h1>Delete</h1>
<form action="" method="post">
    <label for="">Login</label>
    <input type="text" name="login">
    <label for="">Password</label>
    <input type="password" name="password">
    <button type="submit">Let's go</button>
</form>