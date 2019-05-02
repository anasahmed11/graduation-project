<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Doctor;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;
class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules =
        [
            'name' => 'required|',
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
            'd_id' => 'required|numeric',
        ];
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $locations=Location::all();
        return view('admin_dash/locations')->with('locations',$locations);
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
            $doctor_id = Doctor::find($request->input('d_id'));
            if($doctor_id){
                $location=new Location();
                $location->name = $request->input('name');
                $location->long = $request->input('long');
                $location->lat = $request->input('lat');
                $location->d_id = $request->input('d_id');
                $location->save();
                return response()->json($location);
            }else{
                $location='doctor not found in doctor table';
                return response()->json($location);
            }
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
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{
            $doctor_id = Doctor::find($request->input('d_id'));
            if($doctor_id){
                $location=Location::find($id);
                $location->name = $request->input('name');
                $location->long = $request->input('long');
                $location->lat = $request->input('lat');
                $location->d_id = $request->input('d_id');
                $location->save();
                return response()->json($location);
            }else{
                $location='doctor not found in doctor table';
                return response()->json($location);
            }
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
}
