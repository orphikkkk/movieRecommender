<x-app-layout>
    <x-slot name="header">
        <div class="grid">
            <div class="col-start-1">
                 <span class="font-semibold text-xl text-gray-800 leading-tight inline-block">
                    {{ __('Users') }}
                </span>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                        {{ __('List of Users:') }}
                    </h3>
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="w-full table-auto">
                                        <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                #
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Name
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Email
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Favourites
                                            </th>
{{--                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">--}}
{{--                                                Release Date--}}
{{--                                            </th>--}}
{{--                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">--}}
{{--                                                Status--}}
{{--                                            </th>--}}
{{--                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">--}}
{{--                                                Likes--}}
{{--                                            </th>--}}
{{--                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">--}}
{{--                                                Action--}}
{{--                                            </th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{$user->id}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{$user->name}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4">
                                                    {{$user->email}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <?php  $movies = [];?>
                                                    @foreach($user->movies as $movie)
                                                        <?php
                                                            $movies []= $movie->title;
                                                            $list = implode(",",$movies)
                                                        ?>
                                                    @endforeach
                                                    {{$list}}
                                                </td>
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
