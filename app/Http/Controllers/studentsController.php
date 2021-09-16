<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestudentsRequest;
use App\Http\Requests\UpdatestudentsRequest;
use App\Repositories\studentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class studentsController extends AppBaseController
{
    /** @var  studentsRepository */
    private $studentsRepository;

    public function __construct(studentsRepository $studentsRepo)
    {
        $this->studentsRepository = $studentsRepo;
    }

    /**
     * Display a listing of the students.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $students = $this->studentsRepository->all();

        return view('students.index')
            ->with('students', $students);
    }

    /**
     * Show the form for creating a new students.
     *
     * @return Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created students in storage.
     *
     * @param CreatestudentsRequest $request
     *
     * @return Response
     */
    public function store(CreatestudentsRequest $request)
    {
        $input = $request->all();

        $students = $this->studentsRepository->create($input);

        Flash::success('Students saved successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Display the specified students.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $students = $this->studentsRepository->find($id);

        if (empty($students)) {
            Flash::error('Students not found');

            return redirect(route('students.index'));
        }

        return view('students.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified students.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $students = $this->studentsRepository->find($id);

        if (empty($students)) {
            Flash::error('Students not found');

            return redirect(route('students.index'));
        }

        return view('students.edit')->with('students', $students);
    }

    /**
     * Update the specified students in storage.
     *
     * @param int $id
     * @param UpdatestudentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestudentsRequest $request)
    {
        $students = $this->studentsRepository->find($id);

        if (empty($students)) {
            Flash::error('Students not found');

            return redirect(route('students.index'));
        }

        $students = $this->studentsRepository->update($request->all(), $id);

        Flash::success('Students updated successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified students from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $students = $this->studentsRepository->find($id);

        if (empty($students)) {
            Flash::error('Students not found');

            return redirect(route('students.index'));
        }

        $this->studentsRepository->delete($id);

        Flash::success('Students deleted successfully.');

        return redirect(route('students.index'));
    }
}
