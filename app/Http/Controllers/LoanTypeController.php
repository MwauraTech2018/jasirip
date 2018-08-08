<?php

namespace App\Http\Controllers;

use App\DataTables\LoanTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLoanTypeRequest;
use App\Http\Requests\UpdateLoanTypeRequest;
use App\Repositories\LoanTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LoanTypeController extends AppBaseController
{
    /** @var  LoanTypeRepository */
    private $loanTypeRepository;

    public function __construct(LoanTypeRepository $loanTypeRepo)
    {
        $this->middleware('auth');
        $this->loanTypeRepository = $loanTypeRepo;
    }

    /**
     * Display a listing of the LoanType.
     *
     * @param LoanTypeDataTable $loanTypeDataTable
     * @return Response
     */
    public function index(LoanTypeDataTable $loanTypeDataTable)
    {
        return $loanTypeDataTable->render('loan_types.index');
    }

    /**
     * Show the form for creating a new LoanType.
     *
     * @return Response
     */
    public function create()
    {
        return view('loan_types.create');
    }

    /**
     * Store a newly created LoanType in storage.
     *
     * @param CreateLoanTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateLoanTypeRequest $request)
    {
        $input = $request->all();

        $loanType = $this->loanTypeRepository->create($input);

        Flash::success('Loan Type saved successfully.');

        return redirect(route('loanTypes.index'));
    }

    /**
     * Display the specified LoanType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $loanType = $this->loanTypeRepository->findWithoutFail($id);

        if (empty($loanType)) {
            Flash::error('Loan Type not found');

            return redirect(route('loanTypes.index'));
        }

//        return view('loan_types.show')->with('loanType', $loanType);
        return response()->json($loanType);

    }

    /**
     * Show the form for editing the specified LoanType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $loanType = $this->loanTypeRepository->findWithoutFail($id);

        if (empty($loanType)) {
            Flash::error('Loan Type not found');

            return redirect(route('loanTypes.index'));
        }

//        return view('loan_types.edit')->with('loanType', $loanType);
        return response()->json($loanType);
    }

    /**
     * Update the specified LoanType in storage.
     *
     * @param  int              $id
     * @param UpdateLoanTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoanTypeRequest $request)
    {
        $loanType = $this->loanTypeRepository->findWithoutFail($id);

        if (empty($loanType)) {
            Flash::error('Loan Type not found');

            return redirect(route('loanTypes.index'));
        }

        $loanType = $this->loanTypeRepository->update($request->all(), $id);

        Flash::success('Loan Type updated successfully.');

        return redirect(route('loanTypes.index'));
    }

    /**
     * Remove the specified LoanType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $loanType = $this->loanTypeRepository->findWithoutFail($id);

        if (empty($loanType)) {
            Flash::error('Loan Type not found');

            return redirect(route('loanTypes.index'));
        }

        $this->loanTypeRepository->delete($id);

        Flash::success('Loan Type deleted successfully.');

        return redirect(route('loanTypes.index'));
    }
}
