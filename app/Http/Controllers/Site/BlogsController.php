<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class BlogsController extends Controller
{
    public function getIndex(Request $request)
    {
        $popular_tags = Tag::has('blogs', '>', 4)->get();
        $categories = Category::has('blogs')->take(10)->get();

        if ($request->slug != "") {
            $ex = explode('-', $request->slug);
            $c = count($ex);
            $rm = $c - 1;
            unset($ex[$rm]);
            $new = join('-', $ex);

            $checkId =  last(explode('-', $request->slug));
            if (is_numeric($checkId)) {
                return redirect()->route('site.blogs.index', ['slug' => $new]);
            }
            $slug =   Blog::where('slug', '=', $request->slug)->FirstOrFail();
            $blog_id = $slug->id;

            $blog = Blog::findOrFail($blog_id);

            $related_news = $blog->category->blogs()->where('id', '!=', $blog->id)->take(3)->get();
            $latest_news = Blog::where('id', '!=', $blog->id)->latest()->take(3)->get();

            return view(
                'site.blogs.blog-single',
                compact('blog', 'popular_tags', 'categories', 'related_news', 'latest_news')
                    + [
                        'SEOData' => new SEOData()
                    ]
            );
        }

        $currentUrl = $request->url();

        $blogs = Blog::OrderBy('created_at', 'desc')->paginate(6);
        $page = $this->getPage($request->url());

        return view(
            'site.blogs.index',
            compact('blogs', 'categories', 'page')
                + [
                    'SEOData' => new SEOData(
                        title: $page->title,
                        description: $page->meta_description,
                    )
                ]
        );
    }


    public function searchBlog(Request $request)
    {
        $q = $request->q;

        $blogs = Blog::where('title', 'LIKE', '%' . $request->q . '%')
            ->when($request->sort != '', function ($q) use ($request) {
                $q->orderBy('id', $request->sort);
            })
            ->paginate(10);
        $categories = Category::has('blogs')->get();
        $page = $this->getPage("blogs");

        return view('site.blogs.index', compact('blogs', 'q', 'categories', 'page'));
    }


    public function getByCategory(Request $request)
    {

        $category = Category::whereSlug(Str::Slug($request->category))->first();
        $categories = Category::has('blogs')->latest()->take(10)->get();

        if ($category != "") {
            $blogs = $category->blogs()->orderBy('id', 'desc')->paginate(6);
            $page = $this->getPage($request->url());

            return view('site.blogs.index', compact('category', 'blogs', 'categories', 'page'));
        }
        return abort(404);
    }


    private function getPage($currentUrl)
    {
        $page = Page::where('slug', basename($currentUrl))->where('status', 'published')->first();
        if (!$page) {
            abort(404);
        }
        return $page;
    }
}
