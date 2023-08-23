<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $siswa = Siswa::all();
            return response()->json($siswa);
        } catch (\Throwable $th) {
            $error = [
                'error' => $th->getMessage()
            ];
            return response()->json($error);
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
        try {
            $validator = validator::make($request->all(), [
                'nama_siswa' => 'required',
                'id_kelas' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }
            Siswa::create($request->all());
            $response = [
                'Success' => 'Data Siswa Baru Berhasil Dibuat',
            ];
            return response()->json($response, 201);
        } catch (\Throwable $th) {
            $error = [
                'error' => $th->getMessage()
            ];
            return response()->json($error);
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
        try {
            $siswa = Siswa::with('nilai')->findOrFail($id);
            $response = [
                $siswa
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data Tidak Ditemukan'
            ]);
        }
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
