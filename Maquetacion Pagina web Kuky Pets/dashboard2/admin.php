<?php include 'model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kuky Pets - Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Usuarios Kuky Pets</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar"> + Agregar Nuevo</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Último Login</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $pdo->query("SELECT * FROM usuario");
                        while ($row = $stmt->fetch()):
                        ?>
                        <tr>
                            <td><?= $row['id_usuario'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['rol_id'] ?></td>
                            <td>
                                <span class="badge <?= $row['estado'] == 'activo' ? 'bg-success' : 'bg-secondary' ?>">
                                    <?= ucfirst($row['estado']) ?>
                                </span>
                            </td>
                            <td><?= $row['ultimo_login'] ?></td>
                            <td><?= $row['fecha_creacion'] ?></td>
                            
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $row['id_usuario'] ?>">Editar</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar<?= $row['id_usuario'] ?>">Eliminar</button>

                                <div class="modal fade" id="modalEditar<?= $row['id_usuario'] ?>" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="accionesUsuario.php" method="POST" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark">Editar Usuario: <?= $row['username'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark text-start"> 
                                                <input type="hidden" name="id_usuario" value="<?= $row['id_usuario'] ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Rol ID</label>
                                                        <input type="number" name="rol_id" class="form-control" value="<?= $row['rol_id'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Estado</label>
                                                        <select name="estado" class="form-select">
                                                            <option value="activo" <?= $row['estado'] == 'activo' ? 'selected' : '' ?>>Activo</option>
                                                            <option value="inactivo" <?= $row['estado'] == 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label text-muted small">Fecha Creación</label>
                                                        <input type="text" class="form-control form-control-sm bg-light" value="<?= $row['fecha_creacion'] ?>" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label text-muted small">Último Login</label>
                                                        <input type="text" class="form-control form-control-sm bg-light" value="<?= $row['ultimo_login'] ?>" readonly>
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

                                <div class="modal fade" id="modalEliminar<?= $row['id_usuario'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title">Confirmar Eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center text-dark">
                                                <p>¿Seguro que deseas eliminar al usuario?</p>
                                                <h4><?= $row['username'] ?></h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="accionesUsuario.php" method="POST">
                                                    <input type="hidden" name="id_usuario" value="<?= $row['id_usuario'] ?>">
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
        <form action="accionesUsuario.php" method="POST" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Ej: kuki_admin" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="correo@ejemplo.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Rol ID</label>
                        <input type="number" name="rol_id" class="form-control" value="1" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select">
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button name="accion" value="agregar" class="btn btn-primary">Registrar Usuario</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>