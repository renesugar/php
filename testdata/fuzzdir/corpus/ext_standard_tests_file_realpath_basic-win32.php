<?php
/* Prototype: string realpath ( string $path );
   Description: Returns canonicalized absolute pathname
*/

echo "\n*** Testing basic functions of realpath() with files ***\n";

/* creating directories and files */
$file_path = dirname(__FILE__);
mkdir("$file_path/realpath_basic/home/test/", 0777, true);

$file_handle1 = fopen("$file_path/realpath_basic/home/test/realpath_basic.tmp", "w");
$file_handle2 = fopen("$file_path/realpath_basic/home/realpath_basic.tmp", "w");
$file_handle3 = fopen("$file_path/realpath_basic/realpath_basic.tmp", "w");
fclose($file_handle1);
fclose($file_handle2);
fclose($file_handle3);

echo "\n*** Testing realpath() on filenames ***\n";
$filenames = array (
  /* filenames resulting in valid paths */
  "$file_path/realpath_basic/home/realpath_basic.tmp",
  "$file_path/realpath_basic/realpath_basic.tmp/",
  "$file_path/realpath_basic//home/test//../test/./realpath_basic.tmp",
  "$file_path/realpath_basic/home//../././realpath_basic.tmp//",

   // checking for binary safe
  b"$file_path/realpath_basic/home/realpath_basic.tmp",

  /* filenames with invalid path */
  "$file_path///realpath_basic/home//..//././test//realpath_basic.tmp",
  "$file_path/realpath_basic/home/../home/../test/../..realpath_basic.tmp"
);

$counter = 1;
/* loop through $files to read the filepath of $file in the above array */
foreach($filenames as $file) {
  echo "\n-- Iteration $counter --\n";
  var_dump( realpath($file) );
  $counter++;
}

echo "Done\n";
?>
