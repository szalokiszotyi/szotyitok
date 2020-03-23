<?php foreach(select($pdo) as $d): ?>
                        <tr>
                            <td> <?=$d[1]?> </td>
                            <td> <?=$d[2]?> </td>
                            <td> <?=$d[3]?> </td>
                            <td> <?=$d[4]?> </td>
                            <td> <input type="button" class="btn btn-rd" name="termek_id" onclick="window.location.href = 'index.php?delete=<?=$d[0]?>';"  value="Termék törlése"/> </td>
                        </tr>
                    <?php endforeach; ?>
