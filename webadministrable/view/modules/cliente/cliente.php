<?php 
    if(isset($_SESSION['usuario']['rol']) && $_SESSION['usuario']['rol']== 2){
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
    <link rel="stylesheet" href="./modules/cliente/cliente.css">
</head>



<div class="cliente">
<!-- 
<div class="caja-perfil">
        <div class="caja-imagen">
            <div class="sub-imagen">
                <img src="" alt="">
            </div>
            <div class="sub-info">

            </div>
        </div>


        <div class="caja-rutina">
            <div class="sub-rutina">
                <div class="dia">Lunes</div>
                <div class="dia">Lunes</div>
                <div class="dia">Lunes</div>
                <div class="dia">Lunes</div>
                <div class="dia">Lunes</div>
                <div class="dia">Lunes</div>

            </div>
        </div>
    </div> -->




</div>
    <script type="module" src="./modules/cliente/clienteJs/cliente.js"></script>
