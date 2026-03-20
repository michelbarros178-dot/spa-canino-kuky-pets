<?php include 'model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kuky Pets - Gestión de Mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Mascotas Kuky Pets</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar"> + Agregar Mascota</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Id_mascota</th>
                            <th>Id_cliente</th>
                            <th>Nombre</th>
                            <th>Raza</th>
                            <th>Edad</th>
                            <th>peso</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Asumiendo que la tabla se llama 'mascotas'
                        $stmt = $pdo->query("SELECT * FROM mascotas");
                        while ($row = $stmt->fetch()):
                        ?>
                        <tr>
                            <td><?= $row['id_mascota'] ?></td>
                            <td><?= $row['id_cliente'] ?></td>
                            <td><?= $row['nombre'] ?></td>
                            <td><?= $row['raza'] ?></td>
                            <td><?= $row['edad'] ?></td>
                            <td><?= $row['peso'] ?> kg</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $row['id_mascota'] ?>">Editar</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar<?= $row['id_mascota'] ?>">Eliminar</button>

                                <div class="modal fade" id="modalEditar<?= $row['id_mascota'] ?>" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="accionesMascota.php" method="POST" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark">Editar Mascota: <?= $row['nombre'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark text-start"> 
                                                <input type="hidden" name="id_mascota" value="<?= $row['id_mascota'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">ID Cliente (Dueño)</label>
                                                    <input type="number" name="id_cliente" class="form-control" value="<?= $row['id_cliente'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nombre de la Mascota</label>
                                                    <input type="text" name="nombre" class="form-control" value="<?= $row['nombre'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Raza</label>
                                                    <input type="text" name="raza" class="form-control" value="<?= $row['raza'] ?>" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Edad</label>
                                                        <input type="text" name="edad" class="form-control" value="<?= $row['edad'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Peso (kg)</label>
                                                        <input type="number" step="0.1" name="peso" class="form-control" value="<?= $row['peso'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button name="accion" value="editar" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalEliminar<?= $row['id_mascota'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title">Eliminar Mascota</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center text-dark">
                                                <p>¿Estás seguro de eliminar a:</p>
                                                <h4><?= $row['nombre'] ?></h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="accionesMascota.php" method="POST">
                                                    <input type="hidden" name="id_mascota" value="<?= $row['id_mascota'] ?>">
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
        <form action="accionesMascota.php" method="POST" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Nueva Mascota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">ID Cliente</label>
                    <input type="number" name="id_cliente" class="form-control" placeholder="ID del dueño" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre de la mascota" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Raza</label>
                    <input type="text" name="raza" class="form-control" placeholder="Ej: Labrador, Criollo..." required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Edad</label>
                        <input type="text" name="edad" class="form-control" placeholder="Ej: 2 años" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Peso (kg)</label>
                        <input type="number" step="0.1" name="peso" class="form-control" placeholder="0.0" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button name="accion" value="agregar" class="btn btn-primary">Registrar Mascota</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>