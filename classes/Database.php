<?php

class Database {
    public static $host = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $dbName = "project";
    private static $conn;

    public static function connect() {
        self::$conn = mysqli_connect(self::$host, self::$username, self::$password, self::$dbName);
    }

    public static function disconnect() {
        mysqli_close(self::$conn);
    }

    public static function query($query, $paramType = "", $params = array()) {
        $stmt = mysqli_prepare(self::$conn, $query);
        mysqli_stmt_bind_param($stmt, $paramType, ...$params);
        
        if (mysqli_stmt_execute($stmt)) {
            // echo "Query execution successful.<br>";
        }
        else {
            echo "Oops! Something went wrong. Please try again later. <br>";
            echo mysqli_stmt_error($stmt);
        }

        if (explode(' ', $query)[0] == "SELECT") {
            /*
            Use mysqli_fetch_array($result, MYSQLI_ASSOC) to
            fetch results as an associative array.
            */
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $result;
        }
        else {
            mysqli_stmt_close($stmt);
        }
    }
}

?>