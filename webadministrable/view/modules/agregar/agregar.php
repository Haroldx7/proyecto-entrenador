<head>
    <link rel="stylesheet" href="./modules/agregar/agregar.css">
</head>
<div class="agregar">


    <div class="caja-agregar">
        <form action="" class="form-agregar">
            <h1>Agregar cliente</h1>
            <div class="caja-input">
                <label for="">Nombres usuario</label>
                <input type="text" name="nombres" placeholder="Nombre usuario" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Apellidos usuario</label>
                <input type="text" name="apellidos" placeholder="Nombre usuario" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Correo usuario</label>
                <input type="mail" name="correo" placeholder="Correo" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Etiqueta usuario</label>
                <input type="text" name="etiqueta" placeholder="Etiqueta" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Contraseña usuario</label>
                <input type="password" name="contrasena" placeholder="Contraseña" autocomplete="off" required>
            </div>
            
            <div class="imagen">
                <div class="imagen-perfil"></div>
                <input type="file" name="file" id="file" enctype="multipart/from-data" accept=".jpg, .jpeg, .png">
            </div>
            <button id="btn-e">enviar</button>


        </form>


    </div>
</div>
    <script type="module" src="./modules/agregar/agregarJs/agregar.js"></script>
