<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('content') ?>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Detail User</h3>
            </div>
            <div class="card-body">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <label id="avatar-preview" for="avatar_upload" class="avatar avatar-xl" style="background-image: url('<?= showAvatar($user['avatar']) ?>'"></label>
                    </div>
                    <div class="col-auto">
                            <label class="form-label">Avatar</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="form-control-plaintext"><?= $user['nama'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="form-control-plaintext"><?= $user['email'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <div class="form-control-plaintext"><?= $user['username'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <div class="form-control-plaintext"><?= $user['group'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Whatsapp</label>
                            <div class="form-control-plaintext"><?= $user['whatsapp'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Terakhir Aktif</label>
                            <div class="form-control-plaintext"><?= convertDate($user['last_active'], 'd-m-Y H:i:s') ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Terakhir Diubah</label>
                            <div class="form-control-plaintext"><?= convertDate($user['updated_at'], 'd-m-Y') ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Dibuat</label>
                            <div class="form-control-plaintext"><?= convertDate($user['created_at'], 'd-m-Y') ?></div>
                        </div>
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
        
    });
</script>
<?= $this->endSection() ?>