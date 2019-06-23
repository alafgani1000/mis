<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Detail data permintaan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Id:</label>
                            <br/>
                            {{ $request->id }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Judul Permintaan:</label>
                            <br/>
                            {{ $request->title }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Produk:</label>
                            <br/>
                            @foreach ($request->requestProducts as $item)
                              {{ $item->product->name }}
                              @if (!$loop->last)
                                  ,
                              @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- row 2-->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Cut Off date:</label>
                            <br/>
                            {{ $request->start_date}} s/d {{ $request->end_date }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Format Laporan:</label>
                            <br/>
                            {{ $request->format }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Tanggal Permintaan:</label>
                            <br/>
                            {{ $request->created_at}}
                        </div>
                    </div>
                </div>
                <!-- row 3 -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Tanggal Permintaan:</label>
                            <br/>
                            {{ $request->created_at }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Status:</label>
                            <br/>
                            {{ $request->status->name }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Tanggal Permintaan:</label>
                            <br/>
                            {{ $request->created_at}}
                        </div>
                    </div>
                </div>
                 <!-- row 3 -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="service_id">Attachment:</label>
                            <br/>
                            @foreach ($request->requestAttachments as $item)
                                <a href="{{ url($item->attachment)}}" class="btn btn-info btn-lg" target="_blank"><i class="fa fa-file"></i></a> 
                                <a href="{{ url($item->attachment)}}" target="_blank"><label>{{ $item->alias }}</label></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">History</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($request->requestApprovals as $item)
                            <tr>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ title_case($item->user->name) }} ({{ $item->user->id }})</td>
                                <td>{{ $item->status->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pull-right btn-primary" data-dismiss="modal">Close</button>
              </div>
        </div>
    </div>
</div>