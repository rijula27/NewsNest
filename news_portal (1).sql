-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 11:01 AM
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
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account2`
--

CREATE TABLE `admin_account2` (
  `admin_id` int(30) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `req_date` date NOT NULL,
  `password` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account2`
--

INSERT INTO `admin_account2` (`admin_id`, `admin_name`, `email`, `req_date`, `password`, `img`) VALUES
(1, 'Admin 01', 'admin01@gmail.com', '0000-00-00', '0876dfca6d6fedf99b2ab87b6e2fed4bd4051ede78a8a9135b500b2e94d99b88', ''),
(78, 'admin11', 'admin11@gmail.com', '2024-05-15', '0f6b31b40e622d92344d3c3c5112b32816ac9a0fcc8993a8277ffeb95db297c8', ''),
(104, 'Rijul Ali', 'rijulali674@gmail.com', '2024-05-18', 'f0afa1296ee571b6466b4c9fc666e044612ab97b8ef9bb9084f3a5d0b53f7047', 'profile_image.jpg'),
(105, 'kaustav', 'thekaustav2020@gmail.com', '2024-05-18', '218b25a25a77cd0ca61297e306f255c21a1b34474c94c06de1180c421db9d823', 'Kaustav dp.jpg'),
(112, 'admin77', 'admin77@gmail.com', '2024-11-14', 'd1cb6800649969380c1bbb67fa7210e198438e3ec6c94667ecd1a476ceec887b', 'profile_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(30) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `published_date` date NOT NULL,
  `user_id3` int(30) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `title`, `content`, `published_date`, `user_id3`, `image1`, `image2`) VALUES
