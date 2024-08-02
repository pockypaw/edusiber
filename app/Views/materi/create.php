<?= $this->extend('/layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Materi</title>
</head>
<body>
    <h1>Create New Materi</h1>
    <form action="/classrooms/<?= $classroom_id; ?>/materi/store" method="post">
        <label for="materi_name">Materi Name:</label>
        <input type="text" name="materi_name" id="materi_name">
        <button type="submit">Create</button>
    </form>
    <a href="/classrooms/<?= $classroom_id; ?>/materi">Back to Materi List</a>
</body>
</html>

<?= $this->endSection() ?>
