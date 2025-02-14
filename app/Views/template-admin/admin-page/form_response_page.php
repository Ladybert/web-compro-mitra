<?= $this->extend('template-admin/layout/app') ?>

<?= $this->section('content'); ?>
<div class="flex w-full mb-4 h-[90vh] max-h-screen overflow-hidden"> 
    <div class="flex flex-col justify-start items-start text-xl font-semibold text-slate-800 bg-white px-10 pt-6 pb-2 w-full rounded-md shadow-md shadow-[#1F3C88]/25">
        <div class="flex justify-between items-center border-b pb-2 w-full">
            <h1>Messages</h1>
        </div>
        <!-- Tambahin max-h biar gak lebih dari layar -->
        <div class="overflow-y-auto w-full pr-4 scroll-smooth focus:scroll-auto">
            <div class="space-y-2">
                <div class="flex flex-col justify-center items-center border border-transparent p-4 hover:bg-purple-100 rounded-md cursor-pointer transition-all duration-300">
                    <div class="flex justify-between items-center w-full">
                        <h3 class="text-xl font-semibold text-slate-700">James Bolonskie</h3>
                        <p class="text-base font-medium text-slate-700">2 minutes ago</p>
                    </div>
                    <div class="flex mt-3 leading-snug text-base font-medium text-slate-600">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quam deleniti quae optio in reiciendis repellat earum ab est nisi ut officiis, hic distinctio, molestias modi. Eos natus expedita reprehenderit!</p>
                    </div>
                </div>
                <!-- Duplikat Chat -->
                <div class="flex flex-col justify-center items-center border border-transparent p-4 hover:bg-purple-100 rounded-md cursor-pointer transition-all duration-300">
                    <div class="flex justify-between items-center w-full">
                        <h3 class="text-xl font-semibold text-slate-700">James Bolonskie</h3>
                        <p class="text-base font-medium text-slate-700">5 minutes ago</p>
                    </div>
                    <div class="flex mt-3 leading-snug text-base font-medium text-slate-600">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quam deleniti quae optio in reiciendis repellat earum ab est nisi ut officiis, hic distinctio, molestias modi. Eos natus expedita reprehenderit!</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center border border-transparent p-4 hover:bg-purple-100 rounded-md cursor-pointer transition-all duration-300">
                    <div class="flex justify-between items-center w-full">
                        <h3 class="text-xl font-semibold text-slate-700">James Bolonskie</h3>
                        <p class="text-base font-medium text-slate-700">5 minutes ago</p>
                    </div>
                    <div class="flex mt-3 leading-snug text-base font-medium text-slate-600">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quam deleniti quae optio in reiciendis repellat earum ab est nisi ut officiis, hic distinctio, molestias modi. Eos natus expedita reprehenderit!</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center border border-transparent p-4 hover:bg-purple-100 rounded-md cursor-pointer transition-all duration-300">
                    <div class="flex justify-between items-center w-full">
                        <h3 class="text-xl font-semibold text-slate-700">James Bolonskie</h3>
                        <p class="text-base font-medium text-slate-700">5 minutes ago</p>
                    </div>
                    <div class="flex mt-3 leading-snug text-base font-medium text-slate-600">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quam deleniti quae optio in reiciendis repellat earum ab est nisi ut officiis, hic distinctio, molestias modi. Eos natus expedita reprehenderit!</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center border border-transparent p-4 hover:bg-purple-100 rounded-md cursor-pointer transition-all duration-300">
                    <div class="flex justify-between items-center w-full">
                        <h3 class="text-xl font-semibold text-slate-700">James Bolonskie</h3>
                        <p class="text-base font-medium text-slate-700">5 minutes ago</p>
                    </div>
                    <div class="flex mt-3 leading-snug text-base font-medium text-slate-600">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quam deleniti quae optio in reiciendis repellat earum ab est nisi ut officiis, hic distinctio, molestias modi. Eos natus expedita reprehenderit!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
