<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Contact::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.contact.index', compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Contact::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.contact.create', compact("list"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name; //form
        $contact->user_id = $request->user_id; //form
        $contact->email = $request->email; //form
        $contact->phone = $request->phone; //form
        $contact->title = $request->title; //form
        $contact->content = $request->content; //form
        $contact->reply_id = $request->reply_id; //form
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->created_by = Auth::id() ?? 1;
        // $contact->status = $request->status; //form
        $contact->save(); //Lưu
        toastr()->success('Bạn đã gửi thông tin liên hệ thành công!');
        return redirect()->route('site.contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $list = Contact::where('id', '=', $id)->orderBy('created_at', 'desc')->get();
        return view('backend.contact.show', compact("list"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->delete();
        toastr()->success('Xóa khỏi CSDL thành công!');
        return redirect()->route('admin.contact.trash');
    }

    public function trash()
    {
        $list = Contact::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.contact.trash", compact("list"));
    }

    public function delete(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->status = 0; //form
        $contact->save();
        toastr()->success('Bạn xóa dữ liệu thành công!');
        return redirect()->route('admin.contact.index');
    }

    public function restore(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->status = 2; //form
        $contact->save();
        toastr()->success('Bạn khôi phục dữ liệu thành công!');
        return redirect()->route('admin.contact.index');
    }

    public function status(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->status = ($contact->status == 1) ? 2 : 1; //form
        $contact->save();
        toastr()->success('Bạn thay đổi trạng thái thành công!');
        return redirect()->route('admin.contact.index');
    }
}
