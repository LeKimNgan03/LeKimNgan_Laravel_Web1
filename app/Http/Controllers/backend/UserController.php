<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.user.index', compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = User::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.user.create', compact("list"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone =  $request->phone;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->roles = $request->roles;
        $user->remember_token = $request->remember_token;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1;
        $user->status = $request->status;
        // Upload Image
        if ($request->image) {
            if (in_array($request->image->extension(), ["jpg", "png", "jpeg", "gif"])) {
                $fileName = $user->name . '.' . $request->image->extension();
                $request->image->move(public_path("images/user"), $fileName);
                $user->image = $fileName;
            }
        }
        $user->save();
        toastr()->success('Bạn thêm dữ liệu thành công!');
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $list = User::where('id', '=', $id)->orderBy('created_at', 'desc')->get();
        return view("backend.user.show", compact("list"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $list = User::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.user.edit', compact("list"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            // Chuyển hướng trang và báo lỗi
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone =  $request->phone;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->roles = $request->roles;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1;
        $user->status = $request->status;
        // Upload Image
        if ($request->image) {
            if (in_array($request->image->extension(), ["jpg", "png", "jpeg", "gif"])) {
                $fileName = $user->name . '.' . $request->image->extension();
                $request->image->move(public_path("images/user"), $fileName);
                $user->image = $fileName;
            }
        }
        $user->save();
        toastr()->success('Bạn chỉnh sửa dữ liệu thành công!');
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->delete();
        toastr()->success('Xóa khỏi CSDL thành công!');
        return redirect()->route('admin.user.trash');
    }

    public function trash()
    {
        $list = User::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.user.trash", compact("list"));
    }

    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->status = 0;
        $user->save();
        toastr()->success('Xóa vào thùng rác thành công!');
        return redirect()->route('admin.user.index');
    }

    public function restore(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->status = 2;
        $user->save();
        toastr()->success('Khôi phục thành công!');
        return redirect()->route('admin.user.trash');
    }

    public function status(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->status = ($user->status == 1) ? 2 : 1;
        $user->save();
        toastr()->success('Thay đổi trạng thái thành công!');
        return redirect()->route('admin.user.index');
    }
}
