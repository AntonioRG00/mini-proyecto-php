<?php

require "../conexion/conexion.php";

// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;

$columns = array(
    0 => 'id',
    1 => 'nombre',
    2 => 'precio',
    3 => 'unidades'
);

$sql = "SELECT * FROM categoriaperro";
$query = pg_query($conexion, $sql);
$totalData = pg_num_rows($query);
$totalFiltered = $totalData;

if (!empty($requestData['search']['value'])) { //Filtrado por el search
    $sql .= " WHERE id::varchar ILIKE '%" . $requestData['search']['value'] . "%' ";
    $sql .= " OR nombre::varchar ILIKE '%" . $requestData['search']['value'] . "%' ";
    $sql .= " OR precio::varchar ILIKE '%" . $requestData['search']['value'] . "%' ";
    $sql .= " OR unidades::varchar ILIKE '%" . $requestData['search']['value'] . "%' ";
    $query = pg_query($conexion, $sql);
    $totalFiltered = pg_num_rows($query); //Sacamos el número de rows

    $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['length'] . " OFFSET " . $requestData['start'] . "   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query = pg_query($conexion, $sql);
} else {
    $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['length'] . " OFFSET " . $requestData['start'] . "   ";
    $query = pg_query($conexion, $sql);
    
}

$data = array();
while ($row = pg_fetch_array($query)) { 
    $nestedData = array();

    $nestedData[] = $row["id"];
    $nestedData[] = $row["nombre"];
    $nestedData[] = $row["precio"];
    $nestedData[] = $row["unidades"];
    $nestedData[] = '<td>
                        <button id="btEdit" onclick="prepararUpdate(this)" name="'.$row['id'].'" class="btn btn-warning fa fa-pencil"></button>
                        <button id="btDelete" onclick="deleteRow(this)" name="'.$row['id'].'" class="btn btn-danger fa fa-trash"></button>   
				    </td>';

    $data[] = $nestedData;
}



$json_data = array(
    "draw"            => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
    "recordsTotal"    => intval($totalData),  // total number of records
    "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
    "data"            => $data   // total data array
);

echo json_encode($json_data);  // send data as json format
