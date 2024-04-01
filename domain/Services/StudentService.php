<?php

namespace domain\Services;

use App\Models\Student;
use domain\Facades\ImageFacade;

class StudentService
{
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function all()
    {
        return $this->student->all();
    }

    public function store($data)
    {
        if(isset($data['images'])){
            $image = ImageFacade::store($data['images']);
            $data['image_id'] = $image->id;
        }
        $this->student->create($data);
    }

    public function delete($student_id)
    {
        $student = $this->student->find($student_id);
        $student->delete();
    }

    // todo: update controller must be implemented here
}
