<!--Homework 8 Solution - search.php-->
<!--@author Nathan C. Sellars-->

<?php

    include('header.php');

    $file = 'result.txt';

    if (isset($_POST['action']) && isset($_POST['content'])) {
        $content = $_POST['action'] . '-' . $_POST['content'] . "\r\n";
        $results = file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
        if ($results !== false) {
            die('There was an error saving the results to the file.');
        } else {
            echo "$results bytes written to file.";
        }
    } else {
        //die('No post data to process');
    }

?>
    <section>
        <form id="searchForm" action="index.php" method="get">
            <input type="hidden" name="action" id="action" value="pop_search" />
            <input type="hidden" name="content" id="content" value="saveSubmit" />
            <select id="searchField" name="searchField">
                <option value="id">Id</option>
                <option value="pop_type">Pop Type</option>
                <option value="pop_name">Pop Name</option>
            </select>
            <input type="text" name="query" id="query" />
            <input type="submit" name="submit" id="submit" value="Search" />
            <input type="submit" name="saveSubmit" id="saveSubmit" value="Save Results" />
        </form>
    </section>
<?php include('footer.php'); ?>