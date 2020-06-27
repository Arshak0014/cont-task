<?php //debug($data['cinemas']); ?>
<div style="padding: 20px">
    <form method="post" enctype="multipart/form-data">

        <label for="">Select Cinema *</label><br>
        <select class="create_page_inputs" name="selected_cinema">
            <option disabled selected>Select Cinema</option>
            <?php foreach($data['cinemas'] as $cinema):  ?>
                <option value="<?= $cinema['id']?>" ><?= $cinema['name']?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="">Write Film Name *</label><br>
        <input class="create_page_inputs" placeholder="Write Film Name" type="text" name="film_name" value="<?= isset($_POST['film_name']) ? $_POST['film_name'] : null  ?>"/><br>

        <label for="">Write Film Year *</label><br>
        <input class="create_page_inputs" placeholder="Write Film Name" type="text" name="film_year" value="<?= isset($_POST['film_year']) ? $_POST['film_year'] : null  ?>"/><br>

        <label for="">Image</label><br>
        <input class="mb-2" type="file" name="film_image" value="<?= isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null  ?>"><br>
       
        <label for="">Show Date *</label><br>
        <input class="p-2" type="text" name="show_date" id="date-time" value="<?= isset($_POST['show_date']) ? $_POST['show_date'] : date('Y/m/d') ?>" placeholder="Select Date" />
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
