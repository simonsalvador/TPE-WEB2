<?php

class Model
{
    protected $db;
    private $hash;

    function __construct()
    {
        $this->createDatabaseIfNotExists();
        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $this->hash = '$2y$10$101/HDKItM7Zn.rIvRm.Bu5uFAbEQ6isgzCIsM8hYJYCbgSKBOthu';
        $this->deploy();
    }

    private function createDatabaseIfNotExists()
    {
        $pdo = new PDO('mysql:host=' . MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
        $pdo->exec('CREATE DATABASE IF NOT EXISTS' . MYSQL_DB);
    }

    public function deploy()
    {
        // Chequear si hay tablas
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
        if (count($tables) == 0) {
            // Si no hay crearlas
        $sql = <<<END
            --
            -- Table structure for table `bebidas`
            --
            
            CREATE TABLE `bebidas` (
              `id` int(11) NOT NULL,
              `nombre` varchar(255) NOT NULL,
              `tipo` varchar(50) NOT NULL,
              `precio` decimal(8,2) NOT NULL,
              `eliminada` tinyint(1) NOT NULL DEFAULT 0
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Dumping data for table `bebidas`
            --
            
            INSERT INTO `bebidas` (`id`, `nombre`, `tipo`, `precio`, `eliminada`) VALUES
            (2, 'Coca-cola 1.5lt', 'Gaseosa', 12.00, 0),
            (3, 'Nieto-Senetiner Malbec 750ml', 'Vino', 3829.00, 0),
            (9, 'Fanta 1.5lts', 'Gaseosa', 750.00, 0),
            (10, 'Chivas Regal', 'Whisky', 4000.00, 0);
            
            -- --------------------------------------------------------
            
            --
            -- Table structure for table `cliente`
            --
            
            CREATE TABLE `cliente` (
              `id` int(11) NOT NULL,
              `usuario` varchar(255) NOT NULL,
              `password` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Dumping data for table `cliente`
            --
            
            INSERT INTO `cliente` (`id`, `usuario`, `password`) VALUES
            (4, 'webadmin', '$2y$10$101/HDKItM7Zn.rIvRm.Bu5uFAbEQ6isgzCIsM8hYJYCbgSKBOthu');
            
            -- --------------------------------------------------------
            
            --
            -- Table structure for table `pedidos`
            --
            
            CREATE TABLE `pedidos` (
              `id` int(11) NOT NULL,
              `cliente_id` int(11) DEFAULT NULL,
              `bebida_id` int(11) DEFAULT NULL,
              `cantidad` int(11) NOT NULL,
              `fecha_pedido` date NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Indexes for dumped tables
            --
            
            --
            -- Indexes for table `bebidas`
            --
            ALTER TABLE `bebidas`
              ADD PRIMARY KEY (`id`);
            
            --
            -- Indexes for table `cliente`
            --
            ALTER TABLE `cliente`
              ADD PRIMARY KEY (`id`);
            
            --
            -- Indexes for table `pedidos`
            --
            ALTER TABLE `pedidos`
              ADD PRIMARY KEY (`id`),
              ADD KEY `bebida_id` (`bebida_id`),
              ADD KEY `cliente_id` (`cliente_id`);
            
            --
            -- AUTO_INCREMENT for dumped tables
            --
            
            --
            -- AUTO_INCREMENT for table `bebidas`
            --
            ALTER TABLE `bebidas`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
            
            --
            -- AUTO_INCREMENT for table `cliente`
            --
            ALTER TABLE `cliente`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
            
            --
            -- AUTO_INCREMENT for table `pedidos`
            --
            ALTER TABLE `pedidos`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
            
            --
            -- Constraints for dumped tables
            --
            
            --
            -- Constraints for table `pedidos`
            --
            ALTER TABLE `pedidos`
              ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`bebida_id`) REFERENCES `bebidas` (`id`),
              ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
            COMMIT;
          END;
        $this->db->query($sql);
        }
    }
}
