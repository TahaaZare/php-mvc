<?php $this->include('panel.layouts.header') ?>

<form action="action" method="post">
    <section class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="title" placeholder="title ...">
    </section>
    <section class="form-group">
        <label for="cat_id">Category</label>
        <select class="form-control" id="cat_id" name="cat_id">
            <option value="id"></option>
        </select>
    </section>
    <section class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" name="body" rows="5">body</textarea>
    </section>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php $this->include('panel.layouts.footer') ?>
