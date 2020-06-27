<?php //debug($data['cinemas']); ?>
<div style="margin: 15px">
    <div style="display: flex; justify-content: space-between">

        <a class="create nav-link" href="/admin/cinema/create">CREATE CINEMA</a>
    </div>
    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data['cinemas'] as $cinema){
                echo '  
				   <tr>  
						<td>'.$cinema["id"].'</td>  
						<td>'.$cinema["name"].'</td>  
						<td>'.$cinema["city"].'</td>  
						<td>'.$cinema["address"].'</td>                                 
						<td>'.$cinema["image"].'</td>  
						<td style="text-align: center;"><a class="delete" data-id="'.$cinema["id"].'">✘</a></td>  
						<td style="text-align: center;" class="update"><a href="/admin/cinema/update/'.$cinema["id"].'">↻</a></td>  
				   </tr>  
				   ';
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
        let conf = confirm('Are you want to delete this cinema?');
        if (conf) {
            $(this).attr('href', '/admin/cinema/delete/' + del_id);
        }
    })

</script>
