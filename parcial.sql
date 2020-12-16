-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 01:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcial`
--

-- --------------------------------------------------------

--
-- Table structure for table `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `mascota` varchar(20) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mascotas`
--

INSERT INTO `mascotas` (`id`, `mascota`, `precio`, `created_at`, `updated_at`) VALUES
(1, 'perro', 3, '2020-12-16 04:07:11', '2020-12-16 04:07:11'),
(2, 'perro', 3, '2020-12-16 04:23:55', '2020-12-16 04:23:55'),
(3, 'perro', 3, '2020-12-16 04:23:57', '2020-12-16 04:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `tipoMascota` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turnos`
--

INSERT INTO `turnos` (`id`, `fecha`, `tipoMascota`, `updated_at`, `created_at`) VALUES
(1, '2020-12-15 21:18:27', 'perro', '2020-12-16 04:18:27', '2020-12-16 04:18:27'),
(2, '2020-12-15 21:21:40', 'perro', '2020-12-16 04:21:40', '2020-12-16 04:21:40'),
(3, '2020-12-15 21:23:58', 'perro', '2020-12-16 04:23:58', '2020-12-16 04:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `nombre` varchar(10) DEFAULT NULL,
  `tipo` varchar(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `clave`, `nombre`, `tipo`, `updated_at`, `created_at`) VALUES
(1, 'prdffwer@mail.com', '123lalala4', 'asd', 'admin', '2020-12-16 02:36:29', '2020-12-16 02:36:29'),
(20, NULL, NULL, NULL, '', '2020-12-16 02:46:31', '2020-12-16 02:46:31'),
(21, NULL, NULL, NULL, '', '2020-12-16 02:46:33', '2020-12-16 02:46:33'),
(22, NULL, NULL, NULL, '', '2020-12-16 02:46:54', '2020-12-16 02:46:54'),
(23, 'assdfsdfd@mail.com', '123lalala4sda', 'hola', 'admin', '2020-12-16 02:48:24', '2020-12-16 02:48:24'),
(25, 'sss@mail.com', '123lalala4sda', 'sss', 'admin', '2020-12-16 02:48:44', '2020-12-16 02:48:44'),
(36, 'ssadsds@mail.com', '123lalala4sda', 'qweweq', 'admin', '2020-12-16 02:51:14', '2020-12-16 02:51:14'),
(37, 'ssadsds@mail.com2', '123lalala4sda', 'qwewe2q', 'admin', '2020-12-16 02:51:50', '2020-12-16 02:51:50'),
(40, 'ssadsssds@mail.com2', '123laasddsalala4sda', 'qwewe2qwqe', 'admin', '2020-12-16 02:52:33', '2020-12-16 02:52:33'),
(45, 'cliente@mail.com2s', 'cliente', 'cliente', 'cliente', '2020-12-16 04:15:23', '2020-12-16 04:15:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
