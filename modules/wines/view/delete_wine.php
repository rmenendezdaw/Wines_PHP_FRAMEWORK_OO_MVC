<div id="contenido">
        <table border='0'>
            <tr>
                <td align="center"  colspan="2"><h3>¿Do you want to delete wine <?php echo $name['name'] . " ";   echo $_GET['id'] ?>?</h3></td>
                
            </tr>
            <tr>
                <td align="center"><a class="btn" href="index.php?page=controller_wines&op=delete&id=<?php echo $_GET['id']?>&conf=0">Confirm</a></td>
                <td align="center"><a class="btn" href="index.php?page=controller_wines&op=list">Cancel</a></td>
            </tr>
        </table>
</div>