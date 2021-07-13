-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 20 2021 г., 17:45
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `univers_is`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `customer_id` int NOT NULL,
  `login` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` int NOT NULL,
  `FIO` varchar(100) NOT NULL,
  `happyDate` date NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`customer_id`, `login`, `password`, `status`, `FIO`, `happyDate`, `img`) VALUES
(1, 'rodionovada', '123456', 1, 'Родионова Дарья Александровна', '1999-08-26', ''),
(2, 'syromaysovao', '74589gfd4h', 1, 'Сыромясов Алексей Олегович', '1984-12-02', ''),
(4, 'tutarovats', '147852', 2, 'Тутарова Татьяна Сергеевна', '1999-01-24', 'foto3.png'),
(5, 'shamaevav', '159357afsE', 3, 'Шамаев Алексей Валентинович', '1979-05-08', ''),
(6, 'rybuxinaea', '123ddfr44', 3, 'Рябухина Елена Александровна', '1974-10-04', ''),
(7, 'firsovasa', '159357dflsarr', 3, 'Фирсова Светлана Анатольевна', '1972-07-24', 'foto1.png'),
(8, 'butkinaaa', '4568ff&dsg', 3, 'Буткина Анна Александровна', '1990-05-16', ''),
(9, 'belovvf', '12sdfgjt45', 3, 'Белов Владимир Федорович', '1952-05-30', ''),
(10, 'madonovan', '456951', 3, 'Мадонов Анатолий Николаевич', '1985-06-14', ''),
(11, 'romanovkm', 'dfl34GH', 3, 'Романов Константин Михайлович', '1952-06-02', 'foto2.png'),
(12, 'dorofeefas', '1453ffdsF4', 1, 'Дорофеев Анатолий Сергеевич', '1980-12-04', ''),
(13, 'ruzmanovav', 'dsf45de', 2, 'Рузманов Антон Владимирович', '1999-01-30', ''),
(14, 'bakaevaoa', 'ssdR67Gf', 3, 'Бакаева Ольга Александровна', '1987-05-10', ''),
(15, 'fedinmy', 'asd445gfkdEE(', 2, 'Федин Михаил Юрьевич', '1999-02-05', ''),
(16, 'karginip', 'asdhRRt12', 3, 'Карьгин Игорь Петрович', '1962-11-14', '');

-- --------------------------------------------------------

--
-- Структура таблицы `cus_professor`
--

CREATE TABLE `cus_professor` (
  `id_professor` int NOT NULL,
  `id_faculty` int NOT NULL,
  `id_department` int NOT NULL,
  `id_position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cus_professor`
--

INSERT INTO `cus_professor` (`id_professor`, `id_faculty`, `id_department`, `id_position`) VALUES
(5, 2, 4, 8),
(6, 2, 4, 4),
(7, 2, 4, 6),
(8, 2, 4, 6),
(9, 2, 4, 7),
(10, 2, 4, 6),
(11, 16, 6, 7),
(14, 2, 4, 6),
(16, 2, 4, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `cus_student`
--

CREATE TABLE `cus_student` (
  `id_student` int NOT NULL,
  `id_faculty` int NOT NULL,
  `id_direction` int NOT NULL,
  `kurs` int NOT NULL,
  `forma_education` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cus_student`
--

INSERT INTO `cus_student` (`id_student`, `id_faculty`, `id_direction`, `kurs`, `forma_education`, `profile`) VALUES
(4, 2, 4, 404, 'Очная', 'Управление разработкой программных проектов'),
(13, 2, 4, 404, 'Очная', 'Управление разработкой программных проектов'),
(15, 2, 4, 405, 'Очная', 'Управление разработкой программных проектов'),
(4, 2, 4, 404, 'Очная', 'Управление разработкой программных проектов'),
(13, 2, 4, 404, 'Очная', 'Управление разработкой программных проектов'),
(15, 2, 4, 405, 'Очная', 'Управление разработкой программных проектов');

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE `department` (
  `id_department` int NOT NULL,
  `id_fuculty` int NOT NULL,
  `name_department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`id_department`, `id_fuculty`, `name_department`) VALUES
(1, 2, 'Алгебра и геометрия'),
(2, 2, 'Кафедра мат анализа'),
(3, 2, 'Прикладная математика, дифференциальных уравнений, теоретической механики'),
(4, 2, 'САПР'),
(5, 2, 'Фундаментальная информатика'),
(6, 16, 'Психология');

-- --------------------------------------------------------

--
-- Структура таблицы `direction_faculty`
--

CREATE TABLE `direction_faculty` (
  `id_direction` int NOT NULL,
  `id_faculty` int NOT NULL,
  `name_direction` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `direction_faculty`
--

INSERT INTO `direction_faculty` (`id_direction`, `id_faculty`, `name_direction`) VALUES
(1, 2, '02.03.01 - Математика и компьютерные науки'),
(2, 2, '02.03.02 - Фундаментальная информатика и информационные технологии'),
(3, 2, '01.03.02 - Прикладная математика и информатика'),
(4, 2, '09.03.04 - Программная инженерия');

-- --------------------------------------------------------

--
-- Структура таблицы `discipline`
--

CREATE TABLE `discipline` (
  `id_discipline` int NOT NULL,
  `name_discipline` varchar(200) NOT NULL,
  `id_prof` int NOT NULL,
  `id_faculty` int NOT NULL,
  `id_direction` int NOT NULL,
  `distance` int NOT NULL,
  `id_semester` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `discipline`
--

INSERT INTO `discipline` (`id_discipline`, `name_discipline`, `id_prof`, `id_faculty`, `id_direction`, `distance`, `id_semester`) VALUES
(1, 'Информационная безопасность', 6, 2, 4, 0, 1),
(2, 'Психология', 11, 2, 4, 1, 1),
(3, 'Технологии параллельного программирования', 14, 2, 4, 0, 1),
(4, 'Сетевые технологии', 10, 2, 4, 0, 1),
(5, 'Нейронные сети', 10, 2, 4, 0, 1),
(6, 'Управление программными проектами', 9, 2, 4, 1, 1),
(13, 'Программирование веб-приложений', 7, 2, 4, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `dis_kurs`
--

CREATE TABLE `dis_kurs` (
  `id_dis` int NOT NULL,
  `group_kurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dis_kurs`
--

INSERT INTO `dis_kurs` (`id_dis`, `group_kurs`) VALUES
(1, 404),
(2, 404),
(3, 404),
(4, 404),
(5, 404),
(6, 404),
(6, 405),
(13, 404);

-- --------------------------------------------------------

--
-- Структура таблицы `faculty`
--

CREATE TABLE `faculty` (
  `id_faculty` int NOT NULL,
  `name_faculty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faculty`
--

INSERT INTO `faculty` (`id_faculty`, `name_faculty`) VALUES
(1, 'Медицинский институт'),
(2, 'Факультет математики и информационных технологий'),
(3, 'Архитектурно-строительный'),
(4, 'Географический факультет'),
(5, 'Факультет биотехнологии и биологии'),
(6, 'Факультет довузовской подготовки и среднего профессионального образования'),
(7, 'Факультет иностранных языков'),
(8, 'Филологический факультет'),
(9, 'Экономический факультет'),
(10, 'Юридический факультет'),
(11, 'Аграрный институт'),
(12, 'Институт механики и энергетики'),
(13, 'Институт национальной культуры'),
(14, 'Институт физики и химии'),
(15, 'Институт электроники и светотехники'),
(16, 'Историко-социологический институт');

-- --------------------------------------------------------

--
-- Структура таблицы `forum`
--

CREATE TABLE `forum` (
  `id_message` int NOT NULL,
  `customer_id` int NOT NULL,
  `message` varchar(200) NOT NULL,
  `date_message` date NOT NULL,
  `discipline_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `forum`
--

INSERT INTO `forum` (`id_message`, `customer_id`, `message`, `date_message`, `discipline_id`) VALUES
(1, 11, 'Уважаемые студенты! Большая просьба скинуть сюда расписание занятий по психологии вашей группы (с пометкой напротив каждого занятия, лекция или семинар).', '2021-05-15', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `link_dis`
--

CREATE TABLE `link_dis` (
  `id_link` int NOT NULL,
  `id_dis` int NOT NULL,
  `id_professor` int NOT NULL,
  `group_kurs` int NOT NULL,
  `number_para` int NOT NULL,
  `link` varchar(500) NOT NULL,
  `date_para` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `datetime_para` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `link_dis`
--

INSERT INTO `link_dis` (`id_link`, `id_dis`, `id_professor`, `group_kurs`, `number_para`, `link`, `date_para`, `datetime_para`, `status`) VALUES
(1, 6, 9, 404, 1, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-04', '2021-03-04 08:52:58', 1),
(2, 6, 9, 405, 1, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-06', '2021-03-06 08:32:17', 1),
(3, 6, 9, 404, 2, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-06', '2021-03-06 08:32:26', 1),
(4, 6, 9, 404, 1, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-11', '2021-03-11 08:11:26', 1),
(5, 6, 9, 405, 1, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-13', '2021-03-13 08:31:39', 1),
(6, 6, 9, 404, 2, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-13', '2021-03-13 08:31:58', 1),
(7, 6, 9, 404, 1, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-18', '2021-03-18 08:49:53', 1),
(8, 6, 9, 405, 1, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-20', '2021-03-20 08:33:07', 1),
(9, 6, 9, 404, 2, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-20', '2021-03-20 08:33:14', 1),
(10, 6, 9, 404, 1, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-25', '2021-03-25 08:16:02', 1),
(11, 6, 9, 405, 1, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-27', '2021-03-27 08:39:30', 1),
(12, 6, 9, 404, 2, 'https://join.skype.com/jcu19Lx1YnXT', '2021-03-27', '2021-03-27 08:39:46', 1),
(13, 13, 7, 404, 2, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-01', '2021-03-01 08:24:09', 1),
(14, 13, 7, 404, 3, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-01', '2021-03-01 08:24:26', 1),
(15, 13, 7, 404, 1, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-05', '2021-03-05 08:38:38', 1),
(16, 13, 7, 404, 2, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-08', '2021-03-08 09:30:21', 1),
(17, 13, 7, 404, 3, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-08', '2021-03-08 09:30:27', 1),
(18, 13, 7, 404, 1, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-12', '2021-03-12 08:35:28', 1),
(19, 13, 7, 404, 2, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-15', '2021-03-15 08:39:31', 1),
(20, 13, 7, 404, 3, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-15', '2021-03-15 08:39:39', 1),
(21, 13, 7, 404, 1, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-19', '2021-03-19 08:24:38', 1),
(22, 13, 7, 404, 2, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-22', '2021-03-22 09:48:23', 1),
(23, 13, 7, 404, 3, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-22', '2021-03-22 09:48:31', 1),
(24, 13, 7, 404, 1, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-26', '2021-03-26 08:39:00', 1),
(25, 2, 11, 404, 1, 'https://join.skype.com/d0cymOUE6EVM', '2021-03-01', '2021-03-01 08:49:41', 1),
(26, 2, 11, 404, 3, 'https://join.skype.com/d0cymOUE6EVM', '2021-03-05', '2021-03-05 10:50:53', 1),
(27, 2, 11, 404, 1, 'https://join.skype.com/d0cymOUE6EVM', '2021-03-08', '2021-03-08 08:22:45', 1),
(28, 2, 11, 404, 3, 'https://join.skype.com/d0cymOUE6EVM', '2021-03-12', '2021-03-12 12:35:13', 1),
(29, 2, 11, 404, 1, 'https://join.skype.com/11114', '2021-03-15', '2021-03-15 07:26:32', 0),
(30, 2, 11, 404, 3, 'https://join.skype.com/d0cymOUE6EVM', '2021-03-19', '2021-03-19 11:34:04', 1),
(31, 2, 11, 404, 1, 'https://join.skype.com/o12111111.', '2021-03-22', '2021-03-22 08:29:33', 0),
(36, 2, 11, 404, 3, 'https://join.skype.com/kqNtlAbh6snU', '2021-03-26', '2021-03-26 12:51:45', 1),
(37, 2, 11, 404, 1, 'https://join.skype.com/d0cymOUE6EVM', '2021-03-29', '2021-03-29 08:40:55', 1),
(39, 2, 11, 404, 1, 'https://join.skype.com/kqNtlAbh6snU', '2021-04-05', '2021-04-05 08:52:51', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `online`
--

CREATE TABLE `online` (
  `id` int NOT NULL,
  `id_customer` int NOT NULL,
  `lastvisit` int NOT NULL,
  `online_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `online`
--

INSERT INTO `online` (`id`, `id_customer`, `lastvisit`, `online_users`) VALUES
(3, 4, 1616859615, 0),
(4, 5, 1616875985, 0),
(5, 6, 1616773385, 0),
(6, 10, 1616796885, 0),
(7, 9, 1616836182, 0),
(8, 7, 1616836660, 0),
(9, 14, 1616939102, 0),
(10, 11, 1616997450, 0),
(12, 15, 1616852856, 0),
(14, 1, 1624197039, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `id_position` int NOT NULL,
  `name_position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id_position`, `name_position`) VALUES
(1, 'Лаборант'),
(2, 'Старший лаборант'),
(3, 'Ассистент'),
(4, 'Преподаватель'),
(5, 'Старший преподаватель'),
(6, 'Доцент'),
(7, 'Профессор'),
(8, 'Завкафедрой');

-- --------------------------------------------------------

--
-- Структура таблицы `redirection`
--

CREATE TABLE `redirection` (
  `id_redirection` int NOT NULL,
  `id_cus` int NOT NULL,
  `datetime_start` datetime NOT NULL,
  `datetime_stop` datetime NOT NULL,
  `id_dis` int NOT NULL,
  `number_group` int NOT NULL,
  `para` int NOT NULL,
  `time_para` varchar(100) NOT NULL,
  `cross_over` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `redirection`
--

INSERT INTO `redirection` (`id_redirection`, `id_cus`, `datetime_start`, `datetime_stop`, `id_dis`, `number_group`, `para`, `time_para`, `cross_over`) VALUES
(1, 9, '2021-03-04 08:58:35', '2021-03-04 10:30:10', 6, 404, 1, '01:31:35', 1),
(3, 9, '2021-03-06 08:57:51', '2021-03-06 10:32:33', 6, 405, 1, '01:34:42', 1),
(4, 9, '2021-03-06 10:38:04', '2021-03-06 12:10:34', 6, 404, 2, '01:32:30', 1),
(5, 9, '2021-03-11 08:57:01', '2021-03-11 10:30:50', 6, 404, 1, '01:33:49', 1),
(6, 9, '2021-03-13 08:54:33', '2021-03-13 10:29:57', 6, 405, 1, '01:35:24', 1),
(7, 9, '2021-03-13 10:39:42', '2021-03-13 12:11:02', 6, 404, 2, '01:31:20', 1),
(8, 9, '2021-03-18 09:00:19', '2021-03-18 10:32:51', 6, 404, 1, '01:32:32', 1),
(9, 9, '2021-03-20 08:58:38', '2021-03-20 10:33:01', 6, 405, 1, '01:34:23', 1),
(10, 9, '2021-03-20 10:41:18', '2021-03-20 12:15:44', 6, 404, 2, '01:34:26', 1),
(11, 9, '2021-03-25 08:59:19', '2021-03-25 10:30:52', 6, 404, 1, '01:31:33', 1),
(12, 9, '2021-03-27 08:57:15', '2021-03-27 10:30:47', 6, 405, 1, '01:33:32', 1),
(13, 9, '2021-03-27 10:39:12', '2021-03-27 12:09:42', 6, 404, 2, '01:30:30', 1),
(14, 7, '2021-03-01 10:31:40', '2021-03-01 12:10:20', 13, 404, 2, '01:38:40', 1),
(15, 7, '2021-03-01 13:00:33', '2021-03-01 14:31:00', 13, 404, 3, '01:30:27', 1),
(16, 7, '2021-03-05 08:58:36', '2021-03-05 10:29:58', 13, 404, 1, '01:31:22', 1),
(17, 7, '2021-03-08 10:39:52', '2021-03-08 12:12:14', 13, 404, 2, '01:32:22', 1),
(18, 7, '2021-03-08 13:00:37', '2021-03-08 14:33:03', 13, 404, 3, '01:32:26', 1),
(19, 7, '2021-03-12 08:59:48', '2021-03-12 10:31:14', 13, 404, 1, '01:31:26', 1),
(20, 7, '2021-03-15 10:39:01', '2021-03-15 12:10:26', 13, 404, 2, '01:31:25', 1),
(21, 7, '2021-03-15 13:00:50', '2021-03-15 14:29:17', 13, 404, 3, '01:28:27', 1),
(22, 7, '2021-03-19 08:55:00', '2021-03-19 10:26:23', 13, 404, 1, '01:31:23', 1),
(23, 7, '2021-03-22 10:40:48', '2021-03-22 12:09:13', 13, 404, 2, '01:28:25', 1),
(24, 7, '2021-03-22 13:00:30', '2021-03-22 14:34:41', 13, 404, 3, '01:34:11', 1),
(25, 7, '2021-03-26 08:57:17', '2021-03-26 10:31:38', 13, 404, 1, '01:34:21', 1),
(26, 11, '2021-03-01 08:55:56', '2021-03-01 10:33:12', 2, 404, 1, '01:37:16', 1),
(27, 11, '2021-03-05 12:57:07', '2021-03-05 14:30:40', 2, 404, 3, '01:33:33', 1),
(28, 11, '2021-03-08 08:58:59', '2021-03-08 10:34:58', 2, 404, 1, '01:35:59', 1),
(29, 11, '2021-03-12 12:57:32', '2021-03-12 14:32:03', 2, 404, 3, '01:34:31', 1),
(30, 11, '2021-03-19 13:00:19', '2021-03-19 13:52:37', 2, 404, 3, '00:52:18', 0),
(34, 11, '2021-03-26 12:52:16', '2021-03-26 14:29:51', 2, 404, 3, '01:37:35', 1),
(35, 11, '2021-03-29 08:57:24', '2021-03-29 10:30:24', 2, 404, 1, '01:33:00', 1),
(37, 11, '2021-04-05 08:53:46', '2021-04-05 10:30:16', 2, 404, 1, '01:36:30', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `screenvideo`
--

CREATE TABLE `screenvideo` (
  `id_video` int NOT NULL,
  `id_cus` int NOT NULL,
  `id_dis` int NOT NULL,
  `name_video` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `datetimevideo` datetime NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `screenvideo`
--

INSERT INTO `screenvideo` (`id_video`, `id_cus`, `id_dis`, `name_video`, `datetimevideo`, `status`) VALUES
(1, 9, 6, 'ID-9_2021-03-04_1614837265770s.webm', '2021-03-04 08:58:35', 0),
(3, 9, 6, 'ID-9_2021-03-06_1615016451705s.webm', '2021-03-06 08:57:51', 0),
(4, 9, 6, 'ID-9_2021-03-06_1615016099212s.webm', '2021-03-06 10:38:04', 1),
(5, 9, 6, 'ID-9_2021-03-11_1615439521035s.webm', '2021-03-11 08:57:01', 1),
(6, 9, 6, 'ID-9_2021-03-13_1615614864718s.webm', '2021-03-13 08:54:33', 1),
(7, 9, 6, 'ID-9_2021-03-13_1615620642688s.webm', '2021-03-13 10:39:42', 1),
(8, 9, 6, 'ID-9_2021-03-18_1616047214995s.webm', '2021-03-18 09:00:19', 1),
(9, 9, 6, 'ID-9_2021-03-20_1616218476425s.webm', '2021-03-20 08:58:38', 1),
(10, 9, 6, 'ID-9_2021-03-20_1616226073787s.webm', '2021-03-20 10:41:18', 1),
(11, 9, 6, 'ID-9_2021-03-25_1616649378386s.webm', '2021-03-25 08:59:19', 1),
(12, 9, 6, 'ID-9_2021-03-27_1616823611909s.webm', '2021-03-27 08:57:15', 0),
(13, 9, 6, 'ID-9_2021-03-27_1616824701967s.webm', '2021-03-27 10:39:12', 0),
(14, 7, 13, 'ID-7_2021-03-01_1614576287461s.webm', '2021-03-01 10:31:40', 1),
(15, 7, 13, 'ID-7_2021-03-01_1614589893390s.webm', '2021-03-01 13:00:33', 1),
(16, 7, 13, 'ID-7_2021-03-05_1614922836432s.webm', '2021-03-05 08:58:36', 1),
(17, 7, 13, 'ID-7_2021-03-05_1614929459084s.webm', '2021-03-08 10:39:52', 0),
(18, 7, 13, 'ID-7_2021-03-08_1615197633059s.webm', '2021-03-08 13:00:37', 1),
(19, 7, 13, 'ID-7_2021-03-12_1615527346457s.webm', '2021-03-12 08:59:48', 0),
(20, 7, 13, 'ID-7_2021-03-12_1615534811445s.webm', '2021-03-15 10:39:01', 0),
(21, 7, 13, 'ID-7_2021-03-15_1615802443327s.webm', '2021-03-15 13:00:50', 0),
(22, 7, 13, 'ID-7_2021-03-15_1615807804980s.webm', '2021-03-19 08:55:00', 0),
(23, 7, 13, 'ID-7_2021-03-19_1616138876888s.webm', '2021-03-22 10:40:48', 0),
(24, 7, 13, 'ID-7_2021-03-22_1616398898206s.webm', '2021-03-22 13:00:30', 0),
(25, 7, 13, 'ID-7_2021-03-22_1616412930325s.webm', '2021-03-26 08:57:17', 0),
(26, 11, 2, 'ID-11_2021-03-01_1614577793800s.webm', '2021-03-01 08:55:56', 1),
(27, 11, 2, 'ID-11_2021-03-05_1614938222864s.webm', '2021-03-05 12:57:07', 1),
(28, 11, 2, 'ID-11_2021-03-08_1615180978540s.webm', '2021-03-08 08:58:59', 1),
(29, 11, 2, 'ID-11_2021-03-08_1615183245340s.webm', '2021-03-12 12:57:32', 1),
(30, 11, 2, 'ID-11_2021-03-15_1615782450780s.webm', '2021-03-19 13:00:19', 0),
(34, 11, 2, 'ID-11_2021-03-26_1616752328672s.webm', '2021-03-26 12:52:16', 0),
(35, 11, 2, 'ID-11_2021-03-29_1616752328672s.webm', '2021-03-29 08:57:24', 0),
(37, 11, 2, 'ID-11_2021-04-05_1617602021488s.webm', '2021-04-05 08:53:46', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `semester`
--

CREATE TABLE `semester` (
  `id_semester` int NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `name_semester` varchar(500) NOT NULL,
  `group_kurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `semester`
--

INSERT INTO `semester` (`id_semester`, `date_start`, `date_finish`, `name_semester`, `group_kurs`) VALUES
(1, '2021-01-25', '2021-07-01', '8 семестр', 404);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `name`) VALUES
(1, 'Администратор'),
(2, 'Студент'),
(3, 'Преподаватель');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable_call`
--

CREATE TABLE `timetable_call` (
  `id_call` int NOT NULL,
  `number` int NOT NULL,
  `time_start` time NOT NULL,
  `time_stop` time NOT NULL,
  `time` varchar(20) NOT NULL,
  `turn` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `timetable_call`
--

INSERT INTO `timetable_call` (`id_call`, `number`, `time_start`, `time_stop`, `time`, `turn`) VALUES
(1, 1, '09:00:00', '10:30:00', '9:00 - 10:30', 10),
(2, 2, '10:40:00', '12:10:00', '10:40 - 12:10', 50),
(3, 3, '13:00:00', '14:30:00', '13:00 - 14:30', 10),
(4, 4, '14:40:00', '16:10:00', '14:40 - 16:10', 10),
(5, 5, '16:20:00', '17:50:00', '16:20 - 17:50', 10),
(6, 6, '18:00:00', '19:30:00', '18:00 - 19:30', 10),
(7, 7, '19:40:00', '21:10:00', '19:40 - 21:10', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `timetable_class`
--

CREATE TABLE `timetable_class` (
  `id_timetable` int NOT NULL,
  `id_faculty` int NOT NULL,
  `id_direction` int NOT NULL,
  `id_semester` int NOT NULL,
  `group_kurs` int NOT NULL,
  `name_discipline` int NOT NULL,
  `weekday` int NOT NULL,
  `number_para` int NOT NULL,
  `id_professor` int NOT NULL,
  `office` int NOT NULL,
  `distance` tinyint(1) NOT NULL,
  `type_para` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `timetable_class`
--

INSERT INTO `timetable_class` (`id_timetable`, `id_faculty`, `id_direction`, `id_semester`, `group_kurs`, `name_discipline`, `weekday`, `number_para`, `id_professor`, `office`, `distance`, `type_para`) VALUES
(1, 2, 4, 1, 404, 2, 1, 1, 11, 0, 1, 'Лекция'),
(2, 2, 4, 1, 404, 3, 2, 1, 14, 506, 0, 'Лекция'),
(3, 2, 4, 1, 404, 3, 2, 2, 14, 506, 0, 'Практика'),
(4, 2, 4, 1, 404, 3, 2, 3, 14, 506, 0, 'Практика'),
(5, 2, 4, 1, 404, 1, 3, 1, 6, 218, 0, 'Лекция'),
(6, 2, 4, 1, 405, 1, 3, 4, 6, 207, 0, 'Практика'),
(7, 2, 4, 1, 405, 1, 3, 5, 6, 207, 0, 'Практика'),
(9, 2, 4, 1, 404, 6, 4, 1, 9, 0, 1, 'Лекция'),
(11, 2, 4, 1, 405, 6, 6, 1, 9, 0, 1, 'Практика'),
(12, 2, 4, 1, 404, 6, 6, 2, 9, 0, 1, 'Практика'),
(14, 2, 4, 1, 404, 2, 5, 3, 11, 0, 1, 'Практика'),
(15, 2, 4, 1, 404, 13, 1, 2, 7, 0, 1, 'Практика'),
(16, 2, 4, 1, 404, 13, 1, 3, 7, 0, 1, 'Практика'),
(17, 2, 4, 1, 404, 13, 5, 1, 7, 0, 1, 'Лекция');

-- --------------------------------------------------------

--
-- Структура таблицы `weekday`
--

CREATE TABLE `weekday` (
  `id_weekday` int NOT NULL,
  `name_weekday` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `weekday`
--

INSERT INTO `weekday` (`id_weekday`, `name_weekday`) VALUES
(1, 'Понедельник'),
(2, 'Вторник'),
(3, 'Среда'),
(4, 'Четверг'),
(5, 'Пятница'),
(6, 'Суббота'),
(7, 'Воскресенье');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Индексы таблицы `direction_faculty`
--
ALTER TABLE `direction_faculty`
  ADD PRIMARY KEY (`id_direction`);

--
-- Индексы таблицы `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id_discipline`);

--
-- Индексы таблицы `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id_faculty`);

--
-- Индексы таблицы `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_message`);

--
-- Индексы таблицы `link_dis`
--
ALTER TABLE `link_dis`
  ADD PRIMARY KEY (`id_link`);

--
-- Индексы таблицы `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id_position`);

--
-- Индексы таблицы `redirection`
--
ALTER TABLE `redirection`
  ADD PRIMARY KEY (`id_redirection`);

--
-- Индексы таблицы `screenvideo`
--
ALTER TABLE `screenvideo`
  ADD PRIMARY KEY (`id_video`);

--
-- Индексы таблицы `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `timetable_call`
--
ALTER TABLE `timetable_call`
  ADD PRIMARY KEY (`id_call`);

--
-- Индексы таблицы `timetable_class`
--
ALTER TABLE `timetable_class`
  ADD PRIMARY KEY (`id_timetable`);

--
-- Индексы таблицы `weekday`
--
ALTER TABLE `weekday`
  ADD PRIMARY KEY (`id_weekday`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `direction_faculty`
--
ALTER TABLE `direction_faculty`
  MODIFY `id_direction` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id_discipline` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id_faculty` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `forum`
--
ALTER TABLE `forum`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `link_dis`
--
ALTER TABLE `link_dis`
  MODIFY `id_link` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `online`
--
ALTER TABLE `online`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `id_position` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `redirection`
--
ALTER TABLE `redirection`
  MODIFY `id_redirection` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `screenvideo`
--
ALTER TABLE `screenvideo`
  MODIFY `id_video` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `timetable_call`
--
ALTER TABLE `timetable_call`
  MODIFY `id_call` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `timetable_class`
--
ALTER TABLE `timetable_class`
  MODIFY `id_timetable` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `weekday`
--
ALTER TABLE `weekday`
  MODIFY `id_weekday` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
