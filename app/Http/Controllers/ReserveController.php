<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReserveController extends Controller
{
    public function index()
    {
        $tables = DB::table('tables')->get();
        $reservations = "";
        if(Auth::check()) {
            $reservations = Reservation::where('customer_id', '=', auth()->user()->id)->get();
        }
        // $reservations = Reservation::where('customer_id', '=', auth()->user()->id)->get();
        else {
            $reservations = Reservation::all();
    }
        return view('reservation.index', ['tables' => $tables, 'reservations' => $reservations]);
    }

    public function table($id)
    {
        $table = Table::find($id);
        return view('reservation.table', ['table' => $table]);
//        dd($table);
    }

    public function reserve(Request $request, $id)
    {
        $table = Table::find($id);
        $table->status = 1;
        $table->save();

        $reservation = new Reservation;
        $reservation->table_id = $table->id;
        $reservation->customer_id = Auth::user()->id;
        $reservation->save();
        return redirect('/reserve');
    }

    public function cancel(Request $request, $id)
    {
        $table = Table::find($id);
        $table->status = 0;
        $table->save();

//         $reservation = Reservation::find($id);
//         $reservation->delete();
//dd($reservation);
        return redirect('/reserve');
    }

    public function payment($id){
        $table = Table::find($id);
        return view('reservation.payment',['table' => $table]);
    }


    public function postPayment(Request $request, $id){

        $table = Table::find($id);
        $table->status = 1;
        $table->save();

        $reservation = new Reservation;
        $reservation->table_id = $table->id;
        $reservation->customer_id = Auth::user()->id;
        $reservation->save();
        Session::flash('success', 'Reservation is saved!');
        return redirect()->route('reserve');
    }
}
