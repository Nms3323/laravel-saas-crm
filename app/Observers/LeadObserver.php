<?php

namespace App\Observers;

use App\Models\Lead;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class LeadObserver
{
    public function created(Lead $lead)
    {
        ActivityLog::create([
            'action' => 'lead.created',
            'subject_type' => Lead::class,
            'subject_id' => $lead->id,
            'causer_id' => Auth::id(),
            'meta' => ['name' => $lead->name, 'email' => $lead->email],
        ]);
    }

    public function updated(Lead $lead)
    {
        ActivityLog::create([
            'action' => 'lead.updated',
            'subject_type' => Lead::class,
            'subject_id' => $lead->id,
            'causer_id' => Auth::id(),
            'meta' => ['changes' => $lead->getChanges()],
        ]);
    }
}
