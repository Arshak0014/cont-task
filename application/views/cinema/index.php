<h2 class="present-title mt-4 mb-4"><?= $data['title'] ?></h2>

<?php foreach ($data['cinemas'] as $cinema) : ?>
    <div class="mt-3 mb-4">
        <div class="card-index card">
            <div style="border-radius: 20px" class="card-header">
                <b style="font-size: 18px;"><?= $cinema['name'] ?></b>
            </div>
            <div style="display: flex">
                <img style="width: 300px;border-radius: 20px;" src="../../../assets/images/<?= $cinema['image'] ?>" alt="">

                <div class="card-body">
                    <p class="card-text">Name of cinema: <span><?= $cinema['name'] ?></span></p>
                    <p class="card-text">City: <span><?= $cinema['city'] ?></span></p>
                    <p class="card-text">Address: <span><?= $cinema['address'] ?></span></p>
                    <a href="/cinema/view/<?= $cinema['id'] ?>" style="color: white;font-weight: bold;" class="btn btn-warning">See More</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div align="right" style="margin: 17px -10px 33px 0px;">
    <?php
    $pagination = new \application\components\Pagination('/cinema/','cinemas','4','4');

    $pagination->html();

    ?>
</div>
