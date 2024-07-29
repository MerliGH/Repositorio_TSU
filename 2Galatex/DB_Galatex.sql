-- Active: 1696823169726@@localhost@3306@proyectotextil

------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------
/*   / \\____/\
    (   -  u  - )                  ¡¡Bienvenidos a la DB de Galatex!!
    (   >      )>               Aqui se harán triggers, vistas y más vainas
*/
--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--

create database ProyectoTextil
DROP database ProyectoTextil

create table ciudades
(
    codigo varchar(5) PRIMARY KEY,
    nombre varchar(20) not NULL UNIQUE
);

create table proveedores
(
    codigo varchar(5) PRIMARY KEY,
    nombreEmpresa varchar(20) not NULL,
    numTel varchar(15) not null,
    nombreContact varchar(35) not null,
    apPat varchar(25) not null,
    apMat varchar(25) not null
);
ALTER TABLE proveedores
    ADD estado ENUM('activo', 'inactivo') DEFAULT 'activo';

create table tipo_materiales
(
    num int AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(20) not NULL,
    color varchar(20) not NULL,
    descripcion varchar(80) not NULL
);


select * from tipo_materiales
select * from materia_prima
create table lotes_vestidos
(
    num int AUTO_INCREMENT primary KEY,
    fechaProduccion date not NULL,
    costoProduccion DECIMAL not null,
    cantDefectuosos int not null,
    cantVestidos int not null,
    cantTotalGen int not NULL
);

alter table lotes_vestidos
add constraint FK_lotesConVestidos
add column vestido varchar(5),
Foreign Key (vestido) REFERENCES vestidos(codigo)



    create table clientes
    (
        num int AUTO_INCREMENT PRIMARY KEY,
        rfc VARCHAR(10) NOT NULL,
        nombreEmpresa VARCHAR(30) NOT NULL,
        telEmpresa VARCHAR(10),
        nombreContacto VARCHAR(30) NOT NULL,
        apPat VARCHAR(30) NOT NULL,
        apMat VARCHAR(30) NOT NULL,
        correo VARCHAR(30),
        telContact VARCHAR(15) NOT NULL
    );

    CREATE TABLE usuarios
    
    (
        num int AUTO_INCREMENT PRIMARY KEY,
        nombreUser VARCHAR (20) NOT NULL,
        password VARCHAR (30) NOT NULL,
        categoria varchar(1) not null,
        cliente int NOT NULL,
        Foreign Key (cliente) REFERENCES clientes(num)
    );

    ALTER TABLE usuarios 
    ADD estado ENUM('activo', 'inactivo') DEFAULT 'activo';
    
    ALTER TABLE materia_prima
    ADD estado ENUM('activo', 'inactivo') DEFAULT 'activo';


    UPDATE usuarios
    SET estado = 'activo'
    

select * from pedidos
    SELECT * FROM usuarios

CREATE TABLE pedidos
(
    num INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    cantTotalVest INT,
    subtotal decimal, 
    IVA decimal,
    total decimal,
    cliente int NOT NULL,
    Foreign Key (cliente) REFERENCES clientes(num)
);


create table fabricas
(
    codigo varchar(5) primary KEY,
    nombre varchar(30) not NULL,
    colonia varchar(30) not null,
    calle varchar(30) not null,
    numCalle int not null,
    numTel varchar(15) not NULL,
    ciudad varchar(5),
    Foreign Key (ciudad) REFERENCES ciudades(codigo)
);

create table compras
(
    num int primary key AUTO_INCREMENT,
    fecha DATE NOT NULL,
    cantComprada int, 
    subTotal decimal ,
    iva decimal,
    total decimal,
    fabrica varchar(5) not null ,
    proveedor varchar(5) not null,
    Foreign Key (fabrica) REFERENCES fabricas(codigo),
    Foreign Key (proveedor) REFERENCES proveedores(codigo)
);

create table materia_prima
(
    clave varchar(5) primary key,
    nombreMaterial varchar(30),
    fechaRecibido date not null, 
    descripcion varchar(60),
    stock int,
    precio decimal not null,
    tipoMaterial int not null,
    proveedor varchar(5) not null,
    Foreign Key (tipoMaterial) REFERENCES tipo_materiales(num),
    Foreign Key (proveedor) REFERENCES proveedores(codigo)
);

ALTER TABLE materia_prima
CHANGE COLUMN descripcion descripcionMP varchar(60);

ALTER TABLE materia_prima
CHANGE COLUMN descripcion descripcionMP varchar(60);

SELECT * FROM `materia_prima`
select * from tipo_materiales

SELECT * FROM `ped_paqxlote`
SELECT * FROM `lotes_vestidos`

create table compra_mat 
(
    compra int,
    materiaPrima varchar(5),
    cantidad int not null, 
    importe decimal,
    PRIMARY KEY (compra, materiaPrima),
    Foreign Key (compra) REFERENCES compras(num),
    Foreign Key (materiaPrima) REFERENCES materia_prima(clave)
);


create table vestidos
(
    codigo varchar(5) primary key,
    nombre varchar(50) not null,
    talla varchar(5) not null,
    descripcion varchar(60) not null,
    precioVenta decimal not null,
    fabrica varchar(5),
    loteVestido int,
    Foreign Key (fabrica) REFERENCES fabricas(codigo),
    Foreign Key (loteVestido) REFERENCES lotes_vestidos(num)
);
ALTER TABLE vestidos
ADD COLUMN imagen1 VARCHAR(20), 
ADD COLUMN imagen2 VARCHAR(20); 

create table mat_vestidos
(
    mat_prima VARCHAR(5),
    vestido VARCHAR(5),
    cantidad INT NOT NULL,
    primary key (mat_prima,vestido),
    Foreign Key (mat_prima) REFERENCES materia_prima(clave),
    Foreign Key (vestido) REFERENCES vestidos(codigo)
);

create table paquete_X_lote
(
    num INT PRIMARY KEY AUTO_INCREMENT,
    cantPaquete INT NOT NULL,
    cantVestidos INT NOT NULL,
    loteVestido INT,
    Foreign Key (loteVestido) REFERENCES lotes_vestidos(num)
);

create table Ped_paqXlote
(
    pedido INT,
    paqueteLote INT,
    importe DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    primary key(pedido,paqueteLote),
    Foreign Key (pedido) REFERENCES pedidos(num),
    Foreign Key (paqueteLote) REFERENCES paquete_x_Lote(num)
);

CREATE TABLE pagos 
(
    num INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    cantPagada INT NOT NULL,
    concepto VARCHAR(50) NOT NULL,
    referenciaBancaria VARCHAR (30) NOT NULL,
    saldo decimal,
    pedido INT NOT NULL,
    Foreign Key (pedido) REFERENCES pedidos(num)
);


/**************************************************************INSERT*********************************************************************/

INSERT INTO ciudades(codigo,nombre)
values  ('MTY', "Monterrey"),
        ('TIJ', "Tijuana"),
        ('GDL',"Guadalajara");

INSERT INTO proveedores (codigo, nombreEmpresa, numTel, nombreContact, apPat, apMat)
VALUES
        ('DXSA', 'DIEXSA S.A. DE C.V', '6638909378', 'Rondaldo', 'Guitierrez', 'Jimenez'),
        ('SMTN', 'SAN MARTIN S.A', '5555786611', 'Gustavo', 'Zazueta', 'Marquez'),
        ('ASTX', 'ASSATEX', '5550770700', 'America', 'Montes', 'Perez'),
        ('MRO', 'MIRO S.A. DE C.V.', '7282827558', 'Mario Fernando', 'Garcia', 'Garcia'),
        ('TXVS', 'TEXTIVISION R.L.', '5553110555', 'Carlos Angel', 'Chavez', 'Hernandez'),
        ('MRA', 'MARIA S.A. DE C.V.', '2222244241', 'Elena', 'Cardenas', 'Felix');

INSERT INTO tipo_materiales (nombre, color, descripcion)
VALUES
        ('Encaje', 'negro', 'Tela de Encaje de color negro'),
        ('Encaje', 'blanco', 'Tela de Encaje de color blanco'),
        ('Encaje', 'dorado', 'Tela de Encaje de color oro'),
        ('Tela Georgette', 'blanco', 'Tela Georgette de color blanco'),
        ('Tela Georgette', 'negro', 'Tela Georgette de color negro'),
        ('Tela Georgette', 'azul marino', 'Tela Georgette de color azul marino'),
        ('Tela acrílico', 'rojo', 'Tela Acrílico de color rojo'),
        ('Tela acrílico', 'blanco', 'Tela Acrílico color blanco'),
        ('Tela acrílico', 'negro', 'Tela Acrílico color negro'),
        ('Tela acrílico', 'verde', 'Tela Acrílico de color verde'),
        ('Tul', 'azul marino', 'Tela Tul de color azul marino'),
        ('Tul', 'azul rey', 'Tela Tul de color azul rey'),
        ('Tul', 'rojo', 'Tela Tul de color rojo'),
        ('Tul', 'rosa palo', 'Tela Tul de color rosa palo'),
        ('Tul', 'café', 'Tela Tul de color café'),
        ('Seda', 'blanco', 'Tela de Seda color blanco'),
        ('Seda', 'negro', 'Tela de Seda color negro'),
        ('Saten', 'verde oscuro', 'Tela de Saten color verde oscuro'),
        ('Saten', 'gris', 'Tela de Saten color gris'),
        ('Saten', 'naranja pastel', 'Tela de Saten color naranja pastel'),
        ('Saten', 'morado', 'Tela de Saten color morado'),
        ('Saten', 'negro', 'Tela de Saten color negro'),
        ('Tela de pana', 'guinda', 'Tela de Pana color guinda'),
        ('Tela de pana', 'verde oscuro', 'Tela de Pana color verde oscuro'),
        ('Hilo', 'negro', 'Hilo de color negro'),
        ('Hilo', 'rosa', 'Hilo de color rosa'),
        ('Hilo', 'rojo', 'Hilo de color rojo'),
        ('Hilo', 'gris', 'Hilo de color gris'),
        ('Hilo', 'blanco', 'Hilo de color blanco'),
        ('Hilo', 'azul marino', 'Hilo de color azul marino'),
        ('Hilo', 'morado', 'Hilo de color morado'),
        ('Hilo', 'dorado', 'Hilo de color dorado'),
        ('Cremallera', 'blanco', 'Cremallera de color blanco'),
        ('Cremallera', 'negro', 'Cremallera de color negro'),
        ('Cremallera', 'azul marino', 'Cremallera de color azul marino');

INSERT INTO lotes_vestidos (fechaProduccion, costoProduccion, cantdefectuosos, cantvestidos, cantTotalGen)
VALUES
        ('2023-09-28', 35031.64, 20, 1000, 2240),
        ('2023-08-25', 80088.75, 40, 2200, 2620),
        ('2023-01-23', 418112.00, 20, 2600, 1640),
        ('2023-05-19', 228510.75, 40, 1600, 1515),
        ('2023-08-04', 145831.64, 15, 1500, 1515),
        ('2023-05-04', 276006.75, 30, 1800, 1830),
        ('2023-06-03', 322002.38, 10, 2100, 2110),
        ('2023-01-24', 358710.38, 20, 1400, 1420),
        ('2023-08-10', 88772.44, 10, 1480, 1490),
        ('2023-02-23', 340411.64, 8, 1800, 1808),
        ('2023-04-26', 155626.58, 0, 3460, 3460),
        ('2023-06-03', 241069.58, 170, 4020, 4190),
        ('2023-08-06', 107945.89, 20, 3000, 3020),
        ('2023-10-18', 17121.39, 60, 1200, 1260),
        ('2023-10-12', 22819.64, 20, 1600, 1620),
        ('2023-10-14', 25198.8875, 20, 1400, 1420),
        ('2023-10-10', 51831.7375, 30, 1920, 1950),
        ('2023-09-25', 157326.1375, 10, 2300, 2310),
        ('2023-09-20', 68675.4975, 6, 2100, 2106),
        ('2023-09-16', 423646.2475, 40, 1360, 1400),
        ('2023-09-03', 137623.5475, 23, 2960, 2983),
        ('2023-08-18', 168962.3375, 30, 2380, 2410),
        ('2023-08-15', 90992.7475, 5, 2600, 2605),
        ('2023-08-13', 139230.8875, 10, 3220, 3230);

INSERT INTO clientes (rfc, nombreEmpresa, telEmpresa, nombreContacto, apPat, apMat, correo, telContact)
VALUES
        ('ZAR6639787', 'Zara', '663-978-74-92', 'Ana Paula', 'Cardenas', 'Algandar', 'zara@example.com', '6631199999'),
        ('SHE6642837', 'Shein', '664-283-76-21', 'Diana', 'Perez', 'Perez', 'shein@storemail.com', '665127723'),
        ('YES6642321', 'Yesstyle', '664-232-13-22', 'Angie Stefany', 'Rodriguez', 'Camacho', 'info@yesstyleshop.com', '6655355521'),
        ('CHA3323821', 'Charnel', '33-238-21-12', 'Ximena', 'Rodriguez', 'Calderon', 'charnel.sales@shopmail.com', '6630211111'),
        ('SHA3334523', 'Shasa', '33-345-23-09', 'Francisco', 'Guiterrez', 'Domínguez', 'contact@shasafashion.com', '6648038888'),
        ('COP6638934', 'Coppel', '663-893-43-64', 'Vanessa', 'Garcia', 'Sánchez', 'customerservice@coppelfashion.com', '6632022290'),
        ('SKI3368089', 'Skims', '33-680-89-39', 'Armando', 'Calderon', 'Martínez', 'skims.contactus@example.com', '6633033933'),
        ('CID8193922', 'Cider', '81-939-22-34', 'Reina', 'Higuera', 'Guzmán', 'sales@ciderboutique.com', '6634944194'),
        ('URB8176545', 'Urbanic', '81-765-45-32', 'Kenia Guadalupe', 'Osuna', 'Flores', 'info@urbanic.store', '6639006688'),
        ('LIV6632733', 'Liverpool', '663-273-34-57', 'Juan Luis', 'Perez', 'Navarrete', 'support@liverpoolshop.com', '662202392'),
        ('BIN3393709', 'Bina botique', '33-937-09-04', 'Alize', 'Reyes', 'Torres', 'contact@binaboutique.com', '6643337534'),
        ('SUB8183276', 'Suburbia', '81-832-76-54', 'Lisa', 'Méndez', 'Pérez', 'info@suburbiafashion.com', '6653359868'),
        ('LOV8143553', 'Love21', '81-435-53-17', 'Juan Martin', 'Rivera', 'Méndez', 'love21@emailstore.com', '6652316435'),
        ('ROS6642432', 'Roses', '664-243-24-53', 'Rosa', 'Zazueta', 'López', 'contact@rosesfashion.com', '6643215324'),
        ('BON3345687', 'Bon chic', '33-456-876-61', 'Diego', 'Sandoval', 'Benítez', 'bonchic@chicstore.com', '6652346556'),
        ('AMA3324565', 'Amanda store', '33-245-65-49', 'Guillermo', 'Garcia', 'Cortez', 'info@amandaboutique.com', '6643111205');


INSERT INTO Usuarios (nombreUser, password, categoria, cliente)
VALUES  ('ZaraFashion', 'ZaraFashion123!','C', '1'),
        ('SheinShopping', 'SheinShopping2020$','C', '2'),
        ('StyleLoverOnline', 'StyleLoverOnline#33','C', '3'),
        ('ChicBoutique123', 'ChicBoutique1234&','C','4'),
        ('CoutureQueen20', 'CoutureQueen20-fun', 'C','5'),
        ('CoppelStore', 'CoppelStore65%','C','6'),
        ('ElegantBuyerShop', 'ElegantBuyerShop_7','C' ,'7'),
        ('GlamourGuru1234', 'GlamourGuru1234c1der','C','8'),
        ('WardrobeWhiz21', 'WardrobeWhiz21urban','C','9'),
        ('LiverpoolMall', 'LiverpoolMall-123', 'C','10'),
        ('BinaBtq', 'BinaBtq55', 'C','11'),
        ('Suburbia_ShopCar', 'Suburbia_ShopCar12#', 'C','12'),
        ('BoutiqueChic19', 'BoutiqueChic19luv21', 'C','13'),
        ('GlamFashionista20', 'GlamFashionista20_rose','C', '14'),
        ('StyleSeekerShop', 'StyleSeekerShop-c11', 'C','15'),
        ('RetailEnthusiast', 'RetailEnthusiastamand$','C', '16'),
        ('ADMIN2023', '2023PHP$','A', NULL),
        ('ADMIN22023', '2023PHP_','A', NULL)
    ;

INSERT INTO Pedidos (fecha, cantTotalVest, subtotal, IVA, total, cliente)
VALUES  ('2023-08-12', 30, 26224.14, 4195.86, 20120.00, '1'),
        ('2023-08-22', 20, 17344.83, 2775.17, 23540.00, '2'),
        ('2023-09-30', 20, 20293.10, 3246.90, 60960.00, '3'),
        ('2023-10-04', 40, 52551.72, 8408.28, 55860.00, '4'),
        ('2023-10-26', 60, 48155.17, 7704.83, 81270.00, '5'),
        ('2023-10-28', 70, 70060.34, 11209.66, 49750.00, '6'),
        ('2023-10-31', 50, 42887.93, 6862.07, 40640.00, '7'),
        ('2023-10-02', 40, 35034.48, 5605.52, 55860.00, '8'),
        ('2023-10-05', 60, 48155.17, 7704.83, 23220.00, '9'),
        ('2023-10-09', 20, 20017.24, 3202.76, 0, '10');

INSERT INTO fabricas (codigo, nombre, colonia, calle, numCalle, numTel, ciudad) 
VALUES  ('GTMTY', 'GalatexMTY', 'Del norte', 'Servicio postal', 203, '81-665-24-60', 'MTY'),
        ('GTTIJ', 'GalatexTJ', 'Industrial', 'Maquiladoras', 1276, '664-164-63-29', 'TIJ'),
        ('GTGDL', 'GalatexGDL', 'Analco', 'Cuahtemoc', 75, '33-344-30-44', 'GDL');
        
INSERT INTO compras (fecha, cantComprada, subtotal, IVA, total, fabrica, proveedor) 
VALUES  
    ('2023-05-16', 856, 29664.83, 4746.37, 34411.20, 'GTMTY', 'DXSA'),
    ('2023-05-21', 758, 55804.48, 8928.72, 64733.20, 'GTTIJ', 'SMTN'),
    ('2023-10-21', 564, 9233.07, 1477.29, 10710.36, 'GTGDL', 'ASTX'),
    ('2023-01-25', 579, 17963.97, 2874.24, 20838.21, 'GTMTY', 'MRO'),
    ('2023-03-28', 690, 37057.76, 5929.24, 42987.00, 'GTTIJ', 'TXVS'),
    ('2023-09-20', 725, 36031.25, 5765.00, 41796.25, 'GTGDL', 'MRA'),
    ('2023-05-03', 806, 16363.19, 2618.11, 18981.30, 'GTMTY', 'DXSA');

INSERT INTO materia_prima (clave, nombreMaterial, fechaRecibido, descripcion, stock, precio, tipoMaterial, Proveedor) 
VALUES  
    ('CRE06', 'Cremallera 2', '2023-11-19', 'Probando', 100, 11, 'MRO')

UPDATE materia_prima 
SET stock = 50
WHERE clave = 'CRE05'     

SELECT * FROM materia_prima

INSERT INTO materia_prima (clave, nombreMaterial, fechaRecibido, descripcion, stock, tipoMaterial, Proveedor) 
VALUES  
    ('TDE01', 'Tela de Encaje', '2023-02-23', 'Tejido elegante con patrón entrelazado.', 1052, 1, 'DXSA'),
    ('TDE02', 'Tela de Encaje', '2023-05-06', 'Tejido elegante con patrón entrelazado.', 2363, 2, 'SMTN'),
    ('TDE03', 'Tela de Encaje', '2023-08-28', 'Tejido elegante con patrón entrelazado.', 1515, 3, 'MRO'),
    ('TGG01', 'Tela Georgette', '2023-09-18', 'Tela liviana y transparente con textura.', 2523, 4, 'DXSA'),
    ('TGG02', 'Tela Georgette', '2023-07-07', 'Tela liviana y transparente con textura.', 3396, 5, 'TXVS'),
    ('TGG03', 'Tela Georgette', '2023-06-25', 'Tela liviana y transparente con textura.', 1726, 6, 'MRA'),
    ('TAC04', 'Tela lentejuela', '2023-01-13', 'Tela resistente y versátil de lentejuela.', 1099, 7, 'ASTX'),
    ('TAC05', 'Tela lentejuela', '2023-10-01', 'Tela resistente y versátil de lentejuela.', 3561, 8, 'DXSA'),
    ('TAC06', 'Tela lentejuela', '2023-06-22', 'Tela resistente y versátil de lentejuela.', 3264, 9, 'MRA'),
    ('TAC07', 'Tela lentejuela', '2023-10-26', 'Tela resistente y versátil de lentejuela.', 2556, 10, 'ASTX'),
    ('TTL01', 'Tela Tul', '2023-03-22', 'Tejido transparente y delicado de tul.', 2405, 11, 'MRO'),
    ('TTL02', 'Tela Tul', '2023-02-06', 'Tejido transparente y delicado de tul.', 1351, 12, 'SMTN'),
    ('TTL03', 'Tela Tul', '2023-02-01', 'Tejido transparente y delicado de tul.', 1516, 13, 'TXVS'),
    ('TTL04', 'Tela Tul', '2023-02-11', 'Tejido transparente y delicado de tul.', 3363, 14, 'MRA'),
    ('TTL05', 'Tela Tul', '2023-05-04', 'Tejido transparente y delicado de tul.', 1236, 15, 'MRA'),
    ('TDS01', 'Tela de Seda', '2023-10-19', 'Suave y lujosa, perfecta para elegancia.', 1654, 16, 'DXSA'),
    ('TDS02', 'Tela de Seda', '2023-07-15', 'Suave y lujosa, perfecta para elegancia.', 1813, 17, 'ASTX'),
    ('TDSA1', 'Tela de Saten', '2023-03-06', 'Tela lujosa y suave, con brillo.', 3213, 18, 'MRO'),
    ('TDSA2', 'Tela de Saten', '2023-05-17', 'Tela lujosa y suave, con brillo.', 3823, 19, 'SMTN'),
    ('TDSA3', 'Tela de Saten', '2023-10-14', 'Tela lujosa y suave, con brillo.', 1277, 20, 'ASTX'),
    ('TDSA4', 'Tela de Saten', '2023-06-06', 'Tela lujosa y suave, con brillo.', 2490, 21, 'TXVS'),
    ('TDSA5', 'Tela de Saten', '2023-08-26', 'Tela lujosa y suave, con brillo.', 2723, 22, 'DXSA'),
    ('TPA01', 'Tela de pana', '2023-02-15', 'Tela suave y cálida de pana.', 2616, 23, 'MRO'),
    ('TPA02', 'Tela de pana', '2023-01-18', 'Tela suave y cálida de pana.', 1828, 24, 'ASTX'),
    ('HIL01', 'Hilo', '2023-08-20', 'Material delgado para coser y tejer.', 1000, 25, 'SMTN'),
    ('HIL02', 'Hilo', '2023-08-06', 'Material delgado para coser y tejer.', 1600, 26, 'MRA'),
    ('HIL03', 'Hilo', '2023-10-15', 'Material delgado para coser y tejer.', 1800, 27, 'DXSA'),
    ('HIL04', 'Hilo', '2023-10-12', 'Material delgado para coser y tejer.', 1900, 28, 'MRO'),
    ('HIL05', 'Hilo', '2023-03-26', 'Material delgado para coser y tejer.', 1200, 29, 'ASTX'),
    ('HIL06', 'Hilo', '2023-02-13', 'Material delgado para coser y tejer.', 1300, 30, 'SMTN'),
    ('HIL07', 'Hilo', '2023-01-28', 'Material delgado para coser y tejer.', 2000, 31, 'MRO'),
    ('HIL08', 'Hilo', '2023-01-29', 'Material delgado para coser y tejer.', 1600, 32, 'MRA'),
    ('CRE01', 'Cremallera', '2023-03-13', 'Cierre de tela con dientes metálicos.', 2528, 33, 'TXVS'),
    ('CRE02', 'Cremallera', '2023-03-19', 'Cierre de tela con dientes metálicos.', 1368, 34, 'TXVS'),
    ('CRE03', 'Cremallera', '2023-09-10', 'Cierre de tela con dientes metálicos.', 2872, 35, 'ASTX');

INSERT INTO compra_mat (compra, materiaPrima, cantidad, importe)
VALUES  (1,	'TDE03',	856,	34411.2),
        (2,	'TAC05',	758,	64733.2),
        (3,	'TTL04',	564,	10710.36),
        (4,	'TDS01',	579,	20838.21),
        (5,	'TDSA3',	690,	42987),
        (6,	'TPA02',	725,	41796.25),
        (7,	'HIL03',	806,	18981.3);

SELECT * FROM compra_mat

insert into vestidos (codigo, nombre, talla, descripcion, precioVenta, fabrica, loteVestido) 
VALUES  ('VENGN', 'Vestido de encaje negro con un aire gótico', 'S', 'Encaje negro, aire gótico, elegante, misterioso.', 1014, 'GTMTY', 1),
        ('VENBF', 'Vestido de encaje blanco con motivos florales', 'M', 'Encaje blanco, motivos florales, puro, romántico.', 1006, 'GTMTY', 2),
        ('VENDL', 'Vestido de encaje dorado con detalles de lentejuelas', 'L', 'Encaje dorado, lentejuelas, brillante, festivo.', 1177, 'GTTIJ', 3),
        ('VGBPD', 'Vestido de georgette blanco con detalles', 'S', 'Georgette blanco,  sofisticado.', 1016, 'GTGDL', 4),
        ('VGNSA', 'Vestido de georgette negro con siluetas ajustadas', 'M', 'Georgette negro, silueta ajustada, moderno.', 931, 'GTMTY', 5),
        ('VGBAM', 'Vestido de georgette azul marino con bajo asimétrico', 'L', 'Georgette azul marino, bajo asimétrico, chic.', 1161, 'GTTIJ', 6),
        ('VLRV', 'Vestido lentejuela rojo con detalles de volantes', 'S', 'lentejuela rojo, volantes, vibrante, juguetón.', 995, 'GTTIJ', 7),
        ('VLBBO', 'Vestido lentejuela blanco con bordados', 'M', 'lentejuela blanco, bordados, clásico, atemporal.', 1016, 'GTMTY', 8),
        ('VLNCO', 'Vestido lentejuela negro con detalles de cut-outs', 'L', 'lentejuela negro, cut-outs, audaz, contemporáneo.', 931, 'GTTIJ', 9),
        ('VLGST', 'Vestido lentejuela verde con siluetas de túnica', 'S', 'lentejuela verde, silueta de túnica, relajado.', 1161, 'GTGDL', 10),
        ('VTAN', 'Vestido de tul azul marino con detalles de encaje', 'M', 'Tul azul marino, encaje, delicado, femenino.', 941, 'GTMTY', 11),
        ('VTARL', 'Vestido de tul azul rey con detalles de lentejuelas', 'L', 'Tul azul rey, lentejuelas, llamativo, regio.', 982, 'GTTIJ', 12),
        ('VTRP', 'Vestido de tul rojo con detalles de pedrería', 'S', 'Tul rojo, pedrería, apasionado, dramático.', 1199, 'GTGDL', 13),
        ('VTPRP', 'Vestido de tul rosa palo con detalles de perlas', 'M', 'Tul rosa palo, perlas, suave, dulce.', 1109, 'GTMTY', 14),
        ('VTCE', 'Vestido de tul café con detalles de encaje', 'L', 'Tul café, encaje, terroso, bohemio.', 984, 'GTTIJ', 15),
        ('VSDBE', 'Vestido de seda blanco con detalles de encaje', 'S', 'Seda blanco, encaje, lujoso, etéreo.', 900, 'GTMTY', 16),
        ('VSDBN', 'Vestido de seda negro con detalles de encaje', 'M', 'Seda negro, encaje, sofisticado, seductor.', 1097, 'GTTIJ', 17),
        ('VSDVE', 'Vestido de satén verde oscuro con detalles de encaje', 'L', 'Satén verde oscuro, encaje, rico, opulento.', 1143, 'GTGDL', 18),
        ('VSDGE', 'Vestido de satén gris con detalles de encaje', 'S', 'Satén gris, encaje, neutro, versátil.', 984, 'GTTIJ', 19),
        ('VSDNP', 'Vestido de satén naranja pastel con detalles de encaje', 'M', 'Satén naranja pastel, encaje, suave, alegre.', 900, 'GTGDL', 20),
        ('VSDMP', 'Vestido de satén morado con detalles de encaje', 'M', 'Satén morado, encaje, real, majestuoso.', 1016, 'GTTIJ', 21),
        ('VSDNE', 'Vestido de satén negro con detalles de encaje', 'L', 'Satén negro, encaje, clásico, elegante.', 931, 'GTGDL', 22),
        ('VPDC', 'Vestido de pana guinda con detalles de encaje', 'S', 'Pana guinda, encaje, cálido, acogedor.', 1161, 'GTTIJ', 23),
        ('VPDVO', 'Vestido de pana verde oscuro con detalles de encaje', 'M', 'Pana verde oscuro, encaje, profundo, intrigante.', 1180, 'GTGDL', 24);

UPDATE vestidos
SET
  imagen1 = CASE
    WHEN codigo = 'VENGN' THEN 'V1-Frente.jpg'
    WHEN codigo = 'VENBF' THEN 'V2-Frente.jpg'
    WHEN codigo = 'VENDL' THEN 'V3-Frente.jpg'
    WHEN codigo = 'VGBPD' THEN 'V4-Frente.jpg'
    WHEN codigo = 'VGNSA' THEN 'V5-Frente.jpg'
    WHEN codigo = 'VGBAM' THEN 'V6-Frente.jpg'
    WHEN codigo = 'VLRV'  THEN 'V7-Frente.png'
    WHEN codigo = 'VLBBO' THEN 'V8-Frente.png'
    WHEN codigo = 'VLNCO' THEN 'V9-Frente.jpg'
    WHEN codigo = 'VLGST' THEN 'V10-Frente.jpg'
    WHEN codigo = 'VTAN'  THEN 'V11-Frente.jpg'
    WHEN codigo = 'VTARL' THEN 'V12-Frente.jpg'
    WHEN codigo = 'VTRP'  THEN 'V13-Frente.jpg'
    WHEN codigo = 'VTPRP' THEN 'V14-Frente.jpg'
  END,
  imagen2 = CASE
    WHEN codigo = 'VENGN' THEN 'V1-Detras.jpg'
    WHEN codigo = 'VENBF' THEN 'V2-Detras.jpg'
    WHEN codigo = 'VENDL' THEN 'V3-Detras.jpg'
    WHEN codigo = 'VGBPD' THEN 'V4-Detras.jpg'
    WHEN codigo = 'VGNSA' THEN 'V5-Detras.jpg'
    WHEN codigo = 'VGBAM' THEN 'V6-Detras.jpg'
    WHEN codigo = 'VLRV'  THEN 'V7-Detras.jpg'
    WHEN codigo = 'VLBBO' THEN 'V8-Detras.png'
    WHEN codigo = 'VLNCO' THEN 'V9-Detras.jpg'
    WHEN codigo = 'VLGST' THEN 'V10-Detras.jpg'
    WHEN codigo = 'VTAN'  THEN 'V11-Detras.jpg'
    WHEN codigo = 'VTARL' THEN 'V12-Detras.jpg'
    WHEN codigo = 'VTRP'  THEN 'V13-Detras.jpg'
    WHEN codigo = 'VTPRP' THEN 'V14-Detras.jpg'
  END;


INSERT INTO mat_vestidos (mat_prima, vestido, cantidad)
VALUES  ('TDE01', 'VENGN', 2),
        ('HIL01', 'VENGN', 25),
        ('CRE02', 'VENGN', 1),
        ('TDE02', 'VENBF', 3),
        ('HIL05', 'VENBF', 25),
        ('CRE01', 'VENBF', 1),
        ('TDE03', 'VENDL', 4),
        ('HIL08', 'VENDL', 25),
        ('CRE01', 'VENDL', 1),
        ('TGG01', 'VGBPD', 2),
        ('HIL05', 'VGBPD', 25),
        ('CRE01', 'VGBPD', 1),
        ('TGG02', 'VGNSA', 3),
        ('HIL01', 'VGNSA', 25),
        ('CRE02', 'VGNSA', 1),
        ('TGG03', 'VGBAM', 4),
        ('HIL06', 'VGBAM', 25),
        ('CRE03', 'VGBAM', 1),
        ('TAC04', 'VLRV', 2),
        ('HIL03', 'VLRV', 25),
        ('CRE02', 'VLRV', 1),
        ('TAC05', 'VLBBO', 3),
        ('HIL05', 'VLBBO', 25),
        ('CRE01', 'VLBBO', 1),
        ('TAC06', 'VLNCO', 4),
        ('HIL01', 'VLNCO', 25),
        ('CRE02', 'VLNCO', 1),
        ('TAC07', 'VLGST', 2),
        ('HIL01', 'VLGST', 25),
        ('CRE02', 'VLGST', 1),
        ('TTL01', 'VTAN', 3),
        ('HIL06', 'VTAN', 25),
        ('CRE03', 'VTAN', 1),
        ('TTL02', 'VTARL', 4),
        ('HIL06', 'VTARL', 25),
        ('CRE03', 'VTARL', 1),
        ('TTL03', 'VTRP', 2),
        ('HIL03', 'VTRP', 25),
        ('TTL04', 'VTPRP', 3),
        ('HIL02', 'VTPRP', 25),
        ('CRE01', 'VTPRP', 1),
        ('TTL05', 'VTCE', 4),
        ('HIL01', 'VTCE', 25),
        ('CRE02', 'VTCE', 1),
        ('TDS01', 'VSDBE', 2),
        ('HIL05', 'VSDBE', 25),
        ('CRE01', 'VSDBE', 1),
        ('TDS02', 'VSDBN', 3),
        ('HIL01', 'VSDBN', 25),
        ('CRE02', 'VSDBN', 1),
        ('TDSA1', 'VSDVE', 4),
        ('HIL01', 'VSDVE', 25),
        ('TDSA2', 'VSDGE', 2),
        ('HIL04', 'VSDGE', 25),
        ('TDSA3', 'VSDNP', 3),
        ('HIL05', 'VSDNP', 25),
        ('TDSA4', 'VSDMP', 3),
        ('HIL07', 'VSDMP', 25),
        ('TDSA5', 'VSDNE', 4),
        ('HIL01', 'VSDNE', 25),
        ('TPA01', 'VPDC', 2),
        ('HIL02', 'VPDC', 25),
        ('TPA02', 'VPDVO', 3),
        ('HIL01', 'VPDVO', 25);

INSERT INTO Paquete_x_Lote (num, cantPaquete, cantVestidos, loteVestido)
VALUES  (1, 50, 20, 1),
        (2, 110, 20, 2),
        (3, 130, 20, 3),
        (4, 80, 20, 4),
        (5, 75, 20, 5),
        (6, 90, 20, 6),
        (7, 105, 20, 7),
        (8, 70, 20, 8),
        (9, 74, 20, 9),
        (10, 90, 20, 10),
        (11, 173, 20, 11),
        (12, 201, 20, 12),
        (13, 150, 20, 13);

INSERT INTO Ped_paqXLote (pedido, paqueteLote, importe, cantidad)
VALUES  (1, 1, 30420, 30),
        (2, 2, 30180, 20),
        (3, 3, 23540, 20),
        (4, 4, 40640, 40),
        (5, 5, 37240, 60),
        (6, 6, 69660, 70),
        (7, 7, 69650, 50),
        (8, 8, 50800, 40),
        (9, 9, 37240, 60),
        (10, 10, 69660, 20);


INSERT INTO Pagos (num, fecha, cantPagada, concepto, referenciaBancaria, Saldo, Pedido) 
VALUES  
    (1, '2023-10-10', 20120, 'Pago lote', 'AFD4312', 20120, 1),
    (2, '2023-10-12', 23540, 'Pago de vestidos', 'FJDJ8384', 23540, 2),
    (3, '2023-10-16', 60960, 'Pago por los vestidos', 'DJJSJ21', 60960, 3),
    (4, '2023-10-26', 55860, 'Vestidos pagados', 'RUERU43', 55860, 4),
    (5, '2023-11-01', 81270, 'Pagado por Coppel', 'FCJKCJD43', 81270, 5),
    (6, '2023-11-05', 49750, 'Pagado', 'DKJDKJ223', 49750, 6),
    (7, '2023-11-06', 40640, 'Pagado 13/noviembre', 'KJDKFJ99', 40640, 7),
    (8, '2023-09-04', 55860, 'Vestidos pagados', 'DFKJDKF34', 55860, 8),
    (9, '2023-09-08', 23220, 'Vestidos pago por el lote', 'SDKJSKJD44', 23220, 9),
    (10, '2023-11-07', 23500, 'Pagado', 'ASDF3', 23500, 10);
--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--
/*                                                                                             */
/*                                     SECCION DE CONSULTAS                                    */
/*                                                                                             */ 
--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--

/*
1. Información sobre una compra
a. Nombre de la fábrica que realiza la compra
b. Número de la compra
c. Fecha de la compra
d. Nombre del proveedor
e. Subtotal
f. IVA
g. Total
h. Cantidad total de productos
*/

SELECT DISTINCT 
    fab.nombre AS fabrica_nombre,
    com.num AS numero_compra,
    DATE_FORMAT(com.fecha, "%d %M %Y") AS fecha_compra,
    prov.nombreEmpresa AS nombre_proveedor,
    com.subTotal AS subtotal, 
    com.iva AS iva,
    com.total AS total,
    com.cantComprada AS cantidad_total_productos
FROM compras as com
INNER JOIN fabricas as fab ON com.fabrica = fab.codigo
INNER JOIN proveedores as prov ON com.proveedor = prov.codigo
INNER JOIN compra_mat as cm ON com.num = cm.compra
ORDER BY com.num 



------------------------------------------------------------------------------------------------

/*2. Productos (materia prima) de una compra
a. Número de la compra
b. Nombre del producto
c. Nombre del tipo de producto
d. Precio del producto
e. Cantidad de cada producto
f. Importe de cada producto
*/

SELECT
comat.compra as NumeroCompra,
mat.nombreMaterial as NombreMaterial,
tip.nombre as NombreTipoMaterial,
mat.precio as PrecioProducto,
comat.cantidad as CantidadProducto,
comat.importe as Importe
FROM compra_mat as comat
inner join materia_prima as mat on comat.materiaPrima = mat.clave
inner join tipo_materiales as tip on mat.tipoMaterial = tip.num
where comat.compra = 7

------------------------------------------------------------------------------------------------

/*3. Información sobre un pedido
a. Número del pedido
b. Nombre del cliente
c. Fecha del pedido
d. Subtotal
e. IVA
f. Total
g. Cantidad total de paquetes por lote
*/

    SELECT
    ped.num as Pedido,
    cli.nombreEmpresa as Cliente,
    DATE_FORMAT(ped.fecha, '%Y-%M-%d') as Fecha,
    ped.subtotal as Subtotal,
    ped.IVA as IVA,
    ped.total as Total,
    ppl.cantidad as CantidadPaquetesXLote
    FROM Pedidos as ped
    inner join clientes as cli on ped.cliente = cli.num
    inner join ped_paqxlote as ppl on ppl.pedido = ped.num




------------------------------------------------------------------------------------------------

/*4. Paquetes por lote incluidos en un pedido
a. Número del pedido
b. Número del paquete
c. Nombre del vestido
d. Talla
e. Descripción del vestido
f. Cantidad de paquetes
g. Importe
*/

SELECT
ped.num as Pedido,
pl.num as Paquete,
ves.nombre as Vestido,
ves.talla as Talla,
ves.descripcion as DescripcionVestido,
ppl.cantidad as CantidadPaquetes,
ppl.importe as Importe
FROM ped_paqxlote as ppl
inner join pedidos as ped on ppl.pedido = ped.num
inner join paquete_x_lote as pl on ppl.paqueteLote = pl.num
inner join lotes_vestidos as lot on pl.loteVestido = lot.num
inner join vestidos as ves on ves.loteVestido = lot.num
where ped.num = 1



/*
    Pendiente
*/

------------------------------------------------------------------------------------------------

/*5. Pagos de un pedido
a. Número del pedido
b. Nombre del cliente
c. Número del pago
d. Fecha del pago
e. Concepto del pago
f. Monto del pago
g. Saldo
*/

select
ped.num as pedido,
cli.nombreEmpresa as Cliente,
pag.num as Pago,
DATE_FORMAT(pag.fecha, '%Y-%M-%D') asFechaPago,
pag.concepto as Concepto,
pag.cantPagada as MontoPago,
pag.saldo as Saldo
FROM pagos as pag
inner join pedidos as ped on pag.pedido = ped.num
inner join clientes as cli on ped.cliente = cli.num


------------------------------------------------------------------------------------------------

/*
6. Paquetes de un lote
a. Número del lote
b. Fecha de producción
c. Cantidad total de vestidos en el lote
d. Número del paquete del lote
e. Cantidad de vestidos en el paquete
*/

SELECT
lot.num as Lote,
lot.fechaProduccion as FechaProduccion,
lot.cantVestidos as CantidadTotalVestidos,
pl.num as NumeroPaquete,
pl.cantVestidos as CantidadVestidosPaquete
FROM paquete_x_lote as pl
inner join lotes_vestidos as lot on pl.loteVestido = lot.num


------------------------------------------------------------------------------------------------

/*
7. Información de los vestidos de un lote
a. Nombre de la fábrica que realizó los vestidos
b. Número del lote
c. Nombre del vestido
d. Talla del vestido
e. Descripción del vestido
f. Fecha de producción
g. Costo de producción
h. Cantidad total de vestidos
i. Cantidad de vestidos aprobados
j. Cantidad de vestidos defectuosos
*/

select
fab.nombre as Fabrica,
lot.num as Lote,
ves.nombre as Vestido,
ves.talla as Talla,
ves.descripcion as DescripcionVestido,
DATE_FORMAT(lot.fechaProduccion, '%Y-%M-%d' ) as Fecha,
lot.costoProduccion as CostoProduccion,
lot.cantTotalGen as CantidadTotalVestidos,
lot.cantVestidos as VestidosAprobados,
lot.cantDefectuosos as VestidosDefectuosos
FROM lotes_vestidos as lot
inner join vestidos as ves on ves.codigo  = lot.cod_vestido
inner join fabricas as fab on ves.fabrica = fab.codigo
where lot.num = 2

------------------------------------------------------------------------------------------------

/*8. Materia prima por un vestido
a. Código del vestido
b. Talla del vestido
c. Descripción del vestido
d. Nombre del material
e. Cantidad utilizada
*/

SELECT
mv.vestido as Vestido,
ves.talla as Talla,
ves.descripcion as Descripcion,
mat.nombreMaterial as Material,
mv.cantidad
FROM mat_vestidos AS mv
inner join materia_prima as mat on mv.mat_prima = mat.clave
inner join vestidos as ves on mv.vestido = ves.codigo
ORDER BY ves.talla 

------------------------------------------------------------------------------------------------

/*9. Vestidos producidos en una fábrica en un mes determinado
a. Nombre de la fábrica
b. Nombre de la ciudad
c. Fecha de producción
d. Código del vestido
e. Nombre del vestido
f. Talla
g. Descripción
h. Número del lote
*/


SELECT 
fb.nombre AS "Nombre",
cd.nombre AS "Ciudad",
DATE_FORMAT(lote.fechaProduccion, '%d-%m-%Y') AS "Fecha",
vest.codigo AS "Codigo",
vest.nombre AS "NombreVestido",
vest.talla AS "Talla",
vest.descripcion AS "Descripcion",
lote.num AS "Num_Lote"
FROM lotes_vestidos AS lote
INNER JOIN vestidos AS vest ON lote.num = vest.lotevestido 
INNER JOIN fabricas AS fb ON vest.fabrica = fb.codigo
INNER JOIN ciudades AS cd ON fb.ciudad = cd.codigo 
WHERE MONTH(lote.fechaProduccion) = 8 and fb.codigo = "GTGDL"

------------------------------------------------------------------------------------------------

/*10. Materia prima que se le compra a un proveedor
a. Nombre del proveedor
b. Nombre del material
c. Nombre del tipo de material
d. Precio unitario de compra */

SELECT 
prov.nombreEmpresa AS "Proveedor",
mp.nombreMaterial AS "Nombre_Material",
tm.nombre AS "Nombre_Tipo_Material",
mp.precio AS "Precio"
FROM tipo_materiales AS tm
INNER JOIN materia_prima AS mp ON tm.num = mp.tipoMaterial 
INNER JOIN compra_mat AS comp ON mp.clave = comp.materiaPrima
INNER JOIN compras AS c ON comp.compra = c.num
INNER JOIN proveedores AS prov ON c.proveedor = prov.codigo
where prov.codigo = 'SMTN'





ALTER TABLE lotes_vestidos
ADD COLUMN estado VARCHAR(20) DEFAULT 'disponible';

ALTER TABLE lotes_vestidos
CHANGE COLUMN cantVestidos cantVestido int NOT NULL;

ALTER TABLE materia_prima
CHANGE COLUMN descripcion descripcionMP varchar(60);

 ALTER TABLE lotes_vestidos 
    ADD estado ENUM('activo', 'inactivo') DEFAULT 'activo';
ALTER TABLE tipo_materiales

ALTER TABLE materia_prima
MODIFY tipoMaterial INT DEFAULT 1 NOT NULL;
------------------------------------------------------------------------------------------------

--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--
/*                                                                                             */
/*                                      TRIGGERS                                               */
/*                                                                                             */ 
--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--h 
/*1.Calcular el subtotal, IVA, total y cantidad total de materia prima comprada a un
proveedor.*/
--Orden de creacion: 2
DELIMITER $$

CREATE TRIGGER calcularTotalesMateriaPrima
AFTER INSERT ON compra_mat
FOR EACH ROW
BEGIN
    DECLARE subtotalCompra DECIMAL;
    DECLARE ivaCompra DECIMAL;
    DECLARE totalCompra DECIMAL;
    DECLARE cantidadTotal INT;

    -- Calcular el subtotal
    SELECT SUM(importe) INTO subtotalCompra
    FROM compra_mat
    WHERE compra = NEW.compra;

    -- Calcular el IVA
    SET ivaCompra = subtotalCompra * 0.16;

    -- Calcular el total
    SET totalCompra = subtotalCompra + ivaCompra;

    -- Calcular la cantidad total
    SELECT SUM(cantidad) INTO cantidadTotal
    FROM compra_mat
    WHERE compra = NEW.compra;

    -- Actualizar la tabla de compras
    UPDATE compras
    SET subTotal = subtotalCompra, iva = ivaCompra, total = totalCompra, cantComprada = cantidadTotal
    WHERE num = NEW.compra;
END $$

DELIMITER ;

------------------------------------------------------------------------------------------------------------------------------------------

/*2. Calcular los importes de los productos de una compra*/
--Orden de creacion: 1
DELIMITER $$

CREATE TRIGGER calcularImporteProducto
BEFORE INSERT ON compra_mat
FOR EACH ROW
BEGIN
    DECLARE precioProducto DECIMAL;

    -- Obtener el precio del material
    SELECT precio INTO precioProducto
    FROM materia_prima
    WHERE clave = NEW.materiaPrima;

    -- Calcular el importe del producto
    SET NEW.importe = NEW.cantidad * precioProducto;
END $$

DELIMITER ;

------------------------------------------------------------------------------------------------------------------------------------------
/*3. Calcular el stock de materia prima cuando se compra material*/
--Orden de creacion: 3
DELIMITER $$

CREATE TRIGGER actualizarStockMateriaPrima
AFTER INSERT ON compra_mat
FOR EACH ROW
BEGIN
    DECLARE stockActual INT;

    -- Obtener el stock actual de la materia prima
    SELECT stock INTO stockActual
    FROM materia_prima
    WHERE clave = NEW.materiaPrima;

    -- Actualizar el stock
    UPDATE materia_prima
    SET stock = stockActual + NEW.cantidad
    WHERE clave = NEW.materiaPrima;
END $$

DELIMITER ;

------------------------------------------------------------------------------------------------------------------------------------------

/*4. Calcular el costo de produccion de los vestidos*/
--Orden de creacion: 4
DELIMITER $$

CREATE TRIGGER calcular_costo_cant
BEFORE INSERT ON lotes_vestidos
FOR EACH ROW
BEGIN
    DECLARE costo_total DECIMAL;
    DECLARE cant_vestidos INT;

    -- Calcular el costo total de la materia prima utilizada en el lote
    SELECT SUM(mp.precio * mv.cantidad) INTO costo_total
    FROM mat_vestidos as mv
    INNER JOIN materia_prima as mp ON mv.mat_prima = mp.clave
    WHERE mv.vestido = NEW.cod_vestido;

    -- Calcular la cantidad de vestidos útiles restando los defectuosos
    SET cant_vestidos = NEW.cantTotalGen - NEW.cantDefectuosos;

    -- Restar la cantidad de materia prima utilizada del stock
    UPDATE materia_prima as mp
    INNER JOIN mat_vestidos as mv ON mv.mat_prima = mp.clave
    SET mp.stock = mp.stock - (mv.cantidad * NEW.cantTotalGen)
    WHERE mv.vestido = NEW.cod_vestido;

    -- Asignar el costo total y la cantidad de vestidos al nuevo lote
    SET NEW.costoProduccion = NEW.cantTotalGen * costo_total;
    SET NEW.cantVestidos = cant_vestidos;
END $$

DELIMITER ;

/*5. Calcular la cantidad total de vestidos que se incluyen en cada paquete por un lote*/
--Orden de creacion: 5
DELIMITER $$

CREATE TRIGGER calcular_paquetes
AFTER INSERT ON lotes_vestidos
FOR EACH ROW
BEGIN
    DECLARE cant_paquetes INT;
    DECLARE vestidos_sobrantes INT;

    -- Calcular la cantidad de paquetes
    SET cant_paquetes = NEW.cantVestidos DIV 20;
    SET vestidos_sobrantes = NEW.cantVestidos % 20;

    -- Insertar el primer paquete en la tabla paquete_X_lote
    INSERT INTO paquete_X_lote (cantPaquete, cantVestidos, loteVestido) 
    VALUES (cant_paquetes, 20, NEW.num);

    -- Insertar un nuevo paquete si hay vestidos sobrantes
    IF vestidos_sobrantes > 0 THEN
        INSERT INTO paquete_X_lote (cantPaquete, cantVestidos, loteVestido) 
        VALUES (1, vestidos_sobrantes, NEW.num);
    END IF;
END $$

DELIMITER ;

INSERT INTO lotes_vestidos (fechaProduccion, cantDefectuosos, cantTotalGen, cod_vestido)
VALUES ('2023-11-29', 0, 1000, 'VLGST');

SELECT * FROM vestidos LIMIT 100

CRE02 1 1000
HILO1 1 1000
TAC07 2 2000
--8

/*6. Calcular el stock de paquetes y lotes de vestidos depues de hacer un pedido*/
--Orden de creacion: 6
DELIMITER $$
CREATE TRIGGER restarStockVestidos
AFTER INSERT ON ped_paqxlote
FOR EACH ROW
BEGIN
    DECLARE paquetes_a_restar INT;
    SET paquetes_a_restar = NEW.cantidad / 20;
    UPDATE paquete_x_lote
    SET cantPaquete = cantPaquete - paquetes_a_restar
    WHERE num = NEW.paqueteLote;
    UPDATE lotes_vestidos
    SET cantVestidos = cantVestidos - NEW.cantidad
    WHERE num = (SELECT loteVestido FROM paquete_x_lote WHERE num = NEW.paqueteLote);
    END $$

DELIMITER ;

/*7. Generar pago despues de hacer el pedido*/
--Orden de creacion: 7

DELIMITER $$

CREATE TRIGGER insertar_pago
AFTER INSERT ON pedidos
FOR EACH ROW
BEGIN
    DECLARE referencia_bancaria VARCHAR(20);
    SET referencia_bancaria = LPAD(FLOOR(RAND() * POWER(10, 20)), 20, '0');
    INSERT INTO pagos (fecha, cantPagada, concepto, referenciaBancaria, saldo, pedido)
    VALUES (NEW.fecha, NEW.total, 'Pago de vestidos', referencia_bancaria, '0', NEW.num);
END $$

DELIMITER ;