<!--Homework 8 Solution - index.php-->
<!--@author Nathan C. Sellars-->

<?php

    require_once('manage/database.php');
    require_once('manage/pops_db.php');
    require_once('constants.php');

    $action = filter_input(INPUT_POST, 'action', FILTER_DEFAULT);

    if ($action === null) {
        $action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
        if ($action === null) {
            $action = 'list_pops';
        } // else, there was not action to list_pops, doNothing();
    } // else, there was no action, doNothing();

    switch ($action) {
        case 'list_pops' :
            $pops = getPops();

            include('manage/view.php');
            break;
        case 'show_add_edit_pops' :
            $pop_id = filter_input(INPUT_GET, 'pop_id', FILTER_VALIDATE_INT);

            if ($pop_id === null) {
                $pop_id = filter_input(INPUT_POST, 'pop_id', FILTER_VALIDATE_INT);
            } // else, not looking to show_add_edit_pops, doNothing();
            $pop = getPop($pop_id);

            include('manage/pops_add_edit.php');
            break;
        case 'add_pop' :
            $pop_number = filter_input(INPUT_POST, 'pop_number', FILTER_VALIDATE_INT);
            $pop_type = filter_input(INPUT_POST, 'pop_type', FILTER_DEFAULT);
            $pop_name = filter_input(INPUT_POST, 'pop_name', FILTER_DEFAULT);
            $exclusive = filter_input(INPUT_POST, 'exclusive', FILTER_DEFAULT);
            $size = filter_input(INPUT_POST, 'size', FILTER_VALIDATE_INT);
            $last_update = filter_input(INPUT_POST, 'last_update', FILTER_DEFAULT);

            if ($pop_number === null ||
                $pop_number === false ||
                $pop_type === null ||
                $pop_name === null ||
                $exclusive === null ||
                $size === null ||
                $size === false ||
                $last_update === null) {
                $error = 'Invalid pop data, check all fields and please try again.';

                include('manage/error.php');
            } else {
                $pop_id = addPops($pop_number, $pop_type, $pop_name, $exclusive, $size, $last_update);
                header('Location: index.php');
            }
            break;
        case 'delete_pop' :
            $pop_id = filter_input(INPUT_GET, 'pop_id', FILTER_VALIDATE_INT);
            deletePops($pop_id);
            header('Location: index.php');
            break;
        case 'update_pop' :
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $pop_number = filter_input(INPUT_POST, 'pop_number', FILTER_VALIDATE_INT);
            $pop_type = filter_input(INPUT_POST, 'pop_type', FILTER_DEFAULT);
            $pop_name = filter_input(INPUT_POST, 'pop_name', FILTER_DEFAULT);
            $exclusive = filter_input(INPUT_POST, 'exclusive', FILTER_DEFAULT);
            $size = filter_input(INPUT_POST, 'size', FILTER_VALIDATE_INT);
            $last_update = filter_input(INPUT_POST, 'last_update', FILTER_DEFAULT);

            if ($id === false ||
                $pop_number === null ||
                $pop_type === null ||
                $pop_name === null ||
                $exclusive === null ||
                $size === null ||
                $last_update === null) {
                $error = 'Invalid pop data, verify that all of the fields are correct and try again.';
                include('manage/error.php');
            } else {
                updatePops($id, $pop_number, $pop_type, $pop_name, $exclusive, $size, $last_update);
                header('Location: index.php');
            }
            break;
        case 'search' :
            include('manage/search.php');
            break;
        case 'pop_search' :
            $term = filter_input(INPUT_GET, 'searchField', FILTER_DEFAULT);
            $query = filter_input(INPUT_GET, 'query', FILTER_DEFAULT);

            if ($term === false || $term === null || $query === false || $query === null) {
                $error = 'Invalid search terms, please try again.';
                include('manage/error.php');
            } else {
                if ($term == 'id') {
                    $pop = getPop($query);
                    $pops = $pop ? array($pop) : array();
                } elseif ($term == 'id') {
                    $pops = getPopById($query);
                } elseif ($term == 'pop_type') {
                    $pops = getPopByType($query);
                } elseif ($term == 'pop_name') {
                    $pops = getPopByName($query);
                }  else {
                    $pops = getPops();
                }

                include('manage/view.php');
            }
            break;
        case 'get_pop' :
            break;
        default:
            echo '<p>Action not selected</p>';
            break;
    }

?>