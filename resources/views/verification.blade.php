<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi | Akun Baru Achievo </title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container h-screen flex">
        <div class="p-20 bg-sky-950 w-1/3 h-screen flex flex-col justify-between">
            <div class="logo"><img class="h-5 w-auto" src="{{ asset('storage/achievo-logo.svg') }}" alt="">
            </div>
            <div class="headline text-white">
                <h4 class="text-xl">Selamat Datang</h4>
                <h4 class="text-4xl">Sang <b class="italic">Juara</b></h4>
            </div>
            <h4 class="font-semibold text-sky-500">#Jad1Juara</h4>
        </div>
        <div class="flex min-h-full w-2/3 flex-col justify-center px-6 py-12 lg:px-8">
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <h1 class="text-3xl font-bold leading-9 tracking-tight text-sky-500">Verifikasi Akun Anda</h1>
                <p class="block text-sm font-medium leading-6 text-sky-950">
                    Kami telah mengirimkan kode ke Email Anda
                </p>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

                <form class="max-w-sm mx-auto">
                    <div class="flex mb-2 space-x-2 rtl:space-x-reverse">
                        <div>
                            <label for="code-1" class="sr-only">First code</label>
                            <input type="text" maxlength="1" data-focus-input-init data-focus-input-next="code-2"
                                id="code-1"
                                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                required />
                        </div>
                        <div>
                            <label for="code-2" class="sr-only">Second code</label>
                            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-1"
                                data-focus-input-next="code-3" id="code-2"
                                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                required />
                        </div>
                        <div>
                            <label for="code-3" class="sr-only">Third code</label>
                            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-2"
                                data-focus-input-next="code-4" id="code-3"
                                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                required />
                        </div>
                        <div>
                            <label for="code-4" class="sr-only">Fourth code</label>
                            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-3"
                                data-focus-input-next="code-5" id="code-4"
                                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                required />
                        </div>
                        <div>
                            <label for="code-5" class="sr-only">Fifth code</label>
                            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-4"
                                data-focus-input-next="code-6" id="code-5"
                                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                required />
                        </div>
                        <div>
                            <label for="code-6" class="sr-only">Sixth code</label>
                            <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-5"
                                id="code-6"
                                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                                required />
                        </div>
                    </div>
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Masukkan Kode sesuai dengan yang telah kami kirimkan.
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        // use this simple function to automatically focus on the next input
        function focusNextInput(el, prevId, nextId) {
            if (el.value.length === 0) {
                if (prevId) {
                    document.getElementById(prevId).focus();
                }
            } else {
                if (nextId) {
                    document.getElementById(nextId).focus();
                }
            }
        }

        document.querySelectorAll('[data-focus-input-init]').forEach(function(element) {
            element.addEventListener('keyup', function() {
                const prevId = this.getAttribute('data-focus-input-prev');
                const nextId = this.getAttribute('data-focus-input-next');
                focusNextInput(this, prevId, nextId);
            });
        });
    </script>
</body>

</html>
