<?php include '../Config/info.php'?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Css/style-menu.css" />
    <title>Menu</title>
  </head>
  <body>
    <div class="container">
      <header>
      <p>Usuario: <span style="color:#13fa03;"><?php echo htmlspecialchars($usuario); ?></span></p>
        <p>Fecha</p>
      </header>
      <main>
      
      <div class="box_perfil">
        <img class="img_perfil" src="../Img/ImgPerfil.png" alt="ImagenDePerfil">
        <img class="logo_mazda" src="../Img/logoMazdaCuadrado.png" alt="LogoMazda">
      </div>

      <div class="box_messages">
        <img class="img_messages" src="../Img/SectionMessages.png" alt="ImagenMessage">
      </div>

      <div class="box_container">
        <div class="section__box">
        <a href="MenuUsuario.php">
          <div class="box__images">
            <img class="img__box" src="../Img/Nota_Prestamo.png" />
          </div>
        </a>  
          <div class="box__images">
            <img class="img__box" src="../Img/Sku_Herramienta.png" />
          </div>
          <div class="box__images">
            <img class="img__box" src="../Img/Inventario.png" />
          </div>
        </div>
        <div class="section__box">
          <div class="box__images">
            <img class="img__box" src="../Img/Devoluciones_Prestamos.png" />
          </div>
          <div class="box__images">
            <img class="img__box" src="../Img/Herramientas_Stack.png" />
          </div>
          <div class="box__images">
            <img class="img__box" src="../Img/Busqueda_Sku.png" />
          </div>
        </div>
        <div class="section__box">
          <div class="box__images">
            <img class="img__box" src="../Img/Alto_Codigo.png" />
          </div>
        </div>
      </div>
        
       
      </main>
      <footer class="footer">
            <p  class="footer__mensajeria">Mensajeria:</p>
            <p class="footer__server">Server name: <span style="color:#13fa03;"> <?php echo $server_name; ?></span></p>
            <p class="footer__estatus">Estatus De la Conexión:<span style="color:#13fa03;"> <?php echo $connection_status; ?></span></p>
            <p class="footer__ip">Ip:<span style="color:#13fa03;"> <?php echo $local_ip; ?></span></p>
      </footer>
    </div>
  </body>
</html>
