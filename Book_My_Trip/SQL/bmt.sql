-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 07:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Superuser', NULL, '1', '1', '1'),
(2, 'Admin', NULL, '1', '1', '1'),
(3, 'User', NULL, '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `Staffid` varchar(255) DEFAULT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'avatar15.jpg',
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `Staffid`, `AdminName`, `UserName`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Status`, `Photo`, `Password`, `AdminRegdate`) VALUES
(32, '007', 'Admin', 'AD', 'Arpit', 'Dhaduk', 9327658668, 'ad@gamil.com', 1, 'avatar15.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '2023-04-05 04:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(1, 12, 'arpitdhaduk@gmail.com', '2023-04-28', NULL, '2023-04-07 06:55:34', 2, 'u', '2023-04-09 15:53:12'),
(2, 12, 'arpitdhaduk@gmail.com', '2023-04-21', NULL, '2023-04-07 07:02:53', 1, NULL, NULL),
(3, 12, 'arpitdhaduk@gmail.com', '2023-04-22', NULL, '2023-04-09 09:54:01', 1, NULL, NULL),
(4, 13, 'arpitdhaduk@gmail.com', '2023-04-14', NULL, '2023-04-09 15:52:21', 1, NULL, NULL),
(5, 12, 'DK', '2023-04-29', NULL, '2023-04-24 05:07:52', 1, NULL, NULL),
(6, 13, 'admin', '2023-04-28', NULL, '2023-04-24 05:10:51', 2, 'u', '2023-04-24 05:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `companyname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `companyemail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `companyphone` int(10) NOT NULL,
  `companyaddress` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `companylogo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'avatar15.jpg',
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `developer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `regno`, `companyname`, `companyemail`, `country`, `companyphone`, `companyaddress`, `companylogo`, `status`, `developer`, `creationdate`) VALUES
(4, '1002', 'St. Paul Church', 'stpaul@gmail.com', 'Uganda', 770546590, 'Kyebando', 'church.jpg', '1', 'gerald', '2021-02-02 12:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`id`, `FullName`, `EmailId`, `MobileNumber`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(1, 'Arpit', 'bhuvajemis@gmail.com', '7698153281', 'afsd', 'asdjk', '2023-04-24 05:11:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `iid` int(11) NOT NULL,
  `BillAmount` int(11) NOT NULL,
  `Quntity` int(11) NOT NULL,
  `FromDate` varchar(100) NOT NULL,
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(100) NOT NULL,
  `PackagePrice` int(11) NOT NULL,
  `BookingId` int(11) NOT NULL,
  `BookDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CardName` varchar(100) NOT NULL,
  `CCNumber` int(11) NOT NULL,
  `EMonth` varchar(100) NOT NULL,
  `EYear` int(11) NOT NULL,
  `CVV` int(11) NOT NULL,
  `Mode` varchar(100) NOT NULL,
  `Tprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`iid`, `BillAmount`, `Quntity`, `FromDate`, `PackageId`, `PackageName`, `PackagePrice`, `BookingId`, `BookDate`, `FullName`, `Email`, `CardName`, `CCNumber`, `EMonth`, `EYear`, `CVV`, `Mode`, `Tprice`) VALUES
