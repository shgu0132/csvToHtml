<?php
## source: https://stackoverflow.com/questions/518795/dynamically-display-a-csv-file-as-an-html-table-on-a-web-page
## source: https://www.mrc-productivity.com/techblog/?p=688
## source: https://jquery.com/download/
## source: https://www.php.net/manual/en/function.fgetcsv.php
## source: https://people.sc.fsu.edu/~jburkardt/data/csv/cities.csv
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
$row = 1;
$CELLTOFORMAT=2;
$VALUE=25;
while (($line = fgetcsv($f)) !== false) {
  $num = count($line);
  if (( $row == 1 )) {
	  echo "<tr>";
	  foreach ($line as $cell) {
		  echo "<th>" . htmlspecialchars($cell) . "</th>";
	  }
  } else {
	  $oddEven = $row % 2;
	  if (( $oddEven == 0 )) {
		  $class = "one";
	  }
	  else {
		  $class = "two";
	  }
        echo "<tr class=$class>";
	  for ($c=0; $c < $num; $c++) {
		if ($c == $CELLTOFORMAT) {
			if (($line[$c] > $VALUE)) {
          	          echo "<td class=green>" . htmlspecialchars($line[$c]) . "</td>";
			}
			else {
			  echo "<td class=red>" .htmlspecialchars($line[$c]) . "</td>";
			}
		}
		else {
			echo "<td>" . htmlspecialchars($line[$c]) . "</td>";
		}
        }
	echo "</tr>\n";
  }
	$row = $row + 1;
}
fclose($f);
echo "\n</table></body></html>";
