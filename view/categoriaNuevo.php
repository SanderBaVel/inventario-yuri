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
    <form action="callFunction.php" method="post" onsubmit="return validateForm()">
    <div class="container mt-5">
        <div class="row justify-content-center mb-3">
            <div class="col-sm-7">
                <div class="form-group row mb-3">
                    <label for="nombre" class="col-sm-2 col-form-label col-form-label-sm">Categoria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nomCategoria" name="NomCategoria">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
        </div>
    </div>
    </div>
    </form>
    

    <script>
        function validateForm() {
            var categoria = document.getElementById('nomCategoria').value;

            if (categoria === "") {
                alert("Por favor, rellena todos los campos.");
                return false;
            }
            return true;
        }
    
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>