<!DOCTYPE html>
<html class="scroll-smooth focus:scroll-auto" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Document name -->
    <title><?= $title ?></title>

    <!-- PT Mitra Langgeng Teknik Logo Picture -->
     <link rel="shortcut icon" href="<?= base_url('assets/img/logo-pt.png') ?>" type="image/x-icon">

    <!-- Tailwindcss link -->
    <link href="<?= base_url('dist/output.css') ?>" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="<?= base_url('src/global.css') ?>">

    <!-- Jquery link -->
    <script src="<?= base_url('src/js/jquery-3.7.1.min.js') ?>"></script>

</head>
<body class="scrollbar-custom flex flex-col min-h-screen">
    
   <!-- Header -->
    <header id="Beranda">
        <?= $this->include('template-user/landing-page-layout/navbar') ?>
        <?= $this->include('template-user/landing-page-layout/header') ?>
    </header>

    <!-- Main Content -->
     <main class="">
         <?= $this->renderSection('content') ?>

         <div id="backToTop" class="fixed bottom-8 right-8 z-50 w-12 h-12 rounded-full bg-[#0C0A0A] shadow-lg cursor-pointer opacity-0 transition-opacity duration-300 hover:scale-110 duration-300 transition-all">
            <img class="w-full p-3" src="<?= base_url('assets/img/up-arrow.png') ?>" alt="Up Arrow">
        </div>
     </main>

    <!-- Footer -->
    <?= $this->include('template-user/landing-page-layout/footer') ?>

    <script src="<?= base_url('src/js/app.js') ?>"></script>
</body>
</html>