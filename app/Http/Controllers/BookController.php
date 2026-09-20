<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\EditBookRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();

        $books = Book::where('user_id',$id)->get();
        return view('books.index' , compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('books.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
       
        $data = $request->validated();

       
           if($request->hasFile('image'))
            {
                //get image
            $image = $request->image;

            // changer Nom Image
            $newImageName = time() . '-' . $image->getClientOriginalName();

            //enregister l image dans le project laravel sur dossier PUBLIC
            $image->storeAs('books',$newImageName,'public');

            //enregistrer  nouveau nom d'image sur la base de donnee
            $data['image'] = $newImageName;

            }
             
          
      
                // donne user connecter maintenant
                    $data['user_id'] = Auth::user()->id;
                    
            
                    // Créer un nouvel enregistrement dans la table TASKS
                    Book::create($data);
       

                return back()->with('status-store-book' , 'Book Ajouter Avec Success');



    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    { 
        $categories = Category::get();
        return view('books.edit' , compact('book' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditBookRequest $request, Book $book)
    {
        $data = $request->validated();


      
                      if($request->hasFile('image'))
                    {

                    



                    // حذف الصورة القديمة إذا كانت موجودة
                            if ($book->image)
                                 {
                                 Storage::disk('public')->delete("books/$book->image");
                            }






                        //get image
                    $image = $request->image;

                    // changer Nom Image
                    $newImageName = time() . '-' . $image->getClientOriginalName();

                    //enregister l image dans le project laravel sur dossier PUBLIC
                    $image->storeAs('books',$newImageName,'public');

                    //enregistrer  nouveau nom d'image sur la base de donnee
                    $data['image'] = $newImageName;

                    }

            

 



        $book->update($data);
        return back()->with('update-book' , 'Book Modifier Avec Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {

    if($book->image)
        {
            Storage::disk('public')->delete("books/$book->image");
        }
        $book->delete();
        return back();
    }

    public function searshCreate()
    {
 
        return view('books.searsh');
    }

     public function searsh(Request $request)
    {
        $data = $request->validate([
            'searsh' =>'required',
        ]);

    
        $result = Book::where('user_id', Auth::id())->where('title', 'like', '%' . $data['searsh'] . '%')->get();

            return view('books.searsh', compact('result'));

    
    }
}
