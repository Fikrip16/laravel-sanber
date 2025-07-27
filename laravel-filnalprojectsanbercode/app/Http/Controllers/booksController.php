<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\genre;
use App\Models\books;
use App\Models\Comment;
use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;


class booksController extends Controller implements HasMiddleware

{
    public static function middleware(): array
    {
        return [
           
            new Middleware(IsAdmin::class, except: ['index','show']),
           
        ];
    }
    public function index()
    {
        $books = books::all();
        return view('books.tampil',data: ['books' =>$books]);
        
    }
    public function create(){
        $genres = genre::all();
        return view('books.tambah', ['genres' => $genres]);
    }
    public function store(Request $request){
        $request -> validate([
        'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        'title' => 'required',
        'summary' => 'required',
        'stock' => 'required',
        'genre_id' => 'required'
        ]);
        
        $newimagename = time().'.'.$request->image->extension();  
         
        $request->image->move(public_path('image'),  $newimagename);

        $books = new books;
        $books -> title =$request-> input('title');
        $books -> summary =$request-> input('summary');
        $books -> stock =$request-> input('stock');
        $books -> genre_id =$request-> input('genre_id');
        $books -> image =$newimagename;

        $books->save(); 
        return redirect('/books');
    }
    
    public function show(string $id)
    {
        $books = books::find($id);
        return view('books.detail', ["books" => $books]);

}
    public function edit(string $id){
        $genre = genre::all();
        $books = books::find($id);
        return view('books.edit', ['books'=>$books, 'genre' =>$genre]);

    }
    public function update(Request $request, string $id){
        $request->validate([
        'image' => 'mimes:jpg,jpeg,png|max:2048',
        'title' => 'required',
        'summary' => 'required',
        'stock' => 'required',
        'genre_id' => 'required'
        ]);
        $books = books::find($id);

        if($request->has ('image')){
            File::delete('image/'. $books->image);

        $newimagename = time().'.'.$request->image->extension();  
         
        $request->image->move(public_path('image'),  $newimagename);
        
        $books->image= $newimagename;
        }
        $books->title =$request->input('title');
        $books->summary =$request->input('summary');
        $books->stock =$request->input('stock');
        $books->genre_id =$request->input('genre_id');

     $books->save();
       return redirect('/books');
    }
    public function commemts(Request $request, $book_id){
        $request->validate([
            'content' => 'mimes:jpg,jpeg,png|max:2048',
            ]);
            $userId= Auth::id();

            $comment = new Comment;
            $comment->content = $request->input('content');
            $comment->user_id = $userId;
            $comment->book_id = $book_id;

            $comment->save();
    
    return redirect('/books/'. $book_id);
}
public function destroy(string $id)
{
    $book = books::findOrFail($id);

   
    $book->comments()->delete();

    
    File::delete('image/' . $book->image);

    
    $book->delete();

    return redirect('/books')->with('success', 'Buku dan komentarnya berhasil dihapus.');
}


}
