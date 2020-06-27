<?php
$places_m = array();
foreach ($data['orders'] as $book){
    array_push($places_m,$book['place_id']);
}
$places = explode(',',$data['cinema']['places']);
?>
<h2 style="background: #ff8d1e;padding: 10px; color: white" class="mt-4 mb-4">Film: "<?= $data['present']['film_name'] ?>"</h2>

<div id="confirm_result">
    <?php if (!empty($_SESSION['confirm_message'])) :?>
        <div align="center" class="alert alert-success" role="alert">
            <?=  $_SESSION["confirm_message"]; ?>
            <?php unset($_SESSION['confirm_message']) ?>
        </div>
    <?php endif; ?>
</div>

<div class="mt-3 mb-3" style="display: flex; justify-content: space-between">
    <div class="card" style="width: 12rem;">
        <img style="width: 100%" class="card-img-top" src="../../../assets/images/<?= $data['present']['image'] ?>" alt="Card image cap">
        <div class="card-body">
            <b>
                <p class="card-text">Film Name: <?= $data['present']['film_name'] ?></p>
                <p class="card-text">Film Year: <?= $data['present']['film_year'] ?></p>
            </b>
        </div>
    </div>
    <div style="display: flex; flex-wrap: wrap">
        <div style="width: 572px;margin: 0;">
            <h2 style="background: #ff8d1e;padding: 10px; color: white" class="mt-4 mb-4" >Select Your Place</h2>
            <div class="places_content" style="display: flex; flex-wrap: wrap">
                <?php foreach ($places as $place) : ?>

                    <div align="center" class="place_val <?= (in_array($place,$places_m)) ? 'reserved-places not-active' : 'free-places' ?>">
                        <input type="hidden" id="<?= $data["cinemaId"] ?>" value="<?= $data["cinemaId"] ?>">
                        <input type="hidden" id="<?= $data['present']['id'] ?>" value="<?= $data['present']['id']?>">
                        <input type="hidden" id="<?= $place ?>" value="<?= $place ?>">
                        <input type="hidden" id="<?= $data['present']['show_date'] ?>" value="<?= $data['present']['show_date'] ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $('.place_val').click(function () {
        var cinema_id = $(':nth-child(1)', this).attr('id');
        var film_id = $(':nth-child(2)', this).attr('id');
        var place_id = $(':nth-child(3)', this).attr('id');
        var show_date = $(':nth-child(4)', this).attr('id');

        if(confirm("Are you want to book this place?"))
        {
            $.ajax({
                method: 'POST',
                url: '/cinema/booking/'+place_id,
                dataType: 'JSON',
                data: {cinema_id:cinema_id,film_id:film_id,place_id:place_id,show_date:show_date},
                success: function(result){
                    location.reload();
                    $('#confirm_result').html(result.confirm_result);
                }
            });
        }
        else
        {
            return false;
        }
    })
</script>