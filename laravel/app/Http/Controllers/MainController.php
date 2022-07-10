<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MainController extends Controller
{
    public function home() {
        $news = new PostModel();

        return view('home', ['news' => $news->all()]);
    }

    public function news() {
        $news = new PostModel();

        return view('news', ['news' => $news->all()]);
    }

    public function news_add(Request $request) {
        $validate = $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $news = new PostModel();
        $news->email = $request->input('email');
        $news->subject = $request->input('subject');
        $news->message = $request->input('message');
        $news->startDate = $request->input('startDate');
        $news->endDate = $request->input('endDate');
        $news->privacy = $request->input('privacy');
        $news->save();

        Artisan::call('update:slug');

        return redirect()->route('news');
    }

    public function news_id($slug, $id) {
        $news = new PostModel();
        $new = $news->where('id', $id)->get();

        return view('home', ['news' => $new]);
    }
}
