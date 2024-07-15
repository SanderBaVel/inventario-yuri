<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
  <title>Document</title>
</head>
<?php
include_once "../controller/EmpleadosController.php";
$empleados = new EmpleadosController();
$categorias = $empleados->getCategorias();
?>

<body>
  <header>
    <?php
    include_once 'components/header.php'
      ?>
  </header>
<section>
<div class="container mt-5">
    <div class="d-flex justify-content-center">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Categoria</th>
            <th scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categorias as $categoria): ?>
            <tr id="row-<?php echo htmlspecialchars($categoria['id_categoria']); ?>">
              <th scope="row"><?php echo htmlspecialchars($categoria['id_categoria']); ?></th>
              <td><?php echo htmlspecialchars($categoria['nombre']); ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <button type="button" class="btn btn-danger"
                    onclick="deleteCategoria(<?php echo htmlspecialchars($categoria['id_categoria']); ?>)">Eliminar</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModal" data-id="<?php echo $categoria['id_categoria']; ?>" data-name="<?php echo $categoria['nombre']; ?>">Actualizar</button>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</section>
  
  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    <div class="form-group">
                        <label for="categoria-name" class="col-form-label">Nombre de la Categoría:</label>
                        <input type="text" class="form-control" id="categoria-name">
                    </div>
                    <input type="hidden" id="categoria-id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/ajax.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>