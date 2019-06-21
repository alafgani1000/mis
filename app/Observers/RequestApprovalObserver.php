<?php

namespace App\Observers;

use App\Request as R;
use App\RequestApproval;
use App\Status;
use App\User;
use App\Notifications\RequestAction;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RequestApprovalObserver
{
    /**
     * Handle the request "created" event.
     *
     * @param  \App\requestApproval  $request
     * @return void
     */
    public function created(RequestApproval $requestApproval)
    {
        if($requestApproval->request->status_id == Status::requestCreated()->first()->id)
        { 
            //$url    = UrlSigner::sign(route('signed.approveshow', [$requestApproval->request->id, Auth::user()->boss()->id]),2);
            $urldb  = route('boss.view', $requestApproval->request->id);
            $boss   = Auth::user()->boss();
            $boss->notify(new RequestAction($requestApproval, $urldb));
        }
        if($requestApproval->request->status_id == Status::bossApproved()->first()->id)
        { 
            //$url    = UrlSigner::sign(route('signed.approveshow', [$requestApproval->request->id, Auth::user()->boss()->id]),2);
            $role       = Role::findByName('spt mis');
            $collection = $role->users;
            $collection->each(function ($item, $key) use ($requestApproval) {
                $urldb  = route('spt.view', $requestApproval->request->id);
                $item->notify(new RequestAction($requestApproval, $urldb));
            });
        }
        if($requestApproval->request->status_id == Status::bossRejected()->first()->id)
        { 
            $urldb  = route('request.index', $requestApproval->request->id);
            $boss   = $requestApproval->request->user;
            $boss->notify(new RequestAction($requestApproval, $urldb));
        }
        if($requestApproval->request->status_id == Status::sptMisApproved()->first()->id)
        { 
            $role       = Role::findByName('mgr mis');
            $collection = $role->users;
            $collection->each(function ($item, $key) use ($requestApproval) {
                $urldb  = route('mgr.view', $requestApproval->request->id);
                $item->notify(new RequestAction($requestApproval, $urldb));
            });
        }
        if($requestApproval->request->status_id == Status::sptMisRejected()->first()->id)
        { 
            $urldb  = route('request.index', $requestApproval->request->id);
            $boss   = $requestApproval->request->user;
            $boss->notify(new RequestAction($requestApproval, $urldb));
        }
        if($requestApproval->request->status_id == Status::mgrMisApproved()->first()->id)
        { 
            $urldb  = route('request.index', $requestApproval->request->id);
            $boss   = $requestApproval->request->user;
            $boss->notify(new RequestAction($requestApproval, $urldb));
        }
        if($requestApproval->request->status_id == Status::sptMisApproved()->first()->id)
        { 
            $urldb  = route('request.index', $requestApproval->request->id);
            $boss   = $requestApproval->request->user;
            $boss->notify(new RequestAction($requestApproval, $urldb));
        }
    }

    /**
     * Handle the request "updated" event.
     *
     * @param  \App\requestApproval  $request
     * @return void
     */
    public function updated()
    {

    }

    /**
     * Handle the request "deleted" event.
     *
     * @param  \App\requestApproval  $request
     * @return void
     */
    public function deleted(ITRequest $request)
    {
        //
    }

    /**
     * Handle the request "restored" event.
     *
     * @param  \App\requestApproval  $request
     * @return void
     */
    public function restored(ITRequest $request)
    {
        //
    }

    /**
     * Handle the request "force deleted" event.
     *
     * @param  \App\requestApproval  $request
     * @return void
     */
    public function forceDeleted(ITRequest $request)
    {
        //
    }
}
