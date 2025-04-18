<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class PagesController extends Controller
{
    public function show($slug = '/')
    {
        $page = Page::where(function ($query) use ($slug) {
            $query->where('slug', $slug)
                ->orWhere('slug', '/' . $slug);
        })->where('status', 'published')->first();

        if (!$page) {
            abort(404);
        }

        $viewPath = $page->view_path;
        if (!view()->exists($viewPath)) {
            abort(404);
        }
        
          $blogs = '';
        if ($slug == '/') {
            $blogs = Blog::latest()->get();
        }

        return view($viewPath, compact('page', 'blogs'));
    }
}
