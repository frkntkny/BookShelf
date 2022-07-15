<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Books') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div name="content">

                        <a href="{{ route('books.create') }}" class="btn btn-default">
                            <button class="w-full text-pink-500 border border-pink-500 hover:bg-pink-500 hover:text-white active:bg-pink-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">

                               Add Book
                            </button>
                        </a>

                        <div class="grid grid-cols-2 justify-items-center">
                            @php(isset($books))
                            @foreach($books as $book)
                                <x-card :book='$book'></x-card>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer></x-footer>
