CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
);
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `rol` enum('usuario','admin') DEFAULT 'usuario',
  PRIMARY KEY (`id_usuario`)
);
CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
);
CREATE TABLE `productos_pedidos` (
  `id_pedido` int(5) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`,`id_producto`),

);



INSERT INTO productos (nombre, descripcion, precio,imagen) VALUES
('iPhone 12 Pro', 'Smartphone de Apple con cámara triple y pantalla OLED', 1099.99,'iphone12pro.jpg'),
('Samsung Galaxy S21 Ultra', 'Smartphone de Samsung con cámara cuádruple y pantalla AMOLED', 1199.99,'samsunggalaxys21ultra.webp'),
('Google Pixel 5', 'Smartphone de Google con cámara de calidad fotográfica y Android puro', 699.99,'googlepixel5.jpg'),
('OnePlus 9 Pro', 'Smartphone de OnePlus con pantalla Fluid AMOLED y carga rápida', 999.99,'oneplus9pro.jpg'),
('Xiaomi Mi 11', 'Smartphone de Xiaomi con procesador Snapdragon 888 y pantalla AMOLED', 799.99, 'xiaomimi11.jpg'),
('Sony Xperia 1 III', 'Smartphone de Sony con pantalla 4K HDR OLED y cámara de alta calidad', 1299.99,'sonyxperia1III.jpg'),
('LG Wing', 'Smartphone de LG con pantalla giratoria y cámara de 64 MP', 999.99,'lgwing.jpg'),
('Motorola Moto G Power (2021)', 'Smartphone de Motorola con batería de larga duración y cámara de 48 MP', 249.99,'motorolamotogpower2021.jpg'),
('Nokia 8.3 5G', 'Smartphone de Nokia con conectividad 5G y cámara de 64 MP', 699.99,'nokia835g.jpg'),
('Realme X50 Pro', 'Smartphone de Realme con procesador Snapdragon 865 y carga rápida', 799.99,'realmex50pro.jpg'),
('Huawei P40 Pro', 'Smartphone de Huawei con cámara cuádruple Leica y pantalla OLED', 999.99,'huaweip40pro.webp'),
('Oppo Find X3 Pro', 'Smartphone de Oppo con pantalla AMOLED y cámara de 50 MP', 1199.99,'oppofindx3pro.webp'),
('Asus ROG Phone 5', 'Smartphone gaming de Asus con procesador Snapdragon 888 y pantalla AMOLED', 899.99,'asusrogphone5.webp'),
('Vivo X60 Pro', 'Smartphone de Vivo con cámara gimbal y pantalla AMOLED', 799.99,'vivox60pro.jpg'),
('Lenovo Legion Phone Duel 2', 'Smartphone gaming de Lenovo con pantalla AMOLED y carga rápida', 999.99,'lenovolegionphoneduel2.jpg'),
('BlackBerry Key2', 'Smartphone con teclado físico de BlackBerry y seguridad enfocada en la privacidad', 699.99,'blackberrykey2.jpg'),
('Redmi Note 10 Pro', 'Smartphone de Redmi con cámara de 108 MP y batería de larga duración', 299.99,'redminote10pro.webp'),
('Poco X3 Pro', 'Smartphone de Poco con procesador Snapdragon 860 y pantalla de 120 Hz', 249.99,'pocox3pro.jpg'),
('ZTE Axon 30 Ultra', 'Smartphone de ZTE con cámara de 64 MP y carga rápida', 749.99,'zteaxon30ultra.jpg'),
('Honor 20', 'Smartphone de Honor con cámara cuádruple y procesador Kirin 980', 399.99,'honor20.jpg'),
('Realme GT', 'Smartphone de Realme con procesador Snapdragon 888 y pantalla AMOLED', 599.99,'realmegt.jpg'),
('Motorola Edge Plus', 'Smartphone de Motorola con pantalla OLED y cámara de 108 MP', 999.99,'motorolaedgeplus.jpg'),
('Xiaomi Redmi 9', 'Smartphone económico de Xiaomi con batería de larga duración', 149.99,'xiaomiredmi9.jpg'),
('Samsung Galaxy A52', 'Smartphone de Samsung con cámara cuádruple y pantalla Super AMOLED', 349.99,'samsunggalaxya52.jpg'),
('Google Pixel 4a', 'Smartphone de Google con cámara de calidad fotográfica y Android puro', 349.99,'googlepixel4a.jpg'),
('iPhone SE (2020)', 'Smartphone económico de Apple con procesador A13 Bionic', 399.99,'iphonese2020.webp'),
('OnePlus Nord', 'Smartphone de OnePlus con pantalla AMOLED y carga rápida', 499.99,'oneplusnord.jpg'),
('Sony Xperia 5 II', 'Smartphone de Sony con pantalla OLED y cámara de alta calidad', 899.99,'sonyxperia5II.webp'),
('LG Velvet', 'Smartphone de LG con pantalla OLED y diseño elegante', 699.99,'lgvelvet.jpg'),
('Motorola Moto G Stylus (2021)', 'Smartphone de Motorola con lápiz óptico y cámara de 48 MP', 299.99,'motorolamotogstylus2021.jpg'),
('Nokia 5.4', 'Smartphone de Nokia con cámara cuádruple y batería de larga duración', 249.99,'nokia54.webp'),
('Realme 8 Pro', 'Smartphone de Realme con cámara de 108 MP y pantalla AMOLED', 299.99,'realme8pro.jpg'),
('Huawei Mate 40 Pro', 'Smartphone de Huawei con procesador Kirin 9000 y pantalla OLED', 1099.99,'huaweimate40pro.png'),
('Oppo Reno 5 Pro', 'Smartphone de Oppo con pantalla AMOLED y carga rápida', 599.99,'opporeno5pro.jpg'),
('Asus ZenFone 8', 'Smartphone de Asus con pantalla AMOLED y procesador Snapdragon 888', 699.99,'asuszenofone8.jpg'),
('Vivo V21', 'Smartphone de Vivo con cámara frontal de 44 MP y pantalla AMOLED', 499.99,'vivov21.jpg'),
('Lenovo K12 Note', 'Smartphone de Lenovo con batería de larga duración y cámara de 64 MP', 199.99,'lenovok12note.jpg'),
('BlackBerry Evolve', 'Smartphone de BlackBerry con diseño elegante y batería de larga duración', 399.99,'blackberryevolve.jpg'),
('Redmi Note 9 Pro', 'Smartphone de Redmi con cámara cuádruple y batería de larga duración', 249.99,'redminote9pro.jpg'),
('Poco M3', 'Smartphone económico de Poco con batería de larga duración', 149.99,'pocom3.jpg'),
('ZTE Blade V2020', 'Smartphone de ZTE con cámara cuádruple y pantalla de 6.82 pulgadas', 199.99,'ztebladev2020.jpg'),
('Honor 10', 'Smartphone de Honor con procesador Kirin 970 y cámara dual', 299.99,'honor10.jpg');