{\rtf1\ansi\ansicpg1252\cocoartf1671
{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\paperw11900\paperh16840\margl1440\margr1440\vieww10800\viewh8400\viewkind0
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0

\f0\fs24 \cf0 -- phpMyAdmin SQL Dump\
-- version 4.8.3\
-- https://www.phpmyadmin.net/\
--\
-- Host: localhost:8889\
-- Generation Time: Apr 29, 2019 at 07:07 AM\
-- Server version: 5.7.23\
-- PHP Version: 7.2.8\
\
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";\
SET time_zone = "+00:00";\
\
--\
-- Database: `blog_samples`\
--\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `tbl_user_tokens`\
--\
\
CREATE TABLE `tbl_user_tokens` (\
  `fname` varchar(50) NOT NULL,\
  `lname` varchar(50) NOT NULL,\
  `email` varchar(50) NOT NULL,\
  `token` varchar(500) NOT NULL,\
  `id` int(11) NOT NULL,\
  `expiredate` int(30) NOT NULL,\
  `totalrequests` int(11) NOT NULL DEFAULT '0',\
  `dayrequests` int(11) NOT NULL DEFAULT '0',\
  `currentdate` date NOT NULL DEFAULT '1111-11-11'\
) ENGINE=InnoDB DEFAULT CHARSET=utf8;\
\
--\
-- Dumping data for table `tbl_user_tokens`\
--\
\
INSERT INTO `tbl_user_tokens` (`fname`, `lname`, `email`, `token`, `id`, `expiredate`, `totalrequests`, `dayrequests`, `currentdate`) VALUES\
('Killian', 'Henlew', 'Killian@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU0NzIzMjM0LCJuYmYiOjE1NTQ3MjQyMzQsImRhdGEiOnsiZmlyc3RuYW1lIjoiS2lsbGlhbiIsImxhc3RuYW1lIjoiSGVubGV3IiwiZW1haWwiOiJLaWxsaWFuQGdtYWlsLmNvbSJ9fQ.QBBgBuffl3kDXh2RFltCneXybbsUu8DbTSdtdDwkYt0', 3, 0, 0, 0, '1111-11-11'),\
('Peter', 'McFee', 'Petet@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1Njc2ODYxLCJuYmYiOjE1NTU2Nzc4NjEsImRhdGEiOnsiZmlyc3RuYW1lIjoiUGV0ZXIiLCJsYXN0bmFtZSI6Ik1jRmVlIiwiZW1haWwiOiJQZXRldEBnbWFpbC5jb20ifX0.tNq2Tt5WUF0R6XTM0GsfT1oSN4jNvMWB7g-cqMNaeRQ', 8, 0, 1, 1, '2019-04-19'),\
('Peter', 'McFee', 'Peter@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzAwODk0LCJuYmYiOjE1NTU3MDE4OTQsImRhdGEiOnsiZmlyc3RuYW1lIjoiUGV0ZXIiLCJsYXN0bmFtZSI6Ik1jRmVlIiwiZW1haWwiOiJQZXRlckBnbWFpbC5jb20ifX0.cN2m26QBeVav0BROK1mkJv1zFaSdYGyBlAcALx7-34I', 9, 1587300445, 135, 2, '2019-04-22'),\
('Sam', 'McKeon', 'Sam@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY3ODU5LCJuYmYiOjE1NTU3Njg4NTksImRhdGEiOnsiZmlyc3RuYW1lIjoiU2FtIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlNhbUBnbWFpbC5jb20ifX0.nRRX-vNlXankN2hbJ5KnH_ltznYcR1Rkbmd82qJCrlI', 11, 1587391259, 135, 135, '2019-04-22'),\
('Ricky', 'Peterson', 'Ricky@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY4NzkzLCJuYmYiOjE1NTU3Njk3OTMsImRhdGEiOnsiZmlyc3RuYW1lIjoiUmlja3kiLCJsYXN0bmFtZSI6IlBldGVyc29uIiwiZW1haWwiOiJSaWNreUBnbWFpbC5jb20ifX0.wqPZ5-Oc6IheiulfUeuo_fTYLyBAwXFFMph2zFY1doY', 14, 1587392193, 0, 0, '2019-04-20'),\
('Henry', 'Ferrell', 'Henry@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY5MDM5LCJuYmYiOjE1NTU3NzAwMzksImRhdGEiOnsiZmlyc3RuYW1lIjoiSGVucnkiLCJsYXN0bmFtZSI6IkZlcnJlbGwiLCJlbWFpbCI6IkhlbnJ5QGdtYWlsLmNvbSJ9fQ.2jYL5sLhHZEjjlkWeJ1lg5J0tWvKSok60Yoa2YY878w', 16, 1587392439, 0, 0, '2019-04-20'),\
('Paul', 'Kearney', 'Paul@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY5MDc5LCJuYmYiOjE1NTU3NzAwNzksImRhdGEiOnsiZmlyc3RuYW1lIjoiUGF1bCIsImxhc3RuYW1lIjoiS2Vhcm5leSIsImVtYWlsIjoiUGF1bEBnbWFpbC5jb20ifX0.p2Cogly3aW9WsrxdvLnZN9w7Q5cqHCQpVN-KR-LjpBA', 17, 1587392479, 0, 0, '2019-04-20'),\
('sdc', 'dvpm', 'opvmwop', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzY5MTAyLCJuYmYiOjE1NTU3NzAxMDIsImRhdGEiOnsiZmlyc3RuYW1lIjoic2RjIiwibGFzdG5hbWUiOiJkdnBtIiwiZW1haWwiOiJvcHZtd29wIn19.Bc97KM72_nqD53irzxaQT-eU4uenMGJqzIETHaVz7Qk', 18, 1587392502, 0, 0, '2019-04-20'),\
('Rachel', 'McKeon', 'Rachel@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1NzcyMzIzLCJuYmYiOjE1NTU3NzMzMjMsImRhdGEiOnsiZmlyc3RuYW1lIjoiUmFjaGVsIiwibGFzdG5hbWUiOiJNY0tlb24iLCJlbWFpbCI6IlJhY2hlbEBnbWFpbC5jb20ifX0.PQtqBvptBzxI33EN6mWtbL0uecQSuTe4rYMqYTqABJ4', 29, 1587395723, 0, 0, '2019-04-20'),\
('Jason', 'Geraghty', 'test@test.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYwOTg5LCJuYmYiOjE1NTU4NjE5ODksImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJ0ZXN0QHRlc3QuY29tIn19.4EBQfXDAyQc4On8zAS7APmQ4OqEqZO92PovQa2BHQWY', 35, 1587484387, 1, 1, '2019-04-21'),\
('Jason', 'Geraghty', 'test@test.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYxMDE2LCJuYmYiOjE1NTU4NjIwMTYsImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJ0ZXN0QHRlc3QuY29tIn19.FZltX-kxlBYKv09wAL8EWH7atkjSSeQc-gWhJPbG4o8', 36, 1587484399, 1, 1, '2019-04-21'),\
('Jason', 'Geraghty', 'Jason@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYxMDY2LCJuYmYiOjE1NTU4NjIwNjYsImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJKYXNvbkBnbWFpbC5jb20ifX0.tYWYnE7QLs_SfRLVXOVkGjwxnnA3JwVzVJO2OMvOuBg', 37, 1587484423, 1, 1, '2019-04-21'),\
('Jason', 'Geraghty', 'D00186726@student.dkit.ie', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYxMDk2LCJuYmYiOjE1NTU4NjIwOTYsImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJEMDAxODY3MjZAc3R1ZGVudC5ka2l0LmllIn19.uyz03BOvdbYQ_FwjMQo_eFifcE9bMUwJxCWfj-60uow', 38, 1587484475, 1, 1, '2019-04-21'),\
('Jason', 'Geraghty', 'grainnelambe@aol.co.uk', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYxMTIyLCJuYmYiOjE1NTU4NjIxMjIsImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJncmFpbm5lbGFtYmVAYW9sLmNvLnVrIn19.YctDV1oKKVCOrNBygQvSW-ziNi_4N4qKKmiY3XHkd60', 39, 1587484520, 1, 1, '2019-04-21'),\
('Jason', 'Geraghty', 'test@test.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYxMTQ2LCJuYmYiOjE1NTU4NjIxNDYsImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJ0ZXN0QHRlc3QuY29tIn19.nEi9-TnnBX4xjsTKyGk1EFY3LgiuJ2VAKHqYmZq-GJQ', 40, 1587484543, 1, 1, '2019-04-21'),\
('Jason', 'Geraghty', 'Jason@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYxMTczLCJuYmYiOjE1NTU4NjIxNzMsImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJKYXNvbkBnbWFpbC5jb20ifX0.bKOAHQCfFWnzxJuG0Qp1uwyFjYGl0pa7vv4j4mDEvW8', 41, 1587484571, 1, 1, '2019-04-21'),\
('Jason', 'Geraghty', 'D00186726@student.dkit.ie', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYxMjE2LCJuYmYiOjE1NTU4NjIyMTYsImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJEMDAxODY3MjZAc3R1ZGVudC5ka2l0LmllIn19.AXwfxdKteBTMnhBoQLPyYoKaXOQ7KwuBdINEdo4_aZw', 42, 1587484614, 1, 1, '2019-04-21'),\
('Jason', 'Geraghty', 'test@test.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYyMDIyLCJuYmYiOjE1NTU4NjMwMjIsImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJ0ZXN0QHRlc3QuY29tIn19.T3U5M8nNolRBlBZb8YCK4WevPm46QcYF01Jtvp-oiJk', 47, 1587485419, 1, 1, '2019-04-21'),\
('Jason', 'Geraghty', 'test@test.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYyMTQ5LCJuYmYiOjE1NTU4NjMxNDksImRhdGEiOnsiZmlyc3RuYW1lIjoiSmFzb24iLCJsYXN0bmFtZSI6IkdlcmFnaHR5IiwiZW1haWwiOiJ0ZXN0QHRlc3QuY29tIn19.Twlz4vslJD9wWb7yK2QLBkDBrl_YWZJ9Ei7VsVPab0w', 49, 1587485489, 9, 9, '2019-04-21'),\
('jn', 'oinio', 'nnionio', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1ODYzMjEzLCJuYmYiOjE1NTU4NjQyMTMsImRhdGEiOnsiZmlyc3RuYW1lIjoiam4iLCJsYXN0bmFtZSI6Im9pbmlvIiwiZW1haWwiOiJubmlvbmlvIn19.1bnJ72pswn0Q3FNkjUHoKPeg2L8mAGx7OKQ3CzWPUfs', 50, 1587486601, 3, 3, '2019-04-21'),\
('Jason', 'Geraghty', 'D00186726@student.dkit.ie', '', 51, 1587486675, 130, 81, '2019-04-22'),\
('William', 'Harris', 'William@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM1ODE3LCJuYmYiOjE1NTU5MzY4MTcsImRhdGEiOnsiZmlyc3RuYW1lIjoiV2lsbGlhbSIsImxhc3RuYW1lIjoiSGFycmlzIiwiZW1haWwiOiJXaWxsaWFtQGdtYWlsLmNvbSJ9fQ.KL-SfNXi5n9NgqDf1hhtJ12HJPii1_aQ10tnFxNCipw', 52, 1587559217, 57, 57, '2019-04-22'),\
('William', 'Harris', 'William@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM1ODYzLCJuYmYiOjE1NTU5MzY4NjMsImRhdGEiOnsiZmlyc3RuYW1lIjoiV2lsbGlhbSIsImxhc3RuYW1lIjoiSGFycmlzIiwiZW1haWwiOiJXaWxsaWFtQGdtYWlsLmNvbSJ9fQ.sWet_mteN7v63rR9sqeKMlXOZIVN70_b6O0uEj9M2n4', 53, 1587559263, 0, 0, '2019-04-22'),\
('William', 'Harris', 'William@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM1ODczLCJuYmYiOjE1NTU5MzY4NzMsImRhdGEiOnsiZmlyc3RuYW1lIjoiV2lsbGlhbSIsImxhc3RuYW1lIjoiSGFycmlzIiwiZW1haWwiOiJXaWxsaWFtQGdtYWlsLmNvbSJ9fQ.Nq0Oh7JM_3wxYXUKbvHwBk2k8V7hssjVUjInDO98DbU', 54, 1587559273, 0, 0, '2019-04-22'),\
('Paul', 'binton', 'Paul@gmail.com', '', 55, 1587559349, 4, 4, '2019-04-22'),\
('unittest', 'unittest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM2MzQzLCJuYmYiOjE1NTU5MzczNDMsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXR0ZXN0IiwiZW1haWwiOiJ1bml0dGVzdEBnbWFpbC5jb20ifX0.gSYsKtOwWc3LR0Rq243JSSLSA2YrIH_1qxfeyE-XvN8', 56, 1587559743, 0, 0, '2019-04-22'),\
('unittest', 'unittest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM2NDI1LCJuYmYiOjE1NTU5Mzc0MjUsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXR0ZXN0IiwiZW1haWwiOiJ1bml0dGVzdEBnbWFpbC5jb20ifX0.jVqYJVzX5DGcuvskUXHyR7Iqdqj_W_At86Aj-HQY4-w', 57, 1587559825, 0, 0, '2019-04-22'),\
('unittest', 'unittest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM2OTMzLCJuYmYiOjE1NTU5Mzc5MzMsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXR0ZXN0IiwiZW1haWwiOiJ1bml0dGVzdEBnbWFpbC5jb20ifX0.uOWPuVD3oRX1oWBzmTrDuCfx7hP-daG6pBChudvFdb8', 58, 1587560333, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3MzgxLCJuYmYiOjE1NTU5MzgzODEsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.8TEQpvrS5jS4h-qkq-wAbp-PIwmsFNEzLqdoN4-fFB0', 59, 1587560781, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3NDExLCJuYmYiOjE1NTU5Mzg0MTEsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.xNTEcGksNLVEYR-rzqXI7d_RbttfE08XpXNGKQgXm-4', 60, 1587560811, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3NDMzLCJuYmYiOjE1NTU5Mzg0MzMsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.zGoMWtEWLFUKAeGZOU4a37YzKxwHkP4q83ezP9K5Gkw', 61, 1587560833, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3NDg0LCJuYmYiOjE1NTU5Mzg0ODQsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.m86TYs0-faUb29-SJNl3HppjsBbSSgMAdnEceBK3NYs', 62, 1587560884, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3NTUzLCJuYmYiOjE1NTU5Mzg1NTMsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.oUhKoScORkDORCIcIexYKZHlVYCXL2D6Bp1pAGqGrm0', 63, 1587560953, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3NjAyLCJuYmYiOjE1NTU5Mzg2MDIsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.i0LQxWoxbxbbIzAg181Zm6nx1p-aDzPL5h_y2FEjIFs', 64, 1587561002, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3NjIxLCJuYmYiOjE1NTU5Mzg2MjEsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.NwHzFqGhUxLpLHTcea1oGUITqxURsIl_2wogFJmRm3A', 65, 1587561021, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3NzAyLCJuYmYiOjE1NTU5Mzg3MDIsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.uh4j7KATtmcQkJCpqKZyllB5oNyMhVG-_UotQN_3QDE', 66, 1587561102, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3OTAzLCJuYmYiOjE1NTU5Mzg5MDMsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.mH096dxnRJ5_zhnXW9_BqyUjBF2HuDJstlxYI2MpGmo', 68, 1587561303, 0, 0, '2019-04-22'),\
('unittest', 'unittest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3OTE2LCJuYmYiOjE1NTU5Mzg5MTYsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXR0ZXN0IiwiZW1haWwiOiJ1bml0dGVzdEBnbWFpbC5jb20ifX0.BD5Oa_Du7uW_LaCA0rbGCmRSNZA_nUHe4lY3F-aPeD0', 69, 1587561316, 0, 0, '2019-04-22'),\
('unittest', 'unittest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM3OTI5LCJuYmYiOjE1NTU5Mzg5MjksImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXR0ZXN0IiwiZW1haWwiOiJ1bml0dGVzdEBnbWFpbC5jb20ifX0.ZoyaW7tVSL29Q99uM1zs8njJfle0ohoZfuX-cj_vSPI', 70, 1587561329, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM4MDE4LCJuYmYiOjE1NTU5MzkwMTgsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.61xzYDrCr5dH87ZBDVrZnmxaEJEDyEgRL2QAlIWv1HQ', 71, 1587561418, 0, 0, '2019-04-22'),\
('tom', 'tomson', 'tom@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM4NTQ5LCJuYmYiOjE1NTU5Mzk1NDksImRhdGEiOnsiZmlyc3RuYW1lIjoidG9tIiwibGFzdG5hbWUiOiJ0b21zb24iLCJlbWFpbCI6InRvbUBnbWFpbC5jb20ifX0.1084u5ozUj0f8H9LcCaLhnGALYGjA-pyOQz-JUbfvO8', 72, 1587561949, 3, 1, '2019-04-27'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM5NjY1LCJuYmYiOjE1NTU5NDA2NjUsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ._ww1poIVmyrDzbrz20kytZ8DuZUwvkrMXRCQQlyB7M0', 73, 1587563065, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM5NjgyLCJuYmYiOjE1NTU5NDA2ODIsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.MAaNcB_AJqp9qZ9Bj5hj6pPj2D9fE_9DgBNeN1UCOSk', 74, 1587563082, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM5NzU0LCJuYmYiOjE1NTU5NDA3NTQsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ._U0sNLgLTuBFC5LArRRJ4QhzBvvKe_6jBoaIDrnLFS8', 75, 1587563154, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTM5ODU1LCJuYmYiOjE1NTU5NDA4NTUsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.BfFUTKMgDq3_lHknsymCM4z00cUKzydivLt0tkXFp0I', 76, 1587563255, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTQwMDU2LCJuYmYiOjE1NTU5NDEwNTYsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.nFw5gadosHdIrCfgMBpeUofE3aVbAlpphlNs1dZJO4s', 77, 1587563456, 0, 0, '2019-04-22'),\
('unittest', 'unitest', 'unittest@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9jYndzLWF1dGguY29tXC90b2tlbnMiLCJhdWQiOiJodHRwOlwvXC9jYndzLW1hdGguY29tIiwiaWF0IjoxNTU1OTQwMTAyLCJuYmYiOjE1NTU5NDExMDIsImRhdGEiOnsiZmlyc3RuYW1lIjoidW5pdHRlc3QiLCJsYXN0bmFtZSI6InVuaXRlc3QiLCJlbWFpbCI6InVuaXR0ZXN0QGdtYWlsLmNvbSJ9fQ.t6FivNuFT2_asXJqdWsLNSZ-KVDnXtIk972xnT8KuHw', 78, 1587563502, 0, 0, '2019-04-22');\
\
--\
-- Indexes for dumped tables\
--\
\
--\
-- Indexes for table `tbl_user_tokens`\
--\
ALTER TABLE `tbl_user_tokens`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- AUTO_INCREMENT for dumped tables\
--\
\
--\
-- AUTO_INCREMENT for table `tbl_user_tokens`\
--\
ALTER TABLE `tbl_user_tokens`\
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;\
}