<!-- app/Views/home.php -->
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Contact</h2>
    <?php foreach ($alamat as $a) : ?>
        <ul>
            <li><?= $a['tipe'] ?></li>
            <li><?= $a['alamat'] ?></li>
            <li><?= $a['kota'] ?></li>
        </ul>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>

