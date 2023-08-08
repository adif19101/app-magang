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
                    <!-- Panel Mahasiswa -->
                    <div class="tab-pane active show" id="tabs-mahasiswa">
                        <form id="form-tabs-mahasiswa">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label required">Email</label>
                                        <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                                        <input type="text" id="group" name="group" value="mahasiswa" hidden>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="npm" class="form-label required">NPM</label>
                                        <input type="text" name="npm" id="npm" class="form-control" placeholder="NPM">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tmpt_tgl_lahir" class="form-label">Tempat, Tanggal Lahir</label>
                                        <input type="text" name="tmpt_tgl_lahir" id="tmpt_tgl_lahir" class="form-control" placeholder="Contoh: Karawang, 1 Januari 2018">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Whatsapp</label>
                                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Contoh : 085224502100">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Panel Perusahaan -->
                    <div class="tab-pane" id="tabs-perusahaan">
                        <div class="row">
                            <div class="mb-3 text-center">
                                <label class="form-label-inline">Data perusahaan sudah ada di sistem?</label>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-perusahaan-terdaftar">Buat Akun Perusahaan Terdaftar</button>
                            </div>
                        </div>
                        <form id="form-tabs-perusahaan">
                            <div class="row align-items-center mb-4">
                                <div class="col-auto">
                                    <label id="avatar-preview" for="avatar_upload" class="avatar avatar-xl"></label>
                                    <input type="file" id="avatar_upload" name="avatar_upload" style="display: none;">
                                </div>
                                <div class="col-auto">
                                    <a href="#" id="btn_change_avatar" class="btn">
                                        Upload Logo
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Perusahaan</label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Perusahaan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label required">Email</label>
                                        <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                                        <input type="text" id="group" name="group" value="perusahaan" hidden>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label required">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi Perusahaan</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Whatsapp</label>
                                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Contoh : 085224502100">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Panel Admin -->
                    <div class="tab-pane" id="tabs-admin">
                        <form id="form-tabs-admin">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label required">Email</label>
                                        <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="group" class="form-label required">Role</label>
                                        <select class="form-select" name="group" id="group">
                                            <option>Pilih Role User</option>
                                            <option value="admin">Admin</option>
                                            <option value="verifikator">Verifikator</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Whatsapp</label>
                                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Contoh : 085224502100">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                Password default sama dengan email yang digunakan.
            </div>
        </div>
    </div>
</div>

