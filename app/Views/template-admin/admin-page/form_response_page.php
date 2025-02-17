<?= $this->extend('template-admin/layout/app') ?>

<?= $this->section('content'); ?>
<div id="modalMessage" class="hidden fixed inset-0 background flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-md shadow-lg w-5/6 md:w-2/3 my-16 max-h-[90vh] overflow-hidden flex flex-col">
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h2 class="text-base md:text-xl font-semibold border-slate-500">Message Details</h2>
            <form id="deleteMessageFromModal" action="" method="post">
                <button type="submit" onclick="return confirm('Apa anda yakin untuk menghapus pesan ini ?');" class="underline text-red-600 hover:text-red-800 text-base font-medium transition-all duration-300">delete</button>
            </form>
        </div>
        <div class="flex-1 overflow-y-auto pr-4 mb-4 scrollbar-custom">
            <div class="flex flex-col border-b pb-4 w-full">
                <h3 class="text-base md:text-xl font-semibold">Nama : <span id="nameMessage" class="font-medium"></span></h3>
                <h3 class="text-base md:text-xl font-semibold">Email : <span id="emailMessage" class="font-medium"></span></h3>
                <h3 class="text-base md:text-xl font-semibold">Jenis Layanan : <span id="serviceMessage" class="font-medium"></span></h3>
                <h3 class="text-base md:text-xl font-semibold">Waktu : <span id="dateMessage" class="font-medium"></span></h3>
            </div>
            <div class="mt-4 text-base md:text-xl font-medium text-slate-900 leading-snug">
                <p id="fillMessage"></p>
            </div>
        </div>
        <div class="mt-auto flex justify-end">
            <button data-close-modal type="button" id="closeMessageModal" class="px-6 py-2 bg-transparent border-2 border-black rounded-md text-black font-medium hover:shadow-[#000000]/50 hover:shadow-md transition duration-300">Close</button>
        </div>
    </div>
</div>
<!-- Modal create end -->

<div class="flex w-full mb-4 h-[90vh] max-h-screen overflow-hidden"> 
    <div class="flex flex-col justify-start items-start text-xl font-semibold text-slate-800 bg-gray-200 px-4 pt-4 pb-2 w-full rounded-md shadow-md shadow-[#1F3C88]/25">
        <div class="flex justify-between bg-slate-800 items-center rounded-sm border-b mx-2 p-6 shadow-md text-white w-full">
            <h1>Messages</h1>
        </div>
        <div class="flex justify-center items-center mt-4 w-full mx-auto">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="flash-message mb-2 px-8 py-4 border border-red-600 rounded-md w-full bg-red-100 text-red-700 font-medium transition-all duration-300">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="flash-message mb-2 px-8 py-4 border border-green-600 rounded-md w-full bg-green-100 text-green-700 font-medium transition-all duration-300">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="overflow-y-auto w-full px-2 scroll-smooth focus:scroll-auto scrollbar-custom">
            <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 mt-4">
            <?php if(!isset($messages) || empty($messages)) : ?>
                <div class="absolute flex justify-center items-center w-[65%] md:w-[74%] bg-blue-100 border border-blue-600 rounded-lg p-4 text-center text-blue-800 font-medium">
                    Belum ada pesan masuk untuk saat ini
                </div>
            <?php else : ?>
                <?php foreach($messages as $key => $message): ?>
                        <div 
                        id="messageBox" 
                        class="flex flex-col justify-center border p-4 md:p-6 pb-4 bg-white shadow-md scale-95 hover:scale-100 rounded-md cursor-pointer transition-all duration-300">
                        <div
                            data-message-box 
                            data-urlmessageid="<?= base_url('admin/message/delete/'. $message['id']) ?>"
                            data-name="<?= $message['name'] ?>" 
                            data-email="<?= $message['email'] ?>" 
                            data-service="<?= $message['service'] ?>"
                            data-date="<?= $message['created_at_detail'] ?>"
                            data-message="<?= $message['message'] ?>" >
                            <div class="flex justify-between items-center w-full mb-2">
                                <h3 class="text-xs md:text-lg font-bold text-slate-700 cursor-text"><?= $message['name'] ?> | <?= $message['email'] ?></h3>
                            </div>
                            <p class="text-base font-semibold text-slate-700 mb-2 cursor-text"><?= $message['service'] ?></p>
                            <p class="text-base font-medium text-slate-700 mb-3 truncate cursor-text"><?= $message['message'] ?></p>
                        </div>
                            <div class="flex justify-between items-center">
                                <form action="<?= base_url('admin/message/delete/'. $message['id']) ?>" method="post">
                                    <button type="submit" onclick="return confirm('Apa anda yakin untuk menghapus pesan ini ?');" class="underline text-red-600 hover:text-red-800 text-base font-medium transition-all duration-300">delete</button>
                                </form>
                                <p class="text-sm font-medium text-slate-700 text-right cursor-text"><?= $message['created_at'] ?></p>
                            </div>
                        </div>
                        <?php endForeach; ?>
                        <?php endif;?>
                        <!-- Duplikat item lainnya -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
