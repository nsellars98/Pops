<!--Homework 8 Solution - pops_add_edit.php-->
<!--@author Nathan C. Sellars-->

<?php

    include('header.php');

    if (isset($pop_id)) {
        $header = 'Edit Pop';
    } else {
        $header = 'Add Pop';
    }

?>
    <section>
        <h2><?php echo $header; ?></h2>
        <form action="index.php" method="post" id="add_edit_pop_form">
            <?php if (isset($pop_id)) : ?>
                <input type="hidden" name="action" value="update_pop" />
                <input type="hidden" name="pop_id" value="<?php echo $pop_id; ?>" />
            <?php else : ?>
                <input type="hidden" name="action" value="add_pop" />
            <?php endif; ?>
            <p>
                <label for="popNumber">Pop Number: </label>
                <input type="text" name="popNumber" id="popNumber" value="<?php echo $pop['pop_number']; ?>" />
            </p>
            <p>
                <label for="popType">Pop Type: </label>
                <input type="text" name="popType" id="popType" value="<?php echo $pop['pop_type']; ?>" />
            </p>
            <p>
                <label for="popName">Pop Name: </label>
                <input type="text" name="popName" id="popName" value="<?php echo $pop['pop_name']; ?>" />
            </p>
            <p>
                <label for="exclusive">Exclusive: </label>
                <input type="text" name="exclusive" id="exclusive" value="<?php echo $pop['exclusive']; ?>" />
            </p>
            <p>
                <label for="size">Size: </label>
                <input type="text" name="size" id="size" value="<?php echo $pop['size']; ?>" />
            </p>
            <p>
                <label for="lastUpdate">Last Update: </label>
                <input type="text" name="lastUpdate" id="lastUpdate" value="<?php echo $pop['last_update']; ?>" />
            </p>
            <input type="submit" value="Submit" name="submit" />
        </form>
    </section>
<?php include('footer.php'); ?>