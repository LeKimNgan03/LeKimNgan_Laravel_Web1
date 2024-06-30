<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.banner.index', compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Banner::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlsortorder = "";
        $htmlposition = "";
        foreach ($list as $item) {
            $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            $htmlposition .= "<option value='" . $item->id . "'>" . $item->position . "</option>";
        }
        return view('backend.banner.create', compact('list', 'htmlsortorder', 'htmlposition'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name; //form
        // $banner->slug = Str::of($request->name)->slug('-'); //form
        $banner->link = $request->link; //form
        $banner->sort_order = $request->sort_order; //form
        $banner->position = $request->position; //form
        $banner->description = $request->description; //form
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1;
        $banner->status = $request->status; //form
        // Upload Image
        if ($request->image) {
            if (in_array($request->image->extension(), ["jpg", "png", "jpeg", "gif"])) {
                $fileName = $banner->name . '.' . $request->image->extension();
                $request->image->move(public_path("images/banner"), $fileName);
                $banner->image = $fileName;
            }
        }
        $banner->save(); //Lưu
        toastr()->success('Bạn thêm dữ liệu thành công!');
        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $list = Banner::where('id', '=', $id)->orderBy('created_at', 'desc')->get();
        return view("backend.banner.show", compact("list"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $list = Banner::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlsortorder = "";
        $htmlposition = "";
        foreach ($list as $item) {
            if ($banner->parent_id == $item->id) {
                $htmlposition .= "<option selected value='" . $item->id . "'>" . $item->position . "</option>";
            } else {
                $htmlposition .= "<option value='" . $item->id . "'>" . $item->position . "</option>";
            }

            if ($banner->sort_order - 1 == $item->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.banner.edit", compact("banner", "htmlsortorder", 'htmlposition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $banner->name = $request->name; //form
        // $banner->slug = Str::of($request->name)->slug('-'); //form
        $banner->link = $request->link; //form
        $banner->sort_order = $request->sort_order; //form
        $banner->position = $request->position; //form
        $banner->description = $request->description; //form
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1;
        $banner->status = $request->status; //form
        // Upload Image
        if ($request->image) {
            if (in_array($request->image->extension(), ["jpg", "png", "jpeg", "gif"])) {
                $fileName = $banner->name . '.' . $request->image->extension();
                $request->image->move(public_path("images/banner"), $fileName);
                $banner->image = $fileName;
            }
        }
        $banner->save(); //Lưu
        toastr()->success('Bạn chỉnh sửa dữ liệu thành công!');
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->delete();
        toastr()->success('Bạn xóa dữ liệu thành công!');
        return redirect()->route('admin.banner.trash');
    }

    public function trash()
    {
        $list = Banner::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.banner.trash", compact("list"));
    }

    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->status = 0; //form
        $banner->save();
        toastr()->success('Bạn xóa dữ liệu thành công!');
        return redirect()->route('admin.banner.index');
    }

    public function restore(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->status = 2; //form
        $banner->save();
        toastr()->success('Bạn khôi phục dữ liệu thành công!');
        return redirect()->route('admin.banner.index');
    }

    public function status(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->status = ($banner->status == 1) ? 2 : 1; //form
        $banner->save();
        toastr()->success('Bạn thay đổi trạng thái thành công!');
        return redirect()->route('admin.banner.index');
    }
}
