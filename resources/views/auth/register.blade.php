@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-red-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-2xl w-full max-w-md mx-auto border border-gray-100 transition-all duration-300 hover:shadow-xl">
        {{-- Logo Section with Title --}}
        <div class="text-center mb-6">
            <div class="flex justify-center items-center space-x-6 mb-4">
                <img src="/images/world-taekwondo-logo.png" alt="World Taekwondo" class="h-12 sm:h-14 object-contain transform transition-transform duration-300 hover:scale-110">
                <img src="/images/polda_sumbar.jpeg" alt="Polda Sumbar" class="h-12 sm:h-14 object-contain transform transition-transform duration-300 hover:scale-110">
                <img src="/images/taekwondo-indonesia-logo.png" alt="Taekwondo Indonesia" class="h-12 sm:h-14 object-contain transform transition-transform duration-300 hover:scale-110">
            </div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-800 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-red-500">PIALA KAPOLDA SUMBAR</h1>
            <p class="text-gray-600 mt-1 text-xs sm:text-sm">Kejuaraan Taekwondo Tingkat Nasional</p>
            <div class="h-1 w-24 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mt-3 rounded-full"></div>
        </div>

        {{-- Registration Card --}}
        <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-blue-50 to-red-50 rounded-full -mr-20 -mt-20 opacity-30"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-gradient-to-tr from-blue-50 to-red-50 rounded-full -ml-20 -mb-20 opacity-30"></div>
            
            <h2 class="text-lg sm:text-xl font-bold text-center text-gray-800 mb-4 relative">Daftar Akun Baru</h2>

            @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-3 mb-4 rounded-lg animate-pulse">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terdapat masalah dengan pendaftaran Anda</h3>
                        <div class="mt-1 text-xs text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <form method="POST" action="/register" class="space-y-4 relative">
                @csrf
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Name Field --}}
                    <div class="group">
                        <label for="name" class="block text-xs font-medium text-gray-700 mb-1">Nama Dojang</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input type="text" id="name" name="name" required
                                class="pl-9 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200 hover:border-blue-300 text-sm"
                                placeholder="Nama Dojang">
                        </div>
                    </div>

                    {{-- Email Field --}}
                    <div class="group">
                        <label for="email" class="block text-xs font-medium text-gray-700 mb-1">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" required
                                class="pl-9 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200 hover:border-blue-300 text-sm"
                                placeholder="Email">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Password Field --}}
                    <div class="group">
                        <label for="password" class="block text-xs font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400 group-hover:text-red-500 transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" required
                                class="pl-9 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition duration-200 hover:border-red-300 text-sm"
                                placeholder="••••••••">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Min. 8 karakter</p>
                    </div>

                    {{-- Password Confirmation Field --}}
                    <div class="group">
                        <label for="password_confirmation" class="block text-xs font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400 group-hover:text-red-500 transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="pl-9 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition duration-200 hover:border-red-300 text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>

                {{-- Terms Checkbox --}}
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" required
                            class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded transition-colors duration-200">
                    </div>
                    <div class="ml-2 text-xs">
                        <label for="terms" class="font-medium text-gray-700">Saya menyetujui <a href="#" class="text-blue-600 hover:text-red-500 transition-colors duration-200">Syarat & Ketentuan</a> dan <a href="#" class="text-blue-600 hover:text-red-500 transition-colors duration-200">Kebijakan Privasi</a></label>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-md text-base font-medium text-white bg-gradient-to-r from-blue-600 to-red-500 hover:from-blue-700 hover:to-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 transform hover:translate-y-[-2px] hover:shadow-lg">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            {{-- Login Link --}}
            <div class="mt-4">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-xs">
                        <span class="px-2 bg-white text-gray-500">Sudah memiliki akun?</span>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="/login"
                        class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm text-base font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 transform hover:translate-y-[-2px] hover:shadow-md">
                        Login di sini
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-4 text-xs text-gray-500">
            <p>© 2025 Kejuaraan Piala Kapolda Sumbar</p>
            <p class="text-gray-500 text-sm mt-1">
            oleh 
            <a href="https://www.linkedin.com/in/kevinda-yudhistira17-/" target="_blank" 
               class="text-blue-400 hover:text-blue-300 transition duration-300">
               Kevinda Yudhistira
            </a>
        </p>
        </div>
    </div>
</div>
@endsection