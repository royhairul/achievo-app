<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi | Buat Akun Baru Achievo</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body>
<div class="container h-screen flex">
    <div class="p-20 bg-sky-950 w-1/3 h-screen flex flex-col justify-between">
    <div class="logo"><img class="h-5 w-auto" src="{{asset('storage/achievo-logo.svg')}}" alt=""></div>
    <div class="headline text-white">
        <h4 class="text-xl">Ayo Daftar</h4>
        <h4 class="text-4xl font-semibold italic">Sekarang!</h4>
    </div>
    <h4 class="font-semibold text-sky-500">#Jad1Juara</h4>
    </div>
    <div class="flex min-h-full w-2/3 flex-col px-6 py-12 lg:px-8">
    <div class="mt-10 sm:w-full sm:max-w-sm">
        <h1 class="text-3xl font-bold leading-9 tracking-tight text-amber-500">Registrasi</h1>
        <h2 class="text-base text-sky-950">Daftar sebagai <b>Pengelola Lomba</b></h2>
    </div>
    
    <div class="mt-10 w-3/4">
        <form class="grid grid-cols-2 gap-10" action="#" method="POST">
        <div>
            <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900">Nama Organisasi/Instansi</label>
            <div class="mt-2">
            <input id="fullname" name="fullname" type="fullname" autocomplete="fullname" placeholder="Masukkan Nama..." required
            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
            <div class="mt-2">
            <input id="fullname" name="fullname" type="fullname" autocomplete="fullname" placeholder="Masukkan Nama..." required
            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        
        <div>
            <label for="birthdate" class="block text-sm font-medium leading-6 text-gray-900">Tahun Berdiri</label>
            <div class="mt-2">
            <input  datepicker datepicker-format="dd-mm-yyyy" id="birthdate" name="birthdate" type="birthdate" autocomplete="birthdate" placeholder="DD/MM/YYYY" required
            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        
        <div>
            <label for="study" class="block text-sm font-medium leading-6 text-gray-900">Bidang</label>
            <div class="mt-2">
                <select name="" id="" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
                    <option selected disabled>Pilih Pendidikan Anda</option>
                    <option value="">SD</option>
                    <option value="">SMP</option>
                    <option value="">SMA</option>
                    <option value="">Perguruan Tinggi</option>
                </select>
            </div>
        </div>
        
        <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" placeholder="email@mail.com" required
            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
    
        <div>
            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor Telepon</label>
            <div class="mt-2">
            <input id="phone" name="phone" type="phone" autocomplete="phone" placeholder="+62..." required
            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
        </div>
    
        <div class="col-span-2">
            <button type="submit" class="flex w-full justify-center rounded-md bg-amber-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-amber-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
            Buat Akun
            </button>
        </div>
        </form>
    
        <p class="mt-10 text-sm text-gray-500">
        Sudah punya akun?
        <a href="{{ route('loginRoute') }}" class="font-semibold leading-6 text-amber-500 hover:text-amber-600">
            Masuk Sekarang!    
        </a>
        </p>
    </div>
    </div>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>