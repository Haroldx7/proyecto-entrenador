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
    <link rel="stylesheet" href="./modules/modificarrutina/modificarrutina.css">
</head>
<div class="modificarrutina">

<div class="carga" style="display: none;">
    <h1>Cargando</h1>
</div>

<div class="cargado">
    <h1>Cargado</h1>
</div>

<h1 id="titulo-dia">Lunes</h1>  
    <div class="caja-rutina">

        <!-- <div class="rutina-contenido">
            <div class="rutina-multimedia">
            <video controls>
                <source src="./uploads/videos/video.mp4">
            </video>
            </div>
            <div class="rutina-info">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam quibusdam saepe culpamolestiae minima earum. Sunt corporis tempore ut et! Optio pariatur temporibus consequatur alias non. Itaque id atque distinctio placeat perferend!</p>
            </div>
            <button>Editar</button>
        </div> -->

        
        <!--  -->
    </div>
    <div class="ventana-crear">
            <form action="" class="agregar-rutina">
            <div class="video">                
            </div>
            <div class="caja-input">
            <label for="">archivo</label>
            <div class="archivo archivo-crear">
                    <input type="file" name="file" id="file" enctype="multipart/form-data" accept=".mp4" required>
                </div>
            </div>
            
            

                <div class="caja-input">
                <label for="">Descripcion</label>
                <input type="text" name="descripcion" placeholder="Nombre usuario">
            </div>
            <input type="hidden" name="dia" id="dia" value="">
            <input type="hidden" name="idcliente" id="idcliente" value="">
            <button>Crear</button>
            <button id="cancelar-crear">Cancelar</button>
            </form>
        </div>




    <div class="ventana-editar">

        <form action="" class="editar-rutina">  
        <div class="video video-editar">  
            </div>  
            <div class="caja-input">
                <label for="">Archivo</label>
            <div class="archivo archivo-editar">
            </div>
            </div>
            <div class="caja-input">
                <label for="">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion-editar" placeholder="Nombre usuario">
            </div>

            <div class="caja-input">
                <label for="">Estado</label>
                <select name="estado" id="">
                    <option value="ACT">ACTiVO</option>
                    <option value="INA">INACTIVO</option>
                </select>
            </div>

            <input type="hidden" name="dia" id="dia-editar" value="">
            <input type="hidden" name="idrutina" id="idrutina" value="">
            <button>Crear</button>
            <button id="cancelar-editar">Cancelar</button>

        </form>

    </div>
        <button class="crear-rutina" id="crear-rutina">Crear</button>
</div>
    <script type="module" src="./modules/modificarrutina/modificarrutinaJs/modificarrutina.js"></script>
