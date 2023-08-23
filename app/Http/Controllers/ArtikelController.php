<?php

namespace App\Http\Controllers;

use App\Models\ArikelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{

    public function getAllData()
    {
        $data = ArikelModel::all();

        return response()->json([
            'data' => $data
        ]);
    }

    public function createData(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'description' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => 'check your validation',
                'errors' => $validation->errors()
            ]);
        }

        try {
            $data = new ArikelModel;

            $data->description = [
                'en' => $request->input('description'),
                'id' => 'Deskripsi dalam Bahasa Indonesia: ' . $request->input('description'),
            ];

            $data->save();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed',
                'errors' => $th->getMessage()
            ]);
        }

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
}
