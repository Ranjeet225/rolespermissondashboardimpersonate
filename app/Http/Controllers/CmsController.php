<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\MasterService;
use App\Models\Testimonials;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CmsController extends Controller
{
    public function blogs()
    {
        $blogs = Blog::paginate(12);
        return view('admin.cms.blogs.index', compact('blogs'));
    }

    public function blogs_create()
    {
        return view('admin.cms.blogs.create');
    }
    public function blogs_store(Request $request)
    {

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug= Str::slug($request->title);
        $blog->text = $request->text;
        $blog->status = $request->status;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $image->move($destinationPath, $name);
            $blog['image'] = $name;
        }
        $blog->save();
        return redirect()->route('blogs')->with('success','Data inserted Successfully');
    }
    public function blogs_edit($id)
    {
        $blogs = Blog::find($id);
        return view('admin.cms.blogs.edit', compact('blogs'));
    }
    public function blogs_update(Request $request, $id)
    {
        // dd($request->all());
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->text = $request->text;
        $blog->status = $request->status;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $image->move($destinationPath, $name);
            $blog->image = $name;
        }
        $blog->save();
        return redirect()->route('blogs')->with('success','Data Updated Successfully');
    }
    public function blogs_delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs')->with('success','Data Deleted Successfully');
    }

    // testimonial
    public function testimonial(Request $request)
    {
        if ($request->name) {
            $testimonial = Testimonials::where('name', 'LIKE', "%{$request->name}%")->paginate(12);
        } else {
            $testimonial = Testimonials::paginate(12);
        }
        return view('admin.cms.testimonial.index', compact('testimonial'));
    }

    public function testimonial_create()
    {
        return view('admin.cms.testimonial.create');
    }
    public function testimonial_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'location' => 'required',
            'status' => 'required',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'testimonial_desc'=>'required',
        ]);

        $testimonial = new Testimonials();
        $testimonial->name = $request->name;
        $testimonial->designation= $request->designation;
        $testimonial->location = $request->location;
        $testimonial->testimonial_desc = $request->testimonial_desc;
        $testimonial->status = $request->status;
        $testimonial->created_by = Auth::user()->id;
        $testimonial->updated_by = Auth::user()->id;
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $image->move($destinationPath, $name);
            $testimonial['profile_picture'] = $name;
        }
        $testimonial->save();
        return redirect()->route('testimonial')->with('success','Data inserted Successfully');
    }
    public function testimonial_edit($id)
    {
        $testimonial = Testimonials::find($id);
        return view('admin.cms.testimonial.edit', compact('testimonial'));
    }
    public function testimonial_update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'location' => 'required',
            'status' => 'required',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'testimonial_desc'=>'required',
        ]);

        $testimonial = Testimonials::find($id);
        $testimonial->name = $request->name;
        $testimonial->designation= $request->designation;
        $testimonial->location = $request->location;
        $testimonial->testimonial_desc = $request->testimonial_desc;
        $testimonial->updated_by = Auth::user()->id;
        $testimonial->status = $request->status;
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $image->move($destinationPath, $name);
            $testimonial['profile_picture'] = $name;
        }
        $testimonial->save();
        return redirect()->route('testimonial')->with('success','Data Updated Successfully');
    }
    public function testimonial_delete($id)
    {
        $testimonial = Testimonials::find($id);
        $testimonial->delete();
        return redirect()->route('testimonial')->with('success','Data Deleted Successfully');
    }


    public function master_service(Request $request)
    {
        $master_service = MasterService::paginate(12);
        if ($request->name) {
            $master_service = MasterService::where('name', 'LIKE', "%{$request->name}%")->paginate(12);
        }
        return view('admin.othermaster.master-service.index', compact('master_service'));
    }
    public function master_service_create()
    {
        return view('admin.othermaster.master-service.create');
    }
    public function master_service_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $master_service = new MasterService;
        $master_service->name = $request->name;
        $master_service->status = $request->status;
        $master_service->save();
        return redirect()->route('master_service')->with('success','Data Created Successfully');
    }
    public function master_service_edit($id)
    {
        $master_service = MasterService::find($id);
        if (!$master_service) {
            return redirect()->route('master_service')->with('error','Data Not Found');
        }
        return view('admin.othermaster.master-service.edit', compact('master_service'));
    }
    public function master_service_update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $master_service = MasterService::find($id);
        $master_service->name = $request->name;
        $master_service->status = $request->status;
        $master_service->save();
        return redirect()->route('master_service')->with('success','Data Updated Successfully');
    }
    public function master_service_delete($id)
    {
        $master_service = MasterService::find($id);
        if (!$master_service) {
            return redirect()->route('master_service')->with('error','Data Not Found');
        }
        $master_service->delete();
        return redirect()->route('master_service')->with('success','Data Deleted Successfully');
    }

}
