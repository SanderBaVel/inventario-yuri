$(document).ready(function () {
    $('#updateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var id = button.data('id');
        var name = button.data('name');
        var apell = button.data('apellido');
        var telefono = button.data('telefono');
        var direccion = button.data('direccion');
        var salario = button.data('salario');
        var categoria = button.data('categoria');

        // Actualiza los campos del modal
        var modal = $(this);
        modal.find('.modal-body #empleados-id').val(id);
        modal.find('.modal-body #empleados-name').val(name);
        modal.find('.modal-body #empleados-apellido').val(apell);
        modal.find('.modal-body #empleados-telefono').val(telefono);
        modal.find('.modal-body #empleados-direccion').val(direccion);
        modal.find('.modal-body #empleados-salario').val(salario);
        modal.find('.modal-body #empleados-categoria').val(categoria);
    });

    $('#saveChanges').click(function () {
        var id = $('#empleados-id').val();
        var nombre = $('#empleados-name').val();
        var apellido = $('#empleados-apellido').val();
        var telefono = $('#empleados-telefono').val();
        var direccion = $('#empleados-direccion').val();
        var salario = $('#empleados-salario').val();
        var categoria = $('#empleados-categoria').val();

        $.ajax({
            url: 'actualizarEmpleados.php',
            type: 'POST',
            data: {
                id: id,
                nombre: nombre,
                apellido: apellido,
                telefono: telefono,
                direccion: direccion,
                salario: salario,
                categoria: categoria
            },
            success: function (response) {
                // Manejar la respuesta
                alert('Empleado actualizado exitosamente');
                location.reload();
            },
            error: function () {
                alert('Error al actualizar el empleado');
            }
        });
    });
});

function deleteEmpleado(id) {
  if (confirm('¿Estás seguro de que deseas dar de baja a este empleado?')) {
    $.post('deleteEmpleado.php', { id: id }, function (response) {
      try {
        var result = JSON.parse(response);
        if (result.status === 'success') {
          $('#row-' + id).remove();
        } else {
          alert('Error: ' + result.message);
        }
      } catch (e) {
        alert('Error al procesar la respuesta del servidor.');
        console.error(response);
      }
    }).fail(function (jqXHR, textStatus, errorThrown) {
      alert('Error de comunicación con el servidor.');
      console.error(textStatus, errorThrown);
    });
  }
}