<h2>Show page</h2>

<div style="width: 300px; margin: 0 auto; text-align: center">
    <p style="font-size: 40px; color: greenyellow">
        <?= $message ?>
    </p>
</div>

<?php if (isset($user)) : ?>
    <p>User: <?= $user->name ?></p>
    <p>Age: <?= $user->age ?></p>
<?php endif; ?>
