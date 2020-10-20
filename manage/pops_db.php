<!--Homework 8 Solution - pops_db.php-->
<!--@author Nathan C. Sellars-->

<?php

    /**
     * Gets all of the available pops from the
     * nwacc database in the pops table.
     *
     * @return array the pop array result set
     * with the given information.
     */
    function getPops() {
        global $db;
        $query = 'SELECT id, pop_number, pop_type, pop_name, exclusive, size, last_update
                  FROM pops';

        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $resultSet = $statement->fetchAll();
            $statement->closeCursor();
            return $resultSet;
        } catch (PDOException $exception) {
            displayError($exception->getMessage());
        }
    }

    /**
     * Gets a pop array to be used for
     * adding and editing pops in the
     * nwacc database in the pops table.
     *
     * @param $id {mixed} the id of the pop
     * to get from the nwacc database in
     * the pops table.
     *
     * @return mixed the array of arrays
     * result set with the given information.
     */
    function getPop($id) {
        global $db;
        $query = 'SELECT id, pop_number, pop_type, pop_name, exclusive, size, last_update
                  FROM pops
                  WHERE id = :id';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $exception) {
            displayError($exception->getMessage());
        }
    }

    /**
     * Gets a specified pop by name from
     * the nwacc database in the pops table
     * and displays the result.
     *
     * @param $name {mixed} the name of the
     * pop to get from the nwacc database in
     * the pops table.
     *
     * @return mixed the result set with the
     * given information.
     */
    function getPopByName($name) {
        global $db;
        $query = 'SELECT id, pop_number, pop_type, pop_name, exclusive, size, last_update
                      FROM pops
                      WHERE pop_name LIKE :name';

        try {
            $statement = $db->prepare($query);
            $paramValue = "%$name%";
            $statement->bindValue(':name', $paramValue);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $exception) {
            displayError($exception->getMessage());
        }
    }

    /**
     * Gets a specified pop by type from
     * the nwacc database in the pops table
     * and displays the result.
     *
     * @param $type {mixed} the pop type to
     * get from the nwacc database in the pops
     * table.
     *
     * @return mixed the result set with the
     * given information.
     */
    function getPopByType($type) {
        global $db;
        $query = 'SELECT id, pop_number, pop_type, pop_name, exclusive, size, last_update
                      FROM pops
                      WHERE pop_type LIKE :type';

        try {
            $statement = $db->prepare($query);
            $paramValue = "%$type%";
            $statement->bindValue(':type', $paramValue);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $exception) {
            displayError($exception->getMessage());
        }
    }

    /**
     * Gets a specified pop by type from
     * the nwacc database in the pops table
     * and displays the result.
     *
     * @param $id {mixed} the id of the
     * pop to get from the nwacc database in
     * the pops table.
     *
     * @return array the pop array result set
     * with the given information.
     */
    function getPopById($id) {
        global $db;
        $query = 'SELECT id, pop_number, pop_type, pop_name, exclusive, size, last_update
                      FROM pops
                      WHERE id LIKE :id';

        try {
            $statement = $db->prepare($query);
            $paramValue = "%$id%";
            $statement->bindValue(':id', $paramValue);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $exception) {
            displayError($exception->getMessage());
        }
    }

    /**
     * Adds a new pop into the nwacc database in
     * the pops table with the given {@code $id} number,
     * {@code $pop_number}, {@code $pop_type},
     * {@code $pop_name}, whether or not the pop
     * is {@code $exclusive}, the pop {@code $size},
     * and the date since the {@code $last_update}.
     *
     * @param $pop_number {mixed} the pop_number of
     * the pop to add from the nwacc database in
     * the pops table.
     *
     * @param $pop_type {mixed} the pop_type of
     * the pop to add from the nwacc database
     * in the pops table.
     *
     * @param $pop_name {mixed} the pop_name of
     * the pop to add from the nwacc database
     * in the pops table.
     *
     * @param $exclusive {mixed} the exclusivity
     * of the pop to add from the nwacc database
     * in the pops table. The exclusivity of a pop
     * is demarcated with a '0' for NO, and a '1'
     * for YES.
     *
     * @param $size {mixed} the size of the pop
     * to add from the nwacc database in
     * the pops table.
     *
     * @param $last_update {mixed} the date of
     * the last_update of the pop to add from
     * the nwacc database in the pops table.
     *
     * @return string the id of the pop at the
     * value assigned.
     */
    function addPops($pop_number, $pop_type, $pop_name, $exclusive, $size, $last_update) {
        global $db;
        $query = 'INSERT INTO pops (pop_number, pop_type, pop_name, exclusive, size, last_update) 
                  VALUES (:pop_number, :pop_type, :pop_name, :exclusive, :size, :last_update)';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':pop_number', $pop_number);
            $statement->bindValue(':pop_type', $pop_type);
            $statement->bindValue(':pop_name', $pop_name);
            $statement->bindValue(':exclusive', $exclusive);
            $statement->bindValue(':size', $size);
            $statement->bindValue(':last_update', $last_update);
            $statement->execute();
            $statement->closeCursor();
            return $db->lastInsertId();
        } catch (PDOException $exception) {
            displayError($exception->getMessage());
        }
    }

    /**
     * Updates an existing pop in the nwacc database
     * in the pops table with the given {@code $id}
     * number, {@code $pop_number}, {@code $pop_type},
     * {@code $pop_name}, whether or not the pop
     * is {@code $exclusive}, the pop {@code $size},
     * and the date since the {@code $last_update}.
     *
     * @param $id {mixed} the id of the pop
     * to update from the nwacc database in
     * the pops table.
     *
     * @param $pop_number {mixed} the pop_number
     * of the pop to update from the nwacc database
     * in the pops table.
     *
     * @param $pop_type {mixed} the pop_type of
     * the pop to update from the nwacc database
     * in the pops table.
     *
     * @param $pop_name {mixed} the pop_name of
     * the pop to update from the nwacc database
     * in the pops table.
     *
     * @param $exclusive {mixed} the exclusivity
     * of the pop to update from the nwacc database
     * in the pops table. The exclusivity of a pop
     * is demarcated with a '0' for 'NO', and a '1'
     * for 'YES'.
     *
     * @param $size {mixed} the size of the pop
     * to update from the nwacc database in
     * the pops table.
     *
     * @param $last_update {mixed} the date of the
     * last_update of the pop to update from the
     * nwacc database in the pops table.
     *
     * @return bool returns the rows if
     * <code>true</code> of the updated record(s)
     * from the nwacc database in the pops table,
     * otherwise, <code>false</code> if not.
     */
    function updatePops($id, $pop_number, $pop_type, $pop_name, $exclusive, $size, $last_update) {
        global $db;
        $query = 'UPDATE pops SET 
                    pop_number = :pop_number,
                     pop_type = :pop_type,
                      pop_name = :pop_name,
                       exclusive = :exclusive,
                        size = :size,
                         last_update = :last_update
                  WHERE id = :id';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':pop_number', $pop_number);
            $statement->bindValue(':pop_type', $pop_type);
            $statement->bindValue(':pop_name', $pop_name);
            $statement->bindValue(':exclusive', $exclusive);
            $statement->bindValue(':size', $size);
            $statement->bindValue(':last_update', $last_update);
            $statement->bindValue(':id', $id);
            $rowsUpdated = $statement->execute();
            $statement->closeCursor();
            return $rowsUpdated;
        } catch (PDOException $exception) {
            displayError($exception->getMessage());
        }
    }

    /**
     * Deletes a pop from the nwacc database in
     * the pops table by obtaining its specified
     * {@code $id} number.
     *
     * @param $id {mixed} the id of the pop
     * to delete from the nwacc database in
     * the pops table.
     *
     * @return bool returns a row count if
     * <code>true</code> of the records still
     * remaining from the nwacc database in the
     * pops table, otherwise, <code>false</code>
     * if not.
     */
    function deletePops($id) {
        global $db;
        $query = 'DELETE FROM pops WHERE id = :id';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $rowCount = $statement->execute();
            $statement->closeCursor();
            return $rowCount;
        } catch (PDOException $exception) {
            displayError($exception->getMessage());
        }
    }

?>