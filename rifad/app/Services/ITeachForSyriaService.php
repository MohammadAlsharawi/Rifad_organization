<?php

namespace App\Services;

use App\Models\CourseName;
use App\Models\Degree;
use App\Models\ExperienceYear;
use App\Models\ITeachForSyria;
use App\Models\Need;
use App\Models\Sector;
use App\Models\TrainingType;

class ITeachForSyriaService
{
    public function create(array $data)
    {
        try{
            $response = ITeachForSyria::create($data);
            return $response;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function getFormData()
    {
        try{
            return [
                'degrees'          => Degree::all(),
                'sectors'          => Sector::all(),
                'experience_years' => ExperienceYear::all(),
                'training_types'   => TrainingType::all(),
                'needs'            => Need::all(),
                'courses'          => CourseName::all(),
            ];
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
