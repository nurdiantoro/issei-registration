@include('template.header')

<main class="min-h-screen">
    <div class="min-h-screen flex justify-center bg-cover p-2 before:content-[''] before:fixed before:inset-0 before:bg-[rgba(0,0,0,0.7)] before:z-[10] bg-fixed"
        style="background-image: url('/image/JCC Hall A.jpg')">

        <div class="flex flex-col gap-4 items-center p-2 w-full md:w-1/2 lg:w-1/3 z-20 mt-24">
            <img src="{{ asset('image/LOGO-ISSEI-2025-COLOR-3-BARIS.png') }}" class="h-32" alt="Logo ISSEI 2025">

            <div class="bg-white p-4 xl:p-14 rounded-xl w-full text-center">
                <div class="mb-4 text-3xl font-bold text-warna-biru-01">Thank you for your registration!</div>
                <div class="mb-4 text-gray-500">please download QR Code below as your digital ID card.
                    show this QR Code as you arrive at ISSEI 2025</div>

                <div class="mb-4">
                    <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($user->barcode, 'QRCODE', 10, 10) }} "
                        alt="{{ $user->barcode }}" class="mx-auto mb-2" />
                    <div class="text-2xl font-bold">{{ $user->barcode }}</div>
                    <div class="text-warna-biru-01">{{ $user->name }}</div>
                    <div class="text-warna-biru-01">{{ $user->email }}</div>

                    <a href="{{ url('/download/pdf/' . $user->id) }}"
                        class="px-4 py-3 rounded-lg bg-warna-biru-01/80 hover:bg-warna-biru-01 text-white block mt-4">Download
                        PDF</a>
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

            <a href="/registration"
                class="px-4 py-3 rounded-lg bg-warna-biru-01/80 hover:bg-warna-biru-01 text-white text-sm">Register
                Another
                Email</a>
        </div>

    </div>
</main>



@include('template.footer')
