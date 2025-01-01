<?php

namespace App\Http\Controllers;

use App\Models\FormLomba;
use App\Models\JawabanForm;
use App\Models\Lomba;
use App\Models\Peserta;
use Auth;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function storeJawaban(Request $request, $idLomba)
    {
        // Mendapatkan User
        $getUser = Auth::user()->user_id;

        // Mendapatkan data lomba
        $getLomba = Lomba::where('lomba_id', $idLomba)->first();
        $getPenyelenggaraLomba = $getLomba->lomba_penyelenggara;
        $getIdForm = $getLomba->lomba_id;
        $item = FormLomba::where('form_lomba', $getIdForm)->first()->form_content;
        $jsonItem = json_decode($item, true);

        // Ambil email peserta dari input form
        $pesertaEmail = $request->input('peserta_email');

        // Cek apakah peserta dengan email ini sudah mendaftar di lomba ini
        $existingJawaban = JawabanForm::where('jawaban_lomba', $idLomba)
            ->whereJsonContains('jawaban_content->peserta_email', $pesertaEmail)
            ->first();

        if ($existingJawaban) {
            // Pesan kesalahan jika peserta sudah mendaftar
            return back()->withErrors(['message' => 'Sepertinya anda sudah mendaftar lomba ini, hubungi bantuan jika ada kesalahan.']);
        }

        // Cek kapasitas lomba
        $totalJawaban = JawabanForm::where('jawaban_lomba', $idLomba)->count();
        $kapasitasLomba = $getLomba->lomba_kapasitas;

        if ($totalJawaban >= $kapasitasLomba) {
            return back()->withErrors(['message' => 'Anda tidak bisa mendaftar karena kapasitas lomba sudah penuh.']);
        }

        // Memproses file upload jika ada
        $content = $request->except('_token'); // jawaban_content

        foreach ($request->file() as $field => $file) {
            if ($file) {
                $timestamp = \Carbon\Carbon::now()->format('YmdHis'); // Ambil waktu detail untuk penamaan file
                $fileName = str_replace(' ', '_', strtolower($pesertaEmail)) . '_' . $timestamp . '.' . $file->getClientOriginalExtension();

                // Tentukan path penyimpanan
                $destinationPath = public_path('images/peserta');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true); // Buat folder jika belum ada
                }

                // Pindahkan file ke folder 'images/peserta'
                $file->move($destinationPath, $fileName);

                // Simpan nama file di dalam jawaban_content
                $content[$field] = $fileName;
            }
        }

        // Membuat label dari form data
        $label = $this->getLabel($jsonItem); // jawaban_label
        $names = [];

        foreach ($jsonItem as $field) {
            if (is_array($field) && isset($field['name'])) {
                $name = $field['name'];
                $names[$name] = $name;
            }
        }

        // Simpan jawaban peserta
        $dataJawaban = [
            'jawaban_peserta' => $getUser,
            'jawaban_penyelenggara' => $getPenyelenggaraLomba,
            'jawaban_lomba' => $getLomba->lomba_id,
            'jawaban_content' => json_encode($content, true),
            'jawaban_label' => json_encode($label),
            'jawaban_input' => json_encode($names),
        ];

        // Simpan data jawaban ke dalam database
        JawabanForm::create($dataJawaban);

        //dd($dataJawaban);

        return redirect()->route('pesertaIndexRoute');
    }

    public function getLabel($formData)
    {
        $labelMapping = [];

        // Iterasi melalui setiap elemen form untuk mendapatkan name dan label
        foreach ($formData as $formElement) {
            if (isset($formElement['name']) && isset($formElement['label'])) {
                // // Ganti spasi dengan underscore untuk label deskriptif
                // $descriptiveLabel = strtolower(str_replace(' ', '_', $formElement['label']));
                // Tambahkan ke mapping [name => label deskriptif]
                $labelMapping[$formElement['name']] = $formElement['label'];
            }
        }

        return $labelMapping;
    }
}
