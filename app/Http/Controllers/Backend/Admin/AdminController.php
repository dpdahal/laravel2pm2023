<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\AdminGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class AdminController extends Controller
{
    private $backendPath = 'backend.';
    protected $backendPagePath = 'backend.pages.';


    public function index()
    {
        $authId = Auth::guard('admin')->user()->id;
        $adminData = Admin::where('id', '!=', $authId)->orderBy('id', 'desc')->paginate(4);
        return view($this->backendPagePath . 'admin.index', compact('adminData'));
    }


    public function create()
    {
        return view($this->backendPagePath . 'admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'username' => 'required|min:3|max:100|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|max:100',
            'password_confirmation' => 'required|same:password',
            'gender' => 'required',
            'role' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $response = Admin::create($data);
        if ($response) {
            if ($request->hasFile('image')) {
                $insertData['admin_id'] = $response->id;;
                $insertData['image'] = $this->singleFileUpload('uploads/admins');
                AdminGallery::create($insertData);
                return redirect()->route('admin.index')->with('success', 'Admin created successfully');

            } else {
                return redirect()->route('admin.index')->with('success', 'Admin created successfully');

            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    public function show($id)
    {
        $adminData = Admin::findOrFail($id);
        return view($this->backendPagePath . 'admin.show', compact('adminData'));

    }


    public function edit($id)
    {
        $adminData = Admin::findOrFail($id);
        return view($this->backendPagePath . 'admin.update', compact('adminData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'username' => 'required|unique:admins,username,' . $id . ',id',
            'email' => 'required|email|unique:admins,email,' . $id . ',id',
            'gender' => 'required',

        ]);

        $data = $request->all();
        $response = Admin::FindOrFail($id)->update($data);
        if ($response) {
            if ($request->hasFile('image')) {
                $insertData['admin_id'] = $id;
                $insertData['image'] = $this->singleFileUpload('uploads/admins');
                AdminGallery::create($insertData);
                return redirect()->route('admin.index')->with('success', 'Admin update successfully');

            } else {
                return redirect()->route('admin.index')->with('success', 'Admin update successfully');

            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


    public function destroy($id)
    {
        if (!Gate::allows('super_admin')) {
            return redirect()->back()->with('error', 'You are not authorized to access this page');
        }
        $findImage = AdminGallery::where('admin_id', '=', $id)->get();
        if ($findImage) {
            foreach ($findImage as $image) {
                $this->deleteFile($image->image);
            }
        }
        AdminGallery::where('admin_id', '=', $id)->delete();
        Admin::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Admin deleted successfully');
    }

    public function changePassword(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->backendPagePath . 'admin.change-password');
        }
        if ($request->isMethod('post')) {
            $adminUser = Auth::guard('admin')->user();
            $oPass = $adminUser->password;
            $this->validate($request, [
                'old_password' => 'required|old_password:' . $oPass,
                'password' => 'required|min:6|max:100',
                'password_confirmation' => 'required|same:password',
            ], [

                'old_password.old_password' => 'old password  not match'
            ]);

            $data = $request->only('password');
            $data['password'] = bcrypt($request->password);
            if ($adminUser->update($data)) {
                return redirect()->back()->with('success', 'Password changed successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }

        }

        return redirect()->back()->with('error', 'Something went wrong');

    }
}
