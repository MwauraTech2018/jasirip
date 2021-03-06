<?php

namespace App\Http\Controllers;

use App\DataTables\SavingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSavingRequest;
use App\Http\Requests\UpdateSavingRequest;
use App\Models\Bank;
use App\Models\CustomerAccount;
use App\Models\Masterfile;
use App\Models\Payment;
use App\Models\ServiceOption;
use App\Repositories\SavingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Response;

class SavingController extends AppBaseController
{
    /** @var  SavingRepository */
    private $savingRepository;

    public function __construct(SavingRepository $savingRepo)
    {
        $this->middleware('auth');
        $this->savingRepository = $savingRepo;
    }

    /**
     * Display a listing of the Saving.
     *
     * @param SavingDataTable $savingDataTable
     * @return Response
     */
    public function index(SavingDataTable $savingDataTable)
//

//    dd($client);
    {
        return $savingDataTable->render('savings.index',[

            'clients'=>Masterfile::where('b_role',client)->get(),
            'services'=>ServiceOption::all(),
            'banks'=>Bank::all()
//            Masterfile::where('b_role',landlord)->get(),
//            newQuery()->where('b_role',\client)->orderBy('id');
        ]);
//
//            'payments'=>Payment::all()
//        ]);
    }

    /**
     * Show the form for creating a new Saving.
     *
     * @return Response
     */
    public function create()
    {
        return view('savings.create');
    }

    /**
     * Store a newly created Saving in storage.
     *
     * @param CreateSavingRequest $request
     *
     * @return Response
     */
    public function store(CreateSavingRequest $request)
    {
        $input = $request->all();

        $this->validate($request,[
            'ref_number'=>'required|unique:payments,ref_number'
//            'phone_number'=>'required|unique:masterfiles,phone_number'
            ]);

//        dd($input);die;


        $payment=Payment::create([

            'payment_mode'=>$request->payment_mode,
            'service_id'=>$request->service_id,
            'client_id'=>$request->client_id,
            'ref_number'=>$request->ref_number,
            'bank_id'=>$request->bank_id,
            'amount'=>$request->amount,
            'received_on'=>$request->received_on
//            'received_on'=>Carbon::now()
        ]);

        DB::transaction(function ()use($payment,$request)
        {

                    $acc=CustomerAccount::create([
                        'client_id'=>$request->client_id,
                        'payment_id'=>$payment->id,
                        'ref_number'=>$request->ref_number,
                        'transaction_type'=>debit,
                        'date'=>$request->received_on,
                        'amount'=>$payment->amount
                    ]);
                    $payment->status=true;
                    $payment->save();

        });


//        $saving = $this->savingRepository->create($input);
//
//        Flash::success('Saving saved successfully.');


        return redirect(route('savings.index'));
    }

    /**
     * Display the specified Saving.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $saving = $this->savingRepository->findWithoutFail($id);

        if (empty($saving)) {
            Flash::error('Saving not found');

            return redirect(route('savings.index'));
        }

        return view('savings.show')->with('saving', $saving);
    }

    /**
     * Show the form for editing the specified Saving.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $saving = $this->savingRepository->findWithoutFail($id);

        if (empty($saving)) {
            Flash::error('Saving not found');

            return redirect(route('savings.index'));
        }

        return view('savings.edit')->with('saving', $saving);
    }

    /**
     * Update the specified Saving in storage.
     *
     * @param  int              $id
     * @param UpdateSavingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSavingRequest $request)
    {
        $saving = $this->savingRepository->findWithoutFail($id);

        if (empty($saving)) {
            Flash::error('Saving not found');

            return redirect(route('savings.index'));
        }

        $saving = $this->savingRepository->update($request->all(), $id);

        Flash::success('Saving updated successfully.');

        return redirect(route('savings.index'));
    }

    /**
     * Remove the specified Saving from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $saving = $this->savingRepository->findWithoutFail($id);

        if (empty($saving)) {
            Flash::error('Saving not found');

            return redirect(route('savings.index'));
        }

        $this->savingRepository->delete($id);

        Flash::success('Saving deleted successfully.');

        return redirect(route('savings.index'));
    }
    public function savbalance($id)
    {
        $balz=0;
            $balz=Payment::where('client_id',$id)
                    ->where('service_id',2)
                    ->sum('amount');

            if(!$balz){
                $bal=1;

                return response()->json($bal);
//                return redirect(route('gurantors.index'));
//
//
//                Flash::success('Member has no existing savings.');

            }
                return response()->json($balz);


    }
}
