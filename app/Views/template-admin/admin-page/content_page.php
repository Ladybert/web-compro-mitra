<?= $this->extend('template-admin/layout/app') ?>

<?= $this->section('content'); ?>
<!-- Modal create start -->
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
<div id="modal" class="hidden fixed inset-0 background flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-md shadow-lg w-1/3 my-20">
        <h2 class="text-xl font-semibold border-b pb-2 mb-4">Add New Content</h2>
        <form id="contentForm" class="space-y-4" action="<?= base_url('/admin/content/add-content-process'); ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="contentTitle" class="block text-sm font-medium text-gray-700">Content Title</label>
                <input type="text" required id="contentTitle" name="content_title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="contentImage" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <input type="file" required id="contentImage" name="content_img" accept="image/*" class="mt-1 block w-full">
                <div id="imagePreview" class="flex justify-center items-center mt-4 hidden">
                    <img id="preview" draggable="false" class="w-64 object-cover rounded-md border border-gray-300">
                </div>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" id="closeModal" class="px-4 py-2 bg-gray-400 rounded-md text-slate-100 font-medium hover:bg-gray-500 transition duration-300">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 rounded-md text-slate-100 font-medium hover:bg-blue-700 transition duration-300">Save</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal create end -->

<!-- Modal edit start -->
<div id="editModal" class="hidden fixed inset-0 background bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-md shadow-lg w-1/3 my-20">
        <h2 class="text-xl font-semibold border-b pb-2 mb-4">Edit Content</h2>
        <form id="updateContentForm" class="space-y-4" action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="dataContentTitle" class="block text-sm font-medium text-gray-700">Content Title</label>
                <input type="text" required id="dataContentTitle" name="content_title"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input id="dataContentId" name="contentId" type="hidden">
            </div>
            <div>
                <label for="updateContentImage" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <input type="file" id="updateContentImage" name="content_img" accept="image/*"
                    class="mt-1 block w-full">
                <div id="updateImagePreview" class="flex justify-center items-center mt-4 hidden">
                    <img id="updatePreview" draggable="false" class="w-64 object-cover rounded-md border border-gray-300">
                </div>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" id="closeContentModal"
                    class="px-4 py-2 bg-gray-400 rounded-md text-slate-100 font-medium hover:bg-gray-500 transition duration-300">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 rounded-md text-slate-100 font-medium hover:bg-blue-700 transition duration-300">Save</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal Edit End -->
 
<div class="flex w-full mb-4">
    <div class="flex flex-col justify-center items-start text-sm md:text-xl font-semibold text-slate-800 bg-white px-4 md:px-10 pt-4 md:pt-6 pb-2 w-full rounded-md shadow-md shadow-[#1F3C88]/25">
        <div class="flex justify-between items-center border-b pb-2 w-full">
            <h1>Content Management</h1>
            <button id="openModal" class="px-4 py-2 bg-green-600 rounded-md text-white font-medium text-xs md:text-base hover:-translate-y-1 hover:-translate-x-1 hover:shadow-[#000000]/70 hover:shadow-lg transition duration-300">Buat konten baru</button>
        </div>
        <div class="flex items-center justify-center w-full overflow-hidden">
            <div class="col-span-12 w-full">
                <div class="overflow-auto lg:overflow-visible">
                    <table class="table text-gray-400 border-collapse text-sm w-full">
                        <thead class="bg-white text-slate-900">
                            <tr class="w-full">
                                <th class="p-3 text-center">No</th>
                                <th class="p-3 text-left">Image</th>
                                <th class="p-3 text-left">Content Title</th>
                                <th class="p-3 text-left">Created At</th>
                                <th class="p-3 text-left">Updated At</th>
                                <th class="p-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!isset($contents) || empty($contents)) :?>
                                <div class="bg-blue-100 border border-blue-600 rounded-lg p-4 text-center text-blue-800 font-medium">
                                    Anda belum membuat konten apapun, tekan tombol <a href="#" class="text-blue-600 underline hover:text-blue-800">Buat konten baru</a> untuk membuatnya.
                                </div>
                                <?php else : ?>
                                    <?php $i = 1 + ($pager->getCurrentPage() - 1) * $pager->getPerPage(); foreach($contents as $key => $content) : ?>
                                        <tr class="bg-white w-full">
                                            <td class="p-2 font-semibold text-slate-700"><?php echo $i++; ?></td>
                                            <td class="p-2">
                                                <?= default_image($content['image'], 'PROJECT ITEM', 'rounded-md w-72  object-cover') ?>
                                            </td>
                                            <td class="p-2 text-wrap font-semibold text-slate-700">
                                                <?= $content['title'] ?>
                                            </td>
                                            <td class="p-2 font-semibold text-slate-500">
                                                <?= $content['created_at'] ?>
                                            </td>
                                            <td class="p-2 font-semibold text-slate-500">
                                                <?= $content['updated_at'] ?>
                                            </td>
                                            <td class="p-2 flex flex-col my-8 justify-between">
                                                <a id="openContentModal"
                                                    data-id="<?= $content['id'] ?>"
                                                    data-title=" <?= $content['title'] ?>" 
                                                    data-img="<?= base_url('uploads/'. $content['image']); ?>" 
                                                    href="#" class="text-gray-800 hover:bg-slate-300 bg-white text-base font-medium text-center rounded-sm px-2 py-1 transition-all duration-300">
                                                    edit
                                                </a>
                                                <form action="<?= base_url('admin/content/delete/'.$content['id']) ?>" method="post">
                                                    <button type="submit" onclick="return confirm('Apa anda yakin untuk menghapus konten ini ?');" class="text-red-600 hover:bg-slate-100 bg-white text-base font-medium text-center rounded-sm px-2 py-1 transition-all duration-300">
                                                        delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="my-4 flex justify-end border-t">
                        <?= $pager->links('default', 'tailwind_full') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>