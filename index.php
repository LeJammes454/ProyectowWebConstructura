<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
    $correo_electronico = isset($_POST['correo_electronico']) ? trim($_POST['correo_electronico']) : '';
    $asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : '';
    $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

    // Verificar que todos los campos estén llenos
    if (!empty($nombre) && !empty($telefono) && !empty($correo_electronico) && !empty($asunto) && !empty($mensaje)) {
        // Preparar la consulta SQL
        $stmt = $conn->prepare("INSERT INTO contactos (nombre, telefono, correo_electronico, asunto, mensaje) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre, $telefono, $correo_electronico, $asunto, $mensaje);

        // Ejecutar la consulta y verificar el resultado
        if ($stmt->execute()) {
            $mensaje_exito = "Mensaje enviado exitosamente.";
        } else {
            $mensaje_error = "Error al enviar el mensaje: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        $mensaje_error = "Por favor, rellene todos los campos.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bismouto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="logo" src="./assets/images/logo bismuoto.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Acerca</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="hero" class="min-vh-100 d-flex align-items-center text-center bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 data-aos="fade-left" class="text-uppercase fw-semibold display-1">Bienvenido a Bismouto</h1>
                    <h5 class="mt-3 mb-4" data-aos="fade-right">SOMOS UN EQUIPO DE PROFESIONALES DEDICADOS A LA
                        EXCELENCIA EN CONSTRUCCIÓN</h5>
                    <div data-aos="fade-up" data-aos-delay="50">
                        <a href="#portfolio" class="btn btn-light ms-2">Nuestro Portafolio</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="50">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Sobre Nosotros</h1>
                        <div class="line"></div>
                        <p>En Bismouto, nos apasiona crear experiencias de construcción innovadoras y de alta calidad,
                            utilizando tecnología de vanguardia y técnicas avanzadas.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6" data-aos="fade-down" data-aos-delay="50">
                    <img src="./assets/images/about.jpg" alt="Sobre Bismouto">
                </div>
                <div data-aos="fade-down" data-aos-delay="150" class="col-lg-5">
                    <h1>Sobre Bismouto</h1>
                    <p class="mt-3 mb-4">Bismouto es una empresa constructora comprometida con la excelencia, ofreciendo
                        soluciones personalizadas para cada uno de nuestros clientes.</p>
                    <div class="d-flex pt-4 mb-3">
                        <div class="iconbox me-4">
                            <i class="ri-mail-send-fill"></i>
                        </div>
                        <div>
                            <h5>Innovación</h5>
                            <p>Nuestro enfoque innovador nos permite implementar las últimas tecnologías en cada
                                proyecto.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="iconbox me-4">
                            <i class="ri-user-5-fill"></i>
                        </div>
                        <div>
                            <h5>Equipo Profesional</h5>
                            <p>Contamos con un equipo altamente capacitado y dedicado a cumplir con las expectativas de
                                nuestros clientes.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="iconbox me-4">
                            <i class="ri-rocket-2-fill"></i>
                        </div>
                        <div>
                            <h5>Compromiso</h5>
                            <p>Estamos comprometidos con la calidad y la satisfacción del cliente en cada etapa del
                                proyecto.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SERVICES -->
    <section id="services" class="section-padding border-top">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Nuestros Servicios</h1>
                        <div class="line"></div>
                        <p>En Bismouto, ofrecemos una amplia gama de servicios de construcción para satisfacer las
                            necesidades de nuestros clientes.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 text-center">
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="150">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-building-4-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Construcción de Edificios</h5>
                        <p>Ofrecemos servicios de construcción para edificios residenciales,
                            garantizando calidad y seguridad en cada proyecto.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="250">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-tools-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Renovación y Remodelación</h5>
                        <p>Transformamos y modernizamos espacios existentes, adaptándonos a las necesidades y gustos de
                            nuestros clientes.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="350">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-draft-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Diseño Arquitectónico</h5>
                        <p>Contamos con un equipo de arquitectos expertos en diseñar espacios funcionales y
                            estéticamente atractivos.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="450">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-hammer-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Construcción de Infraestructuras</h5>
                        <p>Desarrollamos infraestructuras de alta calidad, incluyendo carreteras, puentes y otras obras
                            civiles.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="550">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-home-heart-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Construcción de Viviendas</h5>
                        <p>Construimos viviendas unifamiliares y multifamiliares, ofreciendo soluciones personalizadas y
                            adaptadas a cada cliente.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="650">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-earth-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Proyectos Sostenibles</h5>
                        <p>Nos especializamos en proyectos sostenibles, utilizando materiales y técnicas
                            respetuosas con el medio ambiente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- PORTFOLIO -->
    <section id="portfolio" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Nuestro Portafolio</h1>
                        <div class="line"></div>
                        <p>En Bismouto, contamos con una amplia gama de maquinaria de última generación trabajando en
                            nuestros proyectos de construcción.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="150">
                    <div class="portfolio-item image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/maquinas/project-1.jpg" alt="">
                        </div>
                        <a href="./assets/images/maquinas/project-1.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                    <div class="portfolio-item image-zoom mt-4">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/maquinas/project-2.jpg" alt="">
                        </div>
                        <a href="./assets/images/maquinas/project-2.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="250">
                    <div class="portfolio-item image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/maquinas/project-3.jpg" alt="">
                        </div>
                        <a href="./assets/images/maquinas/project-3.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                    <div class="portfolio-item image-zoom mt-4">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/maquinas/project-5.jpg" alt="">
                        </div>
                        <a href="./assets/images/maquinas/project-5.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="350">
                    <div class="portfolio-item image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/maquinas/project-4.jpg" alt="">
                        </div>
                        <a href="./assets/images/maquinas/project-4.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                    <div class="portfolio-item image-zoom mt-4">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/maquinas/project-6.jpg" alt="">
                        </div>
                        <a href="./assets/images/maquinas/project-6.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TEAM -->
    <section id="team" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Nuestro Equipo</h1>
                        <div class="line"></div>
                        <p>En Bismouto, contamos con un equipo de profesionales altamente capacitados y comprometidos
                            con la excelencia en cada proyecto.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="150">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img class="imgteam" src="https://scontent.fcyw4-1.fna.fbcdn.net/v/t39.30808-6/375165092_198702763222083_4591463728221777440_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=piV8vv1ltNkQ7kNvgFh089g&_nc_ht=scontent.fcyw4-1.fna&oh=00_AYC7uCUKBXBh4dlZbQJx7cWiTb_YyKgLwMc25irR1d0DRQ&oe=6692120F" alt="Nombre del miembro del equipo">
                        </div>
                        <div class="team-member-content">
                            <h4 class="text-white">Jaime Leon</h4>
                            <p class="mb-0 text-white">Director de Proyectos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="250">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img class="imgteam" src="https://scontent.fcyw4-1.fna.fbcdn.net/v/t1.6435-9/94030771_1463530497142417_6909016574259101696_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=1d70fc&_nc_ohc=rUGqDty746IQ7kNvgF7UDlM&_nc_ht=scontent.fcyw4-1.fna&oh=00_AYDL4K0vfCtN_UV5F0mVRtKvouh5af3rYD3MvnQZJ07KXg&oe=66B394C2" alt="Nombre del miembro del equipo">
                        </div>
                        <div class="team-member-content">
                            <h4 class="text-white">Alexis C. Vasquez</h4>
                            <p class="mb-0 text-white">Jefe de Seguridad</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="350">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img class="imgteam" src="https://i.ibb.co/3YyQmRc/Imagen-de-Whats-App-2024-07-08-a-las-12-20-23-9128f8dc.jpg" alt="Nombre del miembro del equipo">
                        </div>
                        <div class="team-member-content">
                            <h4 class="text-white">Esteban Alvarez</h4>
                            <p class="mb-0 text-white">Ingeniero Civil</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- CONTACT -->
<section class="section-padding bg-light" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                <div class="section-title">
                    <h1 class="display-4 fw-semibold">Contáctanos</h1>
                    <div class="line"></div>
                    <p>En Bismouto, estamos siempre disponibles para atender tus consultas y colaborar en tus proyectos de construcción.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-down" data-aos-delay="250">
            <div class="col-lg-8">
                <?php if(isset($mensaje_exito)) { echo "<div class='alert alert-success'>$mensaje_exito</div>"; } ?>
                <?php if(isset($mensaje_error)) { echo "<div class='alert alert-danger'>$mensaje_error</div>"; } ?>
                <form action="index.php#contact" method="post" class="row g-3 p-lg-5 p-4 bg-white theme-shadow">
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="email" class="form-control" name="correo_electronico" placeholder="Correo Electrónico" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="text" class="form-control" name="asunto" placeholder="Asunto" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <textarea name="mensaje" rows="5" class="form-control" placeholder="Mensaje" required></textarea>
                    </div>
                    <div class="form-group col-lg-12 d-grid">
                        <button type="submit" class="btn btn-brand">Enviar Mensaje</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



    <!-- BLOG -->
    <section id="blog" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Trabajos Recientes</h1>
                        <div class="line"></div>
                        <p>Descubre nuestros proyectos más recientes y cómo estamos transformando espacios con nuestro
                            compromiso y experiencia en construcción.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="150">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/blog-post-1.jpg" alt="Trabajo reciente 1">
                        </div>
                        <h5 class="mt-4">Construcción de Edificio Residencial</h5>
                        <p>Realizamos la construcción de un moderno edificio residencial en el centro de la ciudad,
                            utilizando técnicas innovadoras y materiales de alta calidad.</p>
                        <a href="https://conectandonegocios.com/noticia/inicia-construccion-de-importante-desarrollo-en-tijuana">Leer Más</a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="250">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/blog-post-2.jpg" alt="Trabajo reciente 2">
                        </div>
                        <h5 class="mt-4">Remodelación de Oficina Corporativa</h5>
                        <p>Transformamos una oficina corporativa en un espacio funcional y estéticamente atractivo,
                            mejorando la productividad y el ambiente laboral.</p>
                        <a href="https://www.caf.com/es/actualidad/convocatorias/2023/08/proyecto-de-mobiliario-renovacion-de-espacios-sede-caf-venezuela/">Leer Más</a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="350">
                    <div class="team-member image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/blog-post-3.jpg" alt="Trabajo reciente 3">
                        </div>
                        <h5 class="mt-4">Construcción de Puente Vehicular</h5>
                        <p>Participamos en la construcción de un puente vehicular que mejora la conectividad y reduce el
                            tiempo de viaje en la región.</p>
                        <a href="https://www.elsoldesanluis.com.mx/local/avanza-construccion-de-puentes-vehiculares-5879608.html">Leer Más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


  <!-- FOOTER -->
<footer class="bg-dark text-white">
    <div class="footer-top py-5">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-3 col-sm-6">
                    <a href="#"><img src="./assets/images/logo bismuoto.png" alt="Bismouto Logo" class="mb-3 fot"></a>
                    <div class="line mb-3"></div>
                    <p>En Bismouto, estamos comprometidos con la excelencia en cada proyecto de construcción que emprendemos, asegurando calidad y satisfacción.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-2"><i class="ri-twitter-fill"></i></a>
                        <a href="#" class="text-white me-2"><i class="ri-instagram-fill"></i></a>
                        <a href="#" class="text-white me-2"><i class="ri-linkedin-fill"></i></a>
                        <a href="#" class="text-white"><i class="ri-facebook-fill"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5 class="mb-3 foot">SERVICIOS</h5>
                    <div class="line mb-3"></div>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Construcción de Edificios</a></li>
                        <li><a href="#" class="text-white">Renovación y Remodelación</a></li>
                        <li><a href="#" class="text-white">Diseño Arquitectónico</a></li>
                        <li><a href="#" class="text-white">Proyectos Sostenibles</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5 class="mb-3 foot">ACERCA DE</h5>
                    <div class="line mb-3"></div>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Blog</a></li>
                        <li><a href="#" class="text-white">Servicios</a></li>
                        <li><a href="#" class="text-white">Nuestra Empresa</a></li>
                        <li><a href="#" class="text-white">Carreras</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5 class="mb-3 foot">CONTACTO</h5>
                    <div class="line mb-3"></div>
                    <ul class="list-unstyled">
                        <li class="text-white">Uriangato, Guanajuato 38982</li>
                        <li class="text-white">+52 445 182 3062</li>
                        <li class="text-white">www.bismouto.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div class="container">
            <div class="row g-4 justify-content-between">
                <div class="col-auto">
                    <p class="mb-0">© 2024 Bismouto. Todos los Derechos Reservados</p>
                </div>
                <div class="col-auto">
                    <p class="mb-0">Diseñado con 💜 por <a href="https://www.bismouto.com" class="text-white">Jaime Leon</a></p>
                    <p class="mb-0">Diseñado con 💜 por <a href="https://www.bismouto.com" class="text-white">Alexis Antonio Caballero</a></p>
                    <p class="mb-0">Diseñado con 💜 por <a href="https://www.bismouto.com" class="text-white">Esteban Alvarez Nuñez</a></p>
               
                </div>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>
