<h2 class="present-title mt-4 mb-4">Film: "<span><?= $data['present']['film_name'] ?></span>"</h2>

<div id="confirm_result">
    <?php if (!empty($_SESSION['confirm_message'])) :?>
        <div style="border-radius: 50px" align="center" class="alert alert-success" role="alert">
            <b>
                <?=  $_SESSION["confirm_message"]; ?>
                <?php unset($_SESSION['confirm_message']) ?>
            </b>
        </div>
    <?php endif; ?>
</div>

<div class="mt-3 mb-3" style="display: flex; justify-content: space-between">
    <div class="card card-main">
        <img style="width: 100%;border-radius: 20px" class="card-img-top" src="../../../assets/images/<?= $data['present']['image'] ?>" alt="Card image cap">
        <div style="padding: 0.60rem!important;" class="card-body">
                <p class="card-text">Film Name: "<b style="color: #ff8d1e"><?= $data['present']['film_name'] ?></b>"</p>
                <p class="card-text">Film Year: <b style="color: #ff8d1e"><?= $data['present']['film_year'] ?></b></p>
        </div>
    </div>
    <div style="display: flex; flex-wrap: wrap">
        <div style="width: 572px;margin: 0;">
            <h2 class="present-title mt-4 mb-4" >Select Your Place</h2>
            <div class="places_content" style="display: flex; flex-wrap: wrap">
                <?php foreach ($data['places'] as $place) : ?>

                    <div align="center" class="place_val <?= (in_array($place,$data['places_m'])) ? 'reserved-places not-active' : 'free-places' ?>">
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