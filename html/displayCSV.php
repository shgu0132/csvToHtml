<?php
echo "<html><head><style>\n\n";
echo "table {border: 1px solid black; padding: 0;}";
echo "th {background-color: #3f73c1; color: white; border: 1px solid black; padding: 2px;}";
echo "tr {background-color: #dbdbdb;}";
echo "tr.one {background-color: #dbdbdb;}";
echo "tr.two {background-color: #efefef;}";
echo "td {padding: 4px; margin: 0;}";
echo "td.red {background-color: red;}";
echo "td.green {background-color: green;}";
echo "</style></head>";
echo "<body>\n";
echo "<table border=1 cellspacing=0>\n\n";
$f = fopen("so-csv.csv", "r");
$count = 1;
while (($line = fgetcsv($f)) !== false) {
  if (( $count == 1 )) {
	  echo "<tr>";
	  foreach ($line as $cell) {
		  echo "<th>" . htmlspecialchars($cell) . "</th>";
	  }
  } else {
	  $oddEven = $count % 2;
	  if (( $oddEven == 0 )) {
		  $class = "one";
	  }
	  else {
		  $class = "two";
	  }
        echo "<tr class=$class>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
	echo "</tr>\n";
  }
	$count = $count + 1;
}
fclose($f);
echo "\n</table></body></html>";
