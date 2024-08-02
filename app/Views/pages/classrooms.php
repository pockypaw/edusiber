<?= $this->extend('layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container">
    <h2><?= $classroom->classroom_name ?></h2>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Pictures</th>
                <th>Nama Kursus</th>
                <th>Ruang ID</th>
                <th>Dosen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><img src="https://img.freepik.com/free-vector/round-webinar-isometric-composition_1284-25300.jpg?ga=GA1.1.1438363141.1721884140&semt=ais_user" width="150"></td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>Riad Sahara, S.Si, M.Kom</td>
                <td><button class="btn btn-primary">Zoom / YT</button>
                    <button class="btn btn-info">Materi</button>
                    <button class="btn btn-danger">Options</button>
                </td>
            </tr>

        </tbody>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Pictures</th>
                <th>Nama Kursus</th>
                <th>Ruang ID</th>
                <th>Dosen</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?= $this->endSection() ?>