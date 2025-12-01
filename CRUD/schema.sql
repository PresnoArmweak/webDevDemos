-- Library Nook starter schema (updated with motivational + programming titles)
DROP DATABASE IF EXISTS cruddy;
CREATE DATABASE cruddy CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cruddy;

CREATE TABLE genres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  genre_id INT NOT NULL,
  title VARCHAR(180) NOT NULL,
  author VARCHAR(140) NOT NULL,
  price DECIMAL(7,2) NOT NULL DEFAULT 0,
  CONSTRAINT fk_books_genre FOREIGN KEY (genre_id) REFERENCES genres(id)
);

-- Seed genres
INSERT INTO genres (name) VALUES
('Motivation'),
('Programming'),
('Productivity'),
('Personal Growth');

-- Seed books (student-relevant selection)
INSERT INTO books (genre_id, title, author, price) VALUES
(1, 'Atomic Habits', 'James Clear', 14.99),
(1, 'Grit: The Power of Passion and Perseverance', 'Angela Duckworth', 13.50),
(2, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 29.95),
(2, 'The Pragmatic Programmer', 'Andrew Hunt & David Thomas', 31.00),
(3, 'Deep Work', 'Cal Newport', 17.99),
(4, 'Mindset: The New Psychology of Success', 'Carol S. Dweck', 16.00);