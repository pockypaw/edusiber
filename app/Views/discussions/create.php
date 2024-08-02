<?= $this->extend('/layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container mt-4">
    <h1 class="display-4 mb-4">Create New Discussion</h1>
    <form action="/discussions/store" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter discussion title" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" rows="5" placeholder="Enter discussion content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
<?= $this->endSection() ?>
