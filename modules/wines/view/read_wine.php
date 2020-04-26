<div id="contenido">

<h3>Wine <?php echo $rdo['name'];?> <?php echo $rdo['code'];?> </h3>

<table id="read_table">
    <tr>
        <td>Code: </td>
        <td><?php echo $rdo['code'];?></td>
    </tr>
    <tr>
        <td>Name: </td>
        <td><?php echo $rdo['name'];?></td>
    </tr>
    <tr>
        <td>Mark: </td>
        <td><?php echo $rdo['mark'];?></td>
    </tr>
    <tr>
        <td>Grades: </td>
        <td><?php echo $rdo['grades'];?></td>
    </tr>
    <tr>
        <td>Origin: </td>
        <td><?php echo $rdo['origin'];?></td>
    </tr>
    <tr>
        <td>Year: </td>
        <td><?php echo $rdo['year'];?></td>
    </tr>
    <tr>
        <td>
            <?php
                echo '<a class="Button_red" href="index.php?page=controller_wines&op=delete&id='.$rdo['code'].'">Delete</a>';
                echo '&nbsp;';
            ?>
        </td>
        <td>
            <?php
                echo '<a class="Button_green" href="index.php?page=controller_wines&op=update&id='.$rdo['code'].'">Update</a>';
                echo '&nbsp;';
             ?>
        </td>
    </tr>

</table>
<p><a href="index.php?page=controller_wines&op=list">Return</a></p>
</div>
