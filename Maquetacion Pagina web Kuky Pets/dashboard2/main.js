$(document).ready(function() {
    usuario = $('#usuario').DataTable({
        // 1. Esto desactiva la paginación y quita los botones de Anterior/Siguiente
        "paging": false, 
        
        // 2. Esto quita el buscador y el selector de "Mostrar X registros" si tampoco los quieres
        // "searching": false,
        // "info": false,

        "columnDefs":[{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "sProcessing":"Procesando...",
        }
    });

    // Botón Agregar - Abre el modal para crear un nuevo registro
    $('#btNuevo').click(function(){
        $('#usuario').trigger("reset");
        $(".modal-header").css("background-color", "#72d1d6");
        $(".modal-header").css("color", "white");
        $('.modal-title').text("Nuevo Usuario");            
        $('#modalCRUD').modal('show');        
    });

    $('#usuario').submit(function(e){
        e.preventDefault();
        id_usuario = $.trim($('#_usuario').val());
        username = $.trim($('#username').val());
        password = $.trim($('#password').val());
        rol_id = $.trim($('#rol_id').val());
        estado = $.trim($('#estado').val());
        ultimo_login = $.trim($('#ultimo_login').val());
        fecha_creacion = $.trim($('#fecha_creacion').val());
        $.ajax({
                url: "bd/crud.php",
                type: "POST",
                datatype:"json",    
                data:  {id_usuario:id_usuario, username:username, password:password, rol_id:rol_id, estado:estado, ultimo_login:ultimo_login, fecha_creacion:fecha_creacion},
                success: function(data) {
                    var datos = JSON.parse(data);
                    console.log(datos);
                    id_usuario = datos[0].id_usuario;
                    username = datos[0].username;
                    password = datos[0].password;
                    rol_id = datos[0].rol_id;
                    estado = datos[0].estado;
                    ultimo_login = datos[0].ultimo_login;
                    fecha_creacion = datos[0].fecha_creacion;
                    usuario.row.add([id_usuario, username, password, rol_id, estado, ultimo_login, fecha_creacion]).draw();

                }

        $("#modalCRUD").modal("hide")
        });
 });
 });