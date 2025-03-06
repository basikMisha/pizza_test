CREATE DATABASE TEST_TASK;
USE TEST_TASK;

CREATE TABLE pizzas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    size_cm INT NOT NULL,
    price DECIMAL(5,2) NOT NULL
);
CREATE TABLE sauces (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(4,2) NOT NULL
);

insert into sauces(name, price) values 
("сырный", 2.50),
("кисло-сладкий", 2.50),
("чесночный", 2.50),
("барбекю", 2.50);

insert into pizzas(name, size_cm, price) values 
('Пепперони', 21, 5.00),
('Пепперони', 26, 6.50),
('Пепперони', 31, 8.00),
('Пепперони', 45, 11.00),

('Гавайская', 21, 4.50),
('Гавайская', 26, 6.00),
('Гавайская', 31, 7.50),
('Гавайская', 45, 10.00),

('Деревенская', 21, 4.80),
('Деревенская', 26, 6.30),
('Деревенская', 31, 8.20),
('Деревенская', 45, 11.50),

('Грибная', 21, 4.30),
('Грибная', 26, 5.90),
('Грибная', 31, 7.20),
('Грибная', 45, 9.80);
