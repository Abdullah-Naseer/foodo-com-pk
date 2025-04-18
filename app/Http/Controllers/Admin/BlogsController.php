<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogsRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\{
    LogActivity,
    Common
};
use App\Http\Requests\UpdateBlogsRequest;
use App\Traits\HasDataTables;

class BlogsController extends Controller
{
    use HasDataTables;
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $trash = $request->get("trash");
            $query = Blog::latest();
            $query = $trash == "true" ? $query->onlyTrashed() : $query;
            return $this->dataTable($query, 'blogs', function ($dataTable) {
                $dataTable->addColumn('category', function ($blog) {
                    return $blog->category->name ?? '';
                });
            });
        }
        return view("admin.blogs.index");
    }


    public function create()
    {
        $categories = Category::all();
        return view("admin.blogs.edit", compact("categories"));
    }


    public function store(StoreBlogsRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->slug) ?: Str::slug($request->title);
        $blog->category_id = $request->category_id;
        $blog->content = $request->content;

        if ($request->hasFile('image')) {
            $blog->image = Common::uploadMedia($request->file('image'), '/blogs/images');
        }

        $blog->user_id = auth()->id();
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->save();

        LogActivity::addToLog('blog', 'insert', $blog, null);

        if ($request->filled('tags')) {
            $tags = explode(',', $request->tags);
            $tagIds = [];
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(
                    ['slug' => Str::slug($tagName)],
                    ['name' => $tagName]
                );
                $tagIds[] = $tag->id;
            }
            $blog->tags()->sync($tagIds);

            LogActivity::addToLog('tags', 'insert', $tagIds, null);
        }

        return response()->json([
            'success' => true,
            'message' => 'Blog successfully created.',
            'redirect' => route('admin.blogs.index'),
        ]);
    }


    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view("admin.blogs.edit", compact("categories", 'blog'));
    }


    public function update(UpdateBlogsRequest $request, Blog $blog)
    {
        $data = $request->except("tags");

        $changes_exist = Common::get_changes($blog, $data);
        if($changes_exist){


            $blog->title = $request->title;
            $blog->slug = Str::slug($request->slug) ?: Str::slug($request->title);
            $blog->category_id = $request->category_id;
            $blog->content = $request->content;

            if ($request->hasFile('image')) {
                $blog->deleteImage();
                $blog->image = Common::uploadMedia($request->file('image'), '/blogs/images');
            }

            $blog->meta_description = $request->meta_description;
            $blog->meta_title = $request->meta_title;
            $blog->meta_keywords = $request->meta_keywords;

            $blog->update();
            LogActivity::addToLog('blog', 'update', null, $changes_exist);
        }


        if ($request->tags != null) {
            $tag_ids = [];
            $tags = explode(',', $request->tags);

            foreach ($tags as $item) {
                $item = trim($item);
                $tag = Tag::firstOrCreate([
                    'slug' => Str::slug($item, '-')
                ], [
                    'name' => $item
                ]);

                $tag_ids[] = $tag->id;
            }

            if (!empty($tag_ids)) {
                $blog->tags()->sync($tag_ids);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Blog successfully updated.',
            'redirect' => route('admin.blogs.index'),
        ]);
    }

    public function destroy(Blog $blog)
    {

        $blog->delete();
        return response()->json([
            'success' => true,
            'message' => 'Menu successfully deleted.',
        ]);
    }
}
