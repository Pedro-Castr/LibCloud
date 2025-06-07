
-- Tabela de Livros
CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    foto VARCHAR(250) NOT NULL,
    isbn VARCHAR(20) UNIQUE NOT NULL,
    editora VARCHAR(100) NOT NULL,
    edicao VARCHAR(20) NOT NULL,
    ano_publicacao VARCHAR(4)
);

-- Tabela de Autores
CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

-- Relacionamento N:N entre livros e autores
CREATE TABLE livro_autor (
    livro_id INT,
    autor_id INT,
    PRIMARY KEY (livro_id, autor_id),
    FOREIGN KEY (livro_id) REFERENCES livros(id),
    FOREIGN KEY (autor_id) REFERENCES autores(id)
);

-- Tabela de Exemplares
CREATE TABLE exemplares (
    id INT AUTO_INCREMENT PRIMARY KEY,
    livro_id INT NOT NULL,
    numero_patrimonio VARCHAR(50) UNIQUE NOT NULL,
    estado_conservacao VARCHAR(100),
    localizacao_estante VARCHAR(100),
    FOREIGN KEY (livro_id) REFERENCES livros(id)
);

-- Tabela de Usuários
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(250) NOT NULL,
    senha VARCHAR(250) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(250) UNIQUE NOT NULL,
    matricula VARCHAR(50) NOT NULL,
    tipo ENUM('aluno', 'professor') NOT NULL,
    nivel INT NOT NULL DEFAULT '2' COMMENT '1=Super Administrador; 11=Administador; 21=Usuário',
    curso VARCHAR(100),
    statusRegistro INT NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo; 3=Bloqueado;'
);

-- Tabela de Empréstimos
CREATE TABLE emprestimos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    exemplar_id INT NOT NULL,
    data_emprestimo DATE NOT NULL,
    data_prevista_devolucao DATE NOT NULL,
    data_devolucao DATE,
    multa DECIMAL(5,2) DEFAULT 0.00,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (exemplar_id) REFERENCES exemplares(id)
);
