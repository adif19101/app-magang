<?= $this->extend('layout/tabler_layout_guest') ?>

<?= $this->section('content') ?>

<div class="page-body mt-0">
    <section class="clean-block clean-hero" style="background-image: url(&quot;assets/img/gd-opon.webp&quot;);color: rgba(9, 162, 255, 0.85);">
        <div class="text">
            <h2>Website Magang Informatika Unsika</h2>
            <p>Silahkan Login/Register untuk melanjutkan</p>
            <a href="<?= base_url('login') ?>" class="btn btn-outline-light btn-lg" type="button">Login</a>
        </div>
    </section>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
    });
</script>
<?= $this->endSection() ?>