(70, 'AI: Shaping the world of tomorrow.', 'AI is essentially the intelligence displayed by machines, in contrast to the natural intelligence of humans and animals. It\'s about creating computer systems that can mimic human cognitive functions like learning, reasoning, problem-solving, and decision-making.\r\n\r\nTypes of AI\r\n\r\nThere are different approaches to AI, but here are two major categories:\r\n\r\nMachine Learning: This involves training AI models on large amounts of data. The model learns to identify patterns and make predictions based on the data it\'s exposed to. This is widely used in image and speech recognition, recommendation systems, and fraud detection.\r\n\r\nGeneral AI (AGI): This is the holy grail of AI research. It\'s the concept of creating an AI with human-level intelligence that can understand and perform any intellectual task a human can. This level of AI hasn\'t been achieved yet.\r\n\r\nApplications of AI\r\n\r\nAI is already having a significant impact on our world. Here are some examples:\r\n\r\nSelf-driving cars\r\nMedical diagnosis\r\nFraud detection\r\nSmart assistants\r\nProduct recommendations\r\nMachine translation\r\nThe future of AI\r\n\r\nAI is a rapidly evolving field with the potential to revolutionize many aspects of our lives. However, there are also ethical considerations and potential risks to address as AI becomes more sophisticated.\r\n\r\nRevolutionizing Industries\r\n\r\nHealthcare: AI is assisting in medical diagnosis, drug discovery, and personalized treatment plans by analyzing vast amounts of medical data. Imagine AI-powered tools helping doctors detect diseases earlier or robots performing complex surgeries with higher precision.\r\nFinance: AI algorithms are streamlining processes, managing risk, and even making investment decisions. This could lead to more efficient markets and personalized financial services.\r\nTransportation: Self-driving cars are no longer science fiction, and AI is at the heart of this transformation. This could revolutionize transportation, making it safer and more accessible.\r\nEnhancing our Lives\r\n\r\nEfficiency and Productivity: AI can automate repetitive tasks, freeing us to focus on more creative endeavors. This could lead to increased productivity across various sectors.\r\nPersonalized Experiences: AI is personalizing our experiences from entertainment recommendations to product suggestions. This can make our lives more convenient and enjoyable.\r\nProblem-Solving: AI can analyze complex data to tackle global challenges like climate change and resource management.\r\nChallenges and Considerations\r\n\r\nJob displacement: As AI automates tasks, some jobs may become obsolete. We need to focus on reskilling and retraining the workforce.\r\nBias and Fairness: AI algorithms can perpetuate biases present in the data they\'re trained on. Ensuring fairness and ethical development of AI is crucial.\r\nSafety and Control: As AI becomes more sophisticated, safety considerations around self-driving cars and autonomous systems become paramount.\r\nAI\'s impact on the future is undeniable. By embracing its potential and addressing the challenges, we can ensure AI shapes a better tomorrow for all.', '2024-03-30', 4, 'testing_article_image.jpg', ''),
(71, 'Trading: It\'s all about strategy and timing.', 'Ah, trading.  In essence, trading is the buying and selling of financial instruments with the aim of profiting from price movements. There\'s a whole world to trading, so let\'s explore some key aspects:\r\nDiving deeper into the world of trading, here\'s a comprehensive breakdown:\r\n\r\nMarkets and Instruments\r\n\r\nStock Exchanges: These are marketplaces where stocks of publicly traded companies are bought and sold. Examples include the New York Stock Exchange (NYSE) and the NASDAQ.\r\nForex Market: The largest financial market globally, where currencies are traded against each other. It\'s a decentralized market, operating 24/5.\r\nCommodities Markets: These deal with trading physical commodities like oil, gold, or agricultural products like wheat or corn.\r\nTrading Strategies\r\n\r\nTechnical Analysis: This approach focuses on analyzing price charts and historical data to identify trading opportunities. Traders use technical indicators to predict future price movements.\r\nFundamental Analysis: This dives into a company\'s financial health, industry trends, and economic factors to determine a stock\'s intrinsic value. Investors use this to identify undervalued stocks with long-term growth potential.\r\nDay Trading: This involves opening and closing positions within the same trading day, capitalizing on short-term price fluctuations. It\'s a fast-paced, high-risk strategy.\r\nSwing Trading: This strategy holds positions for a few days or weeks, aiming to profit from larger price swings.\r\nPositional Trading: This involves taking a long-term view (months or years), buying stocks with strong fundamentals and holding them for long-term growth.\r\nOrder Types\r\n\r\nMarket Orders: These orders instruct the broker to buy or sell a security at the best available price in the market.\r\nLimit Orders: These specify the price at which you want to buy or sell a security.\r\nStop-Loss Orders: These are used to limit potential losses. You place an order to automatically sell a security if the price falls below a certain point.\r\nRisk Management\r\n\r\nVolatility: The market constantly fluctuates, and prices can move up and down rapidly. It\'s crucial to understand and manage this risk.\r\nLeverage: This allows you to control a larger position with a smaller amount of capital. However, it amplifies both profits and losses. Use leverage cautiously.\r\nMargin: When using leverage, you borrow money from your broker to finance a portion of your investment. You\'ll need to maintain a minimum balance in your account (margin requirement) to avoid a margin call (forced selling of assets to meet the requirement).\r\nTrading Psychology\r\n\r\nDiscipline: Sticking to your trading plan and avoiding emotional decisions is essential for long-term success.\r\nPatience: Markets don\'t always move in your favor. Be patient and wait for the right opportunities.\r\nContinuous Learning: The financial world is constantly evolving. Stay updated on market trends, new strategies, and economic developments.', '2024-03-30', 4, 'testing_article_image.jpg', ''),
(72, 'The best time to start was last year. ...', 'Time management is all about effectively planning and controlling how you spend your time. It\'s about getting the most out of your day and achieving your goals without feeling overwhelmed. Here\'s a breakdown of key concepts:\r\n\r\nWhy is Time Management Important?\r\n\r\nIncreased Productivity: By planning your tasks and minimizing distractions, you can accomplish more in less time.\r\nReduced Stress: Feeling overwhelmed by a never-ending to-do list can be stressful. Time management helps you prioritize and feel in control.\r\nAchieving Goals: When you manage your time effectively, you can dedicate focused time to working towards your aspirations.\r\nImproved Work-Life Balance: Time management allows you to create a schedule that accommodates both work and personal commitments.\r\nEssential Strategies for Effective Time Management:\r\n\r\nSetting Goals: Clearly define your short-term and long-term goals. This gives direction to your time management efforts.\r\nPrioritization: Not all tasks are created equal. Learn to distinguish between important and urgent tasks and focus on the high-priority ones first. Techniques like the Eisenhower Matrix can help with this.\r\nPlanning and Scheduling: Allocate specific time slots for different tasks in your day or week. Use a calendar, planner, or to-do list app to create a schedule and stick to it as much as possible.\r\nTime Tracking: Monitor where your time goes. This can be done through time tracking apps or simply keeping a log for a few days. Identifying time-wasters allows you to adjust your schedule.\r\nEliminate Distractions: Minimize interruptions during focused work periods. Silence notifications, put your phone away, and let others know you need focused time.\r\nAdditional Tips for Success:\r\n\r\nSet Realistic Goals: Don\'t overload your schedule. Be realistic about what you can accomplish in a given timeframe.\r\nTake Breaks: Schedule short breaks throughout the day to avoid burnout. Get up, move around, and recharge your focus.\r\nDelegate or Outsource: If possible, delegate tasks to others or outsource them altogether. This frees up your time for more important tasks.\r\nLearn to Say No: Don\'t be afraid to decline requests that don\'t align with your priorities or schedule.\r\nReward Yourself: Celebrate your accomplishments! Completing tasks and achieving goals is motivating. Reward yourself for staying on track.\r\nRemember: Time management is a skill that takes practice and refinement. Experiment with different techniques and find what works best for you. There\'s no one-size-fits-all approach. By consistently implementing these strategies, you can take control of your time and achieve your goals!', '2024-03-30', 4, 'testing_article_image.jpg', ''),
(73, 'He who has health has hope and he who has hope has everything.', 'health is a complex and multifaceted concept. It\'s not just about the absence of disease, but also encompasses a state of physical, mental, and social well-being. Here\'s a deeper dive into this essential aspect of our lives:\r\n\r\nThe Three Pillars of Health\r\n\r\nPhysical Health: This refers to the proper functioning of your body systems. It includes maintaining a healthy weight, eating nutritious foods, getting regular exercise, and getting enough sleep.\r\n\r\nMental Health: This encompasses your emotional, psychological, and social well-being. It affects how you think, feel, and act.\r\n\r\nSocial Health: This involves your relationships with others and your sense of connection to your community. Strong social connections are essential for overall well-being.\r\n\r\n\r\nGenetics: Your genes play a role in your predisposition to certain diseases.\r\nLifestyle Choices: Your habits such as diet, exercise, sleep, and substance use significantly impact your health.\r\nEnvironment: The physical, social, and economic environment you live in can influence your health.\r\nAccess to Healthcare: Having access to preventive and treatment services is crucial for maintaining good health.\r\nMaintaining Optimal Health\r\n\r\nHealthy Diet: Focus on consuming plenty of fruits, vegetables, whole grains, and lean proteins. Limit unhealthy fats, processed foods, and added sugars.\r\nRegular Exercise: Aim for at least 150 minutes of moderate-intensity aerobic activity or 75 minutes of vigorous-intensity aerobic activity per week. Strength training exercises are also important.\r\nQuality Sleep: Most adults need around 7-8 hours of quality sleep each night.\r\nStress Management: Chronic stress can have a negative impact on your health. Practice relaxation techniques like yoga, meditation, or deep breathing.\r\nPreventive Care: Schedule regular checkups with your doctor and get recommended screenings for potential health problems.\r\nAdditional Tips\r\n\r\nBuild Healthy Relationships: Surround yourself with positive and supportive people.\r\nAvoid Tobacco and Excessive Alcohol: These substances can significantly damage your health.\r\nPractice Safe Sex: Protect yourself from sexually transmitted infections.\r\nMaintain a Healthy Weight: Being overweight or obese increases your risk for chronic diseases.\r\nBy prioritizing these aspects of healthy living, you can take charge of your well-being and live a long, fulfilling life. Remember, a healthy lifestyle is an investment in your future!', '2024-03-30', 4, 'testing_article_image.jpg', ''),
(74, 'Imagination is more important than knowledge.', 'It is a vast and ever-evolving field, but here\'s a comprehensive breakdown to get you started:\r\n\r\nWhat is Technology?\r\n\r\nIn essence, technology is the application of scientific knowledge to solve practical problems or achieve specific goals. It encompasses a wide range of tools, machines, systems, and processes that we use to make our lives easier, better, and more efficient. Technology can be tangible, like a physical device, or intangible, like software or a method.\r\n\r\nThe History of Technology\r\n\r\nThe history of technology stretches back millions of years, from the development of basic tools by early humans to the sophisticated gadgets we use today. Here are some key milestones:\r\n\r\nStone Age: Early humans developed basic tools like knives, axes, and fire, which revolutionized their ability to survive and adapt.\r\nIndustrial Revolution: This period (18th-19th centuries) saw the invention of machines powered by steam and water, leading to mass production and significant advancements in transportation and communication.\r\nInformation Age: The latter half of the 20th century saw the rise of computers, the internet, and digital technologies, which transformed communication, information access, and many other aspects of life.\r\nTypes of Technology\r\n\r\nTechnology can be broadly categorized into different areas based on its function or application. Here are some major categories:\r\n\r\nInformation Technology (IT): Deals with the creation, storage, transmission, and manipulation of information using computers, software, and networks. This includes the internet, communication technologies, and software development.\r\nBiotechnology: Applies biological knowledge and processes to develop products and services. Examples include medicine, agriculture, and genetic engineering.\r\nNanotechnology: Deals with manipulating matter on an atomic and molecular scale. This field has the potential for major advancements in various sectors like medicine, materials science, and electronics.\r\nTransportation Technology: Focuses on developing new and improved ways to travel from place to place. This includes cars, airplanes, trains, and even space exploration technologies.\r\nCommunication Technology: Enables us to communicate and share information over long distances. This includes telephones, the internet, radio, and television.\r\nThe Impact of Technology\r\n\r\nTechnology has a profound impact on almost every aspect of our lives. Here are some key areas:\r\n\r\nCommunication: Technology has revolutionized the way we communicate, making it easier and faster to connect with people around the world.\r\nHealthcare: Advancements in medical technology have led to improved diagnosis, treatment, and prevention of diseases.\r\nEducation: Technology is transforming education, providing new learning tools and resources, and making education more accessible.\r\nBusiness and Economy: Technology has driven innovation and efficiency in businesses, leading to new products, services, and economic growth.\r\nThe Future of Technology\r\n\r\nThe future of technology is brimming with possibilities. Some of the exciting areas to watch include:\r\n\r\nArtificial Intelligence (AI): AI has the potential to revolutionize many sectors, from healthcare and finance to transportation and manufacturing.\r\nRobotics: Robots are becoming increasingly sophisticated and are finding applications in various fields, from manufacturing to surgery.\r\nVirtual Reality (VR) and Augmented Reality (AR): These technologies have the potential to change the way we interact with the world around us, from entertainment and education to training and design.\r\nThe Challenges of Technology\r\n\r\nWhile technology offers numerous benefits, there are also challenges to consider:\r\n\r\nEthical Concerns: As technology advances, ethical questions arise, such as the use of AI and the potential for job displacement by automation.\r\nDigital Divide: Unequal access to technology can exacerbate social and economic inequalities.\r\nPrivacy and Security: Technological advancements raise concerns about data privacy and security.\r\nIn conclusion, technology is a powerful force that shapes our world. By understanding its potential and challenges, we can ensure that technology continues to improve our lives in a responsible and sustainable way.', '2024-03-30', 4, 'testing_article_image.jpg', ''),
(92, 'The Future of Artificial Intelligence: Transforming Everyday Life', 'Artificial Intelligence (AI) is revolutionizing the way we live and work, promising unprecedented advancements in various fields. From healthcare and finance to entertainment and transportation, AI\'s impact is profound and far-reaching.\r\n\r\nIn healthcare, AI-driven systems enhance diagnostic accuracy and personalize treatment plans. Machine learning algorithms analyze vast amounts of medical data, enabling early disease detection and improving patient outcomes. Virtual health assistants, powered by AI, provide instant medical advice, making healthcare more accessible.', '2024-05-21', 4, 'testing_article_image.jpg', ''),
(93, 'checking after long time that all the features are working or not', 'checking after long time that all the features are working or not', '2024-11-14', 4, 'testing_article_image.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `bulletin_board`
--

CREATE TABLE `bulletin_board` (
  `b_id` int(10) NOT NULL,
  `content` varchar(500) NOT NULL,
  `published_date` date NOT NULL,
  `admin_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bulletin_board`
--

INSERT INTO `bulletin_board` (`b_id`, `content`, `published_date`, `admin_id`) VALUES
(195, 'Delhi liquor policy case:                          ED arrests BRS MLC K Kavitha.', '2024-03-28', 1),
(197, 'Paytm Payments Bank: FAQs on closing FASTag accounts.', '2024-03-28', 1),
(198, 'After Centre alerted states on his fraud,                          Donor No 1 went on electoral bonds buying spree', '2024-03-28', 1),
(199, 'Electoral bonds Modi\'s extortion racket,                          means to take \'hafta\' from firms: Rahul Gandhi', '2024-03-28', 1),
(201, 'Submission on 18/05/24', '2024-05-15', 1),
(211, 'checking after long time ', '2024-11-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_type`
--

CREATE TABLE `content_type` (
  `content_type_id` int(30) NOT NULL,
  `content_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_type`
--

INSERT INTO `content_type` (`content_type_id`, `content_type_name`) VALUES
(1, 'option2'),
(2, 'option2'),
(3, 'option2'),
(4, 'option2'),
(5, 'option2'),
(6, 'option2'),
(7, 'option2'),
(8, 'option2'),
(9, 'option2'),
(10, 'option2'),
(11, 'option2'),
(12, 'option2'),
(13, 'option2'),
(14, 'option4'),
(15, 'option2'),
(16, 'option2'),
(17, 'option2'),
(18, 'option2'),
(19, 'option2'),
(20, 'option2'),
(21, 'International'),
(22, 'International'),
(23, 'International'),
(24, 'International'),
(25, 'International'),
(26, 'International'),
(27, 'International'),
(28, 'Regional'),
(29, 'International'),
(30, 'International'),
(31, 'International'),
(32, 'Regional'),
(33, 'International'),
(34, 'Regional'),
(35, 'International'),
(36, 'International'),
(37, 'International'),
(38, 'International'),
(39, 'International'),
(40, 'International'),
(41, 'National'),
(42, 'National'),
(43, 'National'),
(44, 'Regional'),
(45, 'National'),
(46, 'Regional'),
(47, 'International'),
(48, 'International'),
(49, 'National'),
(50, 'National'),
(51, 'International'),
(52, 'International'),
(53, 'International'),
(54, 'National'),
(55, 'Regional'),
(56, 'International'),
(57, 'National'),
(58, 'International'),
(59, 'International'),
(60, 'National'),
(61, 'Regional'),
(62, 'National'),
(63, 'Regional'),
(64, 'International'),
(65, 'National'),
(66, 'National'),
(67, 'International'),
(68, 'International'),
(69, 'International'),
(70, 'National'),
(71, 'National'),
(72, 'Regional'),
(73, 'Regional'),
(74, 'National'),
(75, 'National'),
(76, 'National'),
(77, 'National'),
(78, 'Regional'),
(79, 'Regional'),
(80, 'International'),
(81, 'International'),
(82, 'International'),
(83, 'Regional'),
(84, 'National'),
(85, 'National'),
(86, 'International'),
(87, 'International'),
(88, 'International'),
(89, 'National'),
(90, 'Regional'),
(91, 'Regional'),
(92, 'Regional'),
(93, 'International');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(2, 'Annonymous', 'anno90@gmail.com', 'User Interface', 'Your UI should be improve.', '2024-03-30'),
(9, 'Girija Choudhury', 'girija45@gmail.com', 'User Interface', 'User Interface is very easy to use and user friendly.', '2024-05-20'),
(10, 'Kaustav', 'kratos010@gmail.com', 'Functionality', 'This portal is very useful for  connected with the outside world.', '2024-05-20'),
(11, 'Rupam', 'rupamali27@gmail.com', 'Content', 'all news are up to date. and the articles are very helpful for daily life.', '2024-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(30) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_name`, `image`) VALUES
(2, '', 'WEATHER.jpg'),
(3, '', 'news demo.png'),
(4, '', 'news demo.png'),
(5, '', 'news demo.png'),
(6, '', 'news demo.png'),
(7, '', 'testing.jpg'),
(8, '', 'login_background.jpg'),
(9, '', 'bi-grams algorithm in java.png'),
(10, '', 'IMG_20240318_214342.jpg'),
(11, '', 'pexels-pixabay-531844.jpg'),
(12, '', 'dashboard background.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `language_type`
--

CREATE TABLE `language_type` (
  `language_id` int(50) NOT NULL,
  `language_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language_type`
--

INSERT INTO `language_type` (`language_id`, `language_name`) VALUES
(1, 'option2'),
(2, 'option2'),
(3, 'option2'),
(4, 'option4'),
(5, 'option2'),
(6, 'option2'),
(7, 'option2'),
(8, 'option2'),
(9, 'option2'),
(10, 'option2'),
(11, 'English'),
(12, 'English'),
(13, 'English'),
(14, 'default'),
(15, 'English'),
(16, 'English'),
(17, 'English'),
(18, 'Assamese'),
(19, 'English'),
(20, 'English'),
(21, 'English'),
(22, 'English'),
(23, 'English'),
(24, 'Assamese'),
(25, 'Hindi'),
(26, 'English'),
(27, 'English'),
(28, 'English'),
(29, 'English'),
(30, 'English'),
(31, 'Hindi'),
(32, 'English'),
(33, 'Hindi'),
(34, 'English'),
(35, 'English'),
(36, 'Hindi'),
(37, 'English'),
(38, 'English'),
(39, 'Hindi'),
(40, 'Hindi'),
(41, 'Hindi'),
(42, 'Hindi'),
(43, 'Hindi'),
(44, 'English'),
(45, 'Assamese'),
(46, 'Hindi'),
(47, 'Hindi'),
(48, 'English'),
(49, 'Hindi'),
(50, 'English'),
(51, 'Assamese'),
(52, 'Assamese'),
(53, 'Assamese'),
(54, 'Hindi'),
(55, 'Hindi'),
(56, 'Assamese'),
(57, 'English'),
(58, 'English'),
(59, 'English'),
(60, 'English'),
(61, 'English'),
(62, 'default'),
(63, 'English'),
(64, 'English'),
(65, 'English'),
(66, 'Assamese'),
(67, 'Assamese'),
(68, 'Assamese'),
(69, 'Assamese'),
(70, 'Assamese'),
(71, 'Hindi'),
(72, 'default'),
(73, 'Assamese'),
(74, 'Hindi'),
(75, 'Hindi'),
(76, 'English'),
(77, 'English'),
(78, 'English'),
(79, 'English'),
(80, 'English'),
(81, 'English'),
(82, 'English'),
(83, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(30) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `published_date` date NOT NULL,
  `user_id2` int(30) NOT NULL,
  `language_id` int(30) NOT NULL,
  `content_type_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `published_date`, `user_id2`, `language_id`, `content_type_id`, `category_id`, `image1`, `image2`) VALUES
(8, 'check', 'check', '2024-03-21', 0, 0, 0, 0, '', ''),
(9, 'check', 'check', '2024-03-19', 0, 0, 0, 0, '', ''),
(10, 'check', 'check', '2024-03-19', 0, 0, 0, 0, '', ''),
(11, 'Cricket in assam', 'there are two many cricket match is happening in assam.', '2024-03-19', 0, 0, 0, 0, '', ''),
(12, 'it\'s 1am at night', 'i am still working on my very first project', '2024-03-19', 0, 0, 0, 0, '', ''),
(13, 'it\'s 1am at night', 'i am still working on my very first project', '2024-03-19', 0, 8, 18, 18, '', ''),
(15, 'it\'s 1am at night', 'i am still working on my very first project', '2024-03-19', 0, 10, 20, 20, 'testing_news_image.jpg', ''),
(31, 'Moscow terror attack: How the world reacted to shooting in Russia concert hall', 'The terror attack at the Crocus City concert hall in Moscow\'s northern Krasnogorsk suburb, has claimed the lives of more than 60 people and wounded over 100. Islamic State (ISIS) has claimed responsibility for the horrific attack in Russia, which involved gunfire and a grenade explosion. Several world leaders have condemned the terrible incident\r\nDeadliest attack in Russia since 2004, the incident took place just before Soviet-era rock group \"Picnic\" was to perform at the Crocus City Hall. Video footage of the horrific attack are being shared on social media, in which people can be seen screaming and running amok in a bid to save their lives. In another video, flames and black smoke could be seen rising from the hall.', '2024-03-23', 4, 26, 36, 36, 'testing_news_image.jpg', ''),
(32, 'Word Suggestion for Tai Ahom Language', 'A suggestion system designed on \"Tai-ahom language\", with usability \r\nin mind, will help users in writing Tai-ahom language more effectively. \r\nWhile writing long sentences in tai-ahom language, we may find it a little \r\nhard and time consuming, however with the tai-ahom word suggestion \r\nsystem, this will Become easy. It\'s the endeavor of predicting what word \r\ncomes straightaway. The system can perceive past text and predict the \r\nwords which can be useful for the user to border sentences and this \r\nmethod uses word to word prediction suggests that it predict the next \r\nword from the previous typed word.', '2024-03-28', 4, 27, 37, 37, 'testing_news_image.jpg', ''),
(33, 'People will benefit from the next word prediction system in tai-ahom  as it would become more simpler to write it with next word suggestions  providing. It won\'t be difficult to find the correct spellings. As a result,  processing language at the word level produces better outcomes and  requires less effort.', ' Objectives – The project aims to develop a sophisticated word \r\nsuggestion system for the Tai Ahom language. This system will not only \r\nenhance the usability of writing in Tai Ahom but will also incorporate a \r\nframework to assess and improve suggestion systems, taking the concept \r\nof usability to new heights in the domain of ideas management through \r\nlanguage suggestions. The main objectives of our Tai Ahom word \r\nsuggestion system project are as follows –\r\na. To Maintain database of ahom words .\r\nb. To predict next word on the basis of semantic analysi', '2024-04-05', 4, 28, 38, 38, 'testing_news_image.jpg', ''),
(35, 'India TV Sports Wrap on March 24: Today\'s top 10 trending news stories', 'India TV Sports Wrap on March 24: Today\'s top 10 trending news stories India TV Sports Wrap on March 24: Today\'s top 10 trending news stories India TV Sports Wrap on March 24: Today\'s top 10 trending news storiesIndia TV Sports Wrap on March 24: Today\'s top 10 trending news stories India TV Sports Wrap on March 24: Today\'s top 10 trending news stories India TV Sports Wrap on March 24: Today\'s top 10 trending news stories India TV Sports Wrap on March 24: Today\'s top 10 trending news storiesIndia TV Sports Wrap on March 24: Today\'s top 10 trending news storiesIndia TV Sports Wrap on March 24: Today\'s top 10 trending news storiesIndia TV Sports Wrap on March 24: Today\'s top 10 trending news storiesIndia TV Sports Wrap on March 24: Today\'s top 10 trending news storiesIndia TV Sports Wrap on March 24: Today\'s top 10 trending news storiesIndia TV Sports Wrap on March 24: Today\'s top 10 trending news storiesIndia TV Sports Wrap on March 24: Today\'s top 10 trending news stories', '2024-03-24', 4, 30, 40, 40, 'testing_news_image.jpg', ''),
(54, 'Jorhat Law College: যোৰহাট আইন মহাবিদ্যালয়ৰ বিশেষ কাৰ্য্যসূচী, আয়োজন কৰিলে আইন সম্পৰ্কীয় এক বিশেষ কৰ্মশালাৰ', 'শুকুৰবাৰে যোৰহাটৰ আইন মহাবিদ্যালয়ত আয়োজন কৰা হয় এক বিশেষ অনুষ্ঠানৰ। আয়োজন কৰা হয় এক কৰ্মশালাৰ। দেশৰ আইন ব্যৱস্থাৰ গুৰুত্বপূৰ্ণ বিষয় বস্তু বাচনিৰে আয়োজন কৰা এই কৰ্মশালাৰ মূল বিষয় আছিল IPR it’s basic theme as per world trade agreement and evaluation of the legal protection and other regulations introduced in India to safeguard the IPR । দুদিনীয়া কাৰ্য্যসূচীৰে IQACৰ তৰফৰ পৰা এই অনুষ্ঠানৰ আয়োজন কৰা হয়। এই অনুষ্ঠানত মুখ্য অতিথি হিচাপে উপস্থিত থাকে যোৰহাট আইন মহাবিদ্যালয় পৰিচালনা সমিতিৰ সূৰ্য নাথ ফুকন, গুৱাহাটী উচ্চ ন্যায়ালয়ৰ জ্যেষ্ঠ অধিবক্তা তন্ময় জ্যোতি মহন্ত, মূখ্য অতিথি হিচাপে উপস্থিত থাকে উচ্চতম ন্য়ায়লয়ৰ সন্মানীয় ন্যায়াধীশ উজ্জ্বল ভুঞাৰ লগতে বহু কেইগৰাকী বিশিষ্ট ব্যক্তি উপস্থিত থাকে।', '2024-03-30', 8, 51, 61, 61, 'testing_news_image.jpg', ''),
(55, 'Riyan Parag : ক্ৰিকেট খেলাৰ আৰম্ভণিতে ৰিয়ান পৰাগক পিতৃয়ে কৈছিল এই কথা, সেই কথাই সঁচা প্ৰমাণিত কৰাৰ দিশে ৰিয়ান', 'স্পতিবাৰে আইপিএলত বিস্ফোৰক ইনিংছ খেলি সকলোৰে প্ৰশংসাৰ পাত্ৰ হৈ পৰিছে অসম সন্তান ক্ৰিকেটাৰ ৰিয়ান পৰাগ। দিল্লী কেপিটেলছৰ বিৰুদ্ধে ৰিয়ান পৰাগে ৪৫টা বলত ৮৪ ৰান অপৰাজিত ইনিংছ খেলি ৰাজস্থান ৰয়েলছৰ জয়ত অনবদ্য অৰিহনা আগবঢ়ায়। ৰিয়ানৰ পৰাগৰ দুৰ্দান্ত বেটিঙৰ ফলতে ৰাজস্থান ৰয়েলছে সংগ্ৰহ কৰে ১৮৫ ৰাণ। ৰিয়ান পৰাগে ৭টা ফ’ৰ আৰু ৬টা ছিক্সেৰে সজায় নিজৰ ইনিংছ।\r\nৰিয়ান পৰাগৰ এই ইনিংছৰ পিছতে এতিয়া প্ৰশংসাত পঞ্চমুখ ক্ৰিকেট বিশেষজ্ঞসকলৰ লগতে অনুৰাগীসকল। সকলোৱে আশা কৰিছে পৰৱৰ্তী সময়ত ভাৰতীয় দলৰ জাৰ্ছীত দেখা যাব ৰিয়ানক। ছচিয়েল মিডিয়াতো সকলোৱে প্ৰশংসা কৰিছে ৰিয়ান পৰাগক।\r\n\r\nএই সন্দৰ্ভত News18ৰ সৈতে এক সাক্ষাৎকাৰত ৰিয়ান পৰাগৰ পিতৃ পৰাগ দাসে ব্যক্ত কৰিলে নিজৰ অনুভৱ। ৰিয়ানৰ পিতৃ পৰাগ দাসে কয়, ‘‘ভাল লাগিছে। মানুহৰ আশা বহুত আছিল। কিবা এটা কৰি দেখুৱাইছে। বহু ডাঙৰ কিবা এটা কৰা বুলি মই ভবা নাই। বহু দীঘলীয়া যাত্ৰা আছে।’’', '2024-03-30', 8, 52, 62, 62, 'testing_news_image.jpg', ''),
(56, 'Jorhat News: হেঁপাহৰ ৰঙালী বিহুলৈ মাজত মাথোঁ আৰু কেইটামান দিন, যোৰহাটত পূৰ্ণগতিত চলিছে বিহুৰ আখৰা', 'হেঁপাহৰ ৰঙালী বিহুলৈ মাজত কেইটামান দিন। ৰাজ্যজুৰি ৰঙালী বিহুক আদৰাৰ ব্যাপক প্ৰস্তুতি। প্ৰান্তে প্ৰান্তে চলিছে বিহুনাচ আৰু ঢোল বাদনৰ কৰ্মশালা। পেঁপাৰ শব্দত মতলীয়া সকলো। চ’তে আনিছে ব’হাগৰ বতৰা। ঢোল আৰু পেঁপাৰ মাতত এতিয়া এক উখল মাখল সমগ্র ৰাজ্যৰ পৰিৱেশ। যোৰহাটতো দেখা গৈছে একই পৰিৱেশ। যোৰহাটৰ বিভিন্ন গাঁৱতেই হওক বা চহৰতেই হওক ঢোলৰ শব্দত আকৌ ব’হাগ অহাৰ আগজাননী। এতিয়া বিহু কৰ্মশালাযোৰহাটত অনুষ্ঠিত কৰা হৈছে বহু বিহু কৰ্মশালা। জাক জাক নাচনীৰ নাচোনত কঁপিছে সেউজীয়া ঘাঁহনি। বিহুৰ সাজেৰে ককাল ভাঙি নাচিছে নাচনীহঁতে। এইয়া বয়সৰ কোনো সীমা নাই। বৰহোলা মিলি জুলি যুৱ সমাজ ইকৰাণিৰ সৌজন্যত আৰু ইকৰাণি আঞ্চলিক বিহু সন্মিলনৰ সহযোগত আয়োজন কৰা হৈছে ঢোল বাদন আৰু বিহু নাচৰ কৰ্মশালা। কণমানি নাচনীহতেও ওলাই আহিছে বিহুৰ আখৰালৈ। যোৰহাটৰ ভিন্ন ঠাইৰ লগতে জে’লৰোড কমলা বৰীয়াত চলিছে এই কৰ্মশালা। ১৭ মাৰ্চৰ পৰা অনুষ্ঠিত হোৱা এই কৰ্মশালাত অংশ গ্ৰহণ কৰিছে প্ৰায় ৯০ ৰো অধিক ছাত্ৰ ছাত্ৰীয়ে। ৩১ মাৰ্চলৈ চলিব এই বিহুৰ কৰ্মশালা।\r\n\r\nYou May Like\r\nFor people aged 20 to 67: how to start investing in companies like Amazon\r\nCPX\r\n  by Taboola Sponsored Links \r\nশীৰ্ষ ভিডিঅ\'সমূহ\r\n4/5\r\nএজন আৰক্ষী বিষয়াৰ মহানুভৱতাৰ কথা\r\nএজন আৰক্ষী বিষয়াৰ মহানুভৱতাৰ কথা\r\n5/5\r\nনলবাৰীত সাহিত্যিক পেঞ্চনাৰ, শিক্ষক সাংবাদিক কৈলাশ মল্লবৰুৱাৰ দ্বাদশ বাৰ্ষিক স্মৃতিচাৰণ সভা\r\nনলবাৰীত সাহিত্যিক পেঞ্চনাৰ, শিক্ষক সাংবাদিক কৈলাশ মল্লবৰুৱাৰ দ্বাদশ বাৰ্ষিক স্মৃতিচাৰণ সভা\r\n1/5\r\n\r\nযোৰহাট আইন মহাবিদ্যালয়ত আইন সম্পৰ্কীয় এক বিশেষ কৰ্মশালাৰ আয়োজন\r\n2/5\r\nসমাগত ৰঙালী বিহু, যোৰহাটত পূৰ্ণগতিত চলিছে বিহুৰ আখৰা\r\nসমাগত ৰঙালী বিহু, যোৰহাটত পূৰ্ণগতিত চলিছে বিহুৰ আখৰা\r\n3/5\r\nঅত্যন্ত দুৰৱস্থাত জীৱন কটাইছে খাছিয়া টিলাৰ ৰাইজে\r\nঅত্যন্ত দুৰৱস্থাত জীৱন কটাইছে খাছিয়া টিলাৰ ৰাইজে\r\n4/5\r\nএজন আৰক্ষী বিষয়াৰ মহানুভৱতাৰ কথা\r\nএজন আৰক্ষী বিষয়াৰ মহানুভৱতাৰ কথা\r\n5/5\r\nনলবাৰীত সাহিত্যিক পেঞ্চনাৰ, শিক্ষক সাংবাদিক কৈলাশ মল্লবৰুৱাৰ দ্বাদশ বাৰ্ষিক স্মৃতিচাৰণ সভা\r\nনলবাৰীত সাহিত্যিক পেঞ্চনাৰ, শিক্ষক সাংবাদিক কৈলাশ মল্লবৰুৱাৰ দ্বাদশ বাৰ্ষিক স্মৃতিচাৰণ সভা\r\n1/5\r\nযোৰহাট আইন মহাবিদ্যালয়ত আইন সম্পৰ্কীয় এক বিশেষ কৰ্মশালাৰ আয়োজন\r\nযোৰহাট আইন মহাবিদ্যালয়ত আইন সম্পৰ্কীয় এক বিশেষ কৰ্মশালাৰ আয়োজন\r\n2/5\r\nসমাগত ৰঙালী বিহু, যোৰহাটত পূৰ্ণগতিত চলিছে বিহুৰ আখৰা\r\nসমাগত ৰঙালী বিহু, যোৰহাটত পূৰ্ণগতিত চলিছে বিহুৰ আখৰা\r\n\r\nঅসমীয়াত ব্ৰেকিং নিউজ সৰ্বপ্ৰথম News18 অসমত। শেহতীয়া খবৰ, লাইভ নিউজ আপডেট, সবাতোকৈ বিশ্বাসযোগ্য অসমীয়া নিউজ ৱেবছাইট News18 অসম।\r\nTags: Bihu , jorhat , local18 , Rongali Bihu\r\nFIRST PUBLISHED : MARCH 29, 2024, 7:13 PM IST\r\nক লৈ ব্যস্ত বহুজন। ', '2024-03-30', 8, 53, 63, 63, 'testing_news_image.jpg', ''),
(57, '\"भारत को किसी की सीख की जरूरत नहीं...\" : केजरीवाल की गिरफ्तारी पर दूसरे देशों की टिप्पणी के बाद उपराष्ट्रपति', 'नई दिल्ली : उपराष्ट्रपति जगदीप धनखड़ ने शुक्रवार को जोर देकर कहा कि, भारत एक अद्वितीय लोकतंत्र है, देश को कानून के शासन केस बारे में किसी से सबक लेने की जरूरत नहीं है. उनकी यह टिप्पणी जर्मनी, अमेरिका और संयुक्त राष्ट्र (UN) की ओर से दिल्ली के मुख्यमंत्री अरविंद केजरीवाल की गिरफ्तारी पर दिए गए वक्तव्यों के बाद आई है. अमेरिका और संयुक्त राष्ट्र के प्रतिनिधियों से पूछे गए सवालों के बाद टिउपराष्ट्रपति जगदीप धनखड़ ने शुक्रवार को एक कार्यक्रम में कहा कि, \"भारत एक मजबूत न्यायिक प्रणाली वाला लोकतंत्र है. यह किसी भी व्यक्ति या किसी समूह से समझौता नहीं करता है. भारत को कानून के शासन के बारे में किसी से सबक लेने की जरूरत नहीं है.\"\r\n\r\nधनखड़ ने जोर देकर कहा कि, भारत में \"कानून के सामने समानता नया आदर्श है\" और जो लोग सोचते हैं कि वे कानून से परे हैं, उन्हें जवाबदेह ठहराया जा रहा है.प्पणियां शुरू हुईं. यह कांग्रेस के बैंक खातों को फ्रीज करने के बारे में भी थीं. ', '2024-03-30', 8, 54, 64, 64, 'testing_news_image.jpg', ''),
(58, 'दिल्ली-NCR में बदला मौसम की मिजाज, तेज हवा के साथ हल्की बूंदाबांदी', 'दिल्ली-NCR में बदला मौसम की मिजाज, तेज हवा के साथ हल्की बूंदाबांदी\r\n\r\nनई दिल्ली: राष्ट्रीय राजधानी दिल्ली के कई इलाकों में शुक्रवार शाम को मौसम का मिजाज बदल गया. दोपहर को तेज धूप के बाद शाम को अचानक बादल छा गए. दिन खत्म होने के समय से पहले ही अंधेरा सा छा गया. साथ ही तेज हवाओं के साथ कई जगहों पर बूंदाबांदी की भी खबर है. मौसम विभाग ने इससे पहले अलीगढ़, बागपत, बुलन्दशहर, मध्य दिल्ली, पूर्वी दिल्ली, फ़रीदाबाद, गौतम बुद्ध नगर, ग्रेटर नोएडा, गाजियाबाद, गुड़गांव और हापुड में कई स्थानों पर लगभग 30-50 किमी प्रति घंटे की रफ्तार से तेज़ हवाओं के साथ हल्की से मध्यम बारिश और गरज के साथ बौछारें पड़ने की संभावना जताई थी.', '2024-03-30', 8, 55, 65, 65, 'testing_news_image.jpg', ''),
(61, 'Breakthrough Battery Tech Promises Faster Charging, Longer Range for Electric Vehicles', 'Researchers at a leading university have unveiled a revolutionary new battery technology that significantly reduces charging times and extends the range of electric vehicles. This advancement could be a game-changer for the EV industry, addressing a major barrier to widespread adoption.', '2024-05-07', 4, 58, 68, 68, 'testing_news_image.jpg', ''),
(62, 'Landmark Agreement Reached in Decades-Long Space Race Dispute', 'After years of tension, two major spacefaring nations have reached a landmark agreement outlining protocols for responsible exploration and resource utilization on celestial bodies. This pact aims to foster collaboration and prevent conflict in the final frontier.After years of tension, two major spacefaring nations have reached a landmark agreement outlining protocols for responsible exploration and resource utilization on celestial bodies. This pact aims to foster collaboration and prevent conflict in the final frontier.After years of tension, two major spacefaring nations have reached a landmark agreement outlining protocols for responsible exploration and resource utilization on celestial bodies. This pact aims to foster collaboration and prevent conflict in the final frontier.After years of tension, two major spacefaring nations have reached a landmark agreement outlining protocols for responsible exploration and resource utilization on celestial bodies. This pact aims to foster collaboration and prevent conflict in the final frontier.', '2024-05-17', 4, 59, 69, 69, 'testing_news_image.jpg', ''),
(63, 'Sunken City Surfaces off Greek Coast', ' Archaeologists have made a remarkable discovery - a remarkably well-preserved underwater city nestled off the coast of Greece. Initial analysis suggests the city dates back to the classical era, with some speculating it could be the lost city of Atlantis or a previously unknown civilization. This find promises to rewrite our understanding of ancient history and maritime trade routes.  Further exploration and excavation efforts are underway to unlock the secrets of this submerged metropolis. Archaeologists have made a remarkable discovery - a remarkably well-preserved underwater city nestled off the coast of Greece. Initial analysis suggests the city dates back to the classical era, with some speculating it could be the lost city of Atlantis or a previously unknown civilization. This find promises to rewrite our understanding of ancient history and maritime trade routes.  Further exploration and excavation efforts are underway to unlock the secrets of this submerged metropolis. Archaeologists have made a remarkable discovery - a remarkably well-preserved underwater city nestled off the coast of Greece. Initial analysis suggests the city dates back to the classical era, with some speculating it could be the lost city of Atlantis or a previously unknown civilization. This find promises to rewrite our understanding of ancient history and maritime trade routes.  Further exploration and excavation efforts are underway to unlock the secrets of this submerged metropolis', '2024-05-16', 4, 60, 70, 70, 'testing_news_image.jpg', ''),
(64, 'AI Makes a Splash in the Art World', 'An artificial intelligence program developed by a team at MIT has sent shockwaves through the art world, winning the prestigious AIVA (Artificial Intelligence Visual Arts) competition.  The program\'s winning entry, a hauntingly beautiful sculpture generated through complex algorithms, has sparked a fierce debate about the nature of creativity and the role of AI in artistic expression.  While some celebrate this achievement as a testament to the evolving capabilities of AI, others worry about the potential impact on the role of human artists in the creative landscape.An artificial intelligence program developed by a team at MIT has sent shockwaves through the art world, winning the prestigious AIVA (Artificial Intelligence Visual Arts) competition.  The program\'s winning entry, a hauntingly beautiful sculpture generated through complex algorithms, has sparked a fierce debate about the nature of creativity and the role of AI in artistic expression.  While some celebrate this achievement as a testament to the evolving capabilities of AI, others worry about the potential impact on the role of human artists in the creative landscape', '2024-05-17', 4, 61, 71, 71, 'testing_news_image.jpg', ''),
(65, 'UBI Experiment Yields Positive Results', 'A pilot program testing a Universal Basic Income (UBI) in Helsinki, Finland has shown promising results.  Participants receiving a monthly stipend reported significant improvements in mental and physical health, with many pursuing further education or starting small businesses. The success of this program has renewed global discussions about UBI as a potential solution to poverty and economic inequality. While further research is necessary, the findings suggest UBI could be a powerful tool for empowering individuals and fostering economic growth.A pilot program testing a Universal Basic Income (UBI) in Helsinki, Finland has shown promising results.  Participants receiving a monthly stipend reported significant improvements in mental and physical health, with many pursuing further education or starting small businesses. The success of this program has renewed global discussions about UBI as a potential solution to poverty and economic inequality. While further research is necessary, the findings suggest UBI could be a powerful tool for empowering individuals and fostering economic growth', '2024-05-17', 4, 62, 72, 72, 'testing_news_image.jpg', ''),
(66, 'Tigers on the Prowl: A Conservation Success Story', ' Years of dedicated conservation efforts in India have yielded a significant increase in the endangered tiger population.  The creation of a wildlife corridor connecting fragmented tiger habitats has proven to be a success story. Camera traps have documented a doubling of tiger numbers within the protected area, serving as a beacon of hope for other species conservation initiatives. This victory demonstrates the effectiveness of well-designed conservation programs in reversing population decline and protecting biodiversity. Years of dedicated conservation efforts in India have yielded a significant increase in the endangered tiger population.  The creation of a wildlife corridor connecting fragmented tiger habitats has proven to be a success story. Camera traps have documented a doubling of tiger numbers within the protected area, serving as a beacon of hope for other species conservation initiatives. This victory demonstrates the effectiveness of well-designed conservation programs in reversing population decline and protecting biodiversity.', '2024-05-17', 4, 63, 73, 73, 'testing_news_image.jpg', ''),
(67, 'Vertical Farms Sprout Up in Urban Jungles', 'Sustainable vertical farming techniques are gaining traction in major cities around the world.  These innovative indoor farms utilize stacked growing systems and hydroponics to maximize food production while minimizing land use and environmental impact. Vertical farming offers a promising solution for feeding growing urban populations and promoting sustainable agriculture in space-constrained environments.  As the technology matures and production scales up, vertical farms have the potential to revolutionize urban agriculture and contribute to a more sustainable food system.Sustainable vertical farming techniques are gaining traction in major cities around the world.  These innovative indoor farms utilize stacked growing systems and hydroponics to maximize food production while minimizing land use and environmental impact. Vertical farming offers a promising solution for feeding growing urban populations and promoting sustainable agriculture in space-constrained environments.  As the technology matures and production scales up, vertical farms have the potential to revolutionize urban agriculture and contribute to a more sustainable food system.', '2024-05-17', 4, 64, 74, 74, 'testing_news_image.jpg', ''),
(68, 'Citizen Scientists Spot a Starry Surprise', 'A team of amateur astronomers utilizing the online platform \"Planet Hunters\" has stumbled upon a potential new planet orbiting a distant star.  The team noticed a slight dimming of the star\'s light at regular intervals, which could be indicative of a planet passing in front of it. This exciting discovery highlights the valuable contributions citizen scientists can make to astronomical research. Further observation by professional astronomers is needed to confirm the existence of this potential new world.A team of amateur astronomers utilizing the online platform \"Planet Hunters\" has stumbled upon a potential new planet orbiting a distant star.  The team noticed a slight dimming of the star\'s light at regular intervals, which could be indicative of a planet passing in front of it. This exciting discovery highlights the valuable contributions citizen scientists can make to astronomical research. Further observation by professional astronomers is needed to confirm the existence of this potential new world.', '2024-05-17', 4, 65, 75, 75, 'testing_news_image.jpg', ''),
(69, 'শিক্ষা ক্ষেত্ৰত নতুন পদক্ষেপ, ডিজিটেল শিক্ষা অভিযান আৰম্ভ', 'শিক্ষা বিভাগে এক নতুন পদক্ষেপ গ্ৰহণ কৰা হৈছে। অসমৰ শিক্ষা বিভাগে ডিজিটেল শিক্ষা অভিযান আৰম্ভ কৰিছে। এই অভিযানৰ মূল উদ্দেশ্য হৈছে, সকলো শিক্ষাৰ্থীক ডিজিটেল মাধ্যমৰ জড়িয়তে শিক্ষাৰ সুযোগ প্ৰদান কৰা। ই-লাৰ্নিং প্লাটফৰ্ম আৰু অনলাইন ক্লাছৰ জৰিয়তে শিক্ষাৰ্থীসশিক্ষা বিভাগে এক নতুন পদক্ষেপ গ্ৰহণ কৰা হৈছে। অসমৰ শিক্ষা বিভাগে ডিজিটেল শিক্ষা অভিযান আৰম্ভ কৰিছে। এই অভিযানৰ মূল উদ্দেশ্য হৈছে, সকলো শিক্ষাৰ্থীক ডিজিটেল মাধ্যমৰ জড়িয়তে শিক্ষাৰ সুযোগ প্ৰদান কৰা। ই-লাৰ্নিং প্লাটফৰ্ম আৰু অনলাইন ক্লাছৰ জৰিয়তে শিক্ষাৰ্থীসকলে নিজা নিজা ঘৰৰ পৰা শিক্ষাৰ সুবিধা লাভ কৰিব পাৰিব। এই পদক্ষেপৰ বাবে ৰাজ্যৰ প্ৰতিখন বিদ্যালয়ত ইন্টারনেট সুবিধা আৰু কম্পিউটাৰ প্রদান কৰা হৈছে। মুখ্যমন্ত্ৰী হিমন্ত বিশ্ব শৰ্মাই এই অভিযানৰ উদ্বোধন কৰে। ই-লাৰ্নিং প্লাটফৰ্মত বিভিন্ন বিষয়ৰ পাঠ্যসূচী উপলব্ধ হব। শিক্ষা মন্ত্ৰী ৰনোজ পেগুৱে কয়, \"এই পদক্ষেপ শিক্ষাৰ্থীসকলৰ ভবিষ্যত গঢ়ি তুলিব।\"\r\nকলে নিজা নিজা ঘৰৰ পৰা শিক্ষাৰ সুবিধা লাভ কৰিব পাৰিব। এই পদক্ষেপৰ বাবে ৰাজ্যৰ প্ৰতিখন বিদ্যালয়ত ইন্টারনেট সুবিধা আৰু কম্পিউটাৰ প্রদান কৰা হৈছে। মুখ্যমন্ত্ৰী হিমন্ত বিশ্ব শৰ্মাই এই অভিযানৰ উদ্বোধন কৰে। ই-লাৰ্নিং প্লাটফৰ্মত বিভিন্ন বিষয়ৰ পাঠ্যসূচী উপলব্ধ হব। শিক্ষা মন্ত্ৰী ৰনোজ পেগুৱে কয়, \"এই পদক্ষেপ শিক্ষাৰ্থীসকলৰ ভবিষ্যত গঢ়ি তুলিব।\"\r\n', '2024-05-17', 3, 66, 76, 76, 'testing_news_image.jpg', ''),
(70, 'কৃষি বিভাগত নতুন যান্ত্ৰিকীকৰণ, উলহমা প্ৰকাশ কৃষকসকলৰ', 'কৃষি বিভাগে নতুন যান্ত্ৰিকীকৰণৰ ঘোষণা কৰিছে। এই পদক্ষেপৰ অধীনত কৃষিকৰ্মত নতুন নতুন যন্ত্ৰ ব্যৱহাৰ কৰা হব। এই যন্ত্ৰসমূহ কৃষকসকলৰ কাৰ্যসাধন সহজ কৰিব। চৰকাৰে ১০০০ টা নতুন ট্ৰাক্টৰ বিতৰণ কৰিছে। কৃষি মন্ত্ৰী অতুল বৰাই কয়, \"এই পদক্ষেপৰ জৰিয়তে অসমৰ কৃষকসকলৰ উৎপাদন বৃদ্ধি পাব।\" কৃষকসকলে এই পদক্ষেপক উলহমা প্ৰকাশ কৰিছে। নৱীন যন্ত্ৰসমূহৰ সহায়ত ভূমি খনন আৰু বীজ সাৰিব সহজ হব। কৃষকসকলে বিশেষ ভাৰ পৰিশোধৰ সুবিধাও লাভ কৰিব।\r\nকৃষি বিভাগে নতুন যান্ত্ৰিকীকৰণৰ ঘোষণা কৰিছে। এই পদক্ষেপৰ অধীনত কৃষিকৰ্মত নতুন নতুন যন্ত্ৰ ব্যৱহাৰ কৰা হব। এই যন্ত্ৰসমূহ কৃষকসকলৰ কাৰ্যসাধন সহজ কৰিব। চৰকাৰে ১০০০ টা নতুন ট্ৰাক্টৰ বিতৰণ কৰিছে। কৃষি মন্ত্ৰী অতুল বৰাই কয়, \"এই পদক্ষেপৰ জৰিয়তে অসমৰ কৃষকসকলৰ উৎপাদন বৃদ্ধি পাব।\" কৃষকসকলে এই পদক্ষেপক উলহমা প্ৰকাশ কৰিছে। নৱীন যন্ত্ৰসমূহৰ সহায়ত ভূমি খনন আৰু বীজ সাৰিব সহজ হব। কৃষকসকলে বিশেষ ভাৰ পৰিশোধৰ সুবিধাও লাভ কৰিব।\r\n', '2024-05-15', 3, 67, 77, 77, 'testing_news_image.jpg', ''),
(71, 'অসমৰ সেউজ পথৰ উন্নতিৰ উদ্যোগ, বৰ্ণনীয় প্ৰকল্পৰ শুভাৰম্ভ', 'ৰাজ্যৰ সেউজ পথৰ উন্নতিৰ বাবে এক নতুন প্ৰকল্প আৰম্ভ কৰা হৈছে। এই প্ৰকল্পৰ অধীনত ৫০০ টা নতুন বৃক্ষ ৰোপণ কৰা হব। পৰিৱেশ মন্ত্ৰী পৰিমল শুক্লবৈদ্যই কয়, \"এই পদক্ষেপ পৰিৱেশৰ সুৰক্ষাৰ বাবে অত্যন্ত প্ৰয়োজনীয়।\" এই পদক্ষেপৰ বাবে ৰাজ্যৰ ১০ খন জেলাত বৃক্ষ ৰোপণ কৰা হব। এই পদক্ষেপৰ জৰিয়তে পৰিৱেশৰ উন্নতি হব বুলি আশা প্ৰকাশ কৰিছে।ৰাজ্যৰ সেউজ পথৰ উন্নতিৰ বাবে এক নতুন প্ৰকল্প আৰম্ভ কৰা হৈছে। এই প্ৰকল্পৰ অধীনত ৫০০ টা নতুন বৃক্ষ ৰোপণ কৰা হব। পৰিৱেশ মন্ত্ৰী পৰিমল শুক্লবৈদ্যই কয়, \"এই পদক্ষেপ পৰিৱেশৰ সুৰক্ষাৰ বাবে অত্যন্ত প্ৰয়োজনীয়।\" এই পদক্ষেপৰ বাবে ৰাজ্যৰ ১০ খন জেলাত বৃক্ষ ৰোপণ কৰা হব। এই পদক্ষেপৰ জৰিয়তে পৰিৱেশৰ উন্নতি হব বুলি আশা প্ৰকাশ কৰিছে।\r\n', '2024-05-16', 3, 68, 78, 78, 'testing_news_image.jpg', ''),
(72, 'অৰ্থনীতিৰ উন্নতিৰ বাবে নতুন উদ্যোগ, শিল্প স্থাপনৰ প্ৰস্তাৱনা', 'অৰ্থনীতিৰ উন্নতিৰ বাবে ৰাজ্য চৰকাৰে নতুন উদ্যোগ গ্ৰহণ কৰিছে। ৰাজ্যৰ বিভিন্ন জেলাত শিল্প স্থাপনৰ প্ৰস্তাৱনা আগবঢ়োৱা হৈছে। এই পদক্ষেপৰ অধীনত ১০০০ টা নতুন উদ্যোগ স্থাপন কৰা হব। অৰ্থ মন্ত্ৰী অজন্তা নেওগে কয়, \"এই পদক্ষেপৰ জৰিয়তে ৰাজ্যৰ অৰ্থনীতিৰ বঢ়োত্ৰি হব।\" উদ্যোগৰ স্থাপনৰ বাবে বিশেষ ভাৰ পৰিশোধৰ সুবিধা প্ৰদান কৰা হব। অৰ্থনীতিৰ উন্নতিৰ বাবে ৰাজ্য চৰকাৰে নতুন উদ্যোগ গ্ৰহণ কৰিছে। ৰাজ্যৰ বিভিন্ন জেলাত শিল্প স্থাপনৰ প্ৰস্তাৱনা আগবঢ়োৱা হৈছে। এই পদক্ষেপৰ অধীনত ১০০০ টা নতুন উদ্যোগ স্থাপন কৰা হব। অৰ্থ মন্ত্ৰী অজন্তা নেওগে কয়, \"এই পদক্ষেপৰ জৰিয়তে ৰাজ্যৰ অৰ্থনীতিৰ বঢ়োত্ৰি হব।\" উদ্যোগৰ স্থাপনৰ বাবে বিশেষ ভাৰ পৰিশোধৰ সুবিধা প্ৰদান কৰা হব। অৰ্থনীতিৰ উন্নতিৰ বাবে ৰাজ্য চৰকাৰে নতুন উদ্যোগ গ্ৰহণ কৰিছে। ৰাজ্যৰ বিভিন্ন জেলাত শিল্প স্থাপনৰ প্ৰস্তাৱনা আগবঢ়োৱা হৈছে। এই পদক্ষেপৰ অধীনত ১০০০ টা নতুন উদ্যোগ স্থাপন কৰা হব। অৰ্থ মন্ত্ৰী অজন্তা নেওগে কয়, \"এই পদক্ষেপৰ জৰিয়তে ৰাজ্যৰ অৰ্থনীতিৰ বঢ়োত্ৰি হব।\" উদ্যোগৰ স্থাপনৰ বাবে বিশেষ ভাৰ পৰিশোধৰ সুবিধা প্ৰদান কৰা হব।\r\n\r\n\r\n', '2024-05-16', 3, 69, 79, 79, 'testing_news_image.jpg', ''),
(73, 'ক্ৰীড়া ক্ষেত্ৰত নতুন পদক্ষেপ, খেলুৱৈৰ উন্নতিৰ বাবে উদ্যোগ', 'ক্ৰীড়া ক্ষেত্ৰত এক নতুন পদক্ষেপ গ্ৰহণ কৰা হৈছে। ৰাজ্য চৰকাৰে খেলুৱৈৰ উন্নতিৰ বাবে নতুন উদ্যোগ গ্ৰহণ কৰিছে। এই পদক্ষেপৰ অধীনত ১০০ টা নতুন ক্ৰীড়া কেন্দ্ৰ স্থাপন কৰা হব। ক্ৰীড়া মন্ত্ৰী বিমল বৰাই কয়, \"এই পদক্ষেপৰ জৰিয়তে খেলুৱৈসকলৰ উন্নতি হব।\"\r\nক্ৰীড়া ক্ষেত্ৰত এক নতুন পদক্ষেপ গ্ৰহণ কৰা হৈছে। ৰাজ্য চৰকাৰে খেলুৱৈৰ উন্নতিৰ বাবে নতুন উদ্যোগ গ্ৰহণ কৰিছে। এই পদক্ষেপৰ অধীনত ১০০ টা নতুন ক্ৰীড়া কেন্দ্ৰ স্থাপন কৰা হব। ক্ৰীড়া মন্ত্ৰী বিমল বৰাই কয়, \"এই পদক্ষেপৰ জৰিয়তে খেলুৱৈসকলৰ উন্নতি হব।\" ক্ৰীড়া ক্ষেত্ৰত এক নতুন পদক্ষেপ গ্ৰহণ কৰা হৈছে। ৰাজ্য চৰকাৰে খেলুৱৈৰ উন্নতিৰ বাবে নতুন উদ্যোগ গ্ৰহণ কৰিছে। এই পদক্ষেপৰ অধীনত ১০০ টা নতুন ক্ৰীড়া কেন্দ্ৰ স্থাপন কৰা হব। ক্ৰীড়া মন্ত্ৰী বিমল বৰাই কয়, \"এই পদক্ষেপৰ জৰিয়তে খেলুৱৈসকলৰ উন্নতি হব।\"\r\n', '2024-05-15', 3, 70, 80, 80, 'testing_news_image.jpg', ''),
(74, 'शिक्षा क्षेत्र में नई पहल, डिजिटल शिक्षा अभियान की शुरुआत', 'शिक्षा विभाग ने एक नई पहल की घोषणा की है। असम का शिक्षा विभाग डिजिटल शिक्षा अभियान शुरू कर रहा है। इस अभियान का मुख्य उद्देश्य सभी छात्रों को डिजिटल माध्यम से शिक्षा का अवसर प्रदान करना है। ई-लर्निंग प्लेटफॉर्म और ऑनलाइन कक्षाओं के माध्यम से छात्र अपने घर से ही शिक्षा प्राप्त कर सकेंगे। इस पहल के लिए राज्य के प्रत्येक स्कूल में इंटरनेट सुविधा और कंप्यूटर उपलब्ध कराए जाएंगे। मुख्यमंत्री हिमंत बिस्वा सरमा ने इस अभियान का उद्घाटन किया। शिक्षा मंत्री रनोझ पेगू ने कहा, \"यह पहल छात्रों के भविष्य को आकार देने में सहायक होगी।\"\r\n', '2024-05-08', 3, 71, 81, 81, 'testing_news_image.jpg', ''),
(75, 'कृषि क्षेत्र में नई यंत्रीकरण, किसानों में उत्साह', 'कृषि विभाग ने नए यंत्रीकरण की घोषणा की है। इस पहल के तहत कृषि कार्यों में नए-नए यंत्रों का उपयोग किया जाएगा। इन यंत्रों से किसानों के कार्यों में सुविधा होगी। सरकार ने 1000 नए ट्रैक्टर वितरित किए हैं। कृषि मंत्री अतुल बरा ने कहा, \"इस पहल से असम के किसानों की उत्पादन क्षमता बढ़ेगी।\" किसानों ने इस पहल का स्वागत किया है। नए यंत्रों की मदद से भूमि की जुताई और बीज बोना आसान हो जाएगा। किसानों को विशेष अनुदान की सुविधा भी मिलेगी। कृषि विभाग ने नए यंत्रीकरण की घोषणा की है। इस पहल के तहत कृषि कार्यों में नए-नए यंत्रों का उपयोग किया जाएगा। इन यंत्रों से किसानों के कार्यों में सुविधा होगी। सरकार ने 1000 नए ट्रैक्टर वितरित किए हैं। कृषि मंत्री अतुल बरा ने कहा, \"इस पहल से असम के किसानों की उत्पादन क्षमता बढ़ेगी।\" किसानों ने इस पहल का स्वागत किया है। नए यंत्रों की मदद से भूमि की जुताई और बीज बोना आसान हो जाएगा। किसानों को विशेष अनुदान की सुविधा भी मिलेगी।\r\n\r\n\r\n\r\n', '2024-05-17', 3, 72, 82, 82, 'testing_news_image.jpg', ''),
(77, 'आर्थिक विकास के लिए नई पहल, उद्योग स्थापना का प्रस्ताव', 'आर्थिक विकास के लिए राज्य सरकार ने नई पहल की घोषणा की है। राज्य के विभिन्न जिलों में उद्योग स्थापना का प्रस्ताव प्रस्तुत किया गया है। इस पहल के तहत 1000 नए उद्योग स्थापित किए जाएंगे। वित्त मंत्री अजंता नेओग ने कहा, \"इस कदम से राज्य की आर्थिक वृद्धि होगी।\" उद्योग स्थापना के लिए विशेष अनुदान की सुविधा प्रदान की जाएगी।आर्थिक विकास के लिए राज्य सरकार ने नई पहल की घोषणा की है। राज्य के विभिन्न जिलों में उद्योग स्थापना का प्रस्ताव प्रस्तुत किया गया है। इस पहल के तहत 1000 नए उद्योग स्थापित किए जाएंगे। वित्त मंत्री अजंता नेओग ने कहा, \"इस कदम से राज्य की आर्थिक वृद्धि होगी।\" उद्योग स्थापना के लिए विशेष अनुदान की सुविधा प्रदान की जाएगी।\r\n\r\n', '2024-05-14', 3, 74, 84, 84, 'testing_news_image.jpg', ''),
(78, 'स्वास्थ्य क्षेत्र में नई पहल, मुफ्त चिकित्सा सेवा का लाभ', 'स्वास्थ्य क्षेत्र में एक नई पहल की घोषणा की गई है। राज्य सरकार ने मुफ्त चिकित्सा सेवा की घोषणा की है। इस पहल के तहत 500 नए चिकित्सा केंद्र स्थापित किए जाएंगे। स्वास्थ्य मंत्री केशव महंत ने कहा, \"इस कदम से गांवों और बस्तियों में चिकित्सा सुविधा उपलब्ध होगी।\" मुफ्त चिकित्सा सेवा के लिए विशेष अनुदान की सुविधा प्रदान की जाएगी।स्वास्थ्य क्षेत्र में एक नई पहल की घोषणा की गई है। राज्य सरकार ने मुफ्त चिकित्सा सेवा की घोषणा की है। इस पहल के तहत 500 नए चिकित्सा केंद्र स्थापित किए जाएंगे। स्वास्थ्य मंत्री केशव महंत ने कहा, \"इस कदम से गांवों और बस्तियों में चिकित्सा सुविधा उपलब्ध होगी।\" मुफ्त चिकित्सा सेवा के लिए विशेष अनुदान की सुविधा प्रदान की जाएगी।\r\n\r\n', '2024-05-13', 3, 75, 85, 85, 'testing_news_image.jpg', ''),
(81, 'Vertical Farms Sprout Up in Urban Jungles', 'Sustainable vertical farming techniques are gaining traction in major cities around the world. These innovative indoor farms utilize stacked growing systems and hydroponics to maximize food production while minimizing land use and environmental impact. Vertical farming offers a promising solution for feeding growing urban populations and promoting sustainable agriculture in space-constrained environments. As the technology matures and production scales up, vertical farms have the potential to revolutionize urban agriculture and contribute to a more sustainable food system.Sustainable vertical farming techniques are gaining traction in major cities around the world. These innovative indoor farms utilize stacked growing systems and hydroponics to maximize food production while minimizing land use and environmental impact. Vertical farming offers a promising solution for feeding growing urban populations and promoting sustainable agriculture in space-constrained environments. As the technology matures and production scales up, vertical farms have the potential to revolutionize urban agriculture and contribute to a more sustainable food system.\r\n', '2024-05-21', 4, 78, 88, 88, 'testing_news_image.jpg', ''),
(82, 'Tigers on the Prowl: A Conservation Success Story', 'Years of dedicated conservation efforts in India have yielded a significant increase in the endangered tiger population. The creation of a wildlife corridor connecting fragmented tiger habitats has proven to be a success story. Camera traps have documented a doubling of tiger numbers within the protected area, serving as a beacon of hope for other species conservation initiatives. This victory demonstrates the effectiveness of well-designed conservation programs in reversing population decline and protecting biodiversity. Years of dedicated conservation efforts in India have yielded a significant increase in the endangered tiger population. The creation of a wildlife corridor connecting fragmented tiger habitats has proven to be a success story. Camera traps have documented a doubling of tiger numbers within the protected area, serving as a beacon of hope for other species conservation initiatives. This victory demonstrates the effectiveness of well-designed conservation programs in reversing population decline and protecting biodiversity.\r\n', '2024-05-21', 4, 79, 89, 89, 'testing_news_image.jpg', ''),
(83, 'AI Makes a Splash in the Art World', 'An artificial intelligence program developed by a team at MIT has sent shockwaves through the art world, winning the prestigious AIVA (Artificial Intelligence Visual Arts) competition. The program\'s winning entry, a hauntingly beautiful sculpture generated through complex algorithms, has sparked a fierce debate about the nature of creativity and the role of AI in artistic expression. While some celebrate this achievement as a testament to the evolving capabilities of AI, others worry about the potential impact on the role of human artists in the creative landscape.An artificial intelligence program developed by a team at MIT has sent shockwaves through the art world, winning the prestigious AIVA (Artificial Intelligence Visual Arts) competition. The program\'s winning entry, a hauntingly beautiful sculpture generated through complex algorithms, has sparked a fierce debate about the nature of creativity and the role of AI in artistic expression. While some celebrate this achievement as a testament to the evolving capabilities of AI, others worry about the potential impact on the role of human artists in the creative landscape\r\n', '2024-05-21', 4, 80, 90, 90, 'testing_news_image.jpg', ''),
(84, 'Sunken City Surfaces off Greek Coast', 'Archaeologists have made a remarkable discovery - a remarkably well-preserved underwater city nestled off the coast of Greece. Initial analysis suggests the city dates back to the classical era, with some speculating it could be the lost city of Atlantis or a previously unknown civilization. This find promises to rewrite our understanding of ancient history and maritime trade routes. Further exploration and excavation efforts are underway to unlock the secrets of this submerged metropolis. Archaeologists have made a remarkable discovery - a remarkably well-preserved underwater city nestled off the coast of Greece. Initial analysis suggests the city dates back to the classical era, with some speculating it could be the lost city of Atlantis or a previously unknown civilization. This find promises to rewrite our understanding of ancient history and maritime trade routes. Further exploration and excavation efforts are underway to unlock the secrets of this submerged metropolis. Archaeologists have made a remarkable discovery - a remarkably well-preserved underwater city nestled off the coast of Greece. Initial analysis suggests the city dates back to the classical era, with some speculating it could be the lost city of Atlantis or a previously unknown civilization. This find promises to rewrite our understanding of ancient history and maritime trade routes. Further exploration and excavation efforts are underway to unlock the secrets of this submerged metropolis\r\n', '2024-05-21', 4, 81, 91, 91, 'testing_news_image.jpg', ''),
(85, 'Landmark Agreement Reached in Decades-Long Space Race Dispute', 'After years of tension, two major spacefaring nations have reached a landmark agreement outlining protocols for responsible exploration and resource utilization on celestial bodies. This pact aims to foster collaboration and prevent conflict in the final frontier.After years of tension, two major spacefaring nations have reached a landmark agreement outlining protocols for responsible exploration and resource utilization on celestial bodies. This pact aims to foster collaboration and prevent conflict in the final frontier.After years of tension, two major spacefaring nations have reached a landmark agreement outlining protocols for responsible exploration and resource utilization on celestial bodies. This pact aims to foster collaboration and prevent conflict in the final frontier.After years of tension, two major spacefaring nations have reached a landmark agreement outlining protocols for responsible exploration and resource utilization on celestial bodies. This pact aims to foster collaboration and prevent conflict in the final frontier.\r\n\r\n', '2024-05-21', 4, 82, 92, 92, 'testing_news_image.jpg', ''),
(86, 'check after long time', 'check after long time to store in github', '2024-11-14', 4, 83, 93, 93, 'testing_news_image.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `category_id` int(30) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`category_id`, `category_name`) VALUES
(18, 'option2'),
(20, 'option2'),
(33, 'Business'),
(35, 'Sports'),
(36, 'Business'),
(37, 'Business'),
(38, 'Sports'),
(40, 'Sports'),
(41, 'default'),
(44, 'Business'),
(45, 'Business'),
(46, 'Business'),
(54, 'Technology'),
(55, 'Technology'),
(57, 'Sports'),
(58, 'Business'),
(59, 'Business'),
(60, 'Business'),
(61, 'Other'),
(62, 'Sports'),
(63, 'Other'),
(64, 'Sports'),
(65, 'Other'),
(66, 'Sports'),
(67, 'Business'),
(68, 'Technology'),
(69, 'Technology'),
(70, 'Other'),
(71, 'Other'),
(72, 'Sports'),
(73, 'Sports'),
(74, 'Business'),
(75, 'Business'),
(76, 'Sports'),
(77, 'Business'),
(78, 'Technology'),
(79, 'Technology'),
(80, 'Technology'),
(81, 'Sports'),
(82, 'Business'),
(83, 'Technology'),
(84, 'Business'),
(85, 'Technology'),
(86, 'Sports'),
(87, 'Sports'),
(88, 'Technology'),
(89, 'Other'),
(90, 'Technology'),
(91, 'Business'),
(92, 'Other'),
(93, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `registration_form`
--

CREATE TABLE `registration_form` (
  `user_id` int(30) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `req_date` date NOT NULL,
  `password` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_form`
--

INSERT INTO `registration_form` (`user_id`, `user_name`, `account_type`, `email`, `req_date`, `password`, `img`) VALUES
(110, 'Pranob Jyoti Bora', 'user', 'pranob45@gmail.com', '2024-05-20', 'pranob45', 'profile_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(30) NOT NULL,
  `test_id` int(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `account_type` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `req_date` date DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `code` int(10) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `test_id`, `user_name`, `account_type`, `email`, `req_date`, `password`, `code`, `img`) VALUES
(4, 0, 'Rijul Ali', 'user', 'girija45@gmail.com', NULL, '24118ea1f5f3c7a917eecda536b5d1a3b02db7e442b1cb890640e84ed160df45', 452848, 'profile_image.jpg'),
(66, 0, 'Rupam Ali', 'user', 'rupamali27@gmail.com', '2024-04-16', '5b02dc365f41b67ffbc88a267ae462b783270e206423ee4d2507ecf0f27ff88e', 0, 'profile_image.jpg'),
(72, 0, 'usercheck', 'user', 'usercheck@gmail.com', '2024-05-13', 'acb80af30ecf164e2f871c96c02582097f462ab79188a17b3b6e8c74985c29e8', 0, 'profile_image.jpg'),
(79, 0, 'bla', 'user', 'bla01@gmail.com', '2024-05-15', '0d260aaade87d4fc44021dd83622494d08d34fc0f536b49c5e9e5ac2f06c8c0f', 0, 'profile_image.jpg'),
(83, 0, 'An no', 'user', 'nan131629@gmail.com', '2024-05-15', '84d5bf0fd93b6da56bb5b8e8721b1d3099f325a0c06bce01c44a7ff8110a55f7', 0, 'profile_image.jpg'),
(86, 0, 'check user', 'user', 'checkuser@gmail.com', '2024-05-16', 'eb06c975c3fb6ce434568088d848b30bd3b0d861f28aa832a1b0d8ff49c9615b', 0, 'profile_image.jpg'),
(87, 0, 'image check', 'user', 'imgcheck@gmail.com', '2024-05-16', '35c3e5ef5673f56c380d93cdd83199fdcbba16508d089e55cdf8af653d52e04a', 0, 'profile_image.jpg'),
(91, 0, 'kratos009', 'user', 'kratos009@gmail.com', '2024-05-17', '9a5f725c5755920e7954ecab27c8e8ce03fc75835ace704747e583012f55990f', 0, 'profile_image.jpg'),
(92, 0, 'kratos010', 'user', 'kratos010@gmail.com', '2024-05-17', '331f9c74d0fd84cd0167672661ec35f76c2b3a39c58975bd1ae5975a20a08f92', 0, 'profile_image.jpg'),
(93, 0, 'checkRegister', 'user', 'checkRegister@gmail.com', '2024-05-17', 'd9bdd7a82be79b1ff10ab43a4f363f08bc5c53c5ca44106d1e70fd24179df08b', 0, 'profile_image.jpg'),
(94, 0, 'test pop up', 'user', 'test@gmail.com', '2024-05-17', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 0, 'profile_image.jpg'),
(95, 0, 'testing', 'user', 'testing@gmail.com', '2024-05-17', 'cf80cd8aed482d5d1527d7dc72fceff84e6326592848447d2dc0b0e87dfc9a90', 0, 'profile_image.jpg'),
(96, 0, 'User70', 'user', 'User70@gmail.com', '2024-05-18', 'e5ce7c363736b492dcd14a4c305fa6c5a55dd1b9eca59ad9f3da03681692f99b', 0, 'profile_image.jpg'),
(108, 0, 'dd', 'user', 'sf@gmail.com', '2024-05-18', 'a31fe9656fc8d3a459e623dc8204e6d0268f8df56d734dac3ca3262edb5db883', 0, 'profile_image.jpg'),
(111, 0, 'Razdip Baruah', 'user', 'razdip69420@gmail.com', '2024-11-14', '0f19fa040a32150adc8bed521616f53085edd32fc50ef02286eeadac91546bbf', 0, 'profile_image.jpg'),
(113, 0, 'Rijul9848', 'user', 'rijul9848@gmail.com', '2024-11-14', '6c41014e7f0acc8d099355ae0d19a71efbf92f4a6c67f94a5712218c91ff7bb4', 415290, 'profile_image.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account2`
--
ALTER TABLE `admin_account2`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id3` (`user_id3`);

--
-- Indexes for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `user_id` (`admin_id`);

--
-- Indexes for table `content_type`
--
ALTER TABLE `content_type`
  ADD PRIMARY KEY (`content_type_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `language_type`
--
ALTER TABLE `language_type`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `content_type_id` (`content_type_id`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `registration_form`
--
ALTER TABLE `registration_form`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account2`
--
ALTER TABLE `admin_account2`
  MODIFY `admin_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `content_type`
--
ALTER TABLE `content_type`
  MODIFY `content_type_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `language_type`
--
ALTER TABLE `language_type`
  MODIFY `language_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `category_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `registration_form`
--
ALTER TABLE `registration_form`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `user_id3` FOREIGN KEY (`user_id3`) REFERENCES `user_account` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
