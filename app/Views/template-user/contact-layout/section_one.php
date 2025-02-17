<section class="flex justify-center items-center w-full -mt-2 md:-mt-10 my-8">
    <div class="relative flex flex-col md:flex-row justify-center space-x-0 md:space-x-10 lg:space-x-14 bg-white shadow-lg shadow-[#1F3C88]/25 w-full max-w-6xl rounded-xl p-8 md:p-10 lg:px-16 lg:py-12 mx-0 md:mx-14 lg:mx-32">
        <!-- Form -->
        <form class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6 w-full md:w-2/3 text-xs md:text-sm lg:text-base">
            <input type="text" placeholder="Nama *" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#1F3C88] cursor-text outline-none transition-all duration-500">
            <input type="email" placeholder="Email *" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#1F3C88] cursor-text outline-none transition-all duration-500">
            <select class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#1F3C88] outline-none col-span-1 md:col-span-2 cursor-pointer transition-all duration-500">
                <option selected>Pilih jenis layanan yang diminati</option>
                <option value="Jasa Pelaksana Konstruksi Bangunan">Jasa Pelaksana Konstruksi Bangunan</option>
                <option value="Jasa Pelaksana Mechanical dan Electrical">Jasa Pelaksana Mechanical dan Electrical</option>
                <option value="Jasa Pelaksana Swimming Pool">Jasa Pelaksana Swimming Pool</option>
                <option value="Jasa Pelaksana Asphalt Road">Jasa Pelaksana Asphalt Road</option>
            </select>
            <textarea placeholder="Pesan *" rows="4" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#1F3C88] cursor-text outline-none col-span-1 md:col-span-2 transition-all duration-500"></textarea>
            <label class="flex items-center gap-2 col-span-1 md:col-span-2 text-gray-600 text-[0.6rem] md:text-xs lg:text-sm">
                <input id="agreementCheck" type="checkbox" class="accent-[#1F3C88]">
                Saya menyetujui <a href="#" class="text-[#1F3C88] underline">persyaratan dan kebijakan</a>
            </label>

            <button id="aggreementButton" type="submit" class="col-span-1 md:col-span-2 bg-[#1F3C88] text-white font-medium py-3 rounded-lg hover:bg-[#142c66] transition">
                Kirim Pesan
            </button>
        </form>

        <!-- Informasi Kontak -->
        <div class="flex flex-col space-y-6 mt-12 md:mt-0 text-gray-700 w-full md:w-1/3">
            <div class="flex items-start space-x-4">
                <img draggable="false" class="mt-1 w-4 md:w-6" src="<?= base_url('assets/img/travel.png'); ?>" alt="Lokasi Kantor">
                <div class="flex-1">
                    <h1 class="text-sm md:text-base lg:text-lg font-semibold">Alamat</h1>
                    <p class="text-xs md:text-sm lg:text-base mt-1 leading-relaxed">
                        Dusun Babatan RT.013 RW.03 Panjunan, Sukodono, Sidoarjo
                    </p>
                </div>
            </div>

            <div class="flex items-start space-x-4">
                <img draggable="false" class="mt-1 w-4 md:w-6" src="<?= base_url('assets/img/whatsapp.png'); ?>" alt="WhatsApp">
                <div class="flex-1">
                    <h1 class="text-sm md:text-base lg:text-lg font-semibold">WhatsApp</h1>
                    <p class="text-xs md:text-sm lg:text-base mt-1 leading-relaxed">
                        08126325557 atau 081331021701
                    </p>
                </div>
            </div>

            <div class="flex items-start space-x-4">
                <img draggable="false" class="mt-1 w-4 md:w-6" src="<?= base_url('assets/img/email.png'); ?>" alt="Email">
                <div class="flex-1">
                    <h1 class="text-sm md:text-base lg:text-lg font-semibold">Email</h1>
                    <p class="text-xs md:text-sm lg:text-base mt-1 leading-relaxed">
                        mitralanggengteknik.pt @gmail.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
