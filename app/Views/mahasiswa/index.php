<?= $this->extend('layout/base_layout') ?>

<?= $this->section('content') ?>

<main class="page blog-post-list">
    <section class="clean-block clean-blog-list dark pb-0">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Lowongan Terbaru</h2>
                <a class="btn btn-outline-primary btn-sm" type="button" href="<?= base_url('mahasiswa/lowongan') ?>">Tampilkan Semua</a>
            </div>
            <div class="block-content">
                <div class="row justify-content-evenly">
                    <div class="card" style="width: 18rem;">
                        <img src="https://picsum.photos/200/100" class="card-img-top img-fluid pt-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Web Developer</h5>
                            <p class="card-text">PT. XYZ</p>
                            <ul style="list-style-type:none;">
                                <li><i class="fa-regular fa-calendar fa-fw"></i> 6 Bulan</li>
                                <li><i class="fa-regular fa-building fa-fw"></i> Remote</li>
                                <li><i class="fa-solid fa-business-time fa-fw"></i> Full Time</li>
                            </ul>
                            <div class="row pb-2">
                                <div class="col justify-content-evenly">
                                    <span class="badge bg-info">Web</span>
                                    <span class="badge bg-info">PHP</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="https://picsum.photos/200/100" class="card-img-top img-fluid pt-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Web Developer</h5>
                            <p class="card-text">PT. XYZ</p>
                            <ul style="list-style-type:none;">
                                <li><i class="fa-regular fa-calendar fa-fw"></i> 6 Bulan</li>
                                <li><i class="fa-regular fa-building fa-fw"></i> Remote</li>
                                <li><i class="fa-solid fa-business-time fa-fw"></i> Full Time</li>
                            </ul>
                            <div class="row pb-2">
                                <div class="col justify-content-evenly">
                                    <span class="badge bg-info">Web</span>
                                    <span class="badge bg-info">PHP</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="https://picsum.photos/200/100" class="card-img-top img-fluid pt-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Web Developer</h5>
                            <p class="card-text">PT. XYZ</p>
                            <ul style="list-style-type:none;">
                                <li><i class="fa-regular fa-calendar fa-fw"></i> 6 Bulan</li>
                                <li><i class="fa-regular fa-building fa-fw"></i> Remote</li>
                                <li><i class="fa-solid fa-business-time fa-fw"></i> Full Time</li>
                            </ul>
                            <div class="row pb-2">
                                <div class="col justify-content-evenly">
                                    <span class="badge bg-info">Web</span>
                                    <span class="badge bg-info">PHP</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="clean-blog-post">
                    <div class="row">
                        <div class="col-lg-5"><img class="rounded img-fluid" src="assets/img/tech/image4.jpg"></div>
                        <div class="col-lg-7">
                            <h3>Lorem Ipsum dolor sit amet</h3>
                            <div class="info"><span class="text-muted">Jan 16, 2018 by&nbsp;<a href="#">John Smith</a></span></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p><button class="btn btn-outline-primary btn-sm" type="button">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="clean-blog-post">
                    <div class="row">
                        <div class="col-lg-5"><img class="rounded img-fluid" src="assets/img/tech/image4.jpg"></div>
                        <div class="col-lg-7">
                            <h3>Lorem Ipsum dolor sit amet</h3>
                            <div class="info"><span class="text-muted">Jan 16, 2018 by&nbsp;<a href="#">John Smith</a></span></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p><button class="btn btn-outline-primary btn-sm" type="button">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="clean-blog-post">
                    <div class="row">
                        <div class="col-lg-5"><img class="rounded img-fluid" src="assets/img/tech/image4.jpg"></div>
                        <div class="col-lg-7">
                            <h3>Lorem Ipsum dolor sit amet</h3>
                            <div class="info"><span class="text-muted">Jan 16, 2018 by&nbsp;<a href="#">John Smith</a></span></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p><button class="btn btn-outline-primary btn-sm" type="button">Read More</button>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <section class="clean-block clean-blog-list dark pb-0">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Status Pendaftaran</h2>
                <a class="btn btn-outline-primary btn-sm" type="button" href="<?= base_url('mahasiswa/lowongan') ?>">Tampilkan Semua</a>
            </div>
            <div class="block-content">
                <div class="row justify-content-evenly">
                    <div class="card" style="width: 18rem;">
                        <img src="https://picsum.photos/200/100" class="card-img-top img-fluid pt-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Web Developer</h5>
                            <p class="card-text">PT. XYZ</p>
                            <ul style="list-style-type:none;">
                                <li><i class="fa-regular fa-calendar fa-fw"></i> 6 Bulan</li>
                                <li><i class="fa-regular fa-building fa-fw"></i> Remote</li>
                                <li><i class="fa-solid fa-business-time fa-fw"></i> Full Time</li>
                            </ul>
                            <div class="row pb-2">
                                <div class="col justify-content-evenly">
                                    <span class="badge bg-info">Web</span>
                                    <span class="badge bg-info">PHP</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="https://picsum.photos/200/100" class="card-img-top img-fluid pt-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Web Developer</h5>
                            <p class="card-text">PT. XYZ</p>
                            <ul style="list-style-type:none;">
                                <li><i class="fa-regular fa-calendar fa-fw"></i> 6 Bulan</li>
                                <li><i class="fa-regular fa-building fa-fw"></i> Remote</li>
                                <li><i class="fa-solid fa-business-time fa-fw"></i> Full Time</li>
                            </ul>
                            <div class="row pb-2">
                                <div class="col justify-content-evenly">
                                    <span class="badge bg-info">Web</span>
                                    <span class="badge bg-info">PHP</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="https://picsum.photos/200/100" class="card-img-top img-fluid pt-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Web Developer</h5>
                            <p class="card-text">PT. XYZ</p>
                            <ul style="list-style-type:none;">
                                <li><i class="fa-regular fa-calendar fa-fw"></i> 6 Bulan</li>
                                <li><i class="fa-regular fa-building fa-fw"></i> Remote</li>
                                <li><i class="fa-solid fa-business-time fa-fw"></i> Full Time</li>
                            </ul>
                            <div class="row pb-2">
                                <div class="col justify-content-evenly">
                                    <span class="badge bg-info">Web</span>
                                    <span class="badge bg-info">PHP</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection() ?>