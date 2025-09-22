<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'status' => 'required|in:Y,N',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $work = new Work();
            $work->title = $validatedData['title'];
            $work->description = $validatedData['description'];
            $work->status = $validatedData['status'];
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/work-image'), $imageName);
                $work->image = $imageName;
            }
            $work->save();

            return redirect('/admin/work')->with('success', 'Created Successfully');
        }
        return view('admin.works.add');
    }
    public function edit(Request $request, $id)
    {
        $work = Work::find($id);

        if ($request->post()) {
            // $validatedData = $request->validate([
            //     'name' => ['required'],
            //     'destination' => ['required'],
            //     'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            // ]);
            $work->title = $request->title;
            $work->description = $request->description;
            $work->status = $request->status;
            if ($request->hasFile('image')) {
                if ($work->image && file_exists(public_path('work-image/' . $work->image))) {
                    unlink(public_path('work-image/' . $work->image));  // Delete the old image
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('work-image'), $imageName);
                $work->image = $imageName;
            }
            $work->save();
            return redirect('/admin/work')->with('success', 'Updated Successfully');
        }
        return view('admin.works.edit', compact('work'));
    }


    public function delete(Request $request, $id)
    {
        $work = Work::find($id);
        $work->delete();

        return redirect()->route('work')->with('success', 'Delete Successfully');
    }


    public function work()
    {
        $data = Work::get();
        return view('admin.works.index', compact('data'));
    }
}
