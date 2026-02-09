<?php

final class RequestFactory {

    public static function fromGlobals() {
        $request = new Request();
        $request->setScheme(RequestFactory::getSchemaFromServerGlobal());
        $request->setHost($_SERVER['HTTP_HOST'] ?? '');
        $request->setPath(RequestFactory::getPathFromServerGlobal());
        $request->setMethod(RequestFactory::getMethodEnumFromServerGlobal());
        $request->setBody(file_get_contents('php://input'));

        foreach(RequestFactory::getUploadedFilesFromGlobal() as $name => $content) {
            $request->setFile($name, $content);
        }
        foreach(RequestFactory::getHeadersFromServerGlobal() as $name => $value) {
            $request->setHeader($name, $value);
        }
        foreach($_COOKIE as $name => $value) {
            $request->setCookie($name, $value);
        }
        foreach($_GET as $name => $value) {
            $request->setQueryParam($name, $value);
        }
        foreach($_POST as $name => $value) {
            $request->setInputParam($name, $value);
        }
        // FormData/Multipart fix for PUT/PATCH/DELETE requests
        if (self::isMultipart($request->getHeader('Content-Type'))) {
            $multipartRequest = MultipartFormDataParser::parse($request);
            if (!is_null($multipartRequest)) {
                foreach($multipartRequest->params as $name => $value) {
                    $request->setInputParam($name, $value);
                }
                foreach($multipartRequest->files as $name => $value) {
                    $file = self::buildUploadedFileInstance($value);
                    $request->setFile($name, $file);
                }
            }
        }

        return $request;
    }

    private static function getHeadersFromServerGlobal() :array {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (($prefix = substr($name, 0, 5)) && ($prefix == 'HTTP_' || in_array($name, ['CONTENT_TYPE', 'CONTENT_LENGTH']))) {
                if ($prefix == 'HTTP_') {
                    $name = substr($name, 5);
                }
                $name = str_replace('_', '-', $name);
                $headers[$name] = $value;
            }
        }
        return $headers;
    }

    private static function getSchemaFromServerGlobal() {
        if (isset($_SERVER['REQUEST_SCHEME']) && strtolower($_SERVER['REQUEST_SCHEME']) == 'https') {
            return 'https';
        }
        if (isset($_SERVER['HTTPS']) && in_array($_SERVER['HTTPS'], ['1', 'on', 'ON'])) {
            return 'https';
        }
        if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') {
            return 'https';
        }
        return 'http';
    }

    private static function getPathFromServerGlobal() {
        $pathComponents = explode('?', $_SERVER['REQUEST_URI'] ?? '');
        return $pathComponents[0];
    }

    private static function getMethodEnumFromServerGlobal() {
        if (php_sapi_name() === 'cli') {
            return null;
        }
        $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
        $enumeratedEnum = HttpMethodEnum::tryFrom($requestMethod);
        if (is_null($enumeratedEnum)) {
            throw new RangeException(
                sprintf('The request method (%s) is not supported', $requestMethod)
            );
        }
        return $enumeratedEnum;
    }

    private static function getUploadedFilesFromGlobal() {
        $files = [];
        foreach($_FILES as $name => $data) {
            $files[$name] = (is_string($data['name'])) 
                ? self::buildUploadedFileInstance($data) 
                : array_map(fn($item) => self::buildUploadedFileInstance($item), self::rearrangeUploadedFiles($data));
        }
        return $files;
    }

    private static function buildUploadedFileInstance(array $file) {
        return new UploadedFile(
            $file['name'],
            $file['type'],
            $file['tmp_name'],
            $file['error'],
            $file['size'],
            $file['full_path'] ?? null
        );
    }

    private static function rearrangeUploadedFiles($arr) {
        foreach($arr as $key => $all) {
            foreach($all as $i => $val) {
                $new_array[$i][$key] = $val;    
            }
        }
        return $new_array;
    }

    public static function isMultipart(?string $contentType) :bool {
        if (is_null($contentType)) {
            return false;
        }
        return (bool)preg_match('/^multipart\/form-data/', $contentType);
    }
}

?>