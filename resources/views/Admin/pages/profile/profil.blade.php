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
                @if (session('status') == 'password-updated')
                    <div class="toastrDefaultSuccess" role="alert" style="display: none;">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('status'))
                    <div class="toastrDefaultSuccess" role="alert" style="display: none;">
                        {{ session('status') }}
                    </div>
                @endif



                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">My profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if (empty(auth()->user()->image))
                                    <img class="profile-user-img  img-circle"
                                        src="{{ asset('assets/dist/img/profil.png') }}" alt="User profile picture">
                                @else
                                    <img class="profile-user-img  img-circle"
                                        src="{{ asset('img/' . auth()->user()->image) }}"
                                        alt="User profile picture" width="100px" height="100px">
                                @endif

                            </div>

                            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                            <p class="text-muted text-center">{{ auth()->user()->occupation }}</p>

                            <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="input-group">
                                            <input class="form-control" type="file" name="image" id="image" style="display: none;">
                                             <input type="hidden" value="{{ auth()->user()->id }}" name="id">
                                        </div>
                                    </div>
                                </div>
                                <!-- Si vous voulez un bouton supplémentaire pour soumettre le formulaire -->
                                <!-- <button type="submit" class="btn btn-primary "><b>Submit</b></button> -->
                                <button type="button" class="btn btn-primary btn-block" id="uploadButton"> <i class="fas fa-upload"></i> Upload Image</button>
                            </form>

                            <script>
                                document.getElementById('uploadButton').addEventListener('click', function() {
                                    document.getElementById('image').click();
                                });

                                document.getElementById('image').addEventListener('change', function() {
                                    document.getElementById('uploadForm').submit();
                                });
                            </script>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Edit
                                        Profile</a></li>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change
                                        Password</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('user-profile-information.update') }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Full name</label>
                                            <div class="col-sm-10">
                                                <input id="name" type="name"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') ?? auth()->user()->name }}" required
                                                    autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') ?? auth()->user()->email }}" required
                                                    autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal"method="POST"
                                        action="{{ route('user-password.update') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Current Password</label>
                                            <div class="col-sm-10">
                                                <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required autofocus>

                                                @error('current_password', 'updatePassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password', 'updatePassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script')
    <script>
        $(function() {
            $('.toastrDefaultSuccess').each(function() {
                toastr.success($(this).text());
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
