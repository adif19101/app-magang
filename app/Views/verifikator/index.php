<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards d-lg-flex flex-lg-row mb-3">
            <div class="col-md-6 col-lg-2 flex-fill">
                <div class="card bg-blue h-100 text-primary-fg">
                    <?= newRibbon($plot['new']) ?>
                    <div class="card-stamp">
                        <div class="card-stamp-icon bg-white text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <path d="M8 11h8v7h-8z"></path>
                                <path d="M8 15h8"></path>
                                <path d="M11 11v7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title col-9">Surat Plot Pembimbing</h3>
                        <div class="h2 mt-auto"><?= $plot['counter'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 flex-fill">
                <div class="card bg-blue h-100 text-primary-fg">
                    <div class="card-stamp">
                        <div class="card-stamp-icon bg-white text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title col-9">Mahasiswa Magang</h3>
                        <div class="h2 mt-auto"><?= $plot['ongoing'] ?></div>
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
                        <div class="h2 mt-auto"><?= $lowongan ?></div>
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
                        <h3 class="card-title col-9">Mahasiswa</h3>
                        <div class="h2 mt-auto"><?= $mahasiswa ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 flex-fill">
                <div class="card bg-blue h-100 text-primary-fg">
                    <div class="card-stamp">
                        <div class="card-stamp-icon bg-white text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 21l18 0"></path>
                                <path d="M9 8l1 0"></path>
                                <path d="M9 12l1 0"></path>
                                <path d="M9 16l1 0"></path>
                                <path d="M14 8l1 0"></path>
                                <path d="M14 12l1 0"></path>
                                <path d="M14 16l1 0"></path>
                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title col-9">Perusahaan</h3>
                        <div class="h2 mt-auto"><?= $perusahaan ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header row align-items-center justify-content-between">
                <h3 class="card-title col-auto">Surat Magang</h3>
            </div>
            <div class="card-body">
                <table id="datatable" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Email</th>
                            <th>Perusahaan</th>
                            <th>Penanggung Jawab</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
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
                url: "<?= base_url('verifikator/suratPlot/datatable') ?>",
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

        $('#datatable').on('click', '.button-status', function() {
            var swal_text, swal_confirm;
            if (this.dataset.status == 'APPROVED') {
                swal_text = 'Pengajuan surat akan disetujui!';
                swal_confirm = 'Ya, Setuju!';
            } else if (this.dataset.status == 'REJECTED') {
                swal_text = 'Pengajuan surat akan ditolak!';
                swal_confirm = 'Ya, Tolak!';
            }

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: swal_text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: swal_confirm,
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('verifikator/suratPlot/') ?>" + this.id,
                        type: "POST",
                        data: {
                            status: this.dataset.status
                        },
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