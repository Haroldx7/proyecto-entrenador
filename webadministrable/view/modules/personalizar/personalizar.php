<head>
    <link rel="stylesheet" href="./modules/personalizar/personalizar.css">
</head>
<div class="personalizar">

    <h1>Personalizar</h1>
    <div class="caja-personalizar">
        <div class="caja-imagen"><img  id="imagen-prevista" alt=""></div>
        <input type="file" class="imagen" id="imagen" name="imagen" enctype="multipart/form-data" accept=".jpg, .jpeg, .png">
        <div class="caja-info"><textarea name="" id="texto" cols="30" rows="10"></textarea></div>
        <div class="caja-fondo"><img  id="fondo-prevista" alt=""></div>
        <input type="file" class="fondo" id="fondo" name="fondo"  enctype="multipart/form-data" accept=".jpg, .jpeg, .png">
        <button id="personalizacion">Guardar</button>
    </div>
</div>
    <script type="module" src="./modules/personalizar/personalizarJs/personalizar.js"></script>
