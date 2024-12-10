@extends('layouts.app')

@section('title', 'Penyelenggara | Daftar Lomba Kamu')

@section('content')
    <div class="p-4">
        <div class="p-4 pt-8 rounded-lg mt-14 gap-8">
            <div class="flex items-center justify-between">
                <div>
                    <div class="mb-2">
                        <h2 class="text-sky-950 font-semibold text-2xl">Buat Formulir Lomba</h2>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-sky-950 opacity-80">
                            Buat Formulir untuk Lomba.
                        </p>
                    </div>
                </div>
                <a href="#"
                    class="flex gap-2 rounded-md bg-sky-500 px-3 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                    <span class="material-symbols-rounded">description</span>
                    Simpan Formulir
                </a>
            </div>
            <input type="hidden" name="form-render-data" id="form-render-data" value="{{ $item['form_content'] }}">
            <div id="form-render" class=""></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>

    <script>
        var data = $('#form-render-data').val()

        var formRenderOptions = {
            formData: $('#form-render-data').val()
        }
        const renderForm = $('#form-render').formRender(formRenderOptions)

        console.log(renderForm.userData)
    </script>
    </body>

    </html>
