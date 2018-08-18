drop table if exists TB_BITACORA_AUDITORIA;

drop table if exists TB_CAT_DEPARTAMENTO;

drop table if exists TB_CAT_DESTINO_SUBSIDIO;

drop table if exists TB_CAT_DILIGENCIAS;

drop table if exists TB_CAT_MUNICIPIOS;

drop table if exists TB_CAT_PROYECTOS;

drop table if exists TB_CAT_RELACION_FAMILIAR;

drop table if exists TB_DESARROLLADORES;

drop table if exists TB_DIGITALIZACION;

drop table if exists TB_EXPEDIENTE;

drop table if exists TB_EXPEDIENTE_DILIGENCIA;

drop table if exists TB_EXPEDIENTE_REQUSITOS;

drop table if exists TB_INFORMACION_PERSONAS_INVOLUCRADAS;

drop table if exists TB_TIPO_REQUISITOS;

drop table if exists TB_REQUISITOS;

drop table if exists TB_ROLES;

drop table if exists TB_TIPO_INGRESO;

drop table if exists TB_UNIDAD_TRABAJO;

drop table if exists TB_USUARIOS;


create table TB_BITACORA_AUDITORIA
(
   ID_BITACORA          int not null auto_increment,
   ID_USUARIO           int not null,
   TIPO_ACCION          varchar(20) not null,
   DATO_ENTERIOR        varchar(200) not null,
   NUEVO_DATO           varchar(200) not null,
   FECHA_ACCION         date not null,
   primary key (ID_BITACORA)
);

alter table TB_BITACORA_AUDITORIA comment 'Contiene la bitacora de auditoría de las tranasacciones hech';


create table TB_CAT_DEPARTAMENTO
(
   ID_DEPARTAMENTO      int not null auto_increment,
   DESCRIPCION_DEPARTAMENTO varchar(100) not null,
   primary key (ID_DEPARTAMENTO)
);

alter table TB_CAT_DEPARTAMENTO comment 'Catálogo de Departamentos de Guatemala';


create table TB_CAT_DESTINO_SUBSIDIO
(
   ID_TIPO_SOILCITUD_SUBSIDIO int not null auto_increment,
   DESCRIPCION          varchar(100) not null,
   primary key (ID_TIPO_SOILCITUD_SUBSIDIO)
);

alter table TB_CAT_DESTINO_SUBSIDIO comment 'Destino del subsidio (ampliación, compra terreno, construcci';








create table TB_CAT_MUNICIPIOS
(
   ID_MUNICIPIO         int not null,
 
   DESCRIPCION_MUNICIPIO varchar(100) not null,
     ID_DEPARTAMENTO      int not null,
   primary key (ID_MUNICIPIO)
);

alter table TB_CAT_MUNICIPIOS comment 'Catalogo de Municipios por Departamentos de guatemala';


create table TB_CAT_PROYECTOS
(
   ID_PROYECTO          int not null auto_increment,
   ID_MUNICIPIO_PROYECTO int not null,
   ID_DESARROLLADOR     int not null,
   NOMBRE_PROYECTO      varchar(200) not null,
   LONGITUD_PROYECTO    long not null,
   LATITUD_PROYECTO     long not null,
   MONTO_APROXIMADO_PROYECTO decimal not null,
   MONTO_SOLICITADO_PROYECTO decimal not null,
   FECHA_INICIO_TRABAJOS date not null,
   INFORMACION_ADICIONAL varchar(400) not null,
   primary key (ID_PROYECTO)
);

alter table TB_CAT_PROYECTOS comment 'Contiene los nombres y datos generales de los proyectos que ';


create table TB_CAT_RELACION_FAMILIAR
(
   ID_RELACION_FAMILIAR int not null auto_increment,
   DESCRIPCION          varchar(50) not null,
   primary key (ID_RELACION_FAMILIAR)
);

alter table TB_CAT_RELACION_FAMILIAR comment 'informacion de la relacion familiar
Solicitante
';


create table TB_DESARROLLADORES
(
   ID_DESARROLLADOR     int not null auto_increment,
   NOMBRE_DESARROLLADOR varchar(200) not null,
   NIT                  varchar(10) not null,
   DIRECCION_EMPRESA    varchar(200) not null,
   CORREO_ELECTRONICO   varchar(20) not null,
   TELEFONO             varchar(8) not null,
   primary key (ID_DESARROLLADOR)
);

alter table TB_DESARROLLADORES comment 'Catalogo de Desarrolladores que llevaran a cabo  proyectos, ';


create table TB_DIGITALIZACION
(
   ID_DOCUMENTO_DIGITALIZADO int not null auto_increment,
    ID_INFORMACION_SOLICITANTE              int not null,
    ID_TIPO_DIGITALIZACION			int not null,
   PATH_ARCHIVO       varchar(200) not null,
   primary key (ID_DOCUMENTO_DIGITALIZADO)
);

alter table TB_DIGITALIZACION comment 'lleva el control de todos los archivos que han sido digitali';

create table TB_EXPEDIENTE
(
   ID_NUMERO_EXPEDIENTE    int not null auto_increment,
   ID_TIPO_INGRESO      int not null,
   ID_TIPO_SOILCITUD_SUBSIDIO int not null,
   CODIGO_EXPEDIENTE     varchar(10) not null unique,
   FECHA_REGISTRO       date not null,
   OBSERVACIONES_EXPEDIENTE varchar(200) not null,
   MONTO_SOLICITADO     decimal not null,
   LONGITUD_PROYECTO    long not null,
   LATITUD_PROYECTO     long not null,
   primary key (ID_NUMERO_EXPEDIENTE)
);

alter table TB_EXPEDIENTE comment 'Tabla principal de ingreso y control de expediente, cada exp';


create table TB_EXPEDIENTE_DILIGENCIA
(
   ID_NUMERO_EXPEDIENTE    int not null,
   ID_USUARIO            int not null,
     ID_UNIDAD_TRABAJO    int not null,
   ID_DILIGENCIA_EXPEDIENTE int not null auto_increment,
   FECHA_DILIGENCIA     date not null,
   NOMBRE_ARCHIVO_DIGITALIZADO varchar(500) not null,
   ESTADO 				char(1) not null,
   primary key (ID_DILIGENCIA_EXPEDIENTE)
);

alter table TB_EXPEDIENTE_DILIGENCIA comment 'Control de todas las diligencias que se realicen al epxedien';


create table TB_EXPEDIENTE_REQUSITOS
(
   ID_EXPEDIENTE_REQUISITO int not null auto_increment,
   ID_REQUISITO         int not null,
   ID_USUARIO			int not null,
   ID_NUMERO_EXPEDIENTE    int not null,
   FECHA_PRESENTACION   date not null,
   ACEPTADO             char(1) not null,
   MOTIVO_RECHAZO       varchar(200) not null,
   primary key (ID_EXPEDIENTE_REQUISITO)
);

alter table TB_EXPEDIENTE_REQUSITOS comment 'Detalle de los requisitos por expediente, se puede chequear ';


create table TB_INFORMACION_PERSONAS_INVOLUCRADAS
(
   ID_INFORMACION_SOLICITANTE int not null auto_increment,
   ID_RELACION_FAMILIAR int null,
   ID_NUMERO_EXPEDIENTE int not null,
   NUMERO_DOCUMENTO     varchar(13) not null comment 'Entre los requisitos es ser guatemalteco, por ende, debe poseer DPI y no pasaporte u otro tipo de documento',
   NOMBRE1              varchar(50) not null,
   NOMBRE2              varchar(50) null,
   NOMBRE3				varchar(50) null,
   APELLIDO1            varchar(50) not null,
   APELLIDO2            varchar(50) null,
   APELLIDOCASADA       varchar(50) null,
   SUELDO				decimal not null,
   FECHA_NACIMIENTO     date not null,
   DIRECCION            varchar(100) not null,
   TELEFONO             varchar(8) not null,
   primary key (ID_INFORMACION_SOLICITANTE)
);

alter table TB_INFORMACION_PERSONAS_INVOLUCRADAS comment 'informacion completa de los solicitantes y adicionalmente el';

create table TB_TIPO_REQUISITOS
(
   ID_TIPO_REQUISITO         int not null auto_increment,
   DESCRIPCION_REQUISITO varchar(200) not null,
   primary key (ID_TIPO_REQUISITO)
);

alter table TB_TIPO_REQUISITOS comment 'Catálogo de requisitos necesarios en cada uno de los tipos d';


create table TB_REQUISITOS
(
   ID_REQUISITO         int not null auto_increment,
   ID_TIPO_REQUISITO	int not null comment 'aca se pone si es juridico, financiero o social',
   ID_TIPO_INGRESO      int not null comment 'individual o grupal',
   DESCRIPCION_REQUISITO varchar(200) not null,
   OBLIGATORIO          char(1) not null,
   primary key (ID_REQUISITO)
);

alter table TB_REQUISITOS comment 'Catálogo de requisitos necesarios en cada uno de los tipos d';




create table TB_ROLES
(
   ID_ROL               int not null auto_increment,
   DESCRIPCION_ROL      varchar(30) not null,
   primary key (ID_ROL)
);

alter table TB_ROLES comment 'Información de los roles por usuario, con esto se tendrá un ';


create table TB_TIPO_INGRESO
(
   ID_TIPO_INGRESO      int not null auto_increment,
   DESCRIPCION_INGRESO  varchar(100) not null,
   primary key (ID_TIPO_INGRESO)
);

alter table TB_TIPO_INGRESO comment 'Tramite personal
Tramite en grupo
Solicitud por ';





create table TB_UNIDAD_TRABAJO
(
   ID_UNIDAD_TRABAJO    int not null auto_increment,
   DESCRIPCION_UNIDAD   varchar(200) not null,
   primary key (ID_UNIDAD_TRABAJO)
);

alter table TB_UNIDAD_TRABAJO comment 'Catalogo de unidades donde trabaja el empleado:
ventan';




create table TB_USUARIOS
(
   ID_USUARIO           int not null auto_increment,
   LOGIN                varchar(25) not null,
   ID_ROL               int not null,
   ID_UNIDAD            int not null,
   NOMBRE               varchar(150) not null,
   APELLIDO				varchar(150) not null,
   
   FECHA_NACIMIENTO		date not null,
   GENERO				char(1) not null,
   EMAIL				varchar(70) not null,
   CLAVE                varchar(150) not null,
   primary key (ID_USUARIO)
);

create table TB_TIPO_DIGITALIZACION
(
   ID_TIPO_DIGITALIZACION int not null auto_increment,
   DESCRIPCION   varchar(50) not null,
   primary key (ID_TIPO_DIGITALIZACION)
);

alter table TB_USUARIOS comment 'Catalogo de usuarios, registro de roles y unidad de trabajo
';

alter table TB_DIGITALIZACION add constraint FK_REFERENCE_TIPO foreign key (ID_TIPO_DIGITALIZACION)
      references TB_TIPO_DIGITALIZACION(ID_TIPO_DIGITALIZACION);

alter table TB_BITACORA_AUDITORIA add constraint FK_REFERENCE_24 foreign key (ID_USUARIO)
      references TB_USUARIOS (ID_USUARIO);

alter table TB_CAT_MUNICIPIOS add constraint FK_REFERENCE_20 foreign key (ID_DEPARTAMENTO)
      references TB_CAT_DEPARTAMENTO (ID_DEPARTAMENTO);

alter table TB_CAT_PROYECTOS add constraint FK_REFERENCE_21 foreign key (ID_MUNICIPIO_PROYECTO)
      references TB_CAT_MUNICIPIOS (ID_MUNICIPIO);

alter table TB_CAT_PROYECTOS add constraint FK_REFERENCE_22 foreign key (ID_DESARROLLADOR)
      references TB_DESARROLLADORES (ID_DESARROLLADOR);

alter table TB_DIGITALIZACION add constraint FK_REFERENCE_13 foreign key ( ID_INFORMACION_SOLICITANTE)
      references TB_INFORMACION_PERSONAS_INVOLUCRADAS ( ID_INFORMACION_SOLICITANTE);

alter table TB_EXPEDIENTE add constraint FK_REFERENCE_3 foreign key (ID_TIPO_INGRESO)
      references TB_TIPO_INGRESO (ID_TIPO_INGRESO);

alter table TB_EXPEDIENTE add constraint FK_TB_EXPED_REFERENCE_TB_CAT_D2 foreign key (ID_TIPO_SOILCITUD_SUBSIDIO)
      references TB_CAT_DESTINO_SUBSIDIO (ID_TIPO_SOILCITUD_SUBSIDIO);

alter table TB_EXPEDIENTE_DILIGENCIA add constraint FK_TB_EXPED_REFERENCE_TB_EXPED23 foreign key (ID_NUMERO_EXPEDIENTE)
      references TB_EXPEDIENTE (ID_NUMERO_EXPEDIENTE);

