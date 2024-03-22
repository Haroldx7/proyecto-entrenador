<head>
    <link rel="stylesheet" href="./modules/admin/admin.css">
</head>
<body>
<div class="admin">
    
    <?php 
    if(isset($_SESSION['usuario']['rol']) && $_SESSION['usuario']['rol']== 1){
        $saludo = true;
    }else{
        header ("Location: index.php?login");
    }

   
    ?>

    <div class="panel-control">
        <h1>Panel de control</h1>
        <div class="caja-panel">
            <span class="agregar" id="agregar">Agregar</span>
            <span class="consultar" id="consultar">Consultar</span>
            <span class="asignar" id="asignar">Asignar</span>
            <span class="personalizar" id="personalizar">Personalizar</span>
        </div>
    </div>

</div>

<script type="module" src="./modules/admin/adminJs/admin.js"></script>
</body>
