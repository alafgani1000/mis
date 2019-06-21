<?php

namespace App\Observers;

use App\Request as R;
use App\RequestApproval;
use App\Status;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestObserver
{
    /**
     * Handle the request "created" event.
     *
     * @param  \App\ITRequest  $request
     * @return void
     */
    public function created(R $r)
    {
        $ra = new RequestApproval();
        $ra->request_id = $r->id;
        $ra->user_id = Auth::user()->id;
        $ra->status_id = $r->status_id;
        $ra->role = Auth::user()->getRoleNames()->first();
        $ra->save();
    }

    /**
     * Handle the request "updated" event.
     *
     * @param  \App\ITRequest  $request
     * @return void
     */
    public function updated(R $r)
    {
        $ra = new RequestApproval();
        $ra->request_id = $r->id;
        $ra->user_id = Auth::user()->id;
        $ra->status_id = $r->status_id;
        $ra->role = Auth::user()->getRoleNames()->first();
        $ra->save();
    }

    /**
     * Handle the request "deleted" event.
     *
     * @param  \App\ITRequest  $request
     * @return void
     */
    public function deleted(ITRequest $request)
    {
        //
    }

    /**
     * Handle the request "restored" event.
     *
     * @param  \App\ITRequest  $request
     * @return void
     */
    public function restored(ITRequest $request)
    {
        //
    }

    /**
     * Handle the request "force deleted" event.
     *
     * @param  \App\ITRequest  $request
     * @return void
     */
    public function forceDeleted(ITRequest $request)
    {
        //
    }
}
