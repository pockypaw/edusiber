<?= $this->extend('/layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container mt-4">
    <h1 class="mb-4">Discussions</h1>
    
    <div class="mb-3">
        <a href="/discussions/create" class="btn btn-primary">Create New Discussion</a>
    </div>
    
    <ul class="list-group">
        <?php foreach ($discussions as $discussion) : ?>
            <li class="list-group-item">
                <a href="/discussions/show/<?= $discussion['id'] ?>" class="text-decoration-none">
                    <?= esc($discussion['title']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?= $this->endSection() ?>
