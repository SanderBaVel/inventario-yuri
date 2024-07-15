<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php'
            ?>
    </header>
    <?php 
    include_once "../controller/EmpleadosController.php";

    $empleados = new EmpleadosController();
    $categorias = $empleados->getCategorias();
    ?>

    <form action="registrarEmpleado.php" method="post">
    <div class="container mt-5">
        <div class="row justify-content-center mb-3">
            <div class="col-sm-7">
                <div class="form-group row mb-3">
                    <label for="nombre" class="col-sm-2 col-form-label col-form-label-sm">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nombre" name="nombre">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="apellidos" class="col-sm-2 col-form-label col-form-label-sm">Apellidos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="apellidos" name="apellidos">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="telefono" class="col-sm-2 col-form-label col-form-label-sm">Teléfono</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="telefono" name="telefono">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="direccion" class="col-sm-2 col-form-label col-form-label-sm">Dirección</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="direccion" name="direccion">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="salario" class="col-sm-2 col-form-label col-form-label-sm">Salario</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control form-control-sm" id="salario" name="salario">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="categoria" class="col-sm-2 col-form-label col-form-label-sm">Categoría</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="categoria">
                            <option selected value="">Seleccione el puesto</option>
                            <?php
                            foreach ($categorias as $categoria) {
                                echo "<option value=\"{$categoria['id_categoria']}\">{$categoria['nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
        </div>
    </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>