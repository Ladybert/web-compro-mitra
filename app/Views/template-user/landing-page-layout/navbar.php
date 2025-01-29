<nav class="flex px-6 md:px-12 py-4 gap-x-[0px] sm:gap-x-32 md:gap-x-64 xs:justify-between transition-all duration-300 ease-in-out">
        <!-- Logo Section -->
        <a class="flex" href="#Beranda">
            <div class="flex w-full w-[180px] xs:w-[200px] sm:w-[225px] md:w-[250px]">
                <img 
                    class="logo-light w-full h-auto object-contain" 
                    src="<?= base_url('assets/img/logo-light.png') ?>"
                    data-light="<?= base_url('assets/img/logo-light.png') ?>" 
                    data-dark="<?= base_url('assets/img/logo-dark.png') ?>"  
                    alt="Mitra Langgeng Teknik Logo">
            </div>
        </a>

        <!-- Navigation Links -->
        <div class="default-navbar hidden w-full font-medium text-sm text-slate-100 ml-10 justify-between items-center sm:hidden md:hidden lg:flex">
            <a class="nav-link text-sm md:text-base  hover:text-slate-300 focus:text-slate-400 transition" href="<?= base_url('/'.'#Beranda'); ?>">Beranda</a>
            <a class="nav-link text-sm md:text-base  hover:text-slate-300 focus:text-slate-400 transition" href="<?= base_url('/#Layanan'); ?>">Layanan</a>
            <a class="nav-link text-sm md:text-base  hover:text-slate-300 focus:text-slate-400 transition" href="<?= base_url('/#Portofolio'); ?>">Portofolio</a>
            <a class="nav-link text-sm md:text-base  hover:text-slate-300 focus:text-slate-400 transition" href="<?= base_url('mitra-langgeng-teknik-company-profile'); ?>">Tentang kami</a>
            <a class="nav-link text-sm md:text-base  hover:text-slate-300 focus:text-slate-400 transition" href="#Kontak">Kontak</a>
        </div>

        <!-- Hamburger menu icon -->
        <div class="lg:hidden flex items-center">
            <!-- Open Icon -->
            <div id="open-menu" class="flex flex-col justify-between items-center w-4 h-4 cursor-pointer">
                <span class="line block bg-white rounded-full"></span>
                <span class="line block bg-white rounded-full"></span>
                <span class="line block bg-white rounded-full"></span>
            </div>
        </div>
    </nav>
<div class="fixed flex flex-col mobile-menu hidden px-4 py-8 top-0 right-0 xs:w-[60%] md:w-[50%] h-full bg-black/75 backdrop-blur-lg font-medium justify-start text-white text-sm md:text-xl">
    
    <div id="close-menu" class="mt-4 hidden flex flex-col justify-between w-8 h-8 cursor-pointer">
        <span class="one rounded-full"></span>
        <span class="two rounded-full"></span>
    </div>
    
    <!-- Navigation Links -->
    <a class="w-full text-left mt-4 mx-2 py-4 px-2 md:px-8 hover:bg-white/50 rounded-lg hover:backdrop-blur-lg focus:text-[#0C0A0A] transition" href="#Beranda">Beranda</a>
    <a class="w-full text-left mx-2 py-4 px-2 md:px-8 hover:bg-white/50 rounded-lg hover:backdrop-blur-lg focus:text-[#0C0A0A] transition" href="#Layanan">Layanan</a>
    <a class="w-full text-left mx-2 py-4 px-2 md:px-8 hover:bg-white/50 rounded-lg hover:backdrop-blur-lg focus:text-[#0C0A0A] transition" href="#Portofolio">Portofolio</a>
    <a class="w-full text-left mx-2 py-4 px-2 md:px-8 hover:bg-white/50 rounded-lg hover:backdrop-blur-lg focus:text-[#0C0A0A] transition" href="#TentangKami">Tentang kami</a>
    <a class="w-full text-left mx-2 py-4 px-2 md:px-8 hover:bg-white/50 rounded-lg hover:backdrop-blur-lg focus:text-[#0C0A0A] transition" href="#Kontak">Kontak</a>
</div>