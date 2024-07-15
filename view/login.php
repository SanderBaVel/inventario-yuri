
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="view/css/login.css" type="text/css">
  <title>Document</title>
  <style>
    .error {
      color: red;
      margin-bottom: 15px;
      text-align: center;
    }
  </style>
</head>

<body class="align">

  <div class="grid">
    <form action="controller/Auth.php" method="POST" class="form login">
      <div class="form_field">
        <label><i class="fa fa-user"></i></label>
        <input type="text" name="username" class="form_input" placeholder="Username" required>
      </div>
      <div class="form_field">
        <label><i class="fa fa-lock"></i></label>
        <input type="password" name="password" class="form_input" placeholder="Password" required>
      </div>
      <div class="form_field">
        <button class="submitButton" type="submit">Iniciar sesion</button>
      </div>
      <div>
        <?php
        /*session_start();
        if (isset($_SESSION['error'])) {
          echo '<p class="error">' . $_SESSION['error'] . '</p>';
          unset($_SESSION['error']);
        }*/
        ?>
      </div>
    </form>
  </div>
</body>

</html>