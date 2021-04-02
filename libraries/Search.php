<?php
/**
 * Searches for information in a database
 */

class Search {
	//constructor
	public function __construct() {

	}

	/**
	 * Splits the query into multiple keywords
	 * It splits its spaces,comas,full stops,
	 * etc
	 * It then returns an array of the splitted query sets
	 * @param $splitVariables Variables to determine where to split
	 *          a string
	 *
	 * @param $query The query to be split
	 */
	private function splitQuery(array $splitVariables, string $query) {

	}
	/**
	 * Checks an array of splitted query and removed any word that
	 * Suggests a question such as what,which etc.
	 * Such words are incrementally added in question identifier.php
	 * Should return an array of necessary and correct query array
	 *
	 * @param $Qi Query sets to be ommitted from the search array
	 *          as they are verbs used to ask question and have no
	 *          meaningfull impact if we search them
	 */
	private function removeQuestionIdentifiersFromQuery(array $Qi) {

	}

	/**
	 * Search for information and returns an array of all the
	 * information available using full text search
	 * @param $query The search query
	 * @param $db Database connection
	 * @param $table Table to conduct the search
	 * @param $cols -The columns to return
	 * @param $match_cols - Columns to match against
	 */
	public function search($query, $db, $table, $cols, $match_cols) {
		//select question from quans where MATCH (question) AGAINST('best language' IN NATURAL LANGUAGE MODE)
		$data = [];
		$data_append = [];
		$num_columns = count($cols);
		$all_cols = implode(",", $cols);
		$m_cols = implode(",", $match_cols);
		$sql = "SELECT $all_cols FROM $table
                WHERE MATCH ($m_cols)
                AGAINST ('$query' IN NATURAL LANGUAGE MODE)";

		print($sql . "<br>");
		$result = $db->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				for ($col = 0; $col < $num_columns; $col++) {
					$key = $cols[$col];
					$data_append[$key] = $row[$key];

				}
				array_push($data, $data_append);
			}
			return $data;
		} else {
			return $data;
		}

	}
}

?>