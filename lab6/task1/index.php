<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    form {
      background: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="button"] {
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      border: none;
      border-radius: 4px;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="button"]:hover {
      background-color: #218838;
    }
  </style>

<body>
  <form action="" method="post">
    <label for="name">Username:</label>
    <input type="text" id="name" name="name" required /><br /><br />

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required /><br /><br />

    <label for="password">Password:</label>
    <input
      type="password"
      id="password"
      name="password"
      required /><br /><br />

    <input type="button" id="reg" value="Register" />
    <a href="loginForm.php">Login</a>
  </form>
</body>

<script src="js/registration.js" type="module"></script>

</html>