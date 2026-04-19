<x-guest-layout>
    <x-slot name="header">
        

        

        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            Add New Post  :
        </h2>


        <a
        class="px-4 py-2  rounded-md bg-blue-400  text-blue-900 text-bold text-md" 
        href="{{ route('dashboard') }}">
                <- Go Back
        </a>
    </x-slot>

    <div class="py-12">
       <div class="w-screen  mx-auto sm:px-6 lg:px-8 py-8">
    <h2 class="text-3xl  text-start font-extrabold text-gray-900 mb-8 text-center">Latest Blog Posts</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($posts as $post)
            {{-- Post Card --}}
            <div class="flex flex-col bg-blue-200 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-3">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Article</span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                        {{ $post->title }}
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        {{ $post->description }}
                    </p>
                </div>

                <div class="mt-auto border-t border-gray-50 p-6 flex items-center justify-between bg-gray-50/50">
                    <div class="flex items-center">
                        <div class="text-sm">
                            {{-- <p class="text-gray-900 font-semibold leading-none">{{ $post->user->name }}</p> --}}
                            <p class="text-gray-500 text-xs mt-1">{{ $post->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                        Read more →
                    </a>
                </div>
            </div>
        @empty
            {{-- Empty State --}}
            <div class="col-span-full flex flex-col items-center justify-center p-12 bg-white rounded-2xl border-2 border-dashed border-gray-200">
                <div class="bg-gray-100 p-4 rounded-full mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">No posts found</h3>
                <p class="text-gray-500 mt-1">Be the first to share something with the world!</p>
                <a href="{{ route('posts.create') }}" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                    Create New Post
                </a>
            </div>
        @endforelse
    </div>
</div>

    </div>
</x-guest-layout>
