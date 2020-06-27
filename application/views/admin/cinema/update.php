
<div style="padding: 20px">
    <form method="post" enctype="multipart/form-data">

        <label for="">Cinema Name</label><br>
        <input class="create_page_inputs" placeholder="Write Cinema Name" type="text" name="cinema_name" value="<?= $data['cinemas']['name']  ?>"/><br>

        <label for="">Cinema`s Description</label><br>
        <textarea name="cinema_description" class="create_page_inputs"
                  placeholder="Write escription" cols="30" rows="10"><?= $data['cinemas']['description']  ?></textarea><br>

        <label for="">City</label><br>
        <input class="create_page_inputs" placeholder="City" type="text" name="cinema_city" value="<?= $data['cinemas']['city']  ?>"/><br>

        <label for="">Address</label><br>
        <input class="create_page_inputs" placeholder="Address" type="text" name="cinema_address" value="<?= $data['cinemas']['address']  ?>"/><br>

        <label for="">Image</label><br>
        <input class="" type="file" name="cinema_image" value=""><br>

        <div>
            <?php if (isset($data['validate']) && is_array($data['validate'])): ?>
                <ul style="list-style: none;padding: 0;margin-top: 20px;">
                    <?php foreach ($data['validate'] as $error): ?>
                        <li style="color: red;"> <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <button class="mt-3 btn btn-success" name="submit" type="submit">UPDATE</button>

        <a style="color: #ffffff" class="mt-3 btn btn-info" href="/admin/cinema">CANCEL</a>
    </form>
</div>