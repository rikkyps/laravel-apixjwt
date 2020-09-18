<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::all();
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
            'name' => 'required',
            'phone' => 'required|unique:students',
            'email' => 'email|required',
            'password' => 'required|min:6',
            'photo' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        $data = new Student;
        $data->class_id = $request->class_id;
        $data->section_id = $request->section_id;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->photo = $request->photo;
        $data->save();

        return response('Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::find($id);
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
            'name' => 'required',
            'phone' => 'required|unique:students,phone,'.$id,
            'email' => 'email|required',
            'password' => 'required|min:6',
            'photo' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        $data = Student::find($id);
        if($data == null) {
            return response('Data tidak ditemukan!');
        }
        $data->update($request->all());
        return response('Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::find($id);

        if($data == null){
            return response('Data tidak ditemukan!');
        } else {
            unlink($data->photo);
            $data->delete();
            return response('Data berhasil dihapus!');
        }
    }
}
