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
            <h3 class="box-title">FORM PERMINTAAN DATA</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <form role="form" method="POST" action="{{ route('request.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Jenis Data Permintaan</label>
                        <select class="form-control" name="category" id="category">
                          <option value="">Pilih Data Jenis Permintaan</option>
                           @foreach ($categories as $category)
                            <option {{(old('category')==$category->id)? 'selected':''}} id="{{ $category->id}}" data-text="{{ $category->text }}" value="{{ $category->id}}">{{ $category->name }}</option>
                           @endforeach
                        </select>
                        @if ($errors->has('category'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('category') }}</strong>
                          </span>
                        @endif
                    </div>
                    <div class="col-md-8">
                      <label for="exampleInputEmail1">&nbsp;</label>
                      <input name="deskripsi" type="text" class="form-control" id="idtext"  value="{{ old('deskripsi') }}">
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="title">Judul Permintaan</label>
                <input name="title" type="text" class="form-control" id="idtitle" placeholder="Judul" value="{{ old('title') }}">
                @if ($errors->has('title'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label>Produk</label>
                <div class="checkbox">
                  @foreach ($products as $product)
                    <label>
                    <input name="products[]" value="{{ $product->id }}" type="checkbox" {{ in_array($product->id, old('products', [])) ? 'checked' : '' }} > {{ $product->name }}
                    </label>
                    &nbsp;
                  @endforeach
                  <div>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('products') }}</strong>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Curt Of Date:</label>
                <div class="row">
                    <div class="col-md-4">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="start_date" type="text" class="form-control pull-right datepicker" id="" value="{{ old('start_date') }}">
                      </div>
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('start_date') }}</strong>
                      </span>
                    </div>
                    <div class="col-md-1">
                      <label>S/D</label>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="end_date" type="text" class="form-control pull-right datepicker" id="" value="{{ old('end_date') }}">
                      </div>
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('end_date') }}</strong>
                      </span>
                    </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-md-12">
                      <label>Digunakan Untuk</label>
                      <select class="form-control" name="usability">
                          <option value="">------ Pilih ------</option>
                          @foreach ($usabilities as $usability)
                            <option value="{{ $usability->id }}" {{(old('usability')==$usability->id)? 'selected':''}}>{{ $usability->name }}</option>
                          @endforeach
                      </select>
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('usability') }}</strong>
                      </span>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label>Format Laporan</label>
              <textarea name="format" class="form-control" rows="4" placeholder="">{{ old('usability') }}</textarea>
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('usability') }}</strong>
              </span>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Attachment</label>
              <input name="attachment[]" type="file" id="exampleInputFile">
              <p class="help-block">Example block-level help text here.</p>
            </div>
{{--             
            <div class="form-group">
              <div class="row">
                  <div class="col-md-12">
                      <label>Aprroval Atasan</label>
                      <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                      </select>
                  </div>
              </div>
            </div> --}}

            <!-- /.box-body -->
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label>Ket</label><br/>
                  <label>* Harus di isi</label>
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
  