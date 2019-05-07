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


--
-- 2- view_survery
--

CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `view_survery` 
    AS
(
SELECT
    `survey`.`survey_id`
    , `survey`.`question`
    , `survey`.`slug`
    , `survey`.`created_at`
    , `survey`.`updated_at`
    , DATE_FORMAT(`survey`.`created_at`, '%m/%d/%Y %H:%i:%s') AS `created_at_us`
    , `survey`.`active`
    , `response`.`response_id`
    , `response`.`response_text`
FROM
    `response`
    INNER JOIN `survey` 
        ON (`response`.`survey_id` = `survey`.`survey_id`)
);


--
-- 3- view_users_survey
--

CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `view_users_survey` 
    AS
(
SELECT
	`users_survey`.`users_survey_id`
    , `users_survey`.`users_id`
    , `users_survey`.`response_id`
    , `view_survery`.`response_text`
    , `users_survey`.`seen`
    , `users_survey`.`created_at` AS voted_at
    , DATE_FORMAT(`users_survey`.`created_at`, '%m/%d/%Y %H:%i:%s') AS `voted_at_us`
    , `view_survery`.`survey_id`
    , `view_survery`.`question`
    , `view_survery`.`slug`
    , `view_survery`.`created_at`
    , `view_survery`.`created_at_us`
    , `view_survery`.`updated_at`
    , `view_survery`.`active`
FROM
    `users_survey`
    INNER JOIN `view_survery` 
        ON (`users_survey`.`response_id` = `view_survery`.`response_id`)
);


--
-- 4- view_post
--

CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `view_post` 
    AS
(
SELECT
    `post`.`post_id`
    , `post`.`title`
    , `post`.`slug`
	, `post`.`description`
    , `post`.`summary`
    , `post`.`content`
    , `post`.`seen`
    , `post`.`published`
    , `post`.`created_at`
    , `post`.`updated_at`
    , DATE_FORMAT(`post`.`created_at`, '%m/%d/%Y %H:%i:%s') AS `created_at_us`
    , DATE_FORMAT(`post`.`updated_at`, '%m/%d/%Y %H:%i:%s') AS `updated_at_us`
    , `post`.`users_id`
    , `users`.`username`
FROM
    `post`
    LEFT JOIN `users` 
        ON (`post`.`users_id` = `users`.`users_id`)
);



























