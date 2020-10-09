<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use JWTAuth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();
        if ($author && $author->count()) {
            return Response(["message" => "Show data success", "data" => $author], 200);
        }else{
            return Response(["message" => "Data not found", "data" => null], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Author::create([
            "name" => $request->name,
            "date_of_birth" => $request->date_of_birth,
            "place_of_birth" => $request->place_of_birth,
            "gender" => $request->gender,
            "email" => $request->email,
            "hp" => $request->hp,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Author::find($id);
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
        $author = Author::find($id);
        if ($author) {
            $author->name = $request->name;
            $author->date_of_birth = $request->date_of_birth;
            $author->place_of_birth = $request->place_of_birth;
            $author->gender = $request->gender;
            $author->email = $request->email;
            $author->hp = $request->hp;

            $author->save();
        }
        return $author;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();
        return "Data berhasil di hapus";
    }

    public function __construct() {
        $this->middleware('auth:api');
    }
}