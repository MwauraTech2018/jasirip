<?php

namespace App\Http\Controllers;

use App\DataTables\SavingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSavingRequest;
use App\Http\Requests\UpdateSavingRequest;
use App\Repositories\SavingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SavingController extends AppBaseController
{
    /** @var  SavingRepository */
    private $savingRepository;

    public function __construct(SavingRepository $savingRepo)
    {
        $this->savingRepository = $savingRepo;
    }

    /**
     * Display a listing of the Saving.
     *
     * @param SavingDataTable $savingDataTable
     * @return Response
     */
    public function index(SavingDataTable $savingDataTable)
    {
        return $savingDataTable->render('savings.index');
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

        $saving = $this->savingRepository->create($input);

        Flash::success('Saving saved successfully.');

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
}
