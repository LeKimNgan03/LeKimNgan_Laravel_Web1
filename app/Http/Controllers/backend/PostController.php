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
            ->paginate(5);
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
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $list = Post::where('post.id', '=', $id)
            ->join('topic', 'topic.id', '=', 'post.topic_id')
            ->select('post.id', 'post.title', 'post.image', 'topic.name as topicname', 'post.slug', 'post.type', 'post.detail', 'post.description')
            ->orderBy('post.created_at', 'desc')
            ->get();
        return view('backend.post.show', compact('list'));
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
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->delete();
        toastr()->success('Bạn xóa dữ liệu thành công!');
        return redirect()->route('admin.post.trash');
    }

    public function trash()
    {
        $list = Post::where('post.status', '=', 0)
            ->join('topic', 'topic.id', '=', 'post.topic_id')
            ->select('post.id', 'topic.name as topic_name', 'post.title', 'post.image', 'post.detail', 'post.description')
            ->orderBy("post.created_at", "DESC")
            ->get();
        return view('backend.post.trash', compact('list'));
    }

    public function delete(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->status = 0; //form
        $post->save();
        toastr()->success('Bạn xóa dữ liệu thành công!');
        return redirect()->route('admin.post.index');
    }

    public function restore(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->status = 2; //form
        $post->save();
        toastr()->success('Bạn khôi phục dữ liệu thành công!');
        return redirect()->route('admin.post.index');
    }

    public function status(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->status = ($post->status == 1) ? 2 : 1; //form
        $post->save();
        toastr()->success('Bạn thay đổi trạng thái thành công!');
        return redirect()->route('admin.post.index');
    }
}
