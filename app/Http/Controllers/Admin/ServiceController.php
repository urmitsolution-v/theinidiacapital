<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\Pakeges;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function create(Request $request){
        if ($request->post()) {
            $validated = $request->validate([
                'title' => 'required|',
                // 'description' => 'nullable|string',
                // 'long_description' => 'nullable|string',
                // 'image' => 'nullable|image|max:2048',
                // 'baner_img' => 'nullable|baner_img|',
            ]);
            $Service = new Service();
            $Service->title = $request->title;
            $Service->slug = Str::slug($request->title);
            $Service->category = $request->category;
            $Service->description = $request->description;
            $Service->long_description = $request->long_description;
            $Service->meta_title = $request->meta_title;
            $Service->meta_tags = $request->meta_tags;
            $Service->meta_description = $request->meta_description;
            $Service->status = $request->status;
            if ($request->image) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/Service-image'), $imageName);
                $Service->image = $imageName;
            }
            if ($request->icon) {
                $imageName = time() . '.' . $request->icon->extension();
                $request->icon->move(public_path('/Service-image'), $imageName);
                $Service->icon = $imageName;
            }
            $Service->save();
            return redirect('admin/services-list')->with('success', 'Created Successfully');;
        }
        return View('admin/services/add');
    }


    public function index(){
        $Service = Service::get();
        return View('admin/services/index', compact('Service'));
    }

    public function update(Request $request, $id){
        $service = Service::find($id);
        $categories = Category::where('status', 'Y')->where('type', 'service')->get();
        if ($request->post()) {
            $service->title = $request->title;
            $service->category = $request->category;
            $service->description = $request->description;
            $service->long_description = $request->long_description;
            $service->meta_title = $request->meta_title;
            $service->meta_tags = $request->meta_tags;
            $service->meta_description = $request->meta_description;
            $service->status = $request->status;
            $slug = Str::slug($request->title);
            if (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                $slug = $slug . '-' . uniqid();
            }

            $service->slug = $slug;

            if ($request->hasFile('image')) {
                if ($service->image && file_exists(public_path('Service-image/' . $service->image))) {
                    unlink(public_path('Service-image/' . $service->image));  // Delete the old image
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('Service-image'), $imageName);
                $service->image = $imageName;
            }

            if ($request->hasFile('icon')) {
                if ($service->icon && file_exists(public_path('Service-image/' . $service->icon))) {
                    unlink(public_path('Service-image/' . $service->icon));  // Delete the old image
                }
                $imageName = time() . '.' . $request->icon->extension();
                $request->icon->move(public_path('Service-image'), $imageName);
                $service->icon = $imageName;
            }
            $service->save();
            return redirect()->route('services-list')->with('success', 'Update Successfully');;
        }
        return view('admin.services.edit', compact('service', 'categories'));
    }


    public function delete(Request $request, $id)
    {
        $service = Service::find($id);
        if ($service->image) {
            unlink(public_path('Service-image/' . $service->image));
        }
        if ($service->baner_img) {
            unlink(public_path('Service-Banner-image/' . $service->baner_img));
        }

        $service->delete();

        return redirect()->route('services-list')->with('success', 'Delete Successfully');;
    }


    public function pricing_list(){
        $pakeges = Pakeges::get();
        return View('admin/pakeges/index', compact('pakeges'));
    }

    public function create_pricing(Request $request){
        if ($request->post()) {
            // $validated = $request->validate([
            //     'title' => 'required|',
            //     // 'description' => 'nullable|string',
            //     // 'long_description' => 'nullable|string',
            //     // 'image' => 'nullable|image|max:2048',
            //     // 'baner_img' => 'nullable|baner_img|',
            // ]);
            $pakeges = new Pakeges();
            $pakeges->category = $request->category;
            $pakeges->currency = $request->currency;
            $pakeges->formate = $request->formate;
            $pakeges->deac = $request->deac;
            $pakeges->ammount = $request->ammount;
            $pakeges->max_amount = $request->max_amount;
            $pakeges->status = $request->status;
            $pakeges->ac_type = $request->ac_type;
            $pakeges->benefit = $request->benefit;
            $pakeges->interest_rate = $request->interest_rate;
            $pakeges->clint_criteria = $request->clint_criteria;
            $pakeges->save();
            return redirect('admin/pricing-list')->with('success', 'Created Successfully');;
        }
        return View('admin/pakeges/add');
    }


    public function pricingupdate(Request $request, $id){
        $pakeges = Pakeges::find($id);
        $categories = Category::where('status', 'Y')->where('type', 'service')->get();
        if ($request->post()) {
            $pakeges->category = $request->category;
            $pakeges->currency = $request->currency;
            $pakeges->formate = $request->formate;
            $pakeges->deac = $request->deac;
            $pakeges->ammount = $request->ammount;
            $pakeges->max_amount = $request->max_amount;
            $pakeges->status = $request->status;
            $pakeges->benefit = $request->benefit;
            $pakeges->interest_rate = $request->interest_rate;
            $pakeges->ac_type = $request->ac_type;
            $pakeges->clint_criteria = $request->clint_criteria;
            $pakeges->save();
            return redirect()->route('pricing-list')->with('success', 'Update Successfully');;
        }
        return view('admin.pakeges.edit', compact('pakeges', 'categories'));
    }


}