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
                    <input type="text" name="field" id="field" class="form-control" value="" placeholder="Tag name">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Save</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>

    </div>
</div>
