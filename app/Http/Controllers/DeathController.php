<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\District;
use App\Models\Ethnicity;
use App\Models\Nationality;
use App\Models\Relationship;
use App\Models\Family;
use App\Models\Death;
use DB;


class DeathController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index()
    // {
    //     $families = Family::orderBy("id", "desc")->get();
    //     $households = Household::orderBy('household_id', 'asc')->get();
    //     $deaths = Death::orderBy('id', 'asc')->get();

    //     return view('deaths.index', compact('families', 'households', 'deaths'));
    // }

    public function index()
    {
        $data = DB::table('households')
            ->join('families', 'households.household_id', '=', 'families.house_hold_id')
            ->join('deaths', 'families.id', '=', 'deaths.family_id')
            ->join('villages', 'households.village_id', '=', 'villages.id')
            ->join('townships', 'households.township_id', '=', 'townships.id')
            ->join('ward_village_tracts', 'households.ward_village_tract_id', '=', 'ward_village_tracts.id')
            ->join('districts', 'households.district_id', '=', 'districts.id')
            ->join('state_regions', 'households.state_region_id', '=', 'state_regions.id')

            ->select('families.name as family_name', 
                'families.gender as gender',
                'families.nrc_id as nrc',
                'families.date_of_birth as date_of_birth',

                'deaths.created_at as date',
                'deaths.death_date as death_date',
                'deaths.complainant as complainant',
                'deaths.death_place as death_place',

                'households.township_id as township',
                'households.ward_village_tract_id as wardvillage',
                'households.village_id as village',
                
                'townships.name as township', 
                'villages.name as village',
                'districts.name as district', 
                'state_regions.name as state_region',
                'ward_village_tracts.name as wardvillage',
                )
            ->get();
       
           

        return view('deaths.index', compact('data'));
    }


    public function restore($lang, $id){

        $family = Family::withTrashed()->where('id', $id)->first();
        $family->restore();

        // $deaths = Death::find($death_id);
        // $deaths->delete();

        Session::flash('success', 'Family restored successfully');
        // return redirect()->back();
        return redirect()->route('deaths.deathIndex',  app()->getLocale() );
    }

    

    
}
