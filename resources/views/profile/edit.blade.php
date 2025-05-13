@extends('layouts.app')

@section('title', 'Edit Profil')

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
                        <span class="text-sm">Keluar</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
@endsection

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 py-10">
        <!-- Header with gradient background -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl shadow-lg p-6 mb-8 text-white">
            <h1 class="text-3xl font-bold flex items-center">
                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Edit Profil
            </h1>
            <p class="text-indigo-100 mt-2">Perbarui Informasi Pribadi</p>
        </div>

        <!-- Alert message -->
        @if (session('status'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-6 flex items-center" role="alert">
                <svg class="w-6 h-6 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <div>
                    <p class="font-medium">Success!</p>
                    <p>{{ session('status') }}</p>
                </div>
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <div class="border-b border-gray-200 bg-gray-50 px-6 py-4">
                <h2 class="text-lg font-medium text-gray-700">Informasi Pribadi</h2>
                <p class="text-sm text-gray-500">Perbarui Detail Akun Dibawah</p>
            </div>
            
            <div class="p-6">
                <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Dojang</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required autofocus
                                    class="pl-10 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300">
                            </div>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                                    class="pl-10 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Additional information card -->
        <div class="mt-8 bg-white shadow-xl rounded-xl overflow-hidden">
            <div class="bg-indigo-50 px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-700">Informasi Akun</h2>
            </div>
            
            <div class="divide-y divide-gray-200">
                <div class="px-6 py-4 flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Password</p>
                        <p class="text-sm text-gray-500">Perubahan Terakhir: Tidak Pernah</p>
                    </div>
                    <a href="{{ route('password.change') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Ganti Password
                    </a>
                </div>
                
                <div class="px-6 py-4 flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Status Akun</p>
                        <p class="text-sm text-gray-500">Akun Anda Telah Aktif</p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
                
                <div class="px-6 py-4 flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-gray-700">Terdaftar Dari</p>
                        <p class="text-sm text-gray-500">{{ Auth::user()->created_at->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection