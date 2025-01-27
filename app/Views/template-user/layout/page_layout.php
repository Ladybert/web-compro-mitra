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
    <title><?= $title = "PT Mitra Langgeng Teknik - Home"?></title>

    <!-- Tailwindcss link -->
    <link href="<?= base_url('dist/output.css') ?>" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="<?= base_url('src/global.css') ?>">

    <!-- Jquery link -->
    <script src="<?= base_url('src/js/jquery-3.7.1.min.js') ?>"></script>

    <style>
        * {
            font-family: "Montserrat", monospace;
        }

        .scrollbar-custom::-webkit-scrollbar {
        width: 6px; 
        height: 6px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb {
        background-color: rgba(199, 200, 204, 0.5);
        border-radius: 4px;
        }

        .scrollbar-custom::-webkit-scrollbar-track {
        background-color: rgba(12, 10, 10, 1); /* Track transparan */
        }

    </style>

</head>
<body class="scrollbar-custom flex flex-col min-h-screen">
    
   <!-- Header -->
   <?= $this->include('template-user/layout/header') ?>

    <!-- Main Content -->
     <main class="">
         <?= $this->include('template-user/user-content/section_one') ?>
         <?= $this->include('template-user/user-content/section_two') ?>

         <div id="backToTop" class="fixed bottom-8 right-8 z-50 w-12 h-12 rounded-full bg-[#0C0A0A] shadow-lg cursor-pointer opacity-0 transition-opacity duration-300 hover:scale-110 duration-300 transition-all">
            <img class="w-full p-3" src="<?= base_url('assets/img/up-arrow.png') ?>" alt="Up Arrow">
        </div>
     </main>

    <!-- Footer -->
    <?= $this->include('template-user/layout/footer') ?>

    <script src="<?= base_url('src/js/app.js') ?>"></script>
</body>
</html>