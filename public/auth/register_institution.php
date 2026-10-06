<?php
require __DIR__ . '/../../app/core/helpers.php';
$title = 'RedLine';

ob_start(); ?>
<div class="min-h-screen bg-slate-100 flex items-center justify-center p-4">
  
  <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
    
    <div class="flex justify-center mb-4">
        <img src="/assets/img/brand/redline_auth.png" alt="Logo RedLine" class="h-12 w-auto">
     </div>

    <h2 class="text-2xl font-bold text-center text-slate-800 mb-6">Registrasi Institusi</h2>
    <div class="mb-6">
        <div class="flex gap-2" id="stepIndicator">
            <div class="h-1.5 flex-1 rounded-full bg-gray-200 transition-colors"></div>
            <div class="h-1.5 flex-1 rounded-full bg-gray-200 transition-colors"></div>
            <div class="h-1.5 flex-1 rounded-full bg-gray-200 transition-colors"></div>
        </div>
        <p id="stepLabel" class="text-xs text-gray-500 mt-2 text-center">Registrasi Data Institusi</p>
    </div>
    
    <form method="post" enctype="multipart/form-data" id="institutionForm" novalidate>
        
        <section data-step="1">
            <div class="mb-8">
                <?php partial('input', ['name' => 'institution_types', 'label' => 'Jenis Institusi', 'type' => 'select', 'options' => [
                    'hospital'  => 'Rumah Sakit',
                    'utd'       => 'UTD / PMI',
                    'community' => 'Komunitas',
                    'campus'    => 'Kampus',
                    'company'   => 'Perusahaan',
                    'worship'   => 'Masjid / Tempat ibadah'
                    ], 'required' => true]) ?>
            </div>
            <div class="mb-8">
                <?php partial('input', ['name' => 'institution_name', 'label' => 'Nama Institusi', 'type' => 'text', 'placeholder' => 'Masukkan Nama Institusi/Organisasi', 'required' => true]) ?>
            </div>
            <div class="mb-8">
                <?php partial('input', ['name' => 'address_inst', 'label' => 'Alamat', 'type' => 'textarea', 'placeholder' => 'Masukkan Alamat Lengkap', 'required' => true]) ?>
            </div>
            <div class="mb-8">
                <?php partial('input', ['name' => 'town', 'label' => 'Kota/Kabupaten', 'type' => 'select', 'options' => ['kota_makassar' => 'Kota Makassar'], 'required' => true]) ?>
            </div>
            <div class="mb-8">
                <?php partial('input', ['name' => 'country', 'label' => 'Kecamatan', 'type' => 'select', 'options' => [
                    'biringkanaya'  => 'Biringkanaya',
                    'bontoala'       => 'Bontoala',
                    'makassar' => 'Makassar',
                    'mamajang'    => 'Mamajang',
                    'manggala'   => 'Manggala',
                    'mariso'   => 'Mariso',
                    'panakkukang'   => 'Panakkukang',
                    'rappocini'   => 'Rappocini',
                    'tallo'   => 'Tallo',
                    'tamalanrea'   => 'Tamalanrea',
                    'tamalate'   => 'Tamalate',
                    'ujung_pandang'   => 'Ujung Pandang',
                    'ujung_tanah'   => 'Ujung Tanah'
                    ], 'required' => true]) ?>
            </div>
                <?php partial('button', ['label' => 'Lanjut','variant' => 'continue', 'attrs' => ['data-next' => true]])?>
            <div class="flex items-center my-5">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="mx-3 text-sm text-gray-500">Atau</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>
            <?php partial('button', ['label' => 'Sudah Memiliki Akun?', 'variant' => 'login', 'href' => 'login.php'])?>
        </section>
        <section data-step="2" class="hidden">
            <div class="mb-8">
                <?php partial('input', ['name' => 'name', 'label' => 'Nama Lengkap', 'type' => 'text', 'placeholder' => 'Fullname', 'required' => true]) ?>
            </div>
            <div class="mb-8">
                <?php partial('input', ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'youremail@gmail.com', 'required' => true]) ?>
            </div>
            <div class="mb-8">
                <?php partial('input', ['name' => 'telpon', 'label' => 'No. Telpon', 'type' => 'tel', 'placeholder' => '+622134567890', 'required' => true]) ?>
            </div>
            <div class="mb-8">
                <?php partial('input', ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'placeholder' => 'Masukkan Password', 'required' => true, 'error' => $_SESSION['errors']['password'] ?? '']) ?>
            </div>
            <div class="mb-8">
                <?php partial('input', ['name' => 'cPassword', 'label' => 'Konfirmasi Password', 'type' => 'password', 'placeholder' => 'Masukkan Ulang Password', 'required' => true]) ?>
            </div>
            <div class="flex gap-3">
                <?php partial('button', ['label' => 'Kembali', 'variant' => 'back', 'attrs' => ['data-prev' => true], 'half' => true])?>
                <?php partial('button', ['label' => 'Lanjut',  'variant' => 'continue', 'attrs' => ['data-next' => true], 'half' => true])?>
            </div>
        </section>
        <section data-step="3" class="hidden">
            <div class="mb-8">
                <?php partial('input', ['name' => 'uploadFile', 'type' => 'file', 'multiple' => true]) ?>
            </div>
            <div class="mb-8">
                <?php partial('input', ['name' => 'agreement', 'label' => 'Data yang saya isi benar dan saya menyetujui <a href="https://jdih.komdigi.go.id/produk_hukum/view/id/832/t/undangundang+nomor+27+tahun+2022">Kebijakan Privasi</a> yang berlaku.', 'type' => 'checkbox', 'required' => true]) ?>
            </div>
            <?php partial('button', ['label' => 'Kembali', 'variant' => 'back', 'attrs' => ['data-prev' => true]])?>
            <?php partial('button', ['label' => 'Konfirmasi', 'type' => 'submit',  'variant' => 'medical'])?>
        </section>
    </form>
  </div>

</div>
<?php
$content = ob_get_clean();

require __DIR__ . '/../../app/views/layouts/base.php';