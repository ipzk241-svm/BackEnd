<?php
if (isset($_POST['login']) && isset($_POST['password'])) {
    $path = './usersFolders/';
    $login = $_POST['login'];
    $folder = $path . $login;
    $subDirectories = ['photo', 'music', 'video'];
    $files = ['hello.php', 'style.css', 'script.js'];

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true); // 0777 - повний доступ, true - створення вкладених папок
        echo "Папка '$folder' створена.";
        foreach ($subDirectories as $subDirectory) {
            mkdir($folder . '/' . $subDirectory, 0777, true);
            foreach ($files as $file) {
                $fileContent = '';
                if ($file === 'hello.php') {
                    $fileContent = "<?php echo 'Hello, $login!'; ?>";
                }
                file_put_contents($folder . '/' . $subDirectory . '/' . $file, $fileContent);
            }
        }
    } else {
        echo "Папка '$folder' вже існує.";
    }
}
?>

<form action="" method="post">
    <label for="">Login</label>
    <input type="text" name="login">
    <label for="">Password</label>
    <input type="password" name="password">
    <button type="submit">Let's go</button>
</form>


<div>
    <div>Якщо хочеш видалити директорію тобі <a href="index.php?page=delete">сюди</a></div>
</div>