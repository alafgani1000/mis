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
use UrlSigner;

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
            $url    = UrlSigner::sign(route('boss.view.urlsigned', [$requestApproval->request->id, Auth::user()->boss()->id]),2);
            $boss   = Auth::user()->boss();
            $boss->notify(new RequestAction($requestApproval, $url));
        }
        if($requestApproval->request->status_id == Status::bossApproved()->first()->id)
        { 
            $role       = Role::findByName('spt mis');
            $collection = $role->users;
            $collection->each(function ($item, $key) use ($requestApproval) {
                $url    = UrlSigner::sign(route('spt.view.urlsigned', [$requestApproval->request->id, $item->id]),2);
                $item->notify(new RequestAction($requestApproval, $url));
            });
        }
        if($requestApproval->request->status_id == Status::bossRejected()->first()->id)
        { 
            $user   = $requestApproval->request->user;
            $url    = UrlSigner::sign(route('index.urlsigned', [$user->id]),2);
            $user->notify(new RequestAction($requestApproval, $url));
        }
        if($requestApproval->request->status_id == Status::sptMisApproved()->first()->id)
        { 
            $role       = Role::findByName('mgr mis');
            $collection = $role->users;
            $collection->each(function ($item, $key) use ($requestApproval) {
                $url    = UrlSigner::sign(route('mgr.view.urlsigned', [$requestApproval->request->id, $item->id]),2);
                $item->notify(new RequestAction($requestApproval, $url));
            });
        }
        if($requestApproval->request->status_id == Status::sptMisRejected()->first()->id)
        { 
            $user   = $requestApproval->request->user;
            $url    = UrlSigner::sign(route('index.urlsigned', [$user->id]),2);
            $user->notify(new RequestAction($requestApproval, $url));
        }
        if($requestApproval->request->status_id == Status::mgrMisApproved()->first()->id)
        { 
            $user   = $requestApproval->request->user;
            $url    = UrlSigner::sign(route('index.urlsigned', [$user->id]),2);
            $user->notify(new RequestAction($requestApproval, $url));
        }
        if($requestApproval->request->status_id == Status::sptMisApproved()->first()->id)
        { 
            $user   = $requestApproval->request->user;
            $url    = UrlSigner::sign(route('index.urlsigned', [$user->id]),2);
            $user->notify(new RequestAction($requestApproval, $url));
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
