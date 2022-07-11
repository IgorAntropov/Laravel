<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;

class MainController extends Controller
{
    private $table_name = 'post_models';

    public function home() {
        $posts = $this->get_filtered_posts();

        return view('home', ['posts' => $posts, 'home_page' => true]);
    }

    public function posts() {
        $posts = $this->get_filtered_posts();

        return view('posts', ['posts' => $posts]);
    }

    private function get_filtered_posts() {
        $now_date = new DateTime("now", new \DateTimeZone('Asia/Tomsk'));

        $posts = DB::table($this->table_name)
            ->whereDate('startDate', '<=', $now_date)
            ->whereDate('endDate', '>=', $now_date)
            ->where('privacy', '=', 'on')
            ->get();

        return $posts;
    }

    public function post_add(Request $request) {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'startDate' => 'required',
            'endDate' => 'required'
        ]);

        $slug = bin2hex(random_bytes(5));

        $posts_model = new PostModel();
        $posts_model->slug = $slug;
        $posts_model->name = $request->input('name');
        $posts_model->message = $request->input('message');
        $posts_model->startDate = $request->input('startDate');
        $posts_model->endDate = $request->input('endDate');
        $posts_model->privacy = $request->input('privacy');
        $posts_model->save();

        return redirect()->route('posts');
    }

    public function post_open($slug, $id) {
        $posts = DB::table($this->table_name)
            ->latest()
            ->limit(10)
            ->get();
        $post = DB::table($this->table_name)
            ->where('id', '=', $id)
            ->get()[0];

        return view('details', ['posts' => $posts, 'post' => $post]);
    }
}
