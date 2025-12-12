<?php

namespace App\Services;

use App\Mail\NewDonationMail;
use App\Models\Donor;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class DonorService
{
public function createDonor(array $data): Donor
{
    return DB::transaction(function () use ($data) {
        $project = Project::where('id', $data['project_id'])
            ->where('status', 'in_progress')
            ->firstOrFail();

        $newSecured = $project->secured_amount + $data['donated_amount'];
        if ($newSecured > $project->total_amount) {
            throw ValidationException::withMessages([
                'donated_amount' => 'Donation exceeds the project total amount.',
            ]);
        }

        $donor = Donor::create([
            'email'          => $data['email'] ?? null,
            'phone'          => $data['phone'] ?? null,
            'donated_amount' => $data['donated_amount'],
            'project_id'     => $project->id,
            'status'         => 'pending',
        ]);
        $donor->setTranslation('name', 'en', $data['name_en']);
        $donor->setTranslation('name', 'ar', $data['name_ar']);
        $donor->save();

        if (filter_var('mohammedalsharawi17@gmail.com', FILTER_VALIDATE_EMAIL)) {
            Mail::to('mohammedalsharawi17@gmail.com')->queue(new NewDonationMail($donor));
        }

        return $donor;
    });
}

    public function approveDonor(Donor $donor): Donor
    {
        return DB::transaction(function () use ($donor) {
            $project = $donor->project;

            $newSecured = $project->secured_amount + $donor->donated_amount;
            if ($newSecured > $project->total_amount) {
                throw ValidationException::withMessages([
                    'donated_amount' => 'Donation exceeds the project total amount.',
                ]);
            }

            $donor->update(['status' => 'success']);
            $project->update(['secured_amount' => $newSecured]);

            return $donor;
        });
    }

    public function getAllDonors()
    {
        return Donor::with('project')->get();
    }

    public function getProjects()
    {
        try {
            return Project::where('status', 'in_progress')
                ->get()
                ->map(function ($project) {
                    return [
                        'id'             => $project->id,
                        'image'          => $project->image,
                        'title'          => $project->getTranslation('title', app()->getLocale()),
                        'description'    => $project->getTranslation('description', app()->getLocale()),
                        'reason'         => $project->getTranslation('reason', app()->getLocale()),
                        'total_amount'   => $project->total_amount,
                        'secured_amount' => $project->secured_amount,
                        'organization_id'=> $project->organization_id,
                        'status'         => __($project->status),
                        'category'       => __($project->category),
                        'created_at'     => $project->created_at,
                        'updated_at'     => $project->updated_at,
                    ];
                });
        } catch (\Exception $e) {
            throw new \Exception("Failed to retrieve projects: " . $e->getMessage());
        }
    }

}
