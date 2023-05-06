-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 09:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rebnd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdeliveryaddress`
--

CREATE TABLE `tblorderdeliveryaddress` (
  `id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `street` varchar(1000) NOT NULL,
  `Apt` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblorderdeliveryaddress`
--

INSERT INTO `tblorderdeliveryaddress` (`id`, `invoice`, `street`, `Apt`, `city`, `state`, `zip`) VALUES
(24, '1026', '120 Melrose Blvd.', '1', 'San Diego', 'CA', '18920'),
(25, '1027', '12 Bucaneers Blvd.', '2', 'Tampa Bay', 'FL', '20818'),
(26, '1028', '12 Bucaneers Blvd.', '1', 'Tampa Bay', 'FL', '02181'),
(27, '1029', '12 Bucaneers Blvd.', '2', 'Tampa Bay', 'FL', '01281'),
(28, '1030', '12 Bucaneers Blvd.', '200', 'Tampa Bay', 'FL', '01281'),
(29, '1031', '34 Celtics Ln.', '2008', 'Inglewood', 'CA', '90215'),
(30, '1032', '32 Howard St.', '2', 'Lynn', 'MA', '01902'),
(31, '1033', '30 Commercial St.', '1', 'Lynn', 'Massachusetts', '01905'),
(32, '1034', '128 Essex St.', '1', 'Salem', 'MA', '01898');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `c_name`, `picture`, `createdby`, `createddate`) VALUES
(1, 'Tops', '1.png', 18, '2022-09-27'),
(2, 'Bottoms', '2.png', 18, '2022-09-27'),
(3, 'Footwear', '3.png', 18, '2022-09-27'),
(4, 'Accessories', '4.png', 18, '2022-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `itemname` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createddate` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `category_id`, `itemname`, `price`, `qty`, `picture`, `createdby`, `createddate`, `status`, `description`) VALUES
(20, 1, 'BIllionaire Boys Club Arch Logo SS Tee', 60, 92, 'BBCArch_front.jpg', 38, '2022-12-14', 'active', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.'),
(21, 1, 'Billionaire Boys Club Blur SS Tee - Navy', 60, 100, 'BBCBlur_front.jpg', 38, '2022-12-14', 'active', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.'),
(22, 1, 'Billionaire Boys Club Blur SS Tee - White', 60, 100, 'BBCBlurWhit_front.jpg', 38, '2022-12-14', 'active', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.'),
(23, 1, 'Billionaire Boys Club Helmet SS Tee - White', 60, 100, 'BBCHelm_front.jpg', 38, '2022-12-14', 'active', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.'),
(24, 1, 'Billionaire Boys Club Helmet SS Tee - Blue', 60, 100, 'BBCHelmBlue_front.png', 38, '2022-12-14', 'active', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.'),
(25, 2, 'Billionaire Boys Club Prosper Short', 55, 98, 'BBCProsp_front00.jpg', 38, '2022-12-14', 'active', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.'),
(26, 2, 'Billionaire Boys Club Instructor Short - Black', 50, 100, 'BBCShort_front.jpg', 38, '2022-12-14', 'active', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.'),
(27, 2, 'Billionaire Boys Club Instructor Short - Blue', 50, 99, 'BBCShortBlue_front.jpg', 38, '2022-12-14', 'active', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.'),
(28, 1, 'Born X Raised Cybernetics Tee', 40, 99, 'BxRCyb_Front.jpg', 39, '2022-12-14', 'active', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of Gangstar, hip hop and skateboarding cultures.'),
(29, 4, 'Born X Raised Snapback Hat', 35, 100, 'BxRHat_Front.jpg', 39, '2022-12-14', 'active', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of Gangstar, hip hop and skateboarding cultures.'),
(30, 1, 'Born X Raised Sunset LS Tee', 45, 97, 'BxRSunset_back.jpg', 39, '2022-12-14', 'active', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of Gangstar, hip hop and skateboarding cultures.'),
(31, 1, 'Born X Raised Tonal Hoodie', 70, 100, 'BxRTonHoodie_front.jpg', 39, '2022-12-14', 'active', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of Gangstar, hip hop and skateboarding cultures.'),
(32, 1, 'Born X Raised You\'ll Miss Us Hoodie', 70, 97, 'BxRMiss_Front.jpg', 39, '2022-12-14', 'active', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of Gangstar, hip hop and skateboarding cultures.'),
(33, 2, 'Champion Reverse Weave Cutoff Short - Black', 60, 100, 'ChampCutShort_front.jpg', 40, '2022-12-14', 'active', 'Your sweats rotation isn\'t complete without our these classic, cut-off shorts with all the comfort of heavyweight Reverse Weave fleece. Retro cut-off hem gives them that worn-in, favorite shorts feel. Heritage details like our original men\'s classic fit, signature stretch gusset and elastic waistband with drawcord stand the test of time. Legendary heavyweight fleece is cut on the cross-grain to resist vertical shrinkage, so the fit stays true. The soft brushed interior keeps you comfortable year-round from workout warm-up\'s to weekends. Longer 10-inch length and essential side pockets to hold tech and keys.'),
(34, 2, 'Champion Reverse Weave Cutoff Short - Coral', 60, 100, 'ChampCutShortPink_front.jpg', 40, '2022-12-14', 'active', 'Your sweats rotation isn\'t complete without our these classic, cut-off shorts with all the comfort of heavyweight Reverse Weave fleece. Retro cut-off hem gives them that worn-in, favorite shorts feel. Heritage details like our original men\'s classic fit, signature stretch gusset and elastic waistband with drawcord stand the test of time. Legendary heavyweight fleece is cut on the cross-grain to resist vertical shrinkage, so the fit stays true. The soft brushed interior keeps you comfortable year-round from workout warm-up\'s to weekends. Longer 10-inch length and essential side pockets to hold tech and keys.'),
(35, 1, 'Champion Reverse Weave Hoodie - Green', 70, 100, 'ChampHoodieGreen_front.jpg', 40, '2022-12-14', 'active', 'The Reverse Weave Hoodie was a game-changer for athletes over 80 years ago. Today it\'s a true American icon, as authentic on the street as it is in the stands. Champion\'s legendary men\'s heavyweight fleece hoodie resists vertical shrinkage, so the fit stays true. Has our original. classic men\'s fit that\'s made to fit everyone and heritage details like our double-layer hood, hand-warmer kanga pocket, durable double-needle construction and signature stretch side panels that stand the test of time.'),
(36, 1, 'Champion Reverse Weave Quarter Zip Hoodie - Black', 75, 100, 'ChampQTRBlk_front.jpg', 40, '2022-12-14', 'active', 'The Reverse Weave Hoodie was a game-changer for athletes over 80 years ago. Today it\'s a true American icon, as authentic on the street as it is in the stands. Champion\'s legendary men\'s heavyweight fleece hoodie resists vertical shrinkage, so the fit stays true. Has our original. classic men\'s fit that\'s made to fit everyone and heritage details like our double-layer hood, hand-warmer kanga pocket, durable double-needle construction and signature stretch side panels that stand the test of time.'),
(37, 1, 'Champion Reverse Weave Quarter Zip Hoodie - Wheat', 75, 100, 'ChampQTRWheat_front.jpg', 40, '2022-12-14', 'active', 'The Reverse Weave Hoodie was a game-changer for athletes over 80 years ago. Today it\'s a true American icon, as authentic on the street as it is in the stands. Champion\'s legendary men\'s heavyweight fleece hoodie resists vertical shrinkage, so the fit stays true. Has our original. classic men\'s fit that\'s made to fit everyone and heritage details like our double-layer hood, hand-warmer kanga pocket, durable double-needle construction and signature stretch side panels that stand the test of time.'),
(38, 1, 'Champion Reverse Weave Script Crewneck ', 55, 100, 'ChampScriptCrew_front.jpg', 40, '2022-12-14', 'active', 'Champion spent over 80 years perfecting their original sweatshirt, and its classic style has the staying power to prove it. Today it reigns as King of Sweatshirts, as authentic on the street as it is in the stands. Heritage details like our original classic men\'s fit, signature stretch side panels and double-needle construction are made to stand the test of time. Legendary heavyweight Reverse Weave fleece is cut on the cross-grain to resist vertical shrinkage, so the fit stays true. The soft brushed interior keeps you comfortable from workout warm-up\'s to weekends'),
(39, 3, 'Clarks Desert Boot - Brown', 110, 100, 'ClarksDesert_lateral.jpg', 41, '2022-12-14', 'active', 'Stylish and versatile, the original Desert Boot from Clarks launched in 1950 by Nathan Clark and was inspired by a rough boot from Cairo\'s Old Bazaar. An instant hit, it became the footwear of choice for off-duty army officers. A premium brown suede upper is teamed with an unfussy lace fastening and our signature crepe sole.'),
(40, 3, 'Clarks Wallabee Boot - Black', 120, 100, 'ClarksWallBlk_lateral.png', 41, '2022-12-14', 'active', 'The Wallabee has become an iconic classic in our Clarks Originals collection across the globe thanks to its moccasin construction and structural silhouette. Featuring clean and simple lines, this comfortable lace-up style is crafted from Stead\'s suede in maple. The finishing touch is our signature crepe sole which continues to stand the test of time.'),
(41, 3, 'Clarks Wallabee Boot Low - Olive', 115, 100, 'ClarksWallOlv_lateral.png', 41, '2022-12-14', 'active', 'The Wallabee has become an iconic classic in our Clarks Originals collection across the globe thanks to its moccasin construction and structural silhouette. Featuring clean and simple lines, this comfortable lace-up style is crafted from Stead\'s suede in maple. The finishing touch is our signature crepe sole which continues to stand the test of time.'),
(42, 3, 'Clarks Wallabee Boot - Beeswax', 120, 100, 'ClarksWallBee_lateral.png', 41, '2022-12-14', 'active', 'The Wallabee has become an iconic classic in our Clarks Originals collection across the globe thanks to its moccasin construction and structural silhouette. Featuring clean and simple lines, this comfortable lace-up style is crafted from Stead\'s suede in maple. The finishing touch is our signature crepe sole which continues to stand the test of time.'),
(43, 3, 'Clarks Wallabee Boot - Navy', 120, 100, 'ClarksWallNav_lateral.png', 41, '2022-12-14', 'active', 'The Wallabee has become an iconic classic in our Clarks Originals collection across the globe thanks to its moccasin construction and structural silhouette. Featuring clean and simple lines, this comfortable lace-up style is crafted from Stead\'s suede in maple. The finishing touch is our signature crepe sole which continues to stand the test of time.'),
(44, 1, 'Homage Biggie Tee', 35, 100, 'HomageBiggie_front.jpg', 45, '2022-12-14', 'active', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.'),
(45, 1, 'Homage ODB Tee', 35, 100, 'HomageODB_front.jpg', 45, '2022-12-14', 'active', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.'),
(46, 1, 'Homage Nigo Tee', 35, 100, 'HomageNigo_front.jpg', 45, '2022-12-14', 'active', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.'),
(47, 1, 'Homage Slick Rick Tee', 35, 99, 'HomageRick_front.jpg', 45, '2022-12-14', 'active', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.'),
(48, 1, 'Homage Tupac Tee', 35, 99, 'HomageTupac_front.jpg', 45, '2022-12-14', 'active', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.'),
(49, 1, 'Kappa 222 Banda Calsi Polo - Beige', 40, 100, 'KappaPoloBge_front.jpg', 43, '2022-12-14', 'active', 'Kappas heritage is an inexhaustible source of inspiration for contemporary lifestyle. There are details and styles that go beyond time and identify a taste and a way of being. The Authentic Label take inspiration from this iconic and valuable heritage to reinterpret it in a new way all the time. Total look collections are born from the rereading of the styles that made the history of the brand, able to reach and capture different cultures and references of our time. Kappa Authentic is a classic that constantly reinvented and imposes itself as a trend.'),
(50, 1, 'Kappa 222 Banda Calsi Polo - Black', 40, 100, 'KappaPoloBlk_front.jpg', 43, '2022-12-14', 'active', 'Kappas heritage is an inexhaustible source of inspiration for contemporary lifestyle. There are details and styles that go beyond time and identify a taste and a way of being. The Authentic Label take inspiration from this iconic and valuable heritage to reinterpret it in a new way all the time. Total look collections are born from the rereading of the styles that made the history of the brand, able to reach and capture different cultures and references of our time. Kappa Authentic is a classic that constantly reinvented and imposes itself as a trend.'),
(51, 1, 'Kappa 222 Banda Calsi Polo - Green', 40, 100, 'KappaPoloGrn_front.jpg', 43, '2022-12-14', 'active', 'Kappas heritage is an inexhaustible source of inspiration for contemporary lifestyle. There are details and styles that go beyond time and identify a taste and a way of being. The Authentic Label take inspiration from this iconic and valuable heritage to reinterpret it in a new way all the time. Total look collections are born from the rereading of the styles that made the history of the brand, able to reach and capture different cultures and references of our time. Kappa Authentic is a classic that constantly reinvented and imposes itself as a trend.'),
(52, 3, 'Karhu Aria 95 Catch of the Day Pack', 80, 100, 'KarhuAriaCOTD_lateral.jpg', 44, '2022-12-14', 'active', 'The Aria 95 is a salute to the original Karhu Fusion model from 1996 when it was top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Aria 95.'),
(53, 3, 'Karhu Fusion 2.0 Misty Rose', 90, 100, 'KarhuMisty_lateral.jpg', 44, '2022-12-14', 'active', 'The Fusion 2.0 is a salute to the original Karhu Fusion model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Fusion 2.0'),
(54, 3, 'Karhu Fusion 2.0 Monthless Pack', 90, 100, 'KarhuMonth_lateral.png', 44, '2022-12-14', 'active', 'The Fusion 2.0 is a salute to the original Karhu Fusion model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Fusion 2.0'),
(55, 3, 'Karhu Fusion 2.0 Night Sky ', 90, 100, 'KarhuNight_lateral.png', 44, '2022-12-14', 'active', 'The Fusion 2.0 is a salute to the original Karhu Fusion model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Fusion 2.0'),
(56, 3, 'Karhu Fusion 2.0 Tonal Black', 90, 100, 'KarhuTonal_lateral.png', 44, '2022-12-14', 'active', 'The Fusion 2.0 is a salute to the original Karhu Fusion model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Fusion 2.0'),
(57, 3, 'Karhu Synchron Classic Catch of the Day Pack', 85, 100, 'KarhuSync_lateral.png', 44, '2022-12-14', 'active', 'The Synchron is a salute to the original Karhu Fusion model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Synchron.'),
(58, 3, 'Saucony Grid Azura 2000 Amazon Mallard', 90, 99, 'SaucMallard_lateral.jpg', 46, '2022-12-14', 'active', 'Run for Good. Saucony exist to empower the human spirit, with every stride, on every run, and in every community.'),
(59, 3, 'Saucony Jazz 4000 (White/Grey)', 80, 100, 'SaucJazzWht_lateral.jpg', 46, '2022-12-14', 'active', 'Run for Good. Saucony exist to empower the human spirit, with every stride, on every run, and in every community.'),
(60, 3, 'Saucony Jazz 4000 (White/Multi)', 80, 100, 'SaucJazzMulti_lateral.jpg', 46, '2022-12-14', 'active', 'Run for Good. Saucony exist to empower the human spirit, with every stride, on every run, and in every community.'),
(61, 3, 'Saucony Jazz Shadow (Black/Yellow)', 80, 100, 'SaucShad_Lateral.png', 46, '2022-12-14', 'active', 'Run for Good. Saucony exist to empower the human spirit, with every stride, on every run, and in every community.'),
(62, 1, 'Fact. Crucifix LS Tee', 40, 100, 'FactCrucifixLSTee_front.jpg', 42, '2022-12-14', 'active', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.'),
(63, 1, 'Fact. Eastside SS Tee - Navy', 35, 99, 'FactEastNav_front.jpg', 42, '2022-12-14', 'active', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.'),
(64, 1, 'Fact. Eastside SS Tee - Yellow', 35, 100, 'FactEastYel_front.jpg', 42, '2022-12-14', 'active', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.'),
(65, 4, 'Fact. Shoulder Bag - Black', 40, 99, 'FactBagBlk_Main.jpg', 42, '2022-12-14', 'active', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.'),
(66, 4, 'Paper Planes Vintage Icon Dad Hat - Mint', 30, 100, 'Front01.jpg', 47, '2022-12-14', 'active', 'The Paper planes’ mindset was to show kids that the world is big, but it’s also small. A kid from Brooklyn can relate to a kid in Nigeria, or a kid in Paris. But when I was growing up, I never thought in a million years I would ever get on a plane. I was taught that from second grade on, everything is survival skills. So as kids, what did we do? We used to make paper planes and mentally fly away. This isn’t about being fashion or trendy... it’s just about giving people a piece of our lifestyle and culture.'),
(67, 1, 'Paper Planes Solid Hoodie - Grey', 50, 100, 'PPSolidHoodie_front.jpg', 47, '2022-12-14', 'active', 'The Paper planes’ mindset was to show kids that the world is big, but it’s also small. A kid from Brooklyn can relate to a kid in Nigeria, or a kid in Paris. But when I was growing up, I never thought in a million years I would ever get on a plane. I was taught that from second grade on, everything is survival skills. So as kids, what did we do? We used to make paper planes and mentally fly away. This isn’t about being fashion or trendy... it’s just about giving people a piece of our lifestyle and culture.'),
(68, 4, 'Paper Planes Wharfmans Beanie', 30, 99, 'PPWharfBeanie_Front.jpg', 47, '2022-12-14', 'active', 'The Paper planes’ mindset was to show kids that the world is big, but it’s also small. A kid from Brooklyn can relate to a kid in Nigeria, or a kid in Paris. But when I was growing up, I never thought in a million years I would ever get on a plane. I was taught that from second grade on, everything is survival skills. So as kids, what did we do? We used to make paper planes and mentally fly away. This isn’t about being fashion or trendy... it’s just about giving people a piece of our lifestyle and culture.'),
(69, 1, 'Paper Planes Angles Oversized Tee', 45, 99, 'PPAngles_front.jpg', 47, '2022-12-14', 'active', 'The Paper planes’ mindset was to show kids that the world is big, but it’s also small. A kid from Brooklyn can relate to a kid in Nigeria, or a kid in Paris. But when I was growing up, I never thought in a million years I would ever get on a plane. I was taught that from second grade on, everything is survival skills. So as kids, what did we do? We used to make paper planes and mentally fly away. This isn’t about being fashion or trendy... it’s just about giving people a piece of our lifestyle and culture.'),
(70, 4, 'Fact. Shoulder Bag - Olive', 40, 99, 'FactBagOlv_Main.jpg', 42, '2022-12-14', 'active', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.'),
(71, 2, 'Paper Planes Solid Jogger', 50, 99, 'PPSolidJog_front.jpg', 47, '2022-12-14', 'active', 'The Paper planes’ mindset was to show kids that the world is big, but it’s also small. A kid from Brooklyn can relate to a kid in Nigeria, or a kid in Paris. But when I was growing up, I never thought in a million years I would ever get on a plane. I was taught that from second grade on, everything is survival skills. So as kids, what did we do? We used to make paper planes and mentally fly away. This isn’t about being fashion or trendy... it’s just about giving people a piece of our lifestyle and culture.'),
(72, 3, 'Karhu Aria 95 Spring Festival Pack', 80, 99, 'KarhuAriaSpring_lateral.png', 44, '2022-12-14', 'active', 'The Aria 95 is a salute to the original Karhu Fusion model from 1996 when it was top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Aria 95.'),
(74, 1, 'Nike Tee', 30, 99, 'NikeFront.jpg', 52, '2022-12-14', 'active', 'Nike Item');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderid` int(11) NOT NULL,
  `orderdate` date DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `paymentmethod` varchar(50) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderid`, `orderdate`, `invoice`, `paymentmethod`, `amount`, `status`) VALUES
(1, '2022-09-27', '1001', 'cash', 0, 'Ordered'),
(2, '2022-10-03', '1002', 'cash', 0, 'Ordered'),
(3, '2022-10-03', '1003', 'cash', 50, 'Ordered'),
(4, '2022-10-03', '1004', 'cash', 545, 'Ordered'),
(5, '2022-12-09', '1005', 'cash', 400, 'Ordered'),
(6, '2022-12-09', '1006', 'cash', 400, 'Ordered'),
(7, '2022-12-09', '1007', 'cash', 400, 'Ordered'),
(8, '2022-12-09', '1008', 'cash', 400, 'Ordered'),
(9, '2022-12-09', '1009', 'cash', 400, 'Ordered'),
(10, '2022-12-09', '1010', 'cash', 10000, 'Ordered'),
(11, '2022-12-09', '1011', 'cash', 10000, 'Ordered'),
(12, '2022-12-09', '1012', 'cash', 10000, 'Ordered'),
(13, '2022-12-09', '1013', 'cash', 10000, 'Ordered'),
(14, '2022-12-09', '1014', 'cash', 50, 'Ordered'),
(15, '2022-12-09', '1015', 'cash', 0, 'Ordered'),
(16, '2022-12-09', '1016', 'cash', 0, 'Ordered'),
(17, '2022-12-09', '1017', 'cash', 90, 'Delivered'),
(18, '2022-12-09', '1018', 'cash', 0, 'Ordered'),
(19, '2022-12-09', '1019', 'cash', 0, 'Ordered'),
(20, '2022-12-09', '1020', 'cash', 0, 'Ordered'),
(21, '2022-12-09', '1021', 'cash', 0, 'Ordered'),
(22, '2022-12-09', '1022', 'cash', 70, 'Recieved'),
(23, '2022-12-11', '1023', 'cash', 10, 'Ordered'),
(24, '2022-12-12', '1024', 'cash', 10, 'Ordered'),
(25, '2022-12-24', '1025', 'cash', 60, 'Ordered'),
(26, '2022-12-24', '1026', 'cash', 60, 'Ordered'),
(27, '2022-12-25', '1027', 'cash', 40, 'Ordered'),
(28, '2022-12-25', '1028', 'cash', 120, 'Ordered'),
(29, '2022-12-25', '1029', 'cash', 185, 'Ordered'),
(30, '2022-12-26', '1030', 'cash', 205, 'Ordered'),
(31, '2022-12-26', '1031', 'cash', 335, 'Recieved'),
(32, '2022-12-27', '1032', 'cash', 60, 'Recieved'),
(33, '2023-02-04', '1033', 'cash', 45, 'Accepted'),
(34, '2023-05-03', '1034', 'cash', 45, 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderitems`
--

CREATE TABLE `tbl_orderitems` (
  `orderitemid` int(11) NOT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `orderitemdate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `ordergeneratedby` int(11) DEFAULT NULL,
  `ordercreateddate` date DEFAULT NULL,
  `item_size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orderitems`
--

INSERT INTO `tbl_orderitems` (`orderitemid`, `invoice`, `itemid`, `price`, `qty`, `amount`, `customerid`, `orderitemdate`, `status`, `ordergeneratedby`, `ordercreateddate`, `item_size`) VALUES
(1, '1001', 2, 50, 2, 100, 2, '2022-09-27', 'Ordered', 1, '2022-09-27', ''),
(2, '1002', 2, 50, 1, 50, 21, '2022-10-03', 'Ordered', 1, '2022-10-03', ''),
(3, '1003', 2, 50, 1, 50, 21, '2022-10-03', 'Ordered', 1, '2022-10-03', ''),
(4, '1004', 5, 99, 5, 495, 20, '2022-10-03', 'Ordered', 1, '2022-10-03', 'xs'),
(5, '1004', 2, 50, 1, 50, 20, '2022-10-03', 'Ordered', 1, '2022-10-03', 's'),
(6, '1009', 1, 50, 1, 50, 22, '2022-12-09', 'Ordered', 1, '2022-12-09', 'XS'),
(7, '1009', 3, 50, 1, 50, 22, '2022-12-09', 'Ordered', 1, '2022-12-09', 'S'),
(8, '1009', 11, 250, 1, 250, 22, '2022-12-09', 'Ordered', 1, '2022-12-09', 'm'),
(9, '1009', 2, 50, 1, 50, 22, '2022-12-09', 'Ordered', 1, '2022-12-09', 'S'),
(10, '1010', 11, 250, 40, 10000, 21, '2022-12-09', 'Ordered', 1, '2022-12-09', 'xs'),
(11, '1011', 11, 250, 40, 10000, 21, '2022-12-09', 'Ordered', 1, '2022-12-09', 'xs'),
(12, '1012', 11, 250, 40, 10000, 21, '2022-12-09', 'Ordered', 1, '2022-12-09', 'xs'),
(13, '1013', 11, 250, 40, 10000, 21, '2022-12-09', 'Ordered', 1, '2022-12-09', 'xs'),
(14, '1014', 2, 10, 5, 50, 1, '2022-12-09', 'Ordered', 1, '2022-12-09', 'L'),
(15, '1017', 6, 10, 9, 90, 1, '2022-12-09', 'Ordered', 1, '2022-12-09', 'XS'),
(16, '1022', 3, 10, 7, 70, 1, '2022-12-09', 'Ordered', 1, '2022-12-09', 'XS'),
(17, '1023', 9, 10, 1, 10, 36, '2022-12-11', 'Ordered', 1, '2022-12-11', '8'),
(18, '1024', 4, 10, 1, 10, 36, '2022-12-12', 'Ordered', 1, '2022-12-12', 'XS'),
(19, '1026', 20, 60, 1, 60, 48, '2022-12-24', 'Ordered', 38, '2022-12-24', 'M'),
(20, '1027', 28, 40, 1, 40, 55, '2022-12-25', 'Ordered', 39, '2022-12-25', 'M'),
(21, '1028', 20, 60, 1, 60, 55, '2022-12-25', 'Ordered', 38, '2022-12-25', 'L'),
(22, '1028', 20, 60, 1, 60, 55, '2022-12-25', 'Ordered', 38, '2022-12-25', 'M'),
(23, '1029', 30, 45, 1, 45, 55, '2022-12-25', 'Ordered', 39, '2022-12-25', 'L'),
(24, '1029', 32, 70, 2, 140, 55, '2022-12-25', 'Ordered', 39, '2022-12-25', 'M'),
(25, '1030', 27, 50, 1, 50, 55, '2022-12-26', 'Ordered', 38, '2022-12-26', 'Large'),
(26, '1030', 72, 80, 1, 80, 55, '2022-12-26', 'Ordered', 44, '2022-12-26', '10.5'),
(27, '1030', 70, 40, 1, 40, 55, '2022-12-26', 'Ordered', 42, '2022-12-26', 'One Size Fits All'),
(28, '1030', 63, 35, 1, 35, 55, '2022-12-26', 'Ordered', 42, '2022-12-26', 'L'),
(29, '1031', 48, 35, 1, 35, 56, '2022-12-26', 'Ordered', 45, '2022-12-26', 'XL'),
(30, '1031', 74, 30, 1, 30, 56, '2022-12-26', 'Ordered', 52, '2022-12-26', 'XL'),
(31, '1031', 30, 45, 1, 45, 56, '2022-12-26', 'Ordered', 39, '2022-12-26', 'XL'),
(32, '1031', 71, 50, 1, 50, 56, '2022-12-26', 'Ordered', 47, '2022-12-26', 'XX-Large'),
(33, '1031', 25, 55, 1, 55, 56, '2022-12-26', 'Ordered', 38, '2022-12-26', 'XX-Large'),
(34, '1031', 58, 90, 1, 90, 56, '2022-12-26', 'Ordered', 46, '2022-12-26', '13'),
(35, '1031', 68, 30, 1, 30, 56, '2022-12-26', 'Ordered', 47, '2022-12-26', 'One Size Fits All'),
(36, '1032', 20, 60, 1, 60, 48, '2022-12-27', 'Ordered', 38, '2022-12-27', 'XL'),
(37, '1033', 69, 45, 1, 45, 48, '2023-02-04', 'Ordered', 47, '2023-02-04', 'L'),
(38, '1034', 30, 45, 1, 45, 48, '2023-05-03', 'Ordered', 39, '2023-05-03', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderstatus`
--

CREATE TABLE `tbl_orderstatus` (
  `Id` int(11) NOT NULL,
  `OrderInvoice` varchar(50) NOT NULL,
  `OrderStatus` varchar(50) NOT NULL,
  `OrderStatusDate` varchar(30) NOT NULL,
  `OrderStatusTime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_orderstatus`
--

INSERT INTO `tbl_orderstatus` (`Id`, `OrderInvoice`, `OrderStatus`, `OrderStatusDate`, `OrderStatusTime`) VALUES
(1, '1022', 'Accepted', '2022-12-11', ' 08:58:25am'),
(2, '1022', 'Delivered', '2022-12-11', ' 09:00:18am'),
(3, '1022', 'Recieved', '2022-12-11', ' 09:01:36am'),
(4, '1017', 'Accepted', '2022-12-11', ' 09:02:04am'),
(5, '1017', 'Delivered', '2022-12-11', ' 03:57:37pm'),
(6, '1031', 'Accepted', '2022-12-26', ' 12:29:15am'),
(7, '1031', 'Delivered', '2022-12-26', ' 12:29:18am'),
(8, '1031', 'Recieved', '2022-12-26', ' 12:29:22am'),
(9, '1032', 'Accepted', '2022-12-27', ' 12:24:48am'),
(10, '1032', 'Delivered', '2022-12-27', ' 12:26:01am'),
(11, '1032', 'Recieved', '2022-12-27', ' 12:26:50am'),
(12, '', 'Delivered', '2023-04-27', ' 10:31:54pm'),
(13, '', 'Delivered', '2023-04-27', ' 10:32:06pm'),
(14, '', 'Delivered', '2023-04-27', ' 10:32:10pm'),
(15, '', 'Delivered', '2023-04-27', ' 10:32:24pm'),
(16, '1033', 'Accepted', '2023-04-27', ' 10:32:37pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `rid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`rid`, `name`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Vendor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `uid` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(16) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createddate` date DEFAULT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`uid`, `role_id`, `name`, `email`, `contact`, `username`, `password`, `picture`, `status`, `logo`, `createdby`, `createddate`, `address`) VALUES
(1, 1, 'Rebnd', 'rebnd@gmail.com', '978-542-9687', 'Rebnd', '123', 'user.jpg', 'active', '1634029791.jpg', 0, '2021-10-09', '51 Market St. Lowell, MA 01852'),
(38, 3, 'Billionaire Boys Club', 'orders@billionaireboysclub.com', '1', 'BillionaireBoysClub', '', 'user.jpg', 'active', 'bbc.jpg', 0, '2022-12-14', '7 Mercer St, New York, NY 10012'),
(39, 3, 'Born X Raised', 'orders@bornxraisedllc.com', '2', 'BornXRaised', '', 'user.jpg', 'active', 'bxr.jpg', 0, '2022-12-14', '2404 Wilshire Blvd Apt 10C Los Angeles, CA 90057'),
(40, 3, 'Champion', 'orders@championproducts.com', '3', 'Champion', '', 'user.jpg', 'active', 'champion.jpg', 0, '2022-12-14', '475 Corporate Square Dr. Winston-Salem, NC 27105'),
(41, 3, 'Clarks', 'orders@clarks.com', '4', 'Clarks', '', 'user.jpg', 'active', 'clarks.jpg', 0, '2022-12-14', '201 Jones Rd. Ste 1 Waltham, MA 02451'),
(42, 3, 'Fact.', 'orders@factbrand.com', '5', 'Fact.', '', 'user.jpg', 'active', 'fact.jpg', 0, '2022-12-14', '124 South La Brea Ave. Los Angeles, CA 90036'),
(43, 3, 'Kappa', 'orders@kappa.com', '6', 'Kappa', '', 'user.jpg', 'active', 'kappa.jpg', 0, '2022-12-14', '22633 Davis Dr. Sterling, VA 20164'),
(44, 3, 'Karhu', 'orders@karhuna.com', '7', 'Karhu', '', 'user.jpg', 'active', 'karhu.jpg', 0, '2022-12-14', '100 Cummings Ctr. Beverly, MA 01915'),
(45, 3, 'Homage', 'orders@homagellc.com', '8', 'Homage', '', 'user.jpg', 'active', 'homage.jpg', 0, '2022-12-14', '4032 Easton Station Rd. Columbus, OH 43219'),
(46, 3, 'Saucony', 'orders@saucony.com', '9', 'Saucony', '', 'user.jpg', 'active', 'saucony.jpg', 0, '2022-12-14', '500 Totten Pond Rd. Waltham, MA 02451'),
(47, 3, 'Paper Planes', 'orders@paperplanesllc.com', '10', 'PaperPlanes', '', 'user.jpg', 'active', 'paperplanes.jpg', 0, '2022-12-14', '540 W 26th St. New York, NY 10001'),
(48, 2, 'k v', 'kv@gmail.com', 'NULL', 'kv@gmail.com', 'test123', NULL, 'active', NULL, 0, '2022-12-14', 'NULL'),
(50, 2, 'C S', 'cs@yahoo.com', 'NULL', 'cs@yahoo.com', 'test123', NULL, 'active', NULL, 0, '2022-12-14', 'NULL'),
(51, 2, 'Bo Hatfield', 'bhatfield@gmail.com', 'NULL', 'bhatfield@gmail.com', 'test123', NULL, 'active', NULL, 0, '2022-12-14', 'NULL'),
(52, 3, 'Nike', 'nike@gmail.com', '12', 'Nike', '', 'user.jpg', 'active', 'nike.jpg', 0, '2022-12-14', '123 test st. Salem, MA 01922'),
(53, 2, 'Jane Doe', 'jd@hotmail.com', 'NULL', 'jd@hotmail.com', 'test123', NULL, 'active', NULL, 0, '2022-12-24', 'NULL'),
(55, 2, 'Tom Brady', 'tb12@gmail.com', 'NULL', 'tb12@gmail.com', 'football', NULL, 'active', NULL, 0, '2022-12-25', 'NULL'),
(56, 2, 'Paul Pierce', 'thetruth@yahoo.com', 'NULL', 'thetruth@yahoo.com', 'celtics', NULL, 'active', NULL, 0, '2022-12-26', 'NULL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblorderdeliveryaddress`
--
ALTER TABLE `tblorderdeliveryaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `tbl_orderitems`
--
ALTER TABLE `tbl_orderitems`
  ADD PRIMARY KEY (`orderitemid`);

--
-- Indexes for table `tbl_orderstatus`
--
ALTER TABLE `tbl_orderstatus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblorderdeliveryaddress`
--
ALTER TABLE `tblorderdeliveryaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_orderitems`
--
ALTER TABLE `tbl_orderitems`
  MODIFY `orderitemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_orderstatus`
--
ALTER TABLE `tbl_orderstatus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
