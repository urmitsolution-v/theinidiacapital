<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Studentszone;
use App\Models\Reels;

class Coursecontroller extends Controller
{
    public function categories()
    {
        if (isset($_GET['type']) && !empty($_GET['type'])) {
            $data = Category::where('type', $_GET['type'])->orderBy('id', 'desc')->paginate(10);
            return view('admin.categories.index', compact('data'));
        } else {
            abort(404);
        }
    }

    public function newcategories(Request $request)
    {
        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'title' => ['required'],
                'status' => ['required'],
            ]);

            $new = new Category;
            $new->title = $request->title;
            $new->status = $request->status;
            $new->type = $_GET['type'];
            $new->save();
            return redirect('/admin/categories?type=' . $_GET['type'])->with('success', 'Created Successfully');
        }
        if (isset($_GET['type']) && !empty($_GET['type'])) {

            return view('admin.categories.add');
        }
    }

    public function editategories(Request $request, $id)
    {
        $row = Category::find($id);

        if ($request->method() == "POST") {

            $validatedData = $request->validate([
                'title' => ['required'],
                'status' => ['required'],
            ]);

            $row->title = $request->title;
            $row->status = $request->status;
            $row->type = $_GET['type'];
            $row->save();
            return redirect('/admin/categories?type=' . $_GET['type'])->with('success', 'Updated Successfully');
        }
        if (isset($row)) {
            if (isset($_GET['type']) && !empty($_GET['type'])) {
                return view('admin.categories.edit', compact('row'));
            }
        } else {
            abort(404);
        }
    }

    public function courses()
    {
        return view('superadmin.courses.index');
    }

    public function newcourse(Request $request)
    {
        return view('superadmin.courses.add');
    }

    public function showreels(Request $request)
    {
        $data = Reels::orderBy('id', 'desc')->paginate(10);
        return view('superadmin.reels.index', compact('data'));
    }

    public function newreel(Request $request)
    {
        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'yt_video' => ['required', 'url'],
            ]);

            $reels = new Reels;
            $reels->yt_video = $request->yt_video;
            $reels->save();
            return redirect('/admin/show-reels')->with('success', 'Created Successfully');
        }
        return view('superadmin.reels.add');
    }


    public function editreels(Request $request, $id)
    {
        $reels = Reels::findOrFail($id);
        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'yt_video' => ['required', 'url'],
            ]);

            $reels->yt_video = $request->yt_video;
            $reels->save();
            return redirect('/admin/show-reels')->with('success', 'Created Successfully');
        }
        return view('superadmin.reels.edit', compact('reels'));
    }


    public function students_zone(Request $request)
    {
        $data = Studentszone::orderBy('id', 'desc')->paginate(10);
        return view('superadmin.students.index', compact('data'));
    }

    public function new_student(Request $request)
    {
        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'name' => ['required'],
                'short_description' => ['required'],
                'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);

            $student = new Studentszone;
            $student->name = $request->name;
            $student->short_description = $request->short_description;
            if ($request->image) {
                $student->image = uploadImage($request->image, $student, 'image');
            }
            $student->save();
            return redirect('/admin/student-zone')->with('success', 'Created Successfully');
        }
        return view('superadmin.students.add');
    }


    public function editstudent(Request $request, $id)
    {
        $student = Studentszone::findOrFail($id);

        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'name' => ['required'],
                'short_description' => ['required'],
                'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);

            $student->name = $request->name;
            $student->short_description = $request->short_description;
            if ($request->image) {
                $student->image = updateImage($request->image, $student, 'image');
            }
            $student->save();
            return redirect('/admin/student-zone')->with('success', 'Update Successfully');
        }
        return view('superadmin.students.edit', compact('student'));
    }
}
