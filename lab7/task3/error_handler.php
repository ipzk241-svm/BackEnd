<?php
ob_start();

register_shutdown_function(function () {
    $error = error_get_last();
    if ($error !== null && $error['type'] === E_ERROR) {
        ob_clean();

        http_response_code(500);

        $resolutionTime = date('H:i:s', strtotime('+3 hour'));
        echo "<h1>500 Internal Server Error</h1>";
        echo "<p>Вибачте, сталася помилка на сервері.</p>";
        echo "<p>Ми працюємо над її вирішенням. Очікуваний час відновлення: $resolutionTime.</p>";
    } else {
        http_response_code(200);
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
});
