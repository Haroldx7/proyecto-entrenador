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
    <link rel="stylesheet" href="./modules/rutina/rutina.css">
</head>
<div class="rutina">




    <h1 id="dia-rutina"></h1>  
    <div class="caja-rutina">

    
    </div>





</div>
    <script type="module" src="./modules/rutina/rutinaJs/rutina.js"></script>
