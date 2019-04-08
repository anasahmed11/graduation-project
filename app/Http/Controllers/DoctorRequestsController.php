<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DoctorRequest;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;
class DoctorRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules =
        [
            'name' => 'required',
            'email' => 'required|email|unique:doctor_requests,email',
            'phone' => 'required',
            'certificates' => 'required',
            'age' => 'required|numeric',
            'experience' => 'required|numeric',
        ];
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }
    public function index()
    {
        //
        $doctor_r=DoctorRequest::all();
        return view('admin_dash/doctor-request')->with('doctor_r',$doctor_r);
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
            $doctor = new DoctorRequest();
            $doctor->name = $request->input('name');
            $doctor->email = $request->input('email');
            $doctor->phone = $request->input('phone');
            $doctor->certificates = $request->input('certificates');
            $doctor->age = $request->input('age');
            $doctor->experience = $request->input('experience');
            $doctor->save();
            return response()->json($doctor);
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
        $doctor_r = DoctorRequest::find($id);
        $doctor_r->delete();
        return response()->json($doctor_r);
    }
}
