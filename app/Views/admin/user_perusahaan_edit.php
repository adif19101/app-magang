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
        <div class="row row-cards">
            <div class="card">
                <form id="form_profile" name="form_profile">
                    <div class="card-header">
                        <h3 class="card-title">Profile Perusahaan</h3>
                        <div class="card-actions">
                            <a id="simpan_profile" href="#" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                </svg>
                                Simpan
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center mb-4">
                            <div class="col-auto">
                                <label id="avatar-preview" for="avatar_upload" class="avatar avatar-xl" style="background-image: url('<?= showAvatar($user['avatar']) ?>'"></label>
                                <input type="file" id="avatar_upload" name="avatar_upload" style="display: none;">
                            </div>
                            <div class="col-auto">
                                <a href="#" id="btn_change_avatar" class="btn">
                                    Ubah avatar
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="#" id="btn_delete_avatar" class="btn btn-ghost-danger">
                                    Hapus avatar
                                </a>
                            </div>
                        </div>

                        <div class="row g-3 mb-2">
                            <div class="col-md">
                                <label for="nama" class="form-label">Nama Perusahaan</label>
                                <input id="nama" name="nama" type="text" class="form-control" value="<?= $user['nama'] ?>">
                            </div>
                            <div class="col-md">
                                <label for="email" class="form-label">Email Perusahaan</label>
                                <input id="email" name="email" type="text" class="form-control" value="<?= $user['email'] ?>">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <label for="alamat" class="form-label">Alamat Perusahaan</label>
                                <textarea class="form-control" name="alamat" id="alamat"><?= $user['alamat'] ?></textarea>
                            </div>
                            <div class="col-md">
                                <label for="deskripsi" class="form-label">Deskripsi Perusahaan</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi"><?= $user['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <label for="whatsapp" class="form-label">Whatsapp Perusahaan</label>
                                <input id="whatsapp" name="whatsapp" type="text" class="form-control" value="<?= $user['whatsapp'] ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $("#btn_change_avatar").click(function() {
            $("#avatar_upload").click();
        });

        $("#avatar_upload").change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                $("#avatar-preview").css("background-image", "url(" + reader.result + ")");
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        });

        $("#form_profile").validate({
            ignore: [],
            rules: {
                avatar_upload: {
                    extension: "png|jpg|jpeg"
                },
                nama: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                email: {
                    required: true,
                    email: true,
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
                deskripsi: {
                    minlength: 5,
                    maxlength: 30000
                },
            },
            // messages: {
            // },
            submitHandler: function(form) {
                var form_data = new FormData(form);
                form_data.append("group", "perusahaan");

                $.ajax({
                    url: "<?= base_url('admin/user/'). $user['id'] ?>",
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
                                    window.location.href = "<?= base_url('admin/user') ?>";
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
        });

        $("#simpan_profile").click(function() {
            if ($('#form_profile').valid()) {
                $('#form_profile').submit();
            }
        });

        $("#btn_delete_avatar").click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('admin/user/deleteImage') ?>",
                        type: "POST",
                        data: {
                            'id': '<?= $user['id'] ?>',
                            'group': 'perusahaan'
                        },
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        dataType: "json",
                        // processData: false,
                        // contentType: false,
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                                $("#avatar-preview").css("background-image", "url(<?= base_url(DEFAULT_IMAGE) ?>");
                                $("#avatar_upload").val("");
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