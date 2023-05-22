<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('header-button'); ?>
<div class="col-auto">
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
</div>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Profile</h3>
            </div>
            <div class="card-body">
                <h2 class="mb-4">My Account</h2>
                <h3 class="card-title">Profile Details</h3>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label id="avatar-preview" for="avatar-upload" class="avatar avatar-xl" style="background-image: url(./static/avatars/000m.jpg)"></label>
                        <input type="file" id="avatar-upload" style="display: none;">
                    </div>
                    <div class="col-auto">
                        <a href="#" id="btn_change_avatar" class="btn">
                            Change avatar
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="#" id="btn_delete_avatar" class="btn btn-ghost-danger">
                            Delete avatar
                        </a>
                    </div>
                </div>

                <h3 class="card-title mt-4">Business Profile</h3>
                <div class="row g-3">
                    <div class="col-md">
                        <div class="form-label">Business Name</div>
                        <input type="text" class="form-control" value="Tabler" wfd-id="id1">
                    </div>
                    <div class="col-md">
                        <div class="form-label">Business ID</div>
                        <input type="text" class="form-control" value="560afc32" wfd-id="id2">
                    </div>
                    <div class="col-md">
                        <div class="form-label">Location</div>
                        <input type="text" class="form-control" value="Peimei, China" wfd-id="id3">
                    </div>
                </div>
                <h3 class="card-title mt-4">Email</h3>
                <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.</p>
                <div>
                    <div class="row g-2">
                        <div class="col-auto">
                            <input type="text" class="form-control w-auto" value="paweluna@howstuffworks.com" wfd-id="id4">
                        </div>
                        <div class="col-auto"><a href="#" class="btn">
                                Change
                            </a></div>
                    </div>
                </div>
                <h3 class="card-title mt-4">Password</h3>
                <p class="card-subtitle">You can set a permanent password if you don't want to use temporary login codes.</p>
                <div>
                    <a href="#" class="btn">
                        Set new password
                    </a>
                </div>
                <h3 class="card-title mt-4">Public profile</h3>
                <p class="card-subtitle">Making your profile public means that anyone on the Dashkit network will be able to find
                    you.</p>
                <div>
                    <label class="form-check form-switch form-switch-lg">
                        <input class="form-check-input" type="checkbox" wfd-id="id5">
                        <span class="form-check-label form-check-label-on">You're currently visible</span>
                        <span class="form-check-label form-check-label-off">You're
                            currently invisible</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $("#btn_change_avatar").click(function() {
            $("#avatar-upload").click();
        });

        $("#avatar-upload").change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                $("#avatar-preview").css("background-image", "url(" + reader.result + ")");
            }
            if (file) {
                reader.readAsDataURL(file);
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
                        url: "<?= base_url('mahasiswa/profile/deleteImage') ?>",
                        type: "POST",
                        data: form_data,
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
                                $("#avatar-upload").val("");
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