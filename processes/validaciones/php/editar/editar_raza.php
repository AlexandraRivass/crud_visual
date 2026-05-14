<?php
session_start();
$_SESSION["usuario"] = 'Oscar';
if (!isset($_SESSION["usuario"])) { header("Location: ./login.html"); exit; }
include "../../../../scripts/conexion.php";
$id = $_GET['id'];
$sql = "SELECT * FROM razas WHERE id_raza = '$id'";
$resultado = mysqli_query($conn, $sql);
$r = mysqli_fetch_assoc($resultado);
if (!$r) die("Error: No se encontró la raza con ID $id");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Raza — Fauna Granada</title>
    <link rel="shortcut icon" href="../../../../img/logo_trabajo.png">
    <link rel="stylesheet" href="../../../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header class="header_principal">
        <div class="container-fluid px-0">
            <div class="row g-0 align-items-center header_barra">
                <div class="col-auto header_logo_wrap">
                    <a href="../../../../processes/bienvenida.php" class="d-flex align-items-center gap-2 text-decoration-none">
                        <img class="header_logo_img" src="../../../../img/logo_trabajo.png" alt="Fauna Granada">
                        <span class="header_logo_texto">Perriatra <span>Granada</span></span>
                    </a>
                </div>
                <div class="col">
                    <nav class="navbar navbar-expand-lg px-3">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navPrincipal" aria-controls="navPrincipal" aria-expanded="false" aria-label="Abrir menú"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navPrincipal">
                            <ul class="navbar-nav gap-1 ms-auto align-items-center">
                                <li class="nav-item"><a class="nav-link nav_pill nav_veterinario" href="../../../../view/tabla_veterinarios.php"><i class="fa-solid fa-user-doctor"></i> Veterinarios</a></li>
                                <li class="nav-item"><a class="nav-link nav_pill nav_propietario" href="../../../../view/tabla_propietarios.php"><i class="fa-solid fa-user-tie"></i> Propietarios</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav_pill nav_mascota dropdown-toggle" href="../../../../view/tabla_mascotas.php" id="dropMascotas" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-paw"></i> Mascotas</a>
                                    <ul class="dropdown-menu dropdown_custom" aria-labelledby="dropMascotas">
                                        <li><a class="dropdown-item dropdown_item" href="../../../../view/tabla_mascotas.php?tipo=Perro"><i class="fa-solid fa-dog me-2"></i>Perros</a></li>
                                        <li><a class="dropdown-item dropdown_item" href="../../../../view/tabla_mascotas.php?tipo=Gato"><i class="fa-solid fa-cat me-2"></i>Gatos</a></li>
                                        <li><a class="dropdown-item dropdown_item" href="../../../../view/tabla_mascotas.php?tipo=Conejo"><i class="fa-solid fa-rabbit me-2"></i>Conejos</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link nav_pill nav_raza" href="../../../../view/tabla_razas.php"><i class="fa-solid fa-dna"></i> Razas</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="pagina_interior">
        <div class="cabecera_pagina mb-3">
            <h1 class="cabecera_titulo"><i class="fa-solid fa-pen me-2"></i>Editar Raza</h1>
            <a href="../../../../view/tabla_razas.php" class="cabecera_volver"><i class="fa-solid fa-arrow-left"></i> Volver a razas</a>
        </div>
        <div class="tarjeta_formulario">
            <p class="titulo_formulario">Editando: <span><?php echo htmlspecialchars($r['nombre']); ?></span></p>
            <form method="POST" action="../modificar/modificar_raza.php">
                <input type="hidden" name="id_raza"               value="<?php echo $id; ?>">
                <input type="hidden" name="nombre_actual"         value="<?php echo $r['nombre']; ?>">
                <input type="hidden" name="comportamiento_actual" value="<?php echo $r['Comportamiento_raza']; ?>">
                <input type="hidden" name="tamaño_actual"         value="<?php echo $r['Tamaño_raza']; ?>">
                <input type="hidden" name="peso_actual"           value="<?php echo $r['Peso_raza']; ?>">
                <input type="hidden" name="caract_actual"         value="<?php echo $r['Caract_generales']; ?>">
                <input type="hidden" name="vida_actual"           value="<?php echo $r['esperanza_vida']; ?>">
                <div class="grupo_campo"><label>Nombre</label><input type="text" name="nombre" placeholder="<?php echo $r['nombre']; ?>"></div>
                <div class="grupo_campo"><label>Comportamiento</label><input type="text" name="comportamiento" placeholder="<?php echo $r['Comportamiento_raza']; ?>"></div>
                <div class="grupo_campo">
                    <label>Tamaño</label>
                    <select name="tamaño">
                        <option value="">-- Sin cambios (<?php echo $r['Tamaño_raza']; ?>) --</option>
                        <option value="Pequeño">Pequeño</option>
                        <option value="Mediano">Mediano</option>
                        <option value="Grande">Grande</option>
                        <option value="Gigante">Gigante</option>
                    </select>
                </div>
                <div class="grupo_campo"><label>Peso (rango)</label><input type="text" name="peso" placeholder="<?php echo $r['Peso_raza']; ?>"></div>
                <div class="grupo_campo"><label>Características generales</label><input type="text" name="caract" placeholder="<?php echo $r['Caract_generales']; ?>"></div>
                <div class="grupo_campo"><label>Esperanza de vida</label><input type="text" name="vida" placeholder="<?php echo $r['esperanza_vida']; ?>"></div>
                <div class="fila_botones">
                    <button type="submit" class="btn_guardar"><i class="fa-solid fa-floppy-disk me-1"></i> Guardar cambios</button>
                    <a href="../../../../view/tabla_razas.php" class="btn_cancelar"><i class="fa-solid fa-xmark me-1"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
