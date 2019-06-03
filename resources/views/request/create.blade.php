@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
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
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Jenis Data Permintaan</label>
                        <select class="form-control" name="category">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label for="exampleInputEmail1">&nbsp;</label>
                        <input type="text" class="form-control" id="idtext">
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="title">Judul Permintaan</label>
                <input type="title" class="form-control" id="idtitle" placeholder="Judul">
              </div>
              <div class="form-group">
                <label>Produk</label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                  &nbsp;
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                  &nbsp;
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                  &nbsp;
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                  &nbsp;
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                  &nbsp;
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
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
                        <input type="text" class="form-control pull-right" id="datepicker">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <label>S/D</label>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                      </div>
                    </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                      <label>Digunakan Untuk</label>
                      <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                      </select>
                  </div>
                  <div class="col-md-8">
                      <label for="exampleInputEmail1">&nbsp;</label>
                      <input type="text" class="form-control" id="idtext">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label>Format Laporan</label>
              <textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Attachment</label>
              <input type="file" id="exampleInputFile">

              <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                      <label>Digunakan Untuk</label>
                      <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                      </select>
                  </div>
                  <div class="col-md-8">
                      <label for="exampleInputEmail1">&nbsp;</label>
                      <input type="text" class="form-control" id="idtext">
                  </div>
              </div>
            </div>
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
@endsection  