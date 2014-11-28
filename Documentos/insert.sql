use Intranet;
## INSERT TABLE CATEGORIA
INSERT INTO categoria VALUES(1,'Administrador');
INSERT INTO categoria VALUES(2,'Diretor');
INSERT INTO categoria VALUES(3,'Professor');

## INSERT TABLE FUNCAO
INSERT INTO funcao VALUES(1,'Presidente');
INSERT INTO funcao VALUES(2,'Diretor');
INSERT INTO funcao VALUES(3,'Professor');

## INSERT TABELA PERMISSAO
INSERT INTO permissao VALUES(1,'registro',1,1,1,1,1);
INSERT INTO permissao VALUES(2,'funcionario',1,1,1,1,1);
INSERT INTO permissao VALUES(3,'funcao',1,1,1,1,1);
INSERT INTO permissao VALUES(4,'aluno',1,1,1,1,1);
INSERT INTO permissao VALUES(5,'turma',1,1,1,1,1);
INSERT INTO permissao VALUES(6,'disciplina',1,1,1,1,1);
INSERT INTO permissao VALUES(7,'nota',1,1,1,1,1);
INSERT INTO permissao VALUES(8,'mensalidade',1,1,1,1,1);
INSERT INTO permissao VALUES(9,'salario',1,1,1,1,1);
INSERT INTO permissao VALUES(10,'usuario',1,1,1,1,1);
INSERT INTO permissao VALUES(11,'categoria',1,1,1,1,1);

## INSERT TABLE PESSOA
INSERT INTO pessoa VALUES(1,'Wellinton', 'Perazzoli', '1993/10/02');
INSERT INTO pessoa VALUES(2,'Zangetsu', 'Hollow', '1995/03/04');
INSERT INTO pessoa VALUES(3,'Kurosaki', 'Ichigo', '1993/03/07');
INSERT INTO pessoa VALUES(4,'Raito', 'Agami', '1990/05/07');
INSERT INTO pessoa VALUES(5,'Aluno 1', 'aluno 1', '1990/05/07');
INSERT INTO pessoa VALUES(6,'Aluno 2', 'aluno 2', '1990/05/07');
INSERT INTO pessoa VALUES(7,'Aluno 3', 'aluno 3', '1990/05/07');
INSERT INTO pessoa VALUES(8,'Aluno 4', 'aluno 4', '1990/05/07');
INSERT INTO pessoa VALUES(9,'Responsavel 1', 'Teste', '1990/05/07');
INSERT INTO pessoa VALUES(10,'Responsavel 2', 'Teste', '1990/05/07');

##INSERT TABLE CONTATO
INSERT INTO contato VALUES(1, 'celular', '41 9920-4710', 1);
INSERT INTO contato VALUES(2, 'residencial', '41 36980013', 1);

##INSERT TABLE FUNCIONARIO
INSERT INTO funcionario VALUES(1,'08039056969','97618410',0,1,1);
INSERT INTO funcionario VALUES(2,'99999999999','88888888',3000,2,2);
INSERT INTO funcionario VALUES(3,'35265458745','56857485',1500,3,3);
INSERT INTO funcionario VALUES(4,'85998565847','77575755',1500,4,3);


## INSERT TABLE USUARIO
INSERT INTO usuario VALUES(1,'admin@admin.com','321',1,1);
INSERT INTO usuario VALUES(2,'camilabeatriz@msn.com','321',2,2);
INSERT INTO usuario VALUES(3,'kurosakiichigo@gmail.com','321',3,3);
INSERT INTO usuario VALUES(4, 'raito@hotmail.com','321',4,3);

##INSERT TABLE ALUNO
INSERT INTO aluno VALUES(1,5);
INSERT INTO aluno VALUES(2,6);
INSERT INTO aluno VALUES(3,7);
INSERT INTO aluno VALUES(4,8);

#INSERT TABLE RESPONSAVEL
INSERT INTO responsavel VALUES(1,9,2);
INSERT INTO responsavel VALUES(2,10,3);


## INSERT TABLE TURMA
INSERT INTO turma VALUES(1, 'INFANTIL 1', 'INTEGRAL');
INSERT INTO turma VALUES(2, 'INFANTIL 1', 'MEIO PERIODO');
INSERT INTO turma VALUES(3, 'INFANTIL 2', 'INTEGRAL');

## INSERT TABLE DISCIPLINA
INSERT INTO disciplina VALUES(1, 'Matemática 1', 1, 400, 3);
INSERT INTO disciplina VALUES(2, 'Matemática 1', 2, 400, 4);
INSERT INTO disciplina VALUES(3, 'Matemática 2', 3, 600, 3);

##INSERT TABLE ALUNO_DISCIPLINA
INSERT INTO aluno_disciplina VALUES(1, 1, 1);
INSERT INTO aluno_disciplina VALUES(2, 2, 1);
INSERT INTO aluno_disciplina VALUES(3, 3, 2);
INSERT INTO aluno_disciplina VALUES(4, 4, 3);

##INSERT TABLE FINCANCEIRO
INSERT INTO financeiro VALUES(1, 400, '2014/07/05');
INSERT INTO financeiro VALUES(2, 400, '2014/08/05');
INSERT INTO financeiro VALUES(3, 400, '2014/09/05');
INSERT INTO financeiro VALUES(4, 400, '2014/08/17');
INSERT INTO financeiro VALUES(5, 600, '2014/08/15');
INSERT INTO financeiro VALUES(6, 1500, '2014/08/07');
INSERT INTO financeiro VALUES(7, 1500, '2014/08/07');
INSERT INTO financeiro VALUES(8, 3000, '2014/08/07');

##INSERT TABLE PAGAMENTO_ALUNO
INSERT INTO pagamento_aluno VALUES(1, 1, 1);
INSERT INTO pagamento_aluno VALUES(2, 1, 2);
INSERT INTO pagamento_aluno VALUES(3, 2, 3);
INSERT INTO pagamento_aluno VALUES(4, 3, 4);

##INSERT TABLE PAGAMENTO_FUNCIONARIO
INSERT INTO pagamento_funcionario VALUES(1, 6, 2);
INSERT INTO pagamento_funcionario VALUES(2, 7, 3);
INSERT INTO pagamento_funcionario VALUES(3, 8, 4);
