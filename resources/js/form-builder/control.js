// Pilih elemen yang ingin dipantau
const targetElement = document.getElementById('form-builder'); // Ganti dengan ID elemen target

// Fungsi callback yang akan dijalankan jika ada perubahan
const callback = (mutationsList, observer) => {
    mutationsList.forEach(mutation => {
        if (mutation.type === 'childList') {
            console.log('Child nodes have been added or removed');
        } else if (mutation.type === 'attributes') {
            console.log('Attributes of an element have changed');
        }
    });
};

// Konfigurasi observer untuk memantau perubahan tertentu
const config = {
    childList: true, // Memantau penambahan atau penghapusan elemen anak
    attributes: true, // Memantau perubahan atribut
    subtree: true, // Memantau perubahan di seluruh subtree elemen target
};

// Membuat observer dan mulai memantau
const observer = new MutationObserver(callback);

// Memulai pemantauan pada elemen target
observer.observe(targetElement, config);

// Untuk berhenti memantau
// observer.disconnect();
