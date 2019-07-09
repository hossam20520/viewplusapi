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



create table question (
    id_q int(11) not null primary key auto_increment ,
    en_qes varchar(128) DEFAULT 'we not have any questions' , 
    ar_qes varchar(128) DEFAULT 'Arabic text',
    id_org_q int(11) not null 

);

create table ads(
id_ads int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
title_ads varchar(128) not null ,
url_ads varchar(128) not null ,
img_url varchar(500) not null,
note_ads varchar(128) not null ,
statues varchar(128) not null ,
id_org_ads int(11) not null );



 id_ads     | int(11)      | NO   | PRI | NULL    | auto_increment |
| title_ads  | varchar(128) | NO   |     | NULL    |                |
| url_ads    | varchar(128) | NO   |     | NULL    |                |
| img_url    | varchar(500) | NO   |     | NULL    |                |
| note_ads   | varchar(128) | NO   |     | NULL    |                |
| statues    | varchar(128) | NO   |     | NULL    |                |
| id_org_ads | int(11) 

insert into ads(title_ads , url_ads , img_url , note_ads , statues , id_org_ads ) values ("visa" , "https://example.com" ,  "https://image"  ,"hossam" , "active" , 1);

insert into question(en_qes , ar_qes , id_org_q) values('what is your fav color?' , 'arabic question ?' , 1);
-- CREATE TABLE users(
--   id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
--   name varchar(128) NOT NULL,
--   email varchar(128) NOT NULL,
--   phone varchar(128) NOT NULL,
--   country varchar(128) NOT NULL,
--   area varchar(128) NOT NULL,
--   password varchar(128) NOT NULL,
--   company varchar(128) NOT NULL,
--   numcompany varchar(128) NOT NULL
-- );