<!-- Modal Perusahaan Terdaftar -->
<div class="modal modal-blur fade" id="modal-perusahaan-terdaftar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Akun Perusahaan Terdaftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="input-icon mb-3">
                        <input id="cari_perusahaan" name="cari_perusahaan" type="text" value="" class="form-control" placeholder="Nama Perusahaan...">
                        <span class="input-icon-addon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div id="result_cari_perusahaan">
                    <!-- Placeholder message -->
                    <div class="container text-center" id="placeholder_message">
                        <span>
                            Cari perusahaan yang sudah terdaftar di sistem untuk membuat akun perusahaan.
                        </span>
                    </div>

                    <!-- Container for cards -->
                    <div class="container">
                        <div class="row row-cards" id="card_container"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

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
                group: {
                    required: true
                },
                email: {
                    required: true,
                    minlength: 5,
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
                username: {
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
            submitHandler: function(form) {
                sendAjax(form);
            }
        })

        $("#form-tabs-perusahaan").validate({
            ignore: [],
            rules: {
                avatar_upload: {
                    extension: "jpg|jpeg|png"
                },
                group: {
                    required: true
                },
                nama: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                email: {
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
                username: {
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
            submitHandler: function(form) {
                sendAjax(form);
            }
        })

        $("#form-tabs-admin").validate({
            ignore: [],
            rules: {
                nama: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                group: {
                    required: true
                },
                email: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                },
                whatsapp: {
                    required: true,
                    digits: true,
                    minlength: 9
                },
                username: {
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
            submitHandler: function(form) {
                sendAjax(form);
            }
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

        $('#btn_save').on('click', function() {
            var id_tab = $(".tab-content .tab-pane.active").attr("id");

            console.log(id_tab);
            if ($('#form-' + id_tab).valid()) {
                $('#form-' + id_tab).submit();
            }
        });

        let BASE_URL = "<?= base_url('/') ?>";
        function urlImg(fullImgPath, defaultImg = 'assets/img/default.webp') {
            if (fullImgPath === '' || typeof fullImgPath !== 'string' || !is_file(fullImgPath)) {
                return BASE_URL + defaultImg;
            }

            return BASE_URL + fullImgPath;
        }

        function showAvatar(avatar = null) {
            if (avatar) {
                return BASE_URL + 'avatar/' + avatar;
            }

            return urlImg('');
        }

        $('#cari_perusahaan').keyup(debounce(function() {
            var cari_perusahaan = this.value;

            if (cari_perusahaan == '') {
                $('#placeholder_message').html('<span>Cari perusahaan yang sudah terdaftar di sistem untuk membuat akun perusahaan.</span>');
                document.getElementById("card_container").innerHTML = '';

            } else {
                $.ajax({
                    url: "<?= base_url('api/searchDataPerusahaan') ?>",
                    type: "POST",
                    data: {
                        cari_perusahaan: cari_perusahaan
                    },
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    // dataType: "json",
                    // processData: false,
                    // contentType: false,
                    success: function(response) {
                        var cardContainer = document.getElementById("card_container");
                        cardContainer.innerHTML = '';
                        if (response.status == 'success') {

                            for (var key in response.data) {
                                if (response.data.hasOwnProperty(key)) {
                                    var data = response.data[key];

                                    var colDiv = document.createElement("div");
                                    colDiv.classList.add("col-sm-12", "col-lg-6");

                                    var card = document.createElement("div");
                                    card.classList.add("card", "card-sm");
                                    card.innerHTML = `
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="avatar me-3 rounded" style="background-image: url(${showAvatar(data.avatar)}"></span>
                                                <div>
                                                    <div class="compName">${data.nama}</div>
                                                </div>
                                            </div>
                                            ${data.whatsapp ? `
                                            <div class="compWhatsapp mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                                    <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
                                                </svg>${data.whatsapp}
                                            </div>
                                            ` : ''}
                                            ${data.email ? `
                                            <div class="compEmail mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-at" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                                    <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                                                </svg>${data.email}
                                            </div>
                                            ` : ''}
                                            ${data.deskripsi ? `
                                                <p class="compDeskripsi">${data.deskripsi}</p>
                                            ` : ''}
                                            ${data.alamat ? `
                                                <p class="compAlamat">${data.alamat}</p>
                                            ` : ''}
                                            <button id="${data.id}" data-nama="${data.nama}" data-email="${data.email}" class="btn btn-primary button-pilih-perusahaan">Pilih</button>
                                        </div>
                                    `;

                                    colDiv.appendChild(card);
                                    cardContainer.appendChild(colDiv);
                                }
                            }

                        } else {
                            $('#placeholder_message').html('<span>Nama perusahaan tidak ditemukan atau sudah memiliki akun</span>');
                        }
                        // Check if any cards were added
                        var placeholderMessage = document.getElementById("placeholder_message");
                        if (cardContainer.children.length > 0) {
                            // Hide the placeholder message
                            placeholderMessage.style.display = "none";
                        } else {
                            // Show the placeholder message
                            placeholderMessage.style.display = "block";
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

        }, 300));

        $(document).on('click', '.button-pilih-perusahaan', function() {
            console.log(this.id);
            var id_perusahaan = this.id;
            var email_perusahaan = $(this).data('email');
            var nama_perusahaan = $(this).data('nama');
            var username = email_perusahaan.split('@')[0];

            Swal.fire({
                title: 'Buat akun?',
                text: `Buat akun untuk ${nama_perusahaan}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Buat!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('admin/user') ?>",
                        type: "POST",
                        data: {
                            id: id_perusahaan,
                            email: email_perusahaan,
                            group: 'perusahaan-terdaftar',
                            username: username
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
            })
        });

        function debounce(func, wait, immediate) {
            var timeout;
            return function() {
                var context = this,
                    args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        }
    });
</script>
<?= $this->endSection() ?>