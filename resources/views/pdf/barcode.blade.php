<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iron-Steel Summit & Exhibition of Indonesia</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/LOGO-ISSEI-2025.png') }}">

    <style>
        @font-face {
            font-family: 'Open Sans';
            src: url('{{ public_path('fonts/OpenSans-Bold.ttf') }}') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url('{{ public_path('fonts/OpenSans-SemiBold.ttf') }}') format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url('{{ public_path('fonts/OpenSans-Regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        .text-gray-500 {
            color: #718096
        }

        .warna-biru-01 {
            color: #2F80ED
        }

        .font-bold {
            font-weight: 700
        }

        .mb-2 {
            margin-bottom: 0.5rem
        }

        .mb-4 {
            margin-bottom: 1rem
        }

        .text-3xl {
            font-size: 1.875rem
        }

        .text-2xl {
            font-size: 1.5rem
        }
    </style>
</head>

<body style="text-align: center">


    <main>
        <div>
            <img src="{{ $logo }}" style="height: 120px" alt="Logo ISSEI 2025" class="mb-4">

            <div>
                <div class="mb-4 text-3xl font-bold text-warna-biru-01">Thank you for your registration!</div>
                <div class="mb-4 text-gray-500">Show this QR Code as you arrive at ISSEI 2025</div>

                <div>
                    <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($user->barcode, 'QRCODE', 10, 10) }} "
                        alt="{{ $user->barcode }}" class="mx-auto mb-2" />
                    <div class="text-2xl font-bold">{{ $user->barcode }}</div>
                    <div class="text-warna-biru-01">{{ $user->name }}</div>
                    <div class="text-warna-biru-01">{{ $user->email }}</div>
                </div>

                <div class="border-t-1 border-dashed pt-4 border-gray-300">
                    <p class="text-sm text-gray-500">See you at ISSEI 2025!</p>
                    <p class="text-sm text-gray-500">21-23 May 2025</p>
                    <p class="text-sm text-gray-500 mb-4">Jakarta International Convention Center</p>
                    <p class="text-sm text-gray-500">visit <a class="text-warna-merah-01"
                            href="https://isseindonesia.com/contact/">isseindonesia.com/contact</a> for more
                        information</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
