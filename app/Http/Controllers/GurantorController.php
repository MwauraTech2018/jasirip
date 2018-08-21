<?php

namespace App\Http\Controllers;

use App\DataTables\GurantorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGurantorRequest;
use App\Http\Requests\UpdateGurantorRequest;
use App\Models\LoanApplication;
use App\Models\Masterfile;
use App\Models\Payment;
use App\Models\Saving;
use App\Repositories\GurantorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GurantorController extends AppBaseController
{
    /** @var  GurantorRepository */
    private $gurantorRepository;

    public function __construct(GurantorRepository $gurantorRepo)
    {
        $this->gurantorRepository = $gurantorRepo;
    }

    /**
     * Display a listing of the Gurantor.
     *
     * @param GurantorDataTable $gurantorDataTable
     * @return Response
     */
    public function index(GurantorDataTable $gurantorDataTable)
    {
        return $gurantorDataTable->render('gurantors.index',[

            'loans'=>LoanApplication::where('status',false)->with(['masterfile'])->get(),
            'clients'=>Masterfile::where('b_role',client)->get()

        ]);


    }

    /**
     * Show the form for creating a new Gurantor.
     *
     * @return Response
     */
    public function create()
    {
        return view('gurantors.create');
    }

    /**
     * Store a newly created Gurantor in storage.
     *
     * @param CreateGurantorRequest $request
     *
     * @return Response
     */
    public function store(CreateGurantorRequest $request)
    {
        $input = $request->all();
        $name=Masterfile::where('id',$request->mem_no)->first();
//        dd($name->full_name);
        $input['name']=$name->full_name;
        $gurantor = $this->gurantorRepository->create($input);

        Flash::success('Gurantor saved successfully.');

        return redirect(route('gurantors.index'));
    }

    /**
     * Display the specified Gurantor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gurantor = $this->gurantorRepository->findWithoutFail($id);

        if (empty($gurantor)) {
            Flash::error('Gurantor not found');

            return redirect(route('gurantors.index'));
        }

        return view('gurantors.show')->with('gurantor', $gurantor);
    }

    /**
     * Show the form for editing the specified Gurantor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gurantor = $this->gurantorRepository->findWithoutFail($id);

        if (empty($gurantor)) {
            Flash::error('Gurantor not found');

            return redirect(route('gurantors.index'));
        }

        return view('gurantors.edit')->with('gurantor', $gurantor);
    }

    /**
     * Update the specified Gurantor in storage.
     *
     * @param  int              $id
     * @param UpdateGurantorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGurantorRequest $request)
    {
        $gurantor = $this->gurantorRepository->findWithoutFail($id);

        if (empty($gurantor)) {
            Flash::error('Gurantor not found');

            return redirect(route('gurantors.index'));
        }

        $gurantor = $this->gurantorRepository->update($request->all(), $id);

        Flash::success('Gurantor updated successfully.');

        return redirect(route('gurantors.index'));
    }

    /**
     * Remove the specified Gurantor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gurantor = $this->gurantorRepository->findWithoutFail($id);

        if (empty($gurantor)) {
            Flash::error('Gurantor not found');

            return redirect(route('gurantors.index'));
        }

        $this->gurantorRepository->delete($id);

        Flash::success('Gurantor deleted successfully.');

        return redirect(route('gurantors.index'));
    }
}
