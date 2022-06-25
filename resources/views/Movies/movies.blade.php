<x-app-layout>
    <x-slot name="header">
        <div class="grid">
            <div class="col-start-1">
                 <span class="font-semibold text-xl text-gray-800 leading-tight inline-block">
                    {{ __('Movies') }}
                </span>
            </div>
            <div class="col-start-2 justify-self-end">
                @if(auth()->user()->role == 'admin')
                <a href="{{url('movies/create')}}">
                    <x-button>Create</x-button>
                </a>
                @endif
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                        @if(auth()->user()->role == 'admin')
                            {{ __('List of Movies:') }}
                        @else
                            {{ __('List Of Your Favourite Movies:') }}
                        @endif
                    </h3>
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="w-full table-auto">
                                        <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Poster
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Title
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Description
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Release Date
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Status
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Likes
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($movies as $movie)
                                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <img src="{{$movie->poster}}" alt="movie poster">
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{$movie->title}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4">
                                                    {{$movie->description}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{$movie->release_date}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{($movie->published) ? 'Published' : 'Not Published'}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 text-center whitespace-nowrap">
                                                    {{$movie->likes}}
                                                </td>
                                                @if(auth()->user()->role == 'admin')
                                                <td class="text-sm font-light px-6 py-4">
                                                    <a href="/movies/edit/{{$movie->id}}"><x-button>Edit</x-button></a>
                                                </td>
                                                @else
                                                <td class="text-sm font-light px-6 py-4">
                                                    <a href="/movies/unfavourite/{{$movie->fav_id}}"> <x-button>Unfavourite</x-button></a>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
{{--    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>--}}
{{--    <script>--}}
{{--        (function($) {--}}
{{--            $(document).ready(function () {--}}
{{--                console.log("ready!");--}}
{{--            });--}}
{{--        })(jQuery);--}}
{{--    </script>--}}
</x-app-layout>
