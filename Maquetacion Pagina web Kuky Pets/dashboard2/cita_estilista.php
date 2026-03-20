<?php include 'model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kuky Pets - Gestión de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Control de Citas - Kuky Pets</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar"> + Nueva Cita</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Id_cita</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Id_mascota</th>
                            <th>Id_servicio</th>
                            <th>Id_empleado</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Ajustamos la consulta a la tabla 'cita'
                        $stmt = $pdo->query("SELECT * FROM citas"); 
                        while ($row = $stmt->fetch()):
                        ?>
                        <tr>
                            <td><?= $row['id_cita'] ?></td>
                            <td><?= $row['fecha'] ?></td>
                            <td><?= $row['hora'] ?></td>
                            <td><?= $row['id_mascota'] ?></td>
                            <td><?= $row['id_servicio'] ?></td>
                            <td><?= $row['id_empleado'] ?></td>
                            <td><?= $row['estado'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $row['id_cita'] ?>">Editar</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar<?= $row['id_cita'] ?>">Eliminar</button>

                                <div class="modal fade" id="modalEditar<?= $row['id_cita'] ?>" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="accionesCita.php" method="POST" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark">Editar Cita #<?= $row['id_cita'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark text-start"> 
                                                <input type="hidden" name="id_cita" value="<?= $row['id_cita'] ?>">
                                                
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Fecha</label>
                                                        <input type="date" name="fecha" class="form-control" value="<?= $row['fecha'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Hora</label>
                                                        <input type="time" name="hora" class="form-control" value="<?= $row['hora'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">ID Mascota</label>
                                                    <input type="number" name="id_mascota" class="form-control" value="<?= $row['id_mascota'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">ID Servicio</label>
                                                    <input type="number" name="id_servicio" class="form-control" value="<?= $row['id_servicio'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">ID Empleado</label>
                                                    <input type="number" name="id_empleado" class="form-control" value="<?= $row['id_empleado'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Estado</label>
                                                    <input type="text" name="estado" class="form-control" value="<?= $row['estado'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button name="accion" value="editar" class="btn btn-primary">Actualizar Cita</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalEliminar<?= $row['id_cita'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title">Anular Cita</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center text-dark">
                                                <p>¿Estás seguro de que deseas eliminar la cita programada para el día?</p>
                                                <h4><?= $row['fecha'] ?> a las <?= $row['hora'] ?></h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="accionesCita.php" method="POST">
                                                    <input type="hidden" name="id_cita" value="<?= $row['id_cita'] ?>">
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
        <form action="accionesCita.php" method="POST" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Programar Nueva Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hora</label>
                        <input type="time" name="hora" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Mascota</label>
                    <input type="number" name="id_mascota" class="form-control" placeholder="ID de la mascota" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Servicio</label>
                    <input type="number" name="id_servicio" class="form-control" placeholder="ID del servicio" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Empleado</label>
                    <input type="number" name="id_empleado" class="form-control" placeholder="ID del peluquero/veterinario" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <input type="text" name="estado" class="form-control" placeholder="Ej: Programada, Completada" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button name="accion" value="agregar" class="btn btn-primary">Guardar Cita</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>