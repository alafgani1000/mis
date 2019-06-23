@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Permintaan
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Request</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
          @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
          @endif
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Permintaan</th>
                    <th>Jenis Data</th>
                    <th>Produk</th>
                    <th>Cut Off Date</th>
                    <th>Format Laporan</th>
                    <th>Tanggal Permintaan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($requests as $request)
                      <tr>
                          <td>{{ $request->id }}</td>
                          <td>{{ $request->title }}</td>
                          <td>{{ $request->category->name }}</td>
                          <td>
                            @foreach ($request->requestProducts as $item)
                              {{ $item->product->name }}
                              @if (!$loop->last)
                                  ,
                              @endif
                            @endforeach
                          </td>
                          <td>{{ $request->start_date}} s/d {{ $request->end_date }}</td>
                          <td>{{ $request->format }}</td>
                          <td>{{ $request->created_at }}</td>
                          <td>{{ $request->status->name }}</td>
                          <td>
                              <div class="btn-group">
                                <a data-url="{{ route('request.show',  $request->id) }}" type="button" class="btn btn-info btn-sm id-modal"><i data-url="{{ route('request.show',  $request->id) }}" class="fa fa-eye id-modal1"></i></a>
                                @role('boss')
                                  @if($request->status_id == 1)
                                    <a href="{{ route('boss.view',  $request->id) }}" type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                  @endif
                                @endrole
                                @role('spt mis')
                                  @if($request->status_id == 2)
                                    <a href="{{ route('spt.view',  $request->id) }}" type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                  @endif
                                @endrole
                                @role('mgr mis')
                                  @if($request->status_id == 3)
                                    <a href="{{ route('mgr.view',  $request->id) }}" type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                  @endif
                                @endrole
                                @role('staf')
                                  @if($request->status_id == 4)
                                    <a href="{{ route('updateview.view',  $request->id) }}" type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                  @endif
                                @endrole
                              </div>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Judul Permintaan</th>
                    <th>Jenis Data</th>
                    <th>Produk</th>
                    <th>Cut Off Date</th>
                    <th>Format Laporan</th>
                    <th>Tanggal Permintaan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
      </div>
    </div>
    <div id="modalresponse" style="margin-top:2rem">
    </div>
    <script>
        $(".id-modal").on("click",function(e){
            var token = $("meta[name='csrf-token']").attr("content");
            var url = $(event.target).data('url');
            $.ajax({ 
                url: url,
                type: "GET",
                data: {"_token": token, },

                success: function (data, textStatus, jqXHR) {
                    $("#modalresponse").html(data.html);
                    $("#myModal").modal("show");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                },
            });
        });
        
    </script>
  </section>
@endsection  