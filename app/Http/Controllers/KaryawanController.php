<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Karyawan::get();

        return response()->json([
            'code'  => 'SUCCESS',
            'message' => 'data karyawan',
            'data' => $data
        ], 200);
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
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);

        $karyawan = Karyawan::create([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
            'umur' => $request->input('umur'),
            'alamat' => $request->input('alamat'),
            'foto' => $request->input('foto')
        ]);

        return response()->json([
            'code' => 'SUCCESS',
            'message' => 'karyawan dibuat',
            'data' => $karyawan
        ], 201);
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
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->nama = $request->input('nama');
        $karyawan->jabatan = $request->input('jabatan');
        $karyawan->umur = $request->input('umur');
        $karyawan->alamat = $request->input('alamat');
        $karyawan->foto = $request->input('foto');

        $karyawan->update();

        return response()->json([
            'code' => 'SUCCESS',
            'message' => 'data updated',
            'data' => $karyawan
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return response()->json([
            'code' => 'SUCCESS',
            'message' => 'berhasil dihapus',
        ], 200);
    }
}
