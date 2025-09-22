<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Process;
use App\Models\Bestourservice;
use App\Models\Gallery;
use App\Models\Videos;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamsController extends Controller
{
    public function team(){
        $data = Team::get();
        return view('admin.teams.index', compact('data'));
    }

    public function create(Request $request){
        // Check if the form is submitted via POST method
        if ($request->isMethod('post')) {
            // Validate the incoming data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'status' => 'required|in:Y,N',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $team = new Team();
            $team->name = $request->name;
            $team->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/team-image'), $imageName);
                $team->image = $imageName;
            }
            $team->save();

            return redirect('/admin/team')->with('success', 'Created Successfully');
        }
        return view('admin.teams.add');
    }
    public function editteam(Request $request, $id)
    {
        $team = Team::find($id);

        if ($request->post()) {
            // $validatedData = $request->validate([
            //     'name' => ['required'],
            //     'destination' => ['required'],
            //     'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            // ]);
            $team->name = $request->name;
            $team->status = $request->status;
            $slug = Str::slug($request->name);
            
            if ($request->hasFile('image')) {
                if ($team->image && file_exists(public_path('team-image/' . $team->image))) {
                    unlink(public_path('team-image/' . $team->image));  // Delete the old image
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('team-image'), $imageName);
                $team->image = $imageName;
            }
            $team->save();
            return redirect('/admin/team')->with('success', 'Updated Successfully');
        }
        return view('admin.teams.edit', compact('team'));
    }


    public function deleteteam(Request $request, $id)
    {
        $faq = Team::find($id);
        $faq->delete();

        return redirect()->route('team')->with('success', 'Delete Successfully');
    }


    public function create_process(Request $request){
        if ($request->isMethod('post')) {
       
            $validated = $request->validate([
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $process = new Process();
            $process->title = $request->title;
            $process->sub_title = $request->sub_title;
            $process->status = $request->status;
            if ($request->hasFile('icon')) {
                $imageName = time() . '.' . $request->icon->extension();
                $request->icon->move(public_path('/uploads'), $imageName);
                $process->icon = $imageName;
            }
            $process->save();
            return redirect('/admin/process')->with('success', 'Created Successfully');
        }
        return view('admin.process.add');
    }


    public function editprocess(Request $request, $id){
        $process = Process::find($id);
        if ($request->post()) {
            $validated = $request->validate([
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $process->title = $request->title;
            $process->sub_title = $request->sub_title;
            $process->status = $request->status;

            if ($request->hasFile('icon')) {
                if ($process->icon && file_exists(public_path('uploads/' . $process->icon))) {
                    unlink(public_path('uploads/' . $process->icon));  // Delete the old image
                }
                $imageName = time() . '.' . $request->icon->extension();
                $request->icon->move(public_path('uploads'), $imageName);
                $process->icon= $imageName;
            }
            $process->save();
            return redirect('/admin/process')->with('success', 'Updated Successfully');
        }
        return view('admin.process.edit', compact('process'));
    }




    public function process(){
        $process = Process::get();
        return view('admin.process.index', compact('process'));
    }
    public function deleteprocess(Request $request, $id) {
        $process = Process::find($id);
        $process->delete();
        return redirect()->route('process')->with('success', 'Delete Successfully');
    }


    public function best_services(){
        $bestservice = Bestourservice::get();
        return view('admin.bestservice.index', compact('bestservice'));
    }

    public function create_best_service(Request $request){
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $bestservice = new Bestourservice();
            $bestservice->title = $request->title;
            $bestservice->sub_title = $request->sub_title;
            $bestservice->status = $request->status;
            if ($request->hasFile('icon')) {
                $imageName = time() . '.' . $request->icon->extension();
                $request->icon->move(public_path('/uploads'), $imageName);
                $bestservice->icon = $imageName;
            }
            $bestservice->save();
            return redirect('/admin/best-services')->with('success', 'Created Successfully');
        }
        return view('admin.bestservice.add');
    }

    public function delete_best_service(Request $request, $id) {
        $bestservice = Bestourservice::find($id);
        $bestservice->delete();
        return redirect()->route('best_services')->with('success', 'Delete Successfully');
    }


    public function edit_best_service(Request $request, $id){
        $bestservice = Bestourservice::find($id);
        if ($request->post()) {
            $validated = $request->validate([
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $bestservice->title = $request->title;
            $bestservice->sub_title = $request->sub_title;
            $bestservice->status = $request->status;
            if ($request->hasFile('icon')) {
                if ($bestservice->icon && file_exists(public_path('uploads/' . $bestservice->icon))) {
                    unlink(public_path('uploads/' . $bestservice->icon));  // Delete the old image
                }
                $imageName = time() . '.' . $request->icon->extension();
                $request->icon->move(public_path('uploads'), $imageName);
                $bestservice->icon= $imageName;
            }
            $bestservice->save();
            return redirect('/admin/best-services')->with('success', 'Updated Successfully');
        }
        return view('admin.bestservice.edit', compact('bestservice'));
    }


    public function gallery(){
        $gallery = Gallery::get();
        return view('admin.gallery.index', compact('gallery'));
    }
    
    public function creategallery(Request $request){
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $gallery = new Gallery();
            $gallery->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/uploads'), $imageName);
                $gallery->image = $imageName;
            }
            $gallery->save();
            return redirect('/admin/gallery')->with('success', 'Created Successfully');
        }
        return view('admin.gallery.add');
    }

    public function editgallery(Request $request, $id){
        $gallery = Gallery::find($id);
        if ($request->post()) {
            $validated = $request->validate([
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $gallery->status = $request->status;
            if ($request->hasFile('image')) {
                if ($gallery->icon && file_exists(public_path('uploads/' . $gallery->image))) {
                    unlink(public_path('uploads/' . $gallery->image));  // Delete the old image
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $imageName);
                $gallery->image= $imageName;
            }
            $gallery->save();
            return redirect('/admin/gallery')->with('success', 'Updated Successfully');
        }
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function deletegallery(Request $request, $id) {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect()->route('gallery')->with('success', 'Delete Successfully');
    }


    public function createvideos(Request $request){
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'video' => 'required|string',
            ]);
            $video = new Videos();
            $video->video = $request->video;
            $video->status = $request->status;
            $video->save();
            return redirect('/admin/videos')->with('success', 'Created Successfully');
        }
        return view('admin.video.add');
    }


    public function videos(){
        $video = Videos::get();
        return view('admin.video.index', compact('video'));
    }
    public function editvideos(Request $request, $id){
        $video = Videos::find($id);
        if ($request->post()) {
           
            $video->video = $request->video;
            $video->status = $request->status;
           
            $video->save();
            return redirect('/admin/videos')->with('success', 'Updated Successfully');
        }
        return view('admin.video.edit', compact('video'));
    }

    public function deletevideos(Request $request, $id) {
        $video = Videos::find($id);
        $video->delete();
        return redirect()->route('videos')->with('success', 'Delete Successfully');
    }


    public function createclients(Request $request){
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $clients = new Clients();
            $clients->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/uploads'), $imageName);
                $clients->image = $imageName;
            }
            $clients->save();
            return redirect('/admin/clients')->with('success', 'Created Successfully');
        }
        return view('admin.clients.add');
    }

    public function clients(){
        $clients = Clients::get();
        return view('admin.clients.index', compact('clients'));
    }


    public function editclients(Request $request, $id){
        $clients = Clients::find($id);
        if ($request->post()) {
            $validated = $request->validate([
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $clients->status = $request->status;
            if ($request->hasFile('image')) {
                if ($clients->icon && file_exists(public_path('uploads/' . $clients->image))) {
                    unlink(public_path('uploads/' . $clients->image));  // Delete the old image
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $imageName);
                $clients->image= $imageName;
            }
            $clients->save();
            return redirect('/admin/clients')->with('success', 'Updated Successfully');
        }
        return view('admin.clients.edit', compact('clients'));
    }


    public function deleteclients(Request $request, $id) {
        $clients = Clients::find($id);
        $clients->delete();
        return redirect()->route('clients')->with('success', 'Delete Successfully');
    }
}

