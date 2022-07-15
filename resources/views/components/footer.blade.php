<footer class="p-4 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-800 bg-gray-100">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="{{route('welcome')}}" class="flex items-center mb-4 sm:mb-0">
            <img src="/books.png" class="mr-3 h-8" alt="Bookshelf Logo" />
            <span class="">BookShelf</span>
        </a>
        <ul class="flex flex-wrap items-center text-sm text-gray-500 sm:mb-0 dark:text-gray-400 gap-4">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>

            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
            </li>
            <li>
                <a href="#" class="hover:underline">Contact</a>
            </li>
        </ul>
    </div>

    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="{{route('welcome')}}" class="hover:underline">BookShelf™</a>. All Rights Reserved.
    </span>
</footer>

