<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $item) {
            $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
        }
        return view('backend.category.index', compact("list", "htmlparentid", "htmlsortorder"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name; //form
        $category->slug = Str::of($request->name)->slug('-'); //form
        $category->parent_id = $request->parent_id; //form
        $category->sort_order = $request->sort_order; //form
        $category->description = $request->description; //form
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;
        $category->status = $request->status; //form
        // Upload Image
        if ($request->image) {
            if (in_array($request->image->extension(), ["jpg", "png", "jpeg", "gif"])) {
                $fileName = $category->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/categories"), $fileName);
                $category->image = $fileName;
            }
        }
        $category->save(); //Lưu
        toastr()->success('Bạn thêm dữ liệu thành công!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $list = Category::where('id', '=', $id)->orderBy('created_at', 'desc')->get();
        return view('backend.category.show', compact("list"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $list = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $item) {
            if ($category->parent_id == $item->id) {
                $htmlparentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            } else {
                $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
            if ($category->sort_order - 1 == $item->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.category.edit", compact("category", "htmlparentid", "htmlsortorder"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $category->name = $request->name; //form
        $category->slug = Str::of($request->name)->slug('-'); //form
        $category->parent_id = $request->parent_id; //form
        $category->sort_order = $request->sort_order; //form
        $category->description = $request->description; //form
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;
        $category->status = $request->status; //form
        // Upload Image
        if ($request->image) {
            if (in_array($request->image->extension(), ["jpg", "png", "jpeg", "gif"])) {
                $fileName = $category->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/categories"), $fileName);
                $category->image = $fileName;
            }
        }
        $category->save();
        toastr()->success('Bạn chỉnh sửa dữ liệu thành công!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->delete();
        toastr()->success('Xóa khỏi CSDL thành công!');
        return redirect()->route('admin.category.trash');
    }

    public function trash()
    {
        $list = Category::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.category.trash", compact("list"));
    }

    public function delete(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->status = 0; //form
        $category->save();
        toastr()->success('Bạn xóa dữ liệu thành công!');
        return redirect()->route('admin.category.index');
    }

    public function restore(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->status = 2; //form
        $category->save();
        toastr()->success('Bạn khôi phục dữ liệu thành công!');
        return redirect()->route('admin.category.index');
    }

    public function status(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->status = ($category->status == 1) ? 2 : 1; //form
        $category->save();
        toastr()->success('Bạn thay đổi trạng thái thành công!');
        return redirect()->route('admin.category.index');
    }
}
