<?php include 'Config/info.php'?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Css/style-loggin.css" />
    <title>Gestor De Mazda</title>
  </head>
  <body>
        <div class="container">
          <header></header>
          <main>
          <form class="form" action="Config/login.php" method="POST">
            <input class="form__input" type="text" name="username" placeholder="Usuario">
            <input class="form__input" type="password" name="password" placeholder="Contraseña">
            <button class="btn" type="submit">Ingresar</button>
            <?php include 'Php/Message.php'?>
          </form>
          
          </main>
          <footer class="footer">
            <p class="footer__server">Server name: <span style="color:#13fa03;"> <?php echo $server_name; ?></span></p>
            <p class="footer__estatus">Estatus De la Conexión:<span style="color:#13fa03;"> <?php echo $connection_status; ?></span></p>
            <p class="footer__ip">Ip:<span style="color:#13fa03;"> <?php echo $local_ip; ?></span></p>
        </footer>
        </div>
    </div>
  </body>
</html>
