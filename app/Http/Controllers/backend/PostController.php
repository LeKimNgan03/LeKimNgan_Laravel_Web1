<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Post::where('post.status', '!=', 0)
            ->join('topic', 'topic.id', '=', 'post.topic_id')
            ->select('post.id', 'post.title', 'post.image', 'topic.name as topicname', 'post.slug')
            ->orderBy('post.created_at', 'desc')
            ->get();
        return view('backend.post.index', compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'asc')->get();
        $htmltopicid = "";
        foreach ($list_topic as $item) {
            $htmltopicid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
        }
        return view('backend.post.create', compact("htmltopicid"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->topic_id = $request->topic_id; //form
        $post->title = $request->title; //form
        $post->slug = Str::of($request->title)->slug('-'); //form
        $post->detail = $request->detail; //form
        $post->type = $request->type; //form
        $post->description = $request->description; //form
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;
        $post->status = $request->status; //form
        // Upload Image
        if ($request->image) {
            if (in_array($request->image->extension(), ["jpg", "png", "jpeg", "gif"])) {
                $fileName = $post->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/post"), $fileName);
                $post->image = $fileName;
            }
        }
        $post->save(); //Lưu
        toastr()->success('Bạn thêm dữ liệu thành công!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'asc')->get();
        $htmltopicid = "";
        foreach ($list_topic as $item) {
            if ($post->topic_id == $item->id) {
                $htmltopicid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            } else {
                $htmltopicid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
        }
        return view("backend.post.edit", compact("post", "htmltopicid"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $post->topic_id = $request->topic_id; //form
        $post->title = $request->title; //form
        $post->slug = Str::of($request->title)->slug('-'); //form
        $post->detail = $request->detail; //form
        $post->type = $request->type; //form
        $post->description = $request->description; //form
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;
        $post->status = $request->status; //form
        // Upload Image
        if ($request->image) {
            if (in_array($request->image->extension(), ["jpg", "png", "jpeg", "gif"])) {
                $fileName = $post->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/post"), $fileName);
                $post->image = $fileName;
            }
        }
        $post->save(); //Lưu
        toastr()->success('Bạn thêm dữ liệu thành công!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
