<?= $this->extend('/layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container mt-4">
    <h1 class="mb-4">Materi</h1>
    <a href="/classrooms/<?= $classroom_id; ?>/materi/create" class="btn btn-primary mb-3">Create New Materi</a>
    <div class="table-responsive">
        <table id="materiTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
      
                    <th>Materi Name</th>
                    <th>Dosen Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($classrooms as $item): ?>
                <tr>
                    <td><?= esc($item['materi_name']); ?></td>
                    <td><?= esc($item['fullname']); ?></td>
                    <td>
                        <a href="/classrooms/<?= $classroom_id; ?>/materi/<?= $item['materi_id']; ?>/edit" class="btn btn-info btn-sm">Edit</a>
                        <a href="/classrooms/<?= $classroom_id; ?>/materi/<?= $item['materi_id']; ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        <a href="/classrooms/<?= $classroom_id; ?>/materi/<?= $item['materi_id']; ?>/upload_files" class="btn btn-secondary btn-sm">Show Files</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Materi Name</th>
                    <th>Materi Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <a href="/classrooms" class="btn btn-secondary mt-3">Back to Classrooms</a>
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
        $('#materiTable').DataTable({
            // Optional configuration settings
            paging: true,        // Enable pagination
            searching: true,     // Enable searching
            info: true,          // Show information (e.g., "Showing 1 to 10 of 57 entries")
            lengthChange: false  // Disable changing the number of records per page
        });
    });
</script>

<?= $this->endSection() ?>
