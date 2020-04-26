
<div id="contenido">
<div class="myh1" data-tr="Wines"></div>

            <a href="index.php?page=controller_wines&op=create" class="btn">Create</a>
            <a class="btn" href="index.php?page=controller_wines&op=delete_all">Delete All</a>

            <table id="crudtable" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Mark</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (empty($rdo)){
                        echo '<tr>';
                        echo '<td align="center"  colspan="3">THERE ARE NOT WINES</td>';
                        echo '</tr>';
                    }else{
                        
                        foreach ($rdo as $row) {
                            echo "<tr class='modal_list' id='".$row['code']."'>";
                            echo '<td width=100>'. $row['name'] . '</td>';
                            echo '<td width=100>'. $row['code'] . '</td>';
                            echo '<td width=100>'. $row['mark'] . '</td>';
                            echo '<td width=100>'. $row['year'] . '</td>';
                            echo '</tr>';
                        }
                    }
                ?>
                </tbody>
            </table>
</div>



<section id="wine_modal"></section>

