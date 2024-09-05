@session('success')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ session('success') }}</strong>
    </div>

    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert);
        });
    </script>
@endsession
