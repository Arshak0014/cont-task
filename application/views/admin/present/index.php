<div style="margin: 15px">
    <div style="display: flex; justify-content: space-between">

        <a class="create nav-link" href="/admin/present/create">CREATE FILM</a>
    </div>
    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Film Name</th>
                <th scope="col">Film Year</th>
                <th scope="col">Image</th>
                <th scope="col">Show Date</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($data['presents'])){
                foreach ($data['presents'] as $present){
                    echo '  
                       <tr>  
                            <td>'.$present["id"].'</td>  
                            <td>'.$present["film_name"].'</td>  
                            <td>'.$present["film_year"].'</td>  
                            <td>'.$present["image"].'</td>                                 
                            <td>'.$present["show_date"].'</td>  
                            <td style="text-align: center;"><a class="delete" data-id="'.$present["id"].'">✘</a></td>  
                            <td style="text-align: center;" class="update"><a href="/admin/present/update/'.$present["id"].'">↻</a></td>  
                       </tr>  
                       ';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script>

    $(document).ready(function(){
        $('#employee_data').DataTable({
            "order": [[ 0, 'desc' ]]
        });
    });

    $('.delete').on('click', function () {
        let del_id = $(this).attr('data-id');
        let conf = confirm('Are you want to delete this film?');
        if (conf) {
            $(this).attr('href', '/admin/present/delete/' + del_id);
        }
    })

</script>