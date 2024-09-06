-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 02:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_cars`
--

CREATE TABLE `booking_cars` (
  `Book_c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Car_id` int(11) NOT NULL,
  `Booking_date` date NOT NULL,
  `pick_up_date` date NOT NULL,
  `drop_off_date` date NOT NULL,
  `with_driver` varchar(3) NOT NULL DEFAULT 'no',
  `total_amount` varchar(30) NOT NULL,
  `payed` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_driver`
--

CREATE TABLE `booking_driver` (
  `booking_id` int(11) NOT NULL,
  `booking_car_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_guides`
--

CREATE TABLE `booking_guides` (
  `booking_id` int(11) NOT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `reservation_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_guides`
--

INSERT INTO `booking_guides` (`booking_id`, `guide_id`, `user_id`, `booking_date`, `reservation_time`) VALUES
(33, 16, 88, '2023-08-19', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `booking_trips`
--

CREATE TABLE `booking_trips` (
  `book_t_id` int(11) NOT NULL,
  `Trip_id` int(11) NOT NULL,
  `User` int(30) NOT NULL,
  `Booking_date` date NOT NULL,
  `Nb_of_persons` int(2) NOT NULL,
  `Total_amount` varchar(30) NOT NULL,
  `payed` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_trips`
--

INSERT INTO `booking_trips` (`book_t_id`, `Trip_id`, `User`, `Booking_date`, `Nb_of_persons`, `Total_amount`, `payed`) VALUES
(53, 9, 88, '0000-00-00', 2, '80', 'no'),
(54, 1, 88, '2023-08-22', 1, '30', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `Car_id` int(11) NOT NULL,
  `Car_name` varchar(30) NOT NULL,
  `Year_of_manufacture` int(4) NOT NULL,
  `Car_color` varchar(30) NOT NULL,
  `nb_of_seats` int(11) NOT NULL,
  `photos` varchar(300) NOT NULL,
  `price_per_day` varchar(100) NOT NULL,
  `available` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`Car_id`, `Car_name`, `Year_of_manufacture`, `Car_color`, `nb_of_seats`, `photos`, `price_per_day`, `available`) VALUES
(22, 'Toyota Yaris', 1999, 'black', 5, 'toyota yaris.jpeg', '50$', 'yes'),
(23, 'Citroen C3', 2000, 'white', 5, 'citroen c3.jpg', '40$', 'yes'),
(24, 'Renault Logan', 2019, 'blue', 5, 'Renault Logan.jpg\r\n', '35$', 'yes'),
(25, 'Peugeot 206', 2016, 'white', 5, 'Peugeot 206.jpeg', '40$', 'yes'),
(26, 'Chevrolet Sonic', 2018, 'red', 4, 'Chevrolet Sonic.jpg', '35$', 'yes'),
(27, 'Chevrolet Cobalt', 2020, 'white', 5, 'Chevrolet Cobalt.jpeg', '40$', 'yes'),
(28, 'Hyundai Accent', 2012, 'blue', 5, 'Hyundai Accent.jpeg', '40$', 'yes'),
(29, 'Chevrolet Aveo', 2009, 'yellow', 5, 'chevrolet aveo.webp', '45$', 'yes'),
(30, 'Mitsubishi Lancer', 2017, 'black', 5, 'Mitsubishi Lancer.jpeg', '40$', 'yes'),
(31, 'Nissan Kicks', 2021, 'orange', 5, 'nissan kicks.jpg', '35$', 'yes'),
(32, 'Kia Optima', 2021, 'white', 5, 'Kia Optima.jpg', '60$', 'yes'),
(33, 'Ford Fusion', 2018, 'white', 5, 'Ford Fusion.jpg', '50$', 'yes'),
(34, 'Hyundai Sonata', 2019, 'gray', 5, 'Hyundai Sonata.jpg', '45$', 'yes'),
(35, 'Nissan X-Trail', 2019, 'brown', 5, 'Nissan X-Trail.jpeg', '100$', 'yes'),
(36, 'Mitsubishi Pajero', 2021, 'red', 7, 'Mitsubishi Pajero.jpg', '115$', 'yes'),
(37, 'Hyundai H1', 2019, 'white', 7, 'Hyundai H1.jpg', '140$', 'yes'),
(38, 'Chevrolet Tahoe', 2020, 'black', 7, 'Chevrolet Tahoe.jpeg', '160$', 'yes'),
(39, 'Ford Expedition', 2023, 'blue', 7, 'Ford Expedition.png', '160$', 'yes'),
(40, 'Bmw 5 Series', 0, 'dark blue', 4, 'Bmw 5 Series.jpg', '170$', 'yes'),
(41, 'Mercedes E-Class', 2023, 'black', 5, 'Mercedes E-Class.webp', '170$', 'yes'),
(42, 'Mercedes V-Class', 2019, 'white', 7, 'Mercedes V-Class .avif', '400$', 'yes'),
(43, 'Mercedes S-Class', 2018, 'black', 5, 'Mercedes S-Class.jpg', '350$', 'yes'),
(44, 'Toyota Corolla', 2022, 'blue', 5, 'Toyota Corolla.jpg', '60$', 'yes'),
(45, 'Toyota Croun', 2023, 'Bronze Age', 5, 'toyota crown.webp', '80$', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `emp_user_acc` int(30) NOT NULL,
  `emp_addres` varchar(40) NOT NULL,
  `emp_type` varchar(30) NOT NULL,
  `available` varchar(3) NOT NULL DEFAULT 'yes',
  `work_start_time` time NOT NULL,
  `work_end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_user_acc`, `emp_addres`, `emp_type`, `available`, `work_start_time`, `work_end_time`) VALUES
(16, 92, 'beirut', 'guide', 'yes', '07:00:00', '19:00:00'),
(18, 85, 'tripoli', 'driver', 'yes', '08:00:00', '16:00:00'),
(19, 89, 'tripoli', 'guide', 'yes', '08:00:00', '18:00:00'),
(20, 91, 'tripoli/mina', 'guide', 'yes', '09:00:00', '17:00:00'),
(21, 93, 'beirut', 'driver', 'yes', '10:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `popular_destinations`
--

CREATE TABLE `popular_destinations` (
  `destination_id` int(11) NOT NULL,
  `destination_name` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `popular_destinations`
--

INSERT INTO `popular_destinations` (`destination_id`, `destination_name`, `photo`) VALUES
(1, 'destination 1', '1.jpg'),
(2, 'destination 2', '2.jpg'),
(3, 'destination3', '6.jpg'),
(4, 'destination4', '4.jpg'),
(5, 'destination5', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `Trip_id` int(11) NOT NULL,
  `trip_name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `destination` varchar(300) NOT NULL,
  `startDate` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `trip_limit` int(11) NOT NULL,
  `available_places` int(11) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `trip_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`Trip_id`, `trip_name`, `price`, `destination`, `startDate`, `start_time`, `end_date`, `end_time`, `trip_limit`, `available_places`, `photo`, `trip_description`) VALUES
(1, 'to the Cable Car ', '30$', 'jounieh', '2023-09-27', '09:00:00', '2023-09-27', '09:00:00', 50, 49, '8.jpg', '\r\n*Destination: Jounieh*\r\n\r\nLet\'s enjoy an exciting journey to the charming city of Jounieh in Lebanon. Jounieh is a fantastic tourist destination that combines natural beauty with rich history.\r\n\r\n*Breakfast:*\r\n\r\nWe start our morning by enjoying a delicious breakfast at the \"Morning Light\" café. We\'ll relish a diverse selection of Lebanese and international dishes while enjoying a breathtaking view of the Mediterranean Sea.\r\n\r\n*Cable Car Experience:*\r\nWe\'ll enjoy a unique experience using the cable car that connects Jounieh to the mountaintop. We\'ll relish stunning views of the city and coastline during our journey to the summit. This will be an exciting and enjoyable experience for everyone.\r\n\r\n*Strolling and Lunch:*\r\nAfter descending from the cable car, we\'ll stroll through the beautiful streets of Jounieh and enjoy visiting local markets and traditional shops. We\'ll indulge in a delicious lunch at the \"Jounieh Flavors\" restaurant, where both Eastern and Western cuisines will be served.\r\n\r\n*Shopping and Farewell:*\r\nAfter lunch, we\'ll have time for shopping and exploring local gift shops and handicrafts. At the end of the journey, we\'ll return with beautiful memories and an unforgettable experience from Jounieh.'),
(9, 'to the City of the Sun.', '40$', 'Baalbak', '2023-07-08', '09:00:00', '2023-07-08', '21:00:00', 50, 48, 'image3.jpg', '\"Our trip to Baalbek will be an exceptional experience from start to finish. We will begin with a comfortable bus journey from the city to Baalbek, where the road will be adorned with breathtaking views of mountains and valleys.\r\n\r\nUpon our arrival in Baalbek, there will be with us our guidesand will provide us with a historical and cultural tour of the area. We will visit the renowned Baalbek temples and immerse ourselves in the stories of their ancient past.\r\n\r\nAfter the temple tour, we will head to the restaurant \'Delicious Bites\' that offers traditional Lebanese cuisine. We will enjoy a delicious lunch featuring a variety of famous local dishes.\r\n\r\nFollowing our enjoyable lunch, we will embark on a short exploratory trip to the surrounding areas. We will visit the city\'s markets and wander through narrow alleys, giving us the opportunity to discover the region\'s culture and shop at traditional stores.\r\n\r\nAt the end of the day, we will return to the city with happiness, carrying beautiful memories and newfound knowledge about Baalbek and its rich history.\"'),
(10, 'Jeita Grotto', '30$', 'Jeita Grotto', '2023-07-15', '09:00:00', '2023-07-15', '21:00:00', 40, 40, 'image2.jpg', '**Before Entering the GROTTO:**\r\nWe start our journey in the bright morning, gathering at our departure point. Light refreshments and beverages will be provided to prepare us for the exciting adventure. Surrounded by the beauty of nature and fresh air, we head towards Jeita Grotto.\r\n**Inside the Cave:**\r\nUpon our arrival, we will be greeted by bright lights and sun rays piercing through rock openings. We will board our carefully equipped boats, commencing the exploration journey through the water passages of the cave. We\'ll pass by stunning views of rock formations and colorful ceilings. Local guides will provide fascinating insights into the cave\'s history and formations.\r\n**Upon Exiting:**\r\nWhen we conclude our journey inside the cave, we\'ll return to the surface, feeling the gentle breeze. We\'ll gather in a designated area for relaxation and enjoyment of a delicious lunch, featuring fantastic local dishes. We\'ll relish the breathtaking natural scenery and the beautiful details we discovered throughout the journey.'),
(14, 'Palm Island', '20$', 'Palm Island', '2023-08-22', '09:00:00', '2023-08-22', '07:00:00', 50, 50, 'palm.jpeg', 'Our trip to Palm Island will begin with a boat journey from the port on a private boat until we reach the island. There will be a changing tent and tents for protection from the sun\'s heat. Several activities will be available such as jet skiing, swimming, and the trip includes breakfast, lunch.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `User_First_Name` varchar(30) NOT NULL,
  `User_Last_Name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Phone_nb` varchar(30) DEFAULT NULL,
  `pass_word` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `ban` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `username`, `role`, `User_First_Name`, `User_Last_Name`, `email`, `Phone_nb`, `pass_word`, `photo`, `ban`) VALUES
(69, 'janoadmin', 1, 'jano', 'assaad', 'jouna222005@gmail.com', '71978700', 'Aa@222005@', 'img1.jpg', 'no'),
(85, 'manuel', 4, 'ahmad', 'issa', 'issaahmad321@gmail.com', '71665800', 'Ahmad123', 'img1.jpg', 'no'),
(86, 'omar2008', 2, 'Omar', 'Issa', 'omarissa123@gmail.com', '71978799', '123456Aa', 'usertest.jpeg', 'no'),
(88, 'jano2005', 2, 'jano', 'assaad', 'jouna222005@gmail.com', '71978700', 'Jano2005', 'default client pic.avif', 'no'),
(89, 'samir111', 5, 'samir', 'mounir', 'samir123@gmail.com', '71237479', 'Samir123', 'default client pic.avif', 'no'),
(91, 'awny111', 5, 'awny', 'zhivaky', 'awnyzhivaky123@gmaul.com', '71937388', 'Awny1234', 'default client pic.avif', 'no'),
(92, 'newguid', 5, 'new', 'guide', 'newguide123@gmail.com', '71976788', 'NewGuide123', 'default client pic.avif', 'no'),
(93, 'newemp', 4, 'new', 'emp', 'newemp@gmail.com', '72937366', 'jjfewj872638', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'client'),
(4, 'driver'),
(5, 'guid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_cars`
--
ALTER TABLE `booking_cars`
  ADD PRIMARY KEY (`Book_c_id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `car_id_fk` (`Car_id`);

--
-- Indexes for table `booking_driver`
--
ALTER TABLE `booking_driver`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `bookcar_fk` (`booking_car_id`),
  ADD KEY `driverfk` (`driver_id`);

--
-- Indexes for table `booking_guides`
--
ALTER TABLE `booking_guides`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `guidefk` (`guide_id`),
  ADD KEY `userfk` (`user_id`);

--
-- Indexes for table `booking_trips`
--
ALTER TABLE `booking_trips`
  ADD PRIMARY KEY (`book_t_id`),
  ADD KEY `USER` (`User`) USING BTREE,
  ADD KEY `TRIP` (`Trip_id`) USING BTREE;

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`Car_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_user_acc` (`emp_user_acc`);

--
-- Indexes for table `popular_destinations`
--
ALTER TABLE `popular_destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`Trip_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD KEY `user_role_fk` (`role`) USING BTREE;

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_cars`
--
ALTER TABLE `booking_cars`
  MODIFY `Book_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `booking_driver`
--
ALTER TABLE `booking_driver`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `booking_guides`
--
ALTER TABLE `booking_guides`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `booking_trips`
--
ALTER TABLE `booking_trips`
  MODIFY `book_t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `Car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `popular_destinations`
--
ALTER TABLE `popular_destinations`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `Trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_cars`
--
ALTER TABLE `booking_cars`
  ADD CONSTRAINT `booking_cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_id`),
  ADD CONSTRAINT `booking_cars_ibfk_2` FOREIGN KEY (`Car_id`) REFERENCES `cars` (`Car_id`);

--
-- Constraints for table `booking_driver`
--
ALTER TABLE `booking_driver`
  ADD CONSTRAINT `bookcar_fk` FOREIGN KEY (`booking_car_id`) REFERENCES `booking_cars` (`Book_c_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `driverfk` FOREIGN KEY (`driver_id`) REFERENCES `employees` (`emp_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `booking_guides`
--
ALTER TABLE `booking_guides`
  ADD CONSTRAINT `guidefk` FOREIGN KEY (`guide_id`) REFERENCES `employees` (`emp_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `userfk` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `booking_trips`
--
ALTER TABLE `booking_trips`
  ADD CONSTRAINT `test1` FOREIGN KEY (`User`) REFERENCES `user` (`User_id`),
  ADD CONSTRAINT `trip` FOREIGN KEY (`Trip_id`) REFERENCES `trips` (`Trip_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`emp_user_acc`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_fk` FOREIGN KEY (`role`) REFERENCES `user_roles` (`User_role_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
