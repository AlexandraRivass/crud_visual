<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Veterinaria</title>

    <link rel="shortcut icon" href="../img/logo_trabajo.png">
    
    <link rel="stylesheet" href="../css/style.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <!--HEADER MÁS LO DEL NAVBAR-->
    <header class="header_principal">
        <div class="container-fluid px-0">
            <div class="row g-0 align-items-center header_barra">

                <!-- Logo -->
                <div class="col-auto header_logo_wrap">
                    <a href="#" class="d-flex align-items-center gap-2 text-decoration-none">
                        <img class="header_logo_img" src="../img/logo_trabajo.png" alt="Fauna Granada">
                        <span class="header_logo_texto">Perriatra <span>Granada</span></span>
                    </a>
                </div>

                <!-- Nav -->
                <div class="col">
                    <nav class="navbar navbar-expand-lg px-3">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navPrincipal"
                                aria-controls="navPrincipal"
                                aria-expanded="false"
                                aria-label="Abrir menú">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navPrincipal">
                            <ul class="navbar-nav gap-1 ms-auto align-items-center">

                                <li class="nav-item">
                                    <a class="nav-link nav_pill nav_veterinario" href="../view/tabla_veterinarios.php">
                                        <i class="fa-solid fa-user-doctor"></i> Veterinarios
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav_pill nav_propietario" href="../view/tabla_propietarios.php">
                                        <i class="fa-solid fa-user-tie"></i> Propietarios
                                    </a>
                                </li>

                                <!-- Dropdown Mascotas — Bootstrap 5 -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav_pill nav_mascota dropdown-toggle"
                                       href="../view/tabla_mascotas.php"
                                       id="dropMascotas"
                                       role="button"
                                       data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="fa-solid fa-paw"></i> Mascotas
                                    </a>
                                    <ul class="dropdown-menu dropdown_custom" aria-labelledby="dropMascotas">
                                        <li><a class="dropdown-item dropdown_item" href="../view/tabla_mascotas.php?tipo=Perro"><i class="fa-solid fa-dog me-2"></i>Perros</a></li>
                                        <li><a class="dropdown-item dropdown_item" href="../view/tabla_mascotas.php?tipo=Gato"><i class="fa-solid fa-cat me-2"></i>Gatos</a></li>
                                        <li><a class="dropdown-item dropdown_item" href="../view/tabla_mascotas.php?tipo=Conejo"><i class="fa-solid fa-rabbit me-2"></i>Conejos</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav_pill nav_raza" href="../view/tabla_razas.php">
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


    <!--CARRUSEL PRINCIPAL (con controles y medidas fijas) -->
    <div id="carruselPrincipal" class="carousel slide carrusel_principal" data-bs-ride="carousel">

        <!--Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carruselPrincipal" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carruselPrincipal" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carruselPrincipal" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carruselPrincipal" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carruselPrincipal" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img class="d-block w-100 carrusel_imagen" src="../img/fondo_portada.jpg" alt="Portada">
                <div class="carousel-caption carrusel_caption">
                    <h2 class="estilo_letra">Bienvenidos a Fauna Granada</h2>
                    <p>Tu clínica veterinaria de confianza</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img class="d-block w-100 carrusel_imagen" src="../img/gatoo_perro.jpg" alt="Gato y perro">
                <div class="carousel-caption carrusel_caption">
                    <h2 class="estilo_letra">Cuidamos a todos</h2>
                    <p>Perros, gatos y conejos con atención especializada</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img class="d-block w-100 carrusel_imagen" src="../img/imagen_portada1.jpg" alt="Portada 1">
                <div class="carousel-caption carrusel_caption">
                    <h2 class="estilo_letra">Revisiones completas</h2>
                    <p>Seguimiento personalizado para cada mascota</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img class="d-block w-100 carrusel_imagen" src="../img/imagen2.jpg" alt="Imagen 2">
                <div class="carousel-caption carrusel_caption">
                    <h2 class="estilo_letra">Vacunación y prevención</h2>
                    <p>Mantén a tu mascota protegida todo el año</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img class="d-block w-100 carrusel_imagen" src="../img/comida_felina.jpg" alt="Comida felina">
                <div class="carousel-caption carrusel_caption">
                    <h2 class="estilo_letra">Nutrición especializada</h2>
                    <p>Alimentación adaptada a cada especie y etapa vital</p>
                </div>
            </div>
        </div>

        <!--Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carruselPrincipal" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carruselPrincipal" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>


    <!-- BLOQUE DE PRESENTACIÓN-->
    <div class="container-fluid color_fondo py-4 espacio">
        <div class="color_casilla2">
            <div class="espacio_contenedor1 estilo_sombreado color_casilla1">
                <div class="margenes">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                            <img class="casilla_animales img-fluid" src="../img/perros_casilla.jpg" alt="Perros">
                        </div>
                        <div class="col-12 col-lg-6">
                            <h1 class="estilo_letra">El cuidado y bienestar que tu mascota merece</h1>
                            <br>
                            <p>En nuestra clínica veterinaria cuidamos de perros, gatos y conejos con atención cercana, profesional y personalizada. Nuestro objetivo es acompañarte en cada etapa de la vida de tu mascota, ofreciendo orientación, cuidados preventivos y revisiones pensadas para su salud y felicidad.
                            <br><br>
                            Registra a tu mascota con nosotros y mantente informado sobre vacunas, revisiones, recomendaciones y servicios veterinarios adaptados a sus necesidades.
                            </p>
                            <div class="row g-2 mt-2">
                                <div class="col-6">
                                    <a href="../view/form_mascota.php" class="estilo_botones" style="display:block;text-decoration:none;text-align:center;"><i class="fa-solid fa-dog me-1"></i> Registrar perro</a>
                                </div>
                                <div class="col-6">
                                    <a href="../view/form_mascota.php" class="estilo_botones" style="display:block;text-decoration:none;text-align:center;"><i class="fa-solid fa-cat me-1"></i> Registrar gato</a>
                                </div>
                                <div class="col-12 mt-1">
                                    <a href="../view/form_mascota.php" class="estilo_botones" style="display:block;text-decoration:none;text-align:center;"><i class="fa-solid fa-rabbit me-1"></i> Registrar conejo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--BLOQUES ANIMALES-->
        <div class="row g-0 mt-2">

            <!-- Perros-->
            <div class="col-12 col-lg-6 color_fondo">
                <div class="espacio_contenedor estilo_sombreado1 my-3">
                    <div class="margenes">
                        <div class="row">
                            <div class="col-4">
                                <div class="icono_animal">
                                    <img class="iconos_animales" src="../img/icono_perro.png" alt="Icono perro">
                                </div>
                            </div>
                            <div class="col-8 seccion_animal">
                                <h2 class="estilo_letra">Perro</h2>
                            </div>
                            <div class="col-12"><br><p><strong>Todo sobre perros</strong></p></div>
                            <div class="col-12">
                                <div class="row">
                                    <a href="../view/tabla_mascotas.php" class="col-11 enlace_bloque">Información sobre perros</a>
                                    <a href="../view/tabla_mascotas.php" class="col-1 enlace_flecha"><i class="fa-solid fa-arrow-right"></i></a>
                                    <a href="../view/form_mascota.php" class="col-11 enlace_bloque">Añadir perros</a>
                                    <a href="../view/form_mascota.php" class="col-1 enlace_flecha"><i class="fa-solid fa-arrow-right"></i></a>
                                    <a href="../view/tabla_razas.php" class="col-11 enlace_bloque">Razas de perros</a>
                                    <a href="../view/tabla_razas.php" class="col-1 enlace_flecha"><i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gatos -->
            <div class="col-12 col-lg-6 color_fondo1">
                <div class="espacio_contenedor estilo_sombreado1 my-3">
                    <div class="margenes">
                        <div class="row">
                            <div class="col-4">
                                <div class="icono_animal">
                                    <img class="iconos_animales" src="../img/icono_gato.png" alt="Icono gato">
                                </div>
                            </div>
                            <div class="col-8 seccion_animal">
                                <h2 class="estilo_letra">Gato</h2>
                            </div>
                            <div class="col-12"><br><p><strong>Todo sobre gatos</strong></p></div>
                            <div class="col-12">
                                <div class="row">
                                    <a href="../view/tabla_mascotas.php" class="col-11 enlace_bloque">Información sobre gatos</a>
                                    <a href="../view/tabla_mascotas.php" class="col-1 enlace_flecha"><i class="fa-solid fa-arrow-right"></i></a>
                                    <a href="../view/form_mascota.php" class="col-11 enlace_bloque">Añadir gatos</a>
                                    <a href="../view/form_mascota.php" class="col-1 enlace_flecha"><i class="fa-solid fa-arrow-right"></i></a>
                                    <a href="../view/tabla_razas.php" class="col-11 enlace_bloque">Razas de gatos</a>
                                    <a href="../view/tabla_razas.php" class="col-1 enlace_flecha"><i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conejos -->
            <div class="col-12 color_fondo1">
                <div class="espacio_contenedor estilo_sombreado1 my-3">
                    <div class="margenes">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-6">
                                <div class="row align-items-center mb-3">
                                    <div class="col-4">
                                        <div class="icono_animal">
                                            <img class="iconos_animales" src="../img/icono_conejo.png" alt="Icono conejo">
                                        </div>
                                    </div>
                                    <div class="col-8 seccion_animal">
                                        <h2 class="estilo_letra">Conejos</h2>
                                    </div>
                                </div>
                                <p><strong>Todo sobre conejos</strong></p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <a href="../view/tabla_mascotas.php" class="col-11 enlace_bloque">Información de conejos</a>
                                    <a href="../view/tabla_mascotas.php" class="col-1 enlace_flecha"><i class="fa-solid fa-arrow-right"></i></a>
                                    <a href="../view/form_mascota.php" class="col-11 enlace_bloque">Añadir conejos</a>
                                    <a href="../view/form_mascota.php" class="col-1 enlace_flecha"><i class="fa-solid fa-arrow-right"></i></a>
                                    <a href="../view/tabla_razas.php" class="col-11 enlace_bloque">Razas de conejos</a>
                                    <a href="../view/tabla_razas.php" class="col-1 enlace_flecha"><i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ===== CONTACTO / MAPA ===== -->
        <div class="color_casilla3 mt-2">
            <div class="espacio_contenedor1 estilo_sombreado color_casilla">
                <div class="margenes">
                    <div class="row align-items-start">
                        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                            <h1 class="estilo_letra">¿Cómo encontrarnos?</h1>
                            <br>
                            <p><i class="fa-solid fa-location-dot"></i><strong> Dirección</strong><br>Calle Recogidas 29, Local<br>18005 Granada</p>
                            <p><i class="fa-solid fa-clock"></i><strong> Horario</strong><br>Lunes a Viernes: 9:00 – 21:00<br>Sábados: 10:00 – 14:00<br>Domingos: Cerrado</p>
                            <p><i class="fa-solid fa-phone"></i><strong> Teléfono</strong><br>958 000 000</p>
                            <p><i class="fa-solid fa-envelope"></i><strong> Email</strong><br>info@faunagranada.com</p>
                            <p><i class="fa-solid fa-square-parking"></i><strong> Aparcamiento</strong><br>Parking disponible en los alrededores</p>
                            <a href="https://maps.google.com/?q=Clínica+Veterinaria+Fauna+Granada" target="_blank" class="btn-mapa">
                                <i class="fa-solid fa-diamond-turn-right"></i> Cómo llegar
                            </a>
                        </div>
                        <div class="col-12 col-lg-6">
                            <iframe class="mapa w-100" src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses!2ses!4v1478793909257!6m8!1m7!1swDVHoLNpL84AAAAGOt-VvA!2m2!1d37.10739041254686!2d-3.636658775302976!3f201.3896839152177!4f-0.4046041427478997!5f0.7820865974627469" height="420" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ===== STATS: VETERINARIOS / CLIENTES / ANIMALES ===== -->
        <div class="row g-0 mt-2">
            <div class="col-12 col-lg-6 color_fondo1">
                <div class="espacio_contenedor estilo_sombreado1 my-3">
                    <div class="margenes">
                        <div class="row">
                            <div class="col-4"><div class="iconos"><br><i class="fa-solid fa-user-doctor fa-4x"></i></div></div>
                            <div class="col-8 seccion_animal"><h2 class="estilo_letra">Veterinarios</h2></div>
                            <div class="col-12"><br><h4>+300 veterinarios colaboradores</h4><p><strong>Una red profesional en constante formación y referencia clínica especializada.</strong></p></div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-11 bloque_animales">Acceder al área veterinaria</div>
                                    <div class="col-1 bloque_animales"><i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 color_fondo1">
                <div class="espacio_contenedor estilo_sombreado1 my-3">
                    <div class="margenes">
                        <div class="row">
                            <div class="col-4"><div class="iconos"><br><i class="fa-solid fa-users fa-4x"></i></div></div>
                            <div class="col-8 seccion_animal"><h2 class="estilo_letra">Clientes</h2></div>
                            <div class="col-12"><br><h4>+4.500 pacientes atendidos</h4><p><strong>Cuidamos cada mascota con atención veterinaria integral, tecnología avanzada y seguimiento personalizado.</strong></p></div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-11 bloque_animales">Pacientes atendidos anualmente</div>
                                    <div class="col-1 bloque_animales"><i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 color_fondo1">
                <div class="espacio_contenedor estilo_sombreado1 my-3">
                    <div class="margenes">
                        <div class="row">
                            <div class="col-2"><div class="iconos"><br><i class="fa-solid fa-paw fa-4x"></i></div></div>
                            <div class="col-10 seccion_animal"><h2 class="estilo_letra">Animales</h2></div>
                            <div class="col-12"><h4>+1.200 animales registrados</h4><p><strong>Un registro actualizado de todas las especies monitorizadas dentro del sistema.</strong></p></div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-11 bloque_animales">Área de animales</div>
                                    <div class="col-1 bloque_animales"><i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ===== ARTÍCULOS RECIENTES ===== -->
        <div class="color_casilla2 mt-2">
            <div class="margenes1">
                <h2 class="estilo_letra text-center mb-4">Artículos recientes</h2>

                <div id="carouselArticulos" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">

                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="row g-3">
                                <div class="col-12 col-md-3">
                                    <div class="articulos_intro h-100">
                                        <div class="articulos_icono"><i class="fa-solid fa-house-medical"></i></div>
                                        <p>Estos son algunos de los últimos artículos publicados</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="articulo_card h-100">
                                        <img src="../img/perro_veterinario.jpg" alt="Diabetes en perros">
                                        <div class="articulo_body">
                                            <h5>¿La diabetes en perros puede controlarse correctamente?</h5>
                                            <p>Con una alimentación adecuada, controles veterinarios frecuentes y el tratamiento indicado, muchos perros pueden mantener una buena calidad de vida diariamente.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="articulo_card h-100">
                                        <img src="../img/gato_veterinario.jpg" alt="Garrapatas en gatos">
                                        <div class="articulo_body">
                                            <h5>¿Cómo deben eliminarse las garrapatas en gatos?</h5>
                                            <p>Es importante utilizar productos recomendados por veterinarios y revisar regularmente el pelaje para evitar infestaciones y posibles enfermedades.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="articulo_card h-100">
                                        <img src="../img/conejo_veterinaria.jpg" alt="Castración">
                                        <div class="articulo_body">
                                            <h5>¿Qué beneficios aporta la castración en mascotas?</h5>
                                            <p>La castración puede ayudar a prevenir problemas hormonales, mejorar ciertas conductas y favorecer una convivencia más estable y segura.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <div class="row g-3">
                                <div class="col-12 col-md-3">
                                    <div class="articulos_intro h-100">
                                        <div class="articulos_icono"><i class="fa-solid fa-house-medical"></i></div>
                                        <p>Estos son algunos de los últimos artículos publicados</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="articulo_card h-100">
                                        <img src="../img/quemadura_perro.jpg" alt="Quemaduras solares">
                                        <div class="articulo_body">
                                            <h5>¿Cómo prevenir quemaduras solares en mascotas?</h5>
                                            <p>Proteger las zonas más sensibles del sol y limitar la exposición durante las horas de mayor intensidad ayuda a prevenir lesiones cutáneas e irritaciones.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="articulo_card h-100">
                                        <img src="../img/comida_felina.jpg" alt="Nutrición felina">
                                        <div class="articulo_body">
                                            <h5>¿Qué necesita una buena nutrición felina diaria?</h5>
                                            <p>Una dieta equilibrada, adaptada a su edad y necesidades, permite mantener su energía, fortalecer defensas y mejorar su bienestar general.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="articulo_card h-100">
                                        <img src="../img/tratamiento_mascota.jpg" alt="Primeros auxilios">
                                        <div class="articulo_body">
                                            <h5>¿Cómo actuar ante una emergencia en mascotas?</h5>
                                            <p>Aplicar primeros auxilios básicos y acudir rápidamente al veterinario puede marcar una gran diferencia en situaciones inesperadas o urgentes.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Botones artículos -->
                    <button class="carousel-control-prev articulos_prev" type="button" data-bs-target="#carouselArticulos" data-bs-slide="prev">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button class="carousel-control-next articulos_next" type="button" data-bs-target="#carouselArticulos" data-bs-slide="next">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

    </div><!-- /container-fluid color_fondo -->


    <!-- ======================================================
         FOOTER
    ====================================================== -->
    <footer class="footer_principal">
        <div class="container-fluid px-0">

            <div class="footer_cuerpo">
                <div class="row g-4">

                    <!-- Columna marca -->
                    <div class="col-12 col-md-4">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <img src="../img/logo_trabajo.png" alt="Logo" style="width:40px;">
                            <span class="footer_nombre">Fauna <span>Granada</span></span>
                        </div>
                        <p class="footer_desc">Clínica veterinaria especializada en perros, gatos y conejos. Cuidado profesional con trato cercano desde 2010.</p>
                        <div class="footer_redes">
                            <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                        </div>
                    </div>

                    <!-- Columna servicios -->
                    <div class="col-6 col-md-2">
                        <h6 class="footer_titulo_col">Servicios</h6>
                        <ul class="footer_lista">
                            <li><a href="#">Consultas</a></li>
                            <li><a href="#">Vacunación</a></li>
                            <li><a href="#">Cirugía</a></li>
                            <li><a href="#">Nutrición</a></li>
                            <li><a href="#">Urgencias</a></li>
                        </ul>
                    </div>

                    <!-- Columna animales -->
                    <div class="col-6 col-md-2">
                        <h6 class="footer_titulo_col">Animales</h6>
                        <ul class="footer_lista">
                            <li><a href="../view/tabla_mascotas.php?tipo=Perro"><i class="fa-solid fa-dog me-1"></i>Perros</a></li>
                            <li><a href="../view/tabla_mascotas.php?tipo=Gato"><i class="fa-solid fa-cat me-1"></i>Gatos</a></li>
                            <li><a href="../view/tabla_mascotas.php?tipo=Conejo"><i class="fa-solid fa-rabbit me-1"></i>Conejos</a></li>
                            <li><a href="../view/tabla_razas.php">Razas</a></li>
                        </ul>
                    </div>

                    <!-- Columna contacto -->
                    <div class="col-12 col-md-4">
                        <h6 class="footer_titulo_col">Contacto</h6>
                        <ul class="footer_lista footer_contacto">
                            <li><i class="fa-solid fa-location-dot"></i> Calle Recogidas 29, 18005 Granada</li>
                            <li><i class="fa-solid fa-phone"></i> 958 000 000</li>
                            <li><i class="fa-solid fa-envelope"></i> info@faunagranada.com</li>
                            <li><i class="fa-solid fa-clock"></i> L–V: 9:00–21:00 · Sáb: 10:00–14:00</li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="footer_bottom">
                <span>© 2025 Fauna Granada — Todos los derechos reservados</span>
                <span class="footer_bottom_legal">
                    <a href="#">Política de privacidad</a>
                    <a href="#">Aviso legal</a>
                </span>
            </div>

        </div>
    </footer>


    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
