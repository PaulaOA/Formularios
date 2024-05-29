DROP DATABASE IF EXISTS formulariosenior;

CREATE DATABASE formulariosenior;
USE formulariosenior;

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
('Plan de negocio (carga de documentos)'),
('Ruta de aprendizaje de Technovation (200 palabras y 2-6 imágenes)')
;

INSERT INTO items (descripcion, id_categoria) VALUES
('Descripción convincente del proyecto en 100 palabras que exponga claramente el
problema y la solución', 1),
('Expone claramente el problema y muestra por qué es importante para el equipo y la
comunidad.', 2),
('Explica qué ha investigado el equipo sobre el problema y cómo se relaciona con los Objetivos
de Desarrollo Sostenible de las Naciones Unidas.', 2),
('Convence al espectador de que la aplicación o la solución de IA resuelve el problema de los
usuarios.', 2),
('Explica por qué la tecnología seleccionada (prototipo de IA o aplicación móvil) es la mejor
herramienta para resolver el problema.', 2),
('Muestra cómo es una mejor solución comparada con lo que ya existe.', 2),
('Muestra qué aplicación han construido y qué partes funcionan con éxito hasta ahora.',3),
('Explica cómo se probó la aplicación con los usuarios, qué comentarios se recibieron y cómo
afectaron a las características de la aplicación.',3),
('Explica qué codificación hicieron para 1-2 partes importantes de su aplicación (no la pantalla
de inicio de sesión)',3),
('Muestra lo que aún no funciona y/o comparte futuras funciones de la aplicación.',3),
('Muestra el modelo de IA que han creado y entrenado, explicando los datos que han
recopilado y con los que han entrenado el modelo.',3),
('Explica cómo se probó el prototipo con los usuarios, qué comentarios se recibieron y cómo
afectaron a las características del prototipo.', 3),
('Muestra qué invento han construido o prototipado, explicando cómo lo han construido y
mostrando las partes que funcionan.',3),
('Muestra lo que aún no funciona y/o comparte las futuras características del prototipo.',3),
('Explica claramente la empresa y la descripción del producto en un documento bien
redactado que se apoya en gráficos pertinentes.', 4),
('Muestra qué estudios de mercado ha realizado el equipo para identificar a los usuarios
objetivo y a los principales competidores.', 4),
('Explica el plan de marketing para que el equipo consiga que nuevos usuarios utilicen su
aplicación o invento en su primer año.', 4),
('Muestra los planes financieros para poner en marcha la empresa y por qué son realistas.', 4),
('Comparte lo que el equipo ha aprendido mediante una combinación de palabras e imágenes
(por ejemplo, capturas de pantalla, prototipos). Comparte las fuentes técnicas
utilizadas/combinadas; si no hay ninguna, comparte el recurso técnico favorito.', 5),
('Describe cómo superó el equipo los retos técnicos o no técnicos.', 5)
;