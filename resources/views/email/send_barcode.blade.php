<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iron-Steel Summit & Exhibition of Indonesia</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ $logo }}">

    <style>
        @font-face {
            font-family: 'Open Sans';
            src: url('{{ asset('fonts/OpenSans-Bold.ttf') }}') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url('{{ asset('fonts/OpenSans-SemiBold.ttf') }}') format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url('{{ asset('fonts/OpenSans-Regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        .text-gray-500 {
            color: #718096;
        }

        .warna-biru-01 {
            color: #2F80ED;
        }

        .font-bold {
            font-weight: 700;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-3xl {
            font-size: 1.875rem;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .bg-warna-biru-01-80 {
            background-color: rgba(47, 128, 237, 0.8);
        }

        .bg-warna-biru-01-80:hover {
            background-color: rgba(47, 128, 237, 1);
        }

        .text-white {
            color: #fff;
        }

        .bg-white {
            background-color: #fff;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .block {
            display: inline-block;
        }
    </style>
</head>

<body style="text-align: center">
    <main>
        <div>
            <img src="https://regis.isseindonesia.com/image/LOGO-ISSEI-2025-COLOR-3-BARIS.png" style="height: 120px"
                alt="Logo ISSEI 2025" class="mb-4">

            <div>
                <div class="mb-4 text-3xl font-bold warna-biru-01">Thank you for your registration!</div>
                <div class="mb-4 text-gray-500">Show this QR Code as you arrive at ISSEI 2025</div>

                <div>
                    <?php \Storage::disk('public')->put($user->barcode . '.png', base64_decode(DNS2D::getBarcodePNG($user->barcode, 'QRCODE', 20, 20))); ?>

                    {{-- Untuk Production --}}
                    <img style="max-width: 120px; height: fit-content" class="bg-white"
                        src={{ 'https://regis.isseindonesia.com/storage/' . $user->barcode . '.png' }} alt="barcode">

                    {{-- Untuk Local --}}
                    {{-- <img style="max-width: 100px; height: fit-content; margin-bottom: 8px"
                        src={{ asset('storage/' . $ticket->barcode . '.png') }} alt="#{{ $ticket->barcode }}">
                    <div style="font-weight: bold; margin: 4px">Ticket {{ $i }}</div>
                    <div style="font-weight: bold;">#{{ $ticket->barcode }}</div> --}}

                    <div class="text-2xl font-bold">{{ $user->barcode }}</div>
                    <div class="warna-biru-01">{{ $user->name }}</div>
                    <div class="warna-biru-01">{{ $user->email }}</div>

                    <a href="{{ url('/download/pdf/' . $user->id) }}"
                        class="px-4 py-3 rounded-lg bg-warna-biru-01-80 hover:bg-warna-biru-01 text-white block mt-4 ">Download
                        PDF</a>
                </div>

                <div class="border-t-1 border-dashed pt-4 border-gray-300">
                    <p class="text-sm text-gray-500">See you at ISSEI 2025!</p>
                    <p class="text-sm text-gray-500">21-23 May 2025</p>
                    <p class="text-sm text-gray-500 mb-4">Jakarta International Convention Center</p>
                    <p class="text-sm text-gray-500">
                        Visit <a class="text-warna-merah-01"
                            href="https://isseindonesia.com/contact/">isseindonesia.com/contact</a>
                        for more information
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
