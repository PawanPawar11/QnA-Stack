-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2026 at 11:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qna_stack`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `answer` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `user_id`, `answer`) VALUES
(1, 1, 7, 'JSON works as a plain text data format that represents objects using key-value pairs, arrays, numbers, strings, booleans, and null. Under the hood, a .json file is just UTF-8 text — there’s no executable logic — and when a program reads it, a parser converts that text into native data structures (li'),
(3, 6, 7, '15\r\n\r\nExplanation (simple steps):\r\n\r\np stores address of a.\r\n*p means value at that address → value of a.\r\n*p = *p + 5 changes a from 10 to 15.\r\nPrinting a shows 15.'),
(4, 7, 7, 'A constructor is a special member function of a class that runs automatically when an object is created.\r\n\r\nExample:\r\nclass Demo {\r\npublic:\r\n    Demo() {\r\n        cout << \"Constructor called\";\r\n    }\r\n};\r\n\r\nKey Points:\r\n- Same name as class.\r\n- No return type.\r\n- Used for initialization.'),
(5, 9, 7, 'Strings are immutable to improve security, performance, and memory optimization.\r\n\r\nSimple Reasons:\r\n- Prevents accidental changes.\r\n- Allows string pooling (memory saving).\r\n- Safe for multithreading.\r\n\r\nExample:\r\nString s = \"Hello\";\r\ns.concat(\" World\"); // creates new object'),
(6, 10, 7, '| Feature  | List        | Tuple    |\r\n| -------    | --------  | -------  |\r\n| Mutable | ✅ Yes  | ❌ No  |\r\n| Syntax    | `[ ]`        | `( )`        |\r\n| Speed    | Slower   | Faster   |\r\n\r\nExample:\r\na = [1,2,3]\r\nb = (1,2,3)\r\n\r\nRule:\r\n- Use tuple when data should not change.');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'c'),
(2, 'c++'),
(3, 'java'),
(4, 'python'),
(5, 'javascript'),
(6, 'general');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `category_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `category_id`, `user_id`) VALUES
(1, 'How does JSON works under the hood?', 'While using .json and JSON.Stringify(), how does it works internally?', 5, 7),
(2, 'How does rest operator works?', 'How does rest operator work in JavaScript, why do we use it, and can you explain its use case along with an example.', 5, 8),
(3, '<script>alert(\"Hacked!\")</script>', 'This is not a question; I\'m doing it for testing the security of website!', 6, 8),
(6, 'What will be the output of the following C code?', '#include <stdio.h>\r\n\r\nint main() {\r\n    int a = 10;\r\n    int *p = &a;\r\n    *p = *p + 5;\r\n    printf(\"%d\", a);\r\n    return 0;\r\n}', 1, 8),
(7, 'What is a constructor in C++ and when is it called?', 'Tests basic OOP understanding in C++.', 2, 8),
(9, 'Why are Strings immutable in Java?', 'Conceptual Java question about memory and security.', 3, 8),
(10, 'What is the main difference between a list and a tuple in Python?', 'Checks understanding of Python data structures.', 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) VALUES
(7, 'PawanPawar1', 'pawanpawar@gmail.com', '$2y$10$XS.EcatGOG4QSN6TO9qyy.Ik2k3Sd1AndPtGcI/QHai7PXT5eY6yC', 'Maharashtra'),
(8, 'ArjunSengupta7', 'arjunsengupta@gmail.com', '$2y$10$ubRrGYrm8GXyHw9VHy17B.SwxqH0Ar1dF9o.65MH15ZQfNA73amKW', 'West Bengal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
