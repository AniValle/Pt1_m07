<?php
namespace proven\fn_users;

/**
 * Functions to manage persistence of users
 */

/**
 * Get data from users.txt and searches username is file
 * @param string $username, the username to search
 * @return array with all data of that user or an array empty.
 */
function searchUser(string $username): array {

    $filepath = './files/users.txt';
    $delimiter = ';';
    $data = array();

    if (\file_exists($filepath) && \is_readable($filepath)) {
        $handle = \fopen($filepath, 'r');
        if ($handle) {
            while (!\feof($handle)) {
                $line = "";                 
                fscanf($handle, "%s\n", $line);
                if ($line) {
                    $fields = explode($delimiter, $line);
                    if (($fields[0] === $username)){
                        $data = $fields;
                        break;
                    }
                }
            }
            \fclose($handle);
        }
    }
    return $data;
};


 /** Register a new user in file
  * @param string $usernameR,
  * @param string $password,
  * $rol por defecto será "registered",
  * @param string $name,
  * @param string $surname
  * @return bool true if successfully inserted, false otherwise
  */
  function registerUser(    string $usernameR,
                            string $password,
                            string $name,
                            string $surname ):bool {
    
    $searchUser = searchUser($usernameR);
    $result = false;

    if (empty($searchUser) == true) {
        $filename = '../pt11v0/files/users.txt';
        $contents = $usernameR . ";" . $password . ";" . "registered" . ";" . $name . ";" . $surname . PHP_EOL;
        $file_put_contents = file_put_contents($filename, $contents, FILE_APPEND);

        $result = true;
    }

return $result;
};

?>
