<?php
if (isset($_POST['uploadImage'])) {
    $files = $_FILES['userImage'];

    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    foreach ($files['name'] as $key => $fileName) {
        $fileTmpName = $files['tmp_name'][$key];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExt, $allowed)) {
            $fileNameNew = uniqid('', true) . "." . $fileExt;
            $fileDestination = './images/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            echo "You cannot upload files of this type!";
        }
    }
}

$directory = './images/';
$images = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="userImage">Upload images</label>
    <input type="file" name="userImage[]" id="userImage" multiple>
    <button type="submit" name="uploadImage">Send</button>
</form>

<div>
    <div>Uploaded images</div>
    <div style="display: flex; flex-wrap: wrap;">
        <?php foreach ($images as $image) : ?>
            <div style="margin: 10px;">
                <img src="<?= $image ?>" alt="" width="100">
            </div>
        <?php endforeach ?>
    </div>
</div>