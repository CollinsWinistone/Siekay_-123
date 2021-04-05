<?php

class Category
{
    public function getCategory(string $category,Database $dbObj,mysqli $conn)
    {
        $data = $dbObj->retrieve(array('name','id'),
                                 "category",
                                 "name='$category'",
                                 $conn
                                );

       return ($data[0]['id']);
       

    }
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