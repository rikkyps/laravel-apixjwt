<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Section;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Section::all();
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'class_id' => 'required',
            'name' => 'required|unique:subjects|max:25',
        ]);

        $data = Section::create($request->all());
        return response('Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Section::find($id);
        if ($data == null){
            return response('Data tidak ditemukan!');
        }
        return response()->json($data);
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
        $validator = $request->validate([
            'name' => 'required|unique:subjects,name,'.$id.'|max:25',
        ]);

        $data = Section::find($id);
        $data->update($request->all());
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Section::find($id);
        if ($data == null){
            return response('Data tidak ditemukan!');
        }
        $data->delete();
        return response('Data berhasil dihapus!');
    }
}
