<?php

namespace App\Http\Controllers\api;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $kelas = Kelas::all();
            return response()->json($kelas);
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
                'nama_kelas' => 'required',
                'tingkat' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }
            Kelas::create($request->all());
            $response = [
                'Success' => 'Kelas Baru Berhasil Dibuat',
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
            $kelas = Kelas::findOrFail($id);
            $response = [
                $kelas
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
        try {
            $kelas = Kelas::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'nama_kelas' => 'required',
                'tingkat' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'Message' => $validator->errors()]);
            }
            $kelas->update($request->all());
            $response = [
                'Success' => 'Kelas Berhasil Diubah'
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data Tidak Ditemukan',
            ]);
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
        try {
            Kelas::findOrFail($id)->delete();
            return response()->json(['success' => 'Kelas Berhasil Dihapus']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data Tidak Ditemukan'
            ]);
        }
    }
}
