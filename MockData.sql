CREATE DATABASE trello;

USE trello;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  email varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  password varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  role varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  status int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  description text COLLATE utf8mb4_general_ci,
  img varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  user_id int NOT NULL,
  status int DEFAULT NULL,
  comment text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Ataylab insert intosiga qiymat bermadim,  kirishda registratsiya qilib kirsangiz va task qo'shsangiz keyin toliq natija korinadi. bomasam ID lar boshqacha bolib qoladi.
-- Registratsiya qilganingizda databasaga Rolga user deb yozadi siz uni Admin deb qoyishingiz kerak