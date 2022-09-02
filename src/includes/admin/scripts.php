<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<script src="https://kit.fontawesome.com/539eca1b92.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
    function toastSuccess(title, msg) {
        $(document).Toasts('create', {
            title: title,
            body: msg,
            class: "bg-success",
            autohide: true,
            delay: 2500 
        });
    }

    function toastWarning(title, msg) {
        $(document).Toasts('create', {
            title: title,
            body: msg,
            class: "bg-warning",
            autohide: true,
            delay: 2500 
        });
    }

    function toastDanger(title, msg) {
        $(document).Toasts('create', {
            title: title,
            body: msg,
            class: "bg-danger",
            autohide: true,
            delay: 2500 
        });
    }

    function toastInfo(title, msg) {
        $(document).Toasts('create', {
            title: title,
            body: msg,
            class: "bg-info",
            autohide: true,
            delay: 2500 
        });
    }
</script>