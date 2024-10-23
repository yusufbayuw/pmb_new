<div>
  <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Taruna Bakti University</span>
          <img class="h-8 w-auto" src="https://tbu.ac.id/wp-content/uploads/2024/10/tbu.png" alt="">
        </a>
      </div>
      <div class="flex flex-1 justify-end lg:hidden">
        <a href="{{ route('pendaftaran') }}" class="text-sm font-semibold leading-6 text-gray-900"><span
            aria-hidden="true">🔐</span></a>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="{{ route('pendaftaran') }}" class="text-sm font-semibold leading-6 text-gray-900">Login <span
            aria-hidden="true">&rarr;</span></a>
      </div>
    </nav>

  </header>

  <div class="relative isolate px-6 pt-6 lg:px-8">

    <div class="mx-auto max-w-2xl py-12 sm:py-20 lg:py-28">
      <div class="mb-4 sm:mb-8 flex justify-center">
        <div
          class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
          🔥 PMB Taruna Bakti University 🔥
        </div>
      </div>
      <div class="text-center">
        <h1 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Thriving
          Beyond University <span class="animate-pulse hover:animate-none">🚀</span></h1>
        <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Penerimaan Mahasiswa Baru Taruna
          Bakti University {{ $gelombang ? 'Tahun Akademik ' . $gelombang : '' }}</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
          <a href="{{ route('pendaftaran') }}"
            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 animate-bounce hover:animate-none">Daftar
            Sekarang 😊</a>
          <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">atau Login 🔐 <span
              aria-hidden="true">→</span></a>
        </div>
      </div>
    </div>

    <div class="mx-auto max-w-2xl px-6 py-8 bg-white rounded-lg border-4 border-indigo-600 shadow-md shadow-indigo-900">
      <h2 class="text-2xl font-bold text-center text-gray-900 mb-6">Berikut Tata Cara Pendaftaran Online <span
          class="animate-spin">🤔</span></h2>
      <h3 class="text-lg font-semibold text-gray-800">Cara Pendaftaran Online</h3>
      <ul class="list-disc list-outside text-gray-700 mt-4 ml-4">
        <li>Daftarkan diri Anda dengan mengisi formulir pengisian secara lengkap.</li>
        <li>Aktifasi Pendaftaran Online akan terkirim ke email. Pastikan email yang diisikan adalah email aktif.</li>
        <li>Untuk keamanan data, jika lupa password segera hubungi petugas pendaftaran.</li>
        <li>Lakukan login untuk melakukan perubahan data jika diperlukan dan mencetak Formulir beserta persyaratan yang
          ada.</li>
      </ul>

      <h3 class="text-lg font-semibold text-gray-800 mt-6">Cara Verifikasi Hasil Pendaftaran Online</h3>
      <ul class="list-disc list-outside text-gray-700 mt-4 ml-4">
        <li>Verifikasi pendaftaran online dilakukan secara langsung di kampus oleh petugas pendaftaran.</li>
        <li>Serahkan hasil pendaftaran secara online beserta persyaratan lainnya ke kampus Taruna Bakti.</li>
        <li>Membayar biaya pendaftaran sebesar Rp. 350.000,-.</li>
        <li>Setelah verifikasi, cetak kartu pendaftaran yang sudah terverifikasi oleh petugas pendaftaran.</li>
        <li>Jika tidak melakukan verifikasi, pendaftar dianggap mengundurkan diri.</li>
      </ul>
    </div>

    <div
      class="flex flex-col md:flex-row mx-auto max-w-2xl  bg-indigo-600 rounded-lg border-1 border-gray-700 shadow-md shadow-gray-500 mt-8 mb-8">
      <div class="flex-1 px-6 py-6">
        <h2 class="text-xl font-bold text-white mb-2 sm:mb-6 ml-2">Panitia PMB Taruna Bakti University <span
            class="animate-spin"></span></h2>
        <h3 class="text-lg font-semibold text-white mt-2 sm:mt-4 ml-2">Help Desk (08.00 - 14.00 Senin-Jumat)</h3>
        <p class="text-white mt-2 sm:mt-4 ml-2">
          Jalan L.L.R.E. Martadinata 91, 
          <br>
          Bandung - Jawa Barat,
          <br>
          Indonesia, 40115
          <br>
          <a href="https://maps.app.goo.gl/Uxe5XGQDejz9Z88s7">Map Taruna Bakti Univeristy</a>
          <br>
          <br class="hidden sm:visible">
          Telepon Universitas: 08882000011
        </p>
      </div>
      <div class="flex-1">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.874790904278!2d107.6196666!3d-6.905572799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64aeeb443d9%3A0x236a3850c94d6a4a!2sLLRE%20Martadinata%20St%20No.91%2C%20RT.02%2C%20Citarum%2C%20Bandung%20Wetan%2C%20Bandung%20City%2C%20West%20Java%2040115!5e0!3m2!1sen!2sid!4v1729655198584!5m2!1sen!2sid" width="600" height="450" class="w-full m-0 p-0 h-full md:h-full border-0 rounded-b-md sm:rounded-b-none sm:rounded-r-md sm:rounded-br-md shadow-md" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>

  </div>
</div>