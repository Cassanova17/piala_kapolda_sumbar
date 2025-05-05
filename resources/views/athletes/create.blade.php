
@extends('layouts.app')

@section('title', 'Tambah Data Atlit')
@section('sidebar')
<aside class="bg-gray-800 text-white w-64 min-h-screen">
    <div class="p-6">
        <h2 class="text-lg font-bold mb-6 tracking-wide text-gray-200 uppercase">User Menu</h2>
        <ul class="space-y-2">
            <li>
                <a href="/athletes"
                   class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition 
                          {{ Request::is('athletes') ? 'bg-gray-700 font-semibold' : '' }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-4"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/athletes/championships"
                   class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition 
                          {{ Request::is('athletes/championships') ? 'bg-gray-700 font-semibold' : '' }}">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7"></path>
                    </svg>
                    Data Kejuaraan
                </a>
            </li>
        </ul>
    </div>
</aside>
@endsection

@section('content')
<div class="container mx-auto mt-8">   
    <h1 class="text-3xl font-bold mb-6">Tambahkan Data Atlit Baru</h1>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white p-8 rounded-lg shadow-md">
        <form method="POST" action="/athletes" enctype="multipart/form-data">
         
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-3 py-2 border @error('name') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                @error('name')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="tempat_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required class="w-full px-3 py-2 border @error('place_of_birth') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                @error('tempat_lahir')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required class="w-full px-3 py-2 border @error('tanggal_lahir') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                @error('tanggal_lahir')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
                <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required class="w-full px-3 py-2 border @error('nik') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                @error('nik')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="no_hp" class="block text-gray-700 text-sm font-bold mb-2">No HP/WA</label>
                <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" required class="w-full px-3 py-2 border @error('no_hp') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                @error('no_hp')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                <div class="flex items-center">
                    <input type="radio" name="jenis_kelamin" id="putra" value="Putra" {{ old('jenis_kelamin') == 'Putra' ? 'checked' : '' }} class="mr-2">
                    <label for="putra" class="mr-4">Putra</label>

                    <input type="radio" name="jenis_kelamin" id="putri" value="Putri" {{ old('jenis_kelamin') == 'Putri' ? 'checked' : '' }} class="mr-2">
                    <label for="putri">Putri</label>
                </div>
                 @error('jenis_kelamin')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
            </div>
            <div class="mb-4">
                <label for="akte" class="block text-gray-700 text-sm font-bold mb-2">Akte Kelahiran</label>
                <input type="file" name="akte" id="akte" accept=".pdf" class="w-full px-3 py-2 border @error('akte') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <p class="text-gray-500 text-xs italic">Hanya Bisa Melampirkan PDF.</p>
                @error('akte')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="sertifikat_sabuk" class="block text-gray-700 text-sm font-bold mb-2">Sertifikat Sabuk</label>
                <input type="file" name="sertifikat_sabuk" id="sertifikat_sabuk" accept=".pdf" class="w-full px-3 py-2 border @error('sertifikat_sabuk') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <p class="text-gray-500 text-xs italic">Hanya Bisa Melampirkan PDF.</p>
                @error('sertifikat_sabuk')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambahkan</button>
                <a href="/athletes" class="text-green-600 hover:text-green-700">Batalkan</a>
            </div>
        </form>
    </div>
</div>
@endsection