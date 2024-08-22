<?php

class ResponseMethods {

    public static function printJSON($message, $data = array()) {
        $response = array(
            'status' => 200,
            'statusText' => self::getHTTPResponseCodes()[200],
            'message' => $message
        );

        if (isset($data)) {
            if (is_array($data) && (gettype($data) === 'array') && sizeof($data) > 0) {
                $response['body'] = $data;
            }

            if (($data !== null) && (gettype($data) === 'object')) {
                $response['body'] = $data;
            }
        }

        http_response_code(200);
        print json_encode($response);
    }

    public static function printError($httpCode = 500, $message = "") {
        http_response_code($httpCode);

        if (isset($message) && (trim(strlen($message)) > 0)) {
            $errorMessage = $message;
        } else {
            $errorMessage = self::getHTTPResponseCodes()[$httpCode];
        }

        print json_encode(array(
            'status' => $httpCode,
            'statusText' => self::getHTTPResponseCodes()[$httpCode],
            'message' => $errorMessage
        ));
    }

    private static function getHTTPResponseCodes(): array {
        return array(
            200 => "OK",
            400 => "Bad Request",
            401 => "Unauthorized",
            403 => "Forbidden",
            404 => "Not Found",
            422 => "Unprocessable Content",
            500 => "Internal Server Error"
        );
    }
}
