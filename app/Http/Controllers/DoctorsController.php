<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\Rate;
use App\User;
use App\VisitPrice;
use App\VisitMethod;
use App\Visit;
use App\Location;
use Illuminate\Support\Facades\Auth;
use Response;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\RegistersUsers;
class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use RegistersUsers;
    protected $rules =
        [
            'name' => 'required|',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'certificates' => 'required|',
            'address' => 'required|',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    public function __construct()
    {

//        $this->middleware('auth');
    }
    public function index()
    {
        $doctors=Doctor::all();
        return view('admin_dash/admin')->with('doctors',$doctors);
    }
    public function profile()
    {
        $doctors=Doctor::all();
        $rates=Rate::all();
        $prices=VisitPrice::all();
        $methods=VisitMethod::all();
        $locations=Location::all();
        return view('doctor_dash/profile')->with('doctors',$doctors)->with('rates',$rates)->with('prices',$prices)->with('methods',$methods)->with('locations',$locations);
    }
    public function map_index()
    {
        $doctors=Doctor::all();
        $rates=Rate::all();
        $prices=VisitPrice::all();
        $methods=VisitMethod::all();
        $locations=Location::all();
        return view('patient_dash/findmap')->with('doctors',$doctors)->with('rates',$rates)->with('prices',$prices)->with('methods',$methods)->with('locations',$locations);
    }
    public function find_doctor()
    {
        $doctors=Doctor::all();
        $rates=Rate::all();
        $prices=VisitPrice::all();
        $methods=VisitMethod::all();
        $locations=Location::all();
        $visits=Visit::all();
        return view('patient_dash/finddoctor')->with('doctors',$doctors)->with('rates',$rates)->with('prices',$prices)->with('methods',$methods)->with('locations',$locations)->with('visits',$visits);
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
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{
            $user= User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'type'=>'d'
            ]);
            $doctor = new Doctor();
            $doctor->u_id=$user->id;
            $doctor->name = $request->input('name');
            $doctor->email = $request->input('email');
            $doctor->password=Hash::make($request->input('password'));
            $doctor->Certificates = $request->input('certificates');
            $doctor->address = $request->input('address');
            $doctor->cat_id = 1;
            $image= $request->file('photo');
            $ext=$image->getClientOriginalExtension();
            $fileStore=time().'.'.$ext;
            $image->move(public_path('uploads'),$fileStore);
            $doctor->photo=$fileStore;
            $rate=new Rate();
            $rate->d_id=$user->id;
            $rate->save();
            $doctor->save();
            return response()->json(array('user'=>$user,'doctor'=>$doctor,'rate'=>$rate));
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
        $user= User::find($id);
        $validator = Validator::make(Input::all(), [
            'name' => 'required|',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'certificates' => 'required|',
            'address' => 'required|',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{
            $user= User::find($id);
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->password=Hash::make($request->input('password'));
            $user->type='d';
            $doctor = Doctor::find($id);
            $doctor->u_id=$user->id;
            $doctor->name = $request->input('name');
            $doctor->email = $request->input('email');
            $doctor->password=Hash::make($request->input('password'));
            $doctor->Certificates = $request->input('certificates');
            $doctor->address = $request->input('address');
            $doctor->cat_id = 1;
            $image= $request->file('photo');
            $ext=$image->getClientOriginalExtension();
            $fileStore=time().'.'.$ext;
            $image->move(public_path('uploads'),$fileStore);
            $doctor->photo=$fileStore;
            $rate=Rate::find($id);
            $rate->d_id=$user->id;
            $rate->save();
            $doctor->save();
            return response()->json(array('user'=>$user,'doctor'=>$doctor,'rate'=>$rate));
        }
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
    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('doctors')
                    ->where('name', 'like', '%'.$query.'%')
                    ->orWhere('address', 'like', '%'.$query.'%')
                    ->orderBy('u_id', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('doctors')
                    ->orderBy('u_id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
        <tr>
         <td>'.$row->CustomerName.'</td>
         <td>'.$row->Address.'</td>
         <td>'.$row->City.'</td>
         <td>'.$row->PostalCode.'</td>
         <td>'.$row->Country.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
    public function map_index_api()
    {
        $doctors=Doctor::all();
        $rates=Rate::all();
        $prices=VisitPrice::all();
        $methods=VisitMethod::all();
        $locations=Location::all();

        return response()->json(array(
            'doctors' => $doctors,
            'rates' => $rates,
            'prices' => $prices,
            'methods' => $methods,
            'locations' => $locations,
        ));
    }
    public function find_doctor_api()
    {
        $doctors=Doctor::all();
        $rates=Rate::all();
        $prices=VisitPrice::all();
        $methods=VisitMethod::all();
        $locations=Location::all();
        $visits=Visit::all();
        return response()->json(array(
            'doctors' => $doctors,
            'rates' => $rates,
            'prices' => $prices,
            'methods' => $methods,
            'locations' => $locations,
            'visits' => $visits,
        ));
    }
}

