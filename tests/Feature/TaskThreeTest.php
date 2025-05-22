<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskThreeTest extends TestCase
{
    use RefreshDatabase;

    public function testCanDeleteAuthor(): void
    {
        // Create an author with no books
        $author = Author::factory()->create();
        
        // Try to delete the author
        $response = $this->delete(route('authors.destroy', $author));
        
        // Assert the response and database state
        $response->assertStatus(200);
        $this->assertDatabaseCount('authors', 0);
    }

    public function testCannotDeleteAuthorWithBooks(): void
    {
        // Create an author with a book
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);
        
        // Try to delete the author
        $response = $this->delete(route('authors.destroy', $author));
        
        // Assert the response and database state
        $response->assertStatus(409); // Conflict
        $this->assertDatabaseHas('authors', ['id' => $author->id]);
        $this->assertDatabaseHas('books', ['id' => $book->id]);
    }
}
