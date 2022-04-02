<?php

namespace App\Http\Controllers;


use App\Models\Grade;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\sms\Services\Classes\ClassService;
use Illuminate\Http\RedirectResponse;
use Jambasangsang\Flash\Facades\LaravelFlash;


class ClassesController extends Controller
{

    public function index( ClassService $classService): View
    {

        return view('admins.classes.index', ['classes'=> $classService->getClassData(new Classes())]);
    }


    public function create(): View
    {
        return view('admins.classes.create', ['grades'=> Grade::get(['id','name'])]);
    }


    public function store(Request $request, ClassService $classService): RedirectResponse
    {
        $this->validated($request);
        $lassService->storeClassData( new Classes(), $request);
        LaravelFlash::withSuccess("Class Added Successfully!");
        return redirect()->route('classes.index');
    }


    public function show(Classes $classes): View
    {
        return view('admins.classes.show', compact('classes'));
    }

    public function edit(Classes $classes): View
    {
        return view('admins.classes.edit', ['class'=> $classes, 'grades'=> Grade::get(['id','name'])]);
    }


    public function update(Request $request, Classes $classes): RedirectResponse
    {
        return redirect()->route('classes.index');
    }


    public function destroy(Classes $classes, ClassService $classService): RedirectResponse
    {
        $classService->deleteClassData($classes);
        LaravelFlash::withSuccess("Class Deleted Successfully!");
        return redirect()->route('classes.index');
    }


    protected function validated($request)
    {

        return $this->validate($request, [
            'class_name'    => 'required|max:100',
            'class_status'  => 'required|max:100',
            'grade_id'      => 'required|min:1',
            'code'   => 'nullable|max:200'
        ]);
    }
}
