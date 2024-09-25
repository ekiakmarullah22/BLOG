<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        //check if have ajax reques
        if(request()->ajax()) {
            $article = Article::with('Category')->where('user_id', $user_id)->latest()->get();

            return DataTables::of($article)
            ->addIndexColumn()
            ->addColumn('user_id', function($article) {
                return $article->User->name;
            })
            ->addColumn('category_id', function($article) {
                return $article->Category->title;
            })
            ->addColumn('status', function($article) {
                if ($article->status == 0) {
                    return '<span class="badge text-bg-danger">Private</span>';
                } else {
                    return '<span class="badge text-bg-success">Published</span>';
                }
                
            })
            ->addColumn('button', function($article) {
                return '<div class="text-center">
                            <a href="/articles/'.$article->id.'" class="btn btn-sm btn-secondary">Detail</a>
                            <a href="/articles/'.$article->id.'/edit" class="btn btn-sm btn-primary">Edit</a>
                            <a href="#" onclick="deleteArticle(this)" data-id="'.$article->id.'" class="btn btn-sm btn-danger">Delete</a>
                        </div>';
            })
            ->addColumn('title', function($article) {
                return Str::of($article->title)->limit(20, ' ...');
            })
            ->rawColumns(['user_id','category_id', 'status', 'button', 'title'])
            ->make();
        }

        return view('backend.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.article.create', [
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        //validate form
        $data = $request->validated();

        // set up image upload
        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/backEnd/', $fileName);

       
        // save image filename to database
        $data['img'] = $fileName;
        // set user_id
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']);
        
        // save all data to database
        Article::create($data);

        return redirect(url('articles'))->with('success', 'Data Article Has Been Created...');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('backend.article.show', [
            'article' => Article::with(['User','Category'])->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('backend.article.update', [
            'article' => Article::find($id),
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        //
        //validate form
        $data = $request->validated();

        // check uploaded new image
        if ($request->hasFile('img')) {
            // set up image upload
            $file = $request->file('img');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/backEnd/', $fileName);

            // delete old image from storage
            Storage::delete('public/backEnd/'.$request->oldImage);

            
            // save image filename to database
            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImage;
        }

        // set user_id
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']);

        Article::find($id)->update($data);

        return redirect(url('articles'))->with('success', 'Data Article Has Been Updated...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Article::find($id);
        Storage::delete('public/backEnd/'.$data->img);
        $data->delete();

        return response()->json([
            'message' => "Data Article Has Been Deleted..."
        ]);
    }
}
