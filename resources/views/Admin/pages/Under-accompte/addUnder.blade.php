<!-- Modal -->
<div class="modal fade" id="modalFormUtilisateur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="formOrg" action="{{ route('Gestion+Utilisateurs.store') }}" data-toggle="validator"
                role="form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header py-1">
                    <h4 class="modal-title text-black fw-bold">Add user</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="nom">Full name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" value=""
                                        name="name" style="height:43px;" required />
                                </div>
                            </div>
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
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="task">Occupation<span
                                            class="text-danger">*</span></label>
                                            <input type="text" id="occupation" class="form-control" value=""
                                            name="occupation" style="height:43px;" required />
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="task">Permission<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="multiple-select-field" name="task[]"
                                        data-placeholder="Choose anything" multiple>
                                        @foreach ($permission as $key)
                                            <option value="{{ $key->cle }}">{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
