<section class="relative flex flex-col mt-1 md:-mt-6 lg:-mt-40">
  <div class="px-4 md:px-12 relative w-full bg-[#1F3C88]">
    <!-- Bagian judul -->
    <div id="Portofolio" class="flex flex-col justify-center items-center text-center text-white pt-24">
      <h1 class="font-semibold text-[1.7rem] md:text-[2.5rem]">Portofolio Proyek</h1>
      <p class="mt-4 font-medium text-[0.7rem] md:text-[1rem] w-full lg:w-3/4">Proyek-proyek kami mencerminkan dedikasi terhadap kualitas dan inovasi. Dari konstruksi bangunan hingga instalasi mekanikal & elektrikal, kami siap mewujudkan visi Anda menjadi kenyataan.</p>
    </div>

    <!-- Grid container -->
    <div class="parent mt-8 md:mt-12 px-4 grid grid-cols-1 md:grid-cols-2 gap-8 text-white place-items-center mb-12"> <!-- Ubah gap-y-12 menjadi gap-6 dan tambah px-4 -->

    <!-- start item -->
     <?php foreach($contents as $key => $content) : ?>
      <div class="child cursor-pointer relative group transition-all duration-300 ease-in-out transform hover:-translate-y-4 rounded-lg overflow-hidden shadow-lg shadow-black/50 w-full max-w-lg">
        <?= default_image($content['image'], 'PROJECT ITEM', 'w-full object-cover') ?>
          <div class="absolute bottom-0 left-0 right-0 bg-black/75 backdrop-blur-lg opacity-0 group-hover:opacity-100 transition-all duration-300">
              <p class="text-white text-xs md:text-md lg:text-xl font-semibold p-4 text-center">
                  <?= $content['title']; ?>
              </p>
          </div>
      </div>
      <?php endforeach; ?>
      <!-- end item -->

    </div>
    <!-- button -->
    <div id="more" class="flex mt-10 md:mt-16 mb-12 mx-auto w-3/4 md:w-1/3 lg:w-1/4 justify-center items-center px-8 py-4 rounded-lg bg-white text-[#1F3C88] font-semibold text-xl cursor-pointer hover:bg-white/50 hover:backdrop-blur-lg hover:text-white transition duration-300">
        <p class="text-sm md:text-md lg:text-xl">Muat lebih banyak</p>
    </div>
  </div>
</section>