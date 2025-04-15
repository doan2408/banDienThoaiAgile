<!-- comments.php -->
<?php foreach ($comments as $comment): ?>
    <div class="comment">
        <p><?php echo $comment['content']; ?></p>
        <small><?php echo $comment['author']; ?> - <?php echo $comment['date']; ?></small>
    </div>
<?php endforeach; ?>
