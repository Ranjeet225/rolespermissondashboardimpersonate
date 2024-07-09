<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EducationLane;
use App\Models\Faq;
use App\Models\Intrested;
use App\Models\Province;
use App\Models\Source;
use App\Models\Specialisations;
use App\Models\VasService;
use App\Models\VisaDocument;
use App\Models\VisaSubDocument;
use App\Models\VisaType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class OtherMasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function specializations(Request $request)
    {
        $specilization=Specialisations::when($request->name, function ($query) use ($request) {
            $query->where('name', 'like', '%'.$request->name.'%');
        })
        ->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->paginate(12);
        return view('admin.othermaster.specializations.index',compact('specilization'));
    }

    public function specializations_create()
    {
        return view('admin.othermaster.specializations.create');
    }
    public function specializations_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:233',
            'status'=>'required'
        ]);
        $input = $request->except('_token');
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;
        Specialisations::create($input);
        return redirect()->route('specilization')
            ->with('success', 'Specialization created successfully.');
    }
    public function specializations_edit($id)
    {
        $specialization = Specialisations::find($id);
        return view('admin.othermaster.specializations.edit', compact('specialization'));
    }

    public function specializations_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status'=>'required'
        ]);
        $specialization = Specialisations::find($id);
        $specialization->name = $request->name;
        $specialization->status = $request->status;
        $input['updated_by'] = auth()->user()->id;
        $specialization->save();
        return redirect()->route('specilization')
            ->with('success', 'Specialization updated successfully');
    }

    public function specializations_delete(Request $request)
    {
        $specialization = Specialisations::find($request->id);
        $specialization->delete();
        return redirect()->route('specilization')
            ->with('success', 'Specialization deleted successfully');
    }

    // source
    public function source(Request $request)
    {
        $source=Source::when($request->name, function ($query) use ($request) {
            $query->where('name', 'like', '%'.$request->name.'%');
        })
        ->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->paginate(12);
        return view('admin.othermaster.source.index',compact('source'));
    }

    public function source_create()
    {
        return view('admin.othermaster.source.create');
    }
    public function source_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:233',
            'status'=>'required'
        ]);
        $input = $request->except('_token');
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;
        Source::create($input);
        return redirect()->route('source')
            ->with('success', 'Source created successfully.');
    }
    public function source_edit($id)
    {
        $source = Source::find($id);
        return view('admin.othermaster.source.edit', compact('source'));
    }

    public function source_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status'=>'required'
        ]);
        $source = Source::find($id);
        $source->name = $request->name;
        $source->status = $request->status;
        $source->save();
        return redirect()->route('source')
            ->with('success', 'Source updated successfully');
    }

    public function source_delete(Request $request)
    {
        $source = Source::find($request->id);
        $source->delete();
        return redirect()->route('source')
            ->with('success', 'Source deleted successfully');
    }

    // interested
    public function interested(Request $request)
    {
        $interested=Intrested::when($request->name, function ($query) use ($request) {
            $query->where('name', 'like', '%'.$request->name.'%');
        })
        ->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->paginate(12);
        return view('admin.othermaster.interested.index',compact('interested'));
    }

    public function interested_create()
    {
        return view('admin.othermaster.interested.create');
    }
    public function interested_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:233',
            'status'=>'required'
        ]);
        $input = $request->except('_token');
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;
        Intrested::create($input);
        return redirect()->route('interested')
            ->with('success', 'Interested created successfully.');
    }
    public function interested_edit($id)
    {
        $interested = Intrested::find($id);
        return view('admin.othermaster.interested.edit', compact('interested'));
    }

    public function interested_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status'=>'required'
        ]);
        $interested = Intrested::find($id);
        $interested->name = $request->name;
        $interested->status = $request->status;
        $interested->save();
        return redirect()->route('interested')
            ->with('success', 'Intrested updated successfully');
    }

    public function interested_delete(Request $request)
    {
        $interested = Intrested::find($request->id);
        $interested->delete();
        return redirect()->route('interested')
            ->with('success', 'interested deleted successfully');
    }


    // country

     public function country(Request $request)
     {
         $country=Country::when($request->name, function ($query) use ($request) {
             $query->where('name', 'like', '%'.$request->name.'%');
         })
         ->when($request->status, function ($query) use ($request) {
             $query->where('status', $request->status);
         })
         ->paginate(12);
         return view('admin.othermaster.country.index',compact('country'));
     }
     public function country_create()
     {
         return view('admin.othermaster.country.create');
     }
     public function country_store(Request $request)
     {
         $request->validate([
             'name' => 'required|max:233',
             'country_code'=>'required|numeric|max:2552'
         ]);
         $input = $request->except('_token');
         $input['slug'] = Str::slug($request->name);
         Country::create($input);
         return redirect()->route('country')
             ->with('success', 'country created successfully.');
     }
     public function country_edit($id)
     {
         $country = Country::find($id);
         return view('admin.othermaster.country.edit', compact('country'));
     }
     public function country_update(Request $request, $id)
     {
         $input = $request->except('_token');
         $input['slug'] = Str::slug($request->name);
         $country = Country::find($id);
         $country->update($input);
         return redirect()->route('country')
             ->with('success', 'Country updated successfully');
     }
     public function country_delete(Request $request)
     {
         $country = Country::find($request->id);
         if ($country) {
             $country->delete();
             return redirect()->route('country')
                 ->with('success', 'country deleted successfully');
         } else {
             return redirect()->route('country')
                 ->with('error', 'country not found');
         }
     }

    //  province
     public function province(Request $request)
     {
         $province=Province::with('country')->when($request->name, function ($query) use ($request) {
                        $query->where('name', 'like', '%'.$request->name.'%');
                    })
                    ->when($request->country_id, function ($query) use ($request) {
                        $query->where('country_id', 'like', '%'.$request->country_id.'%');
                    })
         ->paginate(12);
         $country =Country::get();
         return view('admin.othermaster.province.index',compact('province','country'));
     }
     public function province_create()
     {
         $country =Country::get();
         return view('admin.othermaster.province.create',compact('country'));
     }
     public function province_store(Request $request)
     {
         $request->validate([
             'name' => 'required|max:233',
             'country_id'=>'required'
         ]);
         $input = $request->except('_token');
         Province::create($input);
         return redirect()->route('province')
             ->with('success', 'Province created successfully.');
     }
     public function province_edit($id)
     {
         $province = Province::find($id);
         $country =Country::get();
         return view('admin.othermaster.province.edit', compact('province','country'));
     }
     public function province_update(Request $request, $id)
     {
         $input = $request->except('_token');
         $province = Province::find($id);
         $province->update($input);
         return redirect()->route('province')
             ->with('success', 'Province updated successfully');
     }
     public function province_delete(Request $request)
     {
         $province = Province::find($request->id);
         if($province){
             $province->delete();
             return redirect()->route('province')
                 ->with('success', 'province deleted successfully');
         }
         return redirect()->route('province')
             ->with('error', 'province not found');
     }

    //  visa type
       public function visa_type(Request $request)
       {
           $visa_type=VisaType::when($request->name, function ($query) use ($request) {
                          $query->where('name', 'like', '%'.$request->name.'%');
                      })
           ->paginate(12);
           return view('admin.othermaster.visa-type.index',compact('visa_type'));
       }
       public function visa_type_create()
       {
           return view('admin.othermaster.visa-type.create');
       }
       public function visa_type_store(Request $request)
       {
           $request->validate([
               'name' => 'required|max:233',
           ]);
           $input = $request->except('_token');
           VisaType::create($input);
           return redirect()->route('visa-type')
               ->with('success', 'Visa Type created successfully.');
       }
       public function visa_type_edit($id)
       {
           $visa_type = VisaType::find($id);
           return view('admin.othermaster.visa-type.edit', compact('visa_type'));
       }
       public function visa_type_update(Request $request, $id)
       {
           $input = $request->except('_token');
           $visa_type = VisaType::find($id);
           $visa_type->update($input);
           return redirect()->route('visa-type')
               ->with('success', 'Visa Type updated successfully');
       }
       public function visa_type_delete(Request $request)
       {
           if ($visa_type = VisaType::find($request->id)) {
               $visa_type->delete();
               return redirect()->route('visa-type')
                   ->with('success', 'Visa Type deleted successfully');
           } else {
               return redirect()->route('visa-type')
                   ->with('error', 'Visa Type not found');
           }
       }

    //    faq
    public function faq(Request $request)
    {
        $faq=Faq::when($request->faq_question, function ($query) use ($request) {
                       $query->where('faq_question', 'like', '%'.$request->faq_question.'%');
                   })
        ->paginate(12);
        return view('admin.othermaster.faq.index',compact('faq'));
    }
    public function faq_create()
    {
        return view('admin.othermaster.faq.create');
    }
    public function faq_store(Request $request)
    {
        $request->validate([
            'faq_question' => 'required',
            'faq_answer' => 'required',
            'status'=>'required'
        ]);
        $input = $request->except('_token');
        Faq::create($input);
        return redirect()->route('faq')
            ->with('success', 'Faq created successfully.');
    }
    public function faq_edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.othermaster.faq.edit', compact('faq'));
    }
    public function faq_update(Request $request, $id)
    {
        $input = $request->except('_token');
        $faq = Faq::find($id);
        $faq->update($input);
        return redirect()->route('faq')
            ->with('success', 'faq updated successfully');
    }
    public function faq_delete(Request $request)
    {
        if(Faq::find($request->id))
        {
            $faq = Faq::find($request->id);
            $faq->delete();
            return redirect()->route('faq')
                ->with('success', 'Faq deleted successfully');
        }
        else
        {
            return redirect()->route('faq')
                ->with('error', 'Faq not found');
        }
    }
      //    vas service
      public function vas_service(Request $request)
      {
          $vas_service=VasService::when($request->title, function ($query) use ($request) {
                         $query->where('title', 'like', '%'.$request->title.'%');
                     })
          ->paginate(12);
          return view('admin.othermaster.vas-services.index',compact('vas_service'));
      }
      public function vas_service_create()
      {
          return view('admin.othermaster.vas-services.create');
      }
      public function vas_service_store(Request $request)
      {
          $request->validate([
              'title' => 'required',
              'icon_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              'content' => 'required',
              'order' => 'required',
          ]);
          $input = $request->except('_token');
          if ($request->hasFile('icon_file')) {
              $image = $request->file('icon_file');
              $name = time().'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/imagesapi');
              $image->move($destinationPath, $name);
              $input['icon_file'] = $name;
          }
          VasService::create($input);
          return redirect()->route('vas-service')
              ->with('success', 'Vas Services created successfully.');
      }
      public function vas_service_edit($id)
      {
          $vas_service = VasService::findOrFail($id);
          return view('admin.othermaster.vas-services.edit', compact('vas_service'));
      }
      public function vas_service_update(Request $request, $id)
      {
          $input = $request->except('_token');
          $vas_service = VasService::find($id);
          if ($request->hasFile('icon_file')) {
              $image = $request->file('icon_file');
              $name = time().'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/imagesapi');
              $image->move($destinationPath, $name);
              $input['icon_file'] = $name;
          }
          $vas_service->update($input);
          return redirect()->route('vas-service')
              ->with('success', 'Vas Services updated successfully.');
      }
      public function vas_service_delete(Request $request)
      {
          $vas_service = VasService::find($request->id);
          if ($vas_service) {
              $vas_service->delete();
              return redirect()->route('vas-service')
                  ->with('success', 'Vas Services deleted successfully');
          } else {
              return redirect()->route('vas-service')
                  ->with('success', 'Vas Services not found');
          }
      }


      public function education_lane(Request $request)
      {
          $education_lane=EducationLane::when($request->name, function ($query) use ($request) {
                         $query->where('name', 'like', '%'.$request->name.'%');
                     })
          ->paginate(12);
          return view('admin.othermaster.education-lane.index',compact('education_lane'));
      }
      public function education_lane_create()
      {
          return view('admin.othermaster.education-lane.create');
      }
      public function education_lane_store(Request $request)
      {
          $request->validate([
              'name' => 'required',
              'details' => 'required',
          ]);
          $input = $request->except('_token');
          EducationLane::create($input);
          return redirect()->route('education-lane')
              ->with('success', 'Education lane created successfully.');
      }
      public function education_lane_edit($id)
      {
          $education_lane = EducationLane::find($id);
          return view('admin.othermaster.education-lane.edit', compact('education_lane'));
      }
      public function education_lane_update(Request $request, $id)
      {
          $input = $request->except('_token');
          $education_lane = EducationLane::find($id);
          $education_lane->update($input);
          return redirect()->route('education-lane')
              ->with('success', 'Education updated successfully');
      }
      public function education_lane_delete(Request $request)
      {
          $education_lane = EducationLane::find($request->id);
          if($education_lane){
              $education_lane->delete();
              return redirect()->route('education-lane')
                  ->with('success', 'Education lane deleted successfully');
          }else{
              return redirect()->route('education-lane')
                  ->with('error', 'Education lane not found');
          }
      }

    //  Visa Document type
      public function visa_document_type(Request $request)
      {
        $visa_document_type=VisaDocument::when($request->name, function ($query) use ($request) {
                    $query->where('name', 'like', '%'.$request->name.'%');
                })
                ->latest()->paginate(12);
          return view('admin.othermaster.visa-document.index',compact('visa_document_type'));
      }
      public function visa_document_type_create()
      {
          return view('admin.othermaster.visa-document.create');
      }
      public function visa_document_type_store(Request $request)
      {
          $request->validate([
              'name' => 'required|max:200',
              'status' => 'required',
          ]);
          $input = $request->except('_token');
          VisaDocument::create($input);
          return redirect()->route('visa-document-type')
              ->with('success', 'Visa Document Type created successfully.');
      }
      public function visa_document_type_edit($id)
      {
          $visa_document_type = VisaDocument::find($id);
          return view('admin.othermaster.visa-document.edit', compact('visa_document_type'));
      }
      public function visa_document_type_update(Request $request, $id)
      {
          $input = $request->except('_token');
          $visa_document_type = VisaDocument::find($id);
          $visa_document_type->update($input);
          return redirect()->route('visa-document-type')
              ->with('success', 'Visa Document Type updated successfully');
      }
      public function visa_document_type_delete(Request $request)
      {
          $visa_document_type = VisaDocument::find($request->id);
          if($visa_document_type){
              $visa_document_type->delete();
              return redirect()->route('visa-document-type')
                  ->with('success', 'Visa Document Type deleted successfully');
          }else{
              return redirect()->route('visa-document-type')
                  ->with('error', 'Visa Document Type not found');
          }
      }


      public function visa_sub_document_type(Request $request)
      {
          $visa_sub_document_type = VisaSubDocument::with('visa_documents')->when($request->visa_document_id, function ($query) use ($request) {
                        $query->where('visa_document_id', $request->visa_document_id);
                    })
                    ->latest()->paginate(12);
          return view('admin.othermaster.visa-sub-document.index',compact('visa_sub_document_type'));
      }

      public function visa_sub_document_type_create()
      {
          $visa_documents =VisaDocument::get();
          return view('admin.othermaster.visa-sub-document.create',compact('visa_documents'));
      }

      public function visa_sub_document_type_store(Request $request)
      {
          $request->validate([
              'visa_document_id' => 'required',
              'name' => 'required|max:200',
              'status' => 'required',
          ]);
          $input = $request->except('_token');
          VisaSubDocument::create($input);
          return redirect()->route('visa-sub-document-type')
              ->with('success', 'Visa Sub Document Type created successfully.');
      }
      public function visa_sub_document_type_edit($id)
      {
          $visa_sub_document_type = VisaSubDocument::find($id);
          $visa_documents =VisaDocument::get();
          return view('admin.othermaster.visa-sub-document.edit', compact('visa_sub_document_type','visa_documents'));
      }
      public function visa_sub_document_type_update(Request $request, $id)
      {
          $input = $request->except('_token');
          $visa_sub_document_type = VisaSubDocument::find($id);
          $visa_sub_document_type->update($input);
          return redirect()->route('visa-sub-document-type')
              ->with('success', 'Visa Sub Document Type updated successfully');
      }
      public function visa_sub_document_type_delete(Request $request)
      {
          if ($visa_sub_document_type = VisaSubDocument::find($request->id)) {
              $visa_sub_document_type->delete();
              return redirect()->route('visa-sub-document-type')
                  ->with('success', 'Visa Sub Document Type deleted successfully');
          } else {
              return redirect()->route('visa-sub-document-type')
                  ->with('error', 'Visa Sub Document Type not found');
          }
      }
}
