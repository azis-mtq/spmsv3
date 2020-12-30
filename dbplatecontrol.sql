-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 03:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbplatecontrol`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locators`
--

CREATE TABLE `tbl_locators` (
  `id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_locators`
--

INSERT INTO `tbl_locators` (`id`, `code`, `description`) VALUES
(1, 'FINISH.GOOD', 'LOCATOR FOR GOOD PLATE'),
(2, 'CAN.NG', 'LOCATOR FOR NG PLATE'),
(3, 'SKID.REFORM', 'LOCATOR FOR REFORM PLATE'),
(4, 'LOAD.STAGE', 'LOCATOR FOR LOADING PLATE'),
(5, 'UNLOAD.STAGE', 'LOCATOR FOR UNLOAD STAGE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phase_types`
--

CREATE TABLE `tbl_phase_types` (
  `id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phase_types`
--

INSERT INTO `tbl_phase_types` (`id`, `code`, `description`) VALUES
(1, 'LOADING', 'LOADING PLATE PROCESS'),
(2, 'UNLOADING', 'UNLOADING PLATE PROCESS'),
(3, 'DRYING', 'DRYING PLATE PROCESS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plate`
--

CREATE TABLE `tbl_plate` (
  `id` int(11) NOT NULL,
  `plate_type_id` int(11) NOT NULL,
  `circuit` varchar(2) NOT NULL,
  `lot_pasting` varchar(128) NOT NULL,
  `lot_formation` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_plate`
--

INSERT INTO `tbl_plate` (`id`, `plate_type_id`, `circuit`, `lot_pasting`, `lot_formation`, `date_created`, `created_by`, `date_modified`, `modified_by`) VALUES
(1, 17, '3', 'hknkj', '', 1608999739, 1, 0, 0),
(2, 21, '3', '12272020/1/3/TZ6P+C5/001', '', 1609079623, 1, 0, 0),
(3, 9, '6', '12272020/1/6/DIBLL-/002', '', 1609081091, 1, 0, 0),
(4, 5, '2', '12272020/2/2/DIAS+/003', '', 1609081146, 1, 0, 0),
(5, 24, '9', '12272020/2/9/FZ5N-SLURY/004', '', 1609081315, 1, 0, 0),
(6, 11, '13', '12272020/2/13/MZ2-/004', '', 1609081371, 1, 0, 0),
(7, 3, '6', '12272020/1/6/BIAS+/005', '', 1609081845, 1, 0, 0),
(8, 20, '7', '12272020/2/7/TZ6N-/006', '', 1609082228, 1, 0, 0),
(9, 17, '4', '12272020/2/4/FB5P+/007', '', 1609082840, 1, 0, 0),
(10, 8, '14', '12272020/2/14/DIA2+/007', '', 1609083509, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plate_status`
--

CREATE TABLE `tbl_plate_status` (
  `id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_plate_status`
--

INSERT INTO `tbl_plate_status` (`id`, `code`, `description`) VALUES
(1, 'GOOD', 'PLATE IS IN GOOD CONDITION'),
(2, 'REFORM', 'PLATE IS IN REFORM CONDITION'),
(3, 'NO GOOD', 'PLATE IS IN NO GOOD CONDITION'),
(4, 'ENTERED', 'data plate that was just entered into the system');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plate_types`
--

CREATE TABLE `tbl_plate_types` (
  `id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_plate_types`
--

INSERT INTO `tbl_plate_types` (`id`, `code`, `description`) VALUES
(3, 'BIAS (+)', ''),
(4, 'BIBL (-)', ''),
(5, 'DIAS (+)', ''),
(6, 'DIBL (-)', ''),
(7, 'DIAU (+)', ''),
(8, 'DIA 2 (+)', ''),
(9, 'DIBLL (-)', ''),
(10, 'MZ55 (+)', ''),
(11, 'MZ2 (-)', ''),
(12, 'TZ4P (+) ', ''),
(13, 'TZ4P(5) (+)', ''),
(14, 'TZ4N(5) (-) NON SLURY', ''),
(15, 'TZ4N (-) SLURY ', ''),
(16, 'TZ4N (-) NON SLURY', ''),
(17, 'FB5P (+)', ''),
(18, 'FB5N (-)', ''),
(19, 'TZ6P (+)', ''),
(20, 'TZ6N (-)', ''),
(21, 'TZ6P (+) C-5', ''),
(22, 'TZ6N (-) C-5', ''),
(23, 'FZ5P (+)', ''),
(24, 'FZ5N (-) SLURY', ''),
(25, 'FZ5N (-) NON SLURY', ''),
(26, 'FZ5P (+) C-5', ''),
(27, 'FZ5N (-) C-5', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shift`
--

CREATE TABLE `tbl_shift` (
  `id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shift`
--

INSERT INTO `tbl_shift` (`id`, `code`, `description`) VALUES
(1, 'SHIFT_1', 'SHIFT PAGI'),
(2, 'SHIFT_2', 'SHIFT SORE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `plate_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `qty_onhand` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `locator_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `plate_id`, `trans_id`, `qty_onhand`, `status_id`, `locator_id`, `created_by`, `date_created`, `modified_by`, `date_modified`) VALUES
(1, 2, 64, 1000, 0, 0, 0, 0, 0, 0),
(2, 3, 65, 500, 0, 0, 0, 0, 0, 0),
(3, 6, 68, 990, 0, 0, 0, 0, 0, 0),
(4, 7, 69, 3100, 1, 4, 1, 1609081845, 0, 0),
(5, 8, 70, 400, 1, 4, 1, 1609082228, 0, 0),
(6, 8, 70, 490, 2, 3, 1, 1609082228, 0, 0),
(7, 9, 71, 3595, 1, 4, 1, 1609082840, 0, 0),
(8, 9, 71, 3590, 2, 3, 1, 1609082840, 0, 0),
(9, 9, 71, 15, 3, 2, 1, 1609082840, 0, 0),
(10, 10, 72, 3540, 1, 4, 1, 1609083510, 0, 0),
(11, 10, 72, 3585, 2, 3, 1, 1609083510, 0, 0),
(12, 10, 72, 75, 3, 2, 1, 1609083510, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `plate_id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `qty_ori_ok` int(11) NOT NULL,
  `qty_ori_reform` int(11) NOT NULL,
  `qty_ori_ng` int(11) NOT NULL,
  `qty_reform_ok` int(11) NOT NULL,
  `qty_reform` int(11) NOT NULL,
  `qty_reform_ng` int(11) NOT NULL,
  `parent_lot_formation` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `plate_id`, `phase_id`, `qty_ori_ok`, `qty_ori_reform`, `qty_ori_ng`, `qty_reform_ok`, `qty_reform`, `qty_reform_ng`, `parent_lot_formation`, `date_created`, `created_by`, `shift_id`, `date_modified`, `modified_by`) VALUES
(63, 1, 1, 8777, 0, 0, 0, 0, 0, 0, 1608999739, 1, 1, 0, 0),
(64, 2, 1, 1000, 0, 0, 0, 0, 0, 0, 1609079623, 1, 1, 0, 0),
(65, 3, 1, 500, 0, 0, 0, 0, 0, 0, 1609081091, 1, 1, 0, 0),
(66, 4, 1, 3600, 0, 0, 0, 0, 0, 0, 1609081146, 1, 2, 0, 0),
(68, 6, 1, 1000, 0, 10, 0, 0, 0, 0, 1609081371, 1, 2, 0, 0),
(69, 7, 1, 3600, 0, 500, 0, 0, 0, 0, 1609081845, 1, 1, 0, 0),
(70, 8, 1, 500, 0, 100, 0, 500, 10, 0, 1609082228, 1, 2, 0, 0),
(71, 9, 1, 3600, 0, 5, 0, 3600, 10, 0, 1609082840, 1, 2, 0, 0),
(72, 10, 1, 3600, 0, 60, 0, 3600, 15, 0, 1609083510, 1, 2, 0, 0);

--
-- Triggers `tbl_transactions`
--
DELIMITER $$
CREATE TRIGGER `create_stock` AFTER INSERT ON `tbl_transactions` FOR EACH ROW begin

declare qty_good int;
declare qty_reform int;
declare qty_ng int;

set qty_good = new.qty_ori_ok - new.qty_ori_ng;
set qty_reform = new.qty_reform - new.qty_reform_ng;
set qty_ng = new.qty_ori_ng + new.qty_reform_ng;

if new.phase_id = 1 then
insert into tbl_stock(id, plate_id, trans_id, qty_onhand, status_id, locator_id, created_by, date_created)
values ('', new.plate_id, new.id, qty_good, '1', '4', new.created_by, new.date_created);

if qty_reform != 0 then
insert into tbl_stock(id, plate_id, trans_id, qty_onhand, status_id, locator_id, created_by, date_created)
values ('', new.plate_id, new.id, qty_reform, '2', '3', new.created_by, new.date_created);
end if;

if qty_ng != 0 then
insert into tbl_stock(id, plate_id, trans_id, qty_onhand, status_id, locator_id, created_by, date_created)
values ('', new.plate_id, new.id, qty_ng, '3', '2', new.created_by, new.date_created);
end if;

end if;

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `role_id`, `fullname`, `username`, `password`) VALUES
(1, 1, 'operator 08', 'operator_08', '$2y$10$iANdEZhoIe2xe7nOiCi.XOhvejZRkzwqJHDmzMlbBY.OP5HoNHk6C'),
(2, 1, 'operator 01', 'operator_01', '$2y$10$RBFtO0/Lu35dN3PrpDwtte5cz/q7DW4tEEreK4U34D7iu5aN26Hc6'),
(3, 1, 'operator 02', 'operator_02', '$2y$10$H2pAleAREGg.m4Fg3jRumuhBWRnvKAP3hWu6KjLhcsIsBqOy4FfJe'),
(4, 2, 'Foreman 01', 'foreman_01', '$2y$10$UyJdasXG4ARTWrcyUt7z/Og71Xjccv6TOvfld6dlVzna/RvY036EG'),
(5, 5, 'Super User', 'superuser', '$2y$10$ZXmZlzs2r4K/EvDxpdy2ee1jahKfEa6gyAh5ySYCq/IHOtH6YgKia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_roles`
--

CREATE TABLE `tbl_user_roles` (
  `id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_roles`
--

INSERT INTO `tbl_user_roles` (`id`, `code`, `description`) VALUES
(1, 'OPERATOR', 'OPERATOR'),
(2, 'FOREMAN', 'FOREMAN'),
(3, 'CUSTOMER', 'CUSTOMER'),
(4, 'STAFF', 'STAFF'),
(5, 'SUPERUSER', 'SUPERUSER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_locators`
--
ALTER TABLE `tbl_locators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_phase_types`
--
ALTER TABLE `tbl_phase_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plate`
--
ALTER TABLE `tbl_plate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plate_status`
--
ALTER TABLE `tbl_plate_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plate_types`
--
ALTER TABLE `tbl_plate_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_locators`
--
ALTER TABLE `tbl_locators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_phase_types`
--
ALTER TABLE `tbl_phase_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_plate`
--
ALTER TABLE `tbl_plate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_plate_status`
--
ALTER TABLE `tbl_plate_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_plate_types`
--
ALTER TABLE `tbl_plate_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
