import './control'

var options = {
    controlOrder: ['text','select','number'],
    fields: [
        {
            label: "~Nama Lengkap",
            type: "text",
            name: "peserta_nama",
            subtype: "peserta_nama",
            placeholder: "Masukkan Nama Anda...",
            icon: "<span class='material-symbols-outlined text-lg'>face</span>",
        },
        {
            label: "~Email",
            type: "text",
            name: "peserta_email",
            placeholder: "Masukkan Email Anda...",
            subtype: "peserta_email",
            icon: "<span class='material-symbols-outlined text-lg'>email</span>"
        },
        {
            label: "~Jenis Kelamin",
            type: "select",
            name: "peserta_gender",
            subtype: "gender",
            placeholder: "Pilih Jenis Kelamin...",
            values: [
                {
                    label: 'Pria',
                    value: 'Pria',
                },
                {
                    label: 'Wanita',
                    value: 'Wanita',
                }
            ],
            icon: "<span class='material-symbols-outlined text-lg'>male</span>",
        },
        {
            label: "~Umur",
            type: "number",
            name: "peserta_tanggallahir",
            subtype: "tanggallahir",
            placeholder: "Masukkan Umur Anda...",
            icon: "<span class='material-symbols-outlined text-lg'>fit_page_height</span>",
        },
        {
            label: "~Telepon",
            type: "text",
            name: "peserta_telepon",
            subtype: "telepon",
            icon: "<span class='material-symbols-outlined text-lg'>contacts</span>",
        },
    ],
    disabledActionButtons: ['data', 'save', 'clear'],
    disableFields: ['autocomplete', 'hidden', 'button', 'paragraph'],
    disabledAttrs: [
        'name',
        'access',
        'value',
        'style',
        'className'
    ],
    replaceFields: [{
        type: "text",
        label: "Text Field",
        // className: "bg-gray-50 border border-gray-300 text-sky-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    },
    {
        type: "header",
        label: "Header",
        // className: "text-xl font-semibold"
    },
    ],
    inputSets: [
        {
            icon: '<span class="material-symbols-outlined text-lg">badge</span>',
            label: '~Data Peserta', // optional - one will be generated from the label if name not supplied
            name: 'data-peserta', // optional - one will be generated from the label if name not supplied
            showHeader: false, // optional - Use the label as the header for this set of inputs
            fields: [
                {
                    label: "~Nama Lengkap",
                    type: "text",
                    name: "peserta_nama",
                    subtype: "peserta_nama",
                    placeholder: "Masukkan Nama Anda...",
                    icon: "<span class='material-symbols-outlined text-lg'>face</span>",
                },
                {
                    label: "~Email",
                    type: "text",
                    name: "peserta_email",
                    placeholder: "Masukkan Email Anda...",
                    subtype: "peserta_email",
                    icon: "<span class='material-symbols-outlined text-lg'>email</span>"
                },
                {
                    label: "~Jenis Kelamin",
                    type: "select",
                    name: "peserta_gender",
                    subtype: "gender",
                    values: [
                        {
                            label: 'Pria',
                            value: 'Pria',
                        },
                        {
                            label: 'Wanita',
                            value: 'Wanita',
                        }
                    ],
                    icon: "<span class='material-symbols-outlined text-lg'>male</span>",
                },
                {
                    label: "~Umur",
                    type: "number",
                    name: "peserta_tanggallahir",
                    subtype: "tanggallahir",
                    placeholder: "Masukkan Umur Anda...",
                    icon: "<span class='material-symbols-outlined text-lg'>fit_page_height</span>",
                },
                {
                    label: "~Telepon",
                    type: "text",
                    name: "peserta_telepon",
                    subtype: "telepon",
                    icon: "<span class='material-symbols-outlined text-lg'>contacts</span>",
                },
            ],
        }
    ],
    onSave: (e) => {
        data = JSON.stringify(e);
    }

};

jQuery($ => {
    const fbEditor = document.getElementById("form-builder");
    const inputData = document.getElementById("form-data");
    const formBuilder = $(fbEditor).formBuilder(options);

    document
        .getElementById("btn-save-form")
        .addEventListener("click", (e) => {
            e.preventDefault(); // Cegah form submit langsung
            inputData.value = formBuilder.actions.getData('json'); // Set value data form builder
            e.target.closest('form').submit(); // Submit form setelah data disimpan
        });
});