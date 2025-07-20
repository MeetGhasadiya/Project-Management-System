-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 08:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `Message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `Message`, `date`) VALUES
(1, 'ird submission', '2024-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `archived_faculty`
--

CREATE TABLE `archived_faculty` (
  `fid` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `contactnumber` varchar(15) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archived_faculty`
--

INSERT INTO `archived_faculty` (`fid`, `fname`, `contactnumber`, `designation`, `email`) VALUES
(13, 'KRISHNA MAKWANA', '8899658652', 'FACULTY', 'krishna.makvana@utu.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `archived_students`
--

CREATE TABLE `archived_students` (
  `sid` int(11) DEFAULT NULL,
  `fullName` varchar(100) DEFAULT NULL,
  `sem` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contactno` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archived_students`
--

INSERT INTO `archived_students` (`sid`, `fullName`, `sem`, `email`, `contactno`) VALUES
(10, 'Meet borad', '5', '22bmiit030@gmail.com', '9824476010'),
(2147483647, 'Maniya jailly shaileshbhai', '5', '22bmiitbscit003@gmail.com', '9824476001'),
(2147483647, 'bapu', '5', 'savaj@gmail.com', '6677889900'),
(2147483647, 'Anjali jawale', '5', '22bmiit002@gmail.com', '9824476002');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `MarksofCriteria` int(11) DEFAULT NULL,
  `evaluationId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`Id`, `name`, `MarksofCriteria`, `evaluationId`) VALUES
(1, 'Registration', 10, 1),
(2, 'Login', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `name`, `Date`, `description`) VALUES
(1, 'Presentation 1', '2024-11-30', 'First Implemetation');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `contactnumber` bigint(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `contactnumber`, `designation`, `email`, `password`) VALUES
(1, 'PREETI BHATT', 8975647385, 'PROJECT HEAD', 'preeti.bhatt@utu.ac.in', '$2y$10$zkgh.3Z8NBKndlJ/j/eQ7eWvo.61v2CGb1LfoEe5uTa8EA3vtDd12'),
(2, 'SANDIP DELWADKAR', 7856479999, 'FACULTY', 'sandip.delwadkar@utu.ac.in', '$2y$10$4ZgW3VB/PvqLfcgCZWBLFusye8hi5BJxrex0y3fJjFakEo8tOeaPK'),
(3, 'HARDIK VYAS', 9978564730, 'FACULTY', 'hardik.vyas@utu.ac.in', '$2y$10$JIuNqA/cvsVSfMvYjM4WHedIDjyM.cfmwtRkpVpRDSG/vKPYpqIrq'),
(4, 'BHUMIKA PATEL', 8856742640, 'FACULTY', 'bhumit.patel@utu.ac.in', '$2y$10$R7C3RYHlOJVsBISZ3pHkdOblxO1IUqBbkx8BzKzKIMKjuuZZHHiju'),
(5, 'SAPAN NAIK', 7685786946, 'FACULTY', 'sapan.naik@utu.ac.in', '$2y$10$pfIQjHBwvJr7efZvC3NdCeRA/10Tl1tzAGB5C7M0rrQcTCCJPv9f2'),
(6, 'BHAVIK SARANG', 7890578905, 'FACULTY', 'bhavik.sarang@utu.ac.in', '$2y$10$jttiQp45Wb3wC0PijPPmm.yXMnngqP0sh1HzO7XHuYMdgy27Issk6'),
(7, 'RAKESH SAVANT', 9876543210, 'FACULTY', 'rakesh.savant@utu.ac.in', '$2y$10$rKEuV16rFq0BgYnQiiaY8.SIJ/TH2ARau4XIXmnJcncoccBcxgAHq'),
(8, 'KAJAL PATIL', 8901234567, 'FACULTY', 'kajal.patil@utu.ac.in', '$2y$10$oltNEbjsNNNTvlD1ZOY3AeM4aKvaCH4tD5yvUANUwQ0.vlxj37.5y'),
(9, 'JIGNA SOLANKY', 7654321098, 'FACULTY', 'jigna.solanki@utu.ac.in', '$2y$10$l8X.z5JQ4QhCSGPZ.pnelOoacVbiVir4Ib8xEbQcjD9F623seCXNm'),
(10, 'JAIMINI PATEL', 6789012345, 'FACULTY', 'jaimini.patel@utu.ac.in', '$2y$10$q67JOra59J/Y/xU3Mp8KQ./QHiJ9nLvnJ3r0UOHla05mnPOgfw6gK'),
(11, 'AYMAN SHEKH', 8876543218, 'FACULTY', 'ayman.shekh@utu.ac.in', '$2y$10$15mRtGkUQB40QfeoLucFL.WPeqtoIpuE.y3FBKIsNmJegzTBJCxkq');

-- --------------------------------------------------------

--
-- Table structure for table `guideallocation`
--

CREATE TABLE `guideallocation` (
  `id` int(11) NOT NULL,
  `groupid` int(11) DEFAULT NULL,
  `projectTitle` varchar(100) DEFAULT NULL,
  `Guide` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guideallocation`
--

INSERT INTO `guideallocation` (`id`, `groupid`, `projectTitle`, `Guide`) VALUES
(1, 4, 'project management system', 'BHUMIKA PATEL'),
(2, 5, 'bus management system', 'JAIMINI PATEL'),
(3, 6, 'Library management system', 'PREETI BHATT'),
(4, 7, 'flower management system', 'AYMAN SHEKH'),
(5, 8, 'Hall booking management system', 'BHAVIK SARANG');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `groupid` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `WorkComplated` varchar(500) DEFAULT NULL,
  `NextTask` varchar(500) DEFAULT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `groupid`, `Date`, `WorkComplated`, `NextTask`, `Status`) VALUES
(2, 4, '2024-11-29', 'ird complete', 'form implementation', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `panelallocation`
--

CREATE TABLE `panelallocation` (
  `panelid` int(11) NOT NULL,
  `Facultyname1` varchar(50) DEFAULT NULL,
  `Facultyname2` varchar(50) DEFAULT NULL,
  `No_of_groups` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panelallocation`
--

INSERT INTO `panelallocation` (`panelid`, `Facultyname1`, `Facultyname2`, `No_of_groups`) VALUES
(1, 'SANDIP DELWADKAR', 'HARDIK VYAS', '3,4,9'),
(2, 'BHAVIK SARANG', 'AYMAN SHEKH', '5,6,7'),
(3, 'PREETI BHATT', 'HARDIK VYAS', '987545');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` bigint(11) NOT NULL,
  `fullName` varchar(50) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contactno` bigint(20) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `fullName`, `sem`, `email`, `contactno`, `password`) VALUES
(202206100110001, 'Anjali jawale', 5, '22bmiit002@gmail.com', 9824476002, '$2y$10$liSAjGy7Ft6Dd1oZ8ff0EesZdrtBdG8jNhaJt/nTa3aCg2CB/xOnS'),
(202206100110002, 'Priyanshi kotadiya', 5, '22bmiit003@gmail.com', 9824476003, '$2y$10$9QqzUgaptl7gkykNuy8gn.T84GgKlos4PC1dqHfs9FlDsmdQrW986'),
(202206100110003, 'Manasvi kalathiya', 55, '22bmiit004@gamil.com', 9824476004, '$2y$10$gOa0tsldGonzFkIfOxOqPu3R0bviPlz61fLv9tcVzd1kPXqYu6YWy'),
(202206100110004, 'Diveysh Dak', 5, '22bmiit005@gmail.com', 9824476005, '$2y$10$N/uX3BtK66fpgPv7G/4kNOcJuc9KMjPpc1rIDRMWhwttDYOyEDfKK'),
(202206100110005, 'Aayushi Patel', 5, '22bmiit006@gmail.com', 9824476006, '$2y$10$grg873bAwRMKXI16U6dY8OKROSzTBhS0CCZ42A65LWnvuEoEfCAw.'),
(202206100110006, 'Manav Patel ', 5, '22bmiit007@gmail.com', 9824476007, '$2y$10$Y0Ln3T0Wefvgm5Ij.1JUdOElzJLcGORdGOtmuHrJ118rP7plmKNCy'),
(202206100110007, 'Gresi lukhi', 5, '22bmiit001@gmail.com', 9824476001, '$2y$10$yHhlR51RqMyCxnc97sUw7OSKOxARrwtcS6i6MOfkSDVlK8beddOL.'),
(202206100110008, 'Tanisha Padhiyar', 5, '22bmiit008@gmail.com', 9824476008, '$2y$10$C4FT5J3EUmbB3qiNHMpLMeLE3JTEKgolCCKbMJ3yYO1Li0e3n57GC'),
(202206100110009, 'Borad Meet Mansukbhai', 5, '22bmiit009@gmail.com', 9824476009, '$2y$10$dFbySw50RipdWUprSOGWsO1HNbs5Jz2ZJ9AlBpH/ENUl6THe6Z6Ru'),
(202206100110010, 'Patel Meet Bharathbhai', 5, '22bmiit010@gmail.com', 9824476010, '$2y$10$FuJ79K9YeVTRcK0M.MlsPOhKDPjTjtH.UGySWANXc.qMor1Pj76ye'),
(202206100110011, 'Vaishnav Meet Dipakbhai', 5, '22bmiit011@gmail.com', 9824476011, '$2y$10$IJH6CF19/Ujoha4RImd/BO1EItDOxapXtkRIVaW/hpDIoJHUA0g3O'),
(202206100110012, 'Patel Vishw Prakashbhai ', 5, '22bmiit012@gmail.com', 9824476012, '$2y$10$PBf3C4gjdFz/.1YYPDXYYuJdH/49cQLSH8qXxpQtL72/I3LcKHLwK'),
(202206100110013, 'Shaili AshishBhai Patel', 5, '22bmiit013@gmail.com', 9824476013, '$2y$10$G2uf67QwGTbNWu51NRFq6uNK91xrtnK1XZjpw8RlXo5djn3/PER5u'),
(202206100110014, 'Aditi VipulKumar Parekh', 5, '22bmiit014@gmail.com', 9824476014, '$2y$10$vu3nWWNI4xQY1EGC8eh8k.xRJHYRqAPDQ7f7pJR0N3U.x2azYwlx2'),
(202206100110015, 'Abhi DharmeshKumar Modi', 5, '22bmiit015@gmail.com', 9824476015, '$2y$10$Oau9/pQUI1Z7Tj/OFKKuKePpiu8UCPX22jv/EGZ4xLOJufa7Il4zC'),
(202206100110016, 'Kuldeepsinh Kiransinh Parmar', 5, '22bmiit016@gmail.com', 9824476016, '$2y$10$u6If5EA8qUJhVgPxHQzHMu5UGYxw/7xRdCSlZ2Tj5N4ucUkEHrUDi'),
(202206100110018, 'Hetvi Vamja', 5, '22bmiit017@gamil.com', 9824476017, '$2y$10$SkqRJWVAchGzV8dMAtbj5.5Aj6vK0GFDsj900ozljYPHQqrH3QHJ6'),
(202206100110019, 'Shruti Hansaliya', 5, '22bmiit018@gmail.com', 9824476018, '$2y$10$z22PGiBkI26HRBktkICite1H30pLgsi9d9kHcKs17THvrGbL90xJu'),
(202206100110020, 'Divya Ghori ', 5, '22bmiit019@gmail.com', 9824476019, '$2y$10$oyXha7thHaeZhApakxWcdOAdrLV6cjWwDjqVHjyKStSYy8E/ZtIxO'),
(202206100110021, 'Jailly Maniya', 5, '22bmiit020@gamil.com', 9824476020, '$2y$10$MGXymj4KunE9BJ4egKEZZO3yjgpf9jp2AVH.Y3SttClTfTPFBskJC'),
(202206100110022, 'Makvana Harikrushn Sanjaybhai ', 5, '22bmiit021@gmail.com', 9824476021, '$2y$10$oysVcc.ne2Yb0fZ1HAjMd.wS.Ji8exwIAm9ZT82td3VtqFOthrQ3K'),
(202206100110023, 'Vekariya Vaikunj Dipakbhai', 5, '22bmiit022@gmail.com', 9824476022, '$2y$10$2inKpyGSgvhC/HJGoqHGVeDCLm3eUn4xeFORR5TjEVHcML1KApYp.'),
(202206100110024, 'Vekariya Jemin Chetanbhai', 5, '22bmiit023@gmail.com', 9824476023, '$2y$10$gNKehQdpqqfyx0gThkcZy.x0M5J8rSMpY0MKE6Y0et9eriqqKdD9C'),
(202206100110025, 'Khatik Sahil Mustak', 5, '22bmiit024@gmail.com', 9824476024, '$2y$10$.tLM5H1Eqv8NOLDgilgWouHvfstc4RgE3wu4WcYIMfN7PQSi2i.5G'),
(202206100110026, 'Harsh Bavlawala', 5, '22bmiit025@gmail.com', 9824476025, '$2y$10$z3Yi7J5e9XTj4x4ulneuK.XNJmw/diP/MP056SIbKj3xg4LAnYwce'),
(202206100110027, 'Harsh Gandhi', 5, '22bmiit026@gmail.com', 9824476026, '$2y$10$QqlhlZRVy3uJp88x8HDHN.BscpZwlMEIOdcX6YdXVZGimloBSmieG'),
(202206100110028, 'Vatsal Bhataria', 5, '22bmiit027@gmail.com', 9824476027, '$2y$10$tzVoOR2WcKVLqazmrFT.nePdKLcz134k44Jk02AG7Ve.TLI07ZoNC'),
(202206100110029, 'Varun Dankhara', 5, '22bmiit028@gmail.com', 9824476028, '$2y$10$xKtjtivVZgfZVdbew/cxROtjXxc0RNResi7z8aQmqdPz.Yy88Iqju'),
(202206100110030, 'Riya Dhorajiya', 5, '22bmiit029@gmail.com', 9824476029, '$2y$10$UQnmVlCKNCARqdouWo/V.OYahyOIOSWe47aD9.fRpnCZhBUtdH.Fu'),
(202206100110031, 'Krish virani', 5, '22bmiit030@gmail.com', 9824476030, '$2y$10$i4U5iCm2xede79GLkPYZW./QilploWDHdMdtH9R3zNb5LoQrY6mae'),
(202206100110032, 'Hemil Ghori', 5, '22bmiit031@gmail.com', 9824476031, '$2y$10$IFQs6AzqHnU5tY8xxLlvdODbEv4nSSMae0YpRD3KVqWjupgqqV50i'),
(202206100110033, 'Isha Jivani', 5, '22bmiit032@gmail.com', 9824476032, '$2y$10$0CvWRN5h4vlAqqS8lDRXGugpNZmBk4T8yWb8znhnmrBj9FULS7nnS'),
(202206100110034, 'Aelis kothiya', 5, '22bmiit033@gmail.com', 9824476033, '$2y$10$UEQQqbxKYRP87o0GXRux5Og0HtKJiMkVA.6sV/XlW9rqoN5sog.Qm'),
(202206100110035, 'Jevin dobriya', 5, '22bmiit034@gmial.com', 9824476034, '$2y$10$dUwVisiMSZNFNUggi2rSMuEgnjrBb.TTSeb/9WyaUyURKRNAGrW1G'),
(202206100110036, 'Jemish kabriya', 5, '22bmiit035@gmail.com', 9824476035, '$2y$10$J6w9rGhyRv0XXu5x948oK.A.xXO4u4USkH5PgdeH2OQMxNJEK4kma'),
(202206100110037, 'Aashish vaghasiya', 5, '22bmiit036@gmail.com', 9824476036, '$2y$10$mjmaQYWhNP.rMybGHwBE0eeoOMCB1P71hwy2cW2FdY/9aeyvNl/6y'),
(202206100110038, 'Dhyey Desai', 5, '22bmiit037@gmail.com', 9824476037, '$2y$10$NviLR.ZuQL5vz.JBJHkoTO/wyTXibA30k.LWGJKjmKhyQJ.ZPJbfq'),
(202206100110039, 'Vidit Prajapati', 5, '22bmiit038@gmail.com', 9824476038, '$2y$10$hodWjjFIXhIgZ6UZYfigQOxxYvToAG.uyVBW.JnbEsu5GfRGuxO56'),
(202206100110040, 'Dev Suthar', 5, '22bmiit039@gmail.com', 9824476039, '$2y$10$PrQUfAuTCtNpdOooh05xme3JJbH924OXSl4xsjoNqEABq5JRnkjma'),
(202206100110041, 'Hiren Hadiya', 5, '22bmiit040@gmail.com', 9824476040, '$2y$10$C5Gms0l0r0EmUwuOy9upP.82DpzfJAVDq/SpB2hutCUV4LUPAc4Pa'),
(202206100110042, 'Rachitkumar  Khushalbhai Patel', 5, '22bmiit041@gmail.com', 9824476041, '$2y$10$l1AYDROsv4BCLB/7z7YFeeQpcxFwb/heU3Y7xK3BhVoQ1.0hThDx.'),
(202206100110043, 'Dev Mineshkumar Patel', 5, '22bmiit042@gmail.com', 9824476042, '$2y$10$V4sH1XfD5JAF7VSUXD0TX.0niQs4wx7ytAfDjJpP18OszNUMqb9oy'),
(202206100110044, 'Bhavarth ketanbhai Vaidya ', 5, '22bmiit043@gmail.com', 9824476043, '$2y$10$Uvt9pI9ATn4Ev5i0923lv.JRNKTqKFUzY1R2wJ6TN16s7yghBYsx6'),
(202206100110045, 'Harshil Manishbhai Patel', 5, '22bmiit044@gmail.com', 9824476044, '$2y$10$hFUPG1whWo.iRpHApln7EOTfR9KQED7em7/Ls0g55sIilPYc1REh.'),
(202206100110046, 'Lathiya Dhruv', 5, '22bmiit045@gmail.com', 9824476045, '$2y$10$gGqZ93DLSieswV9.Zu8vT.KuZ34VBTl60qK.K0HcLiDkhehY9wYqG'),
(202206100110047, 'Goyani Roshan', 5, '22bmiit046@gmail.com', 9824476046, '$2y$10$1FKzZVwB2iFR16BjnDbeV.VWK77vta0ePMY5x8jvE01dNAmPYmF8e'),
(202206100110048, 'Akbari Dhruv', 5, '22bmiit047@gmail.com', 9824476047, '$2y$10$MOChWcW9Ho6mlA48TTu2kOXTveepiA4ncAuZQDCEeGCHQSfysUjpW'),
(202206100110053, 'Vivek Rakholiya', 5, '22bmiit053@gmail.com', 9824476048, '$2y$10$RtUUj5XkslJhvDxC9qmHj.BzmUzyyB8qvruaXvklW7vd4tybCUqVq'),
(202206100110055, 'Meet Ghasadiya ', 5, '22bmiit055@gmail.com', 9824476049, '$2y$10$pZXSR7QTeIR4ichFSi7LWO5wJ2zKxLotijgRIjdCQ8yGyCOshRyKe'),
(202206100110116, 'Om Kachhadiya', 5, '22bmiit116@gmail.com', 9824476050, '$2y$10$QnHYqcVYWCACKBnpd1Pkq.34PXRsxuGY0mvEBDRBfPNQwfI1DOUym'),
(202206100110117, 'Prince Vasoya ', 5, '22bmiit117@gmail.com', 9824476051, '$2y$10$1xt2ZCj28L4zXtYE9OwGhuu2t7/8pFJjbM9g/EjhynkVvq90YFX/e');

-- --------------------------------------------------------

--
-- Table structure for table `studentgroup`
--

CREATE TABLE `studentgroup` (
  `groupid` int(11) NOT NULL,
  `enro1` bigint(11) DEFAULT NULL,
  `enro2` bigint(11) DEFAULT NULL,
  `enro3` bigint(11) DEFAULT NULL,
  `enro4` bigint(11) DEFAULT NULL,
  `name1` varchar(50) DEFAULT NULL,
  `name2` varchar(50) DEFAULT NULL,
  `name3` varchar(50) DEFAULT NULL,
  `name4` varchar(50) DEFAULT NULL,
  `projectTitle` varchar(100) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentgroup`
--

INSERT INTO `studentgroup` (`groupid`, `enro1`, `enro2`, `enro3`, `enro4`, `name1`, `name2`, `name3`, `name4`, `projectTitle`, `Status`) VALUES
(4, 202206100110053, 202206100110055, 202206100110116, 202206100110117, 'vivek', 'meet', 'om', 'prince', 'project management system', 'Approved'),
(5, 202206100110002, 202206100110003, 202206100110004, 202206100110005, 'Priyanshi', 'manasvi', 'divyesh', 'ayushi', 'bus management system', 'Approved'),
(6, 202206100110006, 202206100110007, 202206100110008, 202206100110009, 'Manav', 'Gresi', 'Tanisha', 'Borad', 'Library management system', 'Approved'),
(7, 202206100110010, 202206100110011, 202206100110012, 202206100110013, 'Patel', 'Vaishnav', 'Vishw', 'Shaili', 'flower management system', 'Approved'),
(8, 202206100110014, 202206100110015, 202206100110016, 202206100110018, 'Aditi', 'Abhi', 'Kuldeepsinh', 'Hetvi', 'Hall booking management system', 'Approved'),
(9, 202206100110019, 202206100110020, 202206100110021, 202206100110022, 'Shruti', 'Divya', 'Jailly', 'Makvana', 'Delivery management System', 'pending'),
(10, 202206100110023, 202206100110024, 202206100110025, 202206100110026, 'Vaikunj', 'Jemin', 'Khatik', 'Harsh', 'Benqute booking management sysyem', 'pending'),
(11, 202206100110027, 202206100110028, 202206100110029, 202206100110030, 'Harsh', 'Vatsal', 'Varun', 'Riya', 'Sport management system', 'pending'),
(12, 202206100110031, 202206100110032, 202206100110033, 202206100110034, 'Krish', 'Hemil', 'Isha', 'Aelis', 'Car management system', 'pending'),
(13, 202206100110035, 202206100110036, 202206100110037, 202206100110038, 'Jevin', 'Jemish', 'Aashish', 'Dhyey', 'Movie ticket booking management system', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `studentmarks`
--

CREATE TABLE `studentmarks` (
  `groupid` int(11) DEFAULT NULL,
  `enrollment` bigint(20) DEFAULT NULL,
  `projectTitle` varchar(100) DEFAULT NULL,
  `Eid` int(11) DEFAULT NULL,
  `Cid` int(11) DEFAULT NULL,
  `obtainMarks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentmarks`
--

INSERT INTO `studentmarks` (`groupid`, `enrollment`, `projectTitle`, `Eid`, `Cid`, `obtainMarks`) VALUES
(4, 202206100110053, 'project management system', 1, 1, 8),
(4, 202206100110053, 'project management system', 1, 2, 9),
(4, 202206100110055, 'project management system', 1, 1, 4),
(4, 202206100110055, 'project management system', 1, 2, 6),
(4, 202206100110116, 'project management system', 1, 1, 7),
(4, 202206100110116, 'project management system', 1, 2, 5),
(4, 202206100110117, 'project management system', 1, 1, 2),
(4, 202206100110117, 'project management system', 1, 2, 5),
(5, 202206100110002, 'bus management system', 1, 1, 0),
(5, 202206100110002, 'bus management system', 1, 2, 0),
(5, 202206100110003, 'bus management system', 1, 1, 0),
(5, 202206100110003, 'bus management system', 1, 2, 0),
(5, 202206100110004, 'bus management system', 1, 1, 0),
(5, 202206100110004, 'bus management system', 1, 2, 0),
(5, 202206100110005, 'bus management system', 1, 1, 0),
(5, 202206100110005, 'bus management system', 1, 2, 0),
(6, 202206100110006, 'Library management system', 1, 1, 0),
(6, 202206100110006, 'Library management system', 1, 2, 0),
(6, 202206100110007, 'Library management system', 1, 1, 0),
(6, 202206100110007, 'Library management system', 1, 2, 0),
(6, 202206100110008, 'Library management system', 1, 1, 0),
(6, 202206100110008, 'Library management system', 1, 2, 0),
(6, 202206100110009, 'Library management system', 1, 1, 0),
(6, 202206100110009, 'Library management system', 1, 2, 0),
(7, 202206100110010, 'flower management system', 1, 1, 0),
(7, 202206100110010, 'flower management system', 1, 2, 0),
(7, 202206100110011, 'flower management system', 1, 1, 0),
(7, 202206100110011, 'flower management system', 1, 2, 0),
(7, 202206100110012, 'flower management system', 1, 1, 0),
(7, 202206100110012, 'flower management system', 1, 2, 0),
(7, 202206100110013, 'flower management system', 1, 1, 0),
(7, 202206100110013, 'flower management system', 1, 2, 0),
(8, 202206100110014, 'Hall booking management system', 1, 1, 0),
(8, 202206100110014, 'Hall booking management system', 1, 2, 0),
(8, 202206100110015, 'Hall booking management system', 1, 1, 0),
(8, 202206100110015, 'Hall booking management system', 1, 2, 0),
(8, 202206100110016, 'Hall booking management system', 1, 1, 0),
(8, 202206100110016, 'Hall booking management system', 1, 2, 0),
(8, 202206100110018, 'Hall booking management system', 1, 1, 0),
(8, 202206100110018, 'Hall booking management system', 1, 2, 0),
(9, 202206100110019, 'Delivery management System', 1, 1, 0),
(9, 202206100110019, 'Delivery management System', 1, 2, 0),
(9, 202206100110020, 'Delivery management System', 1, 1, 0),
(9, 202206100110020, 'Delivery management System', 1, 2, 0),
(9, 202206100110021, 'Delivery management System', 1, 1, 0),
(9, 202206100110021, 'Delivery management System', 1, 2, 0),
(9, 202206100110022, 'Delivery management System', 1, 1, 0),
(9, 202206100110022, 'Delivery management System', 1, 2, 0),
(10, 202206100110023, 'Benqute booking management sysyem', 1, 1, 0),
(10, 202206100110023, 'Benqute booking management sysyem', 1, 2, 0),
(10, 202206100110024, 'Benqute booking management sysyem', 1, 1, 0),
(10, 202206100110024, 'Benqute booking management sysyem', 1, 2, 0),
(10, 202206100110025, 'Benqute booking management sysyem', 1, 1, 0),
(10, 202206100110025, 'Benqute booking management sysyem', 1, 2, 0),
(10, 202206100110026, 'Benqute booking management sysyem', 1, 1, 0),
(10, 202206100110026, 'Benqute booking management sysyem', 1, 2, 0),
(11, 202206100110027, 'Sport management system', 1, 1, 0),
(11, 202206100110027, 'Sport management system', 1, 2, 0),
(11, 202206100110028, 'Sport management system', 1, 1, 0),
(11, 202206100110028, 'Sport management system', 1, 2, 0),
(11, 202206100110029, 'Sport management system', 1, 1, 0),
(11, 202206100110029, 'Sport management system', 1, 2, 0),
(11, 202206100110030, 'Sport management system', 1, 1, 0),
(11, 202206100110030, 'Sport management system', 1, 2, 0),
(12, 202206100110031, 'Car management system', 1, 1, 0),
(12, 202206100110031, 'Car management system', 1, 2, 0),
(12, 202206100110032, 'Car management system', 1, 1, 0),
(12, 202206100110032, 'Car management system', 1, 2, 0),
(12, 202206100110033, 'Car management system', 1, 1, 0),
(12, 202206100110033, 'Car management system', 1, 2, 0),
(12, 202206100110034, 'Car management system', 1, 1, 0),
(12, 202206100110034, 'Car management system', 1, 2, 0),
(13, 202206100110035, 'Movie ticket booking management system', 1, 1, 0),
(13, 202206100110035, 'Movie ticket booking management system', 1, 2, 0),
(13, 202206100110036, 'Movie ticket booking management system', 1, 1, 0),
(13, 202206100110036, 'Movie ticket booking management system', 1, 2, 0),
(13, 202206100110037, 'Movie ticket booking management system', 1, 1, 0),
(13, 202206100110037, 'Movie ticket booking management system', 1, 2, 0),
(13, 202206100110038, 'Movie ticket booking management system', 1, 1, 0),
(13, 202206100110038, 'Movie ticket booking management system', 1, 2, 0),
(4, 202206100110053, 'project management system', 1, 1, 0),
(4, 202206100110053, 'project management system', 1, 2, 0),
(4, 202206100110055, 'project management system', 1, 1, 0),
(4, 202206100110055, 'project management system', 1, 2, 0),
(4, 202206100110116, 'project management system', 1, 1, 0),
(4, 202206100110116, 'project management system', 1, 2, 0),
(4, 202206100110117, 'project management system', 1, 1, 0),
(4, 202206100110117, 'project management system', 1, 2, 0),
(5, 202206100110002, 'bus management system', 1, 1, 0),
(5, 202206100110002, 'bus management system', 1, 2, 0),
(5, 202206100110003, 'bus management system', 1, 1, 0),
(5, 202206100110003, 'bus management system', 1, 2, 0),
(5, 202206100110004, 'bus management system', 1, 1, 0),
(5, 202206100110004, 'bus management system', 1, 2, 0),
(5, 202206100110005, 'bus management system', 1, 1, 0),
(5, 202206100110005, 'bus management system', 1, 2, 0),
(6, 202206100110006, 'Library management system', 1, 1, 0),
(6, 202206100110006, 'Library management system', 1, 2, 0),
(6, 202206100110007, 'Library management system', 1, 1, 0),
(6, 202206100110007, 'Library management system', 1, 2, 0),
(6, 202206100110008, 'Library management system', 1, 1, 0),
(6, 202206100110008, 'Library management system', 1, 2, 0),
(6, 202206100110009, 'Library management system', 1, 1, 0),
(6, 202206100110009, 'Library management system', 1, 2, 0),
(7, 202206100110010, 'flower management system', 1, 1, 0),
(7, 202206100110010, 'flower management system', 1, 2, 0),
(7, 202206100110011, 'flower management system', 1, 1, 0),
(7, 202206100110011, 'flower management system', 1, 2, 0),
(7, 202206100110012, 'flower management system', 1, 1, 0),
(7, 202206100110012, 'flower management system', 1, 2, 0),
(7, 202206100110013, 'flower management system', 1, 1, 0),
(7, 202206100110013, 'flower management system', 1, 2, 0),
(8, 202206100110014, 'Hall booking management system', 1, 1, 0),
(8, 202206100110014, 'Hall booking management system', 1, 2, 0),
(8, 202206100110015, 'Hall booking management system', 1, 1, 0),
(8, 202206100110015, 'Hall booking management system', 1, 2, 0),
(8, 202206100110016, 'Hall booking management system', 1, 1, 0),
(8, 202206100110016, 'Hall booking management system', 1, 2, 0),
(8, 202206100110018, 'Hall booking management system', 1, 1, 0),
(8, 202206100110018, 'Hall booking management system', 1, 2, 0),
(9, 202206100110019, 'Delivery management System', 1, 1, 5),
(9, 202206100110019, 'Delivery management System', 1, 2, 1),
(9, 202206100110020, 'Delivery management System', 1, 1, 7),
(9, 202206100110020, 'Delivery management System', 1, 2, 9),
(9, 202206100110021, 'Delivery management System', 1, 1, 6),
(9, 202206100110021, 'Delivery management System', 1, 2, 5),
(9, 202206100110022, 'Delivery management System', 1, 1, 8),
(9, 202206100110022, 'Delivery management System', 1, 2, 9),
(10, 202206100110023, 'Benqute booking management sysyem', 1, 1, 0),
(10, 202206100110023, 'Benqute booking management sysyem', 1, 2, 0),
(10, 202206100110024, 'Benqute booking management sysyem', 1, 1, 0),
(10, 202206100110024, 'Benqute booking management sysyem', 1, 2, 0),
(10, 202206100110025, 'Benqute booking management sysyem', 1, 1, 0),
(10, 202206100110025, 'Benqute booking management sysyem', 1, 2, 0),
(10, 202206100110026, 'Benqute booking management sysyem', 1, 1, 0),
(10, 202206100110026, 'Benqute booking management sysyem', 1, 2, 0),
(11, 202206100110027, 'Sport management system', 1, 1, 0),
(11, 202206100110027, 'Sport management system', 1, 2, 0),
(11, 202206100110028, 'Sport management system', 1, 1, 0),
(11, 202206100110028, 'Sport management system', 1, 2, 0),
(11, 202206100110029, 'Sport management system', 1, 1, 0),
(11, 202206100110029, 'Sport management system', 1, 2, 0),
(11, 202206100110030, 'Sport management system', 1, 1, 0),
(11, 202206100110030, 'Sport management system', 1, 2, 0),
(12, 202206100110031, 'Car management system', 1, 1, 0),
(12, 202206100110031, 'Car management system', 1, 2, 0),
(12, 202206100110032, 'Car management system', 1, 1, 0),
(12, 202206100110032, 'Car management system', 1, 2, 0),
(12, 202206100110033, 'Car management system', 1, 1, 0),
(12, 202206100110033, 'Car management system', 1, 2, 0),
(12, 202206100110034, 'Car management system', 1, 1, 0),
(12, 202206100110034, 'Car management system', 1, 2, 0),
(13, 202206100110035, 'Movie ticket booking management system', 1, 1, 0),
(13, 202206100110035, 'Movie ticket booking management system', 1, 2, 0),
(13, 202206100110036, 'Movie ticket booking management system', 1, 1, 0),
(13, 202206100110036, 'Movie ticket booking management system', 1, 2, 0),
(13, 202206100110037, 'Movie ticket booking management system', 1, 1, 0),
(13, 202206100110037, 'Movie ticket booking management system', 1, 2, 0),
(13, 202206100110038, 'Movie ticket booking management system', 1, 1, 0),
(13, 202206100110038, 'Movie ticket booking management system', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `groupid` int(11) DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `filepath` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `password`) VALUES
(0, 'admin1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `evaluationId` (`evaluationId`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `contactno` (`contactnumber`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `guideallocation`
--
ALTER TABLE `guideallocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`);

--
-- Indexes for table `panelallocation`
--
ALTER TABLE `panelallocation`
  ADD PRIMARY KEY (`panelid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `studentgroup`
--
ALTER TABLE `studentgroup`
  ADD PRIMARY KEY (`groupid`),
  ADD UNIQUE KEY `enro1` (`enro1`),
  ADD UNIQUE KEY `enro2` (`enro2`),
  ADD UNIQUE KEY `enro3` (`enro3`),
  ADD UNIQUE KEY `enro4` (`enro4`);

--
-- Indexes for table `studentmarks`
--
ALTER TABLE `studentmarks`
  ADD KEY `groupid` (`groupid`),
  ADD KEY `Eid` (`Eid`),
  ADD KEY `Cid` (`Cid`),
  ADD KEY `enrollment` (`enrollment`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guideallocation`
--
ALTER TABLE `guideallocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `panelallocation`
--
ALTER TABLE `panelallocation`
  MODIFY `panelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentgroup`
--
ALTER TABLE `studentgroup`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `criteria`
--
ALTER TABLE `criteria`
  ADD CONSTRAINT `criteria_ibfk_1` FOREIGN KEY (`evaluationId`) REFERENCES `evaluation` (`id`);

--
-- Constraints for table `guideallocation`
--
ALTER TABLE `guideallocation`
  ADD CONSTRAINT `guideallocation_ibfk_1` FOREIGN KEY (`groupid`) REFERENCES `studentgroup` (`groupid`);

--
-- Constraints for table `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `logbook_ibfk_1` FOREIGN KEY (`groupid`) REFERENCES `studentgroup` (`groupid`);

--
-- Constraints for table `studentmarks`
--
ALTER TABLE `studentmarks`
  ADD CONSTRAINT `studentmarks_ibfk_1` FOREIGN KEY (`groupid`) REFERENCES `studentgroup` (`groupid`),
  ADD CONSTRAINT `studentmarks_ibfk_2` FOREIGN KEY (`Eid`) REFERENCES `evaluation` (`id`),
  ADD CONSTRAINT `studentmarks_ibfk_3` FOREIGN KEY (`Cid`) REFERENCES `criteria` (`Id`),
  ADD CONSTRAINT `studentmarks_ibfk_4` FOREIGN KEY (`enrollment`) REFERENCES `student` (`sid`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`groupid`) REFERENCES `studentgroup` (`groupid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
