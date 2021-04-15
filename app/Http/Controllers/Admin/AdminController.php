<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function newsIndex()
    {
        $news = News::paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function newsCreate()
    {
        return view('admin.news.create');
    }

    public function newsStore(Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'contents' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $datetime = new DateTime();
        $picture = $request->file('pic');
        $pictureUrl = $picture->storeAs("images/news", "{$datetime->format('Y-m-d-s')} - {$picture->getClientOriginalName()}");
        
        News::create([
            'title' => $request->title,
            'contents' => $request->contents,
            'pic' => $pictureUrl,
            'user_id' => Session::get('user_id')
        ]);

        return redirect()->route('news.index');
    }

    public function newsShow(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function newsEdit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function newsUpdate(Request $request, News $news) 
    {
        $request->validate([
            'title' => 'required',
            'contents' => 'required',
            'pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $datetime = new DateTime();

        $picture = $request->file('pic');
        $pictureUrl = null;
        if ($picture !== null) {
            # code...
            Storage::delete($news->pic);
            $pictureUrl = $picture->storeAs("images/news", "{$datetime->format('Y-m-d-s')} - {$picture->getClientOriginalName()}");
        } else {
            $pictureUrl = $news->pic;
        }
        
        $news->update([
            'title' => $request->title,
            'contents' => $request->contents,
            'pic' => $pictureUrl,
            'user_id' => Session::get('user_id')
        ]);

        return redirect()->route('news.index');
    }

    public function newsDelete(News $news)
    {
        Storage::delete($news->pic);
        $news->delete();

        return redirect()->route('news.index');
    }
}
