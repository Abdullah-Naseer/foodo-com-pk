<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Mail\contactForm;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RalphJSmit\Laravel\SEO\Support\SEOData;

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

        return view($viewPath, [
            'SEOData' => new SEOData(
                title: $page->meta_title ?? $page->title,
                description: $page->meta_description,
            ),
            'blogs' => $blogs
        ]);
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
        try {
            Mail::to('info@foodo.com.pk')
                ->send(new contactForm($data));
            return back()->with('success', 'Your message has been sent!');
        } catch (\Exception $e) {
            Log::error('Email failed to send: ' . $e->getMessage());
            return back()->with('success', 'Your message has been sent!');
        }
    }
}
