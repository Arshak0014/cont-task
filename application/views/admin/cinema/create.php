<div style="padding: 20px">
    <form method="post" enctype="multipart/form-data">

    <label for="">Write Cinema Name *</label><br>
    <input class="create_page_inputs" placeholder="Write Cinema Name" type="text" name="cinema_name" value="<?= isset($_POST['cinema_name']) ? $_POST['cinema_name'] : null  ?>"/><br>

    <label for="">Cinema`s Description *</label><br>
    <textarea name="cinema_description" class="create_page_inputs"
              placeholder="Write escription" cols="30" rows="10"><?= isset($_POST['cinema_description']) ? $_POST['cinema_description'] : null  ?></textarea><br>

    <label for="">City *</label><br>
    <input class="create_page_inputs" placeholder="City" type="text" name="cinema_city" value="<?= isset($_POST['cinema_city']) ? $_POST['cinema_city'] : null  ?>"/><br>

    <label for="">Address *</label><br>
    <input class="create_page_inputs" placeholder="Address" type="text" name="cinema_address" value="<?= isset($_POST['cinema_address']) ? $_POST['cinema_address'] : null  ?>"/><br>

    <label for="">Image</label><br>
    <input class="" type="file" name="cinema_image" value="<?= isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null  ?>"><br>

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

    <a style="color: #ffffff" class="mt-3 btn btn-info" href="/admin/cinema">TABLE</a>
</form>
</div>