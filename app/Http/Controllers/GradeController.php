<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Level;
use App\sms\Services\Grades\GradeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Jambasangsang\Flash\Facades\LaravelFlash;


class GradeController extends Controller
{

    public function index(GradeService $GradeServices ): View
    {

        return view('admins.grades.index', ['grades' => $GradeServices->getGradeData(new Grade())]);
    }


    public function create(): View
    {
        return view('admins.grades.create', ['levels'=>Level::get(['id','name'])]);
    }


    public function store(Request $request, GradeService $GradeServices): RedirectResponse
    {
        $this->validated($request);
        $GradeServices->storeGradeData(new Grade(), $request);
        LaravelFlash::withSuccess("Grade Created Successfully!");
        return redirect()->route('grades.index');
    }


    public function show(Grade $grade): View
    {
        return view('admins.grades.show', compact('grade'));
    }

    public function edit(Grade $grade): View
    {
        return view('admins.grades.edit', ['grade' => $grade, 'levels'=>Level::get(['id','name'])]);
    }


    public function update(Request $request, Grade $grade): RedirectResponse
    {
        return redirect()->route('grades.index');
    }


    public function destroy(Grade $grade, GradeService $GradeServices): RedirectResponse
    {
        $GradeServices->deleteGradeData($grade);
        LaravelFlash::withSuccess("Grade Deleted Successfully!");
        return redirect()->route('grades.index');
    }


    protected function validated($request)
    {

        return $this->validate($request, [
            'grade_name'    => 'required|max:100',
            'grade_status'  => 'required|max:100',
            'level_id'      => 'required|min:1',
            'description'   => 'nullable|max:200'
        ]);
    }
}
