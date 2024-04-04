@extends('layouts.admin-layout.main')
@section('GestionPage')
    <style>
        .bg-cronos {
            background-color: #4c5863;
        }

        .btn-cronos {
            background-color: #4c5863;
            color: #ffff;
        }
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @if (session()->has('status'))
                    <div class="toastrDefaultSuccess" role="alert" style="display: none;">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session()->has('warning-status'))
                    <div class="toastrDefaultWarning" role="alert" style="display: none;">
                        {{ session('warning-status') }}
                    </div>
                @endif

                @if (session()->has('error-status'))
                    <div class="toastrDefaultError" role="alert" style="display: none;">
                        {{ session('error-status') }}
                    </div>
                @endif

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Under accompte</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card ">
                <!-- /.card-header -->
                <div class="card-body">
                    <a type="button" class="btn btn-cronos text-white" data-bs-toggle="modal"
                        data-bs-target="#modalFormUtilisateur">
                        <i class="fas fa-plus-circle"></i> <span>Add user</span></a>
                    </a>
                    <table class="table table-striped table-bordered table-hover"
                        data-toolbar="#btnModalFormGestionCiternes" id="table" data-toggle="table"
                        data-ajax="ajaxRequest" data-buttons-class="cronos" data-show-refresh="true" data-show-toggle="true"
                        data-show-fullscreen="true" data-show-columns="true" data-show-columns-toggle-all="true"
                        data-show-export="false" data-click-to-select="true" data-toggle="table" data-search="true"
                        data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-page-size="10"
                        data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-formatter="formatterImg">Picture profile</th>
                                <th data-field="name" data-sortable="true">Full name</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="occupation" data-sortable="true">Occupation</th>
                                <th data-field="task" data-sortable="true">Permission</th>
                                <th data-field="password" data-sortable="true">Password</th>
                                <th data-formatter="actionFormatter" data-events="actionEvents">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer"></div>
            </div>
            <!-- /.card -->


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @php
        // Convertir la chaîne en tableau et supprimer les espaces blancs autour des valeurs
        $userTasks = array_map('trim', explode(',', auth()->user()->task));
    @endphp
    @if (in_array('task_delete', $userTasks))
        @include('Admin.pages.Under-accompte.deleteUnder')
    @endif

    @if (in_array('task_edit', $userTasks))
        @include('Admin.pages.Under-accompte.editUnder')
    @endif

    @if (in_array('task_add', $userTasks))
        @include('Admin.pages.Under-accompte.addUnder')
    @endif  
@endsection
@section('script')
    <script>
        function actionFormatter(value, row, index) {
            return [
                '<a class="editUtilisateur" style="color:blue" href="javascript:void(0)" title="Modifier">',
                '<i class="fas fa-edit" aria-hidden="true"></i>',
                '</a>',
                ' &nbsp &nbsp',
                '<a class="deleteUtilisateur" style="color:red" href="javascript:void(0)" title="Supprimer">',
                '<i class="fas fa-trash" aria-hidden="true"></i>',
                '</a>'

            ].join('');
        }
        window.actionEvents = {
            'click .editUtilisateur': function(e, value, row, index) {
                var id = row.id;

                $('#ModalEdit').modal('show');
                $.ajax({
                    type: "GET",
                    url: "{{ route('under.edit', ['id' => ':id']) }}".replace(':id', id),
                    success: function(response) {
                        console.log(response.User);
                        $('#name').val(response.User.name);
                        $('#email').val(response.User.email);
                        $('#occupation').val(response.User.occupation);
                        $('#password').val('');
                        var tasks = response.User.task.split(',');
                        console.log(
                            tasks); // Vérifiez si les tâches sont correctement divisées en un tableau

                        var
                            existingOptions = []; // Tableau pour stocker les valeurs des options récupérées via AJAX

                        $('#task').empty();

                        tasks.forEach(function(task) {
                            console.log(task.trim()); // Vérifiez chaque tâche
                            var trimmedTask = task.trim();
                            $('#task').append('<option value="' + trimmedTask + '" selected>' +
                                trimmedTask + '</option>');
                            existingOptions.push(
                                trimmedTask
                            ); // Ajoutez la tâche au tableau des options existantes
                        });

                        // Ajoutez les options générées par la boucle Blade uniquement si elles n'existent pas déjà
                        @foreach ($permission as $key)
                            var optionValue = "{{ $key->cle }}";
                            var optionName = "{{ $key->name }}";
                            if (!existingOptions.includes(optionValue)) {
                                $('#task').append('<option value="' + optionValue + '">' + optionName +
                                    '</option>');
                            }
                        @endforeach

                        $('#id').val(response.User.id);
                    }

                });
            },

            'click .deleteUtilisateur': function(e, value, row, index) {
                var id = row.id;
                $('#ModalDelete').modal('show');
                $('#deleteing_id').val(id);
            }
        };

        function formatterImg(value, row, index) {
            if (row.image) {
                // Si l'image existe, retournez l'élément img avec le chemin de l'image spécifié
                return '<img src="img/' + row.image + '" alt="" border="3" height="75" width="75"></img>';
            } else {
                // Si l'image n'existe pas, retournez un élément img avec un chemin par défaut
                return '<img src="assets/dist/img/profil.png" alt="" border="3" height="75" width="75"></img>';
            }
        };
    </script>

    <script>
        // your custom ajax request here
        function ajaxRequest(params) {
            var url = '{{ route('Gestion+Utilisateurs.create') }}'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                // Modify task column data before rendering
                res.forEach(function(row) {
                    var tasks = row.task.split(','); // Split tasks by comma
                    var formattedTasks = tasks.map(function(task) {
                        return '<span style="background-color: blue; color: white; padding: 3px; margin-right: 5px; border-radius:3px ">' +
                            task.trim() + '</span>';
                    }).join('');
                    row.task = formattedTasks;
                });
                params.success(res);
            });
        }
    </script>
    <script>
        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,

        });

        $('.multiple-select-fiel').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,

        });
    </script>

    <script>
        $(function() {
            $('.toastrDefaultSuccess').each(function() {
                toastr.success($(this).text());
            });
            $('.toastrDefaultWarning').each(function() {
                toastr.warning($(this).text());
            });
            $('.toastrDefaultError').each(function() {
                toastr.error($(this).text());
            });
        });
    </script>

    <script>
        window.addEventListener('online', function() {
            toastr.success('Internet connection restored.');
        });

        window.addEventListener('offline', function() {
            toastr.error('Internet connection lost.');
        });
    </script>
@endsection
