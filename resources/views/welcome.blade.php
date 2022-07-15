<x-html-top-template></x-html-top-template>
<x-main-nav :categories="$categories" ></x-main-nav>

@if ($_GET == null)

<h1 class="font-bold text-2xl px-3 py-3 text-center">Latest Books</h1>
@else

    <div style="width: 100%; margin-top:10px" >
<a href="{{url('/')}}" style="margin: auto; display: block; width: 180px; top: 10px">
    <button  type="button" class="text-white content-center  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Clear Search </button>

</a></div>
@endif
<div class="grid  sm:grid-cols-1 md:grid-cols-2  justify-items-center">



    @if(isset ($latestBooks))
        @foreach($latestBooks as $book)
            <x-card :book='$book'></x-card>
        @endforeach
    @else
            No available book yet
    @endif


</div>

{{
    //create a pagination and checking the query string
    $latestBooks->appends(request()->except('page'))->links()
    }}


<x-footer></x-footer>
<x-html-bottom-template></x-html-bottom-template>
