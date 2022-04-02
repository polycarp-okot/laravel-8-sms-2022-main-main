<?php

namespace App\sms\Services\Classes;


use Illuminate\Support\Str;


class ClassService
{

    //get gradeData function
    public function getClassData($ClassModel){
        return $ClassModel::with('grade:id,name')->get();
    }

    //store grade data using function below
    public function storeClassData($ClassModel, $request)
    {

        return $ClassModel::updateOrCreate(
            ['id' => $request->edit_id],
            [
                'name'          => $request->class_name,
                'status'        => $request->class_status,
                'grade_id'      => $request->grade_id,
                'code'          => Str::substr($request->class_name, 1, 2)
            ]
        );
    }

    //delete grade data using function below
    public function deleteClassData($ClassVariable)
    {

        return $ClassVariable->delete();
    }
}