alter table TB_EXPEDIENTE_DILIGENCIA add constraint FK_TB_EXPED_REFERENCE_TB_USUAR1 foreign key (ID_USUARIO)
      references TB_USUARIOS (ID_USUARIO);
      
alter table TB_REQUISITOS add constraint FK_REFERENCE_RQ foreign key (ID_TIPO_REQUISITO)
      references TB_TIPO_REQUISITOS (ID_TIPO_REQUISITO);

alter table TB_EXPEDIENTE_REQUSITOS add constraint FK_REFERENCE_7 foreign key (ID_REQUISITO)
      references TB_REQUISITOS (ID_REQUISITO);

alter table TB_EXPEDIENTE_REQUSITOS add constraint FK_TB_EXPED_REFERENCE_TB_USUAR2 foreign key (ID_USUARIO)
      references TB_USUARIOS (ID_USUARIO);

alter table TB_EXPEDIENTE_REQUSITOS add constraint FK_TB_EXPED_REFERENCE_TB_EXPED2 foreign key (ID_NUMERO_EXPEDIENTE)
      references TB_EXPEDIENTE (ID_NUMERO_EXPEDIENTE);

alter table TB_INFORMACION_PERSONAS_INVOLUCRADAS add constraint FK_REFERENCE_15 foreign key (ID_RELACION_FAMILIAR)
      references TB_CAT_RELACION_FAMILIAR (ID_RELACION_FAMILIAR);
      
alter table TB_INFORMACION_PERSONAS_INVOLUCRADAS add constraint FK_REFERENCE_EXPE foreign key (ID_NUMERO_EXPEDIENTE)
      references TB_EXPEDIENTE (ID_NUMERO_EXPEDIENTE);

alter table TB_REQUISITOS add constraint FK_REFERENCE_4 foreign key (ID_TIPO_INGRESO)
      references TB_TIPO_INGRESO (ID_TIPO_INGRESO);

alter table TB_USUARIOS add constraint FK_REFERENCE_1 foreign key (ID_ROL)
      references TB_ROLES (ID_ROL);

alter table TB_USUARIOS add constraint FK_REFERENCE_6 foreign key (ID_UNIDAD)
      references TB_UNIDAD_TRABAJO (ID_UNIDAD_TRABAJO);
      
      
      
      INSERT INTO `proyecto`.`tb_cat_departamento`
(`ID_DEPARTAMENTO`,
`DESCRIPCION_DEPARTAMENTO`)
VALUES


(1,"Guatemala"),
(2, "Sacatepéquez"),
(3, "Chimaltenango"),
(4,"El Progreso"),
(5, "Escuintla"),
(6,"Santa Rosa"),
(7,"Sololá"),
(8,"Totonicapán"),
(9,"Quetzaltenango"),
(10, "Suchitepéquez"),
(11, "Retalhuleu"),
(12, "San Marcos"),
(13, "Huehuetenango"),
(14, "Quiché"),
(15,"Baja Verapaz"),
(16,"Alta Verapaz"),
(17,"Peten"),
(18,"Izabal"),
(19,"Zacapa"),
(20,"Chiquimula"),
(21,"Jalapa"),
(22, "Jutiapa")

INSERT INTO `proyecto`.`tb_cat_municipios`
(`ID_MUNICIPIO`,
`DESCRIPCION_MUNICIPIO`,
`ID_DEPARTAMENTO`)
VALUES
(1,"Guatemala" ,1),
(2,"Santa Catarina Pinula" ,1),
(3,"San José Pinula" ,1),
(4,"San José Del Golfo" ,1),
(5,"Palencia" ,1),
(6,"Chinautla" ,1),
(7,"San Pedro Ayampuc" ,1),
(8,"Mixco" ,1),
(9,"San Pedro Sacatepéquez" ,1),
(10,"San Juan Sacatepéquez" ,1),
(11,"San Raymundo" ,1),
(12,"Chuarrancho" ,1),
(13,"Fraijanes" ,1),
(14,"Amatitlán" ,1),
(15,"Villa Nueva" ,1),
(16,"Villa Canales" ,1),
(17,"San Miguel Petapa" ,1),
(18,"Alotenango" ,2),
(19,"Antigua Guatemala" ,2),
(20,"Ciudad Vieja" ,2),
(21,"Jocotenango" ,2),
(22,"Magdalena Milpas Altas" ,2),
(23,"Pastores" ,2),
(24,"San Antonio Aguas Calientes" ,2),
(25,"San Bartolomé Milpas Altas" ,2),
(26,"San Lucas Sacatepéquez" ,2),
(27,"San Miguel Dueñas" ,2),
(28,"Santa Catarina Barahona" ,2),
(29,"Santa Lucía Milpas Altas" ,2),
(30,"Santa María De Jesús" ,2),
(31,"Santiago Sacatepéquez" ,2),
(32,"Santo Domingo Xenacoj" ,2),
(33,"Sumpango" ,2),
(34,"Chimaltenango" ,3),
(35,"San José Poaquíl" ,3),
(36,"San Martín Jilotepeque" ,3),
(37,"San Juan Comalapa" ,3),
(38,"Santa Apolonia" ,3),
(39,"Tecpán Guatemala" ,3),
(40,"Patzún" ,3),
(41,"Pochuta" ,3),
(42,"Patzicía" ,3),
(43,"Santa Cruz Balanyá" ,3),
(44,"Acatenango" ,3),
(45,"San Pedro Yepocapa" ,3),
(46,"San Andrés Itzapa" ,3),
(47,"Parramos" ,3),
(48,"Zaragoza" ,3),
(49,"El Tejar" ,3),
(50,"Guastatoya" ,4),
(51,"Morazán" ,4),
(52,"San Agustín Acasaguastlán" ,4),
(53,"San Cristóbal Acasaguastlán" ,4),
(54,"El Jícaro" ,4),
(55,"Sansare" ,4),
(56,"Sanarate" ,4),
(57,"San Antonio La Paz" ,4),
(58,"Escuintla" ,5),
(59,"Guanagazapa" ,5),
(60,"Iztapa" ,5),
(61,"La Democracia" ,5),
(62,"La Gomera" ,5),
(63,"Masagua" ,5),
(64,"Nueva Concepción" ,5),
(65,"Palín" ,5),
(66,"Puerto San José" ,5),
(67,"San Vicente Pacaya" ,5),
(68,"Santa Lucía Cotzumalguapa" ,5),
(69,"Siquinalá" ,5),
(70,"Tiquisate" ,5),
(71,"Cuilapa" ,6),
(72,"Casillas" ,6),
(73,"Chiquimulilla" ,6),
(74,"Guazacapán" ,6),
(75,"Nueva Santa Rosa" ,6),
(76,"Oratorio" ,6),
(77,"Pueblo Nuevo Viñas" ,6),
(78,"San Juan Tecuaco" ,6),
(79,"San Rafaél Las Flores" ,6),
(80,"Santa Cruz Naranjo" ,6),
(81,"Santa María Ixhuatán" ,6),
(82,"Santa Rosa De Lima" ,6),
(83,"Taxisco" ,6),
(84,"Barberena" ,6),
(85,"Sololá" ,7),
(86,"Concepción" ,7),
(87,"Nahualá" ,7),
(88,"Panajachel" ,7),
(89,"San Andrés Semetabaj" ,7),
(90,"San Antonio Palopó" ,7),
(91,"San José Chacayá" ,7),
(92,"San Juan La Laguna" ,7),
(93,"San Lucas Tolimán" ,7),
(94,"San Marcos La Laguna" ,7),
(95,"San Pablo La Laguna" ,7),
(96,"San Pedro La Laguna" ,7),
(97,"Santa Catarina Ixtahuacan" ,7),
(98,"Santa Catarina Palopó" ,7),
(99,"Santa Clara La Laguna" ,7),
(100,"Santa Cruz La Laguna" ,7),
(101,"Santa Lucía Utatlán" ,7),
(102,"Santa María Visitación" ,7),
(103,"Santiago Atitlán" ,7),
(104,"Totonicapán" ,8),
(105,"Momostenango" ,8),
(106,"San Andrés Xecul" ,8),
(107,"San Bartolo" ,8),
(108,"San Cristóbal Totonicapán" ,8),
(109,"San Francisco El Alto" ,8),
(110,"Santa Lucía La Reforma" ,8),
(111,"Santa María Chiquimula" ,8),
(112,"Almolonga" ,9),
(113,"Cabricán" ,9),
(114,"Cajolá" ,9),
(115,"Cantel" ,9),
(116,"Coatepeque" ,9),
(117,"Colomba" ,9),
(118,"Concepción Chiquirichapa" ,9),
(119,"El Palmar" ,9),
(120,"Flores Costa Cuca" ,9),
(121,"Génova" ,9),
(122,"Huitán" ,9),
(123,"La Esperanza" ,9),
(124,"Olintepeque" ,9),
(125,"San Juan Ostuncalco" ,9),
(126,"Palestina De Los Altos" ,9),
(127,"Quetzaltenango" ,9),
(128,"Salcajá" ,9),
(129,"San Carlos Sija" ,9),
(130,"San Francisco La Unión" ,9),
(131,"San Martín Sacatepéquez" ,9),
(132,"San Mateo" ,9),
(133,"San Miguel Sigüilá" ,9),
(134,"Sibilia" ,9),
(135,"Zunil" ,9),
(136,"Mazatenango" ,10),
(137,"Chicacao" ,10),
(138,"Cuyotenango" ,10),
(139,"Patulul" ,10),
(140,"Pueblo Nuevo" ,10),
(141,"Río Bravo" ,10),
(142,"Samayac" ,10),
(143,"San Antonio" ,10),
(144,"San Bernardino" ,10),
(145,"San José El Ídolo" ,10),
(146,"San Francisco Zapotitlán" ,10),
(147,"San Gabriel" ,10),
(148,"San Juan Bautista" ,10),
(149,"San Lorenzo" ,10),
(150,"San Miguel Panán" ,10),
(151,"San Pablo Jocopilas" ,10),
(152,"Santa Barbara" ,10),
(153,"Santo Domingo" ,10),
(154,"Santo Tomas La Unión" ,10),
(155,"Zunilito" ,10),
(156,"San José La Máquina" ,10),
(157,"Champerico" ,11),
(158,"El Asintal" ,11),
(159,"Nuevo San Carlos" ,11),
(160,"Retalhuleu" ,11),
(161,"San Andrés Villa Seca" ,11),
(162,"San Martín Zapotitlán" ,11),
(163,"San Felipe" ,11),
(164,"San Sebastián" ,11),
(165,"Santa Cruz Muluá" ,11),
(166,"San Marcos" ,12),
(167,"Ayutla" ,12),
(168,"Catarina" ,12),
(169,"Comitancillo" ,12),
(170,"Concepción Tutuapa" ,12),
(171,"El Quetzal" ,12),
(172,"El Rodeo" ,12),
(173,"El Tumbador" ,12),
(174,"Ixchiguán" ,12),
(175,"La Reforma" ,12),
(176,"Malacatán" ,12),
(177,"Nuevo Progreso" ,12),
(178,"Ocós" ,12),
(179,"Pajapita" ,12),
(180,"Esquipulas Palo Gordo" ,12),
(181,"San Antonio Sacatepéquez" ,12),
(182,"San Cristóbal Cucho" ,12),
(183,"San José Ojetenam" ,12),
(184,"San Lorenzo" ,12),
(185,"San Miguel Ixtahuacán" ,12),
(186,"San Pablo" ,12),
(187,"San Pedro Sacatepéquez" ,12),
(188,"San Rafaél Pie De La Cuesta" ,12),
(189,"Sibinal" ,12),
(190,"Sipacapa" ,12),
(191,"Tacaná" ,12),
(192,"Tajumulco" ,12),
(193,"Tejutla" ,12),
(194,"Río Blanco" ,12),
(195,"La Blanca" ,12),
(196,"Aguacatán" ,13),
(197,"Chiantla" ,13),
(198,"Colotenango" ,13),
(199,"Concepción Huista" ,13),
(200,"Cuilco" ,13),
(201,"Huehuetenango" ,13),
(202,"Jacaltenango" ,13),
(203,"La Democracia" ,13),
(204,"La Libertad" ,13),
(205,"Malacatancito" ,13),
(206,"Nentón" ,13),
(207,"San Antonio Huista" ,13),
(208,"San Gaspar Ixchil" ,13),
(209,"San Ildefonso Ixtahuacán" ,13),
(210,"San Juan Atitán" ,13),
(211,"San Juan Ixcoy" ,13),
(212,"San Mateo Ixtatán" ,13),
(213,"San Miguel Acatán" ,13),
(214,"San Pedro Necta" ,13),
(215,"San Pedro Soloma" ,13),
(216,"San Rafael La Independencia" ,13),
(217,"San Rafael Petzal" ,13),
(218,"San Sebastián Coatán" ,13),
(219,"San Sebastián Huehuetenango" ,13),
(220,"Santa Ana Huista" ,13),
(221,"Santa Bárbara" ,13),
(222,"Santa Cruz Barillas" ,13),
(223,"Santa Eulalia" ,13),
(224,"Santiago Chimaltenango" ,13),
(225,"Tectitán" ,13),
(226,"Todos Santos Cuchumatán" ,13),
(227,"Unión Cantinil" ,13),
(228,"Santa Cruz Del Quiché" ,14),
(229,"Canillá" ,14),
(230,"Chajul" ,14),
(231,"Chicamán" ,14),
(232,"Chiché" ,14),
(233,"Chichicastenango" ,14),
(234,"Chinique" ,14),
(235,"Cunén" ,14),
(236,"Ixcán" ,14),
(237,"Joyabaj" ,14),
(238,"Nebaj" ,14),
(239,"Pachalum" ,14),
(240,"Patzité" ,14),
(241,"Sacapulas" ,14),
(242,"San Andrés Sajcabajá" ,14),
(243,"San Antonio Ilotenango" ,14),
(244,"San Bartolomé Jocotenango" ,14),
(245,"San Juan Cotzal" ,14),
(246,"San Pedro Jocopilas" ,14),
(247,"Uspantán" ,14),
(248,"Zacualpa" ,14),
(249,"Cubulco" ,15),
(250,"Santa Cruz El Chol" ,15),
(251,"Granados" ,15),
(252,"Purulhá" ,15),
(253,"Rabinal" ,15),
(254,"Salamá" ,15),
(255,"San Miguel Chicaj" ,15),
(256,"San Jerónimo" ,15),
(257,"Cobán" ,16),
(258,"San Pedro Carchá" ,16),
(259,"San Juan Chamelco" ,16),
(260,"San Cristóbal Verapaz" ,16),
(261,"Tactic" ,16),
(262,"Tucurú" ,16),
(263,"Tamahú" ,16),
(264,"Panzós" ,16),
(265,"Senahú" ,16),
(266,"Cahabón" ,16),
(267,"Lanquín" ,16),
(268,"Chahal" ,16),
(269,"Fray Bartolomé De Las Casas" ,16),
(270,"Chisec" ,16),
(271,"Santa Cruz Verapaz" ,16),
(272,"Santa Catalina La Tinta" ,16),
(273,"Raxruhá" ,16),
(274,"Dolores" ,17),
(275,"San Benito" ,17),
(276,"Flores" ,17),
(277,"San Francisco" ,17),
(278,"La Libertad" ,17),
(279,"San José" ,17),
(280,"Melchor De Mencos" ,17),
(281,"San Luis" ,17),
(282,"Poptún" ,17),
(283,"Santa Ana" ,17),
(284,"San Andrés" ,17),
(285,"Sayaxché" ,17),
(286,"El Chal" ,17),
(287,"Puerto Barrios" ,18),
(288,"Livingston" ,18),
(289,"El Estor" ,18),
(290,"Morales" ,18),
(291,"Los Amates" ,18),
(292,"Cabañas" ,19),
(293,"Estanzuela" ,19),
(294,"Gualán" ,19),
(295,"Huité" ,19),
(296,"La Unión" ,19),
(297,"Río Hondo" ,19),
(298,"San Diego" ,19),
(299,"Teculután" ,19),
(300,"Usumatlán" ,19),
(301,"Zacapa" ,19),
(302,"San Jorge" ,19),
(303,"Chiquimula" ,20),
(304,"Camotán" ,20),
(305,"Concepción Las Minas" ,20),
(306,"Esquipulas" ,20),
(307,"Ipala" ,20),
(308,"Jocotán" ,20),
(309,"Olopa" ,20),
(310,"Quezaltepeque" ,20),
(311,"San José La Arada" ,20),
(312,"San Juan Ermita" ,20),
(313,"San Jacinto" ,20),
(314,"Jalapa" ,21),
(315,"San Pedro Pinula" ,21),
(316,"San Luis Jilotepeque" ,21),
(317,"San Manuel Chaparrón" ,21),
(318,"San Carlos Alzatate" ,21),
(319,"Monjas" ,21),
(320,"Mataquescuintla" ,21),
(321,"Jutiapa" ,22),
(322,"Agua Blanca" ,22),
(323,"Asunción Mita" ,22),
(324,"Atescatempa" ,22),
(325,"Comapa" ,22),
(326,"Conguaco" ,22),
(327,"El Adelanto" ,22),
(328,"El Progreso" ,22),
(329,"Jalpatagua" ,22),
(330,"Jeréz" ,22),
(331,"Moyuta" ,22),
(332,"Pasaco" ,22),
(333,"Quesada" ,22),
(334,"San José Acatempa" ,22),
(335,"Santa Catarina Mita" ,22),
(336,"Yupiltepeque" ,22),
(337,"Zapotitlán" ,22)





