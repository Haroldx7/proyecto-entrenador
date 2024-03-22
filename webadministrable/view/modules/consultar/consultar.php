<head>
    <link rel="stylesheet" href="./modules/consultar/consultar.css">
</head>
<div class="consultar">
    
    <div class="caja-consulta">
        <form ction="" class="form-consultar">
            <h1>Consultar</h1>
            <div class="caja-input">
                <label for="">Nombre</label>
                <input type="text" name="nombres" placeholder="Nombre usuario" autocomplete="off">
            </div>
            <div class="caja-input">
                <label for="">Correo</label>
                <input type="text" name="correo" placeholder="Apellido usuario" autocomplete="off">
            </div>
            <div class="caja-input">
                <label for="">Etiqueta</label>
                <input type="text" name="etiqueta" placeholder="Etiqueta" autocomplete="off">
            </div>
            <div class="caja-input">
                <label for="">Estado</label>
                <select name="estado" id="">
                    <option value="" select>Seleccionar</option>
                    <option value="ACT">Activo</option>
                    <option value="INA">Inactivo</option>
                </select>
            </div>
            <input type="hidden" name="consultar" value="cosnultar">
            <button id="btn-e">enviar</button>
        </form>
    </div>   
    
    <div class="caja-busqueda">
        <input type="text" id="busqueda" placeholder="Buscar">
    </div>

    <div class="tabla-consulta">
        <h1>Clientes</h1>
        <div class="tabla-info">
        <div class="datos-cabeza">
                <span>Id</span>
                <span>Nombre</span>
                <span>Correo</span>
                <span>Etiqueta</span>
                <span>Estado</span>
                <span>Editar</span>
            </div>
        </div>
        <div class="tabla">
        </div>
    </div>


    <div class="caja-editar">
        <form action="" class="form-editar">
            <h1>Editar</h1>
            <div class="caja-imagen"><img src="" id="imagen-cliente" alt=""></div>
            <input type="file" name="file" id="file" enctype="multipart/from-data" accept=".jpg, .jpeg, .png" placeholder="Nombre usuario">
            <div class="caja-input">
                <label for="">Idusuario</label>
                <input type="text" class="input" name="idusuario" placeholder="Nombre usuario" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Nombres</label>
                <input type="text" name="nombres" class="input"  placeholder="Nombre usuario" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Apellidos</label>
                <input type="text" name="apellidos" class="input"  placeholder="Nombre usuario" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Correo</label>
                <input type="email" name="correo" class="input"  placeholder="Nombre usuario" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Contraseña</label>
                <input type="password" name="contrasena" class="input"  placeholder="Nombre usuario" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">etiqueta</label>
                <input type="text" name="etiqueta" class="input"  placeholder="Nombre usuario" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Rol</label>
                <input type="text" name="rol" class="input"  placeholder="Nombre usuario" autocomplete="off" required>
            </div>
            <div class="caja-input">
                <label for="">Estado</label>
                <select name="estado" class="input"  id="estado">
                    <option value="ACT">Activo</option>
                    <option value="INA">Inactivo</option>
                </select>
            </div>
            <input type="hidden" name="editar">
            <button>Actualizar</button>
            <button id="cancelar-editar">Cancelar</button>
        </form>
    </div>
</div>
    <script type="module" src="./modules/consultar/consultarJs/consultar.js"></script>
