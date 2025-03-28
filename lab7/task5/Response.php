<?php
class Response
{
    private $statusCode;       
    private $headers = []; 
    public function __construct()
    {
        ob_start();
    }

    public function setStatus($code)
    {
        $this->statusCode = (int) $code;
        return $this;
    }

    public function addHeader($header)
    {
        $this->headers[] = $header;
        return $this;
    }

    public function send($content)
    {
        ob_clean();

        if (isset($this->statusCode)) {
            http_response_code($this->statusCode);
        }

        foreach ($this->headers as $header) {
            header($header);
        }

        echo $content;
        ob_end_flush();
    }

    public function __destruct()
    {
        if (ob_get_length() !== false) {
            ob_end_flush();
        }
    }
}
