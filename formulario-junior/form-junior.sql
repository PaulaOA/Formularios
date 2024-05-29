DROP DATABASE IF EXISTS formulariojunior;

CREATE DATABASE formulariojunior;
USE formulariojunior;

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
    total_categoria5 INT,
    FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo)
);

INSERT INTO categorias (nombre) VALUES 
('Descripción del problema/proyecto en 100 palabras'),
('Vídeo de lanzamiento'),
('Vídeo técnico'),
('Plan de adopción de usuarios (carga de documentos de la plantilla)'),
('Ruta de aprendizaje de Technovation (200 palabras y 2-6 imágenes)')
;

INSERT INTO items (descripcion, id_categoria) VALUES
('Descripción del proyecto', 1),
('Expone claramente el problema y muestra por qué es importante para el equipo y la
comunidad.', 2),
('Explica qué ha investigado el equipo sobre el problema y cómo se relaciona con los Objetivos
de Desarrollo Sostenible de las Naciones Unidas.', 2),
('Convence al espectador de que la aplicación o la solución de IA resuelve el problema de los
usuarios.', 2),
('Explica por qué la tecnología seleccionada (prototipo de IA o aplicación móvil) es la mejor
herramienta para resolver el problema', 2),
('Muestra cómo es una solución mejor comparada con lo que ya existe.', 2),
('Explica cómo se asegurará el equipo de que la solución tendrá un impacto positivo en los
usuarios directos o indirectos y en el planeta.
', 2),
('Explica los comentarios de los usuarios sobre el problema y la solución y muestra cómo se
han realizado los cambios en función de dichos comentarios.', 2),
('Explica los objetivos y planes futuros del proyecto', 2),
('Muestra qué aplicación han construido y qué partes funcionan correctamente hasta ahora',3),
('Explica qué codificación hicieron para 1-2 partes importantes de su aplicación (excluyendo la
pantalla de inicio de sesión)
',3),
('Muestra lo que aún no funciona y/o comparte futuras funciones de la aplicación',3),
('Muestra el modelo de IA que han creado y entrenado, explicando los datos que han
recopilado y con los que han entrenado el modelo.',3),
('Muestra qué invento han construido o prototipado, explicando cómo lo han construido y
mostrando las partes que funcionan
',3),
('Muestra lo que aún no funciona y/o comparte las futuras características del prototipo',3),
('Muestra cuántos usuarios han probado ya la aplicación o el invento, y los comentarios
recibidos.', 4),
('Explica cómo conseguirá el equipo que nuevos usuarios utilicen su aplicación o invento en su
primer año.
', 4),
('Comparte lo que el equipo ha aprendido usando texto e imágenes (por ejemplo, capturas de
pantalla, prototipos). Comparte las fuentes técnicas utilizadas/recicladas; si no hay ninguna,
comparte vuestro recurso técnico favorito.', 5),
('Describe cómo superó el equipo los retos técnicos o no técnicos', 5)
;