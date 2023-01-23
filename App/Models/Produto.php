<?php

    namespace App\Models;

    use MF\Model\Model;

    class Produto extends Model {

        public function getProdutos() {
            $query = "
                SELECT * FROM `tb_produtos`
            ";

            return $this->database->query($query)->fetchAll(\PDO::FETCH_OBJ);
        }
        
    }
?>