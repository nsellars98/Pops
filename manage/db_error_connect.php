<!--Homework 8 Solution - db_error_connect.php-->
<!--@author Nathan C. Sellars-->

<?php include('header.php'); ?>
    <section>
        <h2>Connection Error</h2>
        <p>
            An error occurred connecting to the database. Contact the SysAdmin.
        </p>
        <p>
            <?php echo $errorMessage; ?>
        </p>
    </section>
<?php include('footer.php'); ?>