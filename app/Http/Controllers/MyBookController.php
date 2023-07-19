<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class MyBookController extends Controller
{
    public function book(){
        $books = Book::all();
        
        return view('book.index', compact('books'));
    }

    public function create(){

        return view('book.create');
        // $bookArray = [
        //     [
        //         'Назва_книги' => 'Гарри Поттер',
        //         'Жанр' => 'Фентезі',
        //         'Автор' => 'Дж.Роуглинг',
        //         'Назва_видавництва' => 'Абабагаламага'
        //     ],[
        //         'Назва_книги' => 'Тореадори з Васюківки',
        //         'Жанр' => 'Комедія',
        //         'Автор' => 'В.Нестайко',
        //         'Назва_видавництва' => 'Абабагаламага'
        //     ],[
        //         'Назва_книги' => 'Венок з Лотоса',
        //         'Жанр' => 'Детектив',
        //         'Автор' => 'Дж.Чейз',
        //         'Назва_видавництва' => 'Абабагаламага'
        //     ]
        // ];

        // foreach($bookArray as $item){
        //     Book::create($item);
        // }

        // dd('created');
    }
    
    public function store(){
        $data = request()->validate([           //------НУЖНО ДЛЯ ОТПРАВКИ ДАННЫХ В БД ИЗ ФОРМЫ
            'Назва_книги'=> 'string',
            'Жанр'=> 'string',
            'Автор'=> 'string',
            'Назва_видавництва'=> 'string',
        ]);
        Book::create($data);

        return redirect()->route('book.index');
    }

    public function show(Book $book){          //  ---------------НУЖНО ДЛЯ ПОКАЗА ОПРЕДЕЛЕННЫХ ДАННЫХ ИЗ БД
        return view('book.show', compact('book'));
    }

    public function edit(Book $book){          
        return view('book.edit', compact('book'));
    }

    public function update(Book $book){          
        $data = request()->validate([           
            'Назва_книги'=> 'string',
            'Жанр'=> 'string',
            'Автор'=> 'string',
            'Назва_видавництва'=> 'string',
        ]);
        $book->update($data);
        return redirect()->route('book.show', $book->id);
    }

    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('book.index');
    }


    public function delete(){
        $book = Book::withTrashed()->find(3);
        $book->restore();
    }

    public function firstOrCreate(){
        $book = Book::firstOrCreate([
            'Назва_книги' => 'Венок з Лилий'
        ],[
            'Назва_книги' => 'Венок з Лилий',
            'Жанр' => 'Детектив',
            'Автор' => 'Дж.Чейз',
            'Назва_видавництва' => 'Абабагаламага'
        ]);

        dump($book->Назва_книги);
        dd('finished');
    }

    public function updateOrCreate(){
        $book = Book::updateOrCreate([
            'Назва_книги' => 'Ура'
        ],[
            'Назва_книги' => 'Ура',
            'Жанр' => 'Драма',
            'Автор' => 'Дж.Мейз',
            'Назва_видавництва' => 'Протто23'
        ]);

        dump($book->Назва_книги);
        dd('finished');
    }
}