INSERT INTO `proyecto`.`tb_usuarios`
(
`LOGIN`,
`ID_ROL`,
`ID_UNIDAD`,
`NOMBRE`,
`APELLIDO`,
`FECHA_NACIMIENTO`,
`GENERO`,
`EMAIL`,
`CLAVE`)
VALUES
(
"xol_b",
3,
5,
"Bryan Josue",
"Xol Muñoz",
"1998/01/25",
"M",
"xolbryan@gmail.com",
"$2y$12$vC5bPQKiOOzShC5RANd8XO6TdADgXXrEHMaz7iJTFCEs/SJryUc0W")/*teamokely*/;

INSERT INTO `proyecto`.`tb_usuarios`
(
`LOGIN`,
`ID_ROL`,
`ID_UNIDAD`,
`NOMBRE`,
`APELLIDO`,
`FECHA_NACIMIENTO`,
`GENERO`,
`EMAIL`,
`CLAVE`)
VALUES
(
"ke_nlm",
1,
7,
"Kevin Noé",
"Lemus Menéndez",
"1997/06/16",
"M",
"kevinlemus34@gmail.com",
"$2y$12$LcBsI4bMRngxoFMOPZQ1oeH4uMUc2N89K4ApRoWoM8Gmcr50Aw..W")/*gokusuper*/,(
"lmendez",
2,
5,
"Luis Fernando",
"Mendez Salguero",
"1996/07/17",
"M",
"lmendez@gmail.com",
"$2y$12$zHh0iqAJsBExXS4hiu0/e.V4gZzmcwAHjBmD/Z7u7UoCIGV2bRil.")/*aniteamo*/;




