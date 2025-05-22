<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            // Store the file
            $file->storeAs('public/books', $fileName);
            
            // Update the book record
            $book->update(['filename' => $fileName]);
            
            return response()->json(['message' => 'File uploaded successfully']);
        }
        
        return response()->json(['message' => 'No file provided'], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Delete the associated file if it exists
        if ($book->filename) {
            Storage::delete('public/books/' . $book->filename);
        }
        
        // Force delete the book
        $book->forceDelete();
        
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
