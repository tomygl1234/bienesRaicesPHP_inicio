<?php  

//base de datos
require '../../includes/config/database.php';
$db = conectarDb();

//Arreglo con mensaje de errores

$errores = [];
//Ejecutar el mensaje despues de que el usuario envia el formulario

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo "<pre>";
    var_dump($_POST);
    echo "<pre>";
}
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId = $_POST['vendedor'];

    if(!$titulo){
        $errores[] = "Debes añadir un titulo";
    }
    if(!$precio){
        $errores[] = "El precio es obligatorio";
    }
    if(!$descripcion){
        $errores[] = "La descripción es obligatoria";
    }
    if(($descripcion)< 50){
        $errores[] = "El precio es obligatoria y debe tener almenos 50 caracteres";
    }
    if(!$habitaciones){
        $errores[] = "El número de habitaciones es obligatorio";
    }
    if(!$wc){
        $errores[] = "El número de baños es obligatorio";
    }
    if(!$estacionamiento){
        $errores[] = "El número de cocheras es obligatorio";
    }
    echo " <pre>";
    if(!$vendedorId){
        $errores[] = "Asigna un vendedor, obligatorio!";
    }
    echo " <pre>";
    var_dump($errores);
    echo " <pre>";
    exit;

    //insertar en la base de datos
    $query = " INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento,
     vendedorId) VALUES ( '$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId' )";

    //  echo $query;

    $resultado = mysqli_query($db, $query);

    if($resultado){
        echo "Insertado Correctamente";
    }
    


require '../../includes/funciones.php';
incluirTemplate('header');   ?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin/propiedades/index.php" class="boton boton-verde">Volver</a>
        <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpg, image/png, image/webp" >

                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" id="descripcion"></textarea>

                
            </fieldset>
            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 2" min="1" max="9">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 1" min="1" max="9">

            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">--Seleccionar--</option>
                    <option value="1">Tomás</option>
                    <option value="2">Arena</option>
                </select>
            </fieldset>

            <input type="submit" class="boton boton-verde" value="Publicar propiedad">
        </form>
    </main>

    <?php  incluirTemplate('footer')   ?>