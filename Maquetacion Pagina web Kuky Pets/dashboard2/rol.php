<?php include 'model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kuky Pets - Gestión de Roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Roles de Usuario - Kuky Pets</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar"> + Nuevo Rol</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Id_rol</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Ajusta el nombre de la tabla si es 'rol' o 'roles'
                        $stmt = $pdo->query("SELECT * FROM rol");
                        while ($row = $stmt->fetch()):
                        ?>
                        <tr>
                            <td><?= $row['id_rol'] ?></td>
                            <td><strong><?= $row['nombre'] ?></strong></td>
                            <td><?= $row['descripcion'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $row['id_rol'] ?>">Editar</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar<?= $row['id_rol'] ?>">Eliminar</button>

                                <div class="modal fade" id="modalEditar<?= $row['id_rol'] ?>" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="accionesRol.php" method="POST" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark">Editar Rol: <?= $row['nombre'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark text-start"> 
                                                <input type="hidden" name="id_rol" value="<?= $row['id_rol'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">Nombre del Rol</label>
                                                    <input type="text" name="nombre" class="form-control" value="<?= $row['nombre'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Descripción</label>
                                                    <textarea name="descripcion" class="form-control" rows="3" required><?= $row['descripcion'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button name="accion" value="editar" class="btn btn-primary">Actualizar Rol</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalEliminar<?= $row['id_rol'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title">Eliminar Rol</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center text-dark">
                                                <p>¿Estás seguro de eliminar el rol?</p>
                                                <h4><?= $row['nombre'] ?></h4>
                                                <small class="text-muted">Nota: Esto puede afectar a los usuarios asociados.</small>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="accionesRol.php" method="POST">
                                                    <input type="hidden" name="id_rol" value="<?= $row['id_rol'] ?>">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button name="accion" value="eliminar" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="accionesRol.php" method="POST" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Crear Nuevo Rol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nombre del Rol</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ej: Administrador, Veterinario..." required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" placeholder="Define los permisos o alcances de este rol" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button name="accion" value="agregar" class="btn btn-primary">Guardar Rol</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>