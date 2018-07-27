<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Author;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample penulis

        $author1 = Author::create(['name'=>'Mohammad Fauzil Adhim']);
        $author2 = Author::create(['name'=>'Salim A. Fillah']);
        $author3 = Author::create(['name'=>'Aam Amiruddin']);

        // sample buku
        $book1 = Book::create(['title'=>'Kupinang Engkau dengan Ar-rahman','amount'=>3, 'author_id'=>$author1->id]);
        $book2 = Book::create(['title'=>'Jalan Cinta Para Pejuang','amount'=>2, 'author_id'=>$author2->id]);
        $book3 = Book::create(['title'=>'Mengaji untuk Negeri','amount'=>4, 'author_id'=>$author3->id]);
        $book4 = Book::create(['title'=>'Jalan Santri Mencari Nasi','amount'=>3, 'author_id'=>$author3->id]);
    }
}
