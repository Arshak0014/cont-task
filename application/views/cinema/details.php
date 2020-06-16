

<div class="mt-4 mb-4" style="display: flex">
<div style="background: #f9f9f9; width: 40%" class="card mb-3 mr-4">
    <div>
        <img style="width: 100%" class="card-img-top" src="../../../assets/images/<?= $data['cinema']['image'] ?>" alt="Card image cap">
    </div>
    <div class="card-body">
        <p class="card-text"><b>Name of cinema: </b><span><?= $data['cinema']['name'] ?></span></p>
        <p class="card-text"><b>City: </b><span><?= $data['cinema']['city'] ?></span></p>
        <p class="card-text"><b>Address: </b><span><?= $data['cinema']['address'] ?></span></p>
        <p class="card-text"><b>Short description about cinema: </b><br>
            <span><?= $data['cinema']['description'] ?></span></p>

    </div>
</div>
<div style="width: 60%">
    <div class="mb-4" style="display: flex; justify-content: space-between">
        <h3><?= $data['cinema']['name'] ?></h3>
        <form method="post" autocomplete="off">
            <div style="display: flex">
                <input class="p-2" type="text" name="from-date" id="text-form" value="<?= isset($_POST['from-date']) ? $_POST['from-date'] : date('Y/m/d') ?>" placeholder="Select Date" />
                <input type="submit" name="search-date" id="search-date" class="ml-3 btn btn-info" value="Search"/>
            </div>
        </form>
    </div>


<?php if (!empty($data['presents'])) : ?>

<table class="table">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Film Name</th>
        <th scope="col">Film Year</th>
        <th scope="col">Show Date</th>
        <th scope="col"></th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($data['presents'] as $present) : ?>
    <tr>
        <th><img style="width: 50px" src="../../../assets/images/<?= $present['image'] ?>" alt=""></th>
        <td><?= $present['film_name'] ?></td>
        <td><?= $present['film_name'] ?></td>
        <td><?= $present['show_date'] ?></td>
        <td><a class="buy-tick" href="/cinema/presents/<?= $data['cinema']['id'] ?>/<?= $present['id']?>">Book</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>

</table>
<?php else: ?>
<h4 align="center" class="mt-5 mb-5">No Result.</h4>
<?php endif; ?>
</div>
</div>
<script>
    $('#text-form').datepicker(
        {
            dateFormat: 'yy/mm/dd'
        }
    );
</script>