@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      FORM
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Request</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">UPDATE PENGOLAHAN DATA</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" method="POST" action="{{ route('updatestatus.action', $request->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="box-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Waktu Permintaan Data</label>
                    </div>
                    <div class="col-md-6">
                      <label>: {{ $request->created_at }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Nama</label>
                    </div>
                    <div class="col-md-6">
                      <label>: {{ $request->user->name }} ({{ $request->user->id }})</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Judul Permintaan</label>
                    </div>
                    <div class="col-md-6">
                      <label>: {{ $request->title }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Jenis Data Permintaan</label>
                    </div>
                    <div class="col-md-6">
                      <label>: {{ $request->category->name }} ( {{ $request->category->text }})</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Produk</label>
                    </div>
                    <div class="col-md-6">
                        <label>: 
                            @foreach ($request->requestProducts as $item)
                                {{ $item->product->name }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Cut Off Date</label>
                    </div>
                    <div class="col-md-6">
                        <label>: {{ $request->start_date}} s/d {{ $request->end_date }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Digunakan Untuk</label>
                    </div>
                    <div class="col-md-6">
                        <label>: {{ $request->usability->name}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Format Laporan</label>
                    </div>
                    <div class="col-md-6">
                        <label>: {{ $request->format}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Attachment</label>
                    </div>
                    <div class="col-md-6">
                        <label>: 
                            @foreach ($request->requestAttachments as $item)
                                <a href="{{ url($item->attachment)}}" class="btn btn-info btn-lg" target="_blank"><i class="fa fa-file"></i></a> 
                                <a href="{{ url($item->attachment)}}" target="_blank"><label>{{ $item->alias }}</label></a>
                            @endforeach
                        </label>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <label>Status</label>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" name="status" id="status">
                      @foreach ($status as $data)
                        <option id="{{ $data->id}}" data-text="{{ $data->name }}" value="{{ $data->id}}">{{ $data->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                    <br/>
                    <div class="col-md-11">
                        <input  type="hidden" name="aksi" value="" id="aksi" />
                        <button type="submit" class="btn btn-primary btn-sm id-modal">Save</button>
                    </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </section>
    <script>
    </script>
@endsection  
  