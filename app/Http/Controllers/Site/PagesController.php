<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Mail\contactForm;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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
            $blogs = Blog::latest()->take(2)->get();
        }

        return view($viewPath, compact('page', 'blogs'));
    }



    public function contactForm(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string',
        ]);
        $data = $validated;
        Mail::to('m.usman@ipscloud.co')
            ->send(new contactForm($data));
        return back()->with('success', 'Your message has been sent!');
    }
}
