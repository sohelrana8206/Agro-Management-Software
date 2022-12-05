{{ Form::open(array('url' => 'updateAnimalStatus', 'files'=> true)) }}
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Animal Status Update Form</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row clearfix">
        <div class="col-sm-12">
            <p><b>Animal Status</b></p>
            <div class="form-group">
                <select class="form-control" name="animal_status">
                    <option value="sale">Sale</option>
                    <option value="death">Death</option>
                    <option value="sick">Sick</option>
                </select>
            </div>
            <input type="hidden" name="id" value="{{$data->id}}">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>