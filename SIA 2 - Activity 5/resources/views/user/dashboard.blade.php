<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">👤 User Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-8 text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome {{ auth()->user()->name }}!</h1>
                <p class="text-xl text-gray-600 mb-8">Your role: <span class="font-bold text-blue-600">{{ ucfirst(auth()->user()->role) }}</span></p>
                <div class="bg-blue-50 p-8 rounded-xl">
                    <h3 class="text-2xl font-semibold mb-4">✅ Middleware Protection Working!</h3>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>