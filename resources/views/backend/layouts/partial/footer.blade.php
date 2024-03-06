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
    @yield('script')
</body>
</html>