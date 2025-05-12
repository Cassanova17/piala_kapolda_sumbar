@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('sidebar')
<aside class="bg-gray-900 text-white w-64 min-h-screen">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-8 tracking-wide text-gray-100 uppercase border-b border-gray-700 pb-3">User Menu</h2>
        <ul class="space-y-3">
            <li>
                <a href="/admin/dashboard"
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
                <a href="/admin/users"
                   class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 
                          {{ Request::is('athletes') ? 'bg-indigo-700 font-semibold shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3 {{ Request::is('athletes') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M17 20h5v-2a4 4 0 00-5-4m-6 6v-2a4 4 0 00-3-3.87M12 4a4 4 0 100 8 4 4 0 000-8z"></path>
                    </svg>
                    <span class="text-sm">Manajemen User</span>
                </a>
            </li>
            <li>
            <a href="/admin/athletes" 
                   class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 
                          {{ Request::is('profile') ? 'bg-indigo-700 font-semibold shadow-lg' : '' }}">
                    <svg class="w-5 h-5 mr-3 {{ Request::is('profile') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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

@section('header')
<h1 class="text-3xl font-bold">Admin Dashboard</h1>
@endsection

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex space-x-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow-md w-full max-w-sm">
            <h2 class="text-lg font-medium">Total Users</h2>
            <p class="text-2xl font-bold text-green-500">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md w-full max-w-sm">
            <h2 class="text-lg font-medium">Pending Users</h2>
            <p class="text-2xl font-bold text-yellow-400">{{ $pendingUsers }}</p>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-800 text-white uppercase text-xs">
                <tr>
                    <th class="px-4 py-2">Nama Dojang</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2 text-right">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->role }}</td>
                    <td class="px-4 py-2 text-right">
                        <a href="/admin/user/{{ $user->id }}/approve" class="text-green-600 hover:text-green-900">Approve</a>
                        <a href="/admin/user/{{ $user->id }}/reject"
                           onclick="event.preventDefault(); if(confirm('Are you sure you want to reject this user?')) document.getElementById('reject-form-{{ $user->id }}').submit();"
                           class="text-red-600 hover:text-red-900 ml-2">
                           Reject
                        </a>
                        <form id="reject-form-{{ $user->id }}" action="/admin/user/{{ $user->id }}/reject" method="POST" style="display: none;">
                            @csrf
                            @method('PATCH')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
