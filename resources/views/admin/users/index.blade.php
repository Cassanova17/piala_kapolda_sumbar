@extends('layouts.app')

@section('title', 'Manajemen User')
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