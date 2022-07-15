<nav
    class="relative w-full flex items-center grid-cols-3 justify-between py-4 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg">


    <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
        <div class="container-fluid">
            <a class="flex items-center text-gray-900 hover:text-gray-900 focus:text-gray-900 mt-2 lg:mt-0 mr-1"
               href="{{url('/')}}">
                <img class="mr-2" src="/books.png" style="height: 20px" alt="" loading="lazy"/>
                <span class="font-medium">BookShelf</span>
            </a>

        </div>

    </div>

    <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6 ">
        @if(isset($categories))
        <x-searchDiv  :categories="$categories"></x-searchDiv>
        @endif


    </div>

    <div class="container-fluid w-full flex flex-wrap items-center justify-end px-6 text-end">
        <div class="container-fluid">
            @if (Auth::check())
                <a href="{{ url('/mybooks') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">My Books</a>
            @else()
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                    in</a>
                <a href="{{ route('register') }}"
                   class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        </div>

    </div>

</nav>




