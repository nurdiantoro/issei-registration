<script>
    feather.replace();
</script>

@vite('resources/js/footer.js')

{{-- Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session()->has('email_exists'))
    <script>
        Swal.fire({
            title: 'Email Already Exists!',
            text: 'Please use another email or login',
            icon: 'error',
            confirmButtonText: 'Back',
            confirmButtonColor: '#3085d6',
        })
    </script>
@endif

</body>

</html>
