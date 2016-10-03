<?php
  $nombreURL = "http://www.pymesv.com/cliente03w/producto.php";
            
  $nombreJSON = file_get_contents($nombreURL);
  
  $jnombres = json_decode($nombreJSON);
  
  $init_path = "product_img/";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mail</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="dist/css/ratchet.min.css">
    <link rel="stylesheet" href="dist/css/ratchet-theme-ios.min.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="dist/js/ratchet.min.js"></script>
  </head>

  <body>
    <header class="bar bar-nav">
      <h1 class="title">Mi Tienda</h1>
    </header>

    <div class="content">

      <ul class="table-view">
        <li class="table-view-cell media">
          <a class="navigate-right" href="index.php" data-transition="slide-in">
            <span class="media-object icon icon-pages pull-left"></span>
            <div class="media-body">
              Productos
            </div>
          </a>
        </li>
      </ul>   

    <div class="row">
    <?php
            foreach($jnombres as $jnom) {
              $producto = '<div class="col-md-4">
                      <div class="panel panel-primary">
                        <div class="panel-heading"><center>'.$jnom->nombre.'</center></div>
                        <div class="panel-body">
                          <center><img src="'.$init_path.$jnom->path_image.'" class="img-circle" alt="Error al cargar imagen" width="250" height="250"></center>
                          <div class"form-group">
                            <p>DESCRIPCION: '.$jnom->descripcion.'</p>
                            <p>MARCA: '.$jnom->marca.'</p>
                            <p>PRECIO: '.$jnom->precio.'</p>
                          </div>
                        </div>
                        <div class="panel-footer"><center><div class="divButton"><button class="btn btn-primary" id="'.$jnom->id_producto.'" onclick="AgregarProducto(this.id)">Agregar a carrito</button></div></center></div>
                      </div>
                    </div>';
              echo $producto;
            }
    ?>
    </div>

    <!-- Compose modal -->
    <div id="composeModal" class="modal">
      <header class="bar bar-nav">
        <a class="btn btn-link pull-right" href="#composeModal">
          <strong>Send</strong>
        </a>
        <a class="btn btn-link pull-left" href="#composeModal">
          Cancel
        </a>
        <h1 class="title">New message</h1>
      </header>

      <div class="content">
        <form class="input-group">
          <input type="text" placeholder="To:">
          <input type="email" placeholder="From:">
          <input type="text" placeholder="Subject:">
          <textarea rows="20"></textarea>
        </form>
      </div>
    </div><!-- /.modal -->
  </body>
</html>
