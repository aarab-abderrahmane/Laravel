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
        <div class="max-w-7xl mx-auto text-center  sm:px-6 lg:px-8">
        
            <form action="{{ route('posts.store') }}" method="POST">

                    <div class="flex flex-col"> 

                            <div class="mb-2">
                                <label>Title : </label><br>
                                <input
                                    placeholder = "post title .."
                                    name="title" 
                                    value="{{ old('title') }}"    
                                >
                                @error('title')
                                    <p class="bg-red-400 text-red-900">{{$message}}</p>
                                @enderror

                            </div>

                            
                            <div class="mb-2">
                                <label>description : </label><br>
                                <input
                                    placeholder = "post description .."
                                    name="description" 
                                    value="{{ old('description') }}"    
                                >
                                @error('description')
                                    <p class="bg-red-400 text-red-900">{{$message}}</p>
                                @enderror

                            </div>


                             <div class="mb-2">
                                <label>body : </label><br>
                                <textarea
                                    placeholder = "post body .."
                                    name="body" 
                                    value="{{ old('body') }}"    
                                ></textarea>

                                @error('body')
                                    <p class="bg-red-400 text-red-900">{{$message}}</p>
                                @enderror

                            </div>

                            <button
                            class="bg-green-400 mx-auto  p-2"
                            type="submit">
                                Create 
                            </button>

                    <div>

                   

                    <label></label>



            </from>


        </div>
    </div>
</x-guest-layout>
