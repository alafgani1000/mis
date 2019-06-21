@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      FORM PERSETUJUAN MANAGER MIS
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
            <h3 class="box-title">PERSETUJUAN PERMINTAAN DATA</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" method="POST" action="{{ route('mgr.approve', $request->id) }}" enctype="multipart/form-data">
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
                    <div class="col-md-11">
                      <label>Permintaan data dari {{ $request->user->name }} ({{ $request->user->id }}) telah disetujui oleh {{   $requestApproval->user->name }} ({{ $requestApproval->user->id }})  dan telah diperiksa Supt MIS<br/>
                        Dengan ini menyetujui permintaan data tersebut untuk kepentingan diatas</label>
                    </div>
                </div>
                <div class="row">
                    <br/>
                    <div class="col-md-11">
                        <input  type="hidden" name="aksi" value="" id="aksi" />
                        <button type="submit" class="btn btn-primary btn-sm id-modal" onclick="return ceking(1)">Approve</button>
                        <button type="submit" class="btn btn-primary btn-sm id-modal" onclick="return ceking(2)">Reject</button>
                    </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </section>
    <script>
      $(document).ready(function(){
        $("#category").on('click',function(e){
          var id = $("#category").val();
          var idtest = "#"+id;
          var speed = $(idtest).attr("data-text");
          $("#idtext").val(speed);
        });
      });

      function ceking(isi){
        $('#aksi').val(isi);
        return true;
      }
    </script>
@endsection  
  