<?php
// Game 1
$letters = array(); 
//hola

for ($i = 0; $i <= 6; $i++) {
  $letters[$i] = chr(rand(26)); 
}

echo "Our letters: " . implode(", ", $letters) . "\n";
echo "Please arrange them in ascending order: ";


$user_input;


if ($user_input == sort($letters)) {
  echo "Correct!";
} else {
  echo "Incorrect.";
}
?>

<?php
// Game 2
$letters = array(); 

for ($i = 0; $i <= 6; $i++) {
  $letters[$i] = chr(rand(26)); 
}

echo "Our letters: " . implode(", ", $letters) . "\n";
echo "Please arrange them in ascending order: ";


$user_input;


if ($user_input == rsort($letters)) {
  echo "Correct!";
} else {
  echo "Incorrect.";
}
?>

<?php
// Game 3
$numbers = array(); 

for ($i = 0; $i <= 6; $i++) {
  $numbers[$i] = rand(26); 
}

echo "Our numbers: " . implode(", ", $numbers) . "\n";
echo "Please arrange them in ascending order: ";


$user_input;


if ($user_input == sort($numbers)) {
  echo "Correct!";
} else {
  echo "Incorrect.";
}
?>


<?php
// Game 4
$numbers = array(); 

for ($i = 0; $i <= 6; $i++) {
  $numbers[$i] = rand(26); 
}

echo "Our numbers: " . implode(", ", $numbers) . "\n";
echo "Please arrange them in ascending order: ";


$user_input;


if ($user_input == rsort($numbers)) {
  echo "Correct!";
} else {
  echo "Incorrect.";
}
?>


<?php
// Game 5
$letters = array(); 

for ($i = 0; $i <= 6; $i++) {
  $letters[$i] = chr(rand(26)); 
}

echo "Our letters: " . implode(", ", $letters) . "\n";
echo "Please arrange them in ascending order: ";


$user_input;


if ($user_input == sort($letters)) {
  echo "Correct!";
} else {
  echo "Incorrect.";
}
?>


