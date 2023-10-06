<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Http\Requests\StoredataRequest;
use App\Http\Requests\UpdatedataRequest;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = data::all();
            return response()->json(["datas"=>$data], 200);
        }catch (\Exception $e) {
            return response()->json("something wrong happened", 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredataRequest $request)
    {
        try {
            $data = $request->validated();
            $newData = data::create($data);

            return response()->json($newData, 201);

        } catch (\Exception $e) {
            return response()->json("something wrong happened", 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedataRequest $request, data $data)
    {
        try {
            $data = data::find($data->id);
            if($data) {
                $data->update($request->validated());
                return response()->json($data, 200);
            }

        } catch (\Exception $e) {
            return response()->json("something wrong happened", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(data $data)
    {
        try {
            $data = data::find($data->id);
            $data->delete();
            return response()->json("data deleted", 200);

        } catch (\Exception $e) {
            return response()->json("something wrong happened", 500);
        }
    }
}
