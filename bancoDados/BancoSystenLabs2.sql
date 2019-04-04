create database systenlab;
use systenlab;
 CREATE TABLE Reserva
 (
 id_Reserva integer NOT NULL AUTO_INCREMENT,
 cod_lab int(15),
 hora_inic time,
 inic_res date,
 fim_res date,
nomeReserva varchar(100),
hora_fim time,
 PRIMARY KEY(id_Reserva)
 );
select * from Reserva;

/* drop table Reserva;*/
 /*
 CREATE TABLE Disciplina
 (
 id_Disciplina integer NOT NULL AUTO_INCREMENT,
 nome varchar(100),
 idProf  int(15),
 idReserva integer,
 PRIMARY KEY(id_Disciplina),
 CONSTRAINT fk_DisRes FOREIGN KEY (idReserva) REFERENCES Reserva (id_Reserva)

 );
 
 insert into Disciplina(nome) values ('Matematica Discreta'),('Logica Matematica'),('Programação Orientada a Objeto I'),('Filosofia de educação'),('Banco de Dados I'),('Gestão de Pessoas');
*/
 create table professor
 (
 
 id_professor integer NOT NULL AUTO_INCREMENT,
 nome_professor varchar(50),
 senha_professor varchar(20),
 nivelAcesso integer(1),
 PRIMARY KEY(id_professor)
 );
 
 insert into professor(nome_professor,senha_professor,nivelAcesso) values ('professor1','senha1','1'),('professor2','senha2','1'),('professor3','senha3','2');
 
 
/*DELETE FROM professor
WHERE id_professor = 3;
*/ 
 CREATE TABLE Laboratorio
 (
 id_Laboratorio integer NOT NULL AUTO_INCREMENT,
 nome varchar(5),
 descricao varchar(50),
 num_maq_ope  integer(3),
 num_maq_nor  integer(3),
 PRIMARY KEY(id_Laboratorio)
 );
 
 insert into Laboratorio(nome,descricao,num_maq_ope,num_maq_nor) values('Q201','Laboratorio de Informatica','35','40'),('Q202','Laboratorio de Hardware','2','2'),('Q207','Laboratorio de Programação','18','25'),('Q208','Laboratori de Desenvolvimento de Software','21','25'),('Q209','Laboratorio de Multimidia e Software Livre','20','25'),('Q210','Laboratorio de Informatica','20','20');
 
 
 
 CREATE TABLE Hardware
 (
id_Hardware integer NOT NULL AUTO_INCREMENT,
 descricao text(100),
 Versao varchar(50),
 nome_Hardware text(50),
 id_Laboratorio integer,
 PRIMARY KEY(id_Hardware),
 CONSTRAINT fk_hwLab FOREIGN KEY (id_Laboratorio) REFERENCES Laboratorio (id_Laboratorio)
);
  
   CREATE TABLE Software
   (
 id_Software integer NOT NULL AUTO_INCREMENT,
 Versao varchar(50),
 descricao text(100),
 nome_Software text(100),
 id_Laboratorio integer,
 PRIMARY KEY(id_Software),
 CONSTRAINT fk_sofLab FOREIGN KEY (id_Laboratorio) REFERENCES Laboratorio (id_Laboratorio)
);
    select * from Software;
    
  
     create table swLab(
 id_lab integer,
 id_soft integer,
 constraint PK_swLab primary key(id_lab,id_soft),
  constraint FK_swLab2 foreign key(id_lab) references Laboratorio(id_Laboratorio),
  constraint fk_swlab3 foreign key(id_soft) references Software(id_Software)
);
 create table hwLab(
 id_lab integer,
 id_hard integer,
 constraint PK_hwLab primary key(id_lab,id_hard),
  constraint FK_hwLab2 foreign key(id_lab) references Laboratorio(id_Laboratorio),
  constraint fk_hwlab3 foreign key(id_hard) references Hardware(id_Hardware)
);


/*GRANT ALL ON BancoSistema TO 'ROOT'@'LOCALHOST' IDENTIFIED BY 'fragataC-110';*/
    /*SHOW TABLES;*/

/*drop database systenlab;*/