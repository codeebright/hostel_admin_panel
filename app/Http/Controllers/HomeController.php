<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\input;
use Illuminate\Http\Request;
use App\Attachment;
class HomeController extends Controller
{

  public function roomFilter()
  {
      return view('front.roomFilter_index');
  }

    public function __construct()
    {
//        $this->middleware('auth');
    }
    // view the index/home page
        public function fontIndex(Request $request)
        {

            $hostels = DB::table('hostels')
          //      ->join('attachments','attachments.id','=','hostels.id')
               ->join('rooms','rooms.id','=','hostels.id')
               ->select('hostels.*','rooms.*')->get();

            return view('front/index', compact('hostels'));
        }

        // home search function by address
        public function homeSearch(Request $request)
        {
            $query =  Input::get('q');
            if ($query != ''){
                $address = DB::table('hostels')
                    ->join('addresses','addresses.id','=','hostels.id')
                    ->join('attachments','attachments.id','=','hostels.id')
                    ->join('rooms','rooms.id','=','hostels.id')
                    ->where('province','LIKE','%'.$query.'%')
                    ->where('state','LIKE','%'.$query.'%')
                    ->orwhere('rood','LIKE','%'.$query.'%')
                    ->orwhere('station','LIKE','%'.$query.'%')
                    ->orwhere('alley','LIKE','%'.$query.'%')
                    ->select('hostels.*','addresses.*','attachments.*','rooms.*')->get();
                if (count($address)>0)
                  return view('front/roomFilter_index',compact('address'))->withDetails($address)->withQuery($query);
                elseif ($address != $query){
                    $request->session()->flash('alert-danger','جستجوی شما دریافت نشد لطفا دوباره کوشش نمایید!');
                    return back();
                }
            }
            else{
                $request->session()->flash('alert-danger','شما هیچ آدرسی وارید نکردید لطفا آدرسی را وارید کنید!');
                return back();
            }
        }
}
