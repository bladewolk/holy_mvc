<form class="form-group" action="/store" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control <?php if (session()->hasError('name')) : ?> is-invalid <?php endif; ?>"
               name="name">

        <?php if (session()->hasError('name')) : ?>
            <div class="invalid-feedback">
                <?= session()->get('name')[0] ?>
            </div>
        <?php endif; ?>

    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email"
               class="form-control  <?php if (session()->hasError('email')) : ?> is-invalid <?php endif; ?>"
               name="email">

        <?php if (session()->hasError('email')) : ?>
            <div class="invalid-feedback">
                <?= session()->get('email')[0] ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label>Text</label>
        <textarea
                class="form-control  <?php if (session()->hasError('text')) : ?> is-invalid <?php endif; ?>"
                name="text" id="textarea"></textarea>

        <?php if (session()->hasError('text')) : ?>
            <div class="invalid-feedback">
                <?= session()->get('text')[0] ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control <?php if (session()->hasError('image')) : ?> is-invalid <?php endif; ?>"
               name="image">

        <img id="image_upload_preview" src="http://placehold.it/320x240" alt="your image"/>

        <?php if (session()->hasError('image')) : ?>
            <div class="invalid-feedback">
                <?= session()->get('image')[0] ?>
            </div>
        <?php endif; ?>
    </div>

    <button class="btn btn-success" type="submit">Submit</button>

    <span class="btn btn-primary" id="loadModal" data-toggle="modal" data-target="#exampleModal">
        Preview
    </span>
</form>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="card">
            <img class="card-img-top preview_image" src="http://placehold.it/320x240"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title preview_name"></h5>
                <p class="card-subtitle text-muted mb-2 preview_email"></p>
                <p class="card-text preview_text"></p>
            </div>
        </div>

    </div>
</div>