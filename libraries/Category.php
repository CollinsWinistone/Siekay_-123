<?php
/**
 * @author Eng.Collins Simiyu
 * Category class
 * All operations related to categories are
 * defined in this blueprint
 */

class Category
{
    /**
     * Gets category id from category name
     * @param $category - Category name
     * @param $dbObj -Database file to perform Crud
     *              operations
     * @param $conn -Database connection
     * @return -returns an integer id for the category
     */
    public function getCategory(string $category,Database $dbObj,mysqli $conn)
    {
        $data = $dbObj->retrieve(array('name','id'),
                                 "category",
                                 "name='$category'",
                                 $conn
                                );

       return ($data[0]['id']);
       

    }
    /**
     * Gets category name from category id
     * @param $cat_id -Category id
     * @param $dbObj -database object to perfom Crud operations
     * @param $conn -the database connection
     * @return -Returns the category name for that id
     */
    public function getCategoryName(int $cat_id,Database $dbObj,mysqli $conn)
    {
        $data = $dbObj->retrieve(array('name','id'),
                                "category",
                                "id='$cat_id'",
                                 $conn);

        return ($data[0]['name']);
    }
}

?>