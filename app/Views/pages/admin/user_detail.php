<!-- app/Views/home.php -->
<?= $this->extend('layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container">
    <h2>Users List</h2>
    <p>This is the home page content.</p>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4 d-flex align-items-center">
                <img src="<?= base_url('/img/' . $user->user_image) ?>" class="card-img" alt="Profile Image" height="150vw" style="margin: auto;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user->name ?></h5>
                    <p class="card-text">Role: <?= $user->name ?></p>
                    <p class="card-text">Username: <?= $user->username ?></p>
                    <p class="card-text">Email: <?= $user->email ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>