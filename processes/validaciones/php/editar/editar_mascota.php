<?php
session_start();
if (!isset($_SESSION["usuario"])) { header("Location: ./login.html"); exit; }
include "../../../../scripts/conexion.php";
$id = $_GET['id'];
$sql = "SELECT m.*, r.nombre as 'Raza', v.nombre as 'Veterinario', p.nombre as 'Propietario' FROM Mascotas m
        LEFT JOIN razas r ON m.id_Raza = r.id_raza
        LEFT JOIN veterinarios v ON m.id_veterinario = v.id_veterinario
        LEFT JOIN Propietario p  ON m.id_Propietario = p.id_propietario
        WHERE m.id_mascota = '$id';";
$resultado = mysqli_query($conn, $sql);
$m = mysqli_fetch_assoc($resultado);
if (!$m) die("Error: No se encontró la mascota con ID $id");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mascota — Fauna Granada</title>
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
            <h1 class="cabecera_titulo"><i class="fa-solid fa-paw me-2"></i>Editar Mascota</h1>
            <a href="../../../../view/tabla_mascotas.php" class="cabecera_volver"><i class="fa-solid fa-arrow-left"></i> Volver a mascotas</a>
        </div>
        <div class="tarjeta_formulario">
            <p class="titulo_formulario">Editando: <span><?php echo htmlspecialchars($m['Nombre']); ?></span></p>
            <form method="POST" action="../modificar/modificar_mascotas.php">
                <input type="hidden" name="id_masc"              value="<?php echo $id; ?>">
                <input type="hidden" name="nombre_actual"        value="<?php echo $m['Nombre']; ?>">
                <input type="hidden" name="chip_actual"          value="<?php echo $m['Chip']; ?>">
                <input type="hidden" name="tipo_actual"          value="<?php echo $m['tipo']; ?>">
                <input type="hidden" name="sexo_actual"          value="<?php echo $m['Sexo']; ?>">
                <input type="hidden" name="raza_actual"          value="<?php echo $m['id_Raza']; ?>">
                <input type="hidden" name="peso_actual"          value="<?php echo $m['peso']; ?>">
                <input type="hidden" name="tamaño_actual"        value="<?php echo $m['Tamaño']; ?>">
                <input type="hidden" name="comportamiento_actual" value="<?php echo $m['Comportamiento']; ?>">
                <input type="hidden" name="fecha_actual"         value="<?php echo $m['Fecha']; ?>">
                <input type="hidden" name="veterinario_actual"   value="<?php echo $m['id_veterinario']; ?>">
                <input type="hidden" name="propietario_actual"   value="<?php echo $m['id_Propietario']; ?>">

                <div class="grupo_campo"><label>Nombre</label><input type="text" name="nombre" placeholder="<?php echo $m['Nombre']; ?>"></div>
                <div class="grupo_campo"><label>Chip <small style="color:#999;font-weight:400">(no editable)</small></label><input type="text" name="chip" maxlength="15" placeholder="<?php echo $m['Chip']; ?>" disabled></div>
                <div class="grupo_campo">
                    <label>Tipo <small style="color:#999;font-weight:400">(no editable)</small></label>
                    <select name="tipo" disabled>
                        <option value=""><?php echo $m['tipo']; ?></option>
                        <option value="Perro">Perro</option>
                        <option value="Gato">Gato</option>
                        <option value="Conejo">Conejo</option>
                    </select>
                </div>
                <div class="grupo_campo">
                    <label>Sexo <small style="color:#999;font-weight:400">(no editable)</small></label>
                    <select name="sexo" disabled>
                        <option value=""><?php echo $m['Sexo'] == 'M' ? 'Macho' : 'Hembra'; ?></option>
                        <option value="M">Macho</option>
                        <option value="F">Hembra</option>
                    </select>
                </div>
                <div class="grupo_campo"><label>Raza <small style="color:#999;font-weight:400">(no editable)</small></label><input type="text" placeholder="<?php echo $m['Raza']; ?>" disabled></div>
                <div class="grupo_campo"><label>Peso (kg)</label><input type="number" step="0.01" name="peso" placeholder="<?php echo $m['peso']; ?>"></div>
                <div class="grupo_campo">
                    <label>Tamaño</label>
                    <select name="tamaño">
                        <option value="">-- Sin cambios (<?php echo $m['Tamaño']; ?>) --</option>
                        <option value="Pequeño">Pequeño</option>
                        <option value="Mediano">Mediano</option>
                        <option value="Grande">Grande</option>
                        <option value="Gigante">Gigante</option>
                    </select>
                </div>
                <div class="grupo_campo"><label>Comportamiento</label><input type="text" name="comportamiento" placeholder="<?php echo $m['Comportamiento']; ?>"></div>
                <div class="grupo_campo"><label>Fecha nacimiento <small style="color:#999;font-weight:400">(no editable)</small></label><input type="date" name="fecha" placeholder="<?php echo $m['Fecha']; ?>" disabled></div>
                <div class="grupo_campo">
                    <label>Veterinario</label>
                    <select name="veterinario">
                        <option value="">-- <?php echo $m['Veterinario']; ?> --</option>
                        <?php
                        $sql_vet = "SELECT id_veterinario, nombre FROM veterinarios";
                        $res_vet = mysqli_query($conn, $sql_vet);
                        $filas_vet = mysqli_fetch_all($res_vet, MYSQLI_ASSOC);
                        foreach ($filas_vet as $fila) {
                            echo "<option value='{$fila['id_veterinario']}'>{$fila['nombre']} - {$fila['id_veterinario']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="grupo_campo">
                    <label>Propietario</label>
                    <select name="propietario">
                        <option value="">-- <?php echo $m['Propietario']; ?> --</option>
                        <?php
                        $sql_prop = "SELECT id_propietario, nombre FROM propietario";
                        $res_prop = mysqli_query($conn, $sql_prop);
                        $filas_pro = mysqli_fetch_all($res_prop, MYSQLI_ASSOC);
                        foreach ($filas_pro as $fila) {
                            echo "<option value='{$fila['id_propietario']}'>{$fila['nombre']} - {$fila['id_propietario']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="fila_botones">
                    <button type="submit" class="btn_guardar"><i class="fa-solid fa-floppy-disk me-1"></i> Guardar cambios</button>
                    <a href="../../../../view/tabla_mascotas.php" class="btn_cancelar"><i class="fa-solid fa-xmark me-1"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
