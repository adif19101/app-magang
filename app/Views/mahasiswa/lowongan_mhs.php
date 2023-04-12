<?= $this->extend('layout/base_layout') ?>

<?= $this->section('content') ?>

<main class="page blog-post-list">
    <section class="clean-block clean-blog-list dark">
        <div class="container">
            <div class="block-heading">
                <h4 class="text-start ms-4">Daftar Lowongan</h4>
            </div>
            <div class="block-content">
                <div class="card mb-4">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Software Development Intern</h5>
                        <p class="card-text">We are looking for a Software Development Intern to join our team. The ideal candidate should be passionate about software development and have experience with Java, Python, or Ruby.</p>
                        <small class="text-muted">Posted 3 days ago</small>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Marketing Intern</h5>
                        <p class="card-text">We are seeking a Marketing Intern to assist with our marketing campaigns. The ideal candidate should have strong communication skills and experience with social media marketing.</p>
                        <small class="text-muted">Posted 5 days ago</small>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Graphic Design Intern</h5>
                        <p class="card-text">We are looking for a Graphic Design Intern to join our team. The ideal candidate should be proficient in Adobe Creative Suite and have experience with web design.</p>
                        <small class="text-muted">Posted 7 days ago</small>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Human Resources Intern</h5>
                        <p class="card-text">We are seeking a Human Resources Intern to assist with recruitment, employee relations, and other HR-related tasks. The ideal candidate should have excellent organizational and communication skills.</p>
                        <small class="text-muted">Posted 10 days ago</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection() ?>