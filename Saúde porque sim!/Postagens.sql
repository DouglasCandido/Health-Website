drop schema postagens;
create schema postagens;
use postagens;

create table Paginacao (

	codigoPostagem int auto_increment,
	titulo varchar(100) not null,
    conteudo varchar(1000) not null,
    primary key(codigoPostagem),
    imagem longblob 

); 