# Retorna os diretores da escola
select * from pessoa
inner join funcao on funcao_id = funcao.id
where funcao.nome = 'Diretor';

# Retorna os professores vinculados a disciplinas
select * from pessoa
inner join funcao on funcao_id = funcao.id
inner join pessoa_disciplina on pessoa_id = pessoa.id 
inner join disciplina on disciplina.id = disciplina_id
where funcao.nome = 'Professor';

# Retorna os alunos vinculados a disciplinas
select * from pessoa
inner join funcao on funcao_id = funcao.id
inner join pessoa_disciplina on pessoa_id = pessoa.id 
inner join disciplina on disciplina.id = disciplina_id
where funcao.nome = 'Aluno';

# Retorna todos os usuarios com permissão de administrador
select * from usuario
inner join categoria on categoria_id = categoria.id
where categoria.nome = 'Administrador'

