<?php include 'model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kuky Pets - Gestión de Cancelaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Cancelación de Citas - Kuky Pets</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar"> + Registrar Cancelación</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>citas_id</th>
                            <th>Motivo de la cancelación</th>
                            <th>Fecha cancelacion</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Asumiendo que la tabla se llama 'cancelaciones'
                        $stmt = $pdo->query("SELECT * FROM cancelar_cita");
                        while ($row = $stmt->fetch()):
                        ?>
                        <tr>
                            <td><?= $row['id_cancelacion'] ?></td>
                            <td><?= $row['id_cita'] ?></td>
                            <td><?= $row['motivo'] ?></td>
                            <td><?= $row['fecha_cancelacion'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $row['id_cancelacion'] ?>">Editar</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar<?= $row['id_cancelacion'] ?>">Eliminar</button>

                                <div class="modal fade" id="modalEditar<?= $row['id_cancelacion'] ?>" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="accionesCancelacion.php" method="POST" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark">Editar Cancelación #<?= $row['id_cancelacion'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark text-start"> 
                                                <input type="hidden" name="id_cancelacion" value="<?= $row['id_cancelacion'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">ID de la Cita</label>
                                                    <input type="number" name="id_cita" class="form-control" value="<?= $row['id_cita'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Motivo de la cancelación</label>
                                                    <textarea name="motivo" class="form-control" rows="3" required><?= $row['motivo'] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Fecha de Cancelación</label>
                                                    <input type="datetime-local" name="fecha_cancelacion" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($row['fecha_cancelacion'])) ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button name="accion" value="editar" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalEliminar<?= $row['id_cancelacion'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title">Confirmar Eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center text-dark">
                                                <p>¿Seguro que deseas eliminar el registro de esta cancelación?</p>
                                                <h4>Cita ID: <?= $row['citas_id'] ?></h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="accionesCancelacion.php" method="POST">
                                                    <input type="hidden" name="id_cancelacion" value="<?= $row['id_cancelacion'] ?>">
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
        <form action="accionesCancelacion.php" method="POST" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Nueva Cancelación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">ID de la Cita</label>
                    <input type="number" name="citas_id" class="form-control" placeholder="Ingrese el ID de la cita" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Motivo de la cancelación</label>
                    <textarea name="motivo" class="form-control" placeholder="Describa el motivo..." rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de Cancelación</label>
                    <input type="datetime-local" name="fecha_cancelacion" class="form-control" value="<?= date('Y-m-d\TH:i') ?>" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button name="accion" value="agregar" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>