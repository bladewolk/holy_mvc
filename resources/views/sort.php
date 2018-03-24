<form class="form-inline mt-3" action="/">
    <div class="form-group mb-2">

        <?php if (request()->has('page')) : ?>
            <input type="hidden" name="page" value="<?= request()->get('page') ?>">
        <?php endif; ?>

        <label class="sr-only">Email</label>
        <select class="form-control form-control-sm" name="field">
            <option selected disabled>Select sorted field</option>
            <option value="name" <?php if (request()->get('field') == 'name') echo 'selected'; ?>>name</option>
            <option value="email" <?php if (request()->get('field') == 'email') echo 'selected'; ?>>email</option>
            <option value="done" <?php if (request()->get('field') == 'done') echo 'selected'; ?>>done</option>
        </select>
    </div>

    <div class="form-group mx-sm-3 mb-2">
        <select class="form-control form-control-sm" name="by">
            <option selected disabled>Sort by</option>
            <option value="asc" <?php if (request()->get('by') == 'asc') echo 'selected'; ?>>Asc</option>
            <option value="desc" <?php if (request()->get('by') == 'desc') echo 'selected'; ?>>Desc</option>
        </select>

    </div>

    <div class="form-group mx-sm-2 mb-2">
        <button type="submit" class="btn btn-outline-success btn-sm">Sort</button>
    </div>

</form>