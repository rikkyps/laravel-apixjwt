<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Sclass;
use Validator;

class SclassController extends Controller
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
        $sclass = Sclass::all();
        return response()->json($sclass);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:sclasses|max:25'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Data gagal dibuat!',
                'error' => $validator->errors()
            ]);
        }

        $request['name'] = $request->name;
        $data = Sclass::create($request->all());
        return response()->json([
            'msg' => 'Data berhasil dibuat!',
            'data' => $data
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
        $data = Sclass::find($id);
        if($data == null){
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
            'name' => 'required|max:25|unique:sclasses,name,'.$id
        ]);

        $data = Sclass::find($id);
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
        $data = Sclass::find($id);
        if($data == null) {
            return response('Data tidak ditemukan!');
        }
        $data->delete();
        return response('Data berhasil dihapus');
    }
}
