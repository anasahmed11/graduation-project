<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use App\VisitPrice;
use App\VisitMethod;
use App\Visit;
use Response;
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
        //
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
