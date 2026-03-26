<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    /**
     * Handle the Project "saving" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function saving(Project $project): void
    {
        // Automatically calculate the balance before the model is saved.
        if (isset($project->project_cost) && isset($project->amount_paid)) {
            $project->balance = $project->project_cost - $project->amount_paid;
        }
    }
}
