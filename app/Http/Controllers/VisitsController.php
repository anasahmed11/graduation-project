<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\PaymentMethod;
use Carbon\Carbon;
use App\VisitNote;
use App\VisitMethod;
use App\Patient;
use App\Visit;
use App\Location;
use App\Rate;
use Response;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\RegistersUsers;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use RegistersUsers;
    protected $rules =
        [
            'd_id' => 'required|exists:doctors,u_id',
            'p_id' => 'required|exists:patients,u_id',
            'type_id' => 'required|exists:visit_methods,id',
            'pay_id' => 'required|exists:payment_methods,id',
            'date' => 'required|',
            'time' => 'required|',
        ];
    public function index()
    {

        $visits=Visit::where('date', '<=', Carbon::now())->get();
        $doctors=Doctor::all();
        $types=VisitMethod::all();
        $methods=PaymentMethod::all();
        $rates=Rate::all();
        $notes=VisitNote::all();
        return view('patient_dash/history')->with('doctors',$doctors)->with('rates',$rates)->with('methods',$methods)->with('types',$types)->with('visits',$visits)->with('notes',$notes);
    }
    public function statistics($id)
    {
        $visit=DB::table('visits')->select('*')->where('d_id','=',$id)->get();
        $visits=count($visit);
        $lastm=Visit::where('date', '<=', Carbon::now()->subMonth())->where('d_id','=',$id)->get();
        $last=count($lastm);
        $nextm=Visit::where('date', '>=', Carbon::now()->subMonth())->where('d_id','=',$id)->get();
        $next=count($nextm);
        $total=count($visit)*300;
        $lastearn=count($lastm)*300;
        $nextearn=count($nextm)*300;
        return view('doctor_dash/statistics')->with('next',$next)->with('total',$total)->with('last',$last)->with('visits',$visits)->with('lastearn',$lastearn)->with('nextearn',$nextearn);
    }
    public function index_api()
    {

        $visits=Visit::where('date', '<=', Carbon::now())->get();
        $doctors=Doctor::all();
        $types=VisitMethod::all();
        $methods=PaymentMethod::all();
        $rates=Rate::all();
        $notes=VisitNote::all();
        return response()->json(array(
            'visits' => $visits,
            'doctors' => $doctors,
            'types' => $types,
            'methods' => $methods,
            'rates' => $rates,
            'notes' => $notes,
        ));
    }
    public function doctor_history()
    {

        $visits=Visit::where('date', '<=', Carbon::now())->get();
        $patients=Patient::all();
        $types=VisitMethod::all();
        $methods=PaymentMethod::all();
        return view('doctor_dash/my_history')->with('patients',$patients)->with('methods',$methods)->with('types',$types)->with('visits',$visits);
    }
    public function doctor_history_api()
    {

        $visits=Visit::where('date', '<=', Carbon::now())->get();
        $patients=Patient::all();
        $types=VisitMethod::all();
        $methods=PaymentMethod::all();
        return response()->json(array(
            'visits' => $visits,
            'patients' => $patients,
            'types' => $types,
            'methods' => $methods,
        ));
    }
    public function booking_index()
    {

        $visits=Visit::where('date', '>=', Carbon::now())->get();
        $doctors=Doctor::all();
        $types=VisitMethod::all();
        $locations=Location::all();
        $methods=PaymentMethod::all();
        return view('patient_dash/booking')->with('doctors',$doctors)->with('methods',$methods)->with('types',$types)->with('visits',$visits)->with('locations',$locations);
    }
    public function booking_index_api()
    {

        $visits=Visit::where('date', '>=', Carbon::now())->get();
        $doctors=Doctor::all();
        $types=VisitMethod::all();
        $locations=Location::all();
        $methods=PaymentMethod::all();
        return response()->json(array(
            'visits' => $visits,
            'doctors' => $doctors,
            'types' => $types,
            'methods' => $methods,
            'locations' => $locations,
        ));
    }
    public function doctor_bookings()
    {

        $visits=Visit::where('date', '>=', Carbon::now())->get();
        $patients=Patient::all();
        $types=VisitMethod::all();
        $methods=PaymentMethod::all();
        return view('doctor_dash/my_bookings')->with('patients',$patients)->with('methods',$methods)->with('types',$types)->with('visits',$visits);
    }
    public function doctor_bookings_api()
    {

        $visits=Visit::where('date', '>=', Carbon::now())->get();
        $patients=Patient::all();
        $types=VisitMethod::all();
        $methods=PaymentMethod::all();
        return response()->json(array(
            'visits' => $visits,
            'patients' => $patients,
            'types' => $types,
            'methods' => $methods,
        ));
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
        $validator = Validator::make(Input::all(), [
            'd_id' => 'required|exists:doctors,u_id',
            'p_id' => 'required|exists:patients,u_id',
            'type_id' => 'required|exists:visit_methods,id',
            'pay_id' => 'required|exists:payment_methods,id',
            'date' => 'required|',
            'time' => Rule::unique('visits')->where(function ($query) {
                return $query->where('d_id',Input:: get('d_id'))->where('date', Input::get('date'));
            })
        ]);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{
            $visit = new Visit();
            $visit->d_id = $request->input('d_id');
            $visit->p_id = $request->input('p_id');
            $visit->type_id = $request->input('type_id');
            $visit->pay_id = $request->input('pay_id');
            $visit->date = $request->input('date');
            $visit->time = $request->input('time');
            $visit->save();
            return response()->json($visit);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
