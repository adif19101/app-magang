<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards d-lg-flex flex-lg-row mb-3">
            <div class="col-md-6 col-lg-2 flex-fill">
                <div class="card bg-blue h-100 text-primary-fg">
                    <div class="card-stamp">
                        <div class="card-stamp-icon bg-white text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                <path d="M9 12l.01 0"></path>
                                <path d="M13 12l2 0"></path>
                                <path d="M9 16l.01 0"></path>
                                <path d="M13 16l2 0"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title col-9">Total Lowongan</h3>
                        <div class="h2 mt-auto"><?= $lowongan['all'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 flex-fill">
                <div class="card bg-blue h-100 text-primary-fg">
                    <div class="card-stamp">
                        <div class="card-stamp-icon bg-white text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
                                <path d="M12 12l0 .01"></path>
                                <path d="M3 13a20 20 0 0 0 18 0"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title col-9">Lowongan Aktif</h3>
                        <div class="h2 mt-auto"><?= $lowongan['active'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 flex-fill">
                <div class="card bg-blue h-100 text-primary-fg">
                    <div class="card-stamp">
                        <div class="card-stamp-icon bg-white text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title col-9">Pelamar</h3>
                        <div class="h2 mt-auto"><?= $pelamar ?></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card mb-4">
            <div class="card-header row align-items-center justify-content-between">
                <h3 class="card-title col-auto">Lowongan Magang</h3>

                <div class="col-auto">
                    <div class="btn-list">
                        <a href="<?= base_url('perusahaan/lowongan/new') ?>" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Tambah
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>Judul</th>
                            <th>Perusahaan</th>
                            <th>Tenggat Pendaftaran</th>
                            <th>Tipe Pekerjaan</th>
                            <th>Lama Kontrak</th>
                            <th>Jenis Kontrak</th>
                            <th>Terakhir Diubah</th>
                        </tr>
                    </thead>

                    <tbody></tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                url: "<?= base_url('perusahaan/lowongan/datatable') ?>",
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

        $('#datatable').on('click', '.button-delete', function() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Lowongan Magang Akan Dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('perusahaan/lowongan/') ?>" + this.id + "/delete",
                        type: "POST",
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire(
                                    'Success',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        datatable.draw();
                                    }
                                })
                            } else {
                                Swal.fire(
                                    'Error',
                                    response.message,
                                    'error'
                                )
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire(
                                'Error',
                                'Something Went Wrong!',
                                'error'
                            )
                        }
                    });
                }
            })

        });
    });
</script>
<?= $this->endSection() ?>