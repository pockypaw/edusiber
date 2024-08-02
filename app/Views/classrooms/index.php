<?= $this->extend('layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container mt-4">
    <h1 class="mb-4">Classrooms</h1>
    <a href="/classrooms/create" class="btn btn-primary mb-3">Create New Classroom</a>
    <div class="table-responsive">
        <table id="example2" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Classroom Name</th>
                    <th>Dosen</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
          
                <?php foreach ($classrooms as $classroom) : ?>
                    <tr>
                        <td><?= esc($classroom['classroom_name']); ?></td>
                        <td><?= esc($classroom['fullname']); ?></td>
                        <td>
                            <a href="/classrooms/edit/<?= $classroom['classroom_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                            <a href="/classrooms/<?= $classroom['classroom_id']; ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            <a href="/classrooms/<?= $classroom['classroom_id']; ?>/materi" class="btn btn-secondary btn-sm">Show Materi</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Classroom Name</th>
                    <th>Dosen</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
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
            $('#example2').DataTable({
                // Optional configuration settings
                paging: true,        // Enable pagination
                searching: true,     // Enable searching
                info: true,          // Show information (e.g., "Showing 1 to 10 of 57 entries")
                lengthChange: false  // Disable changing the number of records per page
            });
        });
    </script>
</div>
<?= $this->endSection() ?>
