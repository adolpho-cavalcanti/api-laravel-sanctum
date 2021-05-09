<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $participants = Participant::with('company')->get();

        } catch (\Exception $e) {
        	return response()->json($e->getMessage());
        }
        return response()->json($participants);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $participant = Participant::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'cpf' => $data['cpf'],
                    'nascimento' => $data['nascimento'],
                    'company_id' => $data['company_id'],
                ]);                  

            DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
        	return response()->json($e->getMessage());
        }
        return response()->json($participant);
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
            $participant = Participant::findOrFail($id);

        } catch (\Exception $e) {
        	return response()->json($e->getMessage());
        }
        return response()->json($participant);
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
        DB::beginTransaction();
        try {
            $participant = Participant::findOrFail($id);
            $participant->update($request->all());

            DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
        	return response()->json($e->getMessage());
        }
        return response()->json($participant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $participant = Participant::findOrFail($id);
            $participant->delete();

            DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
        	return response()->json($e->getMessage());
        }
    }

}