(1, 38565, 3, '2023-04-21', 12, 'Goa Honeymoon', 12000, 2, '2023-04-07 07:02:53', 'Arpit', 'arpitdhaduk134@gmail.com', 'Master', 2147483647, 'Sep', 2023, 123, 'Train', 855),
(2, 68000, 4, '2023-04-22', 12, 'Goa Honeymoon', 12000, 3, '2023-04-09 09:54:01', '', '', '', 0, '', 0, 0, 'Flight', 5000),
(3, 13809, 1, '2023-04-14', 13, 'Rishikesh Mussoorie', 11549, 4, '2023-04-09 15:52:21', 'aaa', 'arpitdhaduk@gmail.com', 'Master', 2147483647, 'May', 2027, 123, 'Train', 2260),
(4, 51000, 3, '2023-04-29', 12, 'Goa Honeymoon', 12000, 5, '2023-04-24 05:07:52', '', '', '', 0, '', 0, 0, 'Flight', 5000),
(5, 69045, 5, '2023-04-28', 13, 'Rishikesh Mussoorie', 11549, 6, '2023-04-24 05:10:51', 'Dave', 'arpitdhaduk@gmail.com', 'Master', 2147483647, 'Nov', 2023, 123, 'Train', 2260);

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `HotelName` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `Bus` int(11) DEFAULT NULL,
  `Flight` int(11) DEFAULT NULL,
  `Train` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `HotelName`, `PackageLocation`, `PackagePrice`, `Bus`, `Flight`, `Train`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(12, 'Goa Honeymoon', 'Hotel Sai Residency Goa', 'Goa', 12000, 1950, 5000, 855, '3 time Meals are included', 'The best part about booking a trip with us is that our 4 nights 5 days Goa couple packages can be easily customized as per your pocket and preferences, imparting you a vacation together, just as you want. Your trip of togetherness is laced by other attractions such as a romantic cruise, candlelight dinner, beach hopping, and an exciting nightlife. If you and your beloved are interested to have a glimpse of the past, head to Fort Aguada to absorb the Portuguese charm.\r\n\r\nAs A Part Of This Goa Trip, You Will Be Exploring Goa In Two Parts:\r\n1. North Goa\r\nWhat\'s Special: Dolphin spotting; Coco Beach, Calangute Beach, Baga Beach, Anjuna Beach; Calangute Annexe; Chapora Fort; Fort Aguada; Candolim Beach\r\n\r\nFamous Dishes: Torta di ricotta; Tuna teriyaki; Udon noodles; Miso soup; Rawa fried chonak; Malabar parottas; Egg appams; Choux pastry; Ginger-battered calamari; Sesame yellowfin tuna; Malabar prawn curry\r\n\r\nDistance From Panaji: 22.3 km\r\n\r\nNorth Goa is for those tourists who love to party and like to indulge in water sports. The main motive of them to visit Goa is to indulge in the exciting and thrilling life of Goa. The beaches in North Goa are happening and full of life and tourist activity. The best beaches here are Baga beach, Calangute beach, Coco beach, Anjuna beach, etc.\r\n\r\n2. South Goa\r\nWhat\'s Special: Shri Manguesh Temple; Palolem Beach; Shri Shantadurga Temple; Basilica of Bom Jesus; Se Cathedral; Dona Paula Bay; Miramar Beach\r\n\r\nFamous Dishes: Chicken Luzmarie; Stuffed crabs; Chonak rechado; Rose-flavoured chai; Pumpkin pie; Prawn curry; Butter garlic crab; Vindaloo; Prawn balchao; Mackerel recheado\r\n\r\nDistance From Panaji: 67.4 km\r\n\r\nOn the contrary, South Goa is more for people who are nature lovers and who want a secluded environment on the beaches. Also, there are many churches, cathedrals, and temples in this part of Goa. Some of the best beaches you will be taken to in South Goa are Dona Paula Bay and Miramar Beach. Also, visit the Basilica of Bom Jesus and St Cathedral.\r\n\r\n3. Shopping In Goa\r\nNot just the adrenaline rush of adventures, Goa is an equally amazing destination for shopping. Especially for hippies and people who love bohemian stuff, Goa would turn out to be the heaven for you. Some of the best markets to shop from here are: Calangute Market Square\r\n\r\nWhat\'s Special: Carpets; Clay items; Beachwears; Glass and chunk jewelry; Local handicrafts\r\n\r\nEntry Fee: No entry fee\r\n\r\nTimings: 09:00 AM to 08:00 PM everyday\r\n\r\nDistance From Panaji: 15.4 km\r\n\r\nOne of the most famous markets in North Goa is the Calangute Market Square. The market has many shacks and stalls selling handicrafts, beachwear, metal items, jewelry, souvenirs and other things. The rates are affordable and quality is dope.\r\n\r\n4. Anjuna Flea Market\r\nWhat\'s Special: Glass jewelry; Handmade bags; Sari made dresses; Fannypack; Flip flops; Beachwears; Live performances\r\n\r\nEntry Fee: No entry fee\r\n\r\nTimings: 09.00 AM to 06.00 PM (only on Wednesdays)\r\n\r\nDistance From Panaji: 22.3 km\r\n\r\nLocated near Anjuna Beach, Anjuna flea market is a Wednesday street market which is considered to be the most buzzed up market in Goa. There are so many stalls here lined up selling things like jewelry, seashells, jute bags, footwear etc. 5 days Goa honeymoon vacation packages take you on a trip to Anjuna Beach. Therefore, you can get to explore the shoreline along with going on a shopping spree.\r\n\r\nMackie’s Night Bazaar: As a part of 5 days Goa honeymoon vacation packages, you can explore Mackie’s Night Bazaar which is a great place to relish Goan cuisine and also for shopping for products like like handicrafts, home decor etc.\r\n\r\n5. Velsao Beach\r\nWhat’s special: water sports, views\r\n\r\nTimings: Open 24 hours\r\n\r\nDistance from City Panaji: 25.3 km\r\n\r\nVelsao Beach is an isolated yet amazingly stunning beach between Bogmalo and Majorda in South Goa. With sparkling silver sands, verdant coconut plantations, azure sea, and the clean and pristine coast—this beach never fails to attract honeymoon couples. While customizing our Goa honeymoon packages for couples with flight add this beach to the must-visit places in Goa and relax by the views.\r\n\r\n6. Sinquerim Fort\r\nWhat’s special: water skiing, fishing, sunsets\r\n\r\nTimings: 6 am to 10 pm\r\n\r\nDistance from City Panaji: 13.8 km\r\n\r\nSinquerim Fort is a wondrous place displaying architectural brilliance. The fort bisects Sinquerim beach and extrudes into the sea. Especially for couples who don’t prefer popular tourist hangout spots can visit this fort. Here you can enjoy gorgeous sunsets, swimming, surfing, fishing with your partner. While customizing your 4 nights 5 days Goa honeymoon tour package don’t forget to add this scenic fort to your places to visit in Goa.\r\n\r\n7. Mormugua Fort\r\nWhat’s special: stunning views, history, serenity\r\n\r\nEntry Fee: INR 10 per person\r\n\r\nTimings: 9 am - 5 pm\r\n\r\nDistance from City Panaji: 33 km\r\n\r\nWhen it comes to touring Goa, keep this fort in mind as The Mormugua Fort holds a rich historical significance. Situated near the Zuari River, this is one of famous romantic places in Goa and should be added to your Goa honeymoon packages for 5 days. This is the right place for couples obsessed with history, archaic fact, and serenity. Spend some time exploring this magnificent fort with your better half.\r\n\r\nIs This Trip Right For Me?\r\nThis trip is right for you if you are looking for the following perks in a vacation:\r\n\r\nThis vacation offers you soothing stays, smooth transfers, delicious meals, and sightseeing that too with very less 5 days go honeymoon trip cost.\r\nWe, at TravelTriangle, promise to offer you a diligently crafted 5 days Goa couple trip plan that has got you covered in every aspect, whether you are an adventurer, a night crawler, a nature lover, or whatnot!\r\nSo, you and your partner can have an experience that cannot be forgotten easily.\r\nOur customizable Goa honeymoon packages for 5 days are highly affordable and encapsulate almost everything one can avail from Goa packages for couples with flight. These are diligently crafted to offer endless fun, comfort, and tranquility to couples. Book from our huge list of honeymoon packages and get set for a romantic vacay with your better half. So, treat your partner with this affordable 4 nights and 5 days Goa Honeymoon tour package and explore this breathtaking beauty in an affordable manner. Take a look at the below Goa honeymoon itinerary, and let us take you on a romantic ride.', 'A-Goa-beach-Holiday.webp', '2023-04-07 06:28:20', '2023-04-07 06:36:19'),
(13, 'Rishikesh Mussoorie', 'Hotel Hill Queen', 'Rishikesh ', 11549, 3500, 6801, 2260, 'Breakfast at Hotel', 'Glance at picturesque spots and try adrenaline-pumping activity with this 3 days 2 nights Uttarakhand tour package to Rishikesh and Mussoorie. This Uttarakhand itinerary is meant for adventure-seekers, peace-lovers, nature-enthusiasts, couples and almost everyone!\r\n\r\nRaft through Ganga’s currents, try out rappelling, body surfing and other thrilling activities. Spend an evening attending the peaceful Ganga aarti. Enjoy a peaceful experience that will leave you asking for more.\r\n\r\nTreat your tastebuds to sumptuous meals. This Uttarakhand tour package from Delhi aims to provide thrill and peace at the same time. Rishikesh and Mussoorie are among the top tourist destinations of Uttarakhand and that enhances your experience. Take a vacation today.', 'Rishikesh_scene.webp', '2023-04-07 06:45:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(1, 'Arpit', '9327658668', 'arpitdhaduk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-04-07 06:54:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
