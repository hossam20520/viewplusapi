-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2019 at 12:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27
use viewplus;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE users(
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
  name varchar(128) NOT NULL,
  email varchar(128) NOT NULL,
  phone varchar(128) NOT NULL,
  country varchar(128) NOT NULL,
  area varchar(128) NOT NULL,
  password varchar(128) NOT NULL,
  company varchar(128) NOT NULL,
  numcompany varchar(128) NOT NULL
);



