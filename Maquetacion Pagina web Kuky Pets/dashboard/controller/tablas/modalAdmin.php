
<!-- Inicio Modales Usuarios -->
<div class="modal fade" id="EditarAdmin<?php echo $filas['id_admin']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:black;" class="modal-title" id="exampleModalLabel">Editar Deportistas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../controller/equiposcontroller.php?request=editU" method="POST">
                <div class="mb-3 text-right">
                    <label for="recipient-name" class="col-form-label">Código</label>
                    <input type="text" name="codigo" class="form-control" value="<?php echo $filas["codigo"] ?>" disabled>
                    <input type="hidden" name="codigo" class="form-control" value="<?php echo $filas["codigo"] ?>">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $filas["nombre"] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Colegios</label>
                    <input type="text" name="colegios" class="form-control" value="<?php echo $filas["colegios"] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Código de competecia</label>
                    <input type="text" name="codigo_competecia" class="form-control" value="<?php echo $filas["codigo_competecia"] ?>" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
            </div>
        </div>
        </form>
    </div>
<!-- Fin Modales Usuarios -->

<!-- Modal de Agregar Usuario -->
<div id="agregarEquipos" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <form action="../../controller/equiposcontroller.php?request=addU" method="POST">
            <div class="modal-header">						
                <h4 style="color: black;" class="modal-title">DATOS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
                               
                <div class="form-group">
                    <label>Nombre:</label>
                    <input name="nombre"style="background-color: aliceblue;" type="text" class="form-control" required>
                </div>	
                <div class="form-group">
                    <label>Colegios:</label>
                    <input name="colegios"style="background-color: aliceblue;" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Código</label>
                    <input name="codigo"style="background-color: aliceblue;" type="text" class="form-control" required>
                </div> 
                <div class="form-group">
                    <label>Código de competecia:</label>
                    <input name="codigo_competecia"style="background-color: aliceblue;" type="text" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input style="background-color: rgb(250, 1, 1);" type="submit" class="btn btn-success" value="Aceptar">
            </div>
        </form>
    </div>
</div>
</div>
<!-- Fin de la Modal de Agregar Usuario -->
 <!-- Inicio de Modal Eliminar Usuario -->

<!-- <div id="EliminarEquipos<?php echo $registro['codigo']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../controller/equiposController.php?request=deleteU&deleteU=<?php echo $registro['codigo']; ?>" method="POST">
                <div class="modal-header">
                    <h4 style="color:black" class="modal-title">Borrar Usuario</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este registro?</p>
                    <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                   <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Fin de Modal Eliminar Usuario -->
