<script>
    feather.replace();
</script>

<script>
    const input = document.getElementById('barcodeInput');
    const form = document.getElementById('barcodeForm');

    input.addEventListener('input', function() {
        if (this.value.length >= 9) {
            form.submit();
        }
    });
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
@if (session()->has('barcode_not_exists'))
    <script>
        Swal.fire({
            title: 'Failed!',
            text: 'Barcode Not Found, Please Check Again.',
            icon: 'error',
            confirmButtonText: 'Back',
            confirmButtonColor: '#3085d6',
        })
    </script>
@endif
@if (session()->has('barcode_exists'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "bottom",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "Signed in successfully"
        });
    </script>
@endif

</body>

</html>
