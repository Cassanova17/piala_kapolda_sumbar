@extends('layouts.app')

@section('title', 'Admin Dashboard')

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
                    <th class="px-4 py-2">Nama</th>
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
