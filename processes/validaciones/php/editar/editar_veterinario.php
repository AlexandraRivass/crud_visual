<?php
session_start();
$_SESSION["usuario"] = 'Oscar';
if (!isset($_SESSION["usuario"])) { header("Location: ./login.html"); exit; }
include "../../../../scripts/conexion.php";
$id = $_GET['id'];
$sql = "SELECT * FROM veterinarios WHERE id_veterinario = '$id'";
$resultado = mysqli_query($conn, $sql);
$v = mysqli_fetch_assoc($resultado);
if (!$v) die("Error: No se encontró el veterinario con ID $id");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veterinario — Fauna Granada</title>
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
            <h1 class="cabecera_titulo"><i class="fa-solid fa-pen me-2"></i>Editar Veterinario</h1>
            <a href="../../../../view/tabla_veterinarios.php" class="cabecera_volver"><i class="fa-solid fa-arrow-left"></i> Volver a veterinarios</a>
        </div>

        <div class="tarjeta_formulario">
            <p class="titulo_formulario">Editando: <span><?php echo htmlspecialchars($v['nombre']); ?></span></p>
            <form method="POST" action="../modificar/modificar_veterinario.php">
                <input type="hidden" name="id_veterinario"      value="<?php echo $id; ?>">
                <input type="hidden" name="nombre_actual"       value="<?php echo $v['nombre']; ?>">
                <input type="hidden" name="apellido_actual"     value="<?php echo $v['apellido']; ?>">
                <input type="hidden" name="telef_actual"        value="<?php echo $v['num_telef']; ?>">
                <input type="hidden" name="email_actual"        value="<?php echo $v['email']; ?>">
                <input type="hidden" name="dni_actual"          value="<?php echo $v['Dni']; ?>">
                <input type="hidden" name="especialidad_actual" value="<?php echo $v['Especialidad']; ?>">
                <input type="hidden" name="sal_actual"          value="<?php echo $v['sal']; ?>">

                <div class="grupo_campo"><label>Nombre</label><input type="text" name="nombre" placeholder="<?php echo $v['nombre']; ?>"></div>
                <div class="grupo_campo"><label>Apellido</label><input type="text" name="apellido" placeholder="<?php echo $v['apellido']; ?>"></div>
                <div class="grupo_campo"><label>Teléfono</label><input type="number" name="num_telef" placeholder="<?php echo $v['num_telef']; ?>"></div>
                <div class="grupo_campo"><label>Email</label><input type="email" name="email" placeholder="<?php echo $v['email']; ?>"></div>
                <div class="grupo_campo"><label>DNI <small style="color:#999;font-weight:400">(no editable)</small></label><input type="text" name="dni" maxlength="9" placeholder="<?php echo $v['Dni']; ?>" disabled></div>
                <div class="grupo_campo"><label>Especialidad</label><input type="text" name="especialidad" placeholder="<?php echo $v['Especialidad']; ?>"></div>
                <div class="grupo_campo"><label>Salario (€)</label><input type="number" step="0.01" name="sal" placeholder="<?php echo $v['sal']; ?>"></div>
                <div class="fila_botones">
                    <button type="submit" class="btn_guardar"><i class="fa-solid fa-floppy-disk me-1"></i> Guardar cambios</button>
                    <a href="../../../../view/tabla_veterinarios.php" class="btn_cancelar"><i class="fa-solid fa-xmark me-1"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
