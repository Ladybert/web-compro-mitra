<?= $this->extend('template-admin/layout/app') ?>

<?= $this->section('content') ?>
<div class="absolute top-0 left-0 flex justify-center items-center overflow-hidden w-full h-full bg-slate-200 z-50">
    <div class="mx-auto px-2 md:px-12 py-8 bg-white rounded-lg shadow-[#1F3C88]/25 shadow-lg">
        <!-- Title -->
         <div class="flex flex-col justify-center items-center space-y-4 pb-6">
             <img class="w-full object-cover" draggable="false" src="<?= base_url('assets/img/logo-dark.png') ?>" alt="Logo Admin PT Mitra Langgeng Teknik">
             <!-- error message -->
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="mx-auto px-8 py-4 border border-2 border-red-600 rounded-md w-full bg-red-100 text-red-700 font-medium transition-all duration-300">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
         </div>

        <!-- form input -->
        <form action="<?= base_url('/admin-page-login-process') ?>" method="post" class="flex flex-col space-y-4 w-full">
            <input id="emailLogin" autocomplete="off" type="email" name="email" placeholder="Your email *" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#1F3C88] cursor-text font-medium outline-none transition-all duration-500">
            <input id="passwordLogin" autocomplete="off" type="password" name="password" placeholder="Your pasword *" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#1F3C88] cursor-text font-medium outline-none transition-all duration-500">

            <div class="flex flex-col md:flex-row justify-between space-x-0 space-y-2 md:space-y-0 md:space-x-4 pt-2 md:pt-8">
                <a id="resetBtn" class="w-full text-center px-6 py-2 md:py-4 border border-2 border-slate-900 text-slate-900 font-semibold rounded-lg transition-all duration-500 shadow-md">Reset</a>
                <button type="submit" class="w-full px-6 py-2 md:py-4 bg-green-600 hover:bg-green-700 focus:bg-green-700 text-white font-semibold rounded-lg transition-all duration-500 shadow-md">Login</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>