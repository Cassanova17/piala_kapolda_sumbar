@extends('layouts.app')

@section('title', 'Edit Data Atlit')

@section('sidebar')
<aside class="fixed top-0 left-0 bg-gray-900 text-white w-64 h-screen">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-8 tracking-wide text-gray-100 uppercase border-b border-gray-700 pb-3">User Menu</h2>
        <ul class="space-y-3">
            <li>
                <a href="/dashboard"
                   class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 
                          {{ Request::is('dashboard') ? 'bg-indigo-700 font-semibold shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3 {{ Request::is('dashboard') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-4"></path>
                    </svg>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/athletes"
                   class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 
                          {{ Request::is('athletes') ? 'bg-indigo-700 font-semibold shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3 {{ Request::is('athletes') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M17 20h5v-2a4 4 0 00-5-4m-6 6v-2a4 4 0 00-3-3.87M12 4a4 4 0 100 8 4 4 0 000-8z"></path>
                    </svg>
                    <span class="text-sm">Data Atlit</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 
                          {{ Request::is('profile') ? 'bg-indigo-700 font-semibold shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3 {{ Request::is('profile') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0l-7 7m0 0l-7-7"></path>
                    </svg>
                    <span class="text-sm">Edit Profil</span>
                </a>
            </li>
            <li>
                <a href="{{ route('password.change') }}" 
                   class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 
                          {{ Request::is('password/change') ? 'bg-indigo-700 font-semibold shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3 {{ Request::is('password/change') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2v5a2 2 0 01-2 2H9a2 2 0 01-2-2V9a2 2 0 012-2m.001-.608a3 3 0 115.998 0M7 16h10"></path>
                    </svg>
                    <span class="text-sm">Ganti Password</span>
                </a>
            </li>
            <li class="mt-6 pt-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex items-center px-4 py-3 rounded-lg hover:bg-red-600 transition-all duration-300 w-full text-left">
                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="text-sm">Keluart</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex items-center justify-between mb-6">
    </div>

    @if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow" role="alert">
        <div class="flex items-center mb-2">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z\"></path>
            </svg>
            <p class="font-bold">Mohon perbaiki kesalahan berikut:</p>
        </div>
        <ul class="list-disc pl-6">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gray-900 px-6 py-4">
            <h2 class="text-white text-xl font-semibold">Formulir Pendaftaran Atlit</h2>
        </div>

        <form method="POST" action="/athletes/{{$athlete->id}}" enctype="multipart/form-data" class="p-6">
            @method('PUT')
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Section: Data Pribadi -->
                <div class="md:col-span-2 mb-2">
                    <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-200 pb-2 mb-4">
                        <span class="border-b-2 border-blue-500 pb-2">Data Pribadi</span>
                    </h3>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $athlete->name) }}" required
                           class="w-full px-4 py-2 border @error('name') border-red-500 @enderror border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    @error('name')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik', $athlete->nik) }}" required
                           class="w-full px-4 py-2 border @error('nik') border-red-500 @enderror border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    @error('nik')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label for="tempat_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $athlete->tempat_lahir) }}" required
                           class="w-full px-4 py-2 border @error('place_of_birth') border-red-500 @enderror border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    @error('tempat_lahir')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                           value="{{ old('tanggal_lahir', $athlete->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="no_hp" class="block text-gray-700 text-sm font-bold mb-2">No HP/WA</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z\"></path>
                            </svg>
                        </div>
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $athlete->no_hp) }}" required
                               class="w-full pl-10 px-4 py-2 border @error('no_hp') border-red-500 @enderror border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    @error('no_hp')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                    <div class="flex space-x-4">
                        <div class="flex items-center">
                            <input type="radio" name="jenis_kelamin" id="putra" value="Putra" {{ old('jenis_kelamin', $athlete->jenis_kelamin) == 'Putra' ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <label for="putra" class="ml-2 text-gray-700">Putra</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="jenis_kelamin" id="putri" value="Putri" {{ old('jenis_kelamin', $athlete->jenis_kelamin) == 'Putri' ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <label for="putri" class="ml-2 text-gray-700">Putri</label>
                        </div>
                    </div>
                    @error('jenis_kelamin')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Section: Dokumen -->
                <div class="md:col-span-2 mb-2 mt-6">
                    <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-200 pb-2 mb-4">
                        <span class="border-b-2 border-blue-500 pb-2">Dokumen Pendukung</span>
                    </h3>
                </div>

                <div class="mb-4">
                <label for="akte" class="block text-gray-700 text-sm font-bold mb-2">Akte Kelahiran</label>
                <input type="file" name="akte" id="akte" accept=".pdf" class="w-full px-3 py-2 border @error('akte') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <p class="text-gray-500 text-xs italic">Hanya Bisa Melampirkan PDF.</p>
                @error('akte')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                 @if($athlete->akte)
                 <p class="text-gray-600 text-sm mt-1">File saat ini: <a href="{{ asset('storage/' . $athlete->akte) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($athlete->akte) }}</a></p>
                @endif
            </div>

            <div class="mb-4">
                <label for="sertifikat_sabuk" class="block text-gray-700 text-sm font-bold mb-2">Sertifikat Sabuk</label>
                <input type="file" name="sertifikat_sabuk" id="sertifikat_sabuk" accept=".pdf" class="w-full px-3 py-2 border @error('sertifikat_sabuk') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <p class="text-gray-500 text-xs italic">Hanya Bisa Melampirkan PDF.</p>
                @error('sertifikat_sabuk')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                @if($athlete->sertifikat_sabuk)
                <p class="text-gray-600 text-sm mt-1">File saat ini: <a href="{{ asset('storage/' . $athlete->sertifikat_sabuk) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($athlete->sertifikat_sabuk) }}</a></p>
                @endif
            </div>

                <!-- Section: Informasi Pertandingan -->
                <div class="md:col-span-2 mb-2 mt-6">
                    <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-200 pb-2 mb-4">
                        <span class="border-b-2 border-blue-500 pb-2">Informasi Pertandingan</span>
                    </h3>
                </div>

                <div class="mb-4 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kelompok Umur</label>
                    <select id="kelompok_umur" class="w-full border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" readonly>
                        <option value="">-- Kelompok umur akan ditentukan otomatis --</option>
                        <option value="Pra Cadet A">Pra Cadet A (2019-2018)</option>
                        <option value="Pra Cadet B">Pra Cadet B (2017-2016)</option>
                        <option value="Pra Cadet C">Pra Cadet C (2015-2014)</option>
                        <option value="Cadet">Cadet (2013-2011)</option>
                        <option value="Junior">Junior (2010-2008)</option>
                        <option value="Senior">Senior (2007-1998)</option>
                    </select>
                    <input type="hidden" name="kelompok_umur" id="kelompok_umur_hidden" value="{{ old('kelompok_umur', $athlete->kelompok_umur) }}">
                    @error('kelompok_umur')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tingkat Pertandingan -->
                <div class="mb-4 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Tingkat Pertandingan</label>
                    <select name="tingkat_pertandingan" id="tingkat_pertandingan" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                        <option value="">-- Pilih Tingkat Pertandingan --</option>
                    </select>
                    @error('tingkat_pertandingan')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Pertandingan</label>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center">
                            <input type="radio" name="jenis_pertandingan" id="Kyourigi" value="Kyourigi" {{ old('jenis_pertandingan', $athlete->jenis_pertandingan) == 'Kyourigi' ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <label for="Kyourigi" class="ml-2 text-gray-700">Kyourigi</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="jenis_pertandingan" id="Poomsae" value="Poomsae" {{ old('jenis_pertandingan', $athlete->jenis_pertandingan) == 'Poomsae' ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <label for="Poomsae" class="ml-2 text-gray-700">Poomsae</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="jenis_pertandingan" id="Poomsae Freestyle" value="Poomsae Freestyle" {{ old('jenis_pertandingan', $athlete->jenis_pertandingan) == 'Poomsae Freestyle' ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <label for="Poomsae Freestyle" class="ml-2 text-gray-700">Poomsae Freestyle</label>
                        </div>
                    </div>
                    @error('jenis_pertandingan')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="mb-4 md:col-span-2">
  <label class="block text-gray-700 text-sm font-bold mb-2">Kelas Pertandingan</label>
  <select name="kelas_pertandingan" id="kelas_pertandingan"
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
    <option value="">-- Pilih Kelas Pertandingan --</option>
    <!-- Opsinya akan diisi pakai JavaScript tergantung kondisi -->
  </select>
  @error('kelas_pertandingan')
    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
  @enderror
</div>

            <div class="flex flex-col md:flex-row items-center justify-between mt-8 pt-5 border-t border-gray-200">
                <div class="mb-4 md:mb-0">
                    <a href="/athletes" class="text-blue-600 hover:text-blue-700 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M11 17l-5-5m0 0l5-5m-5 5h12\"></path>
                        </svg>
                        Batalkan
                    </a>
                </div>
                <div class="flex space-x-3">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\"></path>
                        </svg>
                        Perbarui Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tanggalLahirInput = document.getElementById('tanggal_lahir');
    const kelompokUmurSelect = document.getElementById('kelompok_umur');
    const kelompokUmurHidden = document.getElementById('kelompok_umur_hidden');
    const tingkatSelect = document.getElementById('tingkat_pertandingan');
    const kelasDropdown = document.getElementById('kelas_pertandingan');
    const jenisPertandinganRadios = document.querySelectorAll('input[name="jenis_pertandingan"]');
    const jenisKelaminRadios = document.querySelectorAll('input[name="jenis_kelamin"]');


    const tingkatOptions = {
        'Pra Cadet A': ['Pemula', 'Semi Prestasi'],
        'Pra Cadet B': ['Pemula', 'Semi Prestasi'],
        'Pra Cadet C': ['Semi Prestasi', 'Prestasi'],
        'Cadet': ['Semi Prestasi', 'Prestasi'],
        'Junior': ['Semi Prestasi', 'Prestasi'],
        'Senior': ['Semi Prestasi', 'Prestasi']
    };

    const kelasData = {
        'Kyourigi': {
            'Putra': {
                'Pemula': {
                    'Pra Cadet A': ['Under 16 KG', 'Under 18 KG', 'Under 20 KG', 'Under 23 KG', 'Under 25 KG', 'Under 27 KG', 'Under 30 KG', 'Under 33 KG', 'Under 36 KG', 'Over 36 KG'],
                    'Pra Cadet B': ['Under 18 KG', 'Under 20 KG', 'Under 23 KG', 'Under 25 KG', 'Under 27 KG', 'Under 30 KG', 'Under 33 KG', 'Under 36 KG', 'Under 39 KG', 'Over 39 KG'],
                },
                'Semi Prestasi': {
                    'Pra Cadet A': ['Under 16 KG', 'Under 18 KG', 'Under 20 KG', 'Under 23 KG', 'Under 25 KG', 'Under 27 KG', 'Under 30 KG', 'Under 33 KG', 'Under 36 KG', 'Over 36 KG'],
                    'Pra Cadet B': ['Under 18 KG', 'Under 20 KG', 'Under 23 KG', 'Under 25 KG', 'Under 27 KG', 'Under 30 KG', 'Under 33 KG', 'Under 36 KG', 'Under 39 KG', 'Over 39 KG'],
                    'Pra Cadet C': ['Under 24 KG', 'Under 26 KG', 'Under 28 KG', 'Under 31 KG', 'Under 34 KG', 'Under 37 KG', 'Under 40 KG', 'Under 43 KG', 'Under 46 KG', 'Over 46 KG'],
                    'Cadet': ['Under 33 KG', 'Under 37 KG', 'Under 41 KG', 'Under 45 KG', 'Under 49 KG', 'Under 53 KG', 'Under 57 KG', 'Under 61 KG', 'Under 65 KG', 'Over 65 KG'],
                    'Junior': ['Under 45 KG', 'Under 48 KG', 'Under 51 KG', 'Under 55 KG', 'Under 59 KG', 'Under 63 KG', 'Under 67 KG', 'Under 73 KG', 'Under 78 KG', 'Over 78 KG'],
                    'Senior': ['Under 54 KG', 'Under 58 KG', 'Under 63 KG', 'Under 68 KG', 'Under 74 KG', 'Under 80 KG', 'Under 87 KG', 'Over 87 KG'],
                },
                'Prestasi': {
                    'Pra Cadet C': ['Under 24 KG', 'Under 26 KG', 'Under 28 KG', 'Under 31 KG', 'Under 34 KG', 'Under 37 KG', 'Under 40 KG', 'Under 43 KG', 'Under 46 KG', 'Over 46 KG'],
                    'Cadet': ['Under 33 KG', 'Under 37 KG', 'Under 41 KG', 'Under 45 KG', 'Under 49 KG', 'Under 53 KG', 'Under 57 KG', 'Under 61 KG', 'Under 65 KG', 'Over 65 KG'],
                    'Junior': ['Under 45 KG', 'Under 48 KG', 'Under 51 KG', 'Under 55 KG', 'Under 59 KG', 'Under 63 KG', 'Under 67 KG', 'Under 73 KG', 'Under 78 KG', 'Over 78 KG'],
                    'Senior': ['Under 54 KG', 'Under 58 KG', 'Under 63 KG', 'Under 68 KG', 'Under 74 KG', 'Under 80 KG', 'Under 87 KG', 'Over 87 KG'],
                }
            },
            'Putri': {
                'Pemula': {
                    'Pra Cadet A': ['Under 14 KG', 'Under 16 KG', 'Under 18 KG', 'Under 20 KG', 'Under 23 KG', 'Under 25 KG', 'Under 27 KG', 'Under 30 KG', 'Under 33 KG', 'Over 33 KG'],
                    'Pra Cadet B': ['Under 16 KG', 'Under 18 KG', 'Under 20 KG', 'Under 23 KG', 'Under 25 KG', 'Under 27 KG', 'Under 30 KG', 'Under 33 KG', 'Under 36 KG', 'Over 36 KG'],
                },
                'Semi Prestasi': {
                    'Pra Cadet A': ['Under 14 KG', 'Under 16 KG', 'Under 18 KG', 'Under 20 KG', 'Under 23 KG', 'Under 25 KG', 'Under 27 KG', 'Under 30 KG', 'Under 33 KG', 'Over 33 KG'],
                    'Pra Cadet B': ['Under 16 KG', 'Under 18 KG', 'Under 20 KG', 'Under 23 KG', 'Under 25 KG', 'Under 27 KG', 'Under 30 KG', 'Under 33 KG', 'Under 36 KG', 'Over 36 KG'],
                    'Pra Cadet C': ['Under 22 KG', 'Under 24 KG', 'Under 26 KG', 'Under 29 KG', 'Under 32 KG', 'Under 35 KG', 'Under 38 KG', 'Under 41 KG', 'Under 44 KG', 'Over 44 KG'],
                    'Cadet': ['Under 29 KG', 'Under 33 KG', 'Under 37 KG', 'Under 41 KG', 'Under 44 KG', 'Under 47 KG', 'Under 51 KG', 'Under 55 KG', 'Under 59 KG', 'Over 59 KG'],
                    'Junior': ['Under 42 KG', 'Under 44 KG', 'Under 46 KG', 'Under 49 KG', 'Under 52 KG', 'Under 55 KG', 'Under 59 KG', 'Under 63 KG', 'Under 68 KG', 'Over 68 KG'],
                    'Senior': ['Under 46 KG', 'Under 49 KG', 'Under 53 KG', 'Under 57 KG', 'Under 62 KG', 'Under 67 KG', 'Under 73 KG', 'Over 73 KG'],
                },
                'Prestasi': {
                    'Pra Cadet C': ['Under 22 KG', 'Under 24 KG', 'Under 26 KG', 'Under 29 KG', 'Under 32 KG', 'Under 35 KG', 'Under 38 KG', 'Under 41 KG', 'Under 44 KG', 'Over 44 KG'],
                    'Cadet': ['Under 29 KG', 'Under 33 KG', 'Under 37 KG', 'Under 41 KG', 'Under 44 KG', 'Under 47 KG', 'Under 51 KG', 'Under 55 KG', 'Under 59 KG', 'Over 59 KG'],
                    'Junior': ['Under 42 KG', 'Under 44 KG', 'Under 46 KG', 'Under 49 KG', 'Under 52 KG', 'Under 55 KG', 'Under 59 KG', 'Under 63 KG', 'Under 68 KG', 'Over 68 KG'],
                    'Senior': ['Under 46 KG', 'Under 49 KG', 'Under 53 KG', 'Under 57 KG', 'Under 62 KG', 'Under 67 KG', 'Under 73 KG', 'Over 73 KG'],
                }
            }
        },
        'Poomsae': {
    'Pemula': {
        'Pra Cadet A': ['Individu', 'Pair', 'Beregu'],
        'Pra Cadet B': ['Individu', 'Pair', 'Beregu']
    },
    'Semi Prestasi': {
        'Pra Cadet A': ['Individu', 'Pair', 'Beregu'],
        'Pra Cadet B': ['Individu', 'Pair', 'Beregu'],
        'Pra Cadet C': ['Individu', 'Pair', 'Beregu'],
        'Cadet': ['Individu', 'Pair', 'Beregu'],
        'Junior': ['Individu', 'Pair', 'Beregu'],
        'Senior': ['Individu', 'Pair', 'Beregu']
    },
    'Prestasi': {
        'Pra Cadet C': ['Individu', 'Pair', 'Beregu'],
        'Cadet': ['Individu', 'Pair', 'Beregu'],
        'Junior': ['Individu', 'Pair', 'Beregu'],
        'Senior': ['Individu', 'Pair', 'Beregu']
    }
},
'Poomsae Freestyle': {
    'Semi Prestasi': {
        'Pra Cadet C': ['Individu', 'Pair', 'Beregu'],
        'Cadet': ['Individu', 'Pair', 'Beregu'],
        'Junior': ['Individu', 'Pair', 'Beregu'],
        'Senior': ['Individu', 'Pair', 'Beregu']
    },
    'Prestasi': {
        'Pra Cadet C': ['Individu', 'Pair', 'Beregu'],
        'Cadet': ['Individu', 'Pair', 'Beregu'],
        'Junior': ['Individu', 'Pair', 'Beregu'],
        'Senior': ['Individu', 'Pair', 'Beregu']
    }
}
    };

    function updateKelompokUmur() {
        const dob = new Date(tanggalLahirInput.value);
        const birthYear = dob.getFullYear();
        const currentYear = new Date().getFullYear();
        const age = currentYear - birthYear;
        let valueToSet = '';

        if (age >= 6 && age <= 7) valueToSet = 'Pra Cadet A';
        else if (age >= 8 && age <= 9) valueToSet = 'Pra Cadet B';
        else if (age >= 10 && age <= 11) valueToSet = 'Pra Cadet C';
        else if (age >= 12 && age <= 14) valueToSet = 'Cadet';
        else if (age >= 15 && age <= 17) valueToSet = 'Junior';
        else if (age >= 18 && age <= 27) valueToSet = 'Senior';

        for (const option of kelompokUmurSelect.options) {
            option.selected = option.value === valueToSet;
        }

        kelompokUmurHidden.value = valueToSet;
        updateTingkatOptions(valueToSet);
    }

    function updateTingkatOptions(kelompokUmur) {
        const options = tingkatOptions[kelompokUmur] || [];
        tingkatSelect.innerHTML = '<option value="">-- Pilih Tingkat Pertandingan --</option>';
        const selectedTingkat = "{{ old('tingkat_pertandingan', $athlete->tingkat_pertandingan) }}";

        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.textContent = option;
            if (selectedTingkat === option) {
                opt.selected = true;
            }
            tingkatSelect.appendChild(opt);
        });
        updateKelasOptions(); // Always update kelas when tingkat changes or is set
    }

    function updateKelasOptions() {
        const jenis = document.querySelector('input[name="jenis_pertandingan"]:checked')?.value;
        const gender = document.querySelector('input[name="jenis_kelamin"]:checked')?.value;
        const tingkat = tingkatSelect.value;
        const kelompok = kelompokUmurHidden.value;

        kelasDropdown.innerHTML = '<option value="">-- Pilih Kelas Pertandingan --</option>';
        let kelasList = [];

        if (jenis === 'Kyourigi' && gender && tingkat && kelompok) {
    kelasList = kelasData?.[jenis]?.[gender]?.[tingkat]?.[kelompok] || [];
} else if (
    (jenis === 'Poomsae' || jenis === 'Poomsae Freestyle') &&
    tingkat && kelompok
) {
    kelasList = kelasData?.[jenis]?.[tingkat]?.[kelompok] || [];
} else {
    kelasList = [];
}

        const selectedKelas = "{{ old('kelas_pertandingan', $athlete->kelas_pertandingan) }}";

        kelasList.forEach(kelas => {
            const opt = document.createElement('option');
            opt.value = kelas;
            opt.textContent = kelas;
            if (selectedKelas === kelas) {
                opt.selected = true;
            }
            kelasDropdown.appendChild(opt);
        });
    }

    // Event bindings
    tanggalLahirInput.addEventListener('change', updateKelompokUmur);
    tingkatSelect.addEventListener('change', updateKelasOptions);
    jenisPertandinganRadios.forEach(input => {
        input.addEventListener('change', updateKelasOptions);
    });
    jenisKelaminRadios.forEach(input => {
        input.addEventListener('change', updateKelasOptions);
    });


    // Initialisation
    if (tanggalLahirInput.value) {
        updateKelompokUmur();
    } else if ("{{ $athlete->tanggal_lahir }}") {
        tanggalLahirInput.value = "{{ $athlete->tanggal_lahir }}";
        updateKelompokUmur();
    }

    // Manually trigger updates based on existing data if available
    if ("{{ old('jenis_kelamin', $athlete->jenis_kelamin) }}") {
         // Simulate a change event for initial population if needed
         // This might already be handled by the updateKelompokUmur call
         // depending on the order, but explicitly calling updateKelasOptions
         // ensures the kelas dropdown is correctly populated on load
         updateKelasOptions();
    }
     if ("{{ old('jenis_pertandingan', $athlete->jenis_pertandingan) }}") {
         // Simulate a change event for initial population if needed
         updateKelasOptions();
    }
});
</script>



<style>
    .selected-card {
        border-color: #3b82f6; /* Tailwind blue-500 */
        background-color: #dbeafe; /* Tailwind blue-100 */
    }
</style>
@endsection