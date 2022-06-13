<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Edit Term</h1>
        </div>
    </div>
    <div class="row">
        <form action="" method="POST">
            <input type="hidden" name="original-term" value="<?= $model->id ?>" />
            <div class="form-group">
                <label for="term">Edit Term: </label>
                <input class="form-control" type="text" id="term" name="term" value="<?= $model->term ?>" />
            </div>
            <div class="form-group">
                <label for="definition">Edit Definition: </label>
                <textarea class="form-control" id="definition" name="definition"><?= $model->definition ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Edit" />
            </div>

        </form>
    </div>
</div>