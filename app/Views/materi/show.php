<?= $this->extend('/layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
    <div class="container mt-5">
        <h1 class="mb-4">Materi Details</h1>
        <h2 class="mb-3"><?= esc($materi['materi_name']); ?></h2>
        <p>Classroom: 
            <?php 
            $classroomModel = new \App\Models\ClassroomModel();
            $classroom = $classroomModel->find($materi['classroom_id']);
            echo esc($classroom['classroom_name']);
            ?>
        </p>

        <h3 class="mt-4">Uploaded Files</h3>
        <a href="/upload_file/create?materi_id=<?= $materi['materi_id']; ?>" class="btn btn-primary mb-3">Upload New File</a>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>File Name</th>
                    <th>Classroom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($files as $file): ?>
                <tr>
                    <td><?= esc($file['file_name']); ?></td>
                    <td>
                        <?php 
                        $classroom = $classroomModel->find($file['classroom_id']);
                        echo esc($classroom['classroom_name']);
                        ?>
                    </td>
                    <td>
                        <a href="/upload_file/delete/<?= $file['file_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>
