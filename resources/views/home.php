<div class="container">

    <?php if ($paginator->total()) include 'sort.php'; ?>

    <div class="row justify-content-between mt-3">
        <?php foreach ($tasks as $task): ?>
            <div class="card" style="width: 22rem;">

                <img class="card-img-top" src="/public/uploads/<?= $task->image ?>"
                     alt="Card image cap">

                <div class="card-body">

                    <?php if ($task->done) : ?>
                        <div class="alert alert-primary" role="alert">
                            Completed!
                        </div>
                    <?php endif; ?>

                    <h5 class="card-title"><?= e($task->name) ?></h5>
                    <p class="card-subtitle text-muted mb-2"><?= e($task->email) ?></p>

                    <?php if (auth()->user()) : ?>
                        <div class="form-group">
                            <label>Done</label>
                            <input type="checkbox" name="done" <?php if ($task->done) : ?> checked <?php endif; ?>
                                   data-id="<?= $task->id ?>">
                        </div>

                        <textarea class="form-control" name="text" id="task_text"
                                  data-id="<?= $task->id ?>"
                                  cols="10" rows="5"><?= e($task->text) ?></textarea>

                    <?php else : ?>
                        <p class="card-text"><?= e($task->text) ?></p>
                    <?php endif; ?>

                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <?php if ($paginator->total())
        include 'pagination.php';
    ?>

</div>