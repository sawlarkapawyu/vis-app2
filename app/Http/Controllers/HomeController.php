<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\User;
use App\Models\Household;
use App\Models\Family;
use Spatie\Permission\Models\Role;
use Auth;
use Carbon\Carbon;
use DateTime;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        $families = Family::orderBy('id', 'desc')->get();
        $household_count = Household::count();
        $family_count = Family::count();
        $user_count = User::count();
        $role_count = Role::count();

        $Male = Family::where('gender','ကျား')->get();
        $Female = Family::where('gender','မ')->get();
        $Male_count = count($Male);    	
    	$Female_count = count($Female);

        $Karen = Family::where('ethnicity_id','ကရင်')->get();
        $Mon = Family::where('ethnicity_id','မွန်')->get();
        $Burma = Family::where('ethnicity_id','ဗမာ')->get();
        $Rakhaing = Family::where('ethnicity_id','ရခိုင်')->get();
        $Shan = Family::where('ethnicity_id','ရှမ်း')->get();
        $Karen_count = count($Karen);    	
    	$Mon_count = count($Mon);
        $Burma_count = count($Burma);    	
    	$Rakhaing_count = count($Rakhaing);
        $Shan_count = count($Shan);

        $Buddhism = Family::where('religion','ဗုဒ္ဓဘာသာ')->get();
        $Christianity = Family::where('religion','ခရစ်ယာန်ဘာသာ')->get();
        $Islam = Family::where('religion','အစ္စလာမ်ဘာသာ')->get();
        $Hinduism = Family::where('religion','ဟိန္ဒူဘာသာ')->get();
        $Spiritual = Family::where('religion','နတ်')->get();
        $Others = Family::where('religion','အခြား')->get();
        $Buddhism_count = count($Buddhism);    	
    	$Christianity_count = count($Christianity);
        $Islam_count = count($Islam);    	
    	$Hinduism_count = count($Hinduism);
        $Spiritual_count = count($Spiritual);
        $Others_count = count($Others);

        $age_under18 = Family::where(
            'date_of_birth', '>',
            new DateTime('-18 years')
        )->get();

        $age_above18 = Family::where(
            'date_of_birth', '<=',
            new DateTime('-18 years')
        )->get();

        $under18 = count($age_under18);
        $above18 = count($age_above18);

        return view('dashboard',compact('users', 'household_count', 'family_count', 'user_count', 
                                    'role_count', 'Male_count', 'Female_count', 'Karen_count', 
                                    'Mon_count', 'Burma_count', 'Rakhaing_count', 'Shan_count',
                                    'Buddhism_count', 'Christianity_count', 'Islam_count', 'Hinduism_count', 'Spiritual_count', 'Others_count',
                                    'families', 'under18', 'above18'));
    }
}

// Ref: https://github.com/jenssegers/laravel-mongodb