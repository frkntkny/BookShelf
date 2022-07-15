<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Books') }}
        </h2>
    </x-slot>
<x-back-button></x-back-button>
<h1 class="text-2xl my-5">All Books</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3 ">
                TITLE
            </th>
            <th scope="col" class="px-6 py-3">
                CATEGORY
            </th>
            <th scope="col" class="px-6 py-3">
                OWNER
            </th>
            <th scope="col" class="px-6 py-3">
                EDIT
            </th>


        </tr>
        </thead>
        <tbody>

        @if($books !== null)
            @foreach($books as $book)
        <tr class="bg-white dark:bg-gray-800 hover:bg-blue-800 hover:text-white">
            <th scope="row" class="px-6 py-4 font-bold  dark:text-white whitespace-nowrap text-center">
                {{$book ->id}}
            </th>
            <td class="px-6 py-4 text-center">
                {{$book ->title}}
            </td>
            <td class="px-6 py-4 text-center">
                {{$book->category ? $book->category->slug : 'No category'}}

            </td>
            <td class="px-6 py-4 text-center">
                {{$book ->author ? $book ->author->name : 'No author'}}





            </td>
            <td class="px-6 py-4 text-center">
                <a href="{{url('/editBook/'.$book->id)}}" class=" underline text-blue-600 hover:text-rose-600 visited:text-purple-600">
                    EDIT
                </a>
            </td>

        </tr>

            @endforeach
        @endif


        </tbody>
        {{$books->links()}}
    </table>

</div>


</x-app-layout>
<x-footer></x-footer>
