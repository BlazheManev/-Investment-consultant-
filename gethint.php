<?php
$a[] = "Tesla";
$a[] = "Nvidia";
$a[] = "Makpetrol";
$a[] = "Intel";
$a[] = "Microsoft";
$a[] = "Airbnb";
$a[] = "Dice Holdings";
$a[] = "Asus";
$a[] = "Generals motor";
$a[] = "Volkswagen group";
$a[] = "LG";
$a[] = "Samsung";
$a[] = "Metropolitan Bank Holding Corp";
$a[] = "Huttig Bldg Products";
$a[] = "Skyline Corp";
$a[] = "Ford Motor Company";
$a[] = "Newmark Group Inc Cl A";
$a[] = "Oxbridge Ord Shrs";
$a[] = "Grindrod Shipping Holdings Ltd";
$a[] = "Adobe";
$a[] = "Amazon";
$a[] = "Apple";
$a[] = "Meta";
$a[] = "Visa";
$a[] = "Johnson-and-Johnson";
$a[] = "Walmart";
$a[] = "Nestle";
$a[] = "Alibaba";
$a[] = "Mastercard";
$a[] = "Bank of America";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>