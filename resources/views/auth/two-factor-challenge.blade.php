@include('layouts.auth-layout.auth-header')

<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <!-- Premier conteneur -->
        <div class="col-md-6" id="container1">
            <div class="container-xxl">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <!-- Register -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Logo -->
                                <div class="app-brand justify-content-center">
                                    <a href="#" class="app-brand-link gap-2">
                                        <span class="app-brand-logo fw-bolder fs-3">
                                            Google authentication code
                                        </span>
                                        <span class="app-brand-text demo text-body"></span>
                                    </a>
                                </div>
                                <!-- /Logo -->
                                <p class="mb-4">
                                    Please enter your authentication code to login.
                                </p>
                                <form id="formAuthentication1" class="mb-3" method="POST" action="{{ route('two-factor.login') }}">
                                    @csrf
                                    <h4 class="mb-2"></h4>
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Authentication code:</label>
                                        <div class="col">
                                            <input id="code" type="code" class="form-control @error('code') is-invalid @enderror" name="code" required autocomplete="current-code">

                                            @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary d-grid  mb-3" type="submit" style=" background:#24b4e0;color:#fff; border-color:#24b4e0;">
                                            Submit
                                        </button>
                                        <button id="btnNext1" class="btn btn-primary d-grid w-100" type="button" style=" background:#566a7f;color:#fff; border-color:#566a7f;">
                                            Next
                                        </button>

                                    </div>
                                </form>
                                <p class="text-center"></p>
                            </div>
                        </div>
                        <!-- /Register -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Premier conteneur -->

        <!-- Deuxième conteneur -->
        <div class="col-md-6" id="container2" style="display: none;">
            <div class="container-xxl">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <!-- Register -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Logo -->
                                <div class="app-brand justify-content-center">
                                    <a href="#" class="app-brand-link gap-2">
                                        <span class="app-brand-logo fw-bolder fs-3">
                                            Two factor Recovery Code
                                        </span>
                                        <span class="app-brand-text demo text-body"></span>
                                    </a>
                                </div>
                                <!-- /Logo -->
                                <p class="mb-4">
                                    Please enter your recovery code to login.
                                </p>
                                <form id="formAuthentication2" class="mb-3" method="POST" action="{{ route('two-factor.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="recovery_code" class="form-label">Authentication code:</label>
                                        <div class="col">
                                            <input id="recovery_code" type="recovery_code" class="form-control @error('recovery_code') is-invalid @enderror" name="recovery_code" required autocomplete="current-recovery_code">

                                            @error('recovery_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary d-grid mb-3" type="submit" style=" background:#24b4e0;color:#fff; border-color:#24b4e0;">
                                            Submit
                                        </button>
                                        <button id="btnPrev2" class="btn btn-secondary d-grid w-100" type="button" style=" background:#566a7f;color:#fff; border-color:#566a7f;">
                                            Previous
                                        </button>
                                    </div>
                                </form>
                                <p class="text-center"></p>
                            </div>
                        </div>
                        <!-- /Register -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Deuxième conteneur -->
    </div>
</div>

@include('layouts.auth-layout.auth-footer')

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(function() {
        $('.toastrDefaultSuccess').each(function() {
            toastr.success($(this).text());
        });
    });

    window.addEventListener('online', function() {
        toastr.success('Internet connection restored.');
    });

    window.addEventListener('offline', function() {
        toastr.error('Internet connection lost.');
    });

    $('#btnNext1').click(function() {
        $('#container1').hide();
        $('#container2').show();
    });

    $('#btnPrev2').click(function() {
        $('#container2').hide();
        $('#container1').show();
    });
</script>
