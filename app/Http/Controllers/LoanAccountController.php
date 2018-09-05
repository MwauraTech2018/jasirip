<?php

namespace App\Http\Controllers;

use App\DataTables\LoanAccountDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLoanAccountRequest;
use App\Http\Requests\UpdateLoanAccountRequest;
use App\Repositories\LoanAccountRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LoanAccountController extends AppBaseController
{
    /** @var  LoanAccountRepository */
    private $loanAccountRepository;

    public function __construct(LoanAccountRepository $loanAccountRepo)
    {
        $this->middleware('auth');
        $this->loanAccountRepository = $loanAccountRepo;
    }

    /**
     * Display a listing of the LoanAccount.
     *
     * @param LoanAccountDataTable $loanAccountDataTable
     * @return Response
     */
    public function index(LoanAccountDataTable $loanAccountDataTable)
    {
        return $loanAccountDataTable->render('loan_accounts.index');
    }

    /**
     * Show the form for creating a new LoanAccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('loan_accounts.create');
    }

    /**
     * Store a newly created LoanAccount in storage.
     *
     * @param CreateLoanAccountRequest $request
     *
     * @return Response
     */
    public function store(CreateLoanAccountRequest $request)
    {
        $input = $request->all();

        $loanAccount = $this->loanAccountRepository->create($input);

        Flash::success('Loan Account saved successfully.');

        return redirect(route('loanAccounts.index'));
    }

    /**
     * Display the specified LoanAccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $loanAccount = $this->loanAccountRepository->findWithoutFail($id);

        if (empty($loanAccount)) {
            Flash::error('Loan Account not found');

            return redirect(route('loanAccounts.index'));
        }

        return view('loan_accounts.show')->with('loanAccount', $loanAccount);
    }

    /**
     * Show the form for editing the specified LoanAccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $loanAccount = $this->loanAccountRepository->findWithoutFail($id);

        if (empty($loanAccount)) {
            Flash::error('Loan Account not found');

            return redirect(route('loanAccounts.index'));
        }

        return view('loan_accounts.edit')->with('loanAccount', $loanAccount);
    }

    /**
     * Update the specified LoanAccount in storage.
     *
     * @param  int              $id
     * @param UpdateLoanAccountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoanAccountRequest $request)
    {
        $loanAccount = $this->loanAccountRepository->findWithoutFail($id);

        if (empty($loanAccount)) {
            Flash::error('Loan Account not found');

            return redirect(route('loanAccounts.index'));
        }

        $loanAccount = $this->loanAccountRepository->update($request->all(), $id);

        Flash::success('Loan Account updated successfully.');

        return redirect(route('loanAccounts.index'));
    }

    /**
     * Remove the specified LoanAccount from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $loanAccount = $this->loanAccountRepository->findWithoutFail($id);

        if (empty($loanAccount)) {
            Flash::error('Loan Account not found');

            return redirect(route('loanAccounts.index'));
        }

        $this->loanAccountRepository->delete($id);

        Flash::success('Loan Account deleted successfully.');

        return redirect(route('loanAccounts.index'));
    }
}
