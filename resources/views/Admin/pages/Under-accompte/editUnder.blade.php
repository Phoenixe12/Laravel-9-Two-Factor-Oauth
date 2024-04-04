<div class="modal fade" id="ModalEdit">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="formOrg" action="{{ route('update-under') }}" data-toggle="validator" role="form" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header py-1">
                    <h4 class="modal-title text-black fw-bold">Edit user</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="nom">Full name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" value=""
                                        name="name" style="height:43px;" required />
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id" />
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="email" class="form-control" value=""
                                        name="email" style="height:43px;" required />
                                </div>
                            </div>

                        </div>

                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="password">Password <span
                                            class="text-danger">(optional)</span></label>
                                    <input type="text" id="password" class="form-control" value=""
                                        name="password" style="height:43px;" placeholder="Edit password" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="task">Occupation<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="occupation" class="form-control" value=""
                                        name="occupation" style="height:43px;" required />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-sm">
                            <div class="form-group">
                                <label class="control-label" for="task">Permission <span
                                        class="text-danger">*</span></label>
                                <select class="form-select multiple-select-fiel" id="task" name="task[]"
                                    data-placeholder="Choose anything" multiple>
                                </select>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
