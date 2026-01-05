<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Lead;

class LeadPolicy
{
    public function view(User $user, Lead $lead)
    {
        // Placeholder: implement role-based logic
        return true;
    }
}
