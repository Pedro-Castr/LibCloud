
-- Tabela de Livros
CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    foto VARCHAR(250) NOT NULL,
    isbn VARCHAR(20) UNIQUE NOT NULL,
    editora VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    edicao VARCHAR(20) NOT NULL,
    ano_publicacao VARCHAR(4),
    numeroPatrimonio VARCHAR(10),
    estadoConservacao INT NOT NULL DEFAULT '1' COMMENT '1=Novo; 2=Semi Novo; 3= Velho',
    localizacaoEstante VARCHAR(100)
);

-- Tabela de Usuários
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(250) NOT NULL,
    senha VARCHAR(250) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(250) UNIQUE NOT NULL,
    matricula VARCHAR(50) NOT NULL,
    tipo INT NOT NULL DEFAULT '1' COMMENT '1=Aluno; 2=Professor',
    nivel INT NOT NULL DEFAULT '21' COMMENT '1=Super Administrador; 11=Administador; 21=Usuário',
    curso VARCHAR(100),
    statusRegistro INT NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo; 3=Bloqueado;'
);

-- Tabela de Empréstimos
CREATE TABLE emprestimos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    livro_id INT NOT NULL,
    data_emprestimo DATE NOT NULL,
    data_prevista_devolucao DATE NOT NULL,
    data_devolucao DATE,
    multa DECIMAL(5,2) DEFAULT 0.00,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (livro_id) REFERENCES livros(id)
);
