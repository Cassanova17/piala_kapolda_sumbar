
@extends('layouts.app')

@section('title', 'Athlete List')
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
        </ul>
    </div>
</aside>
@endsection


@section('content')
<div class="container mx-auto px-6 py-12">
    <h1 class="text-4xl font-bold mb-10 text-gray-800">List Data Atlit</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-8" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="mb-10">
        <a href="/athletes/create" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded shadow-md transition duration-300 ease-in-out">
            Tambahkan Data Atlit Baru
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
        <table class="min-w-full leading-normal table-auto">
            <thead class="bg-gray-800 text-white shadow">
                <tr class="font-semibold">
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Tempat Lahir</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Tanggal Lahir</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">NIK</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">No HP/WA</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Jenis Kelamin</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Akte Kelahiran</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Sertifikat Sabuk</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Jenis Pertandingan</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Kelompok Umur</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Tingkat Pertandingan</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Kelas Pertandingan</th>
                    <th class="px-6 py-4 text-left  uppercase tracking-wider">Edit</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($athletes as $athlete)
                <tr class="hover:bg-gray-100 transition duration-300 ease-in-out {{ $loop->odd ? 'bg-gray-50' : 'bg-white' }}">
                    <td class="px-6 py-5">{{ $athlete->name }}</td>
                    <td class="px-6 py-5">{{ $athlete->tempat_lahir }}</td>
                    <td class="px-6 py-5">{{ $athlete->tanggal_lahir }}</td>
                    <td class="px-6 py-5">{{ $athlete->nik }}</td>
                    <td class="px-6 py-5">{{ $athlete->no_hp }}</td>
                    <td class="px-6 py-5">{{ $athlete->jenis_kelamin }}</td>
                    <td class="px-6 py-5">{{ $athlete->akte ? $athlete->akte : '-' }}</td>
                    <td class="px-6 py-5">{{ $athlete->sertifikat_sabuk ? $athlete->sertifikat_sabuk : '-' }}</td>
                    <td class="px-6 py-5">{{ $athlete->jenis_pertandingan }}</td>
                    <td class="px-6 py-5">{{ $athlete->kelompok_umur }}</td>
                    <td class="px-6 py-5">{{ $athlete->tingkat_pertandingan }}</td>
                    <td class="px-6 py-5">{{ $athlete->kelas_pertandingan }}</td>
                    <td class="px-6 py-5 text-center">
                        <a href="/athletes/{{ $athlete->id }}/edit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow-md transition duration-300 ease-in-out">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection