<?php
namespace Wisnubaldas\BaldasModule\modular;
class MultiDBClass
{
    public static function cek_env()
    {
        $jml = env('MULTIPLE_CONNECTION');
        if(env('MULTIPLE_CONNECTION')){
            for ($i=0; $i < (integer)$jml; $i++) { 
            $conn[env('DB_CONN_'.$i)] = [
                                'driver' => 'mysql',
                                'url' => env('DATABASE_URL'),
                                'read' => [
                                    'host' => [
                                        env('DB_READ_HOST', '127.0.0.1'), // rw koneksi
                                    ],
                                ],
                                'write' => [
                                    'host' => [
                                        env('DB_HOST', '127.0.0.1'),
                                    ],
                                ],
                                'sticky' => true,
                                // 'host' => env('DB_HOST', '127.0.0.1'),
                                'port' => env('DB_PORT', '3306'),
                                'database' => env('DB_DATABASE', 'forge'),
                                'username' => env('DB_USERNAME', 'forge'),
                                'password' => env('DB_PASSWORD', ''),
                                'unix_socket' => env('DB_SOCKET', ''),
                                'timezone'  => '+00:00',
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
    }
}
