<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\StateRegion;
use App\Models\District;
use App\Models\Township;
use App\Models\WardVillageTract;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App;
use Session;
use Illuminate\Pagination\Paginator;

class HouseholdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function __construct()
    // {
    //     $this->middleware('role:admin');
    // }

    public function index()
    {
        $households = Household::get()->all();

        return view('households.index',compact('households'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['state_regions'] = StateRegion::get(["name", "id"]);
        return view('households.create', $data);
    }

    public function fetchDistrict(Request $request)
    {
        $data['districts'] = District::where("state_region_id", $request->state_region_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }
    public function fetchTownship(Request $request)
    {
        $data['townships'] = Township::where("district_id", $request->district_id)
                                    ->get(["name", "id"]);
                                      
        return response()->json($data);
    }

    public function fetchWardVillageTract(Request $request)
    {
        $data['ward_village_tracts'] = WardVillageTract::where("township_id", $request->township_id)
                                    ->get(["name", "id"]);
                                      
        return response()->json($data);
    }
    public function fetchVillage(Request $request)
    {
        $data['villages'] = Village::where("ward_village_tract_id", $request->ward_village_tract_id)
                                    ->get(["name", "id"]);
                                      
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            // 'name' => 'required',
        ]);

        Household::create([
            "household_id" => request('household_id'),
            "date" => request('date'),
            "house_number" => request('house_number'),
            "family_head" => request('family_head'),
            "state_region_id" => request('stateregion'),
            "district_id" => request('district'),
            "township_id" => request('township'),
            "ward_village_tract_id" => request('wardvillagetract'),
            "village_id" => request('village'),
            "user_id" => auth()->id(),
        ]);        
    
        return redirect()->route('households.index', app()->getLocale() )
                        ->with('success','Households created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Household  $household
     * @return \Illuminate\Http\Response
     */

    public function trashed()
    {
        $households = Household::onlyTrashed()->get();
        return view('households.trashed_household')->with('households', $households);
        // return view('households.index',compact('households'));
    }

    public function show($lang, $household_id)
    {
        $households = Household::find($household_id);
        return view('households.show',compact('households', 'lang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $household_id)
    {
        $households = Household::findOrFail($household_id);
        
        $state_regions = StateRegion::all();
        $districts = District::all();
        $townships = Township::all();
        $ward_vilage_tracts = WardVillageTract::all();
        $villages = Village::all();

        return view('households.edit',compact('households', 'state_regions', 'districts', 'townships', 'ward_vilage_tracts', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $household_id)
    {
        request()->validate([
            
        ]);
        
        // $validator = Validator::make($request->all(), [
        //     "name" => 'required|string|min:3|max:50',
        //     "email_work" => 'email|max:255|unique:users',
        //     "surname" => 'required|string|min:3|max:50',
        //     "tel" => 'required|numeric|size:11',
        //     "country" => 'required|integer',
        //     "region" => 'required|integer',
        //     "city" => 'required|integer'
        // ]);

        $households = Household::find($household_id);
        $households->date = request('date');
        $households->house_number = request('house_number');
        $households->family_head = request('family_head');
        $households->state_region_id = request('stateregion');
        $households->district_id = request('district');
        $households->township_id = request('township');
        $households->ward_village_tract_id = request('wardvillagetract');
        $households->village_id = request('village');
        $user = Auth::user();
        $households->save();
    
        return redirect()->route('households.index', app()->getLocale() )
                        ->with('success','Household updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Household  $household
     * @return \Illuminate\Http\Response
     */

    // public function destroy($lang, $id)
    // {
    //     $household = Household::find($id);
    //     $household->delete();
    //     return redirect()->route('households.index', app()->getLocale() )
    //                     ->with('success','Household deleted successfully');
    // }

    public function destroy($lang, $household_id)
    {
        $household = Household::find($household_id);
        $household->delete();
        Session::flash('success', 'The household was just trashed.');
        return redirect()->back();
    }

    public function kill($lang, $household_id){
        //$post = Post::find($id); -> find by ID will not work here coz the post we are looking is already trashed by Laravel eloquent
        $post = Household::withTrashed()->where('household_id', $household_id)->first();
        $post->forceDelete();
        Session::flash('success', 'The household deleted permantly');
        return redirect()->back();
    }

    public function restore($lang, $household_id){
        $household = Household::withTrashed()->where('household_id', $household_id)->first();
        $household->restore();
        Session::flash('success', 'Household restored successfully');
        return redirect()->back();
        // return redirect()->route('households.index',  app()->getLocale() );
    }
}
