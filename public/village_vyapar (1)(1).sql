-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 10:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `village_vyapar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_password` varchar(25) NOT NULL,
  `a_phone` bigint(12) NOT NULL,
  `a_img` varchar(100) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_name`, `a_email`, `a_password`, `a_phone`, `a_img`) VALUES
(1, 'Jhon Dorsan', 'zeelchauhan123@gmail.com', 'zeel1234', 8460730642, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'Food', '1_food.png'),
(2, 'Medicine', '2_medicine.png'),
(3, 'Handicraft', '3_handicrafts.png'),
(4, 'Feeds', '4_feed.png'),
(5, 'Fertilizer', '5_fertilizer.png'),
(6, 'By Product', '6_product.png'),
(7, 'Seedlings & Seeds', '7_seed.png'),
(8, 'Tools', '8_tools.png'),
(9, 'Pottery', '9_pottery.png');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `m_id` int(10) NOT NULL,
  `to_user` int(10) NOT NULL,
  `from_user` int(10) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`m_id`, `to_user`, `from_user`, `message`, `timestamp`, `status`) VALUES
(1, 2, 1, 'hii zeel what is price of product', '2021-07-01 11:22:19', 1),
(2, 2, 1, 'hello zeel', '2021-07-01 11:59:01', 1),
(3, 1, 2, 'hello ram how are u', '2021-07-01 12:20:10', 1),
(4, 2, 3, 'i have dairy product for business\r\n', '2021-07-01 12:27:34', 1),
(5, 1, 2, 'hii', '2021-07-02 09:14:44', 1),
(8, 1, 1, 's', '2021-07-02 09:47:37', 1),
(10, 3, 2, 'hello dev', '2021-07-02 09:50:01', 1),
(11, 1, 2, 'hi', '2021-07-03 05:23:09', 1),
(12, 2, 7, 'Hello seller', '2021-07-04 05:54:53', 1),
(14, 1, 3, 'Hello seller', '2021-07-11 04:53:26', 1),
(15, 7, 2, 'hello shyam', '2021-07-11 05:34:09', 1),
(16, 7, 2, 'hi', '2021-07-12 13:46:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `c_img` varchar(100) DEFAULT 'simple.png',
  `address` varchar(100) NOT NULL,
  `village` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `pin_code` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `email`, `password`, `phone_no`, `c_img`, `address`, `village`, `district`, `pin_code`) VALUES
(1, 'Ram C', 'ram123@gmail.com', 'Ram123@', 8460730568, 'simple.png', 'bapunagar', 'chandkheda', 'ahmedabad', 382424),
(2, 'Zeel Chauhan', 'zeelchauhan123@gmail.com', 'Zeel123@', 9662892727, '1624959379_download.png', 'Gheekanta', 'Naroda gam', 'Ahmedabad', 380001),
(3, 'dev Chauhan', 'devchauhan@gmail.com', 'Dev123', 9661894226, 'simple.png', 'sola', 'cds', 'ss', 380003),
(7, 'shyam', 'shyam567@gmail.com', 'Shyam567@', 8460760556, '1625375170_shyam.jpg', '568/4 shri krishna apartment , opp.police chowki porbandar', 'mathura gam', 'porbandar', 382428);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `c_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `desc` text NOT NULL,
  `f_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`c_id`, `p_id`, `desc`, `f_date`) VALUES
(2, 1, 'nice pickle', '2021-07-04'),
(2, 2, 'It is Very nice pickle for home', '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `i_id` int(30) NOT NULL,
  `c_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `comp_name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `reply` text NOT NULL,
  `checked` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`i_id`, `c_name`, `email`, `subject`, `comp_name`, `message`, `reply`, `checked`) VALUES
(1, 'ram', 'ram123@gmail.com', 'Add Category', 'TCS', 'i want to add my old mobile phone in your website so can I ????\r\n', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `img_id` int(10) NOT NULL,
  `img_path` text NOT NULL,
  `p_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `p_id` int(11) NOT NULL,
  `plan` text NOT NULL,
  `price` int(11) NOT NULL,
  `days` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`p_id`, `plan`, `price`, `days`) VALUES
