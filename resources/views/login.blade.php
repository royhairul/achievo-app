<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body>
  <div class="container h-screen flex">
    <div class="p-20 bg-sky-950 w-1/3 h-screen flex flex-col justify-between">
      <div class="logo">
        <a href="/">
          <img class="h-5 w-auto" src="{{asset('storage/achievo-logo.svg')}}" alt="">
        </a>
      </div>
      <div class="headline text-white">
        <h4 class="text-xl">Selamat Datang</h4>
        <h4 class="text-4xl">Sang <b class="italic">Juara</b></h4>
      </div>
      <h4 class="font-semibold text-sky-500">#Jad1Juara</h4>
    </div>
    <div class="flex min-h-full w-2/3 flex-col justify-center px-6 py-12 lg:px-8">
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <h1 class="text-3xl font-bold leading-9 tracking-tight text-sky-500">Login</h1>
        <h2 class="text-lg font-semibold text-sky-950">Masuk dengan Akunmu!</h2>
      </div>
    
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="#" method="POST">
          <div>
            <label for="email" class="block text-sm font-medium leading-6 text-sky-950">Email address</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" autocomplete="email" required
              class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
          </div>
    
          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm font-medium leading-6 text-sky-950">Password</label>
              <div class="text-sm">
                <a href="#" class="font-semibold text-sky-400 hover:text-sky-500">Lupa password?</a>
              </div>
            </div>
            <div class="mt-2">
              <input id="password" name="password" type="password" autocomplete="current-password" required
              class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
            </div>
          </div>
    
          <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-sky-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
              Masuk
            </button>
          </div>
        </form>
    
        <p class="mt-10 text-sm text-sky-950">
          Belum punya akun?
          <a href="{{ route('registerRoute') }}" class="font-semibold leading-6 text-sky-400 hover:text-sky-500">
            Daftar Dulu!
          </a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>