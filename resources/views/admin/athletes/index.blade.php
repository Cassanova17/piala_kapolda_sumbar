@extends('layouts.app')

@section('title', 'Data Atlit')

@section('sidebar')
<aside class="fixed top-0 left-0 bg-gray-900 text-white w-64 h-screen">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-8 tracking-wide text-gray-100 uppercase border-b border-gray-700 pb-3">User Menu</h2>
        <ul class="space-y-3">
            <li>
                <a href="/admin/dashboard"
                   class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 
                          {{ Request::is('admin/dashboard') ? 'bg-indigo-700 font-semibold shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3 {{ Request::is('admin/dashboard') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-4"></path>
                    </svg>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/users"
                   class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 
                          {{ Request::is('admin/users') ? 'bg-indigo-700 font-semibold shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3 {{ Request::is('admin/users') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M17 20h5v-2a4 4 0 00-5-4m-6 6v-2a4 4 0 00-3-3.87M12 4a4 4 0 100 8 4 4 0 000-8z"></path>
                    </svg>
                    <span class="text-sm">Manajemen User</span>
                </a>
            </li>
            <li>
            <a href="/admin/athletes" 
                   class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 
                          {{ Request::is('admin/athletes') ? 'bg-indigo-700 font-semibold shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3 {{ Request::is('admin/athletes') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0l-7 7m0 0l-7-7"></path>
                    </svg>
                    <span class="text-sm">Data Atlit</span>
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
                        <span class="text-sm">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
@endsection

@section('content')
<div class="container mx-auto px-4 mt-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Data Atlit</h1>
        <a href="{{ route('admin.athletes.export') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg flex items-center transition-colors duration-300">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            Download Semua Data
        </a>
    </div>

    @if ($athletesByUser->isEmpty())
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <p class="text-xl text-gray-500">Belum ada dojang yang mengisi data atlit.</p>
        </div>
        @else
            @foreach ($athletesByUser as $userId => $athletes)
            @php
            $userName = $athletes->first()->user->name ?? 'Tanpa Nama';

            $totalAtlet = $athletes->count();
            $sudahBayarAtlet = $athletes->where('sudah_bayar', true)->count();
            $belumBayarAtlet = $totalAtlet - $sudahBayarAtlet;

            $persentaseBayar = $totalAtlet > 0 ? round(($sudahBayarAtlet / $totalAtlet) * 100) : 0;

            // Jika tetap ingin tampilkan jumlah uang
            $totalBayar = $athletes->sum('jumlah_pembayaran');
            $sudahBayar = $athletes->where('sudah_bayar', true)->sum('jumlah_pembayaran');
            $belumBayar = $totalBayar - $sudahBayar;
            @endphp


            <div class="bg-white shadow-md rounded-lg mb-12 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-5 border-b border-blue-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-blue-800">{{ $userName }}</h2>
                            <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div class="flex items-center">
                                    <div class="text-green-500 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Total Dibayar</p>
                                        <p class="font-bold text-green-600">Rp {{ number_format($sudahBayar) }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-red-500 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Belum Dibayar</p>
                                        <p class="font-bold text-red-600">Rp {{ number_format($belumBayar) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 w-full md:w-64">
                                <div class="flex justify-between text-xs mb-1">
                                    <span>Progress Pembayaran</span>
                                    <span>{{ $persentaseBayar }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $persentaseBayar }}%"></div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.athletes.exportbyuser', ['userId' => $userId]) }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg flex items-center transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Download Data {{ $userName }}
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-800 text-white text-xs uppercase tracking-wider">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Nama</th>
                                <th class="px-4 py-3 text-left">Tempat Lahir</th>
                                <th class="px-4 py-3 text-left">Tanggal Lahir</th>
                                <th class="px-4 py-3 text-left">NIK</th>
                                <th class="px-4 py-3 text-left">No HP</th>
                                <th class="px-4 py-3 text-left">Jenis Kelamin</th>
                                <th class="px-4 py-3 text-left">Dokumen</th>
                                <th class="px-4 py-3 text-left">Pertandingan</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-right">Jumlah Bayar</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($athletes as $index => $athlete)
                            <tr class="hover:bg-gray-50 {{ $athlete->sudah_bayar ? 'bg-green-50' : '' }}">
                                <td class="px-4 py-3 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-medium">{{ $athlete->name }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $athlete->tempat_lahir }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $athlete->tanggal_lahir }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $athlete->nik }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $athlete->no_hp }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    @if($athlete->jenis_kelamin == 'Putra')
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Putra</span>
                                    @else
                                        <span class="bg-pink-100 text-pink-800 text-xs font-medium px-2.5 py-0.5 rounded">Putri</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        @if ($athlete->akte)
                                            <a href="{{ route('view.file', ['filename' => basename($athlete->akte)]) }}" 
                                               class="text-blue-600 hover:text-blue-800 bg-blue-50 px-2 py-1 rounded text-xs flex items-center" 
                                               target="_blank">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Akte
                                            </a>
                                        @endif
                                        @if ($athlete->sertifikat_sabuk)
                                            <a href="{{ route('view.file', ['filename' => basename($athlete->sertifikat_sabuk)]) }}" 
                                               class="text-purple-600 hover:text-purple-800 bg-purple-50 px-2 py-1 rounded text-xs flex items-center" 
                                               target="_blank">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Sertifikat
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="text-xs">
                                        <p><span class="font-semibold">Jenis:</span> {{ $athlete->jenis_pertandingan }}</p>
                                        <p><span class="font-semibold">Umur:</span> {{ $athlete->kelompok_umur }}</p>
                                        <p><span class="font-semibold">Tingkat:</span> {{ $athlete->tingkat_pertandingan }}</p>
                                        <p><span class="font-semibold">Kelas:</span> {{ $athlete->kelas_pertandingan }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-center">
                                    @if($athlete->sudah_bayar)
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Lunas
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Belum Bayar
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-right font-medium">
                                    <span class="{{ $athlete->sudah_bayar ? 'text-green-600' : 'text-red-600' }}">
                                        Rp {{ number_format($athlete->jumlah_pembayaran ?? 0) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ url('/admin/athletes/' . $athlete->id . '/edit') }}"
                                           class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-2 py-1 rounded flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </a>
                                        
                                        <form id="delete-form-{{ $athlete->id }}" action="{{ url('/admin/athletes/' . $athlete->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                   onclick="confirmDelete('delete-form-{{ $athlete->id }}')"
                                                   class="bg-red-500 hover:bg-red-600 text-white text-xs px-2 py-1 rounded flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                        
                                        @if(!$athlete->sudah_bayar)
                                        <form action="{{ route('admin.athletes.markPaid', $athlete->id) }}" method="POST" onsubmit="return confirm('Tandai atlit ini sebagai sudah bayar?')">
                                            @csrf
                                            <button type="submit" 
                                                   class="bg-green-500 hover:bg-green-600 text-white text-xs px-2 py-1 rounded flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Bayar
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection