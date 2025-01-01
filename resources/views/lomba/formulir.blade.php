@extends('layouts.app')

@section('title', "Formulir $lomba->lomba_nama")

@section('content')
<div class="min-h-screen">
    <x-navbar type='eksplorasi' is-login="{{ Auth::check() }}"></x-navbar>
    <div class="page-padding">
        <x-breadcrumbs :items="[
        ['label' => 'Beranda', 'url' => route('welcomeRoute')],
        ['label' => 'Detail Lomba', 'url' => route('lombaDetailRoute', $lomba->lomba_id)],
        ['label' => 'Formulir', 'url' => ''],
    ]" />
        <div class="flex items-center justify-between">
            <div>
                <div class="mb-2">
                    <!-- <h2 class="text-sky-950 font-semibold text-xl">Mendaftar Lomba</h2> -->
                    <h2 class="text-sky-700 font-semibold text-2xl">{{ $lomba->lomba_nama }}</h2>
                </div>
                <div class="mb-4">
                    <p class="text-sm text-sky-950 opacity-60">
                        Isikan formulir berikut untuk mengikuti lomba.
                    </p>
                </div>
            </div>
        </div>
        <!-- Menampilkan pesan kesalahan -->
        @if ($errors->any())
            <div class="alert alert-danger bg-red-100 text-red-700 border border-red-400 p-2 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="hidden" name="form-render-data" id="form-render-data" value="{{ $item['form_content'] }}">
        <form method="POST" action="{{ route('lombaStoreFormRoute', $lomba->lomba_id) }}" enctype="multipart/form-data"
            class="!text-sky-950/80">
            @csrf
            <div id="form-render" class=""></div>
            <div class="col-span-2">
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-sky-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
                    Daftar
                </button>
            </div>
        </form>
    </div>
</div>


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
@endsection