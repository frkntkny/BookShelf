

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>


<x-back-button></x-back-button>



<h1 class="text-2xl my-5">All Users</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    {{$users->links()}}
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
                Gmail
            </th>
            <th scope="col" class="px-6 py-3">
                Edit
            </th>
            <th scope="col" class="px-6 py-3">
                Delete
            </th>

        </tr>
        </thead>
        <tbody>
@if($users !== null)
@foreach($users as $user)
        <tr class="bg-white dark:bg-gray-800 hover:bg-blue-800 hover:text-white">
            <th scope="row" class="px-6 py-4 font-bold  dark:text-white whitespace-nowrap ">
                {{$user ->id}}
            </th>
            <td class="px-6 py-4 text-center">
                {{$user ->name}}
            </td>
            <td class="px-6 py-4 text-center">
                {{$user ->email}}
            </td>
            <td class="px-6 py-4 text-center">
                <a href="{{route('users.edit', [$user])}}" class="text-blue-500 dark:text-blue-400">

                    <button type="submit" class="w-full text-pink-500 border border-pink-500 hover:bg-pink-500 hover:text-white active:bg-pink-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                        EDIT USER
                    </button>
                    </a>
            </td>

            <td class="px-6 py-4 text-center">
                <form action="{{route('users.destroy',[$user])}}" method='POST' style="margin-top: 40px">
                    {{csrf_field()}}
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button type="submit" class="w-full text-pink-500 border border-pink-500 hover:bg-pink-500 hover:text-white active:bg-pink-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">

                        DELETE USER
                    </button>
                </form>
{{--                <a href="" class=" underline text-blue-600 hover:text-rose-600 visited:text-purple-600">--}}
{{--                   X DELETE--}}
{{--                </a>--}}
            </td>
        </tr>
@endforeach
@endif

        </tbody>
    </table>

    {{$users->links()}}
</div>

</x-app-layout>
<x-footer></x-footer>
