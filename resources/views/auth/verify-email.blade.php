@include('layouts.auth-layout.auth-header')
<!-- Content -->


@if (session('status'))
    <div class="toastrDefaultSuccess" role="alert" style="display: none;">
        {{ session('status') }}
    </div>
@endif


<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo fw-bolder fs-3" >
                                Email verification
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Before proceeding, please check your email for a verification link.</h4>
                    <p class="mb-4">If you did not receive the email </p>
                    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button type="submit" class="btn btn-primary d-grid w-100" style=" background:#566a7f;color:#fff; border-color:#566a7f;">Click here to request another</button>
                    </form>
                    <div class="text-center">

                </div>
               
            </div>
            <!-- /Forgot Password -->
        </div>
    </div>
</div>


  <!-- /.modal -->
<!-- / Content -->
@include('layouts.auth-layout.auth-footer')
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
