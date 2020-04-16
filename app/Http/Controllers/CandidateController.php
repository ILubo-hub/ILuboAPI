<?php

namespace App\Http\Controllers;

use App\candidate;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth as JWTAuth;

class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => [
            'index', 'store'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['msj' => 'Usuario no encontrado'], 404);
            }
            $candidates = Candidate::orderBy('id', 'asc')->with('team')->get();
            $respose = [
                'msg' => 'Candidates List',
                'data' => $candidates
            ];
            return response()->json($respose, 201);
        } catch (\Exception $e) {
            return response()->json(
                utf8_encode($e->getMessage()),
                422
            );
        }
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
    /*
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('photo_source');
            $table->unsignedInteger('team_id');
        */

        try {
            //Validar entradas
            $this->validate($request, [
                'name' => 'required',
                'lastname' => 'required',
                'photo_source' => 'required',
                'team_id' => 'required'
            ]);

            //Get autheticaded user
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['msj' => 'User not Found'], 404);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 400);
        }

        //Create the room objext to insert
        $candidate = new candidate();
        $candidate->name  = $request->name;
        $candidate->lastname = $request->lastname;
        $candidate->photo_source = $request->photo_source;
        $candidate->team_id = $request->team_id;
        $candidate->valid = 1;

        if ($candidate->save()) {
            $candidatev = new Candidate();
            $candidatev = $candidatev->where('id', $candidate->id)->first();
            $response = [
                'msg' => 'Candidate created succesfully!',
                'data' => $candidatev
            ];
            return response()->json($response, 201);
        }
        $response = [
            'msg' => 'Something went wrong with the candidate creation'
        ];
        return response()->json($response, 412);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(candidate $candidate)
    {
        //
    }
}
