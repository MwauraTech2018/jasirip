<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\LoanApplicationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLoanApplicationRequest;
use App\Http\Requests\UpdateLoanApplicationRequest;
use App\Models\LoanType;
use App\Models\Masterfile;
use App\Repositories\LoanApplicationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Response;

class LoanApproval extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateLoanApplicationRequest  $request)
    {
        //
        $loanApplication = $this->loanApplicationRepository->findWithoutFail($id);
        $input=$request->all();

        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }

        $loanApplication = $this->loanApplicationRepository->update($input, $id);

        Flash::success('Loan Application updated successfully.');

        return redirect(route('loanApplications.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
