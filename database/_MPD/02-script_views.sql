-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2015 at 04:18 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lendindex_app`
--

USE `blogdb`;

--
-- 1- view_users
--

CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `view_users` 
    AS
(
SELECT
    `users`.`users_id`
    , `users`.`username`
    , `users`.`email`
    , `users`.`password`
    , `users`.`phone`
    , `users`.`remember_token`
    , `users`.`avatar`
    , `users`.`seen`
    , `users`.`confirmed`
    , `users`.`confirmation_code`
    , `users`.`created_at`
    , `users`.`updated_at`
    , DATE_FORMAT(`users`.`created_at`, '%m/%d/%Y %H:%i:%s') AS `created_at_us`
    , DATE_FORMAT(`users`.`updated_at`, '%m/%d/%Y %H:%i:%s') AS `updated_at_us`
    , `users`.`users_role_id`
    , `users_role`.`users_role_name`
    , `users_role`.`users_role_slug`
    , `users`.`users_status_id`
    , `users_status`.`users_status_name`
    , `users`.`facebook_id`
    , `users`.`twitter_id`
    , `users`.`google_id`
FROM
    `users`
    INNER JOIN `users_role` 
        ON (`users`.`users_role_id` = `users_role`.`users_role_id`)
    INNER JOIN `users_status` 
        ON (`users`.`users_status_id` = `users_status`.`users_status_id`)

);



