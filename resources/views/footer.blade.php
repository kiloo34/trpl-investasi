<!-- Footer -->
    <footer class="py-5 bg-dark" style="width :100%">
        <div class="container-fluid">
            <p class="m-0 text-center text-white"><b>Version</b> 1.0.0</p>
        </div>
        <p class="m-0 text-center text-white">
            <strong>Copyright &copy; {{ date('Y') == 2018 ? 2018 : '2018-'.date('Y') }} <a href="{{ url('/') }}">{{ config('app.name') }}</a>.</strong> All rights
            reserved.
        </p>
    <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
