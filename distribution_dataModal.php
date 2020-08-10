<?php 
include('includes/dbcon.php');

if(isset($_REQUEST["distribution_id"]))
{
    $qry7="select *from distributon_network where id={$_REQUEST['distribution_id']}";
    $result7=$conn->prepare($qry7);
    $result7->execute();
    while($row7=$result7->fetch(PDO::FETCH_ASSOC))
    {
?>
<h5><b><?php echo $row7['name']; ?></b></h5>
                    <p class="text-muted"><?php echo $row7['location']; ?></p>
                    <br>
                    <p><b>Contact no</b></p>
                    <p class="text-muted"><?php echo $row7['contact_no']; ?></p>
                    <p><b>Owner Name</b></p>
                    <p class="text-muted"><?php echo $row7['owner_name'] ?></p>
                    <br>
                    <b><a href="#"><?php echo $row7['google_map_address']; ?></a></b>
<?php
    }
}
?>