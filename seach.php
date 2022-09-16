<?php
include("Constant/config.php");

$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from examdetails where examID like '%$search%' or examName like '%$search%'");
        $stmt->execute();
        $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>

<?php
                 if(!$employee_details)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                    foreach($employee_details as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['name'];?></td>
                        <td><?php echo $value['phone_no'];?></td>
                        <td><?php echo $value['age'];?></td>
                        <td><?php echo $value['department'];?></td>
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>