<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class NilaiController extends Controller
{

    public function index()
    {
        try {
            $nilai = Nilai::all();
            return response()->json($nilai);
        } catch (\Throwable $th) {
            $error = [
                'error' => $th->getMessage()
            ];
            return response()->json($error);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = validator::make($request->all(), [
                'nilai_ls1' => 'required',
                'nilai_ls2' => 'required',
                'nilai_ls3' => 'required',
                'nilai_ls4' => 'required',
                'nilai_uh1' => 'required',
                'nilai_uh2' => 'required',
                'nilai_uts' => 'required',
                'nilai_uas' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }
            Nilai::create($request->all());
            $response = [
                'Success' => 'Input Nilai Baru Berhasil',
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
            $nilai = Nilai::findOrFail($id);
            $response = [
                $nilai
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
            $nilai = Nilai::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'nilai_ls1' => 'required',
                'nilai_ls2' => 'required',
                'nilai_ls3' => 'required',
                'nilai_ls4' => 'required',
                'nilai_uh1' => 'required',
                'nilai_uh2' => 'required',
                'nilai_uts' => 'required',
                'nilai_uas' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'Message' => $validator->errors()]);
            }
            $nilai->update($request->all());
            $response = [
                'Success' => 'Data Nilai Berhasil Diubah'
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
            Nilai::findOrFail($id)->delete();
            return response()->json(['success' => 'Data Nilai Berhasil Dihapus']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data Tidak Ditemukan'
            ]);
        }
    }
}
