<?php

namespace App\Http\Controllers;

use App\room;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth as JWTAuth;

class RoomController extends Controller
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
            $rooms = Room::orderBy('id', 'asc')->with('user')->get();
            $respose = [
                'msg' => 'Rooms List',
                'data' => $rooms
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
                $table->string('access_key');
                $table->unsignedInteger('user_id');
                $table->integer('access_count');
                $table->integer('capacity');
            */

            try {

                //Validar entradas
                $this->validate($request, [
                    'capacity' => 'required|max:30|min:2',
                ]);

                //Get autheticaded user
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['msj' => 'Usuario no encontrado'], 404);
                }
            } catch (\Illuminate\Validation\ValidationException $e) {
                return $this->responseErrors($e->errors(), 400);
            }

            $key = '';
            $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
            $max = strlen($pattern)-1;
            for($i=0;$i < 8;$i++) $key .= $pattern{mt_rand(0,$max)};

            //Create the room objext to insert
            $room = new Room();
            $room->access_key  = $key;
            $room->user_id = $user->id;
            $room->access_count = 0;
            $room->capacity = $request->capacity;
            $room->valid = 1;

            if ($room->save()) {
                $roomv = new Room();
                $roomv = $roomv->where('id', $room->id)->first();
                $response = [
                    'msg' => 'Room created succesfully!',
                    'data' => $roomv
                ];
                return response()->json($response, 201);
            }
            $response = [
                'msg' => 'Something went wrong with the room creation'
            ];
            return response()->json($response, 412);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(room $room)
    {
        //
    }
}
