<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Dashboard Overview
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- USER PROFILE --}}
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-center gap-6">
                <div class="w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center text-xl font-semibold">
                    {{ strtoupper(substr($currentUser->name, 0, 2)) }}
                </div>

                <div>
                    <h1 class="text-xl font-semibold text-gray-900">{{ $currentUser->name }}</h1>
                    <p class="text-gray-500 text-sm">{{ $currentUser->email }}</p>

                    <span class="inline-block mt-2 px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">
                        {{ ucfirst($currentUser->role) }} • Joined {{ $currentUser->created_at->format('M d, Y') }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

                {{-- USERS TABLE --}}
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
                    {{-- Header with search and filters --}}
                    <div class="p-6 border-b">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">
                                    Users
                                </h3>
                                <p class="text-sm text-gray-500">
                                    Total: {{ $filteredUsers->count() }} of {{ $internalUsers->count() }}
                                </p>
                            </div>

                            {{-- ✅ FORM REPLACED Livewire inputs --}}
                            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">

                                {{-- Search Input --}}
                                <div class="relative flex-1 sm:flex-none">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <input
                                        type="text"
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="Search users..."
                                        class="block w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    >
                                </div>

                                {{-- Role Filter --}}
                                <div class="relative flex-1 sm:flex-none">
                                    <select
                                        name="role"
                                        class="block w-full pl-3 pr-10 py-2 border border-gray-200 rounded-lg leading-5 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    >
                                        <option value="">All Roles</option>
                                        <option value="admin" {{ ($roleFilter ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="user" {{ ($roleFilter ?? '') == 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>

                                {{-- Filter & Clear Buttons --}}
                                <div class="flex gap-2">
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors whitespace-nowrap"
                                    >
                                        Filter
                                    </button>
                                    <a
                                        href="{{ route('admin.dashboard') }}"
                                        class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors whitespace-nowrap"
                                    >
                                        Clear
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto">
                        @if($filteredUsers->count() > 0)
                            <table class="w-full text-sm">
                                <thead class="bg-gray-50 text-gray-600">
                                    <tr>
                                        <th class="p-4 text-left font-medium">Name</th>
                                        <th class="p-4 text-left font-medium">Email</th>
                                        <th class="p-4 text-left font-medium">Role</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y">
                                    @foreach($filteredUsers as $user)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-medium text-gray-900">{{ $user->name }}</td>
                                        <td class="p-4 text-gray-600">{{ $user->email }}</td>
                                        <td class="p-4">
                                            <span class="px-2 py-1 text-xs rounded-md font-medium
                                                {{ $user->role === 'admin' ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-700' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-12">
                                <div class="text-gray-400 mb-4">
                                    <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 mb-1">No users found</h3>
                                <p class="text-sm text-gray-500">
                                    @if(($search ?? '') || ($roleFilter ?? ''))
                                        Try adjusting your search or filter criteria
                                    @else
                                        No users available
                                    @endif
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- WEATHER --}}
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Weather</h3>
                    @if($weather)
                        <div class="flex flex-col items-center justify-center text-center space-y-2">
                            <div class="text-5xl font-semibold text-gray-900">{{ $weather['main']['temp'] ?? 0 }}°C</div>
                            <div class="text-gray-600">{{ $weather['name'] }}, {{ $weather['sys']['country'] }}</div>
                            <div class="text-sm text-gray-500">{{ $weather['weather'][0]['description'] ?? '' }}</div>
                            <div class="flex gap-6 text-xs text-gray-400 mt-4">
                                <span>Humidity: {{ $weather['main']['humidity'] ?? 0 }}%</span>
                                <span>Wind: {{ $weather['wind']['speed'] ?? 0 }} m/s</span>
                            </div>
                        </div>
                    @else
                        <div class="text-center text-gray-500 py-10">Weather data unavailable</div>
                    @endif
                </div>
            </div>

            {{-- NEWS --}}
            @if(isset($news) && count($news) > 0)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6">Latest News</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach(array_slice($news, 0, 3) as $article)
                    <div class="border rounded-lg p-4 hover:shadow-md transition">
                        <h4 class="font-semibold text-gray-900 text-sm mb-2 line-clamp-2">{{ $article['title'] ?? 'No title' }}</h4>
                        <p class="text-xs text-gray-500 line-clamp-2">{{ $article['description'] ?? '' }}</p>
                        <div class="text-xs text-gray-400 mt-3">{{ $article['source']['name'] ?? '' }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>

@push('styles')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush