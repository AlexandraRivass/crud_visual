<?php
session_start();
$_SESSION["usuario"] = 'Oscar';
if (!isset($_SESSION["usuario"])) { header("Location: ./login.html"); exit; }
include "../scripts/conexion.php";

$fil_tipo       = isset($_GET['tipo'])           ? trim($_GET['tipo'])           : '';
$fil_chip       = isset($_GET['chip'])           ? trim($_GET['chip'])           : '';
$fil_nombre     = isset($_GET['nombre'])         ? trim($_GET['nombre'])         : '';
$fil_propietario= isset($_GET['propietario'])    ? trim($_GET['propietario'])    : '';
$fil_compor     = isset($_GET['comportamiento']) ? trim($_GET['comportamiento']) : '';
$fil_fechaN     = isset($_GET['fechaN'])         ? trim($_GET['fechaN'])         : '';
$fil_veter      = isset($_GET['veter'])          ? trim($_GET['veter'])          : '';

$condiciones = [];
if ($fil_tipo != '')        $condiciones[] = "m.tipo LIKE '%$fil_tipo%'";
if ($fil_chip != '')        $condiciones[] = "m.Chip LIKE '%$fil_chip%'";
if ($fil_nombre != '')      $condiciones[] = "m.Nombre LIKE '%$fil_nombre%'";
if ($fil_propietario != '') $condiciones[] = "p.nombre LIKE '%$fil_propietario%'";
if ($fil_compor != '')      $condiciones[] = "m.Comportamiento LIKE '%$fil_compor%'";
if ($fil_fechaN != '')      $condiciones[] = "m.Fecha LIKE '%$fil_fechaN%'";
if ($fil_veter != '')       $condiciones[] = "v.nombre LIKE '%$fil_veter%'";

$sql = "SELECT m.*, r.nombre as 'Raza', v.nombre as 'Veterinario', p.nombre as 'Propietario' FROM Mascotas m
        LEFT JOIN razas r ON m.id_Raza = r.id_raza
        LEFT JOIN veterinarios v ON m.id_veterinario = v.id_veterinario
        LEFT JOIN Propietario p  ON m.id_Propietario = p.id_propietario";
if (!empty($condiciones)) $sql .= " WHERE " . implode(" AND ", $condiciones);
$sql .= " ORDER BY m.Chip ASC";

$resultado = mysqli_query($conn, $sql);
$mascotas  = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
$hay_filtros = $fil_chip != '' || $fil_compor != '' || $fil_fechaN != '' || $fil_nombre != '' || $fil_propietario != '' || $fil_tipo != '' || $fil_veter != '';

$titulo_tipo = $fil_tipo != '' ? $fil_tipo . 's' : 'Mascotas';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo_tipo) ?> — Fauna Granada</title>
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
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navPrincipal" aria-controls="navPrincipal" aria-expanded="false" aria-label="Abrir menú"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navPrincipal">
                            <ul class="navbar-nav gap-1 ms-auto align-items-center">
                                <li class="nav-item"><a class="nav-link nav_pill nav_veterinario" href="./tabla_veterinarios.php"><i class="fa-solid fa-user-doctor"></i> Veterinarios</a></li>
                                <li class="nav-item"><a class="nav-link nav_pill nav_propietario" href="./tabla_propietarios.php"><i class="fa-solid fa-user-tie"></i> Propietarios</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav_pill nav_mascota dropdown-toggle" href="./tabla_mascotas.php" id="dropMascotas" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-paw"></i> Mascotas</a>
                                    <ul class="dropdown-menu dropdown_custom" aria-labelledby="dropMascotas">
                                        <li><a class="dropdown-item dropdown_item" href="./tabla_mascotas.php?tipo=Perro"><i class="fa-solid fa-dog me-2"></i>Perros</a></li>
                                        <li><a class="dropdown-item dropdown_item" href="./tabla_mascotas.php?tipo=Gato"><i class="fa-solid fa-cat me-2"></i>Gatos</a></li>
                                        <li><a class="dropdown-item dropdown_item" href="./tabla_mascotas.php?tipo=Conejo"><i class="fa-solid fa-rabbit me-2"></i>Conejos</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link nav_pill nav_raza" href="./tabla_razas.php"><i class="fa-solid fa-dna"></i> Razas</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="pagina_interior">
        <div class="cabecera_pagina mb-3">
            <h1 class="cabecera_titulo">
                <?php
                if ($fil_tipo == 'Perro')  echo '<i class="fa-solid fa-dog me-2"></i>Perros';
                elseif ($fil_tipo == 'Gato')  echo '<i class="fa-solid fa-cat me-2"></i>Gatos';
                elseif ($fil_tipo == 'Conejo') echo '<i class="fa-solid fa-rabbit me-2"></i>Conejos';
                else echo '<i class="fa-solid fa-paw me-2"></i>Mascotas';
                ?>
            </h1>
            <a href="../processes/bienvenida.php" class="cabecera_volver"><i class="fa-solid fa-arrow-left"></i> Volver al inicio</a>
        </div>

        <form method="GET" action="" class="barra_filtros">
            <input type="text" name="chip"           placeholder="Chip..."           value="<?= htmlspecialchars($fil_chip) ?>">
            <input type="text" name="tipo"           placeholder="Tipo..."           value="<?= htmlspecialchars($fil_tipo) ?>">
            <input type="text" name="nombre"         placeholder="Nombre..."         value="<?= htmlspecialchars($fil_nombre) ?>">
            <input type="text" name="propietario"    placeholder="Propietario..."    value="<?= htmlspecialchars($fil_propietario) ?>">
            <input type="text" name="comportamiento" placeholder="Comportamiento..." value="<?= htmlspecialchars($fil_compor) ?>">
            <input type="text" name="fechaN"         placeholder="Fecha nacimiento..." value="<?= htmlspecialchars($fil_fechaN) ?>">
            <input type="text" name="veter"          placeholder="Veterinario..."    value="<?= htmlspecialchars($fil_veter) ?>">
            <button type="submit" class="btn_buscar"><i class="fa-solid fa-magnifying-glass me-1"></i>Buscar</button>
            <a href="./tabla_mascotas.php" class="btn_limpiar"><i class="fa-solid fa-xmark me-1"></i>Limpiar</a>
        </form>

        <div class="barra_acciones">
            <a href="./form_mascota.php" class="btn_agregar"><i class="fa-solid fa-plus"></i> Añadir mascota</a>
            <?php if ($hay_filtros): ?><span class="texto_resultados"><?= count($mascotas) ?> resultado(s)</span><?php endif; ?>
        </div>

        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'): ?>
            <div class="aviso_ok"><i class="fa-solid fa-check me-1"></i>Mascota eliminada correctamente.</div>
        <?php endif; ?>
        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'actualizado'): ?>
            <div class="aviso_ok"><i class="fa-solid fa-check me-1"></i>Mascota actualizada correctamente.</div>
        <?php endif; ?>

        <table class="tabla_datos">
            <thead>
                <tr><th>ID</th><th>Chip</th><th>Nombre</th><th>Tipo</th><th>Sexo</th><th>Raza</th><th>Propietario</th><th>Peso</th><th>Tamaño</th><th>Comportamiento</th><th>Fecha nac.</th><th>Veterinario</th><th>Acciones</th></tr>
            </thead>
            <tbody>
                <?php if (!empty($mascotas)): foreach ($mascotas as $fila): ?>
                <tr>
                    <td><?= htmlspecialchars($fila['id_mascota']) ?></td>
                    <td><?= htmlspecialchars($fila['Chip']) ?></td>
                    <td><?= htmlspecialchars($fila['Nombre']) ?></td>
                    <td><?= htmlspecialchars($fila['tipo']) ?></td>
                    <td><?= htmlspecialchars($fila['Sexo']) ?></td>
                    <td><?= htmlspecialchars($fila['Raza']) ?></td>
                    <td><?= htmlspecialchars($fila['Propietario']) ?></td>
                    <td><?= htmlspecialchars($fila['peso']) ?></td>
                    <td><?= htmlspecialchars($fila['Tamaño']) ?></td>
                    <td><?= htmlspecialchars($fila['Comportamiento']) ?></td>
                    <td><?= htmlspecialchars($fila['Fecha']) ?></td>
                    <td><?= htmlspecialchars($fila['Veterinario']) ?></td>
                    <td style="white-space:nowrap;">
                        <a class="accion_modificar" href="../processes/validaciones/php/editar/editar_mascota.php?id=<?= $fila['id_mascota'] ?>"><i class="fa-solid fa-pen"></i> Modificar</a>
                        <a class="accion_eliminar ms-1" href="../processes/validaciones/php/eliminar/eliminar_mascotas.php?id_mascota=<?= $fila['id_mascota'] ?>" onclick="return confirm('¿Seguro que quieres eliminar esta mascota?')"><i class="fa-solid fa-trash"></i> Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="13" style="text-align:center;padding:20px;color:#999;">No hay mascotas registradas.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
