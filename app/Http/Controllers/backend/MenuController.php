<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Menu::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.menu.index', compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Menu::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $item) {
            $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            $htmlsortorder .= "<option value='" . $item->sort_order . "'>" . $item->name . "</option>";
        }
        return view('backend.menu.create', compact('list', 'htmlparentid', 'htmlsortorder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $menu = new Menu();
        $menu->name = $request->name; //form
        $menu->link = $request->link; //form
        // $menu->slug = Str::of($request->name)->slug('-'); //form
        $menu->parent_id = $request->parent_id; //form
        $menu->table_id = $request->table_id;
        $menu->sort_order = $request->sort_order; //form
        $menu->position = $request->position; //form
        $menu->type = $request->type; //form
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = Auth::id() ?? 1;
        $menu->status = $request->status; //form
        $menu->save(); //Lưu
        toastr()->success('Bạn thêm dữ liệu thành công!');
        return redirect()->route('admin.menu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $list = Menu::where('id', '=', $id)->orderBy('created_at', 'desc')->get();
        return view('backend.menu.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $list = Menu::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $item) {
            if ($menu->parent_id == $item->id) {
                $htmlparentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            } else {
                $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
            if ($menu->sort_order - 1 == $item->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view('backend.menu.edit', compact('menu', 'htmlparentid', 'htmlsortorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $menu->name = $request->name; //form
        $menu->link = $request->link; //form
        // $menu->slug = Str::of($request->name)->slug('-'); //form
        $menu->parent_id = $request->parent_id; //form
        $menu->table_id = $request->table_id;
        $menu->sort_order = $request->sort_order; //form
        $menu->position = $request->position; //form
        $menu->type = $request->type; //form
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = Auth::id() ?? 1;
        $menu->status = $request->status; //form
        $menu->save(); //Lưu
        toastr()->success('Bạn chỉnh sửa dữ liệu thành công!');
        return redirect()->route('admin.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->delete();
        toastr()->success('Xóa khỏi CSDL thành công!');
        return redirect()->route('admin.menu.trash');
    }

    public function trash()
    {
        $list = Menu::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.menu.trash", compact("list"));
    }

    public function delete(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        toastr()->success('Xóa vào thùng rác thành công!');
        return redirect()->route('admin.menu.index');
    }

    public function restore(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        toastr()->success('Khôi phục thành công!');
        return redirect()->route('admin.menu.trash');
    }

    public function status(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = ($menu->status == 1) ? 2 : 1;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        toastr()->success('Thay đổi trạng thái thành công!');
        return redirect()->route('admin.menu.index');
    }
}
