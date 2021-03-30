<?php

class Database {
    public static $host = "localhost";
    public static $username = "root";
    public static $password = "dd@18455814";
    public static $dbName = "project";
    private static $conn;

    public static function connect() {
        self::$conn = mysqli_connect(self::$host, self::$username, self::$password, self::$dbName);
        return mysqli_connect_error();
    }

    public static function disconnect() {
        mysqli_close(self::$conn);
    }

    public static function query($query, $paramType = "", $params = array()) {
        $stmt = mysqli_prepare(self::$conn, $query);
        if (strlen($paramType) != 0 || count($params) != 0) {
            if (strlen($paramType) == count($params)) {
                mysqli_stmt_bind_param($stmt, $paramType, ...$params);
            }
            else {
                return array(null, "paramType does not match params");
            }
        }
        mysqli_stmt_execute($stmt);
        $error = mysqli_stmt_error($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return array($result, $error);
    }
}

?>