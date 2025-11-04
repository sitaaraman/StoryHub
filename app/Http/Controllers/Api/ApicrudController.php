<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apicrud;

class ApicrudController extends Controller
{
    public function index()
    {
        return response()->json(Apicrud::all(),200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password'=>'required'
        ]);
        $data = Apicrud::create($validated);
        return response()->json($data,201);
    }

    public function show($id)
    {
        $data = Apicrud::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Apicrud::find($id);
        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Apicrud::find($id);
        $data->delete();
        return response()->json("deleted",200);
    }
}