INSERT INTO `proyecto`.`tb_roles`
(
`DESCRIPCION_ROL`)
VALUES
(
"Administrador");

INSERT INTO `proyecto`.`tb_roles`
(
`DESCRIPCION_ROL`)
VALUES
(
"Usuario");

INSERT INTO `proyecto`.`tb_roles`
(
`DESCRIPCION_ROL`)
VALUES
(
"Invitado");




INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(1,
'Direccion General');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(2,
'Gerencia Financiera');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(3,
'Auxiliaturas');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(4,
'Recursos Humanos y Juridico');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(5,
'Contabilidad y Presupuesto');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(6,
'Mercadotecnia y Publicidad');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(7,
'Equipo Tecnico e Informatica');

INSERT INTO `proyecto`.`tb_cat_destino_subsidio`
(
`DESCRIPCION`)
VALUES
(
"Ampliación"),("Comprar Terreno"),("Construcción");

INSERT INTO `proyecto`.`tb_tipo_ingreso`
(
`DESCRIPCION_INGRESO`)
VALUES
("Tramite Personal"), ("Tramite en Grupo");



INSERT INTO `proyecto`.`tb_tipo_digitalizacion`
(
`DESCRIPCION`)
VALUES
("Foto de Perfil"), ("Antecedentes");

INSERT INTO `proyecto`.`tb_cat_relacion_familiar`
(
`DESCRIPCION`)
VALUES
("Hijo"),("Tia"),("Tio"),("Hermano"),("Hermana"),("Hija");

INSERT INTO `proyecto`.`tb_desarrolladores`
(
`NOMBRE_DESARROLLADOR`,
`NIT`,
`DIRECCION_EMPRESA`,
`CORREO_ELECTRONICO`,
`TELEFONO`)
VALUES
("Constructora El Sol","12345678","Jutiapa,Guatemala","elsol@gmail.com","78444995"),("Constructora El Pilar","87654321","Guatemala,Guatemala","pilar@gmail.com","78442069");





ALTER TABLE tb_informacion_personas_involucradas MODIFY FECHA_NACIMIENTO date;
