CREATE DATABASE  IF NOT EXISTS paola_webpage;
USE paola_webpage;

CREATE TABLE customers (
	id_customer INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(20),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sesiones_privadas (
	id_sesion INT AUTO_INCREMENT PRIMARY KEY, 
	id_customer INT NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    comentario TEXT,
    estado ENUM('pendiente','confirmada','cancelada') DEFAULT 'pendiente',
    foreign KEY (id_customer) REFERENCES customers(id_customer)
);

CREATE TABLE sesiones_grupales (
	id_grupal INT AUTO_INCREMENT PRIMARY KEY, 
	titulo VARCHAR (150) NOT NULL,
    descripcion TEXT,
	fecha DATE NOT NULL,
    hora TIME NOT NULL,
    modalidad ENUM ('presencial','online') DEFAULT 'online',
    lugar VARCHAR(100),
    cupo INT DEFAULT 10,
    estado ENUM('activa','completa','finalizada') DEFAULT 'activa'
);
    
CREATE TABLE inscripciones_grupales (
	id_inscripcion INT AUTO_INCREMENT PRIMARY KEY, 
    id_customer INT NOT NULL,
	id_grupal INT NOT NULL,
    fecha_inscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foreign KEY (id_customer) REFERENCES customers(id_customer),
    foreign KEY (id_grupal) REFERENCES  sesiones_grupales(id_grupal)
);

CREATE TABLE talleres (
	id_taller INT AUTO_INCREMENT PRIMARY KEY, 
	titulo VARCHAR (150) NOT NULL,
    descripcion TEXT,
	fecha DATE NOT NULL,
    hora TIME NOT NULL,
    modalidad ENUM ('presencial','online') DEFAULT 'online',
    lugar VARCHAR(100),
    duracion VARCHAR(50),
    precio DECIMAL(10,2),
    cupo INT DEFAULT 50,
    estado ENUM('activo','completo','finalizado') DEFAULT 'activo'
);
    
CREATE TABLE inscripciones_talleres (
	id_inscripcion INT AUTO_INCREMENT PRIMARY KEY, 
    id_customer INT NOT NULL,
	id_taller INT NOT NULL,
    fecha_inscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foreign KEY (id_customer) REFERENCES customers(id_customer),
    foreign KEY (id_taller) REFERENCES talleres(id_taller)
);










