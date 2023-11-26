</main>
<div class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <footer class="footer pt-3" style="position:fixed;bottom:20px;width: 100%;">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        {{ config('app.name') }}
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('softui/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('softui/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('softui/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('softui/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('softui/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
