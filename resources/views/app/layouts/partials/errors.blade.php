@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ $error }}</strong>
        </div>

        <script>
            var alertList = document.querySelectorAll(".alert");
            alertList.forEach(function(alert) {
                new bootstrap.Alert(alert);
            });
        </script>
    @endforeach
@endif
