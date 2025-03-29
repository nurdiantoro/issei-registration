@include('template.header')

<main class="min-h-screen">
    <div class="min-h-screen flex justify-center bg-cover p-2 before:content-[''] before:fixed before:inset-0 before:bg-[rgba(0,0,0,0.7)] before:z-[10] bg-fixed"
        style="background-image: url('/image/JCC Hall A.jpg')">

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
                                    value="Mr.">
                                <label for="salutation_mr"
                                    class="cursor-pointer mr-2 w-full block p-2 rounded text-warna-biru-01 bg-gray-100 text-center hover:bg-gray-200 peer-checked:bg-warna-biru-01 peer-checked:hover:bg-warna-biru-01 peer-checked:text-white peer-checked:hover:text-white">Mr.</label>
                            </div>
                            <div class="flex-1">
                                <input required type="radio" name="salutation" class="hidden peer" id="salutation_ms"
                                    value="Ms.">
                                <label for="salutation_ms"
                                    class="cursor-pointer mr-2 w-full block p-2 rounded text-warna-biru-01 bg-gray-100 text-center hover:bg-gray-200 peer-checked:bg-warna-biru-01 peer-checked:hover:bg-warna-biru-01 peer-checked:text-white peer-checked:hover:text-white">Ms.</label>
                            </div>
                            <div class="flex-1">
                                <input required type="radio" name="salutation" class="hidden peer" id="salutation_mrs"
                                    value="Mrs.">
                                <label for="salutation_mrs"
                                    class="cursor-pointer mr-2 w-full block p-2 rounded text-warna-biru-01 bg-gray-100 text-center hover:bg-gray-200 peer-checked:bg-warna-biru-01 peer-checked:hover:bg-warna-biru-01 peer-checked:text-white peer-checked:hover:text-white">Mrs.</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="name" class="mb-2 cursor-pointer text-slate-800 font-semibold">Full Name</label>
                        <input required type="text" name="name" id="name"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="Your Name">
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="email" class="mb-2 cursor-pointer text-slate-800 font-semibold">Email</label>
                        <input required type="text" name="email" id="email"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="example@email.com">
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="telephone" class="mb-2 cursor-pointer text-slate-800 font-semibold">Phone
                            Number</label>
                        <input required type="text" name="telephone" id="telephone"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="">
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="company" class="mb-2 cursor-pointer text-slate-800 font-semibold">Company</label>
                        <input required type="text" name="company" id="company"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="">
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="job" class="mb-2 cursor-pointer text-slate-800 font-semibold">Job Title</label>
                        <input required type="text" name="job" id="job"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="">
                    </div>
                    <div class="flex flex-col w-full relative">
                        <label for="password" class="mb-2 cursor-pointer text-slate-800 font-semibold">Password</label>

                        <div class="relative">
                            <input required type="password" name="password" id="password"
                                class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100 w-full"
                                placeholder="">
                            <i data-feather="eye" id="togglePasswordOn"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400"></i>
                            <i data-feather="eye-off" id="togglePasswordOff"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400 hidden"></i>
                        </div>
                    </div>

                    <button type="submit"
                        class="bg-warna-biru-01/90 px-4 py-3 text-white rounded-lg cursor-pointer mt-3 hover:bg-warna-biru-01">Register</button>
                </form>

                <div>
                    <p class="text-sm text-center mt-4">Already have an account? <a href="/login"
                            class="text-warna-biru-01 hover:text-warna-biru-02">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</main>



@include('template.footer')
