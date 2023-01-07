-- Adminer 4.8.0 MySQL 5.5.5-10.5.17-MariaDB-1:10.5.17+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `total_amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_id` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders` (`id`, `status`, `total_amount`, `created_at`, `transaction_id`, `user_id`) VALUES
(1,	'completed',	60,	'2023-01-05 03:05:31',	'lwb4za0t',	1),
(2,	'completed',	20,	'2023-01-05 03:05:53',	's8ac86t9',	1),
(3,	'completed',	20,	'2023-01-05 03:06:54',	'foatll9m',	1),
(4,	'completed',	30,	'2023-01-05 03:07:58',	'0h2wyq0y',	1),
(5,	'failed',	20,	'2023-01-05 03:08:58',	'c5agu1i7',	1);

DROP TABLE IF EXISTS `orders_products`;
CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1,	1,	2,	2),
(2,	2,	3,	1),
(3,	3,	3,	1),
(4,	4,	2,	1),
(5,	5,	3,	1);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `name`, `price`, `image_url`) VALUES
(1,	'Product 1',	50,	'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-1_large.png?format=webp&v=1530129292'),
(2,	'Product 2',	30,	'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-2_large.png?format=webp&v=1530129318'),
(3,	'Product 3',	20,	'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-3_large.png?format=webp&v=1530129341'),
(4,	'Product 4',	40,	'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-4_large.png?format=webp&v=1530129292'),
(5,	'Product 5',	35,	'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-5_large.png?format=webp&v=1530129318'),
(6,	'Product 6',	26,	'https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-product-6_large.png?format=webp&v=1530129341');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `email`, `password`, `added_on`) VALUES
(1,	'waijian22g@forwardschool.edu.my',	'$2y$10$iqrD/tqKK7jkMJAzu2Sav.Rck.uN9ysBZfSKwZ0bX907B1gGfxLku',	'2022-12-20 05:58:03');

-- 2023-01-07 07:11:36
