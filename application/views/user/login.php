<h2 class="present-title mt-4 mb-4">Admin Login</h2>
<div style="margin-left: 20px;">
    <h5 class="text-white">username: 'admin'</h5>
    <h5 class="text-white">password: 'admin'</h5>
</div>
    <div style="padding: 20px">
        <form method="post">

            <label for="">Login</label><br>
            <input class="create_page_inputs" placeholder="Write Film Name" type="text" name="username" value="<?= !empty($_POST['username']) ? $_POST['username'] : null ?>"/><br>

            <label for="">Password</label><br>
            <input class="create_page_inputs" placeholder="Write Film Name" type="password" name="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : null ?>"/><br>

            <div>
                <?php if (isset($_SESSION['login_err'])) : ?>
                    <ul style="list-style: none;padding: 0;margin-top: 20px;">
                        <li style="color: red;"> <?php echo $_SESSION['login_err']; ?></li>
                    </ul>
                <?php endif; ?>
                <?php if (isset($data['errors']) && is_array($data['errors'])): ?>
                    <ul style="list-style: none;padding: 0;margin-top: 20px;">
                        <?php foreach ($data['errors'] as $error): ?>
                            <li style="color: red;"> <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <button class="mt-3 btn btn-success" name="submit" type="submit">Log In</button>
        </form>
    </div>


