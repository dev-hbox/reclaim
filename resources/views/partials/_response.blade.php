@foreach (['success', 'danger', 'warning', 'info', 'message'] as $msg)
    @if (session($msg))
        <div class="alert alert-{{ $msg == 'message' ? 'success' : $msg }} alert-dismissible fade show" role="alert">

            {{ session($msg) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endforeach



<script>
    // Automatically hide alerts after 4 seconds
    setTimeout(function() {
        let alertNode = document.querySelector('.alert');
        if (alertNode) {
            let alertInstance = bootstrap.Alert.getOrCreateInstance(alertNode);
            alertInstance.close();
        }
    }, 4000);
</script>
