@extends('layouts.app')
@section('title', 'Buat User')

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
@section('content')
    <div class="container mx-auto mt-8">
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1 class="text-3xl font-bold mb-6">Buat User</h1>
        <div class="bg-white p-8 rounded-lg shadow-md">
            <form method="POST" action="/admin/users">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-3 py-2 border @error('name') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-green-500">
                     @error('name')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email"  value="{{ old('email') }}" required class="w-full px-3 py-2 border @error('email') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-green-500">
                    @error('email')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password"  class="w-full px-3 py-2 border @error('password') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-green-500">
                    @error('password')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                    <select name="role" id="role" class="w-full px-3 py-2 border @error('role') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-green-500">
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                </div>
                <div class="mb-6">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                    <select name="status" id="status" class="w-full px-3 py-2 border @error('status') border-red-500 @enderror border-gray-300 rounded-md focus:outline-none focus:border-green-500">
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                    @error('status')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Buat</button>
                    <a href="/admin/users" class="text-green-500 hover:text-green-600">Kembali</a>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection