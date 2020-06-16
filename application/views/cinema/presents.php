<?php //debug($data['places']) ?>
<h2 style="background: #ff8d1e;padding: 10px;" class="mt-4 mb-4">Film: <?= $data['present']['film_name'] ?></h2>
<div class="mt-3 mb-3" style="display: flex; justify-content: space-between">
    <div class="card" style="width: 12rem;">
        <img style="width: 100%" class="card-img-top" src="../../../assets/images/<?= $data['present']['image'] ?>" alt="Card image cap">
        <div class="card-body">
            <p class="card-text"><?= $data['present']['film_name'] ?></p>
            <p class="card-text"><?= $data['present']['film_year'] ?></p>
        </div>
    </div>
    <div style="width: 565px;margin: 0px 70px;">
        <h2 align="center">Select Your Place</h2>
        <div style="display: flex; flex-wrap: wrap">
            <?php foreach ($data['places'] as $place) : ?>
            <div class="<?= $place['status'] == '1' ? 'free-places' : 'reserved-places not-active' ?>"><a href="/cinema/book/<?= $place['id'] ?>/<?= $data['cinemaId'] ?>"><?= $place['id'] ?></a></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>