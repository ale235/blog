<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form method="post" action="" id="modal-form">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <input type="text" name="tag_name" id="tag_name" class="form-control" value="" placeholder="Tag name">
                    <input type="hidden" name="tag_id" id="tag_id" value="" readonly>
                    <span class="help-block"></span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Save</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>

    </div>
</div>
