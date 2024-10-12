<?php

$jml = env('MULTIPLE_CONNECTION');
if ($jml) {
    for ($i = 0; $i < (int) $jml; $i++) {
        if (env('DB_CONN_'.$i)) {
            $conn[env('DB_CONN_'.$i)] = [
                'driver' => env('DB_DRIVER_'.$i, 'mysql'),
                'url' => env('DATABASE_URL'),
                'read' => [
                    'host' => [
                        env('DB_HOST_R_'.$i, '127.0.0.1'), // rw koneksi
                    ],
                ],
                'write' => [
                    'host' => [
                        env('DB_HOST_W_'.$i, '127.0.0.1'),
                    ],
                ],
                'sticky' => true,
                // 'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT_'.$i, '3306'),
                'database' => env('DB_NAME_'.$i, 'forge'),
                'username' => env('DB_USER_'.$i, 'forge'),
                'password' => env('DB_PASS_'.$i, ''),
                'unix_socket' => env('DB_SOCKET', ''),
                'timezone' => '+00:00',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => extension_loaded('pdo_mysql') ? array_filter([
                    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                ]) : [],
            ];
        }
    }

    return $conn;
} else {
    return [];
}
