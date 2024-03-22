
<?php 
session_start();

if(isset($_SESSION['usuario']['rol']) == 2){
    $id = $_SESSION['usuario']['id'];
    $nombre = $_SESSION['usuario']['nombre'];
    $rol = $_SESSION['usuario']['rol'];
}


if (isset($_GET['cerrar']) == 'true'){ 
  session_destroy();
  header ("Location: ./index.php?home");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css"/>
  <title>Pagina</title>
</head>

<body>
  <header>
    <div class="caja-header">

    <h3>
    Esto es umn header   
    </h3>
    <div class="botones">

    <?php 
      if($_SESSION){
        if($_SESSION['usuario']['rol'] == 1){
          if(isset($_GET['home'])){
            echo '<button id="admin">administrador</button>';
          }else if(isset($_GET['admin'])){
            echo '<button id="home" >home</button>';
          }else{
            echo '<button id="admin" >administrador</button>';
          }
          echo '<button id="cerrar">cerrar</button>';
        }else if(($_SESSION['usuario']['rol']==2)){
          if(isset($_GET['home'])){
            echo '<button id="cliente">cliente</button>';
          }else if(isset($_GET['cliente'])){
            echo '<button id="home" >home</button>';
          }else if(isset($_GET['rutina'])){
            echo '<button id="home" >home</button>';
          }
          echo '<button id="cerrar">cerrar</button>';
        }
      } else{
        if(isset($_GET['login'])){
          echo '<button id="home" >home</button>';
        }else if(isset($_GET['home'])){
          echo '<button id="admin">iniciar</button>';
        }
      }
    ?>
    
    
    <!-- <button id="catalogo">catalogo</button> -->
    
    </div>
    </div>

  </header>



  <div class="root">  
    <?php
    if (isset($_GET['home'])) {
      include('./modules/home/home.php');
    } else if(isset($_GET['login'])){
      include('./modules/login/login.php');
    }else if(isset($_GET['catalogo'])){
      include('./modules/catalogo/catalogo.php');
    }else if(isset($_GET['admin'])){
      include('./modules/admin/admin.php');
    }else if(isset($_GET['agregar'])){
      include('./modules/agregar/agregar.php');
    }else if(isset($_GET['consultar'])){
      include('./modules/consultar/consultar.php');
    }else if(isset($_GET['cliente']) || isset($_GET['idusario'])){
      include('./modules/cliente/cliente.php');
      
    }else if(isset($_GET['rutina'])){
      include('./modules/rutina/rutina.php');
    }else if(isset($_GET['asignar'])){
      include('./modules/asignar/asignar.php');
    }else if(isset($_GET['colocarrutina']) && isset($_GET['idcliente'])){
      include('./modules/colocarrutina/colocarrutina.php');
    }else if(isset($_GET['modificarrutina'])){
      include('./modules/modificarrutina/modificarrutina.php');
    }else if(isset($_GET['personalizar'])){
      include('./modules/personalizar/personalizar.php');
    }
    else{
      header('Location: ./index.php?home');
    }


    ?>
  </div>
  <footer>[Nombre de tu Empresa] es una empresa comprometida con la excelencia y la satisfacción del cliente. Nos esforzamos por ofrecer [descripción breve de los servicios/productos que proporcionas] de la más alta calidad para satisfacer tus necesidades.

Dirección: [Dirección de tu Empr</footer>
  <script type="module" src="./indexJs/index.js"></script>
</body>
</html>