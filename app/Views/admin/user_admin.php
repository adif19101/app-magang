<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="card mb-4">
            <div class="card-header row align-items-center justify-content-between">
                <h3 class="card-title col-auto">Users</h3>
            </div>
            <div class="card-body">
                <table id="datatable" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Group</th>
                            <th>Tanggal Dibuat</th>
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
                url: "<?= base_url('admin/user/datatable') ?>",
                type: "POST"
            },
            columnDefs: [{
                targets: [0],
                orderable: false,
            }, {
                targets: [1],
                orderable: false,
            }, {
                targets: [2],
                orderable: false,
            }, ],
            scrollX: true,
            bAutoWidth: false,
        });

        var debounce = new $.fn.dataTable.Debounce(datatable);

        $('#datatable').on('click', '.button-delete', function() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "User akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('admin/user/') ?>" + this.id + "/delete",
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