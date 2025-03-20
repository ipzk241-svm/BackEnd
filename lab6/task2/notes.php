<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1,
        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
            max-width: 800px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        #notes {
            margin-top: 20px;
        }

        .note {
            background-color: white;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            max-width: 800px;
        }

        .note h3 {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <h2>Add New Note</h2>
    <form id="noteForm">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br>
        <button type="button" id="addNote">Add Note</button>
    </form>
    <h1>User Notes</h1>
    <div id="notes">

    </div>


    <script src="js/notes.js" type="module"></script>
</body>

</html>