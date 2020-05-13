CREATE DATABASE IF NOT EXISTS minerva;
USE minerva;

/*CREATE TABLE sueldos (
id_sueldo   int auto_increment not null,
sueldo      int (200) not null,
cargo_sueldo  varchar (100)not null,
created_at      datetime DEFAULT NULL,
update_at       datetime DEFAULT NULL

CONSTRAINT pk_sueldos PRIMARY KEY (id_sueldo),
CONSTRAINT fk_cargo FOREIGN KEY (cargo_sueldo) REFERENCES cargos (nombre_cargo)


)ENGINE=InnoDB;*/

CREATE TABLE cargos (
id_cargo        int (200) auto_increment not null,
nombre_cargo   varchar (100) not null,
sueldo_cargo   int (200) not null,
perfil          text,
funciones       text,
created_at      datetime DEFAULT NULL,
update_at       datetime DEFAULT NULL,

CONSTRAINT pk_id_cargo PRIMARY KEY (id_cargo),
CONSTRAINT uni_nombre_cargo UNIQUE (nombre_cargo)


)ENGINE=InnoDB;


CREATE TABLE roles (
id_rol     int (200) auto_increment not null,
nombre_rol  varchar (20) not null,
descripcion text,
created_at    datetime DEFAULT NULL,
update_at     datetime DEFAULT NULL,

CONSTRAINT pk_roles PRIMARY KEY (id_rol),
CONSTRAINT unic_rol_nombre UNIQUE (nombre_rol)
)ENGINE=InnoDB;

CREATE TABLE empleados(
identificacion       int (20) not null,
nombres      varchar (50) not null,
apellidos    varchar (70) not null,
id_cargo_empleado  int (200) not null,
cargo_empleado        varchar  (100) not null,
sueldo_empleado      int (200) not null,
correo       varchar (200),
fecha_ingreso datetime not null,
fecha_retiro  datetime ,
created_at   datetime DEFAULT NULL,
update_at    datetime DEFAULT NULL,

CONSTRAINT pk_empleados PRIMARY KEY (identificacion),
CONSTRAINT fk_dato_empleados FOREIGN KEY (id_cargo_empleado) REFERENCES cargos (id_cargo)
)ENGINE=InnoDB;




CREATE TABLE usuarios (
id   int(200) auto_increment not null,
usuario     varchar (20) not null,
nombres     varchar (50) not null,
apellidos   varchar (100) not null,
correo      varchar (200) not null,
password  varchar (20) not null,
rol           int (200),
created_at    datetime DEFAULT NULL,
update_at     datetime DEFAULT NULL,
remember_token  varchar (255),

CONSTRAINT pk_usuarios PRIMARY KEY (id_usuario),
CONSTRAINT usuario_unic UNIQUE (usuario),
CONSTRAINT fk_rol_usuario FOREIGN KEY  (rol) REFERENCES roles (id_rol)


)ENGINE=InnoDB;

CREATE TABLE datos_nomina_empleado (
identificacion        int (20) not null primary key,
nombres_empleado      varchar (50) not null,
apellidos_empleado    varchar (70) not null,
salario_base          int (200) not null,
subsidio_transporte   int (100) not null,
dias_trabajados       int  (20) not null,
hora_extra_diurna  int  (20),
hora_extra_nocturna int (20),
hora_extra_diurna_dominical_festivo int (20),
hora_extra_nocturno_dominical_festivo int (20),
hora_dominical_festivo_nocturna int (20),
recargo_nocturno      int  (20),
recargo_dominical_festivo int (20),
comisiones            int (200),
bonificaciones        int (200),
total_devengado       int  (200) not null,
IBC                   int  (200)not null,
fondo_empleados       int  (200),
prestamos             int  (200),
descuentos_salud      int  (200)not null,
descuentos_pension    int  (200)not null,
total_descuentos      int  (200)not null,
cesantias             int  (200)not null,
prima                 int (200)not null,
vacaciones            int (200)not null,
intereses_cesantias   int (200) not null,
sueldo                int (200)not null,

CONSTRAINT fk_identificacion_empleado FOREIGN KEY (identificacion) REFERENCES empleados (identificacion)
)ENGINE=InnoDB;



/*QUERYS  UTILIZADOS PARA REFORMAR LA BASE DE DATOS*/

TABLA EMPLEADOS
ALTER TABLE empleados ADD CONSTRAINT tp_fk_documento FOREIGN KEY (Tipo_documento) REFERENCES tipo_documentos (codigo_tp);
ALTER TABLE empleados ADD CONSTRAINT nombre_fk_cargo FOREIGN KEY (cargo_empleado) REFERENCES cargos (nombre_cargo);
ALTER TABLE empleados ADD UNIQUE correo_empleado_unique (correo);
ALTER TABLE empleados ADD UNIQUE indice_nombre_empleado (nombres);
ALTER TABLE empleados ADD UNIQUE apellidos_indice_empleado (apellidos);
ALTER TABLE empleados ADD UNIQUE salario_indice_empleado (salario_empleado);



TABLA datos_nomina_empleado

ALTER TABLE datos_nomina_empleado ADD CONSTRAINT identificacion_fk_ FOREIGN KEY (identificacion) REFERENCES empleados (identificacion);
ALTER TABLE datos_nomina_empleado ADD CONSTRAINT nombres_fk_empleado FOREIGN KEY (nombres_empleado) REFERENCES empleados (nombres);
ALTER TABLE datos_nomina_empleado ADD CONSTRAINT apellidos_fk_empleado FOREIGN KEY (apellidos_empleado) REFERENCES empleados (apellidos);
ALTER TABLE datos_nomina_empleado ADD CONSTRAINT salario_fk_empleado FOREIGN KEY (salario_base) REFERENCES empleados (salario_empleado);


TABLA usuario
ALTER TABLE usuarios add CONSTRAINT fk_rol_usuario FOREIGN KEY (rol) REFERENCES roles (nombre_rol);

/*Script e la tabla Roles*/
INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion`, `created_at`, `update_at`) VALUES (NULL, 'Administrador', 'Derecho a todos los módulos del sistema, y a la creación de usuarios.', NULL, NULL);

/*Script e la tabla Usuario*/
INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombres`, `apellidos`, `correo`, `contraseña`, `rol`, `created_at`, `update_at`, `remember_token`) VALUES (NULL, 'admin', 'Jose David', 'Quintero Bernal', 'quinterobernaldavid@gmail.com', 'luci5610', 'Administrador', NULL, NULL, NULL);