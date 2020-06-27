<?php //debug($data['present']['cinemas_id']); ?>
<div style="padding: 20px">
    <form method="post" enctype="multipart/form-data">

        <label for="">Select Cinema *</label><br>
        <select class="create_page_inputs" name="selected_cinema">
            <?php foreach($data['cinemas'] as $cinema):  ?>
                <option <?= $cinema['id'] == $data['present']['cinemas_id'] ? 'selected' : '' ?> value="<?= $cinema['id']?>" ><?= $cinema['name']?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="">Film Name *</label><br>
        <input class="create_page_inputs" placeholder="Write Film Name" type="text" name="film_name" value="<?= $data['present']['film_name']  ?>"/><br>

        <label for="">Film Year *</label><br>
        <input class="create_page_inputs" placeholder="Write Film Name" type="text" name="film_year" value="<?= $data['present']['film_year']  ?>"/><br>

        <label for="">Image</label><br>
        <input class="mb-2" type="file" name="film_image" value="<?= $data['present']['image']  ?>"><br>

        <label for="">Show Date *</label><br>
        <input class="p-2" type="text" name="show_date" id="date-time" value="<?= $data['present']['show_date'] ?>" placeholder="Select Date" />
        <br>

        <div>
            <?php if (isset($data['validate']) && is_array($data['validate'])): ?>
                <ul style="list-style: none;padding: 0;margin-top: 20px;">
                    <?php foreach ($data['validate'] as $error): ?>
                        <li style="color: red;"> <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <button class="mt-3 btn btn-success" name="submit" type="submit">CREATE</button>

        <a style="color: #ffffff" class="mt-3 btn btn-info" href="/admin/present">TABLE</a>
    </form>
</div>
