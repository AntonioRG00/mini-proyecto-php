$(document).ready(function () {
    var dataTable = $('#tablaperros').DataTable({
        "aoColumnDefs": [{ //Quitamos el sort a la última fila
            "bSortable": false,
            "aTargets": [-1]
        }],
        "language": { //Traducciones
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },

        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "ajax-table.php",
            type: "post",
            error: function (jqXHR, textStatus, errorThrown) {
                $("#tablaperros").append('<tfoot class="tfoot-dark"><tr><th colspan="5">No devolvió datos la consulta</th></tr></tfoot>');
                console.log(jqXHR.responseText);
            }
        }
    });

    //Evento rowEdit
    $('#tablaperros').on('click', 'tbody td:not(:first-child)', function (e) {
        //Mismo
    });
});