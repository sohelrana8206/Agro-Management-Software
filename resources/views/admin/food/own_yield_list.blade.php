<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Own Yield Information</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Yield Name</th>
                                <th>Previous Yield Owner Name</th>
                                <th>Previous Yield Owner Address</th>
                                <th>Yield Purchase Date</th>
                                <th>Yield Purchase Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$row->yield_info->yield_name}}</td>
                                    <td>{{$row->previous_yield_owner_name}}</td>
                                    <td>{{$row->previous_yield_owner_address}}</td>
                                    <td>{{date('d F, Y',strtotime($row->yield_purchase_date))}}</td>
                                    <td>{{$row->yield_purchase_cost}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

