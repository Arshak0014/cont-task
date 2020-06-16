<h2 class="mt-4 mb-4"><?= $data['title'] ?></h2>

<?php foreach ($data['cinemas'] as $cinema) : ?>
    <div class="mt-3 mb-4">
        <div class="card">
            <div class="card-header">
                <b class="text-info"><?= $cinema['name'] ?></b>
            </div>
            <div style="display: flex">
                <img style="width: 300px" src="../../../assets/images/<?= $cinema['image'] ?>" alt="">

                <div class="card-body">
                    <p class="card-text">Name of cinema: <span class="text-info"><?= $cinema['name'] ?></span></p>
                    <p class="card-text">City: <span class="text-info"><?= $cinema['city'] ?></span></p>
                    <p class="card-text">Address: <span class="text-info"><?= $cinema['address'] ?></span></p>
                    <a href="/cinema/view/<?= $cinema['id'] ?>" class="btn btn-success">See More</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>