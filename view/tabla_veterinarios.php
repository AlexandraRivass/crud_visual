<?php
session_start();
$_SESSION["usuario"] = 'Oscar';
if (!isset($_SESSION["usuario"])) {
    header("Location: ./login.html");
    exit;
}

include "../scripts/conexion.php";

$usuario_logeado = $_SESSION["usuario"];

$fil_nombre      = isset($_GET['nombre'])      ? trim($_GET['nombre'])      : '';
$fil_apellido    = isset($_GET['apellido'])    ? trim($_GET['apellido'])    : '';
$fil_email       = isset($_GET['email'])       ? trim($_GET['email'])       : '';
$fil_dni         = isset($_GET['dni'])         ? trim($_GET['dni'])         : '';
$fil_especialidad = isset($_GET['especialidad']) ? trim($_GET['especialidad']) : '';

$condiciones = [];
if ($fil_nombre != '')       $condiciones[] = "nombre LIKE '%$fil_nombre%'";
if ($fil_apellido != '')     $condiciones[] = "apellido LIKE '%$fil_apellido%'";
if ($fil_email != '')        $condiciones[] = "email LIKE '%$fil_email%'";
if ($fil_dni != '')          $condiciones[] = "Dni LIKE '%$fil_dni%'";
if ($fil_especialidad != '') $condiciones[] = "Especialidad LIKE '%$fil_especialidad%'";

$sql = "SELECT * FROM veterinarios";
if (!empty($condiciones)) $sql .= " WHERE " . implode(" AND ", $condiciones);
$sql .= " ORDER BY id_veterinario ASC";

$resultado    = mysqli_query($conn, $sql);
$veterinarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

$hay_filtros = $fil_nombre != '' || $fil_apellido != '' || $fil_email != '' || $fil_dni != '' || $fil_especialidad != '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinarios — Fauna Granada</title>
    <link rel="shortcut icon" href="../img/logo_trabajo.png">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <header class="header_principal">
        <div class="container-fluid px-0">
            <div class="row g-0 align-items-center header_barra">
                <div class="col-auto header_logo_wrap">
                    <a href="../processes/bienvenida.php" class="d-flex align-items-center gap-2 text-decoration-none">
                        <img class="header_logo_img" src="../img/logo_trabajo.png" alt="Fauna Granada">
                        <span class="header_logo_texto">Perriatra <span>Granada</span></span>
                    </a>
                </div>
                <div class="col">
                    <nav class="navbar navbar-expand-lg px-3">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navPrincipal" aria-controls="navPrincipal"
                                aria-expanded="false" aria-label="Abrir menú">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navPrincipal">
                            <ul class="navbar-nav gap-1 ms-auto align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link nav_pill nav_veterinario" href="./tabla_veterinarios.php">
                                        <i class="fa-solid fa-user-doctor"></i> Veterinarios
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav_pill nav_propietario" href="./tabla_propietarios.php">
                                        <i class="fa-solid fa-user-tie"></i> Propietarios
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav_pill nav_mascota dropdown-toggle"
                                       href="./tabla_mascotas.php" id="dropMascotas" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-paw"></i> Mascotas
                                    </a>
                                    <ul class="dropdown-menu dropdown_custom" aria-labelledby="dropMascotas">
                                        <li><a class="dropdown-item dropdown_item" href="./tabla_mascotas.php?tipo=Perro"><i class="fa-solid fa-dog me-2"></i>Perros</a></li>
                                        <li><a class="dropdown-item dropdown_item" href="./tabla_mascotas.php?tipo=Gato"><i class="fa-solid fa-cat me-2"></i>Gatos</a></li>
                                        <li><a class="dropdown-item dropdown_item" href="./tabla_mascotas.php?tipo=Conejo"><i class="fa-solid fa-rabbit me-2"></i>Conejos</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav_pill nav_raza" href="./tabla_razas.php">
                                        <i class="fa-solid fa-dna"></i> Razas
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="pagina_interior">

        <div class="cabecera_pagina mb-3">
            <h1 class="cabecera_titulo"><i class="fa-solid fa-user-doctor me-2"></i>Veterinarios</h1>
            <a href="../processes/bienvenida.php" class="cabecera_volver">
                <i class="fa-solid fa-arrow-left"></i> Volver al inicio
            </a>
        </div>

        <form method="GET" action="" class="barra_filtros">
            <input type="text" name="nombre"       placeholder="Nombre..."       value="<?= htmlspecialchars($fil_nombre) ?>">
            <input type="text" name="apellido"     placeholder="Apellido..."     value="<?= htmlspecialchars($fil_apellido) ?>">
            <input type="text" name="email"        placeholder="Email..."        value="<?= htmlspecialchars($fil_email) ?>">
            <input type="text" name="dni"          placeholder="DNI..."          value="<?= htmlspecialchars($fil_dni) ?>">
            <input type="text" name="especialidad" placeholder="Especialidad..." value="<?= htmlspecialchars($fil_especialidad) ?>">
            <button type="submit" class="btn_buscar"><i class="fa-solid fa-magnifying-glass me-1"></i>Buscar</button>
            <a href="./tabla_veterinarios.php" class="btn_limpiar"><i class="fa-solid fa-xmark me-1"></i>Limpiar</a>
        </form>

        <div class="barra_acciones">
            <a href="./form_veterinario.html" class="btn_agregar">
                <i class="fa-solid fa-plus"></i> Añadir veterinario
            </a>
            <?php if ($hay_filtros): ?>
                <span class="texto_resultados"><?= count($veterinarios) ?> resultado(s) encontrado(s)</span>
            <?php endif; ?>
        </div>

        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'): ?>
            <div class="aviso_ok"><i class="fa-solid fa-check me-1"></i>Veterinario eliminado correctamente.</div>
        <?php endif; ?>
        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'actualizado'): ?>
            <div class="aviso_ok"><i class="fa-solid fa-check me-1"></i>Veterinario actualizado correctamente.</div>
        <?php endif; ?>

        <table class="tabla_datos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th>Especialidad</th>
                    <th>Salario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($veterinarios)): foreach ($veterinarios as $fila): ?>
                <tr>
                    <td><?= htmlspecialchars($fila['id_veterinario']) ?></td>
                    <td><?= htmlspecialchars($fila['nombre']) ?></td>
                    <td><?= htmlspecialchars($fila['apellido']) ?></td>
                    <td><?= htmlspecialchars($fila['num_telef']) ?></td>
                    <td><?= htmlspecialchars($fila['email']) ?></td>
                    <td><?= htmlspecialchars($fila['Dni']) ?></td>
                    <td><?= htmlspecialchars($fila['Especialidad']) ?></td>
                    <td><?= htmlspecialchars($fila['sal']) ?></td>
                    <td style="white-space:nowrap;">
                        <a class="accion_modificar" href="../processes/validaciones/php/editar/editar_veterinario.php?id=<?= $fila['id_veterinario'] ?>">
                            <i class="fa-solid fa-pen"></i> Modificar
                        </a>
                        <a class="accion_eliminar ms-1" href="../processes/validaciones/php/eliminar/eliminar_veterinario.php?id_veterinario=<?= $fila['id_veterinario'] ?>"
                           onclick="return confirm('¿Seguro que quieres eliminar este veterinario?')">
                            <i class="fa-solid fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="9" style="text-align:center;padding:20px;color:#999;">No hay veterinarios registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
