@extends('layouts.admin-layout.main')
@section('GestionPage')


    <style>
        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 57%;
            right: 14px;
            /* Ajustez la valeur selon vos besoins */
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    @if (session('status') == 'two-factor-authentication-disabled')
        <div class="toastrDefaultSuccess" role="alert" style="display: none;">
            {{ session('status') }}
        </div>
    @endif

    @if (session('status') == 'two-factor-authentication-enabled')
        <div class="toastrDefaultSuccess" role="alert" style="display: none;">
            {{ session('status') }}
        </div>
    @endif


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Authentication 2Fa</li>
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <section class="content ">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card">
                <div class="container mt-3 ">
                    <form method="POST" action="/user/two-factor-authentication">
                        @csrf
                        @if (auth()->user()->two_factor_secret)
                            @method('DELETE')
                            <div class="container">
                                @php
                                    $recoveryCodes = json_decode(decrypt(auth()->user()->two_factor_recovery_codes));
                                @endphp
                                <div class="row">
                                    @for ($i = 0; $i < 4; $i++)
                                        @php
                                            $code = $recoveryCodes[$i];
                                        @endphp
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="OAuth{{ $i + 1 }}">Secret key <span
                                                        class="text-primary"> OAuth {{ $i + 1 }}</span>:</label>
                                                <input type="password" id="OAuth{{ $i + 1 }}"
                                                    class="form-control password-input" value="{{ $code }}"
                                                    style="height:43px;"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="password" required />
                                                <span class="toggle-password"
                                                    onclick="togglePasswordField('OAuth{{ $i + 1 }}')"><i
                                                        class="fas fa-eye-slash"></i></span>
                                            </div>
                                        </div>
                                        @if (($i + 1) % 2 == 0)
                                </div>
                                <div class="row">
                        @endif
                        @endfor
                </div>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content ">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card ">
                <div class="pb-3 pt-3 text-center ">
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card" style="background-color:rgb(248, 203, 120);font-weight:500;">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="fas fa-exclamation-triangle"></i>
                                    <strong>NB</strong> : <strong> How to use two-factor authentication ?</strong>
                                </h5>
                                <p class="card-text text-justify">
                                    After enabling two-factor authentication, you will have access to four authentication
                                    keys allowing you to confirm your identity.

                                    In addition, you have the option of using a QR code via the Google Authenticator
                                    application, available for download from the <strong>PlayStore</strong> or
                                    <strong>AppStore</strong> , thus offering an
                                    alternative to the four authentication keys. This application randomly generates
                                    authentication keys which are no longer reusable after each 30 second interval. It is
                                    important to note that each deactivation and reactivation of two-factor authentication
                                    results in a change of keys and QR code, so please follow this process carefully.
                                </p>
                                <a
                                    href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&pcampaignid=web_share">
                                    <img src="{{ asset('assets/dist/img/PlayStore.png') }}" alt="" width="85px"
                                        height="85px"></a> <a
                                    href="https://apps.apple.com/bj/app/google-authenticator/id388497605?l=fr-FR"> <img
                                        src="{{ asset('assets/dist/img/AppStore.png') }}" alt="" width="80px"
                                        height="80px"></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center pb-3 ">
                    <button class="btn btn-danger btn-lg">Disable</button>
                </div>
            @else
                <div class="card-header fw-bold ">
                    <h5>
                        Authentication of two factor

                    </h5>
                </div>
                <div class="row justify-content-center pt-3">
                    <div class="col-md-8">
                        <div class="card" style="background-color:rgb(248, 203, 120);font-weight:500;">
                            <div class="card-body">
                                <h5 class="card-title text-center"><i class="fas fa-exclamation-triangle"></i>
                                    <strong>NB</strong> : <strong> How to use two-factor authentication ?</strong>
                                </h5>
                                <p class="card-text text-justify">
                                    After enabling two-factor authentication, you will have access to four authentication
                                    keys allowing you to confirm your identity.

                                    In addition, you have the option of using a QR code via the Google Authenticator
                                    application, available for download from the <strong>PlayStore</strong> or
                                    <strong>AppStore</strong> , thus offering an
                                    alternative to the four authentication keys. This application randomly generates
                                    authentication keys which are no longer reusable after each 30 second interval. It is
                                    important to note that each deactivation and reactivation of two-factor authentication
                                    results in a change of keys and QR code, so please follow this process carefully.
                                </p>
                                <a
                                    href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&pcampaignid=web_share">
                                    <img src="{{ asset('assets/dist/img/PlayStore.png') }}" alt="" width="85px"
                                        height="85px"></a> <a
                                    href="https://apps.apple.com/bj/app/google-authenticator/id388497605?l=fr-FR"> <img
                                        src="{{ asset('assets/dist/img/AppStore.png') }}" alt="" width="80px"
                                        height="80px"></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center pb-3">
                    <button class="btn btn-primary btn-lg ">Enable</button>
                </div>
                @endif

                </form>
            </div>
        </div>
        </div><!-- /.container-fluid -->

    </section>



    </div>



    @if (!empty($declencheur) && $declencheur == '1')
        <div class="modal-backdrop fade show"></div>
        <div class="modal-open">
    @endif

    @if (!empty($declencheur) && $declencheur == '1')
        <div class="modal fade show" id="modal-default" style="display: block;">
        @else
            <div class="modal fade" id="modal-default">
    @endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please confirm your password before continuing.</h4>
                <a href="{{ route('two-factor-authentication.index') }}" type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="input-group-text cursor-pointer" id="togglePassword">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-grid w-100"
                        style=" background:#566a7f;color:#fff; border-color:#566a7f;">Confirm Password</button>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @if (!empty($declencheur) && $declencheur == '1')
        </div> <!-- Close modal-open -->
    @endif



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
        function togglePasswordField(fieldId) {
            var passwordField = document.getElementById(fieldId);
            var toggleIcon = passwordField.nextElementSibling;

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.innerHTML = '<i class="fas fa-eye"></i>'; // Œil ouvert
            } else {
                passwordField.type = "password";
                toggleIcon.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Œil fermé
            }
        }
    </script>

    <script>
        window.addEventListener('online', function() {
            toastr.success('Internet connection restored.');
        });

        window.addEventListener('offline', function() {
            toastr.error('Internet connection lost.');
        });
    </script>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
