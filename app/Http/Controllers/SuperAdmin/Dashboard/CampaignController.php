<?php

namespace App\Http\Controllers\SuperAdmin\Dashboard;

use App\Models\User;
use App\Models\Campaign;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Notifications\CampaignNotification;
use App\Http\Requests\SuperAdmin\CampaignRequest;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route'] = 'campaign';
        $data['role'] = 'admin';
        $data['campaigns'] = Campaign::paginate(4);
        return view('admin.campaign.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] = 'campaign';
        $data['role'] = 'admin';
        $data['organizations'] = Organization::select('id', 'name')->get();
        return view('admin.campaign.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampaignRequest $request)
    {
        $validated = $request->validated();
        $image = $request->file('image')->store('public/assets/uploads/Campaign');

        // return($request);
        $campaign = new Campaign;

        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->organization_id = $request->organization_id;
        $campaign->target_amount = $request->target_amount;
        $campaign->current_amount =  $request->current_amount;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;
        $campaign->image = $image;

        //  send notification to all users for campaign
        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new CampaignNotification());
        }

        $campaign->save();

        return redirect()->route('campaign.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['route'] = 'campaign';
        $data['campaign'] = Campaign::findOrFail($id);
        return view('admin.campaign.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['route'] = 'campaign';
        $data['campaign'] = Campaign::findOrFail($id);
        return view('admin.campaign.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          // return $id;
          $campaign = Campaign::findOrFail($id);
          Storage::delete($campaign->image);
          $campaign->delete();

          return redirect()->route('campaign.index');
    }
}
