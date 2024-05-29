DROP DATABASE IF EXISTS formulariobeginner;

CREATE DATABASE formulariobeginner;
USE formulariobeginner;

CREATE TABLE categorias (
   id_categoria INT PRIMARY KEY AUTO_INCREMENT,
   nombre VARCHAR(255)
);

CREATE TABLE items(
   id_item INT PRIMARY KEY AUTO_INCREMENT,
   descripcion TEXT,
   id_categoria INT,
   FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

CREATE TABLE equipos(
  id_equipo INT PRIMARY KEY AUTO_INCREMENT,
  nombre_equipo varchar(60)
);

CREATE TABLE puntuaciones_temporales(
   id_puntuacion_equipo INT PRIMARY KEY AUTO_INCREMENT,
   id_item INT,
   puntuacion INT,
   id_equipo INT,
   FOREIGN KEY (id_item) REFERENCES items(id_item),
   FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo)
);

CREATE TABLE puntuaciones_definitivas(
   id_puntuacion_equipo INT PRIMARY KEY AUTO_INCREMENT,
   id_item INT,
   puntuacion INT,
   id_equipo INT,
   FOREIGN KEY (id_item) REFERENCES items(id_item),
   FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo)
);

CREATE TABLE puntuaciones_totales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_equipo INT,
    total_general INT,
    total_categoria1 INT,
    total_categoria2 INT,
    total_categoria3 INT,
    total_categoria4 INT,
    FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo)
);

INSERT INTO categorias (nombre) VALUES 
('Descripción del problema en 100 palabras'),
('Vídeo de presentación o Pitch'),
('Vídeo técnico'),
('Camino de aprendizaje de Technovation (200 palabras y 2-6 imágenes)')
;

INSERT INTO items (descripcion, id_categoria) VALUES
('Descripción convincente del proyecto en 100 palabras que exponga claramente el
problema y la solución.', 1),
('Expone el problema y muestra por qué es importante para el equipo y la comunidad.', 2),
('Explica cómo la aplicación o la solución de IA resuelve el problema de los usuarios.', 2),
('Explica por qué la tecnología seleccionada es la mejor herramienta para resolver el
problema.', 2),
('Muestra cómo la solución es mejor que las que ya existen.', 2),
('Muestra qué aplicación habéis construido y qué partes funcionan con éxito hasta ahora.',3),
('Explica cómo se probó la aplicación con los usuarios, qué comentarios se recibieron y cómo
afectaron a las características de la aplicación.',3),
('Explica qué codificación habéis hecho para 1-2 partes importantes de la aplicación (no
incluye la pantalla de inicio de sesión)',3),
('Muestra lo que aún no funciona y/o comparte futuras funciones de la aplicación.',3),
('Muestra el modelo de IA que han creado y entrenado, explicando los datos que han
recopilado y con los que han entrenado el modelo',3),
('Explica cómo se probó el prototipo con los usuarios, qué comentarios se recibieron y cómo
afectaron a las características de la prototipo.',3),
('Muestra qué producto habéis construido o prototipado, explicando cómo lo habéis construido
mostrando las partes que funcionan.', 3),
('Muestra lo que aún no funciona y/o comparte las futuras características del prototipo.', 3),
('Comparte lo que el equipo ha aprendido mediante una combinación de texto e imágenes
(por ejemplo, capturas de pantalla, prototipos). Comparte las fuentes técnicas
utilizadas/remezcladas; si no hay ninguna, comparte vuestro recurso técnico favorito.', 4)
;