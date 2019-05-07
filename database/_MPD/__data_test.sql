-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2016 at 05:33 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blogdb`
--

USE `blogdb`;




--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `facebook_id`, `twitter_id`, `google_id`, `username`, `email`, `password`, `phone`, `remember_token`, `avatar`, `seen`, `confirmed`, `confirmation_code`, `created_at`, `updated_at`, `users_status_id`, `users_role_id`) VALUES
(3, NULL, NULL, NULL, 'Adnin', 'admin@gmail.com', '$2y$10$VAAwjDs0gRE0VV6N2IjAWepl70GMkZDMs7qFxLZ0x2PFkPQ6AgaDq', '', NULL, NULL, 0, 0, NULL, '2016-12-23 05:52:34', '2016-12-23 00:52:34', 1, 1),
(6, NULL, NULL, NULL, 'Halim', 'halim@gmail.com', '$2y$10$Hd8ZBuqdsQEQJT97KI3Otu2trDOku01vCB/NPcPf8559VVanAJ7tW', '', NULL, NULL, 0, 0, NULL, '2016-12-25 08:50:39', '2016-12-25 03:50:39', 1, 1),
(9, NULL, NULL, NULL, 'sdfsdf', 'userf@gmail.com', '$2y$10$cQNF7a1lP3NpWOuqcxdfs.2Mi3NMvCkb8W3sOlkxLR7CIFJ.5cuMO', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:27:14', '2016-12-25 05:27:14', 2, 3),
(10, NULL, NULL, NULL, 'sdfsdfsdfsdf', 'userx@gmail.com', '$2y$10$kOoiu5Ge2a/xT0LlxetrReNlRLORIZeJS4Q7AdRgcTOdjkCNMfLKa', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:27:18', '2016-12-25 05:27:18', 2, 3),
(13, NULL, NULL, NULL, 'ppppppp', 'userd@gmail.com', '$2y$10$4qF0rmkmFhKI6Mvigoo8uOrOQ7/FDsVi5sc7kdQSEctTNWjs56SzK', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:27:30', '2016-12-25 05:27:30', 2, 3),
(14, NULL, NULL, NULL, 'qe424rwe', 'userr@gmail.com', '$2y$10$AFVEGLTpOOgJoiMnFmQ9P.KfvJ9yWwgOQUqqma.5b5o9T1FhVOMwu', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:27:35', '2016-12-25 05:27:35', 2, 3),
(15, NULL, NULL, NULL, '123qwe', 'userxdf@gmail.com', '$2y$10$HwFiPHPAUGe7SNuVXMeMz.xWof9hH7HQU4HEupEYKHJe7RJ4TKBBi', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:27:42', '2016-12-25 05:27:42', 2, 3),
(16, NULL, NULL, NULL, 'sdfsdf', 'userem@gmail.com', '$2y$10$NW.T0ad/EQSVJx4.VkT6cemRoS4xTqebEQmt03fzXk8Kzo.gWEXtK', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:27:46', '2016-12-25 05:27:46', 2, 3),
(17, NULL, NULL, NULL, 'wer', 'userg@gmail.com', '$2y$10$RjAop4o76uE4VJseaHceLuPXJEgUQ5IMNPxvRmw7v59GZIx8gFEke', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:27:50', '2016-12-25 05:27:50', 2, 3),
(18, NULL, NULL, NULL, 'werwer', 'usert@gmail.com', '$2y$10$aA8WLTsrOKchLxt.zmj3gu2O75IOGbYXvlWjnTGoQ662cAhmaQdVa', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:27:52', '2016-12-25 05:27:52', 2, 3),
(19, NULL, NULL, NULL, 'sdfsdf', 'userda@gmail.com', '$2y$10$SQZ7NA9doiVjEynJkeaR1.Rv0iLQAtgPCDV/iuxQWxZBmHtzYy7fK', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:29:32', '2016-12-25 05:29:32', 2, 3),
(20, NULL, NULL, NULL, 'sdfsdfsdf', 'userk@gmail.com', '$2y$10$3zY2JABRr.ZBn3HNBTZ8Eu8jmXYN4A6yVxb7115VIFOYhmYgrIbWe', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:29:35', '2016-12-25 05:29:35', 2, 3),
(21, NULL, NULL, NULL, 'dsfsdf', 'userdsfu@gmail.com', '$2y$10$zYsWnpXy1A6TDq6e4V/1YO7tDb0RsDvYS3mioAsDphCXEfVp68qN2', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:29:42', '2016-12-25 05:29:42', 2, 3),
(22, NULL, NULL, NULL, 'sfdsf', 'usedro@gmail.com', '$2y$10$3tF3Cp3sJEGoPKvkLyBUSuwlchzU3nxPsVCIt9EkEfoFuNjc6AaY6', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:29:46', '2016-12-25 05:29:46', 2, 3),
(23, NULL, NULL, NULL, 'sdfsdfsdf', 'ussdferc@gmail.com', '$2y$10$1Vb1yvpxr.XGXoKxsNOXVOimpS8esYrA14b9bq4z5lPbAuTk1SfH.', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:29:50', '2016-12-25 05:29:50', 2, 3),
(24, NULL, NULL, NULL, 'sdfsdfsfd', 'ussdferj@gmail.com', '$2y$10$IBcVyWox.aYIGoE4at83k.anBpBe4Xf1nHQK44pQn.LG88ZkYde3m', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:29:54', '2016-12-25 05:29:54', 2, 3),
(25, NULL, NULL, NULL, 'sdfsdfsdf', 'usersdffdr@gmail.com', '$2y$10$9h30BvXHo7x4A/PMV9GSW.f3xjNfvjqG/j55yU9NMFDdYlicyLR3G', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:00', '2016-12-25 05:30:00', 2, 3),
(26, NULL, NULL, NULL, 'sdfsdfsf', 'ussdsderb@gmail.com', '$2y$10$KaDirBkP7veXOd69z/6x/OO8vwXe7fFyKg/2yPQflG2/aXA1AW6FG', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:04', '2016-12-25 05:30:04', 2, 3),
(27, NULL, NULL, NULL, 'sdfsdfsf', 'usesdfsfrr@gmail.com', '$2y$10$TS0p2WX8UyNE5m/tUM0n1uX3T4riSS62LKk7.m89/ceGfWYqNgybO', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:09', '2016-12-25 05:30:09', 2, 3),
(28, NULL, NULL, NULL, 'sdfsfwerwer', 'usefsdfrx@gmail.com', '$2y$10$KoqNCpcv9dY1cI/pXm0AkOJDD/qLMNV0KumMZllUNaPdv2TOUn/U.', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:13', '2016-12-25 05:30:13', 2, 3),
(29, NULL, NULL, NULL, 'wersdfs', 'usersdffo@gmail.com', '$2y$10$kw7ZIeDEbQu5mOJVreYj9.Uyw64OWIxAa/cKry0uz0rXUzancq4.e', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:18', '2016-12-25 05:30:18', 2, 3),
(30, NULL, NULL, NULL, 'setert', 'usfdery@gmail.com', '$2y$10$ipqVtFK/uL2E2jfZT6St4ekOSXGpCK0Y5F4mM8KzSejJb2eMZTiEa', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:24', '2016-12-25 05:30:24', 2, 3),
(31, NULL, NULL, NULL, 'erttert', 'ertertuserj@gmail.com', '$2y$10$ohLYgKs4xg59l2dzUuwlyu7ilxuNw7TKd2KswfzpdPMV5hJnLDOAC', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:28', '2016-12-25 05:30:28', 2, 3),
(32, NULL, NULL, NULL, 'ertuututyu', 'ustyutuerp@gmail.com', '$2y$10$vEhD9IySPVZsgHGiKLh/1eirN/XQzqI.y9VNXofhiA.JWavVOz6Zu', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:33', '2016-12-25 05:30:33', 2, 3),
(33, NULL, NULL, NULL, 'jljljk', 'usehjrq@gmail.com', '$2y$10$dcwD.fUz296NvlNzmw6NgeFkJlWDvi5.m4b68/aIl02N16RGBA2ZK', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:40', '2016-12-25 05:30:40', 2, 3),
(34, NULL, NULL, NULL, 'ghjj', 'ushjeru@gmail.com', '$2y$10$7exCok2noneNFvs99AKoWuZWzILasQ46XsV9oYDKCB1tLo/z3ELXe', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:43', '2016-12-25 05:30:43', 2, 3),
(35, NULL, NULL, NULL, 'gjgh', 'usghjera@gmail.com', '$2y$10$MQSpGA5th.oRzNYHSWrOYOfExJOIk3efInmV4pqCR9XB4JhJh29Sm', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:47', '2016-12-25 05:30:47', 2, 3),
(36, NULL, NULL, NULL, 'ghjghj', 'useghjro@gmail.com', '$2y$10$BfTHczMLw67VkKwtBN172ujMsIWEtjqWrSfoJI3UdIT1OxbvFMNxm', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:51', '2016-12-25 05:30:51', 2, 3),
(37, NULL, NULL, NULL, 'ghjghj', 'ghjghuserb@gmail.com', '$2y$10$BftIFQi7uWI8F5PLK2syAuiNzx/lUs3al9eAP4VzlB9jr/dMuIopy', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:30:54', '2016-12-25 05:30:54', 2, 3),
(38, NULL, NULL, NULL, 'dfgdfg', 'useraddg@gmail.com', '$2y$10$mzLC0BrgO/wA4YprEKHvqufvMI1o1rSvQ8KnbXSFRkXs6Jtmad73q', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:03', '2016-12-25 05:31:03', 2, 3),
(39, NULL, NULL, NULL, 'dfgdg', 'usdfgdgert@gmail.com', '$2y$10$Xj9V9MtMTQrgqTCl7HzTqeQe3Qkf7uyaAuQLSwtdYGtQsFJEseclG', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:06', '2016-12-25 05:31:06', 2, 3),
(40, NULL, NULL, NULL, 'dfgdgd', 'dfgdgusery@gmail.com', '$2y$10$B3yugQ1pkOLVUc.TJkUZ4e1pF3GnBvm31LNvkV6ykGuAJstvn5v/K', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:10', '2016-12-25 05:31:10', 2, 3),
(41, NULL, NULL, NULL, 'dfgdfgd', 'usdgdgerq@gmail.com', '$2y$10$JlxsBs9Ha3wHCxZc5cyeJ.yqP7HgV1sv5YoG8VEnLncPeJOi6DhBu', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:13', '2016-12-25 05:31:13', 2, 3),
(42, NULL, NULL, NULL, 'dgdfgdfg', 'userq@gmail.com', '$2y$10$7pnfAkg5B99GQhbt7dZ6iOWFwJy2O9nkFK6QtBcvr4ER0EgK1X1ey', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:17', '2016-12-25 05:31:17', 2, 3),
(43, NULL, NULL, NULL, 'dfgdgdg', 'usere@gmail.com', '$2y$10$IPIX2fc8ZFqqhH09ElJlRu/tjudmJNNZOffJNCP9W6ziXbRtvPRfS', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:20', '2016-12-25 05:31:20', 2, 3),
(44, NULL, NULL, NULL, 'dfgdgdg', 'usern@gmail.com', '$2y$10$ZyydPQZ9thNh7gNrW0l/W.BzitxsZqtUWgg8/z7KqW5ANhydVyVUa', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:23', '2016-12-25 05:31:23', 2, 3),
(45, NULL, NULL, NULL, 'ouiououo', 'usdfgdert@gmail.com', '$2y$10$0X/8GO1OYKe1T7YM84rKeOjvmpt4fR/UPTne27b2ulkQSTR16bJwO', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:28', '2016-12-25 05:31:28', 2, 3),
(46, NULL, NULL, NULL, 'dgdfgdfg', 'usedfgdgrc@gmail.com', '$2y$10$ULtM4Bah2yxeJKQjfOO9AOgsrzMXd3WdUXmfylbphVx22jgRPuyLu', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:33', '2016-12-25 05:31:33', 2, 3),
(47, NULL, NULL, NULL, 'dfgdfgd', 'usedgdgri@gmail.com', '$2y$10$7gON449fCnisjfkjQN00b.K.rr6S64GMMlX25hRsX4MoLOfzsWeHS', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:37', '2016-12-25 05:31:37', 2, 3),
(48, NULL, NULL, NULL, 'ewrwer', 'usefgrm@gmail.com', '$2y$10$siDE1tQkJccj8vSOE/TLyuyrjpLH0Xtad3.mGwRFryWeW8YNBmGl2', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:41', '2016-12-25 05:31:41', 2, 3),
(49, NULL, NULL, NULL, 'dfgdg', 'usedfggrf@gmail.com', '$2y$10$GfK29.rVmete9pE2.FMHUuxYpMPQHcx5lSD1j7ja7tblAmV4ueG52', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:50', '2016-12-25 05:31:50', 2, 3),
(50, NULL, NULL, NULL, 'dgdgdg', 'usdfgerv@gmail.com', '$2y$10$UT39mIutrVQTRzP45m1uruYfNfmnNWs3h.3j3ZX/NMYf4B9Hym3g6', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:54', '2016-12-25 05:31:54', 2, 3),
(51, NULL, NULL, NULL, 'dfgdg', 'userfdgo@gmail.com', '$2y$10$ijWPgtIHpCLIhTQDD71W2eq3lAzGqYt8EF.MJWrJj0.Iu1QJYWyFW', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:31:58', '2016-12-25 05:31:58', 2, 3),
(52, NULL, NULL, NULL, 'dgdg', 'usdgdgerk@gmail.com', '$2y$10$KuKLtqa6uyxto7eVyCe/Bub5ptHWPBbxWDVqq3.D9tLi7QZhYsTKe', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:32:02', '2016-12-25 05:32:02', 2, 3),
(53, NULL, NULL, NULL, 'dgdg', 'userxdfg@gmail.com', '$2y$10$vZl4CzyuZNXJLUzwM1MnTeRd5yUofNYJDg1ozCkgJWUHQmvN0vSAq', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:32:06', '2016-12-25 05:32:06', 2, 3),
(54, NULL, NULL, NULL, 'dfgdg', 'usegfgrt@gmail.com', '$2y$10$hj2xGZ4pPArcYNXqQHv5Q.ignMapFF//4TrwdOsE/yezjbwvaW3je', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:32:12', '2016-12-25 05:32:12', 2, 3),
(55, NULL, NULL, NULL, 'sdfsdfsdfsdf', 'sdfusery@gmail.com', '$2y$10$KjAmO2oJSLM0WyZOpFRPRe069T5AwHa7KZBYWcl7u0o1SVst7Ww3.', '', NULL, NULL, 0, 0, NULL, '2016-12-25 10:32:23', '2016-12-25 05:32:23', 2, 3);
