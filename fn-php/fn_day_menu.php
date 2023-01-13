<?php
namespace proven\fn_day_menu;

/**
 * Get data from menu.txt
 * @param string $cat, the category filter
 * @return array with the dishes by category.
 */
function search_dishes(string $cat):array{

    $data = array();
    $file = @fopen("./files/daymenu.txt", "r");

    if(!empty($file)){
        while (($line = fgetcsv($file, 0, ";")) !== FALSE) {  
            list($id, $categoria, $name) = $line;
    
            if($categoria === $cat) {
                array_push($data, [$id, $categoria, $name]);
            }
        }
        @fclose($file);
    }
    
    return $data;
};

/**
 * Listas
 */

function list_menu(array $dishes){
    foreach ($dishes as $d) {

        echo '<ul>';
        echo '<li>'. $d[2] . '</li>';
        echo '</ul>';
    }
 }