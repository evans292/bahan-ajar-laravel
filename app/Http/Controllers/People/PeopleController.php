<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    //
    public function news()
    {
        $news = News::paginate(10);
        return view('people.news.index', compact('news'));
    }
}
