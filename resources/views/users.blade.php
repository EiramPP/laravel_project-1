<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-1900">
                    <a href="{{ route('user.create')}}" >Users</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-6xl mx-auto sm:px-4 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-800">
                    <img src="joseph.jpg" alt="">
                    <a href="{{ route('user.create')}}" >joseph</a>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class="max-w-6xl mx-auto sm:px-4 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-800">
                    <a href="{{ route('user.create')}}" >Users</a>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class="max-w-6xl mx-auto sm:px-4 lg:px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-800">
                    <a href="{{ route('user.create')}}" >Users</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
