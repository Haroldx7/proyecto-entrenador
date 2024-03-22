<?php 
    if(isset($_SESSION['usuario']['rol']) && $_SESSION['usuario']['rol']== 1){
        $saludo = true;
    }else{
        header ("Location: index.php?login");
    }

    if (isset($_GET['admin']) && $_GET['admin'] == 'd'){
        session_destroy();
        header ("Location: index.php?login");
    }
    ?>
<head>
    <link rel="stylesheet" href="./modules/asignar/asignar.css">
</head>
<div class="asignar">
    <h1>Clientes</h1>

    <div class="contenedor">
        <div class="subcontenedor">
<!-- 
            <div class="carta-cliente">
                <div class="imagen-cliente">
                    <div class="caja-imagen">
                        <img src="./uploads/pika.png" alt="">
                    </div>
                </div>
                <div class="info-cliente">
                    <p>Lorem</p>
                    <p>Lorem</p>
                    <p>Lorem</p>
                    <p>Lorem</p>
                    <p>Lorem</p>
                    <p>Lorem</p>
                </div>
                <button id="btn-cliente" value="1">rutina</button>
            </div>
             -->
            

        </div>
    </div>

    <!-- <button id="btn-cliente" value="2">Cliente</button> -->
</div>
    <script type="module" src="./modules/asignar/asignarJs/asignar.js"></script>
