-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 27, 2024 lúc 07:29 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demodb`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddProduct` (IN `p_code` VARCHAR(50), IN `p_name` VARCHAR(100), IN `p_price` DECIMAL(10,2), IN `p_amount` INT, IN `p_description` TEXT, IN `p_status` BOOLEAN)   BEGIN
    INSERT INTO Products (productCode, productName, productPrice, productAmount, productDescription, productStatus)
    VALUES (p_code, p_name, p_price, p_amount, p_description, p_status);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteProductById` (IN `p_id` INT)   BEGIN
    DELETE FROM Products WHERE Id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllProducts` ()   BEGIN
    SELECT * FROM Products;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateProductById` (IN `p_id` INT, IN `p_name` VARCHAR(100), IN `p_price` DECIMAL(10,2), IN `p_amount` INT, IN `p_description` TEXT, IN `p_status` BOOLEAN)   BEGIN
    UPDATE Products
    SET productName = p_name,
        productPrice = p_price,
        productAmount = p_amount,
        productDescription = p_description,
        productStatus = p_status
    WHERE Id = p_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `Id` int NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `productAmount` int NOT NULL,
  `productDescription` text,
  `productStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`Id`, `productCode`, `productName`, `productPrice`, `productAmount`, `productDescription`, `productStatus`) VALUES
(1, 'P001', 'Updated Product A', 120.00, 12, 'Updated Description', 1),
(2, 'P002', 'Product B', 200.50, 5, 'Description for Product B', 1),
(3, 'P003', 'Product C', 150.00, 20, 'Description for Product C', 0),
(5, 'P005', 'Product E', 250.00, 15, 'Description for Product E', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `idx_productCode` (`productCode`),
  ADD KEY `idx_productName_Price` (`productName`,`productPrice`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
