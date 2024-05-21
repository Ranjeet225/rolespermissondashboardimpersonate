<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Intrested;
use App\Models\Province;
use App\Models\Source;
use App\Models\Specialisations;
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
             'country_code'=>'required'
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
         $country->delete();
         return redirect()->route('country')
             ->with('success', 'country deleted successfully');
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
         return view('admin.othermaster.province.edit', compact('province'));
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
         $province->delete();
         return redirect()->route('province')
             ->with('success', 'province deleted successfully');
     }


}
