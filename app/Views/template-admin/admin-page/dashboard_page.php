<?= $this->extend('template-admin/layout/app') ?>

<?= $this->section('content'); ?>
<div class="flex w-full mb-4">
    <div class="flex flex-col justify-center items-start text-base lg:text-xl font-semibold text-slate-800 bg-white px-4 md:px-10 py-6 w-full rounded-md shadow-md shadow-[#1F3C88]/25">
        <h1 class="border-b pb-2 w-full">Dashboard | Selamat datang kembali, Hi <?= $userName ?> 🤗</h1>
        <div class="flex flex-col justify-center items-center text-base font-medium space-y-1 py-2 px-4 bg-blue-100 text-blue-700 border border-blue-700 rounded-md">
            <p>Halaman dashboard ini menunjukkan laporan statistik mengenai total konten serta total pesan masuk yang ditracking secara realtime</p>
        </div>
    </div>
</div>
<div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4 w-full">
    <div class="flex flex-col md:flex-row justify-start space-x-0 md:space-x-10 items-center text-xl md:text-base lg:text-xl font-semibold text-slate-800 bg-white px-2 md:px-10 py-6 w-full rounded-md shadow-md shadow-[#1F3C88]/25">
        <img class="w-32 md:w-24 lg:w-32 object-cover rounded-lg" draggable="false" src="<?= base_url('assets/img/content_image.png') ?>" alt="Content Image">
        <div class="flex flex-col w-full mt-2 md:mt-0">
            <h1 class="border-b mb-2 pb-2 w-full text-center">Total Konten</h1>
            <div class="flex flex-col justify-center items-center space-y-1 py-6 text-2xl">
                <p><?= $total_content ?></p>
            </div>
        </div>
    </div>
    <div class="flex flex-col md:flex-row justify-start space-x-0 md:space-x-10 items-center text-xl md:text-base lg:text-xl font-semibold text-slate-800 bg-white px-2 md:px-10 py-6 w-full rounded-md shadow-md shadow-[#1F3C88]/25">
        <img class="w-32 md:w-24 lg:w-32 object-cover rounded-lg" draggable="false" src="<?= base_url('assets/img/message_image.png') ?>" alt="Content Image">
        <div class="flex flex-col w-full mt-2 md:mt-0">
            <h1 class="border-b mb-2 pb-2 w-full text-center">Total Pesan Masuk</h1>
            <div class="flex flex-col justify-center items-center space-y-1 py-6">
                <p><?= $total_message ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>