<!DOCTYPE html>
<html lang="en">
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
<body class="scrollbar-custom">
    
   <!-- Header -->
   <?= $this->include('template-user/layout/header') ?>

    <!-- Main Content -->
     <main class="mx-12">
         <?= $this->include('template-user/user-content/section_one') ?>
         <?= $this->include('template-user/user-content/section_two') ?>
     </main>

    <!-- Footer -->
    <?= $this->include('template-user/layout/footer') ?>
</body>
</html>