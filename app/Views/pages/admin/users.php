<!-- app/Views/home.php -->
<?= $this->extend('layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container">
    <h2>Users List</h2>
    <p>This is the home page content.</p>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($users as $user) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->name ?></td>
                    <td>
                        <a href="/users/<?= $user->userid ?>" class="btn btn-info">Detail</a>
                        <a href="/users/<?= $user->userid ?>/edit" class="btn btn-primary">Edit</a>
                        <form action="/users/<?= $user->userid ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>