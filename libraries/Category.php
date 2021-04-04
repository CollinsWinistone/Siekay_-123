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
}

?>