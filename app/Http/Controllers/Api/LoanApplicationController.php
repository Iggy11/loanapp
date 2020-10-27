<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoanApplicationResource;
use App\Models\LoanApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoanApplicationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allLoans = LoanApplication::where('user_id', auth()->user()->id)->get();

        return new LoanApplicationResource($allLoans);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dataValidation = $request->validate([
            'amount' => 'required',
            'description' => 'required',
        ]);

        $loanApplication =  new LoanApplication();
        $loanApplication->user_id = Auth::user()->id;
        $loanApplication->amount = $request->get('amount');
        $loanApplication->description = $request->get('description');

       // dd($loanApplication);
        $loanApplication->save();

        return response()->json([
            "message" => "LoanApplication record created",
            $loanApplication
        ], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loanApplication = LoanApplication::findOrFail($id);

        return $loanApplication;
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
        $loanApplication = LoanApplication::where('id',$id)->where('user_id', \auth()->user()->id)->firstOrFail();

        if($loanApplication) {
            $loanApplication->amount = is_null($request->get('amount')) ? $loanApplication->amount : $request->get('amount');
            $loanApplication->description =
                is_null($request->get('description')) ? $loanApplication->description : $request->get('description');
            $loanApplication->save();

            return response()->json([
                "message" => "Record updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($loan_id)
    {
        $loanApplication = LoanApplication::findOrFail($loan_id);

        $loanApplication->delete();

        return response()->json(["message" => "LoanApplication record deleted"], 204);
    }
}
