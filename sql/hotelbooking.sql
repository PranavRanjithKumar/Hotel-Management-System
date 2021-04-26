-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2021 at 05:27 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `hotelid` decimal(10,0) DEFAULT NULL,
  `checkindate` date DEFAULT NULL,
  `checkoutdate` date DEFAULT NULL,
  `rooms_booked` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `b_status` varchar(20) DEFAULT NULL,
  `noofdays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--


--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotelid` decimal(10,0) NOT NULL,
  `hotelname` varchar(30) DEFAULT NULL,
  `hotelphone` decimal(20,0) DEFAULT NULL,
  `hotelmail` varchar(30) DEFAULT NULL,
  `hcity` varchar(10) DEFAULT NULL,
  `hstate` varchar(20) DEFAULT NULL,
  `hpincode` decimal(8,0) DEFAULT NULL,
  `customerrating` decimal(1,0) DEFAULT NULL,
  `stars` decimal(1,0) DEFAULT NULL,
  `description` text,
  `address` text,
  `Totalrooms` int(3) NOT NULL,
  `availablerooms` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotelid`, `hotelname`, `hotelphone`, `hotelmail`, `hcity`, `hstate`, `hpincode`, `customerrating`, `stars`, `description`, `address`, `Totalrooms`, `availablerooms`) VALUES
('1', 'Hotel SRM', '8939999045', 'hotelsrm123@gmail.com', 'Chennai', 'Tamil Nadu', '600003', '3', '3', 'Neat and tidy.Only 5kms from the bus stand with a great parking facilities', 'No.15,Kumarappa st,Periyamet,Chennai', 30, 30),
('2', 'Sarovar Inn Hotel', '8973413488', 'sarovarinn@hotmail.com', 'Chennai', 'Tamil Nadu', '600003', '4', '4', 'Located near airport and bus stand. High quality maintenance ', '166/2 Wall Tax rd, Jutkapuran,George Town,Chennai', 45, 45),
('3', 'Green Tree Hotel', '9488543488', 'greentree552gmail.com', 'Chennai', 'Tamil Nadu', '600017', '5', '4', 'Free wifi. Good maintenance. Nearer to Railway Station.', 'No. 17, N Usman Rd, Panagal Park Market,T.Nagar,Chennai.', 25, 25),
('4', 'Hotel Park Royal', '9361460607', 'parkroyal44@yahoo.com', 'Chennai', 'Tamil Nadu', '600005', '3', '4', 'Near railway station, free wifi and quality food.', 'No.13,Dera Venkatasamy st,Triplicane,Chennai', 30, 30),
('5', 'Ilara Hotels', '8138546758', 'ilarahotels55@gmail.com', 'Chennai', 'Tamil Nadu', '603103', '5', '4', 'Just 2 km from the Bay of Bengal.Great place for relaxation.', '1/13, Old Mahaballipuram Rd,OMR,Chennai', 26, 26),
('6', 'Fortune hotels', '4232441415', 'fortunerooms@yahoo.com', 'Ooty', 'Tamil Nadu', '643001', '5', '4', '2kms from Coonoor,Beautiful mountain view to beat the heat. ', 'Selbourne Rd,Ooty', 18, 18),
('7', 'Club Mahendra Resort', '9443096758', 'clubmahi@gmail.com', 'Ooty', 'Tamil Nadu', '643001', '3', '2', 'Cosy rooms in a polished lodging with tranquil gardens, an international restaurant & a spa.', '29-49, Baikey Road, Off Ettines Road, Near Ooty Race Course, Ooty, Tamil Nadu 643001', 25, 25),
('8', 'Hotel Dharshan', '6382044432', 'hoteldharshan76@gmail.com', 'Ooty', 'Tamil Nadu', '643001', '3', '4', 'Warm rooms in an unpretentious hotel offering free breakfast & parking, plus vegetarian dining.', 'Woodcock Road, near Lake Boat House, Ooty, Tamil Nadu 643001', 19, 19),
('9', 'Green Moon Residency', '9488075020', 'greenmoonooty@gmail.com', 'Ooty', 'Tamil Nadu', '643002', '5', '3', 'Beautifully maintained property. Great to stay with the family in a safe, homely place.', 'Kotagiri Rd, Kil Kodappamund, Ooty, Tamil Nadu 643002', 30, 30),
('10', 'Delightz Inn Resorts', '9655377802', 'delightzinn@hotmail.com', 'Ooty', 'Tamil Nadu', '643001', '4', '3', 'Relaxed lodging offering casual suites & cottages with kitchenettes, free breakfast & a restaurant.', 'Belmonte Terrace, Tiger Hill Road, Melthalayatimund, Ooty, Tamil Nadu 643001', 15, 15),
('11', 'Le Poshe by Sparsa', '4542240514', 'poshesparsa@gmail.com', 'Kodaikanal', 'Tamil Nadu', '624101', '4', '4', 'Set in a collection of 2-storey cottages, this relaxed resort is 2 km from the nearest bus stop, 4 km from Kodaikanal Lake and 7 km from Silver Cascade Falls.', 'No.25, Sivanadi Road, Kodaikanal, Tamil Nadu 624101', 10, 10),
('12', 'Sterling Kodai Lake', '4542242381', 'sterlingresorts@gmail.com', 'Kodaikanal', 'Tamil Nadu', '624101', '2', '3', 'Set near Kodaikanal Lake in the Palani Hills, this relaxed resort is 3 km from Bear Shola Falls and 8 km from Kodaikanal Golf Club.', '44, Gymkhana Road, Lake View, Kodaikanal, Tamil Nadu 624101', 15, 15),
('13', 'HOTEL RAINDROPS', '9865283788', 'raindropsre@gmail.com', 'Kodaikanal', 'Tamil Nadu', '624101', '2', '4', 'Excellent location overall for sightseeing, recreation, dining and getting around', 'Boat House Road Seven Road junction, Kodaikanal, Tamil Nadu 624101', 20, 20),
('14', 'The Carlton', '8489912408', 'thecarlton@gmail.com', 'Kodaikanal', 'Tamil Nadu', '624101', '5', '3', 'Relaxed quarters in an upmarket lakeside hotel with dining & a spa, plus free breakfast & bikes.', 'Lake Rd, Kodaikanal, Tamil Nadu 624101', 25, 25),
('15', 'Hotel JC Grand', '7373737369', 'jcgrand@gmail.com', 'Kodaikanal', 'Tamil Nadu', '624101', '3', '4', 'Beautiful well maintained rooms and wonderful scenery for relaxation.', 'Woodville Rd, opp. Bus stand, Kodaikanal, Tamil Nadu 624101\r\n', 25, 25),
('16', 'Moskva Hotel', '4522348500', 'moskva2gmail.com', 'Madurai', 'Tamil Nadu', '625001', '5', '4', 'This functional hotel on a main thoroughfare is an 11-minute walk from the Meenakshi Amman Temple, 1 km from Madurai Junction train station and 3 km from the Gandhi Memorial Museum.', '57, Tamil Sangam Road, Simmakkal, Madurai Main, Madurai, Tamil Nadu 625001', 50, 50),
('17', 'The Madurai Residency', '4524380000', 'madurairesidency@gmail.com', 'Madurai', 'Tamil Nadu', '625001', '4', '3', 'A 5-minute walk from Madurai Junction railway station, this modern hotel is 12 minutes\' stroll from the Meenakshi Amman Temple complex and 3.8 km from the Gandhi Memorial Museum', '15, West Marret Street, Near Periyar Bus Stand, Madurai, Tamil Nadu 625001', 40, 40),
('18', 'Hotel La Vivanta', '6384446666', 'lavivanta@gmail.com', 'Madurai', 'Tamil Nadu', '625107', '5', '5', 'Good location overall for sightseeing, recreation, dining and getting around', 'Opposite To Mattuthavani Bus Stand, Uthangudi, Tamil Nadu 625107', 25, 25),
('19', 'M3 Boutique Hotel', '9677383745', 'm3boutique@gmail.com', 'Madurai', 'Tamil Nadu', '625020', '2', '3', 'with free wifi and free breakfast', 'No 24 Panagal Road, Shenoy Nagar, Madurai, Tamil Nadu 625020', 25, 25),
('20', 'Hotel Prem Nivas', '4522342532', 'hotelpremnivas@gmail.com', 'Madurai', 'Tamil Nadu', '625001', '5', '3', 'Low-key rooms in a modest hotel with a bar, as well as a restaurant offering temple views.', '102, W Perumal Maistry St, Madurai Main, Madurai, Tamil Nadu 625001', 20, 20),
('21', 'CCR Hotels', '9480054081', 'crrrooms@gmail.com', 'Tirupati', 'Andhra Pradesh', '517501', '2', '3', 'New renovation Hotel, Good Price and also good service', 'Unnamed Road, Tata Nagar, Tirupati, Andhra Pradesh 517501', 45, 45),
('22', 'Fortune Select Grand Ridge', '8773988444', 'fortuneridge@gmail.com', 'Tirupati', 'Andhra Pradesh', '517501', '5', '5', 'Modern quarters & a vegetarian restaurant, plus free breakfast, an outdoor pool & park views.', 'Tiruchanoor Rd, Korramenugunta, Tirupati, Andhra Pradesh 517501', 50, 50),
('23', 'Marasa Sarovar Premiere', '8706660000', 'marasahotels@gmail.com', 'Tirupati', 'Andhra Pradesh', '517507', '5', '4', 'Upscale rooms & suites in a modern hotel offering a vegetarian restaurant, a cafe/bar & a spa.', '12th Cross, Karakambadi Rd, near AGS Company, Upadhyaya Nagar, Tirupati, Andhra Pradesh 517507', 40, 40),
('24', 'Hotel Vihas', '8886601604', 'hotelvihas@gmail.com', 'Tirupati', 'Andhra Pradesh', '517501', '3', '3', 'Nice clean rooms, cozy bed, good cellar parking, it\'s a good place', '#18-8-40/B, LEELA MAHAL CENTRE, Tirumula by pass Road, Tirupati, Andhra Pradesh 517501', 30, 30),
('25', 'ASR Guesthouse', '8772251501', 'asrrooms@gmail.com', 'Tirupati', 'Andhra Pradesh', '517501', '4', '2', 'Utilitarian rooms & suites, some with a/c, in a basic guesthouse offering 24-hour room service', '19 Old Tiruchanoor Rd, Near, Lakshmipuram Circle, Tirupati, Andhra Pradesh 517501', 30, 30),
('26', 'Le Meridien', '4842705777', 'lemeridian@gmail.com', 'Kochi', 'Kerala', '682304', '5', '5', 'Set amid palm-lined grounds on the Kerala backwaters, this upscale hotel occupies a grand, modern building with an annexe. It\'s 7 km from the Hill Palace Museum.', 'Nettoor, Maradu, Kochi, Kerala 682304\r\n', 35, 35),
('27', 'Four Points', '4847160000', 'fourpoints@gmail.com', 'Kochi', 'Kerala', '682042', '5', '4', 'Set in the Kochi Infopark business park, this upmarket hotel is 6 km from Thrikkakara Temple, 8 km from the Wonderla Kochi amusement park and 12 km from Tripunithura railway station.', 'Infopark Kochi Phase 1 Campus Infopark P.O, Kakkanad, Kochi, Kerala 682042', 35, 35),
('28', 'Hotel Abad', '4844148888', 'hotelabad@gmail.com', 'Kochi', 'Kerala', '682005', '3', '2', 'Unfussy hotel offering subdued rooms, plus a restaurant, an outdoor pool & a spa.', 'Moulana Azad Rd, Near Reliance Super Market, Panayappilly, Chullickal, Kochi, Kerala 682005', 28, 28),
('29', 'Keys Select Kochi', '4842382323', 'keysselect@gmail.com', 'Kochi', 'Kerala', '682013', '4', '3', 'Down-to-earth backwaters hotel featuring simple quarters, an exercise room & a cafe.', 'Pandit Karuppan Rd, Behind Folklore Museum, Shanthi Nagar, Kochi, Kerala 682013', 30, 30),
('30', 'Bolgatty Palace', '4842750500', 'bolgatty@gmail.com', 'Kochi', 'Kerala', '682504', '5', '4', 'Waterfront lodging with relaxed dining & a pool, plus cruises, a golf course & Ayurvedic treatments.', 'NH966A, Mulavukad, Kochi, Kerala 682504', 20, 20),
('31', 'Hilton Garden Inn', '4716600000', 'hiltongarden@gmail.com', 'Trivandrum', 'Kerala', '695039', '5', '4', 'Refined, warm quarters in an upmarket hotel offering a casual restaurant, 2 bars & an outdoor pool.', 'Punnen Rd, Statue, Palayam, Thiruvananthapuram, Kerala 695039', 40, 40),
('32', 'Classic Sarovar Portico', '4712335555', 'classicsarovar@gmail.com', 'Trivandrum', 'Kerala', '695001', '3', '3', 'Down-to-earth business hotel featuring a restaurant & a 24-hour cafe, plus a rooftop pool & a gym.', 'Manjalikulam Road, Near, Manjalikulam Ground, Thampanoor, Thiruvananthapuram, Kerala 695001', 35, 35),
('33', 'Hotel Apollo Dimora', '4716665333', 'apollohotel@gmail.com', 'Trivandrum', 'Kerala', '695001', '4', '4', 'In a pair of towers connected by a skybridge, this polished hotel is a 5-minute walk from Thiruvananthapuram Central train station, 1 km from the ornate 1729 Padmanabhaswamy Temple and 3 km from historical exhibits at the Napier Museum.', 'Opp. Central Railway Station, Thampanoor, Thiruvananthapuram, Kerala 695001', 30, 30),
('34', 'The Central Residency', '4716339825', 'centralresidency@gmail.com', 'Trivandrum', 'Kerala', '695014', '2', '3', 'An 11-minute walk from Thiruvananthapuram Central train station, this straightforward hotel is 2 km from the 18th-century Padmanabhaswamy Temple and 3 km from the Thiruvananthapuram Zoo.', 'Manorama Rd, Opposite Malayalam Manorama, Aristo, Thampanoor, Thiruvananthapuram, Kerala 695014', 20, 20),
('35', 'Hotel Samudra', '4712480089', 'hotelsamudhra@gmail.com', 'Trivandrum', 'Kerala', '695527', '5', '3', 'A minute\'s walk from a beach, this relaxed hotel on the shores of the Laccadive Sea is also 1 km from the 17th-century Padmanabhapuram Palace and 9 km from the Hindu Attukal Temple, home of the legendary Attukal Pongala festival.', 'Kovalam, Thiruvananthapuram, Kerala 695527', 30, 30),
('36', 'Aloft New Delhi', '1145650000', 'aloftnew@gmail.com', 'New Delhi', 'New Delhi', '110037', '5', '5', 'In a commercial area, this contemporary hotel is 3 km from Indira Gandhi International Airport and 13 km from the Qutub Minar tower.', '5B, IGI Airport T3 Road, Aerocity, Delhi Aerocity, New Delhi, Delhi 110037', 50, 50),
('37', 'Sheraton New Delhi Hotel', '1142661122', 'sheraton@gmail.com', 'New Delhi', 'New Delhi', '110017', '3', '4', 'Set 1 km from Malviya Nagar metro station, this upscale hotel with a striking 2-storey atrium is also 12 km from Delhi Golf Club and 16 km from Delhi Indira Gandhi International Airport.', 'Saket District Centre, District Centre, Sector 6, Saket, New Delhi, Delhi 110017', 50, 50),
('38', 'Hotel Taj Galaxy', '1246201161', 'tajgalaxy@gmail.com', 'Agra', 'Uttar Pradesh', '282001', '5', '3', 'Set 3 km from the Taj Mahal, this modern budget hotel is 5 km from Agra Fort and 8 km from the Tomb of I\'timād-ud-Daulah, an opulent Mughal mausoleum dating from 1622.', '18, B 18 C, Fatehabad Rd, Taj Nagari Phase 1, R.K. Puram Phase-2, Basai Khurd, Tajganj, Agra, Uttar Pradesh 282001', 90, 90),
('39', 'Radisson Hotel Agra', '9862578786', 'radissonagra@gmail.com', 'Agra', 'Uttar Pradesh', '282004', '5', '5', 'Set 3 km from the Taj Mahal, this upscale hotel is also 8 km from the Tomb of I\'timād-ud-Daulah and 13 km from Agra Airport.', 'C-1, C-2, Fatehabad Rd, Taj Nagari Phase 1, R.K. Puram Phase-2, Basai Khurd, Tajganj, Agra, Uttar Pradesh 282004', 85, 85),
('40', 'The Oberoi Amarvilas', '6300500563', 'amarvilas@gmail.com', 'Agra', 'Uttar Pradesh', '282001', '4', '3', 'Set on sprawling, landscaped grounds, this palatial luxury hotel is 1 km from the entrance to the Taj Mahal and 15 km from Pandit Deen Dayal Upadhyay Airport.', 'Taj East Gate Rd, Paktola, Tajganj, Agra, Uttar Pradesh 282001', 40, 40),
('41', 'Courtyard by Marriott', '5627110711', 'marriottagra@gmail.com', 'Agra', 'Uttar Pradesh', '282001', '2', '3', 'This contemporary hotel is 3 km from the iconic Taj Mahal, 6 km from Agra Fort and 16 km from the Tomb of Akbar the Great.', 'Ii, Fatehabad Rd, Taj Nagri Phase 2, Tajganj, Agra, Uttar Pradesh 282001', 45, 45),
('42', 'Crystal Sarovar Premiere', '5628112791', 'crystalsarovar@gmail.com', 'Agra', 'Uttar Pradesh', '282001', '3', '2', 'Set 3 km from the Taj Mahal, this upscale hotel in a sleek building is 4 km from the Agra Fort, a former imperial residence, and 9 km from the Mehtab Bagh gardens.', 'Fatehabad Rd, Near KFC, Tajganj, Agra, Uttar Pradesh 282001', 30, 30),
('43', 'Lemon Tree Premier', '1144232323', 'lemontreedelhi@gmail.com', 'New Delhi', 'New Delhi', '110037', '4', '3', 'Located a 6-minute walk from the metro station, this modern hotel is also 3.1 km from Indira Gandhi International Airport, and 11 km from the 12th-century Qutb Minar tower.', 'Asset No. 6, Aerocity Hospitality District, IGI Airport, Aerocity, New Delhi, Delhi 110037', 35, 35),
('44', 'Hotel Sun International', '9871506050', 'suninter@gmail.com', 'New Delhi', 'New Delhi', '110055', '4', '2', 'Hotel sun international is a nice place to stay in. very neat and clean.', '7875 - 79, Arakashan Road, Paharganj, New Delhi, Delhi 110055', 20, 20),
('45', 'Taj Palace', '1126110202', 'tajpalacedelhi@gmail.com', 'New Delhi', 'New Delhi', '110021', '5', '5', 'Set on over 2 hectares of gardens, this posh hotel is 6 km from the Lodhi Garden and 12 km from the 17th-century fortress, Red Fort. Chanakyapuri train station is 6 minutes away by foot.', '2, Sardar Patel Marg, Diplomatic Enclave, Chanakyapuri, New Delhi, Delhi 110021', 65, 65),
('46', 'Bambolim Beach Resort', '8322459005', 'bambolin@gmail.com', 'Panaji', 'Goa', '403206', '4', '3', 'This seafront hotel, set on Siridao Beach, is 7 km from Panjim, the Goa state capitol, and 14 km from Karmali Railway Station.', 'Goa University Road, Beach, Bambolim, Goa 403206', 30, 30),
('47', 'DoubleTree by Hilton', '8322491900', 'doubletree@gmail.com', 'Panaji', 'Goa', '403006', '3', '5', 'Overlooking the Mandovi River, this upscale hillside hotel is 8 km from Panaji, 10 km from shops and eateries along Miramar Beach and 28 km from Goa International Airport.', 'Kadamba Plateau Panjim, Old Goa Rd, Goa Velha, Goa 403006', 30, 30),
('48', 'The Fern Kadamba', '8322442211', 'kadamba@gmail.com', 'Panaji', 'Goa', '403402', '5', '3', 'In leafy grounds off the NH748 national highway, this relaxed hotel is 12 km from historical exhibits at the Archaeological Museum of Goa and 13 km from Miramar Beach.', 'Kadamba Plateau, Panjim, Old Goa Rd, Goa Velha, Goa 403402', 60, 60),
('49', 'Grand Hyatt', '8326641234', 'grandhyatt@gmail.com', 'Panaji', 'Goa', '403206', '2', '2', 'This high-end hotel with direct access to Bambolim Beach is 7 km from both the Goa State Museum and Our Lady of the Immaculate Conception Church, Goa.', 'P.O Goa University, Road, Bambolim, Goa 403206', 20, 20),
('50', 'Cozy Woods Hill Resort', '9822486827', 'cozywoods@gmail.com', 'Panaji', 'Goa', '403110', '4', '3', 'Awesome beach view. clean and well-maintained rooms.', 'Jose Valadares,5th Lane Behind St John the Baptist Church, Carambolim, Goa 403110', 40, 40),
('51', 'Ginger Mumbai', '2226840333', 'gingermumbai@gmail.com', 'Mumbai', 'Maharashtra', '400069', '5', '4', 'Off the Western Express Highway, this unpretentious budget hotel is a 9-minute walk from Andheri train station and 5 km from the Bombay Convention & Exhibition Centre.', 'Rajashree Sahu Marg, Andheri East, Mumbai, Maharashtra 400069', 60, 60),
('52', 'Courtyard by Marriott', '2261369999', 'courtyardmumbai@gmail.com', 'Mumbai', 'Maharashtra', '400059', '2', '4', 'A 5-minute walk from a metro station, this polished airport hotel in a modern building is 3.9 km from Chhatrapati Shivaji International Airport.', 'Cts 215, Andheri - Kurla Rd, opposite Carnival Cinemas, Andheri East, Mumbai, Maharashtra 400059', 50, 50),
('53', 'Hotel Sea Princess', '2295783158', 'hotelseaprincess@gmail.com', 'Mumbai', 'Maharashtra', '400049', '5', '5', 'Set on Juhu beach, this upscale hotel in a modern, glass-fronted building is 5 km from Chhatrapati Shivaji International Airport and 10 km from Shree Siddhivinayak Ganapati Temple.', 'Juhu Rd, near Juhu Beach, Airport Area, Juhu, Mumbai, Maharashtra 400049', 75, 75),
('54', 'JW Marriott ', '2266933000', 'jwmarriott@gmail.com', 'Mumbai', 'Maharashtra', '400049', '3', '4', 'In a modern, gated property on Juhu Beach, this upscale hotel is 7 km from Chhatrapati Shivaji International Airport Mumbai.', 'Juhu Rd, Juhu Tara, Juhu, Mumbai, Maharashtra 400049', 50, 50),
('55', 'The Regale by Tunga', '2266726672', 'regale@gmail.com', 'Mumbai', 'Maharashtra', '400093', '4', '4', 'This upscale hotel is 5 km from the Nehru Science Centre and 6 km from Chhatrapati Shivaji International Airport', 'Plot No. 31, MIDC Central Rd, Chakala Industrial Area (MIDC), Andheri East, Mumbai, Maharashtra 400093', 45, 45);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomid` decimal(3,0) NOT NULL,
  `hotelid` decimal(10,0) DEFAULT NULL,
  `availablefacilities` text,
  `noofrooms` varchar(10) DEFAULT NULL,
  `accommodation` decimal(2,0) DEFAULT NULL,
  `priceper24hrs` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomid`, `hotelid`, `availablefacilities`, `noofrooms`, `accommodation`, `priceper24hrs`) VALUES
('1', '1', 'Free wifi,Free breakfast,Non AC,Hot Water', '1BHK', '3', '1500.00'),
('2', '2', 'Free wifi,AC,Hot Water', '2BH', '5', '3000.00'),
('3', '3', 'Free wifi,Non AC', '1BH', '3', '1200.00'),
('4', '4', 'Free wifi,Free breakfast,AC,Hot Water', '2BHK', '4', '5000.00'),
('5', '5', 'Free breakfast,AC,Hot Water', '1BHK', '3', '4500.00'),
('6', '6', 'Free wifi,Free breakfast,Room Heater,balcony view,Fridge', '3BHK', '9', '8500.00'),
('7', '7', 'Free wifi,Free breakfast,Room Heater,balcony view', '1BH', '3', '2500.00'),
('8', '8', 'Free wifi,Free breakfast,Room Heater,Hot Water,Fridge', '2BHK', '5', '4500.00'),
('9', '9', 'Free breakfast,Hot Water', '1BH', '3', '2000.00'),
('10', '10', 'Free wifi,Free breakfast,Room heater,Hot Water,Spa', '3BHK', '7', '10000.00'),
('11', '11', 'Free breakfast,Hot Water', '1BH', '3', '900.00'),
('12', '12', 'Free wifi,Free breakfast,Hot Water', '2BH', '5', '1500.00'),
('13', '13', 'Free wifi,Free breakfast,Hot Water', '1BH', '3', '1000.00'),
('14', '14', 'Free wifi,Free breakfast,Room Heater,Hot Water', '3BHK', '9', '7500.00'),
('15', '15', 'Free wifi,Free breakfast,Hot Water', '2BH', '5', '4500.00'),
('16', '16', 'Free wifi,Free breakfast,AC,Hot Water,Spa', '2BHk', '4', '4500.00'),
('17', '17', 'Free wifi,Free breakfast,AC,Hot Water', '2BH', '4', '3500.00'),
('18', '18', 'Free wifi,Free breakfast,AC,Hot Water', '1BHk', '3', '4700.00'),
('19', '19', 'Free wifi,Free breakfast,AC,Hot Water,Spa', '3BHK', '7', '8500.00'),
('20', '20', 'Free wifi,Free breakfast,AC,Hot Water,Spa,Child-friendly', '2BHK', '4', '6500.00'),
('21', '21', 'AC,Hot Water,', '1BH', '3', '2500.00'),
('22', '22', 'Free wifi,Free breakfast,Non AC', '2BHK', '5', '4800.00'),
('23', '23', 'Free wifi,Free breakfast,AC,Hot Water', '2BH', '4', '4600.00'),
('24', '24', 'Free wifi,Free breakfast,AC,Hot Water,Child-Friendly,Temple-View', '2BHK', '5', '6500.00'),
('25', '25', 'Free wifi,Free breakfast,AC,Hot Water,Temple-View', '3BHK', '9', '9500.00'),
('26', '26', 'Free wifi,Free breakfast,AC,Hot Water,Beach-View', '1BHK', '3', '4500.00'),
('27', '27', 'Free wifi,Free breakfast,AC,Hot Water,Spa,Bar,Beach-View', '2BH', '4', '7500.00'),
('28', '28', 'Free wifi,Free breakfast,AC,Hot Water,Spa,Thai Massage,International Bar', '3BH', '7', '11500.00'),
('29', '29', 'Free wifi,Free breakfast,AC,Hot Water,Spa,Child-Friendly', '2BHK', '5', '8500.00'),
('30', '30', 'Free wifi,Free breakfast,AC,Hot Water,Child-Friendly', '3BHK', '9', '9500.00'),
('31', '31', 'Free wifi,Free breakfast,AC,Hot Water,Beach View', '1BH', '3', '2500.00'),
('32', '32', 'Free wifi,AC,Hot Water', '2BH', '4', '3500.00'),
('33', '33', 'Free wifi,Free breakfast,Non AC,Hot Water', '2BH', '4', '3500.00'),
('34', '34', 'Free wifi,Free breakfast,AC,Hot Water,Spa,Bar', '2BH', '4', '4500.00'),
('35', '35', 'Free wifi,Free breakfast,AC,Hot Water,spa,Boat-House', '2BHK', '5', '7500.00'),
('36', '36', 'Free wifi,Free breakfast,Non AC', '2BH', '3', '4500.00'),
('37', '37', 'Free wifi,Free breakfast,Non AC,Spa', '2BHK', '5', '7500.00'),
('38', '38', 'Free wifi,Free breakfast,AC,Hot Water,Cameras for rent,spa', '2BH', '5', '6500.00'),
('39', '39', 'Free wifi,Free breakfast,AC,Hot Water,Taj-Mahal View', '2BH', '5', '4500.00'),
('40', '40', 'Free wifi,Free breakfast,AC', '2BHK', '4', '3500.00'),
('41', '41', 'Free wifi,Free breakfast,AC,Hot Water,Spa,Bar,Cameras for rent', '2BHK', '5', '7500.00'),
('42', '42', 'Free wifi,Free breakfast,Non AC,Hot Water', '1BHK', '3', '3000.00'),
('43', '43', 'Free wifi,Free breakfast,AC,Spa', '2BH', '4', '4500.00'),
('44', '44', 'Free wifi,Free breakfast,AC,Hot Water,Bar', '3BH', '7', '8500.00'),
('45', '45', 'Free wifi,Free breakfast,AC', '1BH', '3', '3500.00'),
('46', '46', 'Free wifi,Free breakfast,AC,Hot Water,Bar,Spa', '2BH', '4', '7500.00'),
('47', '47', 'Free wifi,Free breakfast,AC,Child-Friendly', '3BHK', '6', '7000.00'),
('48', '48', 'Free wifi,Free breakfast,AC,Hot Water,International Bar,Thai Massage,International spa', '3BHK', '6', '12500.00'),
('49', '49', 'Free wifi,Free breakfast,AC,Beach View,Bar', '2BH', '4', '8500.00'),
('50', '50', 'Free wifi,Free breakfast,AC,Hot Water,Beach View,International Bar,Spa', '2BH', '4', '9500.00'),
('51', '51', 'Free wifi,Free breakfast,AC,Hot Water,Child-Friendly,Beach View', '3BHK', '4', '10500.00'),
('52', '52', 'Free wifi,Free breakfast,AC,Balcony', '2BH', '4', '4500.00'),
('53', '53', 'Free wifi,Free breakfast,AC', '2BHK', '5', '4500.00'),
('54', '54', 'Free wifi,Free breakfast,AC', '3BHK', '7', '7500.00'),
('55', '55', 'Free wifi,Free breakfast,AC,Spa', '2BH', '4', '6500.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(14) NOT NULL,
  `UserMail` varchar(25) NOT NULL,
  `UserPhone` decimal(10,0) NOT NULL,
  `City` varchar(15) NOT NULL,
  `State` varchar(15) NOT NULL,
  `PinCode` decimal(7,0) NOT NULL,
  `No_of_bookings_done` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `hotelid` (`hotelid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotelid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomid`),
  ADD KEY `hotelid` (`hotelid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserMail` (`UserMail`),
  ADD UNIQUE KEY `UserPhone` (`UserPhone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`hotelid`) REFERENCES `hotels` (`hotelid`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hotelid`) REFERENCES `hotels` (`hotelid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
