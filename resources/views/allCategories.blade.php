<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Categories') }}
        </h2>
    </x-slot>

    <x-back-button></x-back-button>
<a href="/categories/create">
<button type="submit" class="w-full text-pink-500 border border-pink-500 hover:bg-pink-500 hover:text-white active:bg-pink-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">

    Add Category
</button>
</a>
<h1 class="text-2xl my-5">All Categories</h1>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3 ">
                Name
            </th>

            <th scope="col" class="px-6 py-3">
                Delete
            </th>

        </tr>
        </thead>
        <tbody>

        @if(isset($categories))
            @foreach($categories as $category)
                <tr class="bg-white dark:bg-gray-800 hover:bg-blue-800 hover:text-white">
                    <th scope="row" class="px-6 py-4 font-bold  dark:text-white whitespace-nowrap text-center">
                        {{$category ->id}}
                    </th>
                    <td class="px-6 py-4 text-center">
                        {{$category ->slug}}
                    </td>

                    <td class="px-6 py-4 text-right text-center">

                        <form action="{{route('categories.destroy',[$category])}}" method='POST' style="margin-top: 40px">
                            {{csrf_field()}}
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <button type="submit" class="w-full text-pink-500 border border-pink-500 hover:bg-pink-500 hover:text-white active:bg-pink-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">

                                DELETE CATEGORY
                            </button>
                        </form>

{{--                        <form action="Post" method="">--}}
{{--                            <a href="{{url('/deleteCategory/'. $category->id)}}" class=" underline text-blue-600 hover:text-rose-600 visited:text-purple-600">--}}
{{--                                X DELETE--}}
{{--                            </a>--}}
{{--                        </form>--}}

                    </td>
                </tr>

            @endforeach
        @endif


        </tbody>
    </table>
</div>

</x-app-layout>
<x-footer></x-footer>
