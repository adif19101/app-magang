<?= $this->extend('layout/tabler_layout') ?>

<?= $this->section('content') ?>


<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-6">
                <form class="card">
                    <div class="card-header">
                        <h3 class="card-title">Basic form</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Email address</label>
                            <div>
                                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" wfd-id="id172">
                                <small class="form-hint">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Password</label>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" wfd-id="id173">
                                <small class="form-hint">
                                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                                    spaces, special characters, or emoji.
                                </small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select</label>
                            <div>
                                <select class="form-select">
                                    <option>Option 1</option>
                                    <optgroup label="Optgroup 1">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                    </optgroup>
                                    <option>Option 2</option>
                                    <optgroup label="Optgroup 2">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                    </optgroup>
                                    <optgroup label="Optgroup 3">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                    </optgroup>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Checkboxes</label>
                            <div>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" checked="" wfd-id="id174">
                                    <span class="form-check-label">Option 1</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" wfd-id="id175">
                                    <span class="form-check-label">Option 2</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled="" wfd-id="id176">
                                    <span class="form-check-label">Option 3</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div id="deskripsi"></div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
        $('#deskripsi').summernote();
    });
</script>
<?= $this->endSection() ?>