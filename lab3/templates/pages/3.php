<?php
// 3.2
$separator = "|";

if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['comment'])) {
    if (!empty($_POST['name']) && !empty($_POST['comment'])) {
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $comment = str_replace("\n", "<br>", $comment);
        file_put_contents('./files/comments.txt', $name . $separator . $comment . "\n", FILE_APPEND);
    }
}
if (isset($_POST['clear'])) {
    $file = fopen('./files/comments.txt', 'w');
    fclose($file);
}

$fileName = './files/comments.txt';
$comments = [];
if (file_exists($fileName))
    $comments = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 3.2

function getFileWords($filePath)
{
    $file = fopen($filePath, 'r');
    $words = fread($file, filesize($filePath));
    fclose($file);
    return explode(' ', $words);
}

function writeToFile($filePath, $content)
{
    file_put_contents($filePath, implode(" ", $content));
}

function getUniqueWords($f1Words, $f2Words)
{
    $words = [];
    foreach ($f1Words as $word) {
        if (!in_array($word, $f2Words)) {
            array_push($words, $word);
        }
    }
    return $words;
}

function getCommonWords($f1Words, $f2Words)
{
    return array_unique(array_intersect($f1Words, $f2Words));
}

function getRepeatedElements($array)
{
    $repeated = [];
    for ($i = 0; $i < count($array); $i++) {
        if (in_array($array[$i], $repeated)) {
            continue;
        }
        if (in_array($array[$i], array_slice($array, $i + 1))) {
            array_push($repeated, $array[$i]);
        }
    }
    return $repeated;
}

$f1Words = getFileWords('./files/file1.txt');
$f2Words = getFileWords('./files/file2.txt');

// 3.2.a
$uniqueWords = getUniqueWords($f1Words, $f2Words);
writeToFile('./files/wordsOnlyFile1.txt', $uniqueWords);

// 3.2.b
$commonWords = getCommonWords($f1Words, $f2Words);
writeToFile('./files/wordsFromBoth.txt', $commonWords);

// 3.2.c
$repeated = array_merge(getRepeatedElements($f1Words), getRepeatedElements($f2Words));
$repeated = array_unique($repeated);
writeToFile('./files/repeatedWords.txt', $repeated);

function sortWordsInFile($filePath)
{
    $file = fopen($filePath, 'r');
    $words = fread($file, filesize($filePath));
    fclose($file);
    $words = explode("\n", $words);
    sort($words);
    file_put_contents($filePath, implode("\n", $words));
}

sortWordsInFile('./files/words.txt');

if (isset($_POST['deleteFile']) && isset($_POST['fileName'])) {
    $fileName = $_POST['fileName'];
    $filePath = './files/' . $fileName . '.txt';
    if (file_exists($filePath)) {
        unlink($filePath);
        echo "File deleted";
    } else {
        echo "File not found";
    }
}
?>


<form action="" method="post">
    <label for="">Enter file name: </label>
    <input type="text" name="fileName" id="">
    <button type="submit" name="deleteFile">Delete file</button>
    <table>
        <tr>
            <td>Name: </td>
            <td><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td>
                Comment:
            </td>
            <td>
                <textarea name="comment" id="" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit">Відправити</button></td>
        </tr>
    </table>

    <table class="comments">
        <tr>
            <th>Name:</th>
            <th>Comment:</th>
        </tr>
        <?php foreach ($comments as $comment) : ?>
            <?php list($name, $comText) = explode('|', $comment) ?>
            <tr>
                <td><?= $name?></td>
                <td><?= $comText ?></td>
            </tr>
        <?php endforeach ?>
        </tr>
    </table>
    <button type="submit" name="clear">Clear</button>
</form>