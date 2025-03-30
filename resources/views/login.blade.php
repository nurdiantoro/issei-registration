@include('template.header')

<main class="min-h-screen">
    <div class="min-h-screen flex justify-center bg-cover p-2 before:content-[''] before:fixed before:inset-0 before:bg-[rgba(0,0,0,0.7)] before:z-[10] bg-fixed"
        style="background-image: url('/image/JCC Hall A.jpg')">

        <div class="flex flex-col gap-4 items-center p-2 w-full md:w-1/2 lg:w-1/3 z-20 mt-24">
            <img src="{{ asset('image/LOGO-ISSEI-2025-COLOR-3-BARIS.png') }}" class="h-32" alt="Logo ISSEI 2025">

            <div class="bg-white p-4 xl:p-14 rounded-xl w-full">
                <h1 class="text-4xl text-center font-bold mb-4 text-warna-biru-01">Login</h1>

                <form action="{{ url('/login/check') }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    <div class="flex flex-col w-full">
                        <label for="email" class="mb-2 cursor-pointer text-slate-800 font-semibold">Email</label>
                        <input required type="text" name="email" id="email"
                            class="px-4 py-2 rounded-lg bg-gray-200 outline-2 outline-gray-200 focus:outline-warna-orange-01 focus:bg-gray-100 focus:ring-0 hover:bg-gray-100"
                            placeholder="example@email.com">
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

                    @if (session('error'))
                        <div class="text-sm text-red-600">
                            Invalid email or password.
                        </div>
                    @endif


                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" class="text-sm cursor-pointer text-slate-800 font-semibold">Remember
                            me</label>
                    </div>

                    <button type="submit"
                        class="bg-warna-biru-01/90 px-4 py-3 text-white rounded-lg cursor-pointer mt-3 hover:bg-warna-biru-01">Login</button>
                </form>

                {{-- forgot password --}}
                {{-- <div>
                    <p class="text-sm text-center mt-4">Forgot your password? <a href="/forgot-password"
                            class="text-warna-biru-01 hover:text-warna-biru-02">Reset Password</a></p>
                </div> --}}

                <div>
                    <p class="text-sm text-center mt-4">Don't have an account? <a href="/registration"
                            class="text-warna-biru-01 hover:text-warna-biru-02">Register</a></p>
                </div>


            </div>
        </div>
    </div>
</main>



@include('template.footer')
