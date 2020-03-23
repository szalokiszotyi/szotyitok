<?php 
if(!isset($_GET['alkategoria'])){
foreach(select($pdo) as $d): ?>
                        <tr>
                            <td> <?=$d[1]?> </td>
                            <td> <?=$d[2]?> </td>
                            <td> <?=$d[3]?> </td>
                            <td> <?=$d[4]?> </td>
                        </tr>
<?php endforeach; 
}
else
{
?>

<?php 
foreach(select2($pdo,$_GET['alkategoria']) as $d): ?>
                        <tr>
                            <td> <?=$d[1]?> </td>
                            <td> <?=$d[2]?> </td>
                            <td> <?=$d[3]?> </td>
                            <td> <?=$d[4]?> </td>
                        </tr>
<?php endforeach;
} 
?>