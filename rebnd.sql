-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 04:02 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rebnd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminEmail` varchar(128) NOT NULL,
  `adminPassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminEmail`, `adminPassword`) VALUES
(1, 'admin@gmail.com', 'admin12345');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `description`, `img`) VALUES
(2, 'Footwear', 'Sneakers, Boots, and Slides', ''),
(3, 'Tops', 'Tees, Sweaters, and Tanks', ''),
(4, 'Bottoms', 'Sweats, Shorts, and Denim', ''),
(5, 'Accessories', 'Hats, Bags, and Socks', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `size` varchar(10) NOT NULL,
  `img` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `description`, `price`, `size`, `img`, `date_created`, `category_id`) VALUES
(11, 'Billionaire Boys Club Arch Logo SS Tee', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.', '60', 'Small', 'Images/Products/BBCArchLogoSSTee/front.jpg', '2021-10-23 20:33:57', 3),
(12, 'Billionaire Boys Club Blur SS Tee – Navy', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.', '55', '', 'Images/Products/BBCBlurSSTee_navy/front.jpg', '2021-11-01 17:24:33', 3),
(13, 'Billionaire Boys Club Blur SS Tee – White', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.', '55', '', 'Images/Products/BBCBlurSSTee_wht/front.jpg', '2021-11-01 17:47:12', 3),
(14, 'Billionaire Boys Club Helmet SS Tee – White', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.', '60', '', 'Images/Products/BBCHelmetSSTee_wht/front.jpg', '2021-11-01 17:47:12', 3),
(15, 'Billionaire Boys Club Helmet SS Tee Knit', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.', '70', '', 'Images/Products/BBCHelmetSSTeeKnit/front.png', '2021-11-01 17:47:12', 3),
(16, 'Billionaire Boys Club Instructor Short – Black', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.', '110', '', 'Images/Products/BBCInstructorShort_blk/front.jpg', '2021-11-01 17:47:12', 4),
(17, 'Billionaire Boys Club Instructor Short – Blue', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.', '110', '', 'Images/Products/BBCInstructorShort_blu/front.jpg', '2021-11-01 17:47:12', 4),
(18, 'Billionaire Boys Club Prosper Short', 'Founded in 2005 by Pharrell Williams and Nigo, Billionaire Boys Club is a globally recognized clothing and accessories brand whose blend of streetwear and luxury has influenced countless pockets of fashion, music, design, and culture. The company’s motto, \"wealth is of the heart and mind, not the pocket,” highlights a focus on embracing originality and self.', '95', '', 'Images/Products/BBCProsperShort/front.jpg', '2021-11-01 17:47:12', 4),
(19, 'Born x Raised Cybernetics Tee', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of gangstar, hip hop and skateboarding cultures.', '60', '', 'Images/Products/BxRCyberneticsTee/front.jpg', '2021-11-01 17:47:12', 3),
(20, 'Born x Raised Liquor Store Hat – Lilac', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of gangstar, hip hop and skateboarding cultures.', '45', '', 'Images/Products/BxRLiquorStoreHat/front.jpg', '2021-11-01 17:47:12', 5),
(21, 'Born x Raised Sunset Tee', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of gangstar, hip hop and skateboarding cultures.', '60', '', 'Images/Products/BxRSunsetTee/front.jpg', '2021-11-01 17:47:12', 3),
(22, 'Born x Raised Tonal Hoodie', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of gangstar, hip hop and skateboarding cultures.', '140', '', 'Images/Products/BxRTonalHoodie/front.jpg', '2021-11-01 17:47:12', 3),
(23, 'Born x Raised You\'ll Miss Us Hoodie', 'Founded in Los Angeles in 2013 by Spanto, Born X Raised was born to give voice to the Venice Beach community in which the designer grew up, presenting both its positive and negative aspects. The brand in fact, through its graphics, takes up themes belonging mostly to the imaginary of gangstar, hip hop and skateboarding cultures.', '140', '', 'Images/Products/BxRYoullMissUsHoodie/front.jpg', '2021-11-01 17:47:12', 3),
(24, 'Champion Reverse Weave Cutoff Short – Black', 'Your sweats rotation isn\'t complete without our these classic, cut-off shorts with all the comfort of heavyweight Reverse Weave fleece. Retro cut-off hem gives them that worn-in, favorite shorts feel. Heritage details like our original men\'s classic fit, signature stretch gusset and elastic waistband with drawcord stand the test of time. Legendary heavyweight fleece is cut on the cross-grain to resist vertical shrinkage, so the fit stays true. The soft brushed interior keeps you comfortable year-round from workout warm-up\'s to weekends. Longer 10-inch length and essential side pockets to hold tech and keys.', '60', '', 'Images/Products/ChampionReverseWeaveCutoffShort_blk/front.jpg', '2021-11-01 17:47:12', 4),
(25, 'Champion Reverse Weave Cutoff Short – Coral', 'Your sweats rotation isn\'t complete without our these classic, cut-off shorts with all the comfort of heavyweight Reverse Weave fleece. Retro cut-off hem gives them that worn-in, favorite shorts feel. Heritage details like our original men\'s classic fit, signature stretch gusset and elastic waistband with drawcord stand the test of time. Legendary heavyweight fleece is cut on the cross-grain to resist vertical shrinkage, so the fit stays true. The soft brushed interior keeps you comfortable year-round from workout warm-up\'s to weekends. Longer 10-inch length and essential side pockets to hold tech and keys.', '60', '', 'Images/Products/ChampionReverseWeaveCutoffShort_coral/front.jpg', '2021-11-01 17:47:12', 4),
(26, 'Champion Reverse Weave Hoodie Green', 'The Reverse Weave Hoodie was a game-changer for athletes over 80 years ago. Today it\'s a true American icon, as authentic on the street as it is in the stands. Champion\'s legendary men\'s heavyweight fleece hoodie resists vertical shrinkage, so the fit stays true. Has our original. classic men\'s fit that\'s made to fit everyone and heritage details like our double-layer hood, hand-warmer kanga pocket, durable double-needle construction and signature stretch side panels that stand the test of time.', '90', '', 'Images/Products/ChampionReverseWeaveHoodie_green/front.jpg', '2021-11-01 17:47:12', 3),
(27, 'Champion Reverse Weave Quarter Zip Hoodie - Black', 'The Reverse Weave Hoodie was a game-changer for athletes over 80 years ago. Today it\'s a true American icon, as authentic on the street as it is in the stands. Champion\'s legendary men\'s heavyweight fleece hoodie resists vertical shrinkage, so the fit stays true. Has our original. classic men\'s fit that\'s made to fit everyone and heritage details like our double-layer hood, hand-warmer kanga pocket, durable double-needle construction and signature stretch side panels that stand the test of time.', '95', '', 'Images/Products/ChampionReverseWeaveQrtrZip_blk/front.jpg', '2021-11-01 17:47:12', 3),
(28, 'Champion Reverse Weave Quarter Zip Hoodie - Wheat', 'The Reverse Weave Hoodie was a game-changer for athletes over 80 years ago. Today it\'s a true American icon, as authentic on the street as it is in the stands. Champion\'s legendary men\'s heavyweight fleece hoodie resists vertical shrinkage, so the fit stays true. Has our original. classic men\'s fit that\'s made to fit everyone and heritage details like our double-layer hood, hand-warmer kanga pocket, durable double-needle construction and signature stretch side panels that stand the test of time.', '95', '', 'Images/Products/ChampionReverseWeaveQrtrZip_wheat/front.jpg', '2021-11-01 17:47:12', 3),
(29, 'Champion Reverse Weave Script Crew – Navy', 'Champion spent over 80 years perfecting their original sweatshirt, and its classic style has the staying power to prove it. Today it reigns as King of Sweatshirts, as authentic on the street as it is in the stands. Heritage details like our original classic men\'s fit, signature stretch side panels and double-needle construction are made to stand the test of time. Legendary heavyweight Reverse Weave fleece is cut on the cross-grain to resist vertical shrinkage, so the fit stays true. The soft brushed interior keeps you comfortable from workout warm-up\'s to weekends', '90', '', 'Images/Products/ChampionReverseWeaveScriptCrew/front.jpg', '2021-11-01 17:47:12', 3),
(30, 'Clarks Desert Boot Suede – Brown', 'Stylish and versatile, the original Desert Boot from Clarks launched in 1950 by Nathan Clark and was inspired by a rough boot from Cairo\'s Old Bazaar. An instant hit, it became the footwear of choice for off-duty army officers. A premium brown suede upper is teamed with an unfussy lace fastening and our signature crepe sole.', '120', '', 'Images/Products/ClarksDessertBoot_brwn/lateral.jpg', '2021-11-01 18:10:29', 2),
(31, 'Clarks Wallabee Suede – Black ', ' The Wallabee has become an iconic classic in our Clarks Originals collection across the globe thanks to its moccasin construction and structural silhouette. Featuring clean and simple lines, this comfortable lace-up style is crafted from Stead\'s suede in maple. The finishing touch is our signature crepe sole which continues to stand the test of time.', '130', '', ' Images/Products/ClarksWallabee_blk/lateral.png ', '2021-11-01 18:16:20', 2),
(32, 'Clarks Wallabee Suede – Olive ', ' The Wallabee has become an iconic classic in our Clarks Originals collection across the globe thanks to its moccasin construction and structural silhouette. Featuring clean and simple lines, this comfortable lace-up style is crafted from Stead\'s suede in maple. The finishing touch is our signature crepe sole which continues to stand the test of time.', '130', '', ' Images/Products/ClarksWallabee_olive/lateral.png', '2021-11-01 18:16:20', 2),
(33, 'Clarks Wallabee Boot - Beeswax ', ' The Wallabee has become an iconic classic in our Clarks Originals collection across the globe thanks to its moccasin construction and structural silhouette. Featuring clean and simple lines, this comfortable lace-up style is crafted from Stead\'s suede in maple. The finishing touch is our signature crepe sole which continues to stand the test of time.', '130', '', ' Images/Products/ClarksWallabeeBoot_beeswax/lateral.png ', '2021-11-01 18:16:20', 2),
(34, 'Clarks Wallabee Boot Suede – Navy ', ' The Wallabee has become an iconic classic in our Clarks Originals collection across the globe thanks to its moccasin construction and structural silhouette. Featuring clean and simple lines, this comfortable lace-up style is crafted from Stead\'s suede in maple. The finishing touch is our signature crepe sole which continues to stand the test of time.', '130', '', ' Images/Products/ClarksWallabeeBoot_navy/lateral.png ', '2021-11-01 18:16:20', 2),
(35, 'Clarks Wallabee Boot Suede – Black ', ' The Wallabee has become an iconic classic in our Clarks Originals collection across the globe thanks to its moccasin construction and structural silhouette. Featuring clean and simple lines, this comfortable lace-up style is crafted from Stead\'s suede in maple. The finishing touch is our signature crepe sole which continues to stand the test of time.', '130', '', ' Images/Products/ClarksWallabeeBoot_blk/lateral.png ', '2021-11-01 18:16:20', 2),
(36, 'Fact. Crucify Long Sleeve Tee ', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.', '55', '', 'Images/Products/FACT.CrucifixLongSleeveTee/front.jpg', '2021-11-01 19:45:56', 3),
(37, 'Fact. Eastside SS Tee – Navy', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.', '40', '', ' Images/Products/FACT.EastsideSSTee_navy/front.jpg ', '2021-11-01 19:45:56', 3),
(38, 'Fact. Eastside SS Tee – Yellow', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.', '40', '', ' Images/Products/FACT.EastsideSSTee_yellow/front.jpg ', '2021-11-01 19:45:56', 3),
(39, 'Fact. Shoulder Bag - Olive', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.', '75', '', 'Images/Products/FACT.ShoulderBag_Black/main.jpg', '2021-11-01 19:45:56', 5),
(40, 'Fact. Shoulder Bag - Black ', 'For the damaged youth of the world, we give you FACT. A collective of misfits and subversives built on the beauty of disfunction and power of expression. We are FACT.', '75', '', 'Images/Products/FACT.ShoulderBag_Olive/main.jpg', '2021-11-01 19:45:56', 5),
(41, 'Homage Biggie Tee', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.', '45', '', 'Images/Products/HomageBiggieTee/front.jpg ', '2021-11-01 19:45:56', 3),
(42, 'Homage Nigo Tee', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.', '45', '', 'Images/Products/HomageNigoTee/front.jpg ', '2021-11-01 19:45:56', 3),
(43, 'Homage ODB Tee', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.', '45', '', 'Images/Products/HomageODBTee/front.jpg ', '2021-11-01 19:45:56', 3),
(44, 'Homage Slick Rick Tee', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.', '45', '', 'Images/Products/HomageSlickTee/front.jpg ', '2021-11-01 19:45:56', 3),
(45, 'Homage Tupac Tee', 'Founded in 2007, HOMAGE turns back the clock with shout-outs to eclectic moments and personalities in sports, music, and popular culture. From Billie Jean King to Larry Bird, our clothing tells stories of triumph, individualism and hustle, preserving the old school and creating new legacies. Pay homage.', '45', '', 'Images/Products/HomageTupacTee/front.jpg ', '2021-11-01 19:45:56', 3),
(46, 'Kappa 222 Banda Calsi Polo – Beige', ' Kappa’s heritage is an inexhaustible source of inspiration for contemporary lifestyle. There are details and styles that go beyond time and identify a taste and a way of being. The Authentic Label take inspiration from this iconic and valuable heritage to reinterpret it in a new way all the time. Total look collections are born from the rereading of the styles that made the history of the brand, able to reach and capture different cultures and references of our time. Kappa Authentic is a classic that constantly reinvented and imposes itself as a trend.', '60', '', ' Images/Products/Kappa222BCPolo_biege/front.jpg ', '2021-11-01 19:45:56', 3),
(47, 'Kappa 222 Banda Calsi Polo – Black', ' Kappa’s heritage is an inexhaustible source of inspiration for contemporary lifestyle. There are details and styles that go beyond time and identify a taste and a way of being. The Authentic Label take inspiration from this iconic and valuable heritage to reinterpret it in a new way all the time. Total look collections are born from the rereading of the styles that made the history of the brand, able to reach and capture different cultures and references of our time. Kappa Authentic is a classic that constantly reinvented and imposes itself as a trend.', '60', '', ' Images/Products/Kappa222BCPolo_blk/front.jpg ', '2021-11-01 19:45:56', 3),
(48, 'Kappa 222 Banda Calsi Polo – Green', ' Kappa’s heritage is an inexhaustible source of inspiration for contemporary lifestyle. There are details and styles that go beyond time and identify a taste and a way of being. The Authentic Label take inspiration from this iconic and valuable heritage to reinterpret it in a new way all the time. Total look collections are born from the rereading of the styles that made the history of the brand, able to reach and capture different cultures and references of our time. Kappa Authentic is a classic that constantly reinvented and imposes itself as a trend.', '60', '', ' Images/Products/Kappa222BCPolo_green/front.jpg ', '2021-11-01 19:45:56', 3),
(49, 'Karhu Aria 95 Catch of the Day Pack', 'The Aria 95 is a salute to the original Karhu ‘Fusion’ model from 1996 when it was top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Aria 95.', '120', '', 'Images/Products/KarhuAria95COTD/lateral.png', '2021-11-01 20:11:27', 2),
(50, 'Karhu Aria 95 Spring Festival Pack', 'The Aria 95 is a salute to the original Karhu ‘Fusion’ model from 1996 when it was top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Aria 95.', '120', '', 'Images/Products/KarhuAria95SpringFest/lateral.png', '2021-11-01 20:11:27', 2),
(51, 'Karhu Fusion 2.0 Misty Rose', 'The Fusion 2.0 is a salute to the original Karhu ‘Fusion’ model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Fusion 2.0', '135', '', ' Images/Products/KarhuFusion2_mistyRose/lateral.png', '2021-11-01 20:11:27', 2),
(52, 'Karhu Fusion 2.0 Monthless Pack', 'The Fusion 2.0 is a salute to the original Karhu ‘Fusion’ model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Fusion 2.0', '135', '', 'Images/Products/KarhuFusion2_monthless/lateral.png', '2021-11-01 20:11:27', 2),
(53, 'Karhu Fusion 2.0 Night Sky', 'The Fusion 2.0 is a salute to the original Karhu ‘Fusion’ model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Fusion 2.0', '135', '', ' Images/Products/KarhuFusion2_nightSky/lateral.png', '2021-11-01 20:11:27', 2),
(54, 'Karhu Fusion 2.0 Tonal Pack', 'The Fusion 2.0 is a salute to the original Karhu ‘Fusion’ model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Fusion 2.0', '135', '', ' Images/Products/KarhuFusion2_tonal/lateral.png', '2021-11-01 20:11:27', 2),
(55, 'Karhu Synchron Classic Catch of the Day Pack', 'The Synchron is a salute to the original Karhu ‘Fusion’ model from 1996 when it was the top running shoe in the collection. To bring back the ‘Fusion’ from the archives, Karhu reworked the model with its original designer and launched it as the Synchron', '115', '', 'Images/Products/KarhuSynchronClassicCOTD/lateral.png', '2021-11-01 20:11:27', 2),
(56, 'Paper Planes Angles Oversized Tee', 'The Paper planes’ mindset was to show kids that the world is big, but it’s also small. A kid from Brooklyn can relate to a kid in Nigeria, or a kid in Paris. But when I was growing up, I never thought in a million years I would ever get on a plane. I was taught that from second grade on, everything is survival skills. So as kids, what did we do? We used to make paper planes and mentally fly away. This isn’t about being fashion or trendy... it’s just about giving people a piece of our lifestyle and culture.', '50', '', 'Images/Products/PaperPlanesAnglesOversizedTee/front.jpg', '2021-11-01 20:31:08', 3),
(57, 'Paper Planes Solid Hoodie', 'The Paper planes’ mindset was to show kids that the world is big, but it’s also small. A kid from Brooklyn can relate to a kid in Nigeria, or a kid in Paris. But when I was growing up, I never thought in a million years I would ever get on a plane. I was taught that from second grade on, everything is survival skills. So as kids, what did we do? We used to make paper planes and mentally fly away. This isn’t about being fashion or trendy... it’s just about giving people a piece of our lifestyle and culture.', '90', '', 'Images/Products/PaperPlanesSolidHoodie/front.jpg', '2021-11-01 20:31:08', 3),
(58, 'Paper Planes Solid Jogger', 'The Paper planes’ mindset was to show kids that the world is big, but it’s also small. A kid from Brooklyn can relate to a kid in Nigeria, or a kid in Paris. But when I was growing up, I never thought in a million years I would ever get on a plane. I was taught that from second grade on, everything is survival skills. So as kids, what did we do? We used to make paper planes and mentally fly away. This isn’t about being fashion or trendy... it’s just about giving people a piece of our lifestyle and culture.', '80', '', 'Images/Products/PaperPlanesSolidJogger/front.jpg', '2021-11-01 20:31:08', 4),
(59, 'Paper Planes Vintage Icon Dad Hat - Mint', 'The Paper planes’ mindset was to show kids that the world is big, but it’s also small. A kid from Brooklyn can relate to a kid in Nigeria, or a kid in Paris. But when I was growing up, I never thought in a million years I would ever get on a plane. I was taught that from second grade on, everything is survival skills. So as kids, what did we do? We used to make paper planes and mentally fly away. This isn’t about being fashion or trendy... it’s just about giving people a piece of our lifestyle and culture.', '45', '', 'Images/Products/PaperPlanesVintageIconDadHat/front.jpg', '2021-11-01 20:31:08', 5),
(60, 'Saucony Grid Azura 2000 - Amazon/Mallard', 'Run for Good. Saucony exist to empower the human spirit, with every stride, on every run, and in every community.', '110', '', 'Images/Products/SaucGridAzura2000_amazMallard/lateral.jpg', '2021-11-01 20:31:08', 2),
(61, 'Saucony Jazz 4000 - White/Grey', 'Run for Good. Saucony exist to empower the human spirit, with every stride, on every run, and in every community.', '100', '', 'Images/Products/SaucJazz4000_whtGrey/lateral.jpg', '2021-11-01 20:31:08', 2),
(62, 'Saucony Jazz 4000 - White/Multi', 'Run for Good. Saucony exist to empower the human spirit, with every stride, on every run, and in every community.', '100', '', 'Images/Products/SaucJazz4000_whtMulti/lateral.jpg', '2021-11-01 20:31:08', 2),
(63, 'Saucony Shadow 5000 Vintage – Tan/Navy', 'Run for Good. Saucony exist to empower the human spirit, with every stride, on every run, and in every community.', '100', '', 'Images/Products/SaucShadow5000Vntg_tanNavy/lateral.png', '2021-11-01 20:31:08', 2),
(64, 'Saucony Shadow Original – Black/Yellow', 'Run for Good. Saucony exist to empower the human spirit, with every stride, on every run, and in every community.', '100', '', 'Images/Products/SauconyShadow_blkYellow/lateral.png', '2021-11-01 20:31:08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersFname` varchar(128) NOT NULL,
  `usersLname` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersFname`, `usersLname`, `usersEmail`, `usersPassword`) VALUES
(9, 'jane', 'doe', 'jane@gmail.com', '$2y$10$kAV0qlHEkKKJE/EiZd6YMe717cVW0DoCCO/Vm2ugmVUfEAKh2GSXS'),
(10, 'kevin', 'var', 'kevin@gmail.com', '$2y$10$xbMBpWVfRAxr6eUmnA5mj.F1rQ/vLkiVKClZ9YFZrOxa71OFyuE9K'),
(12, 'John', 'Doe', 'test@gmail.com', '$2y$10$FiQdk6LzCj7LpdcYJKhikO5VdHEG0YwoYs6OsEXbvpexnzMEPyawS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
