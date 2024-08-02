<!-- app/Views/home.php -->
<?= $this->extend('layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container">
    <h2>My Dashboard</h2>
    <p>This is the home page content.</p>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4 d-flex align-items-center">
                <img src="<?= base_url('/img/' . user()->user_image) ?>" class="card-img" alt="Profile Image" height="150vw" style="margin: auto;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= user()->fullname ?></h5>
                    <p class="card-text">Username: <?= user()->username ?></p>
                    <p class="card-text">Email: <?= user()->email ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($classrooms as $classroom) : ?>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://img.freepik.com/free-vector/round-webinar-isometric-composition_1284-25300.jpg?ga=GA1.1.1438363141.1721884140&semt=ais_user" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h5 class="card-title"><?= $classroom['classroom_name'] ?></h5>
                      
            
                        <a href="/classrooms/<?= $classroom['classroom_id'] ?>/materi" class="btn btn-primary">Masuk Kelas</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
</div>
<?= $this->endSection() ?>