<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Movies') }}
                    </h2>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Profile</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-4 gap-4 justify-center">
                        @foreach($movies as $movie)
                            <div class="rounded-lg relative shadow-lg bg-white max-w-sm">
                                <a href="#!">
                                    <img class="rounded-t-lg h-96" src="images/{{$movie->poster}}" alt=""/>
                                </a>
                                <div class="p-6 mb-4">
                                        <h5 class="text-gray-900 text-xl font-medium mb-2 h-12">{{$movie->title}}</h5>
                                        <p class="text-gray-700 text-base mb-4 truncate">
                                            {{$movie->description}}
                                        </p>
                                </div>
                                <div>
                                    <span class="absolute bottom-4 left-4">Likes:{{$movie->likes}}</span>
                                    @auth
                                        <?php $liked = 0 ?>
                                        @foreach($movie->users as $user)
                                            @if($user->id == auth()->id())
                                                <?php $liked = 1 ?>
                                            @endif
                                        @endforeach
                                        @if($liked == 1)
                                            <button class="inline-block absolute bottom-4 right-4 px-6 py-2.5 bg-green-300 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-400 hover:shadow-lg focus:bg-green-400 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-400 active:shadow-lg transition duration-150 ease-in-out">Favourited!</button>
                                        @else
                                            <a href="/movies/favourite/{{$movie->id}}"><button type="button" class="inline-block absolute bottom-4 right-4 px-6 py-2.5 bg-yellow-300 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-400 hover:shadow-lg focus:bg-yellow-400 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-400 active:shadow-lg transition duration-150 ease-in-out">Favourite</button></a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
