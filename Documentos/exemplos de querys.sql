# Retorna os diretores da escola
select * from pessoa
inner join funcao on funcao_funcaoid = funcaoid
where funcaonome = 'Diretor';

# Retorna os professores vinculados a disciplinas
select * from pessoa
inner join funcao on funcao_funcaoid = funcaoid
inner join pessoa_disciplina on pessoa_pessoaid = pessoaid 
inner join disciplina on disciplinaid = disciplina_disciplinaid
where funcaonome = 'Professor';

# Retorna os alunos vinculados a disciplinas
select * from pessoa
inner join funcao on funcao_funcaoid = funcaoid
inner join pessoa_disciplina on pessoa_pessoaid = pessoaid 
inner join disciplina on disciplinaid = disciplina_disciplinaid
where funcaonome = 'Aluno';

# Retorna todos os usuarios com permissão de administrador
select * from usuario
inner join categoria on categoria_categoriaid = categoriaid
where categorianome = 'Administrador'

