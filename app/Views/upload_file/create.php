<!-- app/Views/home.php -->
<?= $this->extend('layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<h1>Upload File for Materi</h1>
    <form action="/classrooms/<?= $classroom_id; ?>/materi/<?= $materi_id; ?>/upload_files/store" method="post" enctype="multipart/form-data">
        <label for="file">Select file:</label>
        <input type="file" name="file" id="file">
        
        
        <button type="submit">Upload</button>
    </form>
    <a href="/classrooms/<?= $classroom_id; ?>/materi/<?= $materi_id; ?>/upload_files">Back to Files List</a>

    <a href="/upload_file/materi/<?= esc($materi_id); ?>">Back to Files for Materi</a>
    <?= $this->endSection() ?>