@extends('layouts.app')

@section('title', 'Manajemen User')
@section('sidebar')
<div class="p-6">
    <h2 class="text-lg font-bold mb-6 tracking-wide text-gray-200 uppercase">Admin Menu</h2>
    <ul class="space-y-2">
        <li>
            <a href="/admin/dashboard"
               class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition 
                      {{ Request::is('admin/dashboard') ? 'bg-gray-700 font-semibold' : '' }}">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-4"></path>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/admin/users"
               class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition 
                      {{ Request::is('admin/users') || Request::is('admin/users/*') ? 'bg-gray-700 font-semibold' : '' }}">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M17 20h5v-2a4 4 0 00-5-4m-6 6v-2a4 4 0 00-3-3.87M12 4a4 4 0 100 8 4 4 0 000-8z"></path>
                </svg>
                Users
            </a>
        </li>
        <li>
            <a href="/admin/athletes"
               class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition 
                      {{ Request::is('admin/athletes') || Request::is('admin/athletes/*') ? 'bg-gray-700 font-semibold' : '' }}">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
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
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Manajemen User</h1>
        <a href="/admin/users/create" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Buat User</a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->role }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="/admin/users/{{ $user->id }}/edit" class="text-green-500 hover:text-green-900">Edit</a>
                        <form action="/admin/users/{{ $user->id }}" method="POST" class="inline" onsubmit="return confirm('APAKAH ANDA YAKIN AKAN MENGHAPUS USER INI?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Hapus</button>
                        </form>

                        <script>
                           
                        </script>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection