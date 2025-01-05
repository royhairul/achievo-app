@extends('layouts.penyelenggara')

@section('title', 'Penyelenggara | Buat Lomba')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 pt-8 rounded-lg mt-14 gap-8">
        <div class="flex flex-col items-center justify-between sm:flex-row">
            <div>
                <div class="mb-1">
                    <h2 class="text-sky-500 font-semibold text-2xl">Buat Lomba</h2>
                </div>
                <div class="mb-4">
                    <p class="text-sm text-sky-950 opacity-80">
                        Isikan formulir berikut untuk membuat lomba.
                    </p>
                </div>
            </div>
            <form method="POST" action="{{ route('pylStoreFormRoute') }}">
                @csrf
                <input type="hidden" id="form-data" name="form_data" value="">
                <button type="submit" id="btn-save-form"
                    class="flex gap-2 rounded-md bg-sky-500 px-3 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                    <span class="material-symbols-rounded">description</span>
                    Simpan Formulir
                </button>
            </form>
        </div>
        <div id="form-builder" class="disable-tailwind"></div>
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
@endsection