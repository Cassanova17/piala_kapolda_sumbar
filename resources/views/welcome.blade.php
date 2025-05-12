<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piala Kapolda Sumbar - Pendaftaran Taekwondo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollreveal/4.0.9/scrollreveal.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #991b1b 100%);
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #1e40af, #dc2626);
        }
        
        .btn-primary {
            background: linear-gradient(90deg, #1e40af, #dc2626);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #dc2626;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.style.opacity = 1;
            ScrollReveal().reveal('.animate-fade', { 
                delay: 200, 
                distance: '30px', 
                origin: 'bottom', 
                duration: 800,
                easing: 'cubic-bezier(0.5, 0, 0, 1)'
            });
            ScrollReveal().reveal('.animate-scale', { 
                delay: 300, 
                scale: 0.9, 
                duration: 800,
                easing: 'cubic-bezier(0.5, 0, 0, 1)'
            });
        });

        function toggleMenu() {
            document.getElementById("nav-menu").classList.toggle("hidden");
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-800 leading-normal">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-lg animate-fade">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo Section -->
            <div class="flex items-center space-x-6">
                <img src="/images/world-taekwondo-logo-bg.png" class="h-12" alt="World Taekwondo">
                <img src="/images/taekwondo-indonesia-logo-bg.png" class="h-12" alt="Taekwondo Indonesia">
                <img src="/images/polda_sumbar.jpeg" class="h-12" alt="Taekwondo Indonesia">
                <div class="hidden md:block border-l border-white/20 h-12"></div>
                <div class="hidden md:block">
                    <h1 class="text-xl font-bold">PIALA KAPOLDA SUMBAR</h1>
                    <p class="text-sm text-white/80">Kejuaraan Taekwondo Tingkat Nasional</p>
                </div>
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white focus:outline-none" onclick="toggleMenu()">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            
            <!-- Navigation Links -->
            <nav id="nav-menu" class="hidden md:flex space-x-8">
                <a href="#beranda" class="nav-link text-white hover:text-red-300 transition duration-300 font-medium">Beranda</a>
                <a href="{{ route('tentang') }}" class="nav-link text-white hover:text-red-300 transition duration-300 font-medium">Tentang</a>
                <a href="#jadwal" class="nav-link text-white hover:text-red-300 transition duration-300 font-medium">Jadwal</a>
                <a href="#kategori" class="nav-link text-white hover:text-red-300 transition duration-300 font-medium">Kategori</a>
                <a href="#galeri" class="nav-link text-white hover:text-red-300 transition duration-300 font-medium">Galeri</a>
                <a href="#kontak" class="nav-link text-white hover:text-red-300 transition duration-300 font-medium">Kontak</a>
                <a href="{{ route('register') }}" class="bg-blue-900 hover:bg-red-900 text-white px-4 py-2 rounded-md font-medium transition duration-300">Daftar</a>
            </nav>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-blue-900 px-4 py-3">
            <div class="flex flex-col space-y-3">
                <a href="#beranda" class="text-white hover:text-red-300 transition duration-300">Beranda</a>
                <a href="{{ route('tentang') }}" class="text-white hover:text-red-300 transition duration-300">Tentang</a>
                <a href="#jadwal" class="text-white hover:text-red-300 transition duration-300">Jadwal</a>
                <a href="#kategori" class="text-white hover:text-red-300 transition duration-300">Kategori</a>
                <a href="#galeri" class="text-white hover:text-red-300 transition duration-300">Galeri</a>
                <a href="#kontak" class="text-white hover:text-red-300 transition duration-300">Kontak</a>
                <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-center font-medium transition duration-300">Daftar Sekarang</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="relative text-center py-24 md:py-32 bg-cover bg-center bg-gray-900 animate-scale" style="background-image: linear-gradient(rgba(30, 58, 138, 0.85), rgba(153, 27, 27, 0.85)), url('{{ asset('images/banner.jpeg') }}');">
        <div class="container mx-auto px-4 relative z-10">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white uppercase mb-6 leading-tight">Kejuaraan Taekwondo<br>Piala Kapolda Sumbar</h2>
            <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto">Kompetisi bergengsi untuk atlet Taekwondo se-Sumatra Barat dan sekitarnya. Raih prestasi dan tunjukkan kemampuan terbaikmu!</p>
            
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" class="btn-primary text-white font-semibold px-8 py-4 rounded-full inline-block">Daftar Sekarang</a>
                <a href="#tentang" class="bg-white text-blue-900 font-semibold px-8 py-4 rounded-full inline-block hover:bg-gray-100 transition duration-300">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-16 md:py-20 bg-white animate-fade">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title text-3xl md:text-4xl font-bold text-gray-800">Tentang Kejuaraan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Ajang bergengsi untuk atlet muda seluruh Indonesia, bertanding dalam sportivitas dan prestasi.</p>
            </div>
            
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2 relative">
                    <img src="{{ asset('images/tentang-taekwondo.jpeg') }}" class="rounded-xl shadow-2xl w-full" alt="Tentang Taekwondo">
                    <div class="absolute -bottom-6 -right-6 bg-red-600 text-white p-4 rounded-lg shadow-lg hidden md:block">
                        <p class="font-bold text-lg">10+ Tahun</p>
                        <p class="text-sm">Pengalaman</p>
                    </div>
                </div>
                
                <div class="lg:w-1/2 space-y-6">
                    <h3 class="text-2xl md:text-3xl font-bold text-blue-900">Mengapa Mengikuti Kejuaraan Ini?</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Kompetisi Berkualitas</h4>
                                <p class="text-gray-600">Turnamen dengan standar nasional dan wasit bersertifikat</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Jaringan Luas</h4>
                                <p class="text-gray-600">Bertemu dengan atlet dan pelatih dari berbagai daerah</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="bg-blue-100 p-2 rounded-full">
                                <svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Fasilitas Lengkap</h4>
                                <p class="text-gray-600">Lokasi pertandingan dengan fasilitas Lengkap</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('tentang') }}" class="inline-block mt-6 btn-primary text-white font-semibold px-8 py-3 rounded-md">Tentang Kejuaraan</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Jadwal Section -->
    <section id="jadwal" class="py-16 md:py-20 bg-gray-50 animate-fade">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title text-3xl md:text-4xl font-bold text-gray-800">Jadwal Kejuaraan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Catat tanggal penting untuk persiapan kompetisi Anda</p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-200">
                        <!-- Day 1 -->
                        <div class="p-8">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="bg-blue-100 text-blue-800 p-3 rounded-lg">
                                    <span class="text-2xl font-bold block">10</span>
                                    <span class="text-sm">Okt</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800">Registrasi & Pembukaan</h3>
                            </div>
                            <ul class="space-y-4 text-gray-600">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>08:00 - 12:00: Registrasi Peserta</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>14:00 - 16:00: Upacara Pembukaan</span>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Day 2-4 -->
                        <div class="p-8">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="bg-blue-100 text-blue-800 p-3 rounded-lg">
                                    <span class="text-2xl font-bold block">11-13</span>
                                    <span class="text-sm">Okt</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800">Kyourugi Competition</h3>
                            </div>
                            <ul class="space-y-4 text-gray-600">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>08:00 - 17:00: Pertandingan per kategori</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Istirahat siang: 12:00 - 13:30</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-200 bg-gray-50">
                        <!-- Day 5 -->
                        <div class="p-8">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="bg-blue-100 text-blue-800 p-3 rounded-lg">
                                    <span class="text-2xl font-bold block">14</span>
                                    <span class="text-sm">Okt</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800">Poomsae & Freestyle</h3>
                            </div>
                            <ul class="space-y-4 text-gray-600">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>08:00 - 12:00: Kompetisi Poomsae</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>13:30 - 17:00: Kompetisi Freestyle</span>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Day 6 -->
                        <div class="p-8">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="bg-blue-100 text-blue-800 p-3 rounded-lg">
                                    <span class="text-2xl font-bold block">15</span>
                                    <span class="text-sm">Okt</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800">Final & Penutupan</h3>
                            </div>
                            <ul class="space-y-4 text-gray-600">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>09:00 - 11:30: Pertandingan Final</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>14:00 - 16:00: Upacara Penutupan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 text-center">
                    <p class="text-gray-600">* Jadwal dapat berubah sesuai kebijakan panitia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Kategori Section -->
    <section id="kategori" class="py-16 md:py-20 bg-white animate-fade">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title text-3xl md:text-4xl font-bold text-gray-800">Kategori Pertandingan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Pilih kategori yang sesuai dengan keahlian Anda</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Kyourugi -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="h-48 bg-blue-900 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Kyourugi</h3>
                        <p class="text-gray-600 mb-4">Kompetisi sparring resmi untuk semua usia dan tingkat sabuk.</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Mulai dari Pra Cadet A Sampai Dengan Senior</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Berat badan sesuai kategori</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Poomsae -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="h-48 bg-red-700 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Poomsae</h3>
                        <p class="text-gray-600 mb-4">Kompetisi menampilkan pola gerakan dalam Taekwondo, dinilai berdasarkan akurasi, keseimbangan, dan keindahan.</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Individu, Pair, dan Tim</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Semua tingkat sabuk</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Freestyle -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-r from-blue-900 to-red-700 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Poomsae Freestyle</h3>
                        <p class="text-gray-600 mb-4">Kompetisi taekwondo gaya bebas dengan kreativitas dan inovasi.</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Individu Putra dan Putri</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Usia 10-25 tahun</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <a href="{{ route('register') }}" class="btn-primary text-white font-semibold px-8 py-3 rounded-md inline-block">Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Galeri -->
    <section id="galeri" class="py-16 md:py-20 bg-gray-50 animate-fade">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title text-3xl md:text-4xl font-bold text-gray-800">Galeri Kejuaraan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Momen berharga dari kejuaraan sebelumnya</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/kejuaraan/foto1.jpeg') }}" class="w-full h-48 object-cover hover:scale-105 transition duration-500" alt="Kejuaraan 1">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/kejuaraan/foto2.jpeg') }}" class="w-full h-48 object-cover hover:scale-105 transition duration-500" alt="Kejuaraan 2">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/kejuaraan/foto3.jpeg') }}" class="w-full h-48 object-cover hover:scale-105 transition duration-500" alt="Kejuaraan 3">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/kejuaraan/foto4.jpeg') }}" class="w-full h-48 object-cover hover:scale-105 transition duration-500" alt="Kejuaraan 4">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/kejuaraan/foto5.jpeg') }}" class="w-full h-48 object-cover hover:scale-105 transition duration-500" alt="Kejuaraan 5">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/kejuaraan/foto6.jpeg') }}" class="w-full h-48 object-cover hover:scale-105 transition duration-500" alt="Kejuaraan 6">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/kejuaraan/foto7.jpeg') }}" class="w-full h-48 object-cover hover:scale-105 transition duration-500" alt="Kejuaraan 7">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/kejuaraan/foto8.jpeg') }}" class="w-full h-48 object-cover hover:scale-105 transition duration-500" alt="Kejuaraan 8">
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <a href="#" class="inline-flex items-center text-blue-800 font-medium hover:text-red-600 transition duration-300">
                    Lihat Lebih Banyak Foto
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="py-16 md:py-20 bg-gradient-to-r from-blue-900 to-red-800 text-white animate-fade">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title text-3xl md:text-4xl font-bold text-white">Hubungi Kami</h2>
                <p class="text-white/80 max-w-2xl mx-auto mt-4">Ada pertanyaan? Tim kami siap membantu Anda</p>
            </div>
            
            <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white/10 p-8 rounded-xl backdrop-blur-sm">
                    <h3 class="text-xl font-bold mb-4">Informasi Kontak</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="bg-white/20 p-2 rounded-full">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium">Telepon</h4>
                                <p class="text-white/80">+62 812 6673 9835</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-white/20 p-2 rounded-full">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium">Email</h4>
                                <p class="text-white/80">info@pialakapoldasumbar.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="bg-white/20 p-2 rounded-full">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium">Lokasi</h4>
                                <p class="text-white/80">GOR Universitas Negeri Padang, Jl. Prof. Dr. Hamka, Padang</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/10 p-8 rounded-xl backdrop-blur-sm">
                    <h3 class="text-xl font-bold mb-4">Kirim Pesan</h3>
                    
                    <form class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-1">Nama Lengkap</label>
                            <input type="text" id="name" class="w-full bg-white/20 border border-white/30 rounded-md px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" id="email" class="w-full bg-white/20 border border-white/30 rounded-md px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium mb-1">Pesan</label>
                            <textarea id="message" rows="4" class="w-full bg-white/20 border border-white/30 rounded-md px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-white text-blue-900 font-semibold py-3 px-4 rounded-md hover:bg-gray-100 transition duration-300">Kirim Pesan</button>
                    </form>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <p class="text-white/80 mb-4">Atau hubungi kami melalui media sosial:</p>
                <div class="flex justify-center space-x-4">
                    <a href="https://www.facebook.com/HumasPoldaSumateraBarat" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/humaspoldasumbar/" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 3.807.058h.468c2.456 0 2.784-.011 3.807-.058.975-.045 1.504-.207 1.857-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-3.807v-.468c0-2.456-.011-2.784-.058-3.807-.045-.975-.207-1.504-.344-1.857a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
                        </svg>
                    </a>
                    <a href="https://x.com/" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                    <a href="https://wa.me/621266739835" target="_blank" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 md:py-20 bg-white animate-fade">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title text-3xl md:text-4xl font-bold text-gray-800">Pertanyaan Umum</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="w-full flex justify-between items-center p-6 text-left focus:outline-none">
                            <h3 class="text-lg font-medium text-gray-800">Bagaimana cara mendaftar kejuaraan ini?</h3>
                            <svg class="w-6 h-6 text-blue-800 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="px-6 pb-6 hidden">
                            <p class="text-gray-600">Pendaftaran dapat dilakukan secara online melalui tombol "Daftar Sekarang" di website ini. Anda akan diarahkan ke formulir pendaftaran yang perlu diisi dengan data lengkap peserta.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="w-full flex justify-between items-center p-6 text-left focus:outline-none">
                            <h3 class="text-lg font-medium text-gray-800">Apa persyaratan untuk mengikuti kejuaraan ini?</h3>
                            <svg class="w-6 h-6 text-blue-800 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="px-6 pb-6 hidden">
                            <p class="text-gray-600">Persyaratan utama adalah memiliki sertifikat sabuk dari perguruan Taekwondo yang diakui, melampirkan fotokopi KTP/Kartu Pelajar, dan membayar biaya pendaftaran sebelum batas waktu yang ditentukan.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="w-full flex justify-between items-center p-6 text-left focus:outline-none">
                            <h3 class="text-lg font-medium text-gray-800">Berapa biaya pendaftaran untuk kejuaraan ini?</h3>
                            <svg class="w-6 h-6 text-blue-800 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="px-6 pb-6 hidden">
                            <p class="text-gray-600">Biaya pendaftaran bervariasi berdasarkan kategori: Rp 250.000 untuk Kyorugi, Rp 200.000 untuk Poomsae, dan Rp 300.000 untuk Freestyle per peserta. Biaya sudah termasuk jersey dan sertifikat peserta.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 4 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button class="w-full flex justify-between items-center p-6 text-left focus:outline-none">
                            <h3 class="text-lg font-medium text-gray-800">Apakah ada penginapan yang disediakan untuk peserta dari luar kota?</h3>
                            <svg class="w-6 h-6 text-blue-800 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="px-6 pb-6 hidden">
                            <p class="text-gray-600">Panitia menyediakan rekomendasi penginapan dengan harga khusus untuk peserta. Informasi detail dapat dilihat di panduan peserta setelah pendaftaran selesai. Peserta bertanggung jawab atas biaya akomodasi sendiri.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 text-center">
                    <p class="text-gray-600">Masih ada pertanyaan? <a href="#kontak" class="text-blue-800 font-medium hover:text-red-600 transition duration-300">Hubungi kami</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-20 bg-gradient-to-r from-blue-900 to-red-800 text-white animate-fade">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Menunjukkan Kemampuan Taekwondo Anda?</h2>
            <p class="text-xl text-white/80 max-w-3xl mx-auto mb-8">Daftarkan diri Anda sekarang dan raih kesempatan menjadi juara di Piala Kapolda Sumbar 2025!</p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-white text-blue-900 font-semibold px-8 py-4 rounded-full inline-block hover:bg-gray-100 transition duration-300">Daftar Sekarang</a>
                <a href="#kontak" class="border-2 border-white text-white font-semibold px-8 py-4 rounded-full inline-block hover:bg-white/10 transition duration-300">Tanya Panitia</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 animate-fade">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Tentang Kami</h3>
                    <p class="text-gray-400">Piala Kapolda Sumbar adalah kompetisi Taekwondo tahunan yang diselenggarakan oleh Kepolisian Daerah Sumatra Barat bekerja sama dengan Pengurus Daerah Taekwondo Indonesia Sumatra Barat.</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Menu Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#beranda" class="text-gray-400 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="#tentang" class="text-gray-400 hover:text-white transition duration-300">Tentang</a></li>
                        <li><a href="#jadwal" class="text-gray-400 hover:text-white transition duration-300">Jadwal</a></li>
                        <li><a href="#kategori" class="text-gray-400 hover:text-white transition duration-300">Kategori</a></li>
                        <li><a href="#galeri" class="text-gray-400 hover:text-white transition duration-300">Galeri</a></li>
                        <li><a href="#kontak" class="text-gray-400 hover:text-white transition duration-300">Kontak</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>GOR Universitas Negeri Padang, Jl. Prof. Dr. Hamka, Padang</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+62 812 6673 9835</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>info@pialakapoldasumbar.com</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Berlangganan</h3>
                    <p class="text-gray-400 mb-4">Dapatkan informasi terbaru tentang kejuaraan langsung ke email Anda.</p>
                    <form class="flex">
                        <input type="email" placeholder="Alamat Email" class="px-4 py-2 w-full rounded-l-md focus:outline-none text-gray-800">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-r-md transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
    <div class="text-center md:text-left mb-4 md:mb-0">
        <p class="text-gray-400">&copy; 2025 Piala Kapolda Sumbar. All Rights Reserved.</p>
        <p class="text-gray-500 text-sm mt-1">
            Dibuat dengan ❤ oleh 
            <a href="https://www.linkedin.com/in/kevinda-yudhistira17-/" target="_blank" 
               class="text-blue-400 hover:text-blue-300 transition duration-300">
               Kevinda Yudhistira
            </a>
        </p>
    </div>
    
    <div class="flex items-center space-x-6">
        <img src="/images/world-taekwondo-logo-bg.png" class="h-10" alt="World Taekwondo">
        <img src="/images/taekwondo-indonesia-logo-bg.png" class="h-10" alt="Taekwondo Indonesia">
        <img src="/images/polda_sumbar.jpeg" class="h-12" alt="Taekwondo Indonesia">
    </div>
</div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 bg-blue-900 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-red-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script>
        // Back to Top Button
        const backToTopButton = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        });
        
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // FAQ Accordion
        document.querySelectorAll('.border-gray-200 button').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const icon = button.querySelector('svg');
                
                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
        
        // Mobile Menu Toggle
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>