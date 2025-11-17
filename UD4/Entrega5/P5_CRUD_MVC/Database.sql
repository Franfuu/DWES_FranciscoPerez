USE dwes;

CREATE TABLE ud4_coches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    anio INT NOT NULL
);

INSERT INTO ud4_coches (marca, modelo, anio) VALUES
('Toyota', 'Corolla', 2020),
('Honda', 'Civic', 2018),
('Ford', 'Focus', 2019);