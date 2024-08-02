<!-- app/Views/home.php -->
<?= $this->extend('layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
    <h1>Upload Files</h1>
    <a href="/upload_file/create/<?= $materi_id; ?>">Upload New File</a>
    <table border="1">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Classroom</th>
                <th>Uploaded By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($files as $file): ?>
            <tr>
                <td><?= esc($file['file_name']); ?></td>
                <td>
                    <?php 
                    $classroomModel = new \App\Models\ClassroomModel();
                    $classroom = $classroomModel->find($file['classroom_id']);
                    echo esc($classroom['classroom_name']);
                    ?>
                </td>
                <td>
          
                </td>
                <td>
                    <a href="/upload_file/delete/<?= $file['file_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->endSection() ?>