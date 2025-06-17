<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibCloud - Biblioteca Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .hero {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1512820790803-83ca734da794') center/cover no-repeat;
            color: white;
            padding: 100px 0;
        }
    </style>
</head>
<body>

<section class="hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Bem-vindo à LibCloud</h1>
        <p class="lead">Sua biblioteca digital acessível de qualquer lugar. Leia, explore e descubra novos mundos!</p>
        <a href="<?= baseUrl() ?>Livro/index" class="btn btn-light btn-lg mt-3">Ver acervo</a>
    </div>
</section>

<section id="sobre" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Sobre a LibCloud</h2>
                <p>A <strong>LibCloud</strong> é uma biblioteca digital que oferece acesso a uma vasta coleção de livros, autores renomados, publicações acadêmicas e obras clássicas. Nosso objetivo é democratizar o conhecimento e torná-lo acessível para todos, em qualquer dispositivo, a qualquer hora.</p>
                <p>Explore, salve seus favoritos, e continue sua leitura de onde parou com nossa plataforma moderna e intuitiva.</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac" class="img-fluid rounded shadow" alt="Pessoas lendo livros">
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
