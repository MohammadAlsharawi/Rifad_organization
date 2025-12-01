<?php

namespace App\Filament\Resources\Donors\Pages;

use App\Filament\Resources\Donors\DonorResource;
use App\Models\Project;
use Filament\Resources\Pages\CreateRecord;

class CreateDonor extends CreateRecord
{
    protected static string $resource = DonorResource::class;
    protected function beforeCreate(): void
    {
        $donor = $this->form->getState();
        $project = Project::find($donor['project_id']);

        if ($project && ($project->secured_amount + $donor['donated_amount']) > $project->total_amount) {
            $this->halt(); 
            $this->notify('danger', 'Donation exceeds project total amount!');
        }
    }

    protected function afterCreate(): void
    {
        $donor = $this->record;
        $project = $donor->project;

        if ($project) {
            $newSecured = $project->secured_amount + $donor->donated_amount;

            if ($newSecured > $project->total_amount) {
                $newSecured = $project->total_amount;
            }

            $project->update([
                'secured_amount' => $newSecured,
            ]);
        }
    }
}
