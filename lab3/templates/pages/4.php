<?php
if (isset($_POST['uploadImage'])) {
    $file = $_FILES['userImage'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileActualExt, $allowed)) {
        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = './images/' . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
    } else {
        echo "You cannot upload files of this type!";
    }
}

$directory = './images/';
$images = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);

?>


<form action="" method="post" enctype="multipart/form-data">
    <label for="userImage">Upload image</label>
    <input type="file" name="userImage" id="userImage">
    <button type="submit" name="uploadImage">Send</button>
</form>


<div>
    <div>Uploaded images</div>
    <div style="display: flex;">
        <?php foreach ($images as $image) : ?>
            <div>
                <img src="<?= $image ?>" alt="">
            </div>
        <?php endforeach ?>
    </div>
</div>