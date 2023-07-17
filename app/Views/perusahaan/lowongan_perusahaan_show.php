<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<!-- <div class="col-auto">
    <div class="btn-list">
        <a id="btn_save" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                <path d="M14 4l0 4l-6 0l0 -4"></path>
            </svg>
            Simpan
        </a>
    </div>
</div> -->
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Detail Lowongan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="row">
                                <label class="col col-form-label">Daftar langsung</label>
                                <span class="col-auto">
                                    <label class="form-check form-check-single form-switch">
                                        <input <?= formChecker($lowongan['daftar_langsung'], 1, 'checked') ?> disabled id="daftar_langsung" name="daftar_langsung" class="form-check-input" type="checkbox" value="1">
                                    </label>
                                </span>
                            </label>
                            <small class="form-hint">Mahasiswa dapat langsung melamar melalui website ini.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="deadline_daftar" class="form-label">Tenggat Pendaftaran</label>
                            <div class="form-control-plaintext"><?= convertDate($lowongan['deadline_daftar']) ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <div class="form-control-plaintext"><?= $lowongan['judul'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Kriteria</label>
                            <div class="form-control-plaintext"><?= $lowongan['kriteria'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <div class="form-control-plaintext"><?= $lowongan['deskripsi'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Cara Mendaftar</label>
                            <div class="form-control-plaintext"><?= $lowongan['cara_daftar'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tipe_pekerjaan" class="form-label">Tipe Pekerjaan</label>
                            <div class="form-control-plaintext"><?= $lowongan['tipe_pekerjaan'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Info Tambahan</label>
                            <div class="form-control-plaintext"><?= $lowongan['info_tambahan'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Lama Kontrak</label>
                            <div class="form-control-plaintext"><?= $lowongan['lama_kontrak'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jenis Kontrak</label>
                            <div class="form-control-plaintext"><?= $lowongan['jenis_kontrak'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Datatable Pelamar -->
        <?php if($lowongan['daftar_langsung'] == 1) :?>
        <div class="card mb-4">
            <div class="card-header row align-items-center justify-content-between">
                <h3 class="card-title col-auto">Daftar Pelamar</h3>
            </div>
            <div class="card-body">
                <table id="datatable" class="table">
                    <thead>
                    <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>Pelamar</th>
                            <th>Email</th>
                            <th>Whatsapp</th>
                            <th>Tanggal Melamar</th>
                        </tr>
                    </thead>

                    <tbody></tbody>

                </table>

            </div>
        </div>
        <?php endif; ?>
        <!-- End Datatable Pelamar -->
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        //? Start Datatable Pelamar
        <?php if($lowongan['daftar_langsung'] == 1) :?>
        var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                url: "<?= base_url('perusahaan/lowongan/dtPelamar/'. $lowongan['id']) ?>",
                type: "POST"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [1],
                orderable: false,
            }, ],
            scrollX: true,
            bAutoWidth: false,
        });

        var debounce = new $.fn.dataTable.Debounce(datatable);
        <?php endif; ?>
        //? End Datatable Pelamar
    });
</script>
<?= $this->endSection() ?>