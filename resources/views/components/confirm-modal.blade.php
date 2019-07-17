<!-- CANCEL ORDER MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="{{ $id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $title }}</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <form action="{{ $path }}" id="delete_form" method="POST">
                        {{ $method }}
                        @csrf
                        <div class="form-body">
                            <!-- START OF MODAL BODY -->
                            <div class="container margin-bottom-10">
                                <label>{{ $message }}</label>
                            </div>
                            <!-- MODAL FOOTER -->
                            <div class="modal-footer">
                                <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                                <button id="edit_save" type="submit" name="edit_category" class="btn btn-primary">
                                    Confirm
                                </button>
                            </div>
                            <!-- END OF MODAL FOOTER -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--END OF CANCEL ORDER MODAL-->
