<?php
function buscarEnWikipedia($busqueda) {
    // Reemplazar espacios en la búsqueda con guiones bajos
    $busqueda = str_replace(' ', '_', $busqueda);

    $apiUrl = "https://es.wikipedia.org/w/api.php";
    $params = [
        "action" => "query",
        "format" => "json",
        "list" => "search",
        "srsearch" => $busqueda
    ];

    $url = $apiUrl . "?" . http_build_query($params);
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (isset($data['query']['search'][0]['title'])) {
        $tituloEnlace = $data['query']['search'][0]['title'];
        // Aquí formamos el enlace de Wikipedia con el título
        $enlaceWikipedia = "https://es.wikipedia.org/wiki/" . rawurlencode($tituloEnlace);
        return $enlaceWikipedia;
    } else {
        return 'No se encontró nada'; // Si no se encuentra el título en Wikipedia, retornamos un mensaje de error
    }
}

// Realizar una búsqueda en Wikipedia
$resultado = buscarEnWikipedia("");

// Mostrar los resultados
if (isset($resultado['query']['search'])) {
    $articulos = $resultado['query']['search'];
} else {
    
}

?>