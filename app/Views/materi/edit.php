<?= $this->extend('/layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<h1>Edit Materi</h1>
    <form action="/classrooms/<?= $classroom_id; ?>/materi/update/<?= $materi['materi_id']; ?>" method="post">
        <label for="materi_name">Materi Name:</label>
        <input type="text" name="materi_name" id="materi_name" value="<?= esc($materi['materi_name']); ?>">
        <button type="submit">Update</button>
    </form>
    <a href="/classrooms/<?= $classroom_id; ?>/materi">Back to Materi List</a>
<?= $this->endSection() ?>
