<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerApiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|min:32',
            'nama' => 'required|max:255',
            'alamat' => 'required',
		], [
			'required' => 'Field :attribute diperlukan',
        ]);

        $requestData = $request->only(['id', 'nama', 'alamat']);

        try {
            //return Customer::create($requestData);

            if ( Customer::create($requestData) ) {
            
                $insertedID = $request->input('id');
                $insertedRow = Customer::find($insertedID);

                $response = [
                    'id' => $insertedRow->id,
                    'nama' => $insertedRow->nama,
                    'alamat' => $insertedRow->alamat,
                ];

                $status = 200;
                return response()->json($response, $status);
            }
        } catch ( \Illuminate\Database\QueryException $e) {
            //return $e->getMessage();

            $response = [
                'errorExistingName' => 'Data nama sudah ada yang sama'
            ];
            $status = 500;

            return response()->json($response, $status);
        }
    }
}