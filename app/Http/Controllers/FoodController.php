<?php

namespace App\Http\Controllers;
use App\Food;
use App\FoodMenu;
use Illuminate\Http\Request;
use Session;
use DB;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show the food from admin page CMS
        $hostel_id = Session::get('hostel_id');
        $foods = Food::all();
        $food_menue = DB::table('food_menus as fm')
                     ->join('foods as f','fm.food_id','=','f.id')
                     ->join('food_categories as fc','fm.food_category_id','=','fc.id')
                     ->join('static_tables as st','fm.week_days_id','=','st.id')
                     ->where('fm.hostel_id',$hostel_id)
                     ->where('st.type','week_days')
                     ->select('st.urn','st.name as week_days','f.name','fc.urn as food_cat','fc.name as food_cat_name')
                     ->orderBy('st.id')
                     ->get();
        return view('cms.hostel.food_menu',compact('foods' , 'food_menue','hostel_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foods = $request->except(['_token','descrption']); // the food description must cleaned

        $data = [];
        foreach ($foods as $name => $food)
        {
            $week_time = explode('_',$name);
            $time    = $week_time[0];
            $weekday = $week_time[1];

            $foodMenu = new FoodMenu();
            $foodMenu->food_id = $food;
            $foodMenu->hostel_id = Session::get('hostel_id');
            $foodMenu->week_days_id = $weekday;
            $foodMenu->food_category_id = $time;
            $data[] = $foodMenu->attributesToArray();
        }

        $result = FoodMenu::insert($data);

         if($result)
           return redirect()->back()->with('success','Food Menue Create Succesfully');
         else
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($hostel_id)
    {
        $food_menu = FoodMenu::where('hostel_id',$hostel_id)->get();
        return view('cms.hostel.edit_food_menu',compact('food_menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $foods = $request->except(['_token','descrption']);
        $hostel_id = Session::get('hostel_id');
        $data = [];
        foreach ($foods as $name => $food)
        {
            $week_time = explode('_',$name);
            $time    = $week_time[0];
            $weekday = $week_time[1];

            FoodMenu::where('food_category_id',$time)->where('week_days_id',$weekday)->where('hostel_id',$hostel_id)->Update(['food_id' => $food]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
