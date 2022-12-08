 SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: carta
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla clientes
--

CREATE TABLE IF NOT EXISTS clientes (
  id int(11) NOT NULL,
  nombre varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  correo varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  celular varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  direccion text COLLATE utf8_unicode_ci NOT NULL,
  creado datetime NOT NULL,
  modificado datetime NOT NULL,
  estado enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla clientes
--

INSERT INTO clientes (id, nombre, correo, celular, direccion, creado, modificado, estado) VALUES
(2, 'Usuario_PSP', 'PSP_prueba_PSP@gmail.com', '900099900', 'Colombia, Bogota', '2020-11-21 08:21:25', '2020-11-21 08:21:25', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla mis_productos
--

CREATE TABLE IF NOT EXISTS mis_productos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  descripcion text COLLATE utf8_unicode_ci NOT NULL,
  imagen VARCHAR(512) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL,
  precio float(10,2) NOT NULL,
  creado datetime NOT NULL,
  modificado datetime NOT NULL,
  estado enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla mis_productos
--

INSERT INTO mis_productos (id, nombre, descripcion, imagen, precio, creado, modificado, estado) VALUES
( 1, 'Producto_001', 'Tapabocas', 'img\tapaBocas\tapabocas_1.jpg', 5000, '2020-11-21 08:21:25', '2020-11-21 08:21:25', '1'),
( 2, 'Producto_002', 'Overol', 'img\overol\overol_1.jpg', 30000, '2020-11-21 08:21:25', '2020-11-21 08:21:25', '1'),
( 3, 'Producto_003', 'Overol', 'img\overol\overol_2.jpg', 35000, '2020-11-21 08:21:25', '2020-11-21 08:21:25', '1'),
( 4, 'Producto_004', 'Tapabocas', 'img\tapaBocas\tapabocas_2.jpg', 15000, '2020-11-21 08:21:25', '2020-11-21 08:21:25', '1'),
( 5, 'Producto_005', 'Tapabocas', 'img\tapaBocas\tapabocas_3.jpg', 25000, '2020-11-21 08:21:25', '2020-11-21 08:21:25', '1'),
( 6, 'Producto_006', 'Tapabocas', 'img\tapaBocas\tapabocas_4.jpg', 10000, '2020-11-21 08:21:25', '2020-11-21 08:21:25', '1'),
( 7, 'Producto_007', 'Tapabocas', 'img\tapaBocas\tapabocas_5.jpg', 12000, '2020-11-21 08:21:25', '2020-11-21 08:21:25', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla orden
--

CREATE TABLE IF NOT EXISTS orden (
  id int(11) NOT NULL AUTO_INCREMENT,
  customer_id int(11) NOT NULL,
  total_precio float(10,2) NOT NULL,
  creado datetime NOT NULL,
  modificado datetime NOT NULL,
  estado enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (id),
  KEY customer_id (customer_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla orden
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla orden_articulos
--

CREATE TABLE IF NOT EXISTS orden_articulos (
  id int(11) NOT NULL AUTO_INCREMENT,
  order_id int(11) NOT NULL,
  product_id int(11) NOT NULL,
  cantidad int(5) NOT NULL,
  PRIMARY KEY (id),
  KEY order_id (order_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla orden_articulos
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla orden
--
ALTER TABLE orden
  ADD CONSTRAINT orden_ibfk_1 FOREIGN KEY (customer_id) REFERENCES clientes (id) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla orden_articulos
--
ALTER TABLE orden_articulos
  ADD CONSTRAINT orden_articulos_ibfk_1 FOREIGN KEY (order_id) REFERENCES orden (id) ON DELETE CASCADE ON UPDATE NO ACTION;
