<?php 


class CreateBanco{    
   
    public function create_tabela()
    {
        $tabela = "CREATE TABLE `banco_teste`.`vendas` (
                  `id_` INT(11) NOT NULL AUTO_INCREMENT,
                  `id_loja` INT(11) NULL,
                  `cnpj` INT(11) NULL,
                  `id_setor_comercial` INT(11) NULL,
                  `desc_setor_comercial` DECIMAL(10,2) NULL,
                  `id_setor_campo` INT(11) NULL,
                  `desc_setor_campo` VARCHAR(65) NULL,
                  `desc_bandeira` DECIMAL(10,2) NULL,
                  `id_bandeira` INT(11) NULL,
                  `id_estado` INT(11) NULL,
                  `desc_estado` VARCHAR(45) NULL,
                  `ativo` TINYINT(1) NULL DEFAULT 1,
                  `endereco` VARCHAR(100) NULL,
                  `cidade` VARCHAR(60) NULL,
                  `bairro` VARCHAR(80) NULL,
                  `cep` VARCHAR(45) NULL,
                  `nome_loja` VARCHAR(45) NULL,
                  `venda` DECIMAL(10,2) NULL DEFAULT '0.00000',
                  `desconto` DECIMAL(10,2) NULL,
                  PRIMARY KEY (`id_`));
                ";
    }
    
}