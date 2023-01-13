<?php
namespace proven\fn_menu;

/**
 * Get data from menu.txt
 * @param string $cat, the category filter
 * @return array with the dishes by category.
 */
function search_dishes(string $cat):array{

    $data = array();
    $file = @fopen("./files/menu.txt", "r");
    if(!empty($file)){
    while (($line = fgetcsv($file, 0, ";")) !== FALSE) {  
        list($id, $categoria, $name, $price) = $line;

        if($categoria === $cat) {
            array_push($data, [$id, $categoria, $name, $price]);
        }
    }
    @fclose($file);
    }
    return $data;
};


/**
 * Get data from categorias.txt
 * @return array with the category.
 */
function get_caterory(){

    $filepath = "./files/categorias.txt";
    $fileC = \fopen($filepath, "r");
    $categorias = array();
    while($line = fscanf($fileC, "%s\n")) {
        list($categoria) = $line;
        array_push($categorias,$categoria);

    }
    fclose($fileC);
    return $categorias;
}

/**
 * Table
 */

 function tabla_menu(array $dishes){

    echo '<table id="customers">';
    foreach ($dishes as $d) {

        echo '<tr>';
        echo '<td id="name">'. $d[2] . '</td>';
        echo '<td>'. $d[3] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
 }

