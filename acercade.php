<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/styleacerca.css">
    <title>Acerca de Nosotros</title>
</head>

<body>
    <?php
    include_once("layouts/_main-header.php");
    ?>
    <section class="about-section">
        <div class="about-content">
            <h1>Sobre Nosotros</h1>
            <p>¡Bienvenido a The Street Store!</p>
            <p>Somos apasionados por brindarte la mejor experiencia de compra en línea. Nuestra misión es ofrecerte productos de alta calidad y servicio excepcional.</p>
            <p>Con años de experiencia en la industria, hemos construido una reputación sólida y confiable. Nos enorgullece ser tu destino confiable para todas tus necesidades de compras en línea.</p>
        </div>
        <div class="about-image">
            <img src="/imagenes/equipo.png" alt="Equipo de trabajo" style="width: 150px; height: 150px;">
        </div>
    </section>

    <section class="values-section">
        <h2>Nuestros Valores</h2>
        <ul>
            <li><span>Calidad:</span> Nos comprometemos con productos de la más alta calidad para garantizar tu satisfacción.</li>
            <li><span>Servicio al Cliente:</span> Tu satisfacción es nuestra prioridad. Estamos aquí para ayudarte en cada paso del camino.</li>
            <li><span>Innovación:</span> Siempre estamos buscando formas de mejorar tu experiencia de compra con las últimas tecnologías y tendencias.</li>
            <li><span>Compromiso:</span> Nos comprometemos a cumplir nuestras promesas y brindarte un servicio confiable y transparente.</li>
        </ul>
    </section>

    <?php
    include_once("layouts/_main-footer.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>