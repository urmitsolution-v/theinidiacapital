<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function createfaq(Request $request)
    {
        if ($request->post()) {
            $validatedData = $request->validate([
                'title' => ['required'],
                // 'description' => ['required'],
            ]);

            $new = new Faq();
            $new->title = $request->title;
            $new->description = $request->description;
            $new->status = $request->status;
            $new->save();
            return redirect('/admin/faq')->with('success', 'Created Successfully');
        }
        return view('admin.Faq.add');
    }




    public function editfaq(Request $request, $id)
    {
        $row = Faq::find($id);

        if ($request->post()) {
            // $validatedData = $request->validate([
            //     'title' => ['required'],
            //     // 'description' => ['required'],
            // ]);

            $row->title = $request->title;
            $row->description = $request->description;
            $row->status = $request->status;
            $row->save();
            return redirect('/admin/faq')->with('success', 'Update Successfully');
        }
        return view('admin.Faq.edit', compact('row'));
    }

    public function delete(Request $request, $id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->route('faq')->with('success', 'Delete Successfully');
    }



    public function faq(Request $request){
        $data = Faq::get();
        return view('admin.Faq.index', compact('data'));
    }
}
