@include('template.header')

<main class="min-h-screen">
    <div class="min-h-screen flex justify-start items-center flex-col bg-cover p-2 before:content-[''] before:fixed before:inset-0 before:bg-[rgba(0,0,0,0.7)] before:z-[10] bg-fixed"
        style="background-image: url('/image/JCC Hall A.jpg')">

        <div class=" flex justify-between mt-8 z-20 w-full xl:px-40">
            <img src="{{ asset('image/Logo IISIA Putih.png') }}" alt="logo IISIA Putih"
                class="h-20 lg:h-24 object-contain">
            <img src="{{ asset('image/LOGO SEAISI.png') }}" alt="LOGO SEAISI" class="h-20 lg:h-24 object-contain">
        </div>

        <div class="flex flex-col gap-4 items-center p-2 w-full md:w-1/2 lg:w-1/3 z-20 mt-24">
            <img src="{{ asset('image/LOGO-ISSEI-2025-COLOR-3-BARIS.png') }}" class="h-32" alt="Logo ISSEI 2025">

            <div class="bg-white p-4 xl:p-14 rounded-xl w-full">
                <h1 class="text-4xl text-center font-bold mb-4 text-warna-biru-01">Check In</h1>
                <h2 class="text-2xl text-center font-bold mb-4 text-warna-biru-01">{{ Auth::user()->name }}</h2>

                <form action="{{ url('/check-in/store') }}" method="POST" class="flex flex-col gap-6" id="barcodeForm">
                    @csrf
                    <div class="flex flex-col w-full">
                        <label for="barcode" class="mb-2 cursor-pointer text-slate-800 font-semibold">Barcode</label>
                        <input required type="text" value="{{ old('barcode') }}" name="barcode" id="barcodeInput"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="Scan here">
                        @error('barcode')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-warna-biru-01/90 px-4 py-3 text-white rounded-lg cursor-pointer mt-3 hover:bg-warna-biru-01">Checkin</button>
                </form>
            </div>
        </div>
    </div>
</main>


@include('template.footer')
