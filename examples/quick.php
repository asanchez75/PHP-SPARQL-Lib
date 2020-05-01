<?php
require_once( "sparqllib.php" );


$data = sparql_get( 
	"http://localhost:8890/sparql","dba", "dba", 
	"
PREFIX foaf: <http://xmlns.com/foaf/0.1/>
SELECT * WHERE {?s ?p ?o } LIMIT 5
" );
if( !isset($data) )
{
	print "<p>Error: ".sparql_errno().": ".sparql_error()."</p>";
}

print "<table class='example_table'>";
print "<tr>";
foreach( $data->fields() as $field )
{
	print "<th>$field</th>";
}
print "</tr>";
foreach( $data as $row )
{
	print "<tr>";
	foreach( $data->fields() as $field )
	{
		print "<td>$row[$field]</td>";
	}
	print "</tr>";
}
print "</table>";


