<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{



    public function addproject(Request $request)
    {

        if ($request->post()) {
            $validated = $request->validate([
                'project_name' => 'required|',
            ]);
            $Project = new Project();
            $Project->project_name = $request->project_name;
            $Project->slug = Str::slug($request->project_name);
            $Project->date = $request->date;
            $Project->loction = $request->loction;
            $Project->client = $request->client;
            $Project->duration = $request->duration;
            $Project->category = $request->category;
            $Project->s_description = $request->s_description;
            $Project->l_description = $request->l_description;
            $Project->s_description1 = $request->s_description1;
            $Project->l_description1 = $request->l_description1;
            $Project->image1 = $request->image1;
            $Project->s_description2 = $request->s_description2;
            $Project->l_description2 = $request->l_description2;
            $Project->meta_title = $request->meta_title;
            $Project->meta_tags = $request->meta_tags;
            $Project->meta_description = $request->meta_description;
            $Project->status = $request->status;
            if ($request->image) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/Project-image'), $imageName);
                $Project->image = $imageName;
            }
            if ($request->image1) {
                $imageName = time() . '.' . $request->image1->extension();
                $request->image1->move(public_path('/Project-Challenges-image'), $imageName);
                $Project->image1 = $imageName;
            }
            $Project->save();
            return redirect()->route('projects-list')->with('success', 'Created  Successfully');
        }

        return view('admin.Projects.add');
    }


    public function update(Request $request, $id)
    {
        $Project = Project::find($id);
        $categories = Category::where('status', 'Y')->where('type', 'project')->get();

        if ($request->post()) {
            // $validated = $request->validate([
            //     'category' => 'required|exists:category,id',
            //     'description' => 'nullable|string',
            //     'long_description' => 'nullable|string',
            //     'image' => 'nullable|image|max:2048',
            //     'baner_img' => 'nullable|baner_img|',
            // ]);
            $Project->project_name = $request->project_name;

            $Project->date = $request->date;
            $Project->loction = $request->loction;
            $Project->client = $request->client;
            $Project->duration = $request->duration;
            $Project->category = $request->category;
            $Project->s_description = $request->s_description;
            $Project->l_description = $request->l_description;
            $Project->s_description1 = $request->s_description1;
            $Project->l_description1 = $request->l_description1;
            $Project->image1 = $request->image1;
            $Project->s_description2 = $request->s_description2;
            $Project->l_description2 = $request->l_description2;
            $Project->meta_title = $request->meta_title;
            $Project->meta_tags = $request->meta_tags;
            $Project->meta_description = $request->meta_description;
            $Project->status = $request->status;
            $slug = Str::slug($request->project_name);
            if (Project::where('slug', $slug)->where('id', '!=', $Project->id)->exists()) {
                $slug = $slug . '-' . uniqid();
            }

            $Project->slug = $slug;

            if ($request->hasFile('image')) {
                if ($Project->image && file_exists(public_path('Project-image/' . $Project->image))) {
                    unlink(public_path('Project-image/' . $Project->image));  // Delete the old image
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('Project-image'), $imageName);
                $Project->image = $imageName;
            }

            if ($request->hasFile('image1')) {
                if ($Project->image1 && file_exists(public_path('Project-Challenges-image/' . $Project->image1))) {
                    unlink(public_path('Project-Challenges-image/' . $Project->image1));  // Delete the old image
                }
                $imageName = time() . '.' . $request->image1->extension();
                $request->image1->move(public_path('Project-Challenges-image'), $imageName);
                $Project->image1 = $imageName;
            }

            $Project->save();
            return redirect()->route('projects-list')->with('success', 'update Successfully');;
            // return redirect('services-list');
        }

        return view('admin.Projects.edit', compact('categories', 'Project'));
    }


    public function index()
    {
        $Project = Project::get();
        return View('admin/Projects/index', compact('Project'));
    }

    public function delete(Request $request, $id)
    {
        $Project = Project::find($id);
        if ($Project->image) {
            unlink(public_path('Project-image/' . $Project->image));
        }
        if ($Project->image1) {
            unlink(public_path('Project-Challenges-image/' . $Project->image1));
        }


        $Project->delete();

        return redirect()->route('projects-list')->with('success', 'Delete  Successfully');;
    }
    public function getCategoryProjects(Request $request)
    {
        // $categoryId = $request->input('category_id');
        // $projects = Project::where('category_id', $categoryId)->get();
        return view('project.project-category');
    }
}
