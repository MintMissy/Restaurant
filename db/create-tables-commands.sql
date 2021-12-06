CREATE TABLE `employees` (
  `id` int(3) NOT NULL AUTO_INCREMENT UNIQUE,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `sex` varchar(6),
  `residence` varchar(70) NOT NULL,
  `postcode` varchar(13) NOT NULL,
  `shift_start` time,
  `shift_end` time,
  `phone_number` varchar(10) NOT NULL DEFAULT '',
  `left_days_off` int(2) NOT NULL DEFAULT 28,
  `job_position` varchar(45) NOT NULL DEFAULT 'Server',
  PRIMARY KEY (id)
);

CREATE TABLE `clients` (
  `id` int(7) NOT NULL AUTO_INCREMENT UNIQUE,
  `name` varchar(45) NOT NULL DEFAULT '',
  `surname` varchar(45) NOT NULL DEFAULT '',
  `sex` varchar(6),
  `residence` varchar(70) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `phone_number` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
);

CREATE TABLE `storage` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) NOT NULL,
  `item_quantity` int(4) NOT NULL DEFAULT 0,
  `quantity_unit` varchar(25) NOT NULL DEFAULT '',
  `recommended_quantity` int(4) NOT NULL DEFAULT 35,
  PRIMARY KEY (id),
  UNIQUE(`id`, `item_name`)
);

CREATE TABLE `meals` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL DEFAULT '',
  `cost_net` decimal(6, 2) NOT NULL DEFAULT 9.99,
  PRIMARY KEY (id),
  UNIQUE(`id`, `name`)
);

CREATE TABLE `orders` (
  `id` int(9) NOT NULL AUTO_INCREMENT UNIQUE,
  `client_id` int(7) NOT NULL,
  `meal_id` int(4) NOT NULL,
  `quantity` int(3) NOT NULL DEFAULT 1,
  `delivery_place` varchar(70) NOT NULL,
  `delivery_postcode` varchar(8) NOT NULL,
  `order_date` datetime NOT NULL,
  `ship_date` datetime,
  `pickup_date` datetime,
  PRIMARY KEY (id)
);