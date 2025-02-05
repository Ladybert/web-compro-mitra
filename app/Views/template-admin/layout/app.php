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
    <link rel="stylesheet" href="<?= base_url('src/admin.css') ?>">

    <!-- Jquery link -->
    <script src="<?= base_url('src/js/jquery-3.7.1.min.js') ?>"></script>

</head>
<body class="scrollbar-custom flex flex-col justify-center w-screen h-screen bg-gray-200">

    <div class="flex w-full h-full">
        
        <!-- Sidebar / Aside -->
        <aside>
            <?= $this->include('template-admin/layout/aside') ?>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-auto">
            <?= $this->renderSection('content') ?>
        </main>

    </div>

    <script src="<?= base_url('src/js/admin.js') ?>"></script>
</body>
</html>