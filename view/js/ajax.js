$(document).ready(function() {
    $('#updateModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract info from data-* attributes
        var name = button.data('name');

        var modal = $(this);
        modal.find('#categoria-id').val(id);
        modal.find('#categoria-name').val(name);
    });

    $('#saveChanges').click(function() {
        var id = $('#categoria-id').val();
        var name = $('#categoria-name').val();

        $.ajax({
            url: 'actualizarCategoria.php',
            type: 'POST',
            data: {
                id: id,
                nombreDeCategoria: name
            },
            success: function(response) {
                // Manejar la respuesta
                alert('Categoría actualizada exitosamente');
                location.reload();
            },
            error: function() {
                alert('Error al actualizar la categoría');
            }
        });
    });
});

    function deleteCategoria(id) {
      if (confirm('¿Estás seguro de que deseas eliminar esta categoría?')) {
        $.post('deleteCategoria.php', { id: id }, function (response) {
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
