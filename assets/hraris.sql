-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 03:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hraris`
--

-- --------------------------------------------------------

--
-- Table structure for table `aris_absent_filing`
--

CREATE TABLE `aris_absent_filing` (
  `id` int(14) NOT NULL,
  `provider` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_id_number` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `carmodel_group` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `process_line` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason_2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploader` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `shift` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_absent` date NOT NULL,
  `number_absent` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aris_absent_filing`
--

INSERT INTO `aris_absent_filing` (`id`, `provider`, `emp_id_number`, `name`, `position`, `section`, `carmodel_group`, `process_line`, `reason`, `reason_2`, `uploader`, `shift`, `date_absent`, `number_absent`, `date_upload`) VALUES
(321, 'FAS', '21-06711', 'Arce, Prince C.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-07', '1', '2021-09-07'),
(322, 'FAS', '14-01871', 'Jalla, John Bernard L.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-07', NULL, '2021-09-07'),
(323, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-07', NULL, '2021-09-07'),
(324, 'FAS', '14-01899', 'Bathan, Laurice A.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-07', NULL, '2021-09-07'),
(325, 'MAXIM', 'BF-41123', 'Orenday, Marivic S', NULL, 'Section 3', 'Daihatsu Initial', 'Secondary Process (Daihatsu D01L)', 'VL', 'Wedding Preparation', 'PD5 CLERK', 'NS', '2021-09-07', NULL, '2021-09-07'),
(326, 'MAXIM', 'BF-40294', 'Señadan, Julie Ann P', NULL, 'Section 3', 'Daihatsu Final', '2111', 'VL', 'Taking Care of Family Member', 'PD5 CLERK', 'DS', '2021-09-07', NULL, '2021-09-07'),
(327, 'MAXIM', 'BF-17750', 'De Guzman, Allan D', NULL, 'Section 3', 'Daihatsu Final', '2109', 'VL', 'Settle Important Matter', 'PD5 CLERK', 'DS', '2021-09-07', NULL, '2021-09-07'),
(328, 'MAXIM', 'BF-40717', 'Sollivan, Rea  P', NULL, 'Section 3', 'Daihatsu Final', 'N/A', 'VL', 'Vaccination', 'PD5 CLERK', 'DS', '2021-09-07', NULL, '2021-09-07'),
(329, 'FAS', '12-0116', 'Malibiran, Mary Angelique C.', NULL, 'Section 3', 'Daihatsu Final', '2121', 'VL', 'Taking Care of Family Member', 'PD5 CLERK', 'DS', '2021-09-07', NULL, '2021-09-07'),
(330, 'FAS', '12-0081', 'Cailao, Eugenio V.', NULL, 'Section 3', 'Daihatsu Final', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'PD5 CLERK', 'DS', '2021-09-07', NULL, '2021-09-07'),
(331, 'FAS', '13-00910', 'Pastoral, Lady Lyn D.', NULL, 'Section 3', 'Daihatsu Final', '2111', 'ML', 'Maternity leave', 'PD5 CLERK', 'NS', '2021-09-07', NULL, '2021-09-07'),
(332, 'FAS', '13-0156', 'Falogme, Jenny Ann F.', NULL, 'Section 3', 'Daihatsu Initial', 'First Process (Daihatsu D01L)', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'PD5 CLERK', 'ADS', '2021-09-07', NULL, '2021-09-07'),
(333, 'FAS', '13-0242', 'De Guzman, Mary Rose U.', NULL, 'Section 3', 'Daihatsu Final', '2120', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'PD5 CLERK', 'DS', '2021-09-07', NULL, '2021-09-07'),
(334, 'FAS', '13-0167', 'Silva, Romana B.', NULL, 'Section 3', 'Daihatsu Final', '2114', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'PD5 CLERK', 'DS', '2021-09-07', NULL, '2021-09-07'),
(335, 'FAS', '21-06711', 'Arce, Prince C.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'NS', '2021-09-10', NULL, '2021-09-10'),
(336, 'FAS', '14-01899', 'Bathan, Laurice A.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'DS', '2021-09-10', NULL, '2021-09-10'),
(337, 'FAS', '14-01871', 'Jalla, John Bernard L.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'DS', '2021-09-10', NULL, '2021-09-10'),
(338, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'DS', '2021-09-10', NULL, '2021-09-10'),
(339, 'FAS', '12-0019', 'Mendoza, Christian Allen M.', NULL, 'Equipment Engineering', 'Fabrication', 'N/A', 'VL', 'Birthday celebration of family member', 'fab clerk', 'DS', '2021-09-10', '12', '2021-09-10'),
(340, 'FAS', '13-0439', 'De Torres, Andrew M.', NULL, 'Equipment Engineering', 'Fabrication', 'N/A', 'VL', 'Vaccination', 'fab clerk', 'DS', '2021-09-10', '2', '2021-09-10'),
(341, 'FAS', '15-02809', 'Casiano, Jo Marie M.', NULL, 'Equipment Engineering', 'Fabrication', 'N/A', 'VL', 'Taking Care of Family Member', 'fab clerk', 'DS', '2021-09-06', '12', '2021-09-10'),
(342, 'FAS', '15-02807', 'Briones, Mary Anne M.', NULL, 'Equipment Engineering', 'Fabrication', 'N/A', 'VL', 'Taking Care of Family Member', 'fab clerk', 'DS', '2021-09-06', NULL, '2021-09-10'),
(343, 'FAS', '15-02830', 'Magadia, Judy Ann M.', NULL, 'Equipment Engineering', 'Fabrication', 'N/A', 'VL', 'Taking Care of Family Member', 'fab clerk', 'DS', '2021-09-06', '15', '2021-09-10'),
(344, 'FAS', '14-01871', 'Jalla, John Bernard L.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'DS', '2021-09-11', NULL, '2021-09-11'),
(345, 'FAS', '21-06711', 'Arce, Prince C.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'NS', '2021-09-11', '2', '2021-09-11'),
(346, 'FAS', '14-01899', 'Bathan, Laurice A.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Toothache', 'IT Clerk', 'DS', '2021-09-11', '12', '2021-09-11'),
(347, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-11', NULL, '2021-09-11'),
(351, 'ADD EVEN', 'AEF19691', 'Lucero,clariza A.', NULL, 'FG Preparation', 'FG Preparation', 'N/A', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-12', '12', '2021-09-12'),
(352, 'ADD EVEN', 'AEFL18021', 'Calilong, Amie M.', NULL, 'Section 1', 'Suzuki Final', '5101', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(353, 'ADD EVEN', 'AEFL18002', 'Manrique, Domingo S.', NULL, 'Quality Assurance', 'QA-Final (Mass Pro)', 'QA D01L Final', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(354, 'ADD EVEN', 'AEFL18080', 'Basares, Emmalyn S.', NULL, 'Section 1', 'Suzuki Initial', '5117', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(355, 'ADD EVEN', 'AEFL18056', 'Mirabete, Maricris', NULL, 'Section 2', 'Mazda J12 Final', '1008', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(356, 'ADD EVEN', 'AEFL18081', 'Lomboy, Monica  M.', NULL, 'Section 1', 'Suzuki Initial', 'N/A', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(357, 'ADD EVEN', 'AEFL18083', 'Handugan, Eden G.', NULL, 'Section 1', 'Suzuki Final', '5111', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(358, 'ADD EVEN', 'AEFL18199', 'Palmero, Roxanne D.', NULL, 'Section 1', 'Suzuki Final', '5119', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(359, 'ADD EVEN', 'AEFL18228', 'Tumlos, Jennifer B.', NULL, 'Section 3', 'Daihatsu Initial', 'Second Process (Daihatsu D01L)', 'VL', 'Taking Care of Family Member', 'addeven', 'NS', '2021-09-12', NULL, '2021-09-12'),
(360, 'ADD EVEN', 'AEFL18097', 'Evangelista, Marienel F.', NULL, 'Section 1', 'Suzuki Final', '5102', 'ML', 'Maternity leave', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(361, 'ADD EVEN', 'AEFL18102', 'Seño, Cecilia S.', NULL, 'Section 2', 'Mazda Merge Final', '1123', 'VL', 'Taking Care of Family Member', 'addeven', 'NS', '2021-09-12', NULL, '2021-09-12'),
(362, 'ADD EVEN', 'AEFL18137', 'Comia, Jonalyn M. ', NULL, 'Section 1', 'Suzuki Final', '5120', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(363, 'ADD EVEN', 'AEFL18191', 'Insigne, Razelle P.', NULL, 'Section 1', 'Suzuki Final', '5124', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(364, 'ADD EVEN', 'AEFL18256', 'Piol, Maricel G. ', NULL, 'Section 1', 'Suzuki Final', '5124', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(365, 'ADD EVEN', 'AEFL18260', 'Rodriguez, Aira Mae M. ', NULL, 'Section 5', 'Honda Final', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'addeven', 'DS', '2021-09-12', NULL, '2021-09-12'),
(367, 'FAS', '14-01871', 'Jalla, John Bernard L.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Settle Important Matter', 'IT Clerk', 'DS', '2021-09-15', NULL, '2021-09-15'),
(368, 'FAS', '14-01899', 'Bathan, Laurice A.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Settle Important Matter', 'IT Clerk', 'DS', '2021-09-15', NULL, '2021-09-15'),
(369, 'FAS', '21-06711', 'Arce, Prince C.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'NS', '2021-09-15', NULL, '2021-09-15'),
(370, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', NULL, 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Settle Important Matter', 'IT Clerk', 'DS', '2021-09-15', NULL, '2021-09-15'),
(371, 'FAS', '12-0081', 'Cailao, Eugenio V.', NULL, 'Section 3', 'Daihatsu Final', 'N/A', 'For Cancel', 'For Cancel', 'PD5 CLERK', 'DS', '2021-09-16', NULL, '2021-09-16'),
(372, 'FAS', '12-0116', 'Malibiran, Mary Angelique C.', NULL, 'Section 3', 'Daihatsu Final', '2121', 'For Cancel', 'For Cancel', 'PD5 CLERK', 'DS', '2021-09-16', NULL, '2021-09-16'),
(373, 'FAS', '13-0156', 'Falogme, Jenny Ann F.', NULL, 'Section 3', 'Daihatsu Initial', 'First Process (Daihatsu D01L)', 'For Cancel', 'For Cancel', 'PD5 CLERK', 'ADS', '2021-09-16', NULL, '2021-09-16'),
(374, 'FAS', '13-00910', 'Pastoral, Lady Lyn D.', NULL, 'Section 3', 'Daihatsu Final', '2111', 'For Cancel', 'For Cancel', 'PD5 CLERK', 'NS', '2021-09-16', NULL, '2021-09-16'),
(375, 'FAS', '13-0167', 'Silva, Romana B.', NULL, 'Section 3', 'Daihatsu Final', '2114', 'For Cancel', 'For Cancel', 'PD5 CLERK', 'DS', '2021-09-16', NULL, '2021-09-16'),
(376, 'FAS', '13-0242', 'De Guzman, Mary Rose U.', NULL, 'Section 3', 'Daihatsu Final', '2120', 'For Cancel', 'For Cancel', 'PD5 CLERK', 'DS', '2021-09-16', NULL, '2021-09-16'),
(377, 'ADD EVEN', 'AEF19691', 'Lucero,clariza A.', NULL, 'FG Preparation', 'FG Preparation', 'N/A', 'SL', 'UTI', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(378, 'ADD EVEN', 'AEFL18002', 'Manrique, Domingo S.', NULL, 'Quality Assurance', 'QA-Final (Mass Pro)', 'QA D01L Final', 'SL', 'Hip Pain', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(381, 'ADD EVEN', 'AEFL18021', 'Calilong, Amie M.', NULL, 'Section 1', 'Suzuki Final', '5101', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(383, 'ADD EVEN', 'AEFL18080', 'Basares, Emmalyn S.', NULL, 'Section 1', 'Suzuki Initial', '5117', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(384, 'ADD EVEN', 'AEFL18056', 'Mirabete, Maricris', NULL, 'Section 2', 'Mazda J12 Final', '1008', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(385, 'ADD EVEN', 'AEFL18097', 'Evangelista, Marienel F.', NULL, 'Section 1', 'Suzuki Final', '5102', 'VL', 'Vaccination', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(386, 'ADD EVEN', 'AEFL18083', 'Handugan, Eden G.', NULL, 'Section 1', 'Suzuki Final', '5111', 'VL', 'Vaccination', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(387, 'ADD EVEN', 'AEFL18081', 'Lomboy, Monica  M.', NULL, 'Section 1', 'Suzuki Initial', 'N/A', 'VL', 'Vaccination', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(388, 'ADD EVEN', 'AEFL18102', 'Seño, Cecilia S.', NULL, 'Section 2', 'Mazda Merge Final', '1123', 'VL', 'Taking Care of Family Member', 'addeven', 'NS', '2021-09-16', NULL, '2021-09-16'),
(389, 'ADD EVEN', 'AEFL18199', 'Palmero, Roxanne D.', NULL, 'Section 1', 'Suzuki Final', '5119', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(390, 'ADD EVEN', 'AEFL18137', 'Comia, Jonalyn M. ', NULL, 'Section 1', 'Suzuki Final', '5120', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(391, 'ADD EVEN', 'AEFL18228', 'Tumlos, Jennifer B.', NULL, 'Section 3', 'Daihatsu Initial', 'Second Process (Daihatsu D01L)', 'VL', 'Taking Care of Family Member', 'addeven', 'NS', '2021-09-16', NULL, '2021-09-16'),
(392, 'ADD EVEN', 'AEFL18256', 'Piol, Maricel G. ', NULL, 'Section 1', 'Suzuki Final', '5124', 'ML', 'Miscarriage', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(393, 'ADD EVEN', 'AEFL18260', 'Rodriguez, Aira Mae M. ', NULL, 'Section 5', 'Honda Final', 'N/A', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(394, 'ADD EVEN', 'AEFL18191', 'Insigne, Razelle P.', NULL, 'Section 1', 'Suzuki Final', '5124', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-16', NULL, '2021-09-16'),
(407, 'FAS', '14-01899', 'Bathan, Laurice A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'DS', '2021-09-17', '14', '2021-09-17'),
(408, 'FAS', '14-01871', 'Jalla, John Bernard L.', 'Supervisor', 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'DS', '2021-09-17', '15', '2021-09-17'),
(409, 'FAS', '21-06711', 'Arce, Prince C.', 'Junior Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'NS', '2021-09-17', '1', '2021-09-17'),
(410, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'DS', '2021-09-17', '11', '2021-09-17'),
(430, 'ADD EVEN', 'AEFL18002', 'Manrique, Domingo S.', 'Associate', 'Quality Assurance', 'QA-Final (Mass Pro)', 'QA D01L Final', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-17', '1', '2021-09-17'),
(431, 'ADD EVEN', 'AEFL18021', 'Calilong, Amie M.', 'Associate', 'Section 1', 'Suzuki Final', '5101', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-17', '1', '2021-09-17'),
(432, 'ADD EVEN', 'AEF19691', 'Lucero,clariza A.', 'Associate', 'FG Preparation', 'FG Preparation', 'N/A', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-17', '1', '2021-09-17'),
(434, 'FAS', '14-01899', 'Bathan, Laurice A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-18', '1', '2021-09-18'),
(435, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-18', '1', '2021-09-18'),
(436, 'FAS', '21-06711', 'Arce, Prince C.', 'Junior Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'NS', '2021-09-18', '1', '2021-09-18'),
(437, 'FAS', '14-01871', 'Jalla, John Bernard L.', 'Supervisor', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-18', '1', '2021-09-18'),
(438, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-20', '18', '2021-09-18'),
(439, 'FAS', '21-06711', 'Arce, Prince C.', 'Junior Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'NS', '2021-09-20', '15', '2021-09-18'),
(440, 'FAS', '14-01899', 'Bathan, Laurice A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-20', '17', '2021-09-18'),
(441, 'FAS', '14-01871', 'Jalla, John Bernard L.', 'Supervisor', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-20', '16', '2021-09-18'),
(442, 'FAS', '21-06711', 'Arce, Prince C.', 'Junior Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'LBM', 'HR', 'DS', '2021-09-01', '1', '2021-09-18'),
(443, 'FAS', '14-01871', 'Jalla, John Bernard L.', 'Supervisor', 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Settle Important Matter', 'HR', 'DS', '2021-09-22', '17', '2021-09-18'),
(444, 'FAS', '14-01899', 'Bathan, Laurice A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Hip Pain', 'HR', 'DS', '2021-09-30', '1', '2021-09-18'),
(445, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Vaccination', 'HR', 'DS', '2021-09-30', '1', '2021-09-18'),
(446, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-08', '1', '2021-09-18'),
(447, 'FAS', '14-01899', 'Bathan, Laurice A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-08', '1', '2021-09-18'),
(450, 'FAS', '14-01899', 'Bathan, Laurice A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'DS', '2021-09-22', '1', '2021-09-20'),
(451, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'VL', 'Taking Care of Family Member', 'IT Clerk', 'DS', '2021-09-22', '1', '2021-09-20'),
(452, 'FAS', '21-06711', 'Arce, Prince C.', 'Junior Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'NS', '2021-09-21', '17', '2021-09-20'),
(453, 'FAS', '14-01871', 'Jalla, John Bernard L.', 'Supervisor', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-21', '13', '2021-09-20'),
(454, 'FAS', '14-01899', 'Bathan, Laurice A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-21', '16', '2021-09-21'),
(455, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', 'Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-21', '16', '2021-09-21'),
(456, 'FAS', '21-06711', 'Arce, Prince C.', 'Junior Staff', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'NS', '2021-09-22', '16', '2021-09-21'),
(457, 'FAS', '14-01871', 'Jalla, John Bernard L.', 'Supervisor', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-23', '18', '2021-09-21'),
(458, 'ADD EVEN', 'AEFL18056', 'Mirabete, Maricris', 'Associate', 'Section 2', 'Mazda J12 Final', '1008', 'VL', 'Settle Important Matter', 'addeven', 'DS', '2021-09-21', '1', '2021-09-21'),
(459, 'ADD EVEN', 'AEFL18199', 'Palmero, Roxanne D.', 'Associate', 'Section 1', 'Suzuki Final', '5119', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-21', '1', '2021-09-21'),
(460, 'ADD EVEN', 'AEF19691', 'Lucero,clariza A.', 'Associate', 'FG Preparation', 'FG Preparation', 'N/A', 'For Cancel', 'For Cancel', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(461, 'ADD EVEN', 'AEFL18056', 'Mirabete, Maricris', 'Associate', 'Section 2', 'Mazda J12 Final', '1008', 'For Cancel', 'For Cancel', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(462, 'ADD EVEN', 'AEFL18021', 'Calilong, Amie M.', 'Associate', 'Section 1', 'Suzuki Final', '5101', 'For Cancel', 'For Cancel', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(463, 'ADD EVEN', 'AEFL18002', 'Manrique, Domingo S.', 'Associate', 'Quality Assurance', 'QA-Final (Mass Pro)', 'QA D01L Final', 'CL', 'Compensatory', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(464, 'ADD EVEN', 'AEFL18081', 'Lomboy, Monica  M.', 'Associate', 'Section 1', 'Suzuki Initial', 'N/A', 'SL', 'Secure medical certificate', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(465, 'ADD EVEN', 'AEFL18080', 'Basares, Emmalyn S.', 'Associate', 'Section 1', 'Suzuki Initial', '5117', 'SL', 'UTI', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(466, 'ADD EVEN', 'AEFL18083', 'Handugan, Eden G.', 'Associate', 'Section 1', 'Suzuki Final', '5111', 'SL', 'Others', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(467, 'ADD EVEN', 'AEFL18097', 'Evangelista, Marienel F.', 'Associate', 'Section 1', 'Suzuki Final', '5102', 'SL', 'Leg cramps', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(468, 'ADD EVEN', 'AEFL18102', 'Seño, Cecilia S.', 'Associate', 'Section 2', 'Mazda Merge Final', '1123', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'addeven', 'NS', '2021-09-24', '1', '2021-09-24'),
(469, 'ADD EVEN', 'AEFL18137', 'Comia, Jonalyn M. ', 'Associate', 'Section 1', 'Suzuki Final', '5120', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(470, 'ADD EVEN', 'AEFL18199', 'Palmero, Roxanne D.', 'Associate', 'Section 1', 'Suzuki Final', '5119', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(471, 'ADD EVEN', 'AEFL18191', 'Insigne, Razelle P.', 'Associate', 'Section 1', 'Suzuki Final', '5124', 'VL', 'Taking Care of Family Member', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(472, 'ADD EVEN', 'AEFL18228', 'Tumlos, Jennifer B.', 'Associate', 'Section 3', 'Daihatsu Initial', 'Second Process (Daihatsu D01L)', 'ML', 'Maternity leave', 'addeven', 'NS', '2021-09-24', '1', '2021-09-24'),
(473, 'ADD EVEN', 'AEFL18260', 'Rodriguez, Aira Mae M. ', 'Associate', 'Section 5', 'Honda Final', 'N/A', 'SUS', 'Suspension', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(474, 'ADD EVEN', 'AEFL18256', 'Piol, Maricel G. ', 'Associate', 'Section 1', 'Suzuki Final', '5124', 'BL', 'Burial of Family Member', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(475, 'ADD EVEN', 'AEFL20680', 'Paran, Eldhira Ann L.', 'Associate', 'Section 5', 'Section 5 Clerk Final', 'N/A', 'VL', 'Vaccination', 'addeven', 'DS', '2021-09-24', '1', '2021-09-24'),
(477, 'ADD EVEN', 'AEFL18002', 'Manrique, Domingo S.', 'Associate', 'Quality Assurance', 'QA-Final (Mass Pro)', 'QA D01L Final', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(480, 'ADD EVEN', 'AEF19691', 'Lucero,clariza A.', 'Associate', 'FG Preparation', 'FG Preparation', 'N/A', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(481, 'ADD EVEN', 'AEFL18021', 'Calilong, Amie M.', 'Associate', 'Section 1', 'Suzuki Final', '5101', 'VL', 'Lost ID', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(482, 'ADD EVEN', 'AEFL18056', 'Mirabete, Maricris', 'Associate', 'Section 2', 'Mazda J12 Final', '1008', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(483, 'ADD EVEN', 'AEFL18080', 'Basares, Emmalyn S.', 'Associate', 'Section 1', 'Suzuki Initial', '5117', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(484, 'ADD EVEN', 'AEFL18102', 'Seño, Cecilia S.', 'Associate', 'Section 2', 'Mazda Merge Final', '1123', 'VL', 'Taking Care of Family Member', 'HR', 'NS', '2021-09-27', '1', '2021-09-27'),
(486, 'ADD EVEN', 'AEFL18083', 'Handugan, Eden G.', 'Associate', 'Section 1', 'Suzuki Final', '5111', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(488, 'ADD EVEN', 'AEFL18191', 'Insigne, Razelle P.', 'Associate', 'Section 1', 'Suzuki Final', '5124', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(489, 'ADD EVEN', 'AEFL18081', 'Lomboy, Monica  M.', 'Associate', 'Section 1', 'Suzuki Initial', 'N/A', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(490, 'ADD EVEN', 'AEFL18199', 'Palmero, Roxanne D.', 'Associate', 'Section 1', 'Suzuki Final', '5119', 'VL', 'Taking Care of Family Member', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(491, 'ADD EVEN', 'AEFL18228', 'Tumlos, Jennifer B.', 'Associate', 'Section 3', 'Daihatsu Initial', 'Second Process (Daihatsu D01L)', 'SUS', 'Suspension', 'HR', 'NS', '2021-09-27', '1', '2021-09-27'),
(492, 'ADD EVEN', 'AEFL18256', 'Piol, Maricel G. ', 'Associate', 'Section 1', 'Suzuki Final', '5124', 'SUS', 'Suspension', 'HR', 'DS', '2021-09-27', '1', '2021-09-27'),
(493, 'ADD EVEN', 'AEFL18260', 'Rodriguez, Aira Mae M. ', 'Associate', 'Section 5', 'Honda Final', 'N/A', 'SUS', 'Suspension', 'HR', 'DS', '2021-09-27', '1', '2021-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `aris_absent_reason`
--

CREATE TABLE `aris_absent_reason` (
  `id` int(14) NOT NULL,
  `reason_categ` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aris_absent_reason`
--

INSERT INTO `aris_absent_reason` (`id`, `reason_categ`, `reason2`, `code`) VALUES
(2, 'BL', 'Burial of Family Member', 'BL-01'),
(3, 'BL', 'Others', 'BL-02'),
(4, 'CL', 'Compensatory', 'CL-01'),
(5, 'CL', 'Others', 'CL-02'),
(6, 'EL', 'Emergency Leave', 'EL-01'),
(7, 'EL', 'Others', 'EL-02'),
(8, 'For Cancel', 'For Cancel', 'CANCEL-01'),
(9, 'For Cancel', 'Others', 'CANCEL-02'),
(10, 'ML', 'Maternity leave', 'ML-01'),
(11, 'ML', 'Miscarriage', 'ML-02'),
(12, 'ML', 'Others', 'ML-03'),
(13, 'PL', 'Paternity Leave', 'PL-01'),
(14, 'PL', 'Others', 'PL-02'),
(15, 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'SL-01'),
(16, 'SL', 'Pregnancy Problem', 'SL-02'),
(17, 'SL', 'Secure medical certificate', 'SL-03'),
(18, 'SL', 'Asthma', 'SL-04'),
(19, 'SL', 'Dizziness', 'SL-05'),
(20, 'SL', 'Waiting for her result in OB gyne', 'SL-06'),
(21, 'SL', 'Hospital Confinement', 'SL-07'),
(22, 'SL', 'Spotting', 'SL-08'),
(23, 'SL', 'Bedrest', 'SL-09'),
(24, 'SL', 'Leg cramps', 'SL-10'),
(25, 'SL', 'Body Pain', 'SL-11'),
(26, 'SL', 'Vehicular Accident', 'SL-12'),
(27, 'SL', 'Stomachache', 'SL-13'),
(28, 'SL', 'Swollen Knee', 'SL-14'),
(29, 'SL', 'Gastritis', 'SL-15'),
(30, 'SL', 'UTI', 'SL-16'),
(31, 'SL', 'Low blood', 'SL-17'),
(32, 'SL', 'Tuberculosis', 'SL-18'),
(33, 'SL', 'Swollen Hand/ Hand Pain', 'SL-19'),
(34, 'SL', 'Swollen Foot/ Foot Pain', 'SL-20'),
(35, 'SL', 'Eye Irritation (swollen, redness,itchiness, sore)', 'SL-21'),
(36, 'SL', 'Migraine', 'SL-22'),
(37, 'SL', 'Check up', 'SL-23'),
(38, 'SL', 'Boil', 'SL-24'),
(39, 'SL', 'Toothache', 'SL-25'),
(40, 'SL', 'Tooth Extraction', 'SL-26'),
(41, 'SL', 'Experiencing side effects of Vaccine', 'SL-27'),
(42, 'SL', 'Dysmenorrhea', 'SL-28'),
(43, 'SL', 'Chest Pain', 'SL-29'),
(44, 'SL', 'Foot Pain', 'SL-30'),
(45, 'SL', 'LBM', 'SL-31'),
(46, 'SL', 'Side Pain', 'SL-32'),
(47, 'SL', 'Hip Pain', 'SL-33'),
(48, 'SL', 'Blood Disease', 'SL-34'),
(49, 'SL', 'Heart Problem', 'SL-35'),
(50, 'SL', 'Difficulty in Breathing', 'SL-36'),
(51, 'SL', 'Waiting for Laboratory Result', 'SL-37'),
(52, 'SL', 'Rashes', 'SL-38'),
(53, 'SL', 'Wound', 'SL-39'),
(54, 'SL', 'Kidney Problem', 'SL-40'),
(55, 'SL', 'Leg pain', 'SL-41'),
(56, 'SL', 'For Pulmo Clearance', 'SL-42'),
(57, 'SL', 'For Dental Consultation', 'SL-43'),
(58, 'SL', 'For Operation/ Surgery', 'SL-44'),
(59, 'SL', 'Anti rabies vaccine', 'SL-45'),
(60, 'SL', 'Others', 'SL-46'),
(61, 'SUS', 'Suspension', 'SUS-01'),
(62, 'SUS', 'Others', 'SUS-02'),
(63, 'VL', 'Taking Care of Family Member', 'VL-01'),
(64, 'VL', 'Settle Important Matter', 'VL-02'),
(65, 'VL', 'Vaccination', 'VL-03'),
(66, 'VL', 'Wedding Preparation', 'VL-04'),
(67, 'VL', 'Birthday celebration of family member', 'VL-05'),
(68, 'VL', 'Celebrating his/her own birthday', 'VL-06'),
(69, 'VL', 'Family matter', 'VL-07'),
(70, 'VL', 'Left by the Shuttle', 'VL-08'),
(71, 'VL', 'For APE', 'VL-09'),
(72, 'VL', 'Lost his wallet', 'VL-10'),
(73, 'VL', 'Lost ID', 'VL-11'),
(74, 'VL', 'Attending christening ', 'VL-12'),
(75, 'VL', 'Woke up late', 'VL-13'),
(76, 'VL', 'Wedding Sponsor', 'VL-14'),
(77, 'VL', 'Transportation problem', 'VL-15'),
(78, 'VL', 'Settle Module of Child', 'VL-16'),
(79, 'VL', 'No Uniform to wear', 'VL-17'),
(80, 'VL', 'Financial Problem', 'VL-18'),
(81, 'VL', 'For resign', 'VL-19'),
(82, 'VL', 'Processing National ID', 'VL-20'),
(83, 'VL', 'Rellocation', 'VL-21'),
(84, 'VL', 'Lockdown', 'VL-22'),
(85, 'VL', 'Body Massage', 'VL-23'),
(86, 'VL', 'Went to province', 'VL-24'),
(87, 'VL', 'Check up of family member', 'VL-25'),
(88, 'VL', 'Others', 'VL-26');

-- --------------------------------------------------------

--
-- Table structure for table `aris_agency`
--

CREATE TABLE `aris_agency` (
  `id` int(14) NOT NULL,
  `agencyCode` varchar(200) DEFAULT NULL,
  `agencyName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aris_agency`
--

INSERT INTO `aris_agency` (`id`, `agencyCode`, `agencyName`) VALUES
(1, 'ADD EVEN', 'Add Even Manpower Resources & Solutions'),
(2, 'FAS', 'Furukawa Automotive System'),
(3, 'GOLDENHAND', 'Goldenhand Management Services Inc.'),
(4, 'IPROMOTE', 'IPromote People Enterprise, Inc.'),
(5, 'MAXIM', 'Maxim'),
(6, 'MEGATREND', 'Megatrend Workforce Management'),
(7, 'ONE SOURCE', 'One Source General Solution Inc.'),
(8, 'PKIMT', 'PKI Manufacturing and Technology. Inc.');

-- --------------------------------------------------------

--
-- Table structure for table `aris_department`
--

CREATE TABLE `aris_department` (
  `id` int(14) NOT NULL,
  `deptCode` varchar(100) DEFAULT NULL,
  `deptSection` varchar(200) DEFAULT NULL,
  `deptSubsection` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aris_department`
--

INSERT INTO `aris_department` (`id`, `deptCode`, `deptSection`, `deptSubsection`) VALUES
(1, 'HR', 'Human Resource & GA', 'General Affairs'),
(2, 'ACC', 'Accounting & Taxation', 'Accounting & Taxation'),
(3, 'HR', 'Human Resource', 'Human Resource'),
(4, 'G-Assist', 'G-Assist Team', 'G-Assist Team'),
(5, 'QA', 'Quality Control', 'QC-Clerk'),
(6, 'QA', 'Quality Control', 'QC-CSG'),
(7, 'QA', 'Quality Management', 'QM-CAG'),
(8, 'QA', 'Quality Management', 'QM-CAG Clerk'),
(9, 'QA', 'Quality Management', 'QM-QMS'),
(10, 'QA', 'Quality Management', 'QM-QMS Clerk'),
(11, 'QA', 'Quality Assurance', 'QA-Final (Mass Pro)'),
(12, 'QA', 'Quality Assurance', 'QA-Final (SWAT)'),
(13, 'QA', 'Quality Assurance', 'QA-Initial (Mass Pro)'),
(14, 'QA', 'Quality Assurance', 'QA-Initial (SWAT)'),
(15, 'QA', 'Quality Control', 'QC Dock Audit'),
(16, 'QA', 'Quality Control', 'QC I-ALERT'),
(17, 'QA', 'Quality Control', 'QC-Improvement'),
(18, 'QA', 'Quality Assurance', 'QA-FGI'),
(19, 'QA', 'Quality Assurance', 'QA-FGI Clerk'),
(20, 'QA', 'Quality Assurance', 'QA-PPG'),
(21, 'QA', 'Quality Assurance', 'QA-PPG Clerk'),
(22, 'PMD', 'Production Control', 'PM_JAP'),
(23, 'PMD', 'Production Control', 'FG Preparation'),
(24, 'PMD', 'Production Control', 'PC Clerk'),
(25, 'PMD', 'Production Control', 'Production Control'),
(26, 'MPD', 'Material Management', 'Material Management'),
(27, 'MPD', 'Material Management', 'MH (WHSE)'),
(28, 'MPD', 'Material Management', 'MM Clerk'),
(29, 'MPD', 'Procurement', 'Procurement'),
(30, 'PMD', 'Production Control', 'IMPEX'),
(31, 'PROD', 'Section 2', 'Toyota Initial'),
(32, 'PROD', 'Section 3', 'Daihatsu Initial'),
(33, 'PROD', 'Section 5', 'Honda Initial '),
(34, 'PROD', 'Section 5', 'Honda_TKRA Initial '),
(35, 'PROD', 'Section 2', 'Mazda J12 Initial'),
(36, 'PROD', 'Section 2', 'Mazda Merge Initial'),
(37, 'PROD', 'Section 3', 'Nissan Initial'),
(38, 'PROD', 'Section 1', 'Section 1 Clerk Initial'),
(39, 'PROD', 'Section 2', 'Section 2 Clerk Initial'),
(40, 'PROD', 'Section 3', 'Section 3 Clerk Initial'),
(41, 'PROD', 'Section 4', 'Section 4 Clerk Initial'),
(42, 'PROD', 'Section 5', 'Section 5 Clerk Initial'),
(43, 'PROD', 'Section 6', 'Section 6 Clerk Initial'),
(44, 'PROD', 'Section 4', 'Subaru Initial'),
(45, 'PROD', 'Section 1', 'Suzuki Initial'),
(46, 'PROD', 'Section 2', 'Toyota Final'),
(47, 'PROD', 'Section 3', 'Daihatsu Final'),
(48, 'PROD', 'Section 5', 'Honda Final'),
(49, 'PROD', 'Section 5', 'Honda_TKRA Final'),
(50, 'PROD', 'Section 2', 'Mazda J12 Final'),
(51, 'PROD', 'Section 2', 'Mazda Merge Final'),
(52, 'PROD', 'Section 3', 'Nissan Final'),
(53, 'PROD', 'Section 1', 'Section 1 Clerk Final'),
(54, 'PROD', 'Section 2', 'Section 2 Clerk Final'),
(55, 'PROD', 'Section 3', 'Section 3 Clerk Final'),
(56, 'PROD', 'Section 4', 'Section 4 Clerk Final'),
(57, 'PROD', 'Section 5', 'Section 5 Clerk Final'),
(58, 'PROD', 'Section 6', 'Section 6 Clerk Final'),
(59, 'PROD', 'Section 4', 'Subaru Final'),
(60, 'PROD', 'Section 1', 'Suzuki Final'),
(61, 'PE', 'MPPD', 'PE Clerk'),
(62, 'PE', 'MPPD', 'PE-Final ( MPPD )'),
(63, 'PE', 'PEC&C', 'PE Initial'),
(64, 'PROD', 'Section 6', 'Distributor'),
(65, 'PROD', 'Section 6', 'PPET'),
(66, 'PROD', 'Section 6', 'Repair Person'),
(67, 'PROD', 'Section 6', 'SWAT Final'),
(68, 'PROD', 'Section 6', 'SWAT Initial'),
(69, 'PROD', 'Section 6', 'Battery Final'),
(70, 'PROD', 'Section 6', 'Battery Initial'),
(71, 'PROD', 'Section 6', 'Tube Cutting'),
(72, 'PROD', 'Section 6', 'Tube Making'),
(73, 'EQD', 'Equipment Engineering', 'Machinery Center'),
(74, 'PROD', 'Section 6', 'VS Laminating'),
(75, 'HR', 'Recruitment & Training', 'Recruitment'),
(76, 'HR', 'Recruitment & Training', 'Non- PD Technical Training'),
(77, 'HR', 'Recruitment & Training', 'PD Technical Training'),
(78, 'PROD', 'Trainees', 'Final Process OJT (Mass Pro)'),
(79, 'PROD', 'Trainees', 'Final Process OJT (New Product)'),
(80, 'PROD', 'Trainees', 'Initial Process OJT (Mass Pro)'),
(81, 'PROD', 'Trainees', 'Initial Process OJT (New Product)'),
(82, 'PE', 'AME', 'PE-Final ( AME )'),
(83, 'IT', 'Information Technology', 'Information Technology'),
(84, 'EQD', 'Equipment Management', 'Calibration'),
(85, 'EQD', 'Equipment Management', 'EM Final (Corrective Maintenance)'),
(86, 'EQD', 'Equipment Management', 'EM Final (Preventive Maintenance)'),
(87, 'EQD', 'Equipment Management', 'EM Initial (Preventive Maintenance)'),
(88, 'EQD', 'Equipment Management', 'EM Initial (Corrective Maintenance)'),
(89, 'EQD', 'Equipment Engineering', 'EQ Clerk'),
(90, 'EQD', 'Equipment Engineering', 'Fabrication'),
(91, 'EQD', 'Equipment Management', 'Machine Data'),
(92, 'EQD', 'Equipment Management', 'Machine Development'),
(93, 'EQD', 'Equipment Management', 'Spareparts'),
(94, 'EQD', 'Equipment Management', 'Facilities'),
(95, 'NF', 'NF Kaizen', 'NF Kaizen'),
(96, 'PDC', 'Production Design Center', 'Production Design Center'),
(97, 'PDC', 'Vietnamese Officers', 'Vietnamese Officers'),
(98, 'PROD', 'Section 6', 'PPET Initial'),
(99, 'PROD', 'Section 6', 'PPET Final'),
(100, 'SHD', 'Safety & Health', 'Safety & Health'),
(101, 'QA', 'Quality Management', 'QM-SMG'),
(102, 'QA', 'Quality Management', 'QM-SQM'),
(103, 'QA', 'Quality Management', 'QM-IQC'),
(104, 'QA', 'Quality Assurance', 'QA-Clerk'),
(105, 'EQD', 'Equipment Management', 'Equipment Management'),
(106, 'EQD', 'Equipment Management', 'ISO / Document Control'),
(107, 'EQD', 'Equipment Engineering', 'Equipment Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `aris_shift`
--

CREATE TABLE `aris_shift` (
  `id` int(14) NOT NULL,
  `shift_code` varchar(10) DEFAULT NULL,
  `shift_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aris_shift`
--

INSERT INTO `aris_shift` (`id`, `shift_code`, `shift_desc`) VALUES
(1, 'DS', 'DAYSHIFT'),
(2, 'NS', 'NIGHTSHIFT');

-- --------------------------------------------------------

--
-- Table structure for table `aris_total_mp`
--

CREATE TABLE `aris_total_mp` (
  `id` int(14) NOT NULL,
  `shift` varchar(10) DEFAULT NULL,
  `total_mp` varchar(100) DEFAULT NULL,
  `agency_code` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aris_total_mp`
--

INSERT INTO `aris_total_mp` (`id`, `shift`, `total_mp`, `agency_code`) VALUES
(1, 'NS', '1618', 'FAS'),
(2, 'DS', '2434', 'FAS'),
(3, 'DS', '434', 'ADD EVEN'),
(5, 'DS', '20', 'GOLDENHAND'),
(6, 'NS', '841', 'MAXIM'),
(7, 'DS', '1522', 'MAXIM'),
(8, 'DS', '1823', 'PKIMT'),
(9, 'NS', '1237', 'PKIMT'),
(10, 'NS', '466', 'MEGATREND'),
(11, 'DS', '573', 'MEGATREND'),
(12, 'DS', '943', 'ONE SOURCE'),
(13, 'NS', '770', 'ONE SOURCE'),
(14, 'NS', '300', 'GOLDENHAND'),
(16, 'NS', '304', 'ADD EVEN');

-- --------------------------------------------------------

--
-- Table structure for table `aris_users`
--

CREATE TABLE `aris_users` (
  `id` int(14) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deptCode` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `deptSection` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `subSection` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aris_users`
--

INSERT INTO `aris_users` (`id`, `username`, `password`, `fullname`, `role`, `deptCode`, `deptSection`, `subSection`) VALUES
(1, '0000', '0000', 'IT Clerk', 'clerk', 'IT', 'Information Technology', 'Information Technology'),
(2, 'admin', 'admin', 'HR', 'admin', 'HR', '', ''),
(3, 'pd5', 'pd5', 'PD5 CLERK', 'clerk', 'PROD', 'Section 3', ''),
(4, 'pd3', 'pd3', 'clerk pd3', 'clerk', 'PROD', 'Section 3', ''),
(5, 'pd1', 'pd2', 'pd1 clerk', 'clerk', 'PROD', 'Section 1', ''),
(6, 'pd2', 'pd2', 'pd2 clerk', 'clerk', 'PROD', 'Section 2', ''),
(7, 'eqd', 'eqd', 'eqd clerk engineering', 'clerk', 'EQD', 'Equipment Engineering', 'Equipment Engineering'),
(8, 'fab', 'fab', 'fab clerk', 'clerk', 'EQD', 'Equipment Engineering', 'Fabrication'),
(9, 'addeven', 'addeven', 'addeven', 'coordinator', 'ADD EVEN', 'Add Even Manpower Resources & Solutions', ''),
(13, 'ipromote', 'ipromote', 'IPROMOTE AGENCY', 'coordinator', 'IPROMOTE', 'IPromote People Enterprise, Inc.', '');

-- --------------------------------------------------------

--
-- Table structure for table `falp_calendar`
--

CREATE TABLE `falp_calendar` (
  `id` int(14) NOT NULL,
  `date_value` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `falp_calendar`
--

INSERT INTO `falp_calendar` (`id`, `date_value`) VALUES
(1, '2021-01-04'),
(2, '2021-01-05'),
(3, '2021-01-06'),
(4, '2021-01-07'),
(5, '2021-01-08'),
(6, '2021-01-09'),
(7, '2021-01-11'),
(8, '2021-01-12'),
(9, '2021-01-13'),
(10, '2021-01-14'),
(11, '2021-01-15'),
(12, '2021-01-16'),
(13, '2021-01-18'),
(14, '2021-01-19'),
(15, '2021-01-20'),
(16, '2021-01-21'),
(17, '2021-01-22'),
(18, '2021-01-23'),
(19, '2021-01-25'),
(20, '2021-01-26'),
(21, '2021-01-27'),
(22, '2021-01-28'),
(23, '2021-01-29'),
(24, '2021-01-30'),
(25, '2021-02-01'),
(26, '2021-02-02'),
(27, '2021-02-03'),
(28, '2021-02-04'),
(29, '2021-02-05'),
(30, '2021-02-06'),
(31, '2021-02-08'),
(32, '2021-02-09'),
(33, '2021-02-10'),
(34, '2021-02-11'),
(35, '2021-02-12'),
(36, '2021-02-13'),
(37, '2021-02-15'),
(38, '2021-02-16'),
(39, '2021-02-17'),
(40, '2021-02-18'),
(41, '2021-02-19'),
(42, '2021-02-20'),
(43, '2021-02-22'),
(44, '2021-02-23'),
(45, '2021-02-24'),
(46, '2021-02-25'),
(47, '2021-02-26'),
(48, '2021-02-27'),
(49, '2021-03-01'),
(50, '2021-03-02'),
(51, '2021-03-03'),
(52, '2021-03-04'),
(53, '2021-03-05'),
(54, '2021-03-06'),
(55, '2021-03-08'),
(56, '2021-03-09'),
(57, '2021-03-10'),
(58, '2021-03-11'),
(59, '2021-03-12'),
(60, '2021-03-13'),
(61, '2021-03-15'),
(62, '2021-03-16'),
(63, '2021-03-17'),
(64, '2021-03-18'),
(65, '2021-03-19'),
(66, '2021-03-20'),
(67, '2021-03-22'),
(68, '2021-03-23'),
(69, '2021-03-24'),
(70, '2021-03-25'),
(71, '2021-03-26'),
(72, '2021-03-27'),
(73, '2021-03-29'),
(74, '2021-04-05'),
(75, '2021-04-06'),
(76, '2021-04-07'),
(77, '2021-04-08'),
(78, '2021-04-12'),
(79, '2021-04-13'),
(80, '2021-04-14'),
(81, '2021-04-15'),
(82, '2021-04-16'),
(83, '2021-04-17'),
(84, '2021-04-19'),
(85, '2021-04-20'),
(86, '2021-04-21'),
(87, '2021-04-22'),
(88, '2021-04-23'),
(89, '2021-04-24'),
(90, '2021-04-26'),
(91, '2021-04-27'),
(92, '2021-04-28'),
(93, '2021-04-29'),
(94, '2021-04-30'),
(95, '2021-05-03'),
(96, '2021-05-04'),
(97, '2021-05-05'),
(98, '2021-05-06'),
(99, '2021-05-07'),
(100, '2021-05-08'),
(101, '2021-05-10'),
(102, '2021-05-11'),
(103, '2021-05-12'),
(104, '2021-05-13'),
(105, '2021-05-14'),
(106, '2021-05-15'),
(107, '2021-05-17'),
(108, '2021-05-18'),
(109, '2021-05-19'),
(110, '2021-05-20'),
(111, '2021-05-21'),
(112, '2021-05-22'),
(113, '2021-05-24'),
(114, '2021-05-25'),
(115, '2021-05-26'),
(116, '2021-05-27'),
(117, '2021-05-28'),
(118, '2021-05-29'),
(119, '2021-05-31'),
(120, '2021-06-01'),
(121, '2021-06-02'),
(122, '2021-06-03'),
(123, '2021-06-04'),
(124, '2021-06-05'),
(125, '2021-06-07'),
(126, '2021-06-08'),
(127, '2021-06-09'),
(128, '2021-06-10'),
(129, '2021-06-11'),
(130, '2021-06-14'),
(131, '2021-06-15'),
(132, '2021-06-16'),
(133, '2021-06-17'),
(134, '2021-06-18'),
(135, '2021-06-19'),
(136, '2021-06-21'),
(137, '2021-06-22'),
(138, '2021-06-23'),
(139, '2021-06-24'),
(140, '2021-06-25'),
(141, '2021-06-26'),
(142, '2021-06-28'),
(143, '2021-06-29'),
(144, '2021-07-02'),
(145, '2021-07-03'),
(146, '2021-07-05'),
(147, '2021-07-06'),
(148, '2021-07-07'),
(149, '2021-07-08'),
(150, '2021-07-09'),
(151, '2021-07-10'),
(152, '2021-07-12'),
(153, '2021-07-13'),
(154, '2021-07-14'),
(155, '2021-07-15'),
(156, '2021-07-16'),
(157, '2021-07-17'),
(158, '2021-07-21'),
(159, '2021-07-22'),
(160, '2021-07-24'),
(161, '2021-07-26'),
(162, '2021-07-27'),
(163, '2021-07-28'),
(164, '2021-07-29'),
(165, '2021-07-30'),
(166, '2021-07-31'),
(167, '2021-08-02'),
(168, '2021-08-03'),
(169, '2021-08-04'),
(170, '2021-08-05'),
(171, '2021-08-06'),
(172, '2021-08-07'),
(173, '2021-08-09'),
(174, '2021-08-10'),
(175, '2021-08-11'),
(176, '2021-08-12'),
(177, '2021-08-13'),
(178, '2021-08-14'),
(179, '2021-08-16'),
(180, '2021-08-17'),
(181, '2021-08-18'),
(182, '2021-08-19'),
(183, '2021-08-20'),
(184, '2021-08-23'),
(185, '2021-08-24'),
(186, '2021-08-25'),
(187, '2021-08-26'),
(188, '2021-08-27'),
(189, '2021-08-28'),
(190, '2021-08-31'),
(191, '2021-09-01'),
(192, '2021-09-02'),
(193, '2021-09-03'),
(194, '2021-09-04'),
(195, '2021-09-06'),
(196, '2021-09-07'),
(197, '2021-09-08'),
(198, '2021-09-09'),
(199, '2021-09-10'),
(200, '2021-09-11'),
(201, '2021-09-13'),
(202, '2021-09-14'),
(203, '2021-09-15'),
(204, '2021-09-16'),
(205, '2021-09-17'),
(206, '2021-09-20'),
(207, '2021-09-21'),
(208, '2021-09-22'),
(209, '2021-09-23'),
(210, '2021-09-24'),
(211, '2021-09-25'),
(212, '2021-09-27'),
(213, '2021-09-28'),
(214, '2021-09-29'),
(215, '2021-10-04'),
(216, '2021-10-05'),
(217, '2021-10-06'),
(218, '2021-10-07'),
(219, '2021-10-08'),
(220, '2021-10-09'),
(221, '2021-10-11'),
(222, '2021-10-12'),
(223, '2021-10-13'),
(224, '2021-10-14'),
(225, '2021-10-15'),
(226, '2021-10-16'),
(227, '2021-10-18'),
(228, '2021-10-19'),
(229, '2021-10-20'),
(230, '2021-10-21'),
(231, '2021-10-22'),
(232, '2021-10-23'),
(233, '2021-10-25'),
(234, '2021-10-26'),
(235, '2021-10-27'),
(236, '2021-10-28'),
(237, '2021-10-29'),
(238, '2021-10-30'),
(239, '2021-11-03'),
(240, '2021-11-04'),
(241, '2021-11-05'),
(242, '2021-11-06'),
(243, '2021-11-08'),
(244, '2021-11-09'),
(245, '2021-11-10'),
(246, '2021-11-11'),
(247, '2021-11-12'),
(248, '2021-11-13'),
(249, '2021-11-15'),
(250, '2021-11-16'),
(251, '2021-11-17'),
(252, '2021-11-18'),
(253, '2021-11-19'),
(254, '2021-11-20'),
(255, '2021-11-22'),
(256, '2021-11-23'),
(257, '2021-11-24'),
(258, '2021-11-25'),
(259, '2021-11-26'),
(260, '2021-11-27'),
(261, '2021-11-29'),
(262, '2021-12-01'),
(263, '2021-12-02'),
(264, '2021-12-03'),
(265, '2021-12-04'),
(266, '2021-12-06'),
(267, '2021-12-07'),
(268, '2021-12-09'),
(269, '2021-12-10'),
(270, '2021-12-11'),
(271, '2021-12-13'),
(272, '2021-12-14'),
(273, '2021-12-15'),
(274, '2021-12-16'),
(275, '2021-12-17'),
(276, '2021-12-20'),
(277, '2021-12-21'),
(278, '2021-12-22'),
(279, '2021-12-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aris_absent_filing`
--
ALTER TABLE `aris_absent_filing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aris_absent_reason`
--
ALTER TABLE `aris_absent_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aris_agency`
--
ALTER TABLE `aris_agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aris_department`
--
ALTER TABLE `aris_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aris_shift`
--
ALTER TABLE `aris_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aris_total_mp`
--
ALTER TABLE `aris_total_mp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aris_users`
--
ALTER TABLE `aris_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `falp_calendar`
--
ALTER TABLE `falp_calendar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aris_absent_filing`
--
ALTER TABLE `aris_absent_filing`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=494;

--
-- AUTO_INCREMENT for table `aris_absent_reason`
--
ALTER TABLE `aris_absent_reason`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `aris_agency`
--
ALTER TABLE `aris_agency`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `aris_department`
--
ALTER TABLE `aris_department`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `aris_shift`
--
ALTER TABLE `aris_shift`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aris_total_mp`
--
ALTER TABLE `aris_total_mp`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `aris_users`
--
ALTER TABLE `aris_users`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `falp_calendar`
--
ALTER TABLE `falp_calendar`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
