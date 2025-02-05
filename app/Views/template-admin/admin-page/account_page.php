<?= $this->extend('template-admin/layout/app') ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('error')) : ?>
    <div class="flash-message mb-6 mx-auto px-8 py-4 border border-red-600 rounded-md w-full bg-red-100 text-red-700 font-medium transition-all duration-300">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="flash-message mb-6 mx-auto px-8 py-4 border border-green-600 rounded-md w-full bg-green-100 text-green-700 font-medium transition-all duration-300">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<div class="flex space-x-6">
    <div class="flex flex-col justify-between text-xl font-semibold text-slate-800 bg-white px-10 py-6 w-full rounded-md shadow-md  shadow-[#1F3C88]/25">
        <h1 class="border-b pb-2">Informasi tentang akun</h1>
        <div class="flex flex-col justify-center items-start space-y-1 py-4">
            <p class="font-medium text-lg">Nama    : <span><?= $userName?></span></p>
            <p class="font-medium text-lg">Email   : <span><?= $userEmail ?></span></p>
        </div>
        <a class="flex w-1/3 justify-end" href="<?= base_url('/admin-page-logout-process') ?>">
            <button class="w-full text-base px-4 py-2 bg-red-600 hover:bg-red-700 focus:bg-red-700 rounded-md shadow-md text-white transition-all duration-500">Log Out</button>
        </a>
    </div>
    <div class="text-xl font-semibold text-slate-800 bg-white px-10 py-6 w-full rounded-md shadow-md  shadow-[#1F3C88]/25">
        <h1>Ubah password</>
        <form action="<?= base_url('admin/account/change-password') ?>" method="POST" class="flex flex-col justify-center items-start space-y-2 mt-2 border-t py-4 font-medium text-sm">
            <div class="flex justify-between items-center border border-gray-300 space-x-2 rounded-md w-full">
                <input minlength="8" id="new_password" class="px-4 py-2 w-full focus:outline-none focus:ring-0 focus:border-[#1F3C88]" type="password" name="new_password" placeholder="Password baru *">
                <button type="button" class="toggle-password p-2 border-l" data-target="#new_password" data-invisible="<?= base_url('assets/img/invisible.png') ?>" data-visible="<?= base_url('assets/img/eye.png') ?>">
                    <img class="w-4" src="<?= base_url('assets/img/eye.png') ?>" alt="Show Password">
                </button>
            </div>
            <div class="flex justify-between items-center border border-gray-300 space-x-2 rounded-md w-full">
                <input minlength="8" id="confirm_password" class="px-4 py-2 w-full focus:outline-none focus:ring-0 focus:border-[#1F3C88]" type="password" name="confirm_password" placeholder="Konfirmasi password baru *">
                <button type="button" class="toggle-password p-2 border-l" data-target="#confirm_password" data-invisible="<?= base_url('assets/img/invisible.png') ?>" data-visible="<?= base_url('assets/img/eye.png') ?>">
                    <img class="w-4" src="<?= base_url('assets/img/eye.png') ?>" alt="Show Password">
                </button>
            </div>
            <button id="submit-btn" type="submit" class="font-medium px-4 py-2 text-white w-full rounded-md transition duration-300 bg-[#1F3C88]/25 cursor-not-allowed transition duration-300" disabled>
                Ubah Password
            </button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>