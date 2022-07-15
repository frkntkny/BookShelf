<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>
<div class="container justify-center" style="width: 600px; margin: 20px auto;">
<x-back-button></x-back-button>

<h1 class="text-2xl my-5">Add Category</h1>

    <hr>

<form class="px-2 py-4 border border-indigo-600"  action="{{route('categories.store')}}" method='POST'>
    {{csrf_field()}}
    {{}}


    <div class="mb-6">
        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Category</label>
        <input name="slug" type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Hamlet..." required>
    </div>





    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
</div>
</x-app-layout>
<x-footer></x-footer>

