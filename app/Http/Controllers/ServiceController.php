<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        try {
            $services = Service::all();
            $response = [
                $services
            ];
            return response()->json([
                'status' => 200,
                'data' => $response
            ]);
        } catch (\Throwable $th) {
            $error = [
                'error' => $th->getMessage()
            ];
            return response()->json($error, 500);
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = validator::make($request->all(), [
                "type" => 'required',
                "vendor" => 'required',
                "attentionTo" => 'required',
                "quotationNo" => 'required',
                "invoice" => 'required',
                "customer" => 'required',
                "vendorAddress" => 'required',
                "noPoCustomer" => 'required',
                'cost' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }
            Service::create($request->all());
            $response = [
                'Success' => 'Input Data Service Berhasil',
            ];
            return response()->json($response, 201);
        } catch (\Throwable $th) {
            $error = [
                'error' => $th->getMessage()
            ];
            return response()->json($error);
        }
    }

    public function show($id)
    {
        try {
            $services = Service::findOrFail($id);
            $response = [
                $services
            ];
            return response()->json([
                'status' => 200,
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data Tidak Ditemukan',
                'status' => 500
            ]);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $service = Service::findOrFail($id);
            $validator = Validator::make($request->all(), [
                "type" => 'required',
                "vendor" => 'required',
                "quotation" => 'required',
                "invoice" => 'required',
                "customer" => 'required',
                "vendorAddress" => 'required',
                "noPoCustomer" => 'required',
                'cost' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'Message' => $validator->errors()]);
            }
            $service->update($request->all());
            $response = [
                'Success' => 'Data Service Berhasil Diubah'
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data Tidak Ditemukan',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            Vendor::findOrFail($id)->delete();
            return response()->json(['success' => 'Data Kelas Berhasil Dihapus']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data Tidak Ditemukan'
            ]);
        }
    }
}
