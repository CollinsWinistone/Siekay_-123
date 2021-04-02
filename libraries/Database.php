<?php
/**
 * Exposes different API methods to perfom CRUD operations in the
 * database
 * @author Eng.Collins Simiyu
 */

class Database {
	/**
	 * Default constructor
	 */
	public function __construct() {

	}
	/**
	 * Connects to the database with default arguments
	 * @param $host -The database host
	 * @param $username -Username for the database
	 * @param $password -database password default is an empty string
	 * @param $database -The database name
	 */
	public function connect($host, $username, $password, $database) {
		$db = new mysqli($host, $username, $password, $database);

		if ($db->connect_error) {
			return 0;
		} else {
			return $db;
		}

	}
	/**
	 * Insert Query
	 * @param $table -table NAME to insert data
	 * @param $columns -columns to insert data into
	 * @param $values -values to insert into various columns
	 * @param $db -daabase connection
	 */
	public function insert(string $table, array $columns, array $values, $db) {
		$sql_query = "INSERT INTO $table (";
		$sql_columns = implode(",", $columns);
		$sql_values = implode(",", $values);

		$sql_query .= $sql_columns . ") VALUES (";
		$i = 0;
		$value_length = count($values);
		$last_value = $value_length-1;
		
		//concatenate each value
		foreach ($values as $value) {
			if ($i != $value_length - 1) {

				$sql_query .= "'" . "$value" . "'" . ",";
				$i++;
			}

		}

		//concatenate the last value
		$sql_query .= "'" . $last_value . "'" . ")";
		//sql insertion query

		if ($db->query($sql_query) == TRUE) {
			echo "New record created successfully...";
		} else {
			echo "Error: " . $sql_query . "<br>" . $db->error;
		}

		$db->close();

	}
	/**
	 * Delete query
	 * @param $table -Table to delete data from
	 * @param $condition -condition for the delete clause
	 *
	 */
	public function delete(string $table, mysqli $db, string $whereCondition = "no_condition") {
		//if condition is empty
		if ($whereCondition == "no_condition") {

			$sql = "DELETE FROM $table";

			if ($db->query($sql) === TRUE) {
				echo "Record deleted successfully...";
			} else {
				echo "Error deleting record:" . $db->error;
			}
			$db->close();
		} else {
			$sql = "DELETE FROM $table WHERE ";
			$sql .= $whereCondition;

			if ($db->query($sql) === TRUE) {
				echo "Record deleted successfully...";
			} else {
				echo "Error deleting record:" . $db->error;
			}
			$db->close();

		}
	}
	/**
	 * Update data
	 * @param $table -The table to update
	 * @param $setData -data to update
	 * @param $condition -The condition of update query
	 * @param $conn -Database connection
	 */
	public function update(string $table, string $setData, $conndition, mysqli $conn) {
		$sql = "UPDATE $table SET $setData";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";

		} else {
			echo "Error updating record: " . $conn->error;
		}
	}
	/**
	 * Retrieve data from the database
	 */
	public function retrieve(array $selectColumns, $table, $condition, $conn) {
		$s_column = implode(",", $selectColumns);
		$sql = "SELECT $s_column FROM $table WHERE $condition";
		//test sql
		//print($sql . "<br>");
		$result = $conn->query($sql);
		$num_columns = count($selectColumns);

		$start = 0;
		$data = [];
		$data_append = [];

		if ($result->num_rows > 0) {
			$column_data = [];
			while ($row = $result->fetch_assoc()) {

				for ($col = 0; $col < $num_columns; $col++) {
					$key = $selectColumns[$col];
					$data_append[$key] = $row[$key];
					//append to the main array

				}
				array_push($data, $data_append);
				$start += 1;

			}
			return $data;

		} else {
			$test = array("helllo");
		}

	}
}
