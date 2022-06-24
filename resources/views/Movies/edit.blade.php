<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Edit') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                        {{ $movies->title }}
                    </h3>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{route("movies.update")}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$movies->id}}">
                        <!-- Title -->
                        <div>
                            <x-label for="title" :value="__('Title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$movies->title}}" required autofocus />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <textarea name="description"
                                      id="description" cols="30" rows="10"
                                      class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                            >{{$movies->description}}
                            </textarea>
                        </div>

                        <!-- Release Date -->
                        <div class="mt-4">
                            <div class="flex flex-wrap">
                                <div>
                                    <x-label for="releaseDate" :value="__('Release date')" />

                                    <x-input id="releaseDate" class="block mt-1 w-full"
                                             type="date"
                                             name="releaseDate"
                                             value="{{$movies->release_date}}"
                                    />
                                </div>
                                <div class="mt-6 ml-6">
                                    <input type="checkbox" {{($movies->published) ? "checked" : ""}} name="publish"> Published
                                </div>
                            </div>

                        </div>

                        <!-- Poster -->
                        <div class="mt-4">
                            <x-label for="poster" :value="__('Poster')" />
                            <x-input id="poster" class="block mt-1 w-full"
                                     type="file"
                                     accept="image/png, image/jpeg"
                                     name="poster"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