(1, 'Basic', 0, 15),
(2, 'Pro', 500, 60),
(3, 'Premium', 1000, 140);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_price` int(8) NOT NULL,
  `p_desc` text NOT NULL,
  `p_date` date NOT NULL,
  `QOH` int(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `subcat_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `total_like` int(1) NOT NULL DEFAULT 0,
  `total_view` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_desc`, `p_date`, `QOH`, `img`, `cat_id`, `subcat_id`, `c_id`, `total_like`, `total_view`) VALUES
(1, 'Lemon pickle', 200, 'The sourness of the lemon spreading throughout the mouth is something you want to have with the sweet curds and white rice. It gives an immense tummy filling satisfaction by the end of the plate! And if you are a \"sour food liking\" person, lime pickles are totally your type of dishes.', '2021-05-21', 10, 'Lemon_pickle.jpg', 1, 1, 1, 3, 26),
(2, 'Carrot pickle', 300, 'Pickle usually gives the idea of spicy side dish along with the main courses. Since carrot is usually sweet or not-so-sweet vegetable, the specialty of carrot pickle lies in the making of it.', '2021-04-01', 10, 'Carrot pickle.jpg', 1, 1, 2, 3, 0),
(3, 'Onion pickle', 250, 'This one is mostly made on a daily basis in the Indian kitchens. Usually, good going along with the main dish normally serves as a salad. The bitter taste of onions along with sourness of lemon, spice of chili powder is a treat to your taste buds.', '2021-04-10', 5, 'Onion pickle.jpg', 1, 1, 2, 0, 2),
(4, 'Garlic pickle', 170, 'Scientifically talking, garlic have good medicinal properties because of a compound called allicin present in them. And garlic pickles have been one of the oldest in times. No wonder our ancestors were very healthy and strong.', '2021-05-14', 15, 'Garlic pickle.jpg', 1, 1, 1, 0, 35),
(5, 'Green chilli pickle', 100, 'Definitely hot and spicy, green chili pickles are a feast to the ones who love spicy food items. They are mostly had along with plain rice or usually with plain blend parathas.', '2021-02-04', 12, 'Green chilli pickle.jpg', 1, 1, 2, 0, 10),
(6, 'Tuna Fish Pickle', 150, 'Tuna Fish Pickle', '2021-05-04', 15, 'Tuna Fish Pickle.jpg', 1, 2, 1, 0, 25),
(7, 'Prawns Pickle', 450, 'Prawns Pickle', '2021-05-15', 15, 'Prawns Pickle.jpg', 1, 2, 2, 0, 0),
(8, 'Mangalore Fish', 600, 'Mangalore Fish', '2021-05-09', 15, 'Mangalore Fish.jpg', 1, 2, 1, 0, 20),
(9, 'Walnut akhrot', 740, 'Walnut Kernels not only add crunch and taste to a dish but they are loaded with nutritional benefits too.', '2021-05-07', 15, 'Walnut akhrot.jpg', 1, 3, 2, 0, 0),
(10, 'Almond badam', 50, 'Almonds Are Naturally Rich In Fibre And Protein, Thus Proving To Be A Very Healthy Snack And Your Friend Indeed, When You are Trying To Maintain Or Lose Weight', '2021-05-14', 15, 'Almond badam.jpg', 1, 3, 1, 0, 0),
(11, 'Raisins kishmish Indian', 840, 'Indian Raisins are obtained by drying grapes in the sun or in mechanical driers, which turns fresh grapes into brown coloured raisins.', '2021-05-26', 15, 'Raisins kishmish Indian.jpg', 1, 3, 1, 0, 0),
(12, 'Cashew kaju Whole', 490, 'Cashews are a kidney-shaped seed sourced from the cashew tree. Cashews provide an excellent source of protein.', '2021-05-21', 15, 'cashewkaju whole.jpg', 1, 3, 2, 0, 4),
(13, 'Kerala Banana Chips', 540, 'This is a Vegetarian product. Home made Kerala Banana Chips, Made from organically grown banana', '2021-05-22', 15, 'Kerala Banana Chips.jpg', 1, 4, 1, 0, 0),
(14, 'Rice Bhujiya', 510, 'This Home Made Rice Bhutia is Vegetarian Product. Your Home Made Rice Bhutia will be shipped fresh to your doorstep directly from the place of origin, Rajshree Foods store at Hyderabad.', '2021-05-22', 15, 'Rice Bhujiya.jpg', 1, 4, 7, 0, 0),
(15, 'Manda Vellam Organic Jaggery', 140, 'Jaggery is unrefined and fully chemical-free sugar. It is prepared from raw sugar cane juice is heated until the liquid content is dry up and transfers a semi-solid stage and poured over a small or big tray and formed into significant size.', '2021-05-18', 15, 'Manda Vellam Organic Jaggery .jpg', 1, 4, 1, 0, 10),
(16, 'Inji Marappa', 450, 'Inji Murappa / Inji Marappa is South Indian traditional and popular candy and made from dry ginger and sugar.', '2021-05-19', 15, 'Inji Marappa.jpg', 1, 4, 7, 0, 0),
(17, 'Pottukadalai Urundai', 90, ' Pottukadalai has different names in Varutta Kadalai, Udacha Kadalai, Porikadalai. Pottukadalai / Roasted gram ball is a traditional South Indian sweet made using jaggery and Bengal Gram is also known as Fried gram Ball.', '2021-05-20', 15, 'Pottukadalai Urundai.jpg', 1, 4, 1, 0, 0),
(18, 'milk', 100, 'cow milk, 100% pure', '2021-05-10', 15, 'milk.jpg', 1, 5, 1, 0, 0),
(19, 'cheese', 90, 'cheese made from cow milk', '2021-06-14', 15, 'cheese.jpg', 1, 5, 1, 0, 0),
(20, 'yogurt', 50, 'yogurt', '2021-02-22', 15, 'yogurt.jpg', 1, 5, 2, 0, 0),
(21, 'ghee', 1500, 'pure ghee of cow milk', '2021-04-01', 15, 'ghee.jpg', 1, 5, 1, 0, 0),
(22, 'Nimesulide', 110, 'Spasliv injection contains pitefenone, fenpiverinium & nimesulide which acts by powerful muscle relaxant action, controls smooth muscles contractions & potentiates the action of antispasmodic drugs and provides the relief from pain and fever respectively.', '2021-04-10', 20, 'Nimesulide.jpg', 2, 6, 2, 9, 0),
(23, 'Effivit Granules', 55, 'Being an eminent organization in the industry, we are involved in manufacturing premium quality Effivit Granules.', '2021-03-25', 5, 'Effivit Granules.jpg', 2, 6, 2, 7, 0),
(24, 'Tamflex-SP', 1000, 'Tamflex-SP Flunixin Meglumine and Serratiopeptidase Bolus, Timru Pharmaceuticals', '2021-02-09', 2, 'Tamflex-SP.jpeg', 2, 6, 1, 1, 2),
(25, 'Nobivac Tricat Trio', 100, 'Active immunisation of cats to reduce clinical signs and virus excretion caused by infection with feline calicivirus and/or feline', '2021-04-08', 14, 'Nobivac Tricat Trio.jpg', 2, 6, 7, 0, 42),
(26, 'Total Plant Care', 550, 'Plantic Total Plant Care 3 in 1, Fungicide, Miticide, Insecticide', '2021-04-05', 58, 'Total Plant Care.jpg', 2, 7, 1, 0, 0),
(27, 'Greenstix', 550, 'For healthy and vibrant growth, plants need sunlight, water, and nutrition to flourish throughout the years. Lazy Gardener GreenStix, All Purpose Plant Food is safe for all houseplants.', '2021-06-16', 65, 'Greenstix.jpg', 2, 7, 1, 0, 0),
(28, 'Pest and Fungus Control', 340, 'Bio Toxin Organic No Need to Add Water Ready Mix Spray with Neem Oil and Karanjia Oil for Pest and Fungus Control (,500 ml)', '2021-05-30', 14, 'Pest and Fungus Control.jpg', 2, 7, 1, 0, 0),
(29, 'Jeevamrut', 190, 'Jeevamrut is a liquid organic manure popularly used as means of organic gardening. It is considered to be an excellent source of natural carbon, biomass, nitrogen, phosphorous potassium and lot of other micro nutrients required for the plants.', '2021-03-14', 75, 'Jeevamrut.jpg', 2, 7, 1, 0, 0),
(30, 'Stone Handicraft Items', 4000, 'Stone Handicraft Items In Bais Godaam', '2021-01-05', 14, 'Stone Handicraft Item.jpg', 3, 8, 1, 0, 0),
(31, 'Madur', 3200, 'Essentially, madur is a mat made by weaving a rhizome-based plant. It was a must at every traditional household, especially in the rural areas.', '2021-02-06', 9, 'Madur.jpg', 3, 8, 1, 0, 0),
(32, 'Designer Pankhi Wooden Key Holder', 3000, 'Here comes an ample choice to decorate your abode, office or any other space of home with designer and magnificent pieces.', '2020-08-14', 5, 'Designer Pankhi Wooden Key Holder.jpg', 3, 8, 2, 0, 0),
(33, 'Gemstone Studded Pure Brass Camel', 5000, 'This handcrafted Rajasthani Camel Cart is made of pure brass with moving wheels. The camel and the wheels are decorated with colourful semi precious gemstone and brass beads.', '2021-04-08', 4, 'Gemstone Studded Pure Brass Camel.jpg', 3, 8, 2, 0, 0),
(34, 'Bamboo Basket With Handle', 200, 'Top quality Stylish, decorative & customized??Bamboo Baskets, while at the same time providing a great customer experience. ', '2021-05-02', 14, 'Bamboo Basket With Handle.jpg', 3, 9, 1, 0, 0),
(35, 'Handcrafted Sleeping Mat for Floor', 120, 'Large Chatai Floor Mats 6x3 Feet,Chatai Floor Mats are completely Handmade, Eco-Friendly, Organic, Biodegradable, Ethnic & Non Toxic. Handmade by local artisans in a facility that exports to global markets.', '2021-05-06', 50, 'Handcrafted Sleeping Mat for Floor.jpg', 3, 9, 1, 0, 0),
(36, 'Natural Areca leaves Plate', 140, 'Natural Areca leaves plate made with palm tree.', '2021-03-21', 20, 'Natural Areca leaves Plate.jpg', 3, 9, 1, 0, 0),
(37, 'Kauna Grass Round Storage Basket', 230, 'The woven baskets use natural products that are environment-friendly and bio-degradable. Carry Your Fresh-Produce, Daily Travel Odd-Ends or Simply Store Your Scarves.', '2021-04-23', 19, 'Kauna Grass Round Storage Basket.jpg', 3, 9, 7, 0, 0),
(38, 'Cotton Seed Oil Cake', 400, 'Cotton Seed Oil Cake Kapasya Khali Cow Feed/Buffalo Feed/Cattle Feed 18Kg', '2021-06-11', 20, 'Cotton Seed Oil Cake.jpg', 4, 10, 1, 1, 0),
(39, 'GSA Feed Mill Feed', 410, 'GSA Feed Mill Cow Feed/Buffalo Feed/Cattle Feed Pellet 18 kg', '2021-04-14', 20, 'GSA Feed Mill Feed.jpg', 4, 10, 1, 0, 0),
(40, 'Platina Organic Feed', 350, 'Platina Organic Goat Feed/Sheep Feed/Cattle Feed Pellet 18 kg', '2021-05-06', 5, 'Platina Organic Feed.jpg', 4, 10, 7, 0, 0),
(41, 'Wheat Bran Feed', 110, 'Wheat Bran for Poultry_Cattle Feed Ideal for Chicken,Cow,Goat,Sheep,Birds 5kg', '2021-05-07', 15, 'Wheat Bran Feed.jpg', 4, 11, 1, 0, 0),
(42, 'GME Feed Crumb', 140, 'GME Feed Crumb Poultry Chicken / Bird Feed', '2021-04-09', 15, 'GME Feed Crumb.jpg', 4, 11, 7, 0, 0),
(43, 'Imported Canary Seed', 90, 'Imported Canary Seed for All Birds (450 Grams)', '2021-05-11', 15, 'Imported Canary Seed.jpg', 4, 11, 1, 0, 0),
(44, 'COW DUNG MANURE', 15000, 'Mukhia Manure is cow’s dung and gau mutra mixture. Mukhia Manure is both a fertilizer and a soil amendment (material added to improve soil). Manure slowly releases nutrients into the soil that plants can easily absorb.', '2021-04-04', 50, 'COW DUNG MANURE.jpg', 5, 12, 1, 0, 0),
(45, 'VeggieDrop', 600, 'Plantic VeggieDrop Micronutrients Liquid Fertilizer For Vegetables (Best Organic Fertilizer For Vegetable Plants) - 250 ml', '2021-02-26', 6, 'VeggieDrop.jpg', 5, 12, 7, 0, 1),
(46, 'Panchagavya', 300, 'Replace your chemical fertilizers and pesticides with a highly effective liquid manure Panchagavya. Panchagavya is an organic growth stimulant that boosts plant production. It improves the quality of fruits and vegetables and provides immunity in plant system.', '2021-04-27', 40, 'Panchagavya.jpg', 5, 12, 1, 0, 0),
(47, 'MYCORRHIZA MYCO-PEP BIOFERTILISERS VAM', 400, 'MYCORRHIZA MYCO-PEP BIOFERTILISERS VAM', '2021-05-25', 80, 'MYCORRHIZA MYCO-PEP BIOFERTILISERS VAM.jpg', 5, 12, 1, 0, 0),
(48, 'Ratanshis Bahaar', 225, 'Ratanshis Bahaar All Purpose Inorganic Fertilizer 100 ml', '2021-01-19', 10, 'Ratanshis Bahaar.jpg', 5, 13, 7, 0, 0),
(49, 'anita Vardan', 52, 'anita Vardan Micronutrient Fertiliser - 100 Ml', '2021-06-16', 19, 'anita Vardan.jpg', 5, 13, 1, 0, 0),
(50, 'Greatindos', 400, 'Greatindos Premium Quality GRADE A NPK 4:18:38 Hydroponic Fertilizer NPK fertilizers are fertilizers that contain the elements nitrogen (N), phosphorus (P), and potassium (K), so you can see how they get the name NPK.', '2021-03-06', 9, 'Greatindos.jpg', 5, 13, 1, 0, 0),
(51, 'Homecrop BioSmart', 199, 'Homecrop BioSmart Indian Ocean Origin Seaweed Concentrate Liquid Plant Fertilizer - 250 ml', '2021-05-04', 28, 'Homecrop BioSmart.jpg', 5, 13, 1, 0, 0),
(52, 'Agarbatti', 50, 'We offer Agarbatti (Incense sticks) that is made of herbal flowers, resins and oils that is procured from the reliable vendors of the industries.', '2021-02-02', 50, 'Agarbatti.jpg', 6, 14, 1, 0, 0),
(53, 'gaudhup', 60, 'Pack of element of life dhoop sticks, dhoopwatti, dhoopone.', '2021-03-10', 40, 'gaudhup.jpg', 6, 14, 1, 0, 0),
(54, 'Dhoopbatti', 100, 'Contain : This pack of Betala Fragrance Cow Dung Gau Dhup Batti Contains 180 g With Stand Holder in Storage Box', '2021-04-06', 25, 'Dhoopbatti.jpg', 6, 14, 1, 0, 0),
(55, 'Gaujharan', 90, 'It is very useful in kaphavataj vikar, viz. cough, asthma, edema, inflammation, tumour, filaria, prameha(diabetes), aamvat (rheumatic disorder), ankylosing spondylitis, osteoarthritis, obesity, sciatica etc.', '2021-05-11', 10, 'Gaujharan.jpg', 6, 15, 1, 0, 0),
(56, 'surbhi gaumuta', 110, 'As per modern scientific researches it contains variety of many useful bio-active substances like essential amino acids, enzymes, proteins, vitamins, hormones and minerals.', '2021-05-11', 4, 'surbhi gaumuta.jpg', 6, 15, 1, 0, 0),
(57, 'Marigold', 90, 'Marigold is one of the most often spotted flowers across the county. It’s also popularly known for its application in religious and medicinal practices.', '2021-06-04', 10, 'Marigold.jpg', 7, 17, 7, 0, 0),
(58, 'Rose', 190, 'The flower species which requires no introduction. Rose is a flower of love, compassion, and gratitude and has several thousands of poems, novels and short stories to its name.', '2021-04-11', 45, 'Rose.jpg', 7, 17, 7, 0, 0),
(59, 'Hibiscus', 120, 'Hibiscus flowers are abruptly denoted as the gorgeous cause of its flourishing and lush full bloom. These flowers are delicate and smooth in nature but yet they propel a sense of fulfillment when in your backyard.', '2021-05-21', 30, 'Hibiscus.jpg', 7, 17, 1, 0, 0),
(60, 'Sunflower', 150, 'Sunflower, the bright yellow flower which is recognized worldwide for its beauty. The flower which follows the sun which also makes it the best suitable plant for summers in India.', '2021-05-11', 40, 'Sunflower.jpg', 7, 17, 7, 0, 0),
(61, 'Tomato', 100, 'Tomato seedlings', '2021-03-12', 10, 'Tomato.jpg', 7, 18, 1, 0, 0),
(62, 'Onion', 95, 'The onion, also known as the bulb onion or common onion, is a vegetable that is the most widely cultivated species of the genus Allium.', '2021-04-18', 22, 'Onion.jpg', 7, 18, 7, 0, 0),
(63, 'Eggplant', 80, 'Eggplant, aubergine or brinjal is a plant species in the nightshade family Solanaceae. 	Solanum melongena is grown worldwide for its edible fruit.', '2021-06-26', 15, 'Eggplant.jpg', 7, 18, 1, 0, 0),
(64, 'Lemon', 89, 'The lemon is a species of small evergreen tree in the flowering plant family Rutaceae, native to South Asia, primarily Northeast India.', '2021-06-30', 15, 'Lemon.jpg', 7, 18, 1, 0, 0),
(65, 'Corn', 90, 'Corn seedling - indian species', '2021-04-23', 60, 'corn.jpg', 7, 19, 1, 0, 0),
(66, 'Apple', 15, 'Apple seedling - indian species', '2021-05-16', 41, 'Apple.jpg', 7, 19, 1, 0, 0),
(67, 'Watermelon', 60, 'Watermelon is a flowering plant species of the Cucurbitaceae family. A scrambling and trailing vine-like plant, it was originally domesticated in Africa.', '2021-03-06', 45, 'Watermelon.jpg', 7, 19, 1, 0, 0),
(68, 'Pear', 79, 'To make the process of germination easier, its better to stratify your pear seeds first. For this purpose, put your seeds into a plastic bag with moist peat moss.', '2021-05-28', 26, 'pear.jpg', 7, 19, 1, 0, 0),
(69, 'Ginger seed', 96, 'We have gained a remarkable position in the market that is involved in offering Ginger Seed.', '2021-04-29', 48, 'ginger seed.jpg', 7, 20, 1, 0, 0),
(70, 'Cumin', 150, 'No Chemical Pesticides, No Chemical Fertilizers, No Artificial Color, Natural Taste', '2021-05-24', 14, 'cumin.jpg', 7, 20, 1, 0, 0),
(71, 'Methi dana', 140, 'We are one of the leading fenugreek seeds companies selling and distributing common fenugreek seed and similar at most affordable prices. Undoubtedly, Fenugreek Seeds taste wonderful and having plenty of health benefits too.', '2021-03-15', 36, 'Methi dana.jpg', 7, 20, 1, 0, 0),
(72, 'Dhaniya', 115, 'Coriander is an annual herb in the family Apiaceae. It is also known as Chinese parsley, dhania or cilantro. All parts of the plant are edible, but the fresh leaves and the dried seeds are the parts most traditionally used in cooking.', '2021-02-17', 84, 'Dhaniya.jpg', 7, 20, 1, 0, 0),
(73, 'Axe', 400, 'An axe is an implement that has been used for millennia to shape, split and cut wood, to harvest timber, as a weapon, and as a ceremonial or heraldic symbol.', '2021-06-01', 17, 'Axe.jpg', 8, 21, 1, 0, 0),
(74, 'Rake', 590, 'A rake is a broom for outside use; a horticultural implement consisting of a toothed bar fixed transversely to a handle, or tines fixed to a handle, and used to collect leaves, hay, grass, etc.', '2021-04-20', 16, 'Rake.png', 8, 21, 1, 0, 0),
(75, 'Shovel', 650, 'A shovel is a tool for digging, lifting, and moving bulk materials, such as soil, coal, gravel, snow, sand, or ore. ', '2021-05-17', 12, 'Shovel.jpg', 8, 21, 1, 0, 0),
(76, 'Pickaxe', 490, 'A pickaxe, pick-axe, or pick is a generally T-shaped hand tool used for prying. Its head is typically metal, attached perpendicularly to a longer handle, traditionally made of wood, occasionally metal, and increasingly fiberglass.', '2021-05-15', 5, 'Pickaxe.jpg', 8, 21, 1, 0, 0),
(77, 'Chainsaw', 2500, 'A chainsaw is a portable gasoline-, electric-, or battery-powered saw that cuts with a set of teeth attached to a rotating chain driven along a guide bar.', '2021-04-25', 10, 'Chainsaw.jpg', 8, 22, 1, 0, 0),
(78, 'Watering can', 150, 'A low pressure and uniform watering tool, suitable for small and mid sized gardens. This can is super handy and its innovative structure helps you keep your garden lush, making your gardening experience enjoyable.', '2021-05-04', 7, 'Watering can.jpg', 8, 22, 1, 0, 0),
(79, 'Hammer', 450, 'hammers are used for general carpentry, framing, nail pulling, cabinet making, assembling furniture, upholstering, finishing, riveting, bending or shaping metal, striking masonry drill and steel chisels, and so on.', '2021-04-26', 9, 'Hammer.jpg', 8, 22, 1, 0, 0),
(80, 'Measure Tap', 90, 'A tape measure or measuring tape is a flexible ruler used to measure size or distance. It consists of a ribbon of cloth, plastic, fibre glass, or metal strip with linear-measurement markings.', '2021-05-11', 4, 'Measure Tap.jpg', 8, 22, 1, 0, 0),
(81, 'White Ceramic Planter', 250, 'Ceramic planters in white that come with a ceramic finish for modern homes. Different geometric shapes of the planters can be teamed together to create a set that can elevate any corner of the house.', '2021-04-14', 2, 'WhiteCeramicPlanter.jpg', 9, 23, 1, 0, 0),
(82, 'flower style planter', 1800, 'The joyful colors creates a young and fresh design. This vessel is perfect for holding the adorable succulent, cactus or air plant of your choice. Great home decor and perfect gift for gardening lovers!!', '2021-06-05', 4, 'flower style planter.jpg', 9, 23, 1, 0, 0),
(83, 'Craftlipi Small Terracotta Planters', 700, 'Each Planter is hand-crafted by a artisans using traditional terracotta material with high quality finish. So each piece is truly a work of art and ecofriendly too for your plant.', '2021-05-20', 3, 'Craftlipi Small Terracotta Planters.jpg', 9, 23, 1, 0, 0),
(84, 'Flower Pot', 650, 'Shabana Art Potteries Earthenware Decorative Uruli (1, Dia 6 inch)', '2021-06-12', 10, 'flower pot.jpg', 9, 24, 1, 0, 0),
(85, 'Blue Pottery Scroll', 999, 'A colfluence of 2 crafts to brighten up your space. Handcrafted tlight holders in Channapatna craft with handpainted votives on parchment leather by Leather Puppetry artisans from Andhra.', '2021-05-21', 8, 'Blue Pottery Scroll.jpg', 9, 24, 1, 0, 0),
(86, 'Aqua rustic ceramic serving bowl', 1750, 'Perfect to serve nibbles, a portion of rice or pretty much anything you want to, the \"Aqua Rustic\" Ceramic Serving Bowl sits well on your table. Pair it with other pieces from the collection to complete the set.', '2021-04-23', 9, 'aqua rustic ceramic serving bowl.jpg', 9, 24, 1, 0, 0),
(87, 'Home Decor Modern Pink Ceramic Candle Holders', 4000, 'A bold design gives this contemporary pillar candle holders a distinct modern allure. Channelise Scandinavian vibes with this modern edg', '2021-06-03', 4, 'Home Decor Modern Pink Ceramic Candle Holders.jpg', 9, 24, 2, 0, 0),
(88, 'Ceramic Jar', 300, 'Say hello to the traditional Indian Ceramic jar which is also referred to as a “burney”. It has been hand-crafted by a rural potter in India to help you store your pickles, chutneys, spices and other condiments.', '2021-03-06', 5, 'Ceramic Jar.jpg', 9, 25, 1, 0, 0),
(89, 'Off-White & Blue Printed Ceramic Plates', 1100, 'VarEeshas \"The Royal Crown\" is a range of ceramic accessories that pays homage to our ancient royalty.', '2021-04-28', 13, 'Off-White & Blue Printed Ceramic Plates.jpg', 9, 25, 1, 0, 0),
(90, 'natural terracotta curd setter', 560, 'Great curd is born in a great container: one that’s alkaline, porous and natural. Hello, terracotta.', '2021-06-02', 24, 'natural terracotta curd setter.jpg', 9, 25, 1, 0, 0),
(91, 'Clay Handi Biryani Pot', 500, 'PRODUCT BENEFITS Clay pots give you all the Phosphorus,Iron,Magnesium and several other Minerals.Clay being alkaline in nature helps in neutralizing the Ph balance of the food by interacting with the acid present in the food.', '2021-04-15', 12, 'Clay Handi Biryani Pot.jpg', 9, 25, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcat_id` int(10) NOT NULL,
  `subcat_name` varchar(100) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcat_id`, `subcat_name`, `cat_id`) VALUES
(1, 'Veg Pickles', 1),
(2, 'Nonveg Pickles', 1),
(3, 'Nuts & Dryfruit', 1),
(4, 'Home Made Snacks', 1),
(5, 'Dairy Products', 1),
(6, 'Animals', 2),
(7, 'Plants', 2),
(8, 'Decorative', 3),
(9, 'HouseHold', 3),
(10, 'Cattle Feed', 4),
(11, 'Bird Feed', 4),
(12, 'Organic', 5),
(13, 'Inorganic', 5),
(14, 'Incense Sticks', 6),
(15, 'Gaujharan', 6),
(16, 'Cowdung', 6),
(17, 'Flowers', 7),
(18, 'Vegetables', 7),
(19, 'Fruits', 7),
(20, 'Spices', 7),
(21, 'Farming tools', 8),
(22, 'General Tools', 8),
(23, 'Garden', 9),
(24, 'Decorative', 9),
(25, 'Kitchen appliance', 9);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `c_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`c_id`, `p_id`) VALUES
(2, 30),
(2, 31),
(2, 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `from_cus` (`from_user`),
  ADD KEY `to_customer` (`to_user`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`c_id`,`p_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`c_id`,`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `i_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `from_cus` FOREIGN KEY (`from_user`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `to_customer` FOREIGN KEY (`to_user`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
