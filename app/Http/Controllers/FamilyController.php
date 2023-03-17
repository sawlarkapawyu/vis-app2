<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\District;
use App\Models\Ethnicity;
use App\Models\Nationality;
use App\Models\Relationship;
use App\Models\Death;

use App;
use Session;
use Carbon\Carbon;
use Auth;

class FamilyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:family-list|family-create|family-edit|family-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:family-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:family-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:family-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Family::orderBy("id", "desc")->get();
        $households = Household::orderBy('household_id', 'asc')->get();

        return view('families.index', compact('families', 'households'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $family = Family::all();
        $households = Household::orderBy('household_id', 'asc')->get();
        $ethnicities = Ethnicity::orderBy('id', 'asc')->get();
        $nationalities = Nationality::orderBy('id', 'asc')->get();
        $relationships = Relationship::orderBy('id', 'asc')->get();

        return view('families.create',compact('households', 'family', 'ethnicities', 'nationalities', 'relationships'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lang)
    {
        request()->validate([
            // 'name' => 'required',
        ]);
        
        //     return Validator::make($data, [
        //     'fname' => ['required', 'string', 'max:255'],
        //     'lname' => ['required', 'string', 'max:255'],
        //     'gander'=> ['required','in:male,female'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:5', 'confirmed'],
        // ]);

        Family::create([
        "name" => request('name'),
        "date_of_birth" => request('date_of_birth'),
        "gender" => request('gender'),
        "father_name" => request('father_name'),
        "mother_name" => request('mother_name'),
        "relationship_id" => request('relationship'),
        "nrc_id" => request('nrc'),
        "occuption" => request('occuption'),
        "education" => request('education'),
        "ethnicity_id" => request('ethnicity'),
        "nationality_id" => request('nationality'),
        "religion" => request('religion'),
        "remark" => request('remark'),
        "house_hold_id" => request('house_hold_id'),
        "families" => auth()->id(),
        "user_id" => auth()->id(),
        ]);

        $families=Family::where('house_hold_id', $request->house_hold_id)->get();
        return view('families.by_household', compact('families'))->with('success','Family created successfully.');
    }


    public function by_household(Request $request, $lang, $families)
    {
        $families=Family::where('house_hold_id', $request->house_hold_id)->get();

        return view('families.by_household', compact('families'))->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */

    public function trashed($lang)
    {
        $families = Family::onlyTrashed()->get();
        $households = Household::orderBy('household_id', 'asc')->get();
        return view('families.trashed_family', compact('households'))->with('families', $families);
        // return view('households.index',compact('households'));
    }

    public function show($lang, $id)
    {
        $families = Family::find($id);
        return view('families.show',compact('families', 'lang'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $families = Family::findOrFail($id);
        $households = Household::all();
        
        $ethnicities = Ethnicity::orderBy('id', 'asc')->get();
        $nationalities = Nationality::orderBy('id', 'asc')->get();
        $relationships = Relationship::orderBy('id', 'asc')->get();

        return view('families.edit',compact('households', 'families', 'ethnicities', 'nationalities', 'relationships'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $id)
    {
        request()->validate([
            
        ]);
        
        $families = Family::find($id);
        $families->name = request('name');
        $families->date_of_birth = request('date_of_birth');
        $families->gender = request('gender');
        $families->father_name = request('father_name');
        $families->mother_name = request('mother_name');
        $families->relationship_id = request('relationship');
        $families->nrc_id = request('nrc');
        $families->occuption = request('occuption');
        $families->education = request('education');
        $families->ethnicity_id = request('ethnicity');
        $families->nationality_id = request('nationality');
        $families->religion = request('religion');
        $families->remark = request('remark');
        $families->house_hold_id = request('house_hold_id');
        $user = Auth::user();
        $families->save();
        
        return redirect()->route('families.index', app()->getLocale() )
                        ->with('success','Family updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */

    //delete family and save dath data
    public function destroy(Request $request, $lang, $id)
    {
        $family = Family::find($id);
        $family->delete();
        
        $death = new Death();
        $death->family_id = $id;
        $death->complainant = $request->complainant;
        $death->death_date = $request->death_date;
        $death->death_place = $request->death_place;
        $death->save();

        // Session::flash('success', 'The family was just trashed.');
        // return redirect()->back();

        return redirect()->route('deaths.index', app()->getLocale() )
                        ->with('success','Family Deleted successfully');

        // return view('families.death_form', compact('family'));
    }

    public function kill($lang, $id){
        $family = Family::withTrashed()->where('id', $id)->first();
        $family->forceDelete();
        Session::flash('success', 'The family deleted permantly');
        return redirect()->back();
    }

    public function restore($lang, $id){
        $family = Family::withTrashed()->where('id', $id)->first();
        $family->restore();
        Session::flash('success', 'Family restored successfully');
        return redirect()->back();
        // return redirect()->route('families.index',  app()->getLocale() );
    }
}
