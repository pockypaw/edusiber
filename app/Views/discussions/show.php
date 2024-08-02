<?= $this->extend('/layouts/dashboard/main') ?>

<?= $this->section('content-users') ?>
<div class="container mt-4">
    <h1 class="display-4"><?php echo esc($discussion['title']); ?></h1>
    <p class="lead"><?php echo esc($discussion['content']); ?></p>
    <p class="text-muted">Posted by: <?php echo esc($discussion['username']); ?></p>

    <h2 class="mt-4">Replies</h2>
    <form action="<?php echo site_url('/discussions/reply'); ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="discussion_id" value="<?php echo esc($discussion['id']); ?>">
        <div class="form-group">
            <label for="replyContent">Your Reply</label>
            <textarea id="replyContent" name="content" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit Reply</button>
    </form>

    <h3 class="mt-4">Replies List</h3>
    <ul class="list-unstyled">
        <?php foreach ($replies as $reply): ?>
            <li class="media mb-3">
                <div class="media-body">
                    <p class="mb-1"><?php echo esc($reply['content']); ?></p>
                    <small class="text-muted">Posted by <?php echo esc($reply['username']); ?></small>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?= $this->endSection() ?>
