<?php include 'model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kuky Pets - Gestión de Categorías y Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Gestión de Servicios - Kuky Pets</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar"> + Agregar Nuevo</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Id_categoria</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>ID servicio</th>
                            <th>Nombre del servicio</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Asumiendo que la tabla ahora se llama 'categoria_servicio' o similar
                        $stmt = $pdo->query("SELECT * FROM categoria_servicio"); 
                        while ($row = $stmt->fetch()):
                        ?>
                        <tr>
                            <td><?= $row['id_categoria'] ?></td>
                            <td><?= $row['categoria'] ?></td>
                            <td><?= $row['descripcion'] ?></td>
                            <td><?= $row['id_servicio'] ?></td>
                            <td><?= $row['nombre_servicio'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $row['id_servicio'] ?>">Editar</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar<?= $row['id_servicio'] ?>">Eliminar</button>

                                <div class="modal fade" id="modalEditar<?= $row['id_servicio'] ?>" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="accionesServicio.php" method="POST" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark">Editar: <?= $row['nombre_servicio'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark text-start"> 
                                                <input type="hidden" name="id_servicio" value="<?= $row['id_servicio'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">ID Categoría</label>
                                                    <input type="number" name="id_categoria" class="form-control" value="<?= $row['id_categoria'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Categoría</label>
                                                    <input type="text" name="categoria" class="form-control" value="<?= $row['categoria'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Descripción</label>
                                                    <textarea name="descripcion" class="form-control" rows="2" required><?= $row['descripcion'] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nombre del Servicio</label>
                                                    <input type="text" name="nombre_servicio" class="form-control" value="<?= $row['nombre_servicio'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button name="accion" value="editar" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalEliminar<?= $row['id_servicio'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title">Confirmar Eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center text-dark">
                                                <p>¿Seguro que deseas eliminar este servicio?</p>
                                                <h4><?= $row['nombre_servicio'] ?></h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="accionesServicio.php" method="POST">
                                                    <input type="hidden" name="id_servicio" value="<?= $row['id_servicio'] ?>">
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
        <form action="accionesServicio.php" method="POST" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Nuevo Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">ID Categoría</label>
                    <input type="number" name="id_categoria" class="form-control" placeholder="ID de la categoría" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <input type="text" name="categoria" class="form-control" placeholder="Nombre de la categoría" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" placeholder="Breve descripción del servicio" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre del Servicio</label>
                    <input type="text" name="nombre_servicio" class="form-control" placeholder="Ej: Corte de pelo" required>
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