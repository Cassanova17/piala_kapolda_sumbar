@extends('layouts.app')

@section('title', 'Dashboard')

@section('sidebar')
<aside class="bg-gray-900 text-white w-64 min-h-screen">
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
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-xl font-semibold mb-2">Halo, {{ Auth::user()->name }}</h2>
        <p class="text-gray-600">Selamat datang di dashboard pelatih. Di sini kamu dapat melihat statistik atlet kamu dan mengelola data pendaftaran.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-r from-blue-100 to-blue-200 p-5 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">Jumlah Atlit</h3>
            <p class="text-3xl font-bold text-blue-900">{{ $athletes->count() }}</p>
        </div>

        <div class="bg-gradient-to-r from-green-100 to-green-200 p-5 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-green-800 mb-2">Total Pembayaran</h3>
            <p class="text-3xl font-bold text-green-900">
                Rp {{ number_format($athletes->sum('jumlah_pembayaran'), 0, ',', '.') }}
            </p>
        </div>

        <div class="bg-gradient-to-r from-purple-100 to-purple-200 p-5 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-purple-800 mb-2">Atlit Sudah Bayar</h3>
            <p class="text-3xl font-bold text-purple-900">
                {{ $athletes->where('sudah_bayar', true)->count() }}
            </p>
        </div>
    </div>

    <div class="mt-10">
        <a href="{{ url('/athletes/create') }}"
           class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg shadow transition-all duration-300">
            + Tambah Atlit Baru
        </a>
    </div>
</div>
@endsection
