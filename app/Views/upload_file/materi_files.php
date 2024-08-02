<?= $this->extend('layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container mt-4">
    <h1 class="mb-4">Files for Materi</h1>
    <a href="/classrooms/<?= $classroom_id; ?>/materi/<?= $materi_id; ?>/upload_files/create" class="btn btn-primary mb-3">Upload New File</a>
    <div class="table-responsive">
        <table id="filesTable" class="table table-striped table-bordered" style="width:100%">
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
                    <td>
                        <a href="/classrooms/<?= $classroom_id; ?>/materi/<?= $materi_id; ?>/upload_files/download/<?= $file['file_id']; ?>"><?= esc($file['file_name']); ?></a>
                    </td>
                    <td><?= esc($materi_name); ?></td>
                    <td><?= esc($file['classroom_id']); ?></td>
                    <td>
                        <a href="/classrooms/<?= $classroom_id; ?>/materi/<?= $materi_id; ?>/upload_files/delete/<?= $file['file_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>File Name</th>
                    <th>Classroom</th>
                    <th>Uploaded By</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <a href="/classrooms/<?= $classroom_id; ?>/materi" class="btn btn-secondary mt-3">Back to Materi</a>
</div>

<!-- Include jQuery first -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Include Bootstrap Bundle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- Include DataTables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#filesTable').DataTable({
            // Optional configuration settings
            paging: true,        // Enable pagination
            searching: true,     // Enable searching
            info: true,          // Show information (e.g., "Showing 1 to 10 of 57 entries")
            lengthChange: false  // Disable changing the number of records per page
        });
    });
</script>

<?= $this->endSection() ?>
