-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Maio-2022 às 20:17
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `id_type` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `energy` int(55) NOT NULL,
  `carbs` int(55) NOT NULL,
  `protein` int(55) NOT NULL,
  `fat` int(55) NOT NULL,
  `fiber` int(55) NOT NULL,
  `salt` int(55) NOT NULL,
  `sugar` int(55) NOT NULL,
  `lifespan` varchar(55) NOT NULL,
  `health_grade` int(11) NOT NULL,
  `qr_code` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id_product`, `name`, `id_type`, `description`, `image`, `energy`, `carbs`, `protein`, `fat`, `fiber`, `salt`, `sugar`, `lifespan`, `health_grade`, `qr_code`, `status`, `views`) VALUES
(2, 'Brocoli', 2, 'Good for heart health, Contains cancer protective compounds', 'brocoli.jpg', 25, 2, 5, 1, 4, 0, 2, '5 days', 8, 'https://groceries.asda.com/product/organic-fruit-veg-salad/asda-growers-selection-organic-broccoli/1000056517020', 0, 0),
(3, 'Sweet Potato', 2, ' Enhance Brain Function, Highly Nutritious', 'sweetpotato.jpg', 55, 13, 2, 1, 3, 0, 5, '25 days', 6, 'https://groceries.asda.com/product/sweet-red-potatoes/asda-growers-selection-sweet-potatoes/34872944', 0, 0),
(4, 'Asparagus', 2, 'A rich source of folate, Lowers blood pressure', 'asparagus.jpg', 29, 2, 4, 1, 2, 0, 2, '15 days', 7, 'https://groceries.asda.com/product/beans-asparagus-sweetcorn/asda-extra-special-asparagus-tips/910000479055', 0, 0),
(5, 'baking potato', 2, 'Good source of fiber, Helps losing weight', 'potato.jpg', 60, 13, 3, 0, 3, 0, 2, '30 days', 6, 'https://groceries.asda.com/product/baking-jacket-potatoes/asda-growers-selection-baking-potatoes/24932', 0, 0),
(6, 'Chicken', 1, 'Weight loss, Anticancer properties', 'chicken.jpg', 90, 0, 16, 2, 0, 1, 0, '8 days', 8, 'https://groceries.asda.com/product/chicken-breasts/asda-butchers-selection-chicken-breast-fillet-portions/910002016369', 0, 0),
(7, 'Turkey', 1, 'Very high source of protein', 'turkey.jpg', 68, 0, 18, 1, 0, 0, 0, '8 days', 9, 'https://groceries.asda.com/product/turkey/asda-butchers-selection-turkey-breast-steaks/910001181101', 0, 0),
(8, 'Salmon', 3, 'Healthy fat, rich in omega-3', 'salmon.png', 110, 0, 12, 9, 0, 1, 0, '5 days', 5, 'https://groceries.asda.com/product/salmon/asda-salmon-side/1000163063155?origin=/product/turkey/asda-butchers-selection-turkey-breast-steaks/910001181101', 0, 0),
(9, 'Beef', 1, 'Blood health, Muscle function', 'beef.jpg', 90, 2, 13, 4, 0, 0, 0, '5 days', 6, 'https://groceries.asda.com/product/diced-casserole-beef/asda-butchers-selection-beef-braising-steak/910001217144', 0, 0),
(10, 'Bread', 4, 'High in fiber, Good source of fuel', 'bread.png', 125, 20, 5, 2, 3, 1, 4, '8 days', 6, 'https://groceries.asda.com/product/half-half-bread/kingsmill-medium-50-50-bread/42747407', 0, 0),
(11, 'Croissant', 4, 'Helps enhance the metabolic functioning of your body', 'croissant.jpg', 140, 18, 4, 8, 3, 2, 6, '7 days', 3, 'https://groceries.asda.com/product/croissants-pain-au-chocolat/asda-all-butter-croissants/910001519758', 0, 4),
(12, 'Eggs', 1, 'Highly nutritious, Source of choline', 'eggs.jpg', 40, 0, 8, 3, 0, 0, 0, '20 days', 7, 'https://groceries.asda.com/product/free-range-eggs/asda-12-medium-free-range-eggs/1049683', 0, 13),
(13, 'Butter', 3, 'contains vitamin D, a nutrient that is vital for bone growth and development', 'butter.png', 145, 1, 1, 23, 0, 1, 0, '30 days', 1, 'https://groceries.asda.com/product/block-butter/asda-unsalted-butter/910000419159', 0, 11),
(14, 'Cheese', 3, 'Cheese is a great source of calcium, fat, and protein', 'cheese.jpg', 147, 0, 6, 12, 0, 2, 0, '12 days', 2, 'https://groceries.asda.com/product/mild-medium-cheese/asda-mild-cheddar-cheese/910002987951', 0, 10),
(15, 'Pasta', 4, 'It\'s a good source of energy and can give you fiber', 'pasta.jpg', 50, 11, 3, 1, 2, 0, 0, '30 days', 8, 'https://groceries.asda.com/product/pasta-tubes-shells-spirals/asda-extra-special-traditional-pennoni-rigati/1000310701905', 0, 8),
(16, 'Rice', 4, 'Helps maintain a healthy weight, Supports energy and restores glycogen levels after exercise', 'rice.jpg', 35, 12, 3, 0, 0, 0, 0, '30 days', 9, 'https://groceries.asda.com/product/long-grain-basmati-rice/asda-white-basmati-rice/19399', 0, 3),
(17, 'Avocado', 3, 'Protect against heart disease and lower blood pressure', 'avocado.jpg', 60, 1, 2, 12, 3, 0, 0, '6 days', 5, 'https://groceries.asda.com/product/mango-kiwi-exotic-fruit/asda-extra-large-avocado/1000230965353', 0, 2),
(18, 'Banana', 2, 'Rich in nutrients, Full of antioxidants', 'banana.jpg', 45, 12, 1, 0, 1, 0, 6, '7 days', 8, 'https://groceries.asda.com/product/bananas/asda-growers-selection-7-bananas/1000197472184', 0, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `types`
--

CREATE TABLE `types` (
  `id_type` int(11) NOT NULL,
  `type` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `types`
--

INSERT INTO `types` (`id_type`, `type`) VALUES
(1, 'Proteins'),
(2, 'Vegetables / Fruits'),
(3, 'Fat'),
(4, 'Carbs');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(355) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_users`, `first_name`, `last_name`, `address`, `email`, `phone`, `password`) VALUES
(2, 'Daniel', 'Cerqueira', 'Cleveland Road', 'danielcerqueira@hotmail.com', '07652254588', '698dc19d489c4e4db73e28a713eab07b'),
(3, 'Mike', 'Smith', 'Mayfield Road', 'Msmith@gmail.com', '07235668109', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_session` varchar(155) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_session`, `id_product`) VALUES
(25, '9cb929sole9ggdfd0b6b7mtbbc', 3),
(26, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(27, '9cb929sole9ggdfd0b6b7mtbbc', 10),
(28, '9cb929sole9ggdfd0b6b7mtbbc', 13),
(29, '9cb929sole9ggdfd0b6b7mtbbc', 13),
(30, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(31, '9cb929sole9ggdfd0b6b7mtbbc', 8),
(32, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(33, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(34, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(35, '9cb929sole9ggdfd0b6b7mtbbc', 13),
(36, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(37, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(38, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(39, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(40, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(41, '9cb929sole9ggdfd0b6b7mtbbc', 14),
(42, '76irlubc394gibb2sb6onsoajp', 2),
(43, '76irlubc394gibb2sb6onsoajp', 4),
(44, '76irlubc394gibb2sb6onsoajp', 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Índices para tabela `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_type`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Índices para tabela `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `types`
--
ALTER TABLE `types`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
