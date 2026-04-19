<x-app-layout>
    <x-slot name="header">


        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>


        <a
        class="px-4 py-2  rounded-md bg-blue-400  text-blue-900 text-bold text-md" 
        href="{{ route('posts.create') }}">
                + Add Post 
        </a>
    </x-slot>

    @if(session('success'))
        <p class="w-full bg-green-400 text-green-950">
            {{ session('success') }}
        </p>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}

            @include('posts.index' , compact('posts'))


        </div>
    </div>
</x-app-layout>
