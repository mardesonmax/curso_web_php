
-- criando banco de dados
CREATE DATABASE nome_do_banco;

#=================================================
-- apagando banco de dados
DROP DATABASE nome_do_banco;

#=================================================
-- CREATE TABLE ciar a tabela
-- int maximo 11 caracteres
-- varchar maximo 255 caracteres variaveis
-- char maximo 255 caracteres fixo, ocupa todo o espaço em disco msm sem ultilizar os 255
-- text maximo indefinido 
-- boolean maximo false/true
-- float (8,2) exemplo: 123456.78
CREATE TABLE tb_cursos (
	id_curso int not null,
    imagem_curso varchar(100) not null,
    nome_curso char(50) not null,
    resumo text null,
    data_cadastro datetime not null,
    ativo boolean default true,
    investimento float(8,2) default 0
);

#=================================================
-- adcionado coluna na tabela
ALTER TABLE tb_cursos ADD COLUMN carga_horaria varchar(5) NOT NULL;

#=================================================
-- mudando nome e tipo da coluna
ALTER TABLE tb_cursos CHANGE carga_horaria carga_hora INT(5) NULL;

#=================================================
-- removendo coluna
ALTER TABLE tb_cursos DROP carga_horaria;

#=================================================
-- BETWEEN serve para filtrar interbalos/entre
-- IN ('valor1', 'valor2', 'valor3') retorna as colunas que tiver os valores
-- NOT IN ('valor1', 'valor2', 'valor3') retorna as colunas que não tiver os valores
SELECT 
	* 
FROM 
	`tb_alunos` 
WHERE 
	interesse = 'Jogos' AND idade BETWEEN 18 AND 50

#=================================================
-- % Indica que pode haver a existência de qualquer conjunto de caracter no texo
-- _ Indica que pode haver a existência de um ou mais caracteres em uma posição especifica do texto
SELECT 
	* 
FROM 
	`tb_alunos` 
WHERE 
	nome LIKE '%e'

#=================================================
-- ASC -> crescente 
-- DESC -> decrescente

SELECT 
	* 
FROM 
	`tb_alunos`
WHERE 
	idade BETWEEN 18 AND 59
ORDER BY
	nome ASC, idade DESC, estado ASC

#=================================================
-- LIMT -> limita o retorno 
-- OFFSET ->Posição de onde começar 
SELECT 
* 
FROM 
`tb_alunos`
LIMIT 
	0, 3
-- Offset, LIMIT

#=================================================
-- MIN() -> retorna a tabela com menor valor
-- MAX() -> retorna a tabela com maior valor
-- AVG() -> retorna a media de todos os valores
-- SUM() -> soma todos os valores 
-- COUNT(*) -> conta todos os registro da tabela
SELECT 
	MIN(investimento) 
FROM 
	`tb_cursos`
WHERE 
	ativo = true


#=================================================
-- GROUP BY -> agrupando registros por estado
SELECT 
	estado, COUNT(*) AS alunos_por_estado
FROM 
	`tb_alunos` 
GROUP BY
	estado

#=================================================
-- HAVING -> filtro para GROUP BY
SELECT 
interesse, estado, COUNT(*) alunos_por_estado
FROM 
	`tb_alunos` 
WHERE
	interesse != 'Esporte'
GROUP BY 
	estado
HAVING
	alunos_por_estado > 3

#=================================================
-- Atualizando registros
UPDATE 
	tb_alunos
SET 
	nome = 'Mardeson', idade = '25', email = 'max@gmail.com', estado = 'CE' 
WHERE
	id_aluno = 1

#=================================================
-- Deletando varios registros
DELETE 
FROM 
	tb_alunos 
WHERE 
	id_aluno IN(10, 15, 30, 35, 40) 
 -- id_aluno = 1