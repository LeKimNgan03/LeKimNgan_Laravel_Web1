<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.index', compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Topic::where('status', '!=', 0)->orderBy("created_at", "desc")->get();
        return view("backend.topic.create", compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name; //form
        $topic->slug = Str::of($request->name)->slug('-'); //form
        $topic->description = $request->description; //form
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1;
        $topic->status = $request->status; //form
        $topic->save(); //Lưu
        toastr()->success('Bạn thêm dữ liệu thành công!');
        return redirect()->route('admin.topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $list = Topic::where('id', '=', $id)->orderBy("created_at", "DESC")->get();
        return view("backend.topic.show", compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $list = Topic::where('status', '!=', 0)->orderBy("created_at", "desc")->get();
        return view("backend.topic.edit", compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $topic->name = $request->name; //form
        $topic->slug = Str::of($request->name)->slug('-'); //form
        $topic->description = $request->description; //form
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1;
        $topic->status = $request->status; //form
        $topic->save(); //Lưu
        toastr()->success('Bạn chỉnh sửa dữ liệu thành công!');
        return redirect()->route('admin.topic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->delete();
        toastr()->success('Bạn xóa dữ liệu thành công!');
        return redirect()->route('admin.topic.trash');
    }

    public function trash()
    {
        $list = Topic::where('status', '=', 0)->orderBy("created_at", "DESC")->get();
        return view("backend.topic.trash", compact('list'));
    }

    public function delete(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->status = 0; //form
        $topic->save();
        toastr()->success('Bạn xóa dữ liệu thành công!');
        return redirect()->route('admin.topic.index');
    }

    public function restore(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->status = 2; //form
        $topic->save();
        toastr()->success('Bạn khôi phục dữ liệu thành công!');
        return redirect()->route('admin.topic.index');
    }

    public function status(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->status = ($topic->status == 1) ? 2 : 1; //form
        $topic->save();
        toastr()->success('Bạn thay đổi trạng thái thành công!');
        return redirect()->route('admin.topic.index');
    }
}
