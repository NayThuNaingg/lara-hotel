    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; LaraHotelDevelopmentTeam</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                    by <a href="https://saugi.me">Saugi</a></p>
            </div>
        </div>
    </footer>
    </div>
    </div>

    <script src="{{URL::asset('assets/backend/static/js/components/dark.js')}}"></script>
    <script src="{{URL::asset('assets/backend/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{URL::asset('assets/backend/compiled/js/app.js')}}"></script>
    <script src="{{ URL::asset('assets/backend/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/extensions/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/static/js/pages/parsley.js') }}"></script>
    <!-- Need: Apexcharts -->
    <script src="{{URL::asset('assets/backend/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{URL::asset('assets/backend/static/js/pages/dashboard.js')}}"></script>

    <!-- data table  -->
    <script src="{{URL::asset('assets/backend/extensions/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/backend/extensions/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/backend/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{URL::asset('assets/backend/static/js/pages/datatables.js')}}"></script>

    <script src="{{URL::asset('assets/backend/extensions/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{URL::asset('assets/backend/static/js/pages/date-picker.js')}}"></script>
    <script src="{{URL::asset('assets/backend/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{URL::asset('assets/backend/static/js/pages/sweetalert2.js')}}"></script>
    <script src="{{ URL::asset('assets/backend/img-upload.js') }}"></script>
    @if (session('success_msg'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('success_msg') }}'
        });
    </script>
      @endif

      @if (session('success_login'))
      <script>
        Toast.fire({
        icon: 'success',
        title: 'Login successfully'
        })
      </script>
      @endif

      @if (session('error_msg'))
      <script>
        Toast.fire({
        icon: 'error',
        title: '{{ session()->get('error_msg') }}'
        })
      </script>
      @endif
    @yield('script')
</body>
</html>