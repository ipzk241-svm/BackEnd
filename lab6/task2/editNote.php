<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагування нотатки</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 10px;
        }

        h1 {
            text-align: center;
        }

        input,
        textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }

        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>Edit note</h1>

    <input type="hidden" id="noteId">
    <input type="text" id="noteTitle" placeholder="Заголовок">
    <textarea id="noteContent" placeholder="Текст нотатки"></textarea>
    <button id="updateNote">Update</button>


    <script src="js/editNote.js" type="module"></script>
</body>

</html>