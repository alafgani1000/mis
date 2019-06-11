<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Request as R;
use App\Category;
use App\Product;
use App\Usability;
use App\RequestProduct;
use App\RequestAttachment;
use App\Status;
use Carbon\Carbon;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = R::all();
        return view('request.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     *  @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        $usabilities = Usability::all();
        return view('request.create', compact('categories','products','usabilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $r = new R();
        $r->category_id = $request->input('category');
        $r->usability_id = $request->input('usability');
        $r->user_id = Auth::user()->id;
        $r->title = $request->input('title');
        $r->format = $request->input('format');
        $r->start_date = $request->input('start_date');
        $r->end_date = $request->input('end_date');
        $r->status_id = Status::requestCreated()->first()->id;
        $r->save();

        $products = $request->input('products');
        foreach($products as $product)
        {
            $r->requestProducts()->save(new RequestProduct(['product_id' => $product]));
        }

         // insert data attachment 
         if(!empty($request->file('attachment')))
         {
             foreach($request->file('attachment') as $files)
             {
                 // Carbon::parse(date_format($item['created_at'],'d/m/Y H:i:s');
                 $dateNow    = Carbon::now()->toDateTimeString();
                 $date       = Carbon::parse($dateNow)->format('dmYHis');
                 $name       = $files->getClientOriginalName();
                 $username   = Auth::user()->id;
                 $filename   = $date.$username.$name;
                 $path       = "storage/" . $filename;
                 // upload data
                 $item = $files->storeAs('public',$filename);
                 // input data file
                 $r->requestAttachments()->save(new RequestAttachment(['attachment' => $path, 'name' => $filename, 'alias' => $name]));
             }
         }
        
        return redirect()
            ->route('request.index')
            ->with('success', 'Permintaan Berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = R::find($id);
        $view   = view('request.detail', compact('request'))->render();
        return response()->json(['html'=>$view]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    public function bossview($id)
    {
        $request = R::find($id);
        return view('request.boss-approval', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
