<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function reader(){
        $readers = Reader::find(1);
        dump($readers->ПІБ);
        dump($readers->Адреса_проживання);
        dump($readers->Телефон);
    }
}
