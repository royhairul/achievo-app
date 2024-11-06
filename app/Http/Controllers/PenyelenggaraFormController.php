<?php

namespace App\Http\Controllers;

use App\Models\FormLomba;
use App\Models\Lomba;
use Auth;
use Illuminate\Http\Request;

class PenyelenggaraFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penyelenggara.formLomba.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function storeFormLomba(Request $request)
    {
        $dataLomba = session('dataLomba');
        $idPenyelenggara = Auth::user()->user_id;

        $dataFormLomba = [
            'form_penyelenggara' => $idPenyelenggara,
            'form_content' => $request->input('form_data')
        ];

        $dbFormLomba = FormLomba::firstOrCreate($dataFormLomba);

        if ($dbFormLomba) {
            $dataLomba['lomba_penyelenggara'] = $idPenyelenggara;
            $dataLomba['lomba_form'] = $dbFormLomba->form_id;

            $dbLomba = Lomba::create($dataLomba);

            FormLomba::where('form_id', $dbFormLomba->form_id)
                ->update(['form_lomba' => $dbLomba->lomba_id]);


            return redirect()->route('penyelenggaraLombaRoute');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = FormLomba::where('form_id', $id)->get()[0];

        // return dd($item);
        return view('penyelenggara.formLomba.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
