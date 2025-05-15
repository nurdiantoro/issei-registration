@include('template.header')

<main class="min-h-screen">
    <div class="min-h-screen flex justify-center items-center flex-col bg-cover p-2 before:content-[''] before:fixed before:inset-0 before:bg-[rgba(0,0,0,0.7)] before:z-[10] bg-fixed"
        style="background-image: url('/image/JCC Hall A.jpg')">

        <div class=" flex justify-between mt-8 z-20 w-full xl:px-40">
            <img src="{{ asset('image/Logo IISIA Putih.png') }}" alt="logo IISIA Putih"
                class="h-20 lg:h-24 object-contain">
            <img src="{{ asset('image/LOGO SEAISI.png') }}" alt="LOGO SEAISI" class="h-20 lg:h-24 object-contain">
        </div>

        <div class="flex flex-col gap-4 items-center p-2 w-full md:w-1/2 lg:w-1/3 z-20 mt-24">
            <img src="{{ asset('image/LOGO-ISSEI-2025-COLOR-3-BARIS.png') }}" class="h-32" alt="Logo ISSEI 2025">

            <div class="bg-white p-4 xl:p-14 rounded-xl w-full">
                <h1 class="text-4xl text-center font-bold mb-4 text-warna-biru-01">Registration</h1>

                <form action="{{ url('/registration/create') }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    <div class="flex flex-col w-full">
                        <label class="mb-2 cursor-pointer text-slate-800 font-semibold">Salutation</label>

                        <div class="flex flex-row gap-2">
                            <div class="flex-1">
                                <input required type="radio" name="salutation" class="hidden peer" id="salutation_mr"
                                    {{ old('salutation') == 'Mr.' ? 'checked' : '' }} value="Mr.">
                                <label for="salutation_mr"
                                    class="cursor-pointer mr-2 w-full block p-2 rounded text-warna-biru-01 bg-gray-100 text-center hover:bg-gray-200 peer-checked:bg-warna-biru-01 peer-checked:hover:bg-warna-biru-01 peer-checked:text-white peer-checked:hover:text-white">Mr.</label>
                            </div>
                            <div class="flex-1">
                                <input required type="radio" name="salutation" class="hidden peer" id="salutation_ms"
                                    {{ old('salutation') == 'Ms.' ? 'checked' : '' }} value="Ms.">
                                <label for="salutation_ms"
                                    class="cursor-pointer mr-2 w-full block p-2 rounded text-warna-biru-01 bg-gray-100 text-center hover:bg-gray-200 peer-checked:bg-warna-biru-01 peer-checked:hover:bg-warna-biru-01 peer-checked:text-white peer-checked:hover:text-white">Ms.</label>
                            </div>
                            <div class="flex-1">
                                <input required type="radio" name="salutation" class="hidden peer" id="salutation_mrs"
                                    {{ old('salutation') == 'Mrs.' ? 'checked' : '' }} value="Mrs.">
                                <label for="salutation_mrs"
                                    class="cursor-pointer mr-2 w-full block p-2 rounded text-warna-biru-01 bg-gray-100 text-center hover:bg-gray-200 peer-checked:bg-warna-biru-01 peer-checked:hover:bg-warna-biru-01 peer-checked:text-white peer-checked:hover:text-white">Mrs.</label>
                            </div>
                        </div>
                        @error('salutation')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="name" class="mb-2 cursor-pointer text-slate-800 font-semibold">Full Name</label>
                        <input required type="text" value="{{ old('name') }}" name="name" id="name"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="Your Name">
                        @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="email" class="mb-2 cursor-pointer text-slate-800 font-semibold">Email</label>
                        <input required type="text" value="{{ old('email') }}" name="email" id="email"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="example@email.com">
                        @error('email')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="telephone" class="mb-2 cursor-pointer text-slate-800 font-semibold">Phone
                            Number</label>
                        <input required type="text" value="{{ old('telephone') }}" name="telephone" id="telephone"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="">
                        @error('telephone')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="company" class="mb-2 cursor-pointer text-slate-800 font-semibold">Company</label>
                        <input required type="text" value="{{ old('company') }}" name="company" id="company"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="">
                        @error('company')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="job" class="mb-2 cursor-pointer text-slate-800 font-semibold">Job Title</label>
                        <input required type="text" value="{{ old('job') }}" name="job" id="job"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="">
                        @error('job')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="job" class="mb-2 cursor-pointer text-slate-800 font-semibold">Interest
                            to</label>
                        <select name="interest" id="interest" required
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100">
                            <option disabled hidden selected>Select One</option>
                            <option value="Seminar">Seminar</option>
                            <option value="Exhibition">Exhibition</option>
                            <option value="Seminar & Exhibition">Seminar & Exhibition</option>
                        </select>
                        @error('interest')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Captcha --}}
                    <div class="flex flex-col w-full">
                        <label for="job" class="mb-2 cursor-pointer text-slate-800 font-semibold">Captcha</label>

                        <img src="{{ captcha_src('flat') }}" alt="captcha" class="w-40">
                        <div class="mt-2"></div>
                        <input type="text" name="captcha"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100 @error('captcha') is-invalid @enderror"
                            placeholder="Please Insert Captcha">
                        @error('captcha')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-warna-biru-01/90 px-4 py-3 text-white rounded-lg cursor-pointer mt-3 hover:bg-warna-biru-01">Register</button>
                </form>
            </div>
        </div>
    </div>
</main>



@include('template.footer')
