<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Book') }}
        </h2>
    </x-slot>

    <div class="container justify-center" style="width: 600px; margin: 20px auto;">
<x-back-button></x-back-button>

<h1 class="text-2xl my-5">Add Book</h1>

    <hr>

<form class="px-2 py-4 border border-indigo-600" enctype="multipart/form-data" action="{{route('books.store')}}" method='POST'>
    {{csrf_field()}}

    <div class="mb-6 my-5">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload Cover Image</label>
        <input name="bookCover" accept="image/png, image/jpeg" type="file" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Title</label>
        <input name="title" maxlength="50" type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Hamlet..." required>
    </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
        <input name="description" maxlength="400" type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>

    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select a category</label>
    <select name="category" required id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @if(isset($categories))
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->slug}}</option>
            @endforeach
        @endif
    </select>

    <div class="mb-6 my-5">
        <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload File</label>
        <input name="bookFile" type="file" id="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>


    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
</div>
</x-app-layout>
<x-footer></x-footer>

