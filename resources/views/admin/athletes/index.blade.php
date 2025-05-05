@extends('layouts.app')

@section('title', 'Data Atlit')

@section('sidebar')
<script>
    function confirmDelete(formId) {
        if (confirm('Apakah Anda yakin ingin menghapus atlit ini?')) {
            document.getElementById(formId).submit();
        }
    }
</script>

<div class="p-6">
    <h2 class="text-lg font-bold mb-6 tracking-wide text-gray-200 uppercase">Admin Menu</h2>
    <ul class="space-y-2">
        <li>
            <a href="/admin/dashboard"
               class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition {{ Request::is('admin/dashboard') ? 'bg-gray-700 font-semibold' : '' }}">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-4"></path>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/admin/users"
               class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition {{ Request::is('admin/users*') ? 'bg-gray-700 font-semibold' : '' }}">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M17 20h5v-2a4 4 0 00-5-4m-6 6v-2a4 4 0 00-3-3.87M12 4a4 4 0 100 8 4 4 0 000-8z"></path>
                </svg>
                Users
            </a>
        </li>
        <li>
            <a href="/admin/athletes"
               class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition {{ Request::is('admin/athletes*') ? 'bg-gray-700 font-semibold' : '' }}">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5 13l4 4L19 7"></path>
                </svg>
                Data Atlit
            </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">Data Atlit</h1>

    <div class="mb-6">
        <a href="{{ route('admin.athletes.export') }}"
           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Download Semua Data
        </a>
    </div>

    @if ($athletesByUser->isEmpty())
        <div class="text-center text-gray-500 mt-10">Belum ada dojang yang mengisi data atlit.</div>
    @else
        @foreach ($athletesByUser as $userId => $athletes)
            @php
                $userName = $athletes->first()->user->name ?? 'Tanpa Nama';
            @endphp

            <div class="bg-white shadow-md rounded-lg mb-12">
                <div class="bg-gray-100 p-4 flex justify-between items-center border-b">
                    <h2 class="text-xl font-semibold">{{ $userName }}</h2>                    
                    <a href="{{ route('admin.athletes.exportbyuser', ['userId' => $userId]) }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-4 rounded">
                        Download Data {{ $userName }}
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-800 text-white text-xs uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-3 text-left">No</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Tempat Lahir</th>
                                <th class="px-6 py-3 text-left">Tanggal Lahir</th>
                                <th class="px-6 py-3 text-left">NIK</th>
                                <th class="px-6 py-3 text-left">No HP</th>
                                <th class="px-6 py-3 text-left">Jenis Kelamin</th>
                                <th class="px-6 py-3 text-left">Akte</th>
                                <th class="px-6 py-3 text-left">Sertifikat Sabuk</th>
                                <th class="px-6 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($athletes as $index => $athlete)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $athlete->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $athlete->tempat_lahir }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $athlete->tanggal_lahir }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $athlete->nik }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $athlete->no_hp }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $athlete->jenis_kelamin }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($athlete->akte)
                                        <a href="{{ asset('storage/' . $athlete->akte) }}" target="_blank" class="text-blue-600 hover:underline">
                                            Lihat Akte
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($athlete->sertifikat_sabuk)
                                        <a href="{{ asset('storage/' . $athlete->sertifikat_sabuk) }}" target="_blank" class="text-blue-600 hover:underline">
                                            Lihat Sertifikat
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <a href="{{ url('/admin/athletes/' . $athlete->id . '/edit') }}"
                                       class="text-blue-600 hover:text-blue-800 mr-2">Edit</a>
                                    <form id="delete-form-{{ $athlete->id }}" action="{{ url('/admin/athletes/' . $athlete->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                                onclick="confirmDelete('delete-form-{{ $athlete->id }}')"
                                                class="text-red-600 hover:text-red-800">
                                            Delete
                                        </button>
                                    </form>
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
