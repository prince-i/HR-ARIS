-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 08:02 AM
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
  `section` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `carmodel_group` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `process_line` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason_2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploader` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `shift` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_absent` date NOT NULL,
  `date_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aris_absent_filing`
--

INSERT INTO `aris_absent_filing` (`id`, `provider`, `emp_id_number`, `name`, `section`, `carmodel_group`, `process_line`, `reason`, `reason_2`, `uploader`, `shift`, `date_absent`, `date_upload`) VALUES
(321, 'FAS', '21-06711', 'Arce, Prince C.', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-07', '2021-09-07'),
(322, 'FAS', '14-01871', 'Jalla, John Bernard L.', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-07', '2021-09-07'),
(323, 'FAS', '14-02094', 'Basilan, Ma. Zarah Jane A.', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-07', '2021-09-07'),
(324, 'FAS', '14-01899', 'Bathan, Laurice A.', 'Information Technology', 'Information Technology', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'IT Clerk', 'DS', '2021-09-07', '2021-09-07'),
(325, 'MAXIM', 'BF-41123', 'Orenday, Marivic S', 'Section 3', 'Daihatsu Initial', 'Secondary Process (Daihatsu D01L)', 'VL', 'Wedding Preparation', 'PD5 CLERK', 'NS', '2021-09-07', '2021-09-07'),
(326, 'MAXIM', 'BF-40294', 'Señadan, Julie Ann P', 'Section 3', 'Daihatsu Final', '2111', 'VL', 'Taking Care of Family Member', 'PD5 CLERK', 'DS', '2021-09-07', '2021-09-07'),
(327, 'MAXIM', 'BF-17750', 'De Guzman, Allan D', 'Section 3', 'Daihatsu Final', '2109', 'VL', 'Settle Important Matter', 'PD5 CLERK', 'DS', '2021-09-07', '2021-09-07'),
(328, 'MAXIM', 'BF-40717', 'Sollivan, Rea  P', 'Section 3', 'Daihatsu Final', 'N/A', 'VL', 'Vaccination', 'PD5 CLERK', 'DS', '2021-09-07', '2021-09-07'),
(329, 'FAS', '12-0116', 'Malibiran, Mary Angelique C.', 'Section 3', 'Daihatsu Final', '2121', 'VL', 'Taking Care of Family Member', 'PD5 CLERK', 'DS', '2021-09-07', '2021-09-07'),
(330, 'FAS', '12-0081', 'Cailao, Eugenio V.', 'Section 3', 'Daihatsu Final', 'N/A', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'PD5 CLERK', 'DS', '2021-09-07', '2021-09-07'),
(331, 'FAS', '13-00910', 'Pastoral, Lady Lyn D.', 'Section 3', 'Daihatsu Final', '2111', 'ML', 'Maternity leave', 'PD5 CLERK', 'NS', '2021-09-07', '2021-09-07'),
(332, 'FAS', '13-0156', 'Falogme, Jenny Ann F.', 'Section 3', 'Daihatsu Initial', 'First Process (Daihatsu D01L)', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'PD5 CLERK', 'ADS', '2021-09-07', '2021-09-07'),
(333, 'FAS', '13-0242', 'De Guzman, Mary Rose U.', 'Section 3', 'Daihatsu Final', '2120', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'PD5 CLERK', 'DS', '2021-09-07', '2021-09-07'),
(334, 'FAS', '13-0167', 'Silva, Romana B.', 'Section 3', 'Daihatsu Final', '2114', 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)', 'PD5 CLERK', 'DS', '2021-09-07', '2021-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `aris_absent_reason`
--

CREATE TABLE `aris_absent_reason` (
  `id` int(14) NOT NULL,
  `reason_categ` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aris_absent_reason`
--

INSERT INTO `aris_absent_reason` (`id`, `reason_categ`, `reason2`) VALUES
(1, 'SL', 'Home quarantine (Fever,Cough, Cold, Sorethroat, Headache of 2 days or more, Body Pain of 2 days or more, LBM of 2 days or more, close contact, mandatory quarantine)'),
(2, 'SL', 'Pregnancy Problem'),
(3, 'SL', 'Secure medical certificate'),
(4, 'SL', 'Asthma'),
(5, 'SL', 'Dizziness'),
(6, 'SL', 'Waiting for her result in OB gyne'),
(7, 'SL', 'Hospital Confinement'),
(8, 'SL', 'Spotting'),
(9, 'SL', 'Bedrest'),
(10, 'SL', 'Leg cramps'),
(11, 'SL', 'Body Pain'),
(12, 'SL', 'Vehicular Accident'),
(13, 'SL', 'Stomachache'),
(14, 'SL', 'Swollen Knee'),
(15, 'SL', 'Gastritis'),
(16, 'SL', 'UTI'),
(17, 'SL', 'Low blood'),
(18, 'SL', 'Tuberculosis'),
(19, 'SL', 'Swollen Hand/ Hand Pain'),
(20, 'SL', 'Swollen Foot/ Foot Pain'),
(21, 'SL', 'Eye Irritation (swollen, redness,itchiness, sore)'),
(22, 'SL', 'Migraine'),
(23, 'SL', 'Check up'),
(24, 'SL', 'Boil'),
(25, 'SL', 'Toothache'),
(26, 'SL', 'Tooth Extraction'),
(27, 'SL', 'Experiencing side effects of Vaccine'),
(28, 'SL', 'Dysmenorrhea'),
(29, 'SL', 'Chest Pain'),
(30, 'SL', 'Foot Pain'),
(31, 'SL', 'LBM'),
(32, 'SL', 'Side Pain'),
(33, 'SL', 'Hip Pain'),
(34, 'SL', 'Blood Disease'),
(35, 'SL', 'Heart Problem'),
(36, 'SL', 'Difficulty in Breathing'),
(37, 'SL', 'Waiting for Laboratory Result'),
(38, 'SL', 'Rashes'),
(39, 'SL', 'Wound'),
(40, 'SL', 'Kidney Problem'),
(41, 'SL', 'Leg pain'),
(42, 'SL', 'For Pulmo Clearance'),
(43, 'SL', 'For Dental Consultation'),
(44, 'SL', 'For Operation/ Surgery'),
(45, 'SL', 'Anti rabies vaccine'),
(46, 'VL', 'Taking Care of Family Member'),
(47, 'VL', 'Settle Important Matter'),
(48, 'VL', 'Vaccination'),
(49, 'VL', 'Wedding Preparation'),
(50, 'VL', 'Birthday celebration of family member'),
(51, 'VL', 'Celebrating his/her own birthday'),
(52, 'VL', 'Family matter'),
(53, 'VL', 'Left by the Shuttle'),
(54, 'VL', 'For APE'),
(55, 'VL', 'Lost his wallet'),
(56, 'VL', 'Lost ID'),
(57, 'VL', 'Attending christening '),
(58, 'VL', 'Woke up late'),
(59, 'VL', 'Wedding Sponsor'),
(60, 'VL', 'Transportation problem'),
(61, 'VL', 'Settle Module of Child'),
(62, 'VL', 'No Uniform to wear'),
(63, 'VL', 'Financial Problem'),
(64, 'VL', 'For resign'),
(65, 'VL', 'Processing National ID'),
(66, 'VL', 'Rellocation'),
(67, 'VL', 'Lockdown'),
(68, 'VL', 'Body Massage'),
(69, 'VL', 'Went to province'),
(70, 'VL', 'Check up of family member'),
(71, 'ML', 'Maternity leave'),
(72, 'ML', 'Miscarriage'),
(73, 'SUS', 'Suspension'),
(74, 'PL', 'Paternity Leave'),
(75, 'EL', 'Emergency Leave'),
(76, 'BL', 'Burial of Family Member'),
(77, 'For Cancel', 'For Cancel'),
(78, 'CL', 'Compensatory'),
(79, 'SL', 'Others'),
(80, 'VL', 'Others'),
(81, 'ML', 'Others'),
(82, 'SUS', 'Others'),
(83, 'PL', 'Others'),
(84, 'EL', 'Others'),
(85, 'BL', 'Others'),
(86, 'For Cancel', 'Others'),
(87, 'CL', 'Others');

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
  `handleLine` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aris_users`
--

INSERT INTO `aris_users` (`id`, `username`, `password`, `fullname`, `role`, `deptCode`, `deptSection`, `handleLine`) VALUES
(1, '0000', '0000', 'IT Clerk', 'clerk', 'IT', 'Information Technology', 'Information Technology'),
(2, 'admin', 'admin', 'HR', 'admin', 'HR', '', ''),
(3, 'pd5', 'pd5', 'PD5 CLERK', 'clerk', 'PROD', 'Section 3', '');

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
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `aris_absent_reason`
--
ALTER TABLE `aris_absent_reason`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `aris_agency`
--
ALTER TABLE `aris_agency`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `aris_department`
--
ALTER TABLE `aris_department`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `aris_users`
--
ALTER TABLE `aris_users`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `falp_calendar`
--
ALTER TABLE `falp_calendar`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
