<script>
    feather.replace();
</script>

{{-- Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session()->has('email_exists'))
    <script>
        Swal.fire({
            title: 'Email Already Exists!',
            // text: 'Here is your event ticket, or re-register using a different email.',
            icon: 'error',
            confirmButtonText: 'Back',
            confirmButtonColor: '#3085d6',
        })
    </script>
@endif

</body>

</html>
