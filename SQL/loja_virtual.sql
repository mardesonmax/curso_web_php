-- Criando o banco de daos
CREATE DATABASE db_loja_viretual

#=======================================================
-- Criando a tabela
CREATE TABLE bt_produtos(
	id_produto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    produto VARCHAR(200) NOT NULL,
    valor FLOAT(8,2) NOT NULL
);

-- Relacionado um para um
CREATE TABLE tb_descricoes_produto(
	id_dp INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_produto INT NOT NULL,
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produto), --Referencia para as tabelas
    descricao TEXT NOT NULL
    
);

-- Relacionado um para muitos
CREATE TABLE tb_imagens(
	id_imagem INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_produto INT NOT NULL,
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produto), --Referencia para as tabelas
    url_imagem VARCHAR(200) NOT NULL
);

#=======================================================
-- Tabela clientes
CREATE TABLE tb_clientes(
	id_cliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    idade INT(3) NOT NULL
);

--Tabela pedidos
CREATE TABLE tb_pedidos(
	id_pedido INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    FOREIGN KEY(id_cliente) REFERENCES tb_clientes(id_cliente),
    data_hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Cirando tabele de referencia pedidos/produtos
CREATE TABLE tb_pedidos_produtos(
	id_pedido INT NOT NULL,
    FOREIGN KEY(id_pedido) REFERENCES tb_pedidos(id_pedido),
    
    id_produto INT NOT NULL,
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produto)
);


#=======================================================
-- LEFT JOIN ->  Preferencia em registros da esquerda 
-- RIGHT JOIN -> Preferencia em registros da direita 
-- INNER JOIN -> Preferencia em registros que se relacione
SELECT 
	* 
FROM
	tb_produtos LEFT JOIN tb_imagens ON(tb_produtos.id_produto = tb_imagens.id_produto)
  --preferencia	     caso exista 				referencia = referencia


SELECT 
	*
FROM
	tb_pedidos INNER JOIN tb_pedidos_produtos ON(tb_pedidos.id_pedido = tb_pedidos_produtos.id_pedido)
    INNER JOIN tb_produtos ON(tb_pedidos_produtos.id_produto = tb_produtos.id_produto);


--ALias -> apelidando tabelas
SELECT 
	p.id_produto,
    p.produto,
    p.valor,
    dt.descricao_tecnica
FROM 
	tb_produtos AS p LEFT JOIN  
	tb_descricoes_tecnicas AS dt 
	ON(p.id_produto = dt.id_produto)
WHERE 
	p.valor > 500
ORDER BY 
	P.valor ASC
    
#=======================================================

-- Alterando colunas
ALTER TABLE tb_clientes ADD COLUMN sexo CHAR(1) NOT NULL, ADD COLUMN endereco VARCHAR(150) NULL;

-- Atualizando dados
UPDATE tb_clientes SET sexo = 'M' WHERE id_cliente IN(1, 2)

-- Chamando os pedidos dos clientes e filtrando a consulta 
SELECT 
    a.id_cliente,
    a.nome,
    a.idade,
    d.id_produto,
    d.produto,
    d.valor
FROM tb_clientes AS a INNER JOIN 
tb_pedidos as b ON(a.id_cliente = b.id_cliente) INNER JOIN 
tb_pedidos_produtos AS c ON(b.id_pedido = c.id_pedido) INNER JOIN 
tb_produtos AS d ON(c.id_produto = d.id_produto)
