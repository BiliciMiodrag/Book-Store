-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: iul. 31, 2020 la 10:25 AM
-- Versiune server: 8.0.18
-- Versiune PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `bookstorephp`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_isbn` varchar(300) NOT NULL,
  `book_title` varchar(300) NOT NULL,
  `book_author` varchar(300) NOT NULL,
  `book_image` varchar(300) DEFAULT NULL,
  `book_descr` text,
  `book_price` decimal(6,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `publisher_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `book_isbn` (`book_isbn`),
  KEY `publisher_id` (`publisher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `books`
--

INSERT INTO `books` (`id`, `book_isbn`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `quantity`, `publisher_id`) VALUES
(11, '978-0-321-94786-4', 'Learning Mobile App Development', 'Jakob Iversen, Michael Eierman', 'mobile_app.jpg', 'Now, one book can help you master mobile app development with both market-leading platforms: Apple\'s iOS and Google\'s Android. Perfect for both students and professionals, Learning Mobile App Development is the only tutorial with complete parallel coverage of both iOS and Android. With this guide, you can master either platform, or both - and gain a deeper understanding of the issues associated with developing mobile apps.\r\n\r\nYou\'ll develop an actual working app on both iOS and Android, mastering the entire mobile app development lifecycle, from planning through licensing and distribution.\r\n\r\nEach tutorial in this book has been carefully designed to support readers with widely varying backgrounds and has been extensively tested in live developer training courses. If you\'re new to iOS, you\'ll also find an easy, practical introduction to Objective-C, Apple\'s native language.', '20.00', 10, 6),
(12, '978-0-7303-1484-4', 'Doing Good By Doing Good', 'Peter Baines', 'doing_good.jpg', 'Doing Good by Doing Good shows companies how to improve the bottom line by implementing an engaging, authentic, and business-enhancing program that helps staff and business thrive. International CSR consultant Peter Baines draws upon lessons learnt from the challenges faced in his career as a police officer, forensic investigator, and founder of Hands Across the Water to describe the Australian CSR landscape, and the factors that make up a program that benefits everyone involved. Case studies illustrate the real effect of CSR on both business and society, with clear guidance toward maximizing involvement, engaging all employees, and improving the bottom line. The case studies draw out the companies that are focusing on creating shared value in meeting the challenges of society whilst at the same time bringing strong economic returns.Consumers are now expecting that big businesses with ever-increasing profits give back to the community from which those profits arise. At the same time, shareholders are demanding their share and are happy to see dividends soar. Getting this right is a balancing act, and Doing Good by Doing Good helps companies delineate a plan of action for getting it done.', '20.00', 10, 2),
(13, '978-1-118-94924-5', 'Programmable Logic Controllers', 'Dag H. Hanssen', 'logic_program.jpg', 'Widely used across industrial and manufacturing automation, Programmable Logic Controllers (PLCs) perform a broad range of electromechanical tasks with multiple input and output arrangements, designed specifically to cope in severe environmental conditions such as automotive and chemical plants.Programmable Logic Controllers: A Practical Approach using CoDeSys is a hands-on guide to rapidly gain proficiency in the development and operation of PLCs based on the IEC 61131-3 standard. Using the freely-available* software tool CoDeSys, which is widely used in industrial design automation projects, the author takes a highly practical approach to PLC design using real-world examples. The design tool, CoDeSys, also features a built in simulator / soft PLC enabling the reader to undertake exercises and test the examples.', '20.00', 10, 2),
(14, '978-1-1180-2669-4', 'Professional JavaScript for Web Developers, 3rd Edition', 'Nicholas C. Zakas', 'pro_js.jpg', 'If you want to achieve JavaScript\'s full potential, it is critical to understand its nature, history, and limitations. To that end, this updated version of the bestseller by veteran author and JavaScript guru Nicholas C. Zakas covers JavaScript from its very beginning to the present-day incarnations including the DOM, Ajax, and HTML5. Zakas shows you how to extend this powerful language to meet specific needs and create dynamic user interfaces for the web that blur the line between desktop and internet. By the end of the book, you\'ll have a strong understanding of the significant advances in web development as they relate to JavaScript so that you can apply them to your next website.', '20.00', 10, 1),
(15, '978-1-44937-019-0', 'Learning Web App Development', 'Semmy Purewal', 'web_app_dev.jpg', 'Grasp the fundamentals of web application development by building a simple database-backed app from scratch, using HTML, JavaScript, and other open source tools. Through hands-on tutorials, this practical guide shows inexperienced web app developers how to create a user interface, write a server, build client-server communication, and use a cloud-based service to deploy the application.\r\n\r\nEach chapter includes practice problems, full examples, and mental models of the development workflow. Ideal for a college-level course, this book helps you get started with web app development by providing you with a solid grounding in the process.', '20.00', 10, 3),
(16, '978-1-44937-075-6', 'Beautiful JavaScript', 'Anton Kovalyov', 'beauty_js.jpg', 'JavaScript is arguably the most polarizing and misunderstood programming language in the world. Many have attempted to replace it as the language of the Web, but JavaScript has survived, evolved, and thrived. Why did a language created in such hurry succeed where others failed?\r\n\r\nThis guide gives you a rare glimpse into JavaScript from people intimately familiar with it. Chapters contributed by domain experts such as Jacob Thornton, Ariya Hidayat, and Sara Chipps show what they love about their favorite language - whether it\'s turning the most feared features into useful tools, or how JavaScript can be used for self-expression.', '20.00', 10, 3),
(17, '978-1-4571-0402-2', 'Professional ASP.NET 4 in C# and VB', 'Scott Hanselman', 'pro_asp4.jpg', 'ASP.NET is about making you as productive as possible when building fast and secure web applications. Each release of ASP.NET gets better and removes a lot of the tedious code that you previously needed to put in place, making common ASP.NET tasks easier. With this book, an unparalleled team of authors walks you through the full breadth of ASP.NET and the new and exciting capabilities of ASP.NET 4. The authors also show you how to maximize the abundance of features that ASP.NET offers to make your development process smoother and more efficient.', '20.00', 10, 1),
(18, '978-1-484216-40-8', 'Android Studio New Media Fundamentals', 'Wallace Jackson', 'android_studio.jpg', 'Android Studio New Media Fundamentals is a new media primer covering concepts central to multimedia production for Android including digital imagery, digital audio, digital video, digital illustration and 3D, using open source software packages such as GIMP, Audacity, Blender, and Inkscape. These professional software packages are used for this book because they are free for commercial use. The book builds on the foundational concepts of raster, vector, and waveform (audio), and gets more advanced as chapters progress, covering what new media assets are best for use with Android Studio as well as key factors regarding the data footprint optimization work process and why new media content and new media data optimization is so important.', '20.00', 10, 4),
(19, '978-1-484217-26-9', 'C++ 14 Quick Syntax Reference, 2nd Edition', '	Mikael Olsson', 'c_14_quick.jpg', 'This updated handy quick C++ 14 guide is a condensed code and syntax reference based on the newly updated C++ 14 release of the popular programming language. It presents the essential C++ syntax in a well-organized format that can be used as a handy reference.\r\n\r\nYou won\'t find any technical jargon, bloated samples, drawn out history lessons, or witty stories in this book. What you will find is a language reference that is concise, to the point and highly accessible. The book is packed with useful information and is a must-have for any C++ programmer.\r\n\r\nIn the C++ 14 Quick Syntax Reference, Second Edition, you will find a concise reference to the C++ 14 language syntax. It has short, simple, and focused code examples. This book includes a well laid out table of contents and a comprehensive index allowing for easy review.', '20.00', 10, 4),
(20, '978-1-49192-706-9', 'C# 6.0 in a Nutshell, 6th Edition', 'Joseph Albahari, Ben Albahari', 'c_sharp_6.jpg', 'When you have questions about C# 6.0 or the .NET CLR and its core Framework assemblies, this bestselling guide has the answers you need. C# has become a language of unusual flexibility and breadth since its premiere in 2000, but this continual growth means there\'s still much more to learn.\r\n\r\nOrganized around concepts and use cases, this thoroughly updated sixth edition provides intermediate and advanced programmers with a concise map of C# and .NET knowledge. Dive in and discover why this Nutshell guide is considered the definitive reference on C#.', '20.00', 10, 3),
(25, '978-1-4842-5639-8', 'Beginning Unreal Game Development', 'David Nixon', 'game.jpg', 'Get started creating video games using Unreal Engine 4 (UE4) and learning the fundamentals of game development. Through hands-on, step-by-step tutorials, you will learn to design engaging environments and a build solid foundation for more complex games. Discover how to utilize the 3D game design software behind the development of immensely popular games for PC, console, and mobile.  Beginning Unreal Game Development steers you through the fundamentals of game development with UE4 to design environments that both engage the player and are aesthetically pleasing. Author David Nixon shows you how to script logic, define behaviors, store data, and create characters. You will learn to create user interfaces, such as menus, load screens, and head-up displays (HUDs), and manipulate audio to add music, sound effects, and dialogue to your game. The book covers level editors, actor types, blueprints, character creation and control, and much more. Throughout the book, you’ll put theory into practice and create an actual game using a series of step-by-step tutorials.  With a clear, step-by-step approach, Beginning Unreal Game Development builds up your knowledge of Unreal Engine 4 so you can start creating and deploying your own 3D video games in no time.', '26.99', 20, 4),
(26, '978-1-4842-5584-1', 'MySQL 8 Query Performance Tuning', 'Jesper Wisborg Krogh', 'mysql.jpg', 'Identify, analyze, and improve poorly performing queries that damage user experience and lead to lost revenue for your business. This book will help you make query tuning an integral part of your daily routine through a multi-step process that includes monitoring of execution times, identifying candidate queries for optimization, analyzing their current performance, and improving them to deliver results faster and with less overhead. Author Jesper Krogh systematically discusses each of these steps along with the data sources and the tools used to perform them.  MySQL 8 Query Performance Tuning aims to help you improve query performance using a wide range of strategies. You will know how to analyze queries using both the traditional EXPLAIN command as well as the new EXPLAIN ANALYZE tool. You also will see how to use the Visual Explain feature to provide a visually-oriented view of an execution plan. Coverage of indexes includes indexing strategies and index statistics, and you will learn how histograms can be used to provide input on skewed data distributions that the optimizer can use to improve query performance. You will learn about locks, and how to investigate locking issues. And you will come away with an understanding of how the MySQL optimizer works, including the new hash join algorithm, and how to change the optimizer’s behavior when needed to deliver faster execution times. You will gain the tools and skills needed to delight application users and to squeeze the most value from corporate computing resources. ', '35.30', 20, 4),
(29, '9780062911735', 'Best Self', 'Mike Bayer', 'bestself.jpg', 'How would you answer those questions? Think about your daily life. Are you thriving, or going through the motions? Are your days full of work, relationships and activities that are true to your authentic self, or do you feel trapped on a treadmill of responsibility? If you dream of a better life, now is the time to turn your dream into reality. And the tools you need are within your grasp, to design a life that is fulfilling on the deepest levels. Best Self will show you how.  Mike Bayer, known to the thousands of clients whose lives he has changed as Coach Mike, has helped everyone from pop stars to business executives to people just like you discover the freedom to be their best selves. By asking them and leading them to ask themselves a series of important but tough questions—such as “What are your core values?”  “Do you go to bed each day more knowledgeable than when you woke up?” and “Am I neglecting some aspect of my physical health out of fear or denial?”—he helps them see what their Best Selves and Anti-Selves really look like. As a mental health specialist, a personal development coach, and an all-around change agent, Mike has seen the amazing ways in which lives can improve with honesty and clarity.  He understands our struggles intimately, because he’s faced—and overcome—his own. And he knows that change is possible.  By working through each of the Seven SPHERES of life—Social, Personal, Health, Education, Relationships, Employment and Spiritual Development—Best Self is an accessible and interactive book that distills all of Coach Mike’s wisdom into a compact, focused guide that will ignite anyone’s desire for change. Chock full of revealing quizzes, and full of provocative questionnaires, Best Self will empower you to embrace your authenticity, acknowledge what is holding you back, and break through to live a passionate life to the fullest, forever.', '26.99', 20, 10),
(30, '9780062200679', 'Full Throttle', 'Joe Hill', 'joe.jpg', 'Thirteen relentless tales of supernatural suspense, including “In the Tall Grass,” one of two stories cowritten with Stephen King and the basis for the terrifying feature film from Netflix.  A little door that opens to a world of fairy-tale wonders becomes the blood-drenched stomping ground for a gang of hunters in “Faun.” A grief-stricken librarian climbs behind the wheel of an antique Bookmobile to deliver fresh reads to the dead in “Late Returns.”    In “By the Silver Water of Lake Champlain”—now an episode on Shudder TV’s Creepshow—two young friends stumble on the corpse of a plesiosaur at the water’s edge, a discovery that forces them to confront the inescapable truth of their own mortality. And tension shimmers in the sweltering heat of the Nevada desert as a faceless trucker finds himself caught in a sinister dance with a tribe of motorcycle outlaws in “Throttle,” cowritten with Stephen King.  Replete with shocking chillers, including two previously unpublished stories written expressly for this volume (“Mums” and “Late Returns”) and another appearing in print for the first time (“Dark Carousel”), Full Throttle is a darkly imagined odyssey through the complexities of the human psyche. Hypnotic and disquieting, it mines our tormented secrets, hidden vulnerabilities, and basest fears, and demonstrates this exceptional talent at his very best.', '27.99', 20, 10);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ship_fname` varchar(100) NOT NULL,
  `ship_lname` varchar(100) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `ship_address` varchar(200) NOT NULL,
  `ship_city` varchar(100) NOT NULL,
  `ship_zip_code` varchar(100) NOT NULL,
  `ship_country` varchar(100) NOT NULL,
  PRIMARY KEY (`orderid`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `orders`
--

INSERT INTO `orders` (`orderid`, `user_id`, `amount`, `date`, `ship_fname`, `ship_lname`, `phone`, `ship_address`, `ship_city`, `ship_zip_code`, `ship_country`) VALUES
(3, 41, '60.00', '2020-07-30 12:18:03', 'Tudor23', 'Bodenlosz', '0785688223', 'Strada Principala', 'Cluj', '231231', 'Romania'),
(4, 41, '60.00', '2020-07-30 12:18:29', 'Tudor23', 'Bodenlosz', '0785688223', 'Strada Principala', 'Cluj', '231231', 'Romania'),
(5, 1, '80.00', '2020-07-30 12:20:14', 'Miodrag Miroslav', 'Bilici', '0785688223', 'Strada Principala', 'Cluj', '31231', 'Romania'),
(6, 42, '100.00', '2020-07-30 12:28:20', 'Andrei', 'Razvan', '0785688223', '1 MAI', 'Gura Humorului', '1231231', 'Romania'),
(7, 42, '80.00', '2020-07-30 12:30:33', 'Andrei', 'Razvan', '0467836873', '1 Mai', 'Gura Humorului', '2312331', 'Romania'),
(8, 42, '20.00', '2020-07-30 12:34:34', 'Andrei', 'Razvan', '0785688223', '1 Mai', 'Gura Humorului', '132133', 'Romania'),
(9, 42, '20.00', '2020-07-30 12:36:48', 'Andrei', 'Razvan', '0785688223', '1 Mai', 'Gura Humorului', '132133', 'Romania'),
(10, 42, '20.00', '2020-07-30 12:36:50', 'Andrei', 'Razvan', '0785688223', '1 Mai', 'Gura Humorului', '132133', 'Romania'),
(11, 42, '20.00', '2020-07-30 12:37:33', 'Andrei', 'Razvan', '0785688223', 'ewqewq', 'eqweqw', 'ewqe3', 'ewqeqe'),
(12, 1, '60.00', '2020-07-30 12:41:39', 'Miodrag Miroslav', 'Bilici', '0785688223', 'Strada Principala', 'Cluj', '23123', 'Romania'),
(13, 43, '60.00', '2020-07-30 19:30:00', 'Melissa', 'Smecicas', '0785688223', 'dasd', 'Cluj', 'dads', 'dda'),
(17, 42, '20.00', '2020-07-30 19:31:51', 'Andrei', 'Razvan', '076321313', 'Strada Pr', 'Gura Humorului', '312312', 'Romania');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `book_isbn` varchar(300) NOT NULL,
  `item_price` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  KEY `orderid` (`orderid`),
  KEY `book_isbn` (`book_isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `order_items`
--

INSERT INTO `order_items` (`orderid`, `book_isbn`, `item_price`, `quantity`) VALUES
(6, '978-1-44937-075-6', 20, 2),
(6, '978-1-4571-0402-2', 20, 2),
(6, '978-1-484217-26-9', 20, 1),
(6, '978-1-44937-019-0', 20, 4),
(12, '978-0-321-94786-4', 20, 3),
(13, '978-0-7303-1484-4', 20, 3),
(17, '978-0-7303-1484-4', 20, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`) VALUES
(1, 'bilicimio@yahoo.com', '248588624b5a68ec9258b9916abd25430c122b78eade1e239ec1acce8dc568840715a8de2e9d09085bd156c547d0854f9c72'),
(2, 'bilicimio@yahoo.com', '427f198c759784d7049ceacbc5c52d2dff49c7528361ef8e956006344254ca0a0ac649eb7b6f6e60899cae6d28a1557644d9'),
(3, 'bilicimio@yahoo.com', 'a266c12b1e056b1652cf82ffca7392a26f75a143eef1d95ef3f00b2f9d0805f66b9056662840972a6a6894facfa315c242ab'),
(4, 'bilicimio@yahoo.com', 'd454a241eb992b2c1ff6dc29e860359114ed3ed3caaf8dee641a668ecc16821b7c7725b0ca19bcb238d299c7b5b6cfb5c2e3'),
(5, 'bilicimio@yahoo.com', '5cfd275d9077d6f8d5f02b6ba65ebd873134aa1e25f6dfcb257afb4534d7940fd7934d0230ca1993f325c9c118bc3d5ec8f4'),
(6, 'bilicimio@yahoo.com', 'e352fa2ed14a6b6ad0934cf24faf75c5eb8507ae7e2f52e6be232866221b8beb1e906e3f9142800e48d699e6d14f05db6ae4');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `publisherid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(100) NOT NULL,
  PRIMARY KEY (`publisherid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `publisher`
--

INSERT INTO `publisher` (`publisherid`, `publisher_name`) VALUES
(1, 'Wrox'),
(2, 'Wiley'),
(3, 'O\'Reilly Media'),
(4, 'Apress'),
(5, 'Packt Publishing'),
(6, 'Addison-Wesley'),
(10, 'HarperCollins');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `adress` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `zip_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `user_type`, `phone`, `adress`, `city`, `zip_code`, `country`) VALUES
(1, 'admin', 'admin', 'admin@yahoo.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0785688223', 'Strada Principala', 'Cluj', '312312', 'Romania'),
(41, 'Tudor', 'Bodenlosz', 'tudor@yahoo.com', 'eb340b07f717b1e6d8e774ff87668b32', 'user', '0785688223', 'Strada Principala', 'Baia Sprie', '31241', 'Romania'),
(42, 'Andrei', 'Razvan', 'razvan@yahoo.com', 'eb340b07f717b1e6d8e774ff87668b32', 'user', '076321313', 'Strada Pr', 'Gura Humorului', '312312', 'Romania'),
(43, 'Melissa', 'Smecicas', 'melissa@yahoo.com', 'eb340b07f717b1e6d8e774ff87668b32', 'user', NULL, NULL, NULL, NULL, NULL);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisherid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`book_isbn`) REFERENCES `books` (`book_isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
