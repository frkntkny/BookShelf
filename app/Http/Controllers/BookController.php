<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function __construct()
    {
        //check is user is log in or not
//        $user = auth()->user();
//      if (isset($user)){
//          $this->middleware( auth()->user()->hasRole('admin') )->all();
//          $this->middleware(auth()->user()->hasRole('user'))->only('index', 'show','create','edit','store','search','destroy','update','download');
//
//      }
//      $this->middleware( empty($user))->only('index','show','search');
//

    }


    public function index()
    {
        $books = Book::paginate();
        return view('allBooks', compact('books'));
    }

    public function show(Book $book)
    {
        return view('book', compact('book'));
    }

    public function create()
    {
        $categories = Category::all();
        return view("addBook",compact("categories"));
    }

    public function edit(Book $book)
    {
        if (isset($book)) {

            if ($book->users_id == Auth::user()->id || Auth::user()->hasRole('admin')) {
                $categories = Category::all();
                return view("editBook", compact("book", "categories"));
            } else {
                abort(404);
            }
            abort('404');
        }
    }


    public function store(Request $request)
    {
        $bookCover = $request->bookCover;
        $title = $request->title;
        $description = $request->description;
        $category = $request->category;
        $bookFile = $request->bookFile;

        // save the book cover to public/images/bookCovers folder
        $bookCover->move(public_path('storage/images'), $bookCover->getClientOriginalName());
        $bookFile->move(public_path('storage/targetPDF'), $bookCover->getClientOriginalName());
        $coverFilePath = 'public/storage/images/' . $bookCover->getClientOriginalName();
        $pdfFilePath = 'public/storage/targetPDF/' . $bookCover->getClientOriginalName();
        $slug = $title;

        $newBook = new Book(
            [
                'title' => $title,
                'description' => $description,
                'image' => $coverFilePath,
                'pdf' => $pdfFilePath,
                'category_id' => $category,
                'users_id' => Auth::user()->id,
                'slug' => $slug,

            ]
        );
        $newBook->save();

        return redirect('/mybooks');
    }






    public function downloadBook($id)
    {
        $book = Book::find($id);
        return response()->download(public_path() . '/' . $book->pdf_path);
    }

    public function mybooks()
    {
        $books = Auth::user()->books;
        return view('mybooks', compact('books'));
    }

    public function search(Request $request)
    {
        $latestBooks = Book::orderBy('created_at', 'desc');

        if ($request->category != null && $request->category != "all")
            $latestBooks = $latestBooks->where('category_id', $request->category);


        if ($request->keyword != null)
            $latestBooks = $latestBooks->where('title', 'like', '%' . $request->keyword . '%')
                                       ->orWhere('description', 'like', '%' . $request->keyword . '%')
                                        ->orWhereHas('author', function ($query) use ($request) {
                                             $query->where('name', 'like', '%' . $request->keyword . '%');
                                        });



        $latestBooks = $latestBooks->paginate();

        $categories = Category::all();

        return view('welcome', compact('latestBooks', 'categories'));

    }

    public function destroy (Book $book)
    {
            if ($book->users_id == Auth::user()->id || Auth::user()->hasRole('admin')) {

                unlink(public_path(substr($book->image, 6)));
                unlink(public_path(substr($book->pdf, 6)));
                $book->delete();
                return redirect('/mybooks');
            } else {
                abort(404);
            }

    }

    public function update(Book $book, Request $request)
    {

        $book = Book::find($request->id);
        if (isset($book)) {
            if ($book->users_id == Auth::user()->id || Auth::user()->hasRole('admin')) {
                $book->title = $request->title;
                $book->description = $request->description;
                $book->category_id = $request->category;
                $bookCover = $request->bookCover;
                $bookFile = $request->bookFile;

                if($request->hasFile('bookCover')){
                    unlink(public_path(substr($book->image, 6)));
                    $bookCover->move(public_path('storage/images'), $bookCover->getClientOriginalName());
                    $coverFilePath = 'public/storage/images/' . $bookCover->getClientOriginalName();
                    $book->image = $coverFilePath;
                }
                if($request->hasFile('bookFile')){
                    unlink(public_path(substr($book->pdf, 6)));
                    $bookFile->move(public_path('storage/targetPDF'), $bookCover->getClientOriginalName());
                    $pdfFilePath = 'public/storage/targetPDF/' . $bookCover->getClientOriginalName();
                    $book->pdf = $pdfFilePath;
                }


                $book->save();
                return redirect('/mybooks');
            } else {
                abort(404);
            }
            abort(404);
        }
    }










    public function download(Request $request)
    {
        $book = Book::find($request->id);
        return response()->download(public_path() . '/' . substr($book->pdf,6));

        redirect()->back();
    }













}
