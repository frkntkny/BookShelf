
 @if(isset($book))
     <div  class=" w-full grow flex flex-col  bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mx-5 my-5  ">

         <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{substr($book->image,6)}}" alt="">
         <div class=" flex w-full flex-col justify-between p-4 leading-normal  " >
             <div>
                 <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$book->title}}</h5>
                 <a href="{{ $book->category ? ('/search?category=all&keyword='.$book->author->name) : "/"}}" class="hover:bg-blue-800 hover:text-white">
                 <span >
                      by {{$book->users_id ? $book->author->name : "Unknown"}}
                 </span>
                 </a>
                  in {{$book->created_at->format('Y')}}
                 <br>
                <a href="{{ $book->category ? ('/search?category='.$book->category->id.'&keyword=') : "/"}}">
                 <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded">
                      {{$book->category  ? $book->category->slug : 'No Category'}}
                 </span>
                </a>


                 <p class="mb-3 font-normal text-gray-700 dark:text-gray-400  sm:invisible md:visible  ">
                     @if(strlen($book->description) > 100)
                         {{substr($book->description,0,100)}}...
                     @else
                         {{$book->description}}
                     @endif
                 </p>

             </div>

             <div class="">

                 <div style="" class="grid grid-cols-2 gap-4 content-center place-content-center w-full">
                     <div class="text-center">

                            @if(Auth::check())

                         @if(Auth::user()->id == $book->users_id)
                             <a href="{{route('books.edit', [$book])}}" class="">
                                 <button type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                             </a>

                            @endif
                         @endif
                     </div>

                     <a href="{{route('books.show', [$book])}}">
                     <div class="text-center "><button
                             type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">More</button>
                     </div>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 @else
     <a href="#" class="flex flex-col  bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mx-5 my-5">
         <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457" alt="">
         <div class="flex flex-col justify-between p-4 leading-normal">
             <div>
                 <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                 <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded">Success</span>

                 <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

             </div>

             <div class="">

                 <div class="grid grid-cols-2 gap-4 content-center place-content-center">
                     <div class="text-center">
                         {{--                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Audio &#x2193;</button>--}}
                     </div>

                     <div class="text-center "><button
                             onclick="followUser(this);"
                             type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">PDF &#x2193;</button>
                     </div>
                 </div>
             </div>
         </div>
     </a>
 @endif


