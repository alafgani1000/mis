@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Form Permintaan
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
            <h3 class="box-title">FORM IMPORT DATA</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" method="POST" action="{{ route('request.import.process') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                      <label for="exampleInputEmail1">&nbsp;</label>
                      <input required name="fileattachment" type="file" class="form-control" id="fileattachment"  value="{{ old('deskripsi') }}">
                    </div>
                </div>
              </div>
             
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
    </script>
@endsection  
  