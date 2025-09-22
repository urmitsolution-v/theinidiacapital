<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Models\Enquiry;
use App\Models\Events;
use App\Models\Blogmodel;
use Illuminate\Support\Str;


class Blogs extends Controller
{
    public function events(){
        $data['blog'] = Events::orderBy('id', 'desc')->get();
        return view('admin.events.index', $data);
    }

    public function new_event(Request $request) {
        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'title' => ['required'],
                'short_description' => ['required'],
                'meta_title' => ['required'],
                'meta_tags' => ['required'],
                'location' => ['required'],
                'date' => ['required'],
                'start_time' => ['required'],
                'end_time' => ['required'],
                'meta_description' => ['required'],
                'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);

            $events = new Events;
            $events->title = $request->title;
            $events->slug = Str::slug($request->title,'-');
            $events->short_description = $request->short_description;
            $events->description = $request->description;
            $events->location = $request->location;
            $events->date = $request->date;
            $events->start_time = $request->start_time;
            $events->end_time = $request->end_time;
            $events->meta_title = $request->meta_title;
            $events->meta_tags = $request->meta_tags;
            $events->meta_tags = $request->meta_tags;
            $events->meta_description = $request->meta_description;
            if ($request->image) {
                $events->image = uploadImage($request->image, $events, 'image');
            }

            $events->save();
            return redirect('/admin/events')->with('success', 'New Events Created Successfully');

        }
        return view('admin.events.add');
    }

    public function edit_events(Request $request,$id){
        $events = Events::findorfail($id);
        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'title' => ['required'],
                'short_description' => ['required'],
                'meta_title' => ['required'],
                'meta_tags' => ['required'],
                'location' => ['required'],
                'date' => ['required'],
                'start_time' => ['required'],
                'end_time' => ['required'],
                'meta_description' => ['required'],
                'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);


            $events->title = $request->title;
            $events->slug = Str::slug($request->title,'-');
            $events->short_description = $request->short_description;
            $events->description = $request->description;
            $events->location = $request->location;
            $events->date = $request->date;
            $events->start_time = $request->start_time;
            $events->end_time = $request->end_time;
            $events->meta_title = $request->meta_title;
            $events->meta_tags = $request->meta_tags;
            $events->meta_tags = $request->meta_tags;
            $events->meta_description = $request->meta_description;
            if ($request->image) {
                $events->image = updateImage($request->image, $events, 'image');
            }

            $events->save();
            return redirect('/admin/events')->with('success', 'Update Successfully');

        }
        return view('admin.events.edit',compact('events'));

    }


    public function blogs(){
        $data['blog'] = Blogmodel::orderBy('id', 'desc')->get();
        return view('admin.blogs.index', $data);
    }

    public function newblog(Request $request){
        if ($request->method() == "POST") {
            $validated = $request->validate([
                'title' => ['required'],
                'admin' => ['required'],
                'short_description' => ['required'],
                'category' => ['required','numeric'],
                'meta_title' => ['required'],
                'meta_tags' => ['required'],
                'meta_description' => ['required'],
                'banner' => ['required', 'mimes:jpeg,png,jpg,gif,svg,avif', 'max:2048'],
                'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg,avif', 'max:2048'],
            ]);

            $blog = new Blogmodel;
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title,'-');
            $blog->admin = $request->admin;
            $blog->short_description = $request->short_description;
            $blog->description = $request->description;
            $blog->meta_title = $request->meta_title;
            $blog->category = $request->category;
            $blog->meta_tags = $request->meta_tags;
            $blog->meta_tags = $request->meta_tags;
            $blog->meta_description = $request->meta_description;
            $blog->status = $request->status;
            if ($request->banner) {
                $blog->banner = uploadImage($request->banner, $blog, 'banner');
            }
            if ($request->image) {
                $blog->image = uploadImage($request->image, $blog, 'image');
            }
            $blog->save();
            return redirect('/admin/blogs')->with('success', 'New Blog Created Successfully');

        }
        return view('admin.blogs.add');
    }


    public function editblogs(Request $request, $id) {
        $blog = Blogmodel::find($id);
        if ($request->method() == "POST") {


            $validatedData = $request->validate([
                'title' => ['required'],
                'admin' => ['required'],
                'short_description' => ['required'],
                'category' => ['required','numeric'],
                'meta_title' => ['required'],
                'meta_tags' => ['required'],
                'meta_description' => ['required'],
                'banner' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);

            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title,'-');
            $blog->admin = $request->admin;
            $blog->short_description = $request->short_description;
            $blog->description = $request->description;
            $blog->meta_title = $request->meta_title;
            $blog->category = $request->category;
            $blog->meta_tags = $request->meta_tags;
            $blog->meta_tags = $request->meta_tags;
            $blog->meta_description = $request->meta_description;
            $blog->status = $request->status;
        if ($request->banner) {
            $blog->banner = updateImage($request->banner, $blog, 'banner');
        }

        if ($request->image) {
            $blog->image = updateImage($request->image, $blog, 'image');
        }


        $blog->save();
        return redirect('/admin/blogs')->with('success', 'Update Successfully');
    }

    if (isset($blog)) {
        return view('admin.blogs.edit',compact('blog'));

    }else{
        abort(404);
    }

    }

    public function contactenquires(){
        $data['enquires'] = Enquiry::orderBy('id', 'desc')->paginate(10);
        return view('superadmin.contactenquires',$data);
    }

    public function viewenquiry($id){
        $row = Enquiry::find($id);
        if (isset($row)) {
            return view('superadmin.viewenquiry',compact('row'));

        }else{
            abort(404);
        }
    }
}
