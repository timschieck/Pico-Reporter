<?
require("api_details.php");

function pco_api_get($query) {
  $pco_api = curl_init();
  curl_setopt($pco_api, CURLOPT_URL, $query);
  curl_setopt($pco_api, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($pco_api, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($pco_api, CURLOPT_USERPWD, pco_api_id . ":" . pco_api_secret);

  return json_decode(curl_exec($pco_api));
  curl_close($pco_api);
}

function pco_build_query($query, $module, $params = null) {
  if (isset($params)) {
    $params = urldecode(http_build_query($params));
    return pco_api_url . $module. "/v2//" . $query . "?$params";
  } else {
    return pco_api_url . $module. "/v2//" . $query;
  }
}

function pco_people($query, $params = null) {
  $api_query = pco_build_query($query, "people", $params);

  $api_return = pco_api_get($api_query);

  $total_record_count = $api_return->meta->total_count;

  $loaded_record_count = count($api_return->data);

  if ($loaded_record_count < $total_record_count) {
    $next_page_link = $api_return->links->next;
  }

  while ($loaded_record_count < $total_record_count) {
    $api_next_page = pco_api_get($next_page_link);

    foreach ($api_next_page->data as $record) {
      array_push($api_return->data, $record);
    }
    if (count($api_next_page->included) > 0) {
      foreach ($api_next_page->included as $include) {
        array_push($api_return->included, $include);
      }
    }
    $loaded_record_count = count($api_return->data);
    if ($loaded_record_count < $total_record_count) {
      $next_page_link = $api_next_page->links->next;
    }


  }
  return $api_return;
}

?>
