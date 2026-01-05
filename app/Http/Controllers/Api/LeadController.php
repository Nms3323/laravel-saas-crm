<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use App\Notifications\LeadAssignedNotification;

class LeadController extends Controller
{
    public function assign(Request $request, Lead $lead)
    {
        $request->validate([
            'assignee_id' => 'required|exists:users,id',
        ]);

        $assignee = User::findOrFail($request->assignee_id);
        $lead->assigned_to = $assignee->id;
        $lead->save();

        // Send notification to assignee (mail + database)
        $assignee->notify(new LeadAssignedNotification($lead));

        return response()->json(['status' => 'assigned', 'assignee' => $assignee->only(['id','name','email'])]);
    }
}
