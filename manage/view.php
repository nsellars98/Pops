<!--Homework 8 Solution - view.php-->
<!--@author Nathan C. Sellars-->

<?php include('header.php'); ?>
<section>
    <h2>Pop List</h2>
    <?php if (count($pops) < ONE) : ?>
    <p>No pops were found to match your search, please try again.</p>
    <?php else : ?>
    <table>
        <?php foreach ($pops as $pop) :
        $id = $pop['id'];
        $pop_number = $pop['pop_number'];
        $pop_type = $pop['pop_type'];
        $pop_name = $pop['pop_name'];
        $exclusive = $pop['exclusive'];
        $size = $pop['size'];
        $last_update = $pop['last_update'];
        $editUrl = "index.php?action=show_add_edit_pops&pop_id=$id";
        $deleteUrl = "index.php?action=delete_pop&pop_id=$id";
        ?>
        <tr>
            <th>Edit Link &vartriangleright;</th>
                <td><a href="<?php echo $editUrl; ?>">Edit a Pop</a></td>
            <th>ID &vartriangleright;</th>
                <td><?php echo $id; ?></td>
            <th>Number &vartriangleright;</th>
                <td><?php echo $pop_number; ?></td>
            <th>Type &vartriangleright;</th>
                <td><?php echo $pop_type; ?></td>
            <th>Name &vartriangleright;</th>
                <td><?php echo $pop_name; ?></td>
            <th>Exclusive &vartriangleright;</th>
                <td><?php echo $exclusive; ?></td>
            <th>Size &vartriangleright;</th>
                <td><?php echo $size; ?></td>
            <th>Last Update &vartriangleright;</th>
                <td><?php echo $last_update; ?></td>
            <th>Delete Link &vartriangleright;</th>
                <td><a href="<?php echo $deleteUrl; ?>">Delete a Pop</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</section>
<?php include('footer.php'); ?>