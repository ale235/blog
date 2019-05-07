-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12/19/16 11:40:10
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blogdb`
--
-- USE `blogdb`;


--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`users_role_id`, `users_role_name`, `users_role_slug`) VALUES
(1, 'Administrator', 'admin'),
(2, 'Manager', 'manager'),
(3, 'User', 'user');

--
-- Dumping data for table `users_status`
--

INSERT INTO `users_status` (`users_status_id`, `users_status_name`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Disabled');





