<x-html-top-template></x-html-top-template>

<x-main-nav  ></x-main-nav>

<section class="bg-white dark:bg-gray-900">
    <div class="container flex flex-col items-center px-4 py-12 mx-auto xl:flex-row">
        <div class="flex justify-center xl:w-1/2">
            <img class="h-80 w-80 sm:w-[28rem] sm:h-[28rem] flex-shrink-0 object-cover rounded-full" src="{{substr($book->image,6)}}" alt="">
        </div>

        <div class="flex flex-col items-center mt-6 xl:items-start xl:w-1/2 xl:mt-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-800 xl:text-4xl dark:text-white">
              {{$book->title}}
            </h2>
            <p class="block max-w-2xl mt-4 text-xl text-gray-500 dark:text-gray-300">
                {{$book->category->slug}}
            </p>

            <p class="block max-w-2xl mt-4 text-xl text-gray-500 dark:text-gray-300">
                {{$book->description}}
            </p>

            <div class="mt-6 sm:-mx-2">
                <div class="inline-flex w-full overflow-hidden rounded-lg shadow sm:w-auto sm:mx-2">

                </div>

                <div class="">

                    <form action="/download" method='POST' style="margin-top: 40px" >
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$book->id}}">
                        <button type="submit" class="w-full text-pink-500 border border-pink-500 hover:bg-pink-500 hover:text-white active:bg-pink-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">

                            {{ Auth::Check() ? 'Download' : 'Login to Download' }}
                        </button>
                    </form>

                </div>


            </div>
        </div>
    </div>
</section>


<x-footer></x-footer>
<x-html-bottom-template></x-html-bottom-template>
