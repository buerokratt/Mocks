<?php

date_default_timezone_set("America/New_York");
header("Cache-Control: no-store");
header("Content-Type: text/event-stream");
header('Access-Control-Allow-Origin: *');

$counter = rand(1, 4);
while (true) {

  $curDate = date(DATE_ISO8601);

  // Send a simple message at random intervals.

  $counter--;

  if (!$counter) {
    echo 'data: {"headers":{"Pragma":["no-cache"],"Cache-Control":["no-cache"],"Expires":["Wed, 31 Dec 1969 23:59:59 GMT"],"Content-Type":["application/json"]},"body":{"data":{"forwarding_validation":[{"id":"a8cd5b6c-6f6f-7fb9-f03b-a2215863b711","chatid":"f7fe8858-e419-4573-bd37-7b8bdba7d112","content":"Boti vastus '.rand().'","event":"","authorId":"demo-sse","authorTimestamp":"'.$curDate.'","authorFirstName":"","authorLastName":"","authorRole":"chatbot","rating":"","created":"'.$curDate.'","updated":"'.$curDate.'"},{"id":"e0e46b42-ba20-1126-bc98-b64290f8cf4c","chatid":"f7fe8858-e419-4573-bd37-7b8bdba7d112","content":"Mock-SSE vastus","event":"","authorId":"demo","authorTimestamp":"'.$curDate.'","authorFirstName":"","authorLastName":"","authorRole":"chatbot","rating":"","created":"'.$curDate.'","updated":"'.$curDate.'"}]},"error":null},"statusCode":"OK","statusCodeValue":200}' . "\n\n";
    $counter = rand(1, 4);
  }

  if(ob_get_length()) ob_end_flush();
  flush();

  // Break the loop if the client aborted the connection (closed the page)

  if (connection_aborted()) break;

  sleep(1);
}
