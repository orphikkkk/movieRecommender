<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Create') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                        {{ __('Add new Movie') }}
                    </h3>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('movies.store') }}">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-label for="title" :value="__('Title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('name')" required autofocus />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-textarea name="description" id="description" cols="30" rows="10" class="block mt-1 w-full resize-none'"></x-textarea>
{{--                            <x-input id="description" class="block mt-1 w-full" name="description" :value="old('description')" />--}}
                        </div>

                        <!-- Release Date -->
                        <div class="mt-4">
                            <x-label for="releaseDate" :value="__('Release date')" />

                            <x-input id="releaseDate" class="block mt-1 w-full"
                                     type="date"
                                     name="releaseDate"
                                     :value="old('description')"
                                      />
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
