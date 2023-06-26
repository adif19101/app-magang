<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<div class="col-auto">
    <div class="btn-list">
        <a id="btn_save" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                <path d="M14 4l0 4l-6 0l0 -4"></path>
            </svg>
            Simpan
        </a>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs-mahasiswa" class="nav-link active" data-bs-toggle="tab">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-perusahaan" class="nav-link" data-bs-toggle="tab">Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-admin" class="nav-link" data-bs-toggle="tab">Admin</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tabs-mahasiswa">
                        <div class="row align-items-center mb-4">
                            <div class="col-auto">
                                <label id="avatar-preview" for="avatar_upload" class="avatar avatar-xl"></label>
                                <input type="file" id="avatar_upload" name="avatar_upload" style="display: none;">
                            </div>
                            <div class="col-auto">
                                <a href="#" id="btn_change_avatar" class="btn">
                                    Upload avatar
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="npm" class="form-label">NPM</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tmpt_tgl_lahir" class="form-label">Tempat, Tanggal Lahir</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Whatsapp</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tabs-perusahaan">

                    </div>

                    <div class="tab-pane" id="tabs-admin">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
$(document).ready(function() {
    // TODO lanjutin tab mahasiswa dan bikin buat tab perusahaan dan admin
    $("#form-tabs-mahasiswa").validate({
        ignore: [],
        rules: {
            nama: {
                required: true,
                minlength: 2,
                maxlength: 255
            },
            npm: {
                required: true,
                digits: true,
                minlength: 13,
                maxlength: 13
            },
            tmpt_tgl_lahir: {
                required: true,
                minlength: 5,
                maxlength: 255
            },
            whatsapp: {
                required: true,
                digits: true,
                minlength: 9
            },
            alamat: {
                required: true,
                minlength: 5,
                maxlength: 255
            },
        },
        // messages: {
        // },
        errorPlacement: function(error, element) {
            if (element.hasClass("summernote")) {
                // Show error message inside the Summernote editor
                error.appendTo(element.siblings(".note-editor"));
            } else {
                // Show error message normally
                error.insertAfter(element);
            }
        },
        submitHandler: function sendAjax(form) {}
    })

    function sendAjax(form) {
        var form_data = new FormData(form);

        $.ajax({
            url: "<?= base_url('admin/user') ?>",
            type: "POST",
            data: form_data,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire(
                        'Success',
                        response.message,
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href =
                                "<?= base_url('admin/user') ?>";
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

    $('#btn_save').on('click', function() {
        var id_tab = $(".tab-content .tab-pane.active").attr("id");

        if ($('#form-' + id_tab).valid()) {
            $('#form-' + id_tab).submit();
        }
    });
});
</script>
<?= $this->endSection() ?>