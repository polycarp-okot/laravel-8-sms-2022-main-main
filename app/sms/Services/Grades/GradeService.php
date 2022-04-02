<?php

namespace App\sms\Services\Grades;

use App\Models\Grade;

class GradeService
{

    //get gradeData function
    public function getGradeData($GradeModel){
        return $GradeModel::with('level:id,name')->get();
    }

    //store grade data using function below
    public function storeGradeData($GradeModel, $request)
    {

        return Grade::updateOrCreate(
            ['id' => $request->edit_id],
            [
                'name'          => $request->grade_name,
                'status'        => $request->grade_status,
                'level_id'      => $request->level_id,
                'description'   => $request->description
            ]
        );
    }

    //delete grade data using function below
    public function deleteGradeData($GradeModel)
    {

        return $GradeModel->delete();
    }
}
