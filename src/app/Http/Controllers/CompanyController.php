<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $companies = Company::with('participant')->get();
            
        } catch (\Exception $e) {
        	return response()->json($e->getMessage());
        }
        return response()->json($companies);
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
            $company = Company::create([
                'cnpj' => $request['cnpj'],
                'razao_social' => $request['razao_social']
            ]);

            DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
        	return response()->json($e->getMessage());
        }

        return response()->json($company);
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
            $company = Company::findOrFail($id);

        } catch (\Exception $e) {
        	return response()->json($e->getMessage());
        }
        return response()->json($company);
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
            $company = Company::findOrFail($id)
            ->update([
                'cnpj' => $request['cnpj'],
                'razao_social' => $request['razao_social']
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
        }
        
        return response()->json($company);

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
            $company = Company::findOrFail($id);
            $company->delete();
            
            DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
        	return response()->json($e->getMessage());
        }
    }
    
}
