<?php

namespace App\Http\Controllers;

use App\DataTables\LoanApplicationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLoanApplicationRequest;
use App\Http\Requests\UpdateLoanApplicationRequest;
use App\Models\Gurantor;
use App\Models\LoanAccount;
use App\Models\LoanApplication;
use App\Models\LoanType;
use App\Models\Masterfile;
use App\Models\Payment;
use App\Models\User;
use App\Repositories\LoanApplicationRepository;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;

class LoanApplicationController extends AppBaseController
{
    /** @var  LoanApplicationRepository */
    private $loanApplicationRepository;

    public function __construct(LoanApplicationRepository $loanApplicationRepo)
    {
        $this->middleware('auth');
        $this->loanApplicationRepository = $loanApplicationRepo;
    }

    /**
     * Display a listing of the LoanApplication.
     *
     * @param LoanApplicationDataTable $loanApplicationDataTable
     * @return Response
     */
    public function index(LoanApplicationDataTable $loanApplicationDataTable)
    {
//        $mem=Masterfile::where('b_role',client)->get();
//        dd($mem);
        return $loanApplicationDataTable->render('loan_applications.index',[
            'members'=>Masterfile::where('b_role',client)->get(),
            'loantypes'=>LoanType::all()
        ]);
    }

    /**
     * Show the form for creating a new LoanApplication.
     *
     * @return Response
     */
    public function create()
    {
        return view('loan_applications.create');
    }

    /**
     * Store a newly created LoanApplication in storage.
     *
     * @param CreateLoanApplicationRequest $request
     *
     * @return Response
     */
    public function store(CreateLoanApplicationRequest $request)
    {
        $input = $request->all();

//        dd($input);

        $input['created_by']=Auth::user()->id;
        $input['status']=false;
        $balz=Payment::where('client_id',$request->mem_no)
                        ->where('service_id',2)->sum('amount');
        if($request->applied_amt > $balz*3){
            Flash::Error('Loan Exceeds expected amount.');
            return redirect(route('loanApplications.index'));
        }

        $loanApplication = $this->loanApplicationRepository->create($input);

        Flash::success('Loan Application saved successfully.');

        return redirect(route('loanApplications.index'));
    }

    /**
     * Display the specified LoanApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $loanApplication = $this->loanApplicationRepository->findWithoutFail($id);

        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }

//        return view('loan_applications.show')->with('loanApplication', $loanApplication);
//        return response()->json(' $loanApplication ');
        return response()->json($loanApplication);
    }

    /**
     * Show the form for editing the specified LoanApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $loanApplication = $this->loanApplicationRepository->findWithoutFail($id);

        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }

//        return view('loan_applications.edit')->with('loanApplication', $loanApplication);

        return response()->json(' $loanApplication ');

    }

    /**
     * Update the specified LoanApplication in storage.
     *
     * @param  int              $id
     * @param UpdateLoanApplicationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoanApplicationRequest $request)
    {
        $loanApplication = $this->loanApplicationRepository->findWithoutFail($id);
        $input=$request->all();
//        dd($input);

        $input['approved_by']=Auth::user()->id;
        $input['approval_date']=Carbon::now();
        $loantype=LoanType::where('id',$request->loan_type_id)->first();
//        $int=LoanType::query()
//            ->where('id','=',$request->loan_type_id)->get();
////        $all=10*$int->int;
///
///
//           $int=$loantype->id;
        $input['balance_todate']=($request->approved_amt*$loantype->int/100)+($request->approved_amt);

//            print_r($loantype->toArray());die();



        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }

        $loanApplication = $this->loanApplicationRepository->update($input, $id);

        Flash::success('Loan Application updated successfully.');

        return redirect(route('loanApplications.index'));
    }

    public function loanapproval($id)
        {

        $loanApplication = $this->loanApplicationRepository->findWithoutFail($id);
        $input = $request->all();
        dd($input);

        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }

        $loanApplication = $this->loanApplicationRepository->update($input,$id);

        Flash::success('Loan Application updated successfully.');

        return redirect(route('loanApplications.index'));

    }

    /**
     * Remove the specified LoanApplication from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $loanApplication = $this->loanApplicationRepository->findWithoutFail($id);

        if (empty($loanApplication)) {
            Flash::error('Loan Application not found');

            return redirect(route('loanApplications.index'));
        }

        $this->loanApplicationRepository->delete($id);

        Flash::success('Loan Application deleted successfully.');

        return redirect(route('loanApplications.index'));
    }
    public function details($id)
        {
                $details=Gurantor::where('loan_id',$id)->get();

//                print_r($details->toArray());die;
                return response()->json($details);
//            echo json_encode($details);
        }
        public function disburse($id)
        {
            $loan=LoanApplication::where('id',$id)->first();
//            print_r($loan->toArray());dd($loan);
            $intr=LoanType::where('id',$loan->loan_type_id)->first();
//            print_r($intr->toArray());
            $loggeduser=Auth::user()->id;
//            print_r($loan->toArray());dd($loan);
            $balz=Payment::where('client_id',$loan->mem_no)
                ->where('service_id',2)->sum('amount');
//            print_r($balz);die;
             $gurtotal=Gurantor::where('loan_id',$id)->sum('amount');
             $gurantors=Gurantor::where('loan_id',$id)->get();
//            print_r($gurantors->toArray());die;
//die;
//            echo $test=$loan->approved_amt;die;
            if($loan->approved_amt > $balz){
                if($gurtotal == 0){
//                    print_r($gurtotal);die;
                    Flash::error('Kindly attach gurantors.');
                    return redirect(route('loanApplications.index'));

                }
//                else{
//                    foreach ($gurantors as $guranted){
//                        echo $guranted->id.'-'.$guranted->amount.'<br>';
//                    }
//                    die;
//
//                }
            }
             if(!is_null($loan->approved_amt)){
                 if($loan->approved_by == $loggeduser){
                     Flash::error('User not allowed to disburse loan.');
                 return redirect(route('loanApplications.index'));
                 }

//                 $loan4=LoanApplication::findOrFail($id)->update(['disburse'=>Auth::user()->id]);
////                                                   ->update(['status'=>1]);
//                 $loan2=LoanApplication::findOrFail($id)->update(['status'=>true]);
                 DB::transaction(function () use ($loan,$id) {

                     $loan4=LoanApplication::findOrFail($id)->update(['disburse'=>Auth::user()->id]);
//                                                   ->update(['status'=>1]);
                     $loan2=LoanApplication::findOrFail($id)->update(['status'=>true]);

                     $acc=LoanAccount::create([
                         'loan_id' =>$loan->id,
                         'mem_no' =>$loan->mem_no,
                         'transaction_type' =>credit,
                         'date' => Carbon::now(),
                         'amount' => $loan->approved_amt,
                         'received_by' => Auth::user()->id

                     ]);
//                     $loan->save();


                         });
                 return redirect(route('loanApplications.index'));
//                 print_r($loan->toArray());dd($loan);


             }else{

                 Flash::error('To disburse loan you must update loan amount.');
                 return redirect(route('loanApplications.index'));
             }

//            $add=LoanApplication::create([
//                'mem_no'=>$loan->mem_no

        }
}
