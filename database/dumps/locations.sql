-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Erstellungszeit: 25. Jan 2019 um 06:07
-- Server-Version: 5.7.24
-- PHP-Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `homestead`
--

--
-- Daten für Tabelle `countries`
--

INSERT INTO `countries` (`id`, `iso2`, `name`, `name_long`, `name_local`, `name_english`, `language_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Abchasien', 'Republik Abchasien', 'Aṗsny', 'Abkhazia', NULL, NULL, NULL),
(2, 'AF', 'Afghanistan', 'Islamische Republik Afghanistan', 'Afghānestān', 'Afghanistan', NULL, NULL, NULL),
(3, 'EG', 'Ägypten', 'Arabische Republik Ägypten', 'Misr', 'Egypt', NULL, NULL, NULL),
(4, 'AL', 'Albanien', 'Republik Albanien', 'Shqipëria', 'Albania', NULL, NULL, NULL),
(5, 'DZ', 'Algerien', 'Demokratische Volksrepublik Algerien', 'al-Dschazā\'ir', 'Algeria', NULL, NULL, NULL),
(6, 'AD', 'Andorra', 'Fürstentum Andorra', 'Andorra', 'Andorra', NULL, NULL, NULL),
(7, 'AO', 'Angola', 'Republik Angola', 'Angola', 'Angola', NULL, NULL, NULL),
(8, 'AG', 'Antigua und Barbuda', 'Antigua und Barbuda', 'Antigua and Barbuda', 'Antigua and Barbuda', NULL, NULL, NULL),
(9, 'GQ', 'Äquatorialguinea', 'Republik Äquatorial­guinea', 'Guinea Ecuatorial', 'Equatorial Guinea', NULL, NULL, NULL),
(10, 'AR', 'Argentinien', 'Argentinische Republik', 'Argentina', 'Argentina', NULL, NULL, NULL),
(11, 'AM', 'Armenien', 'Republik Armenien', 'Hayastan', 'Armenia', NULL, NULL, NULL),
(12, NULL, 'Arzach', 'Republik Arzach', 'Arzachi Hanrapetutjun', 'Republic of Artsakh', NULL, NULL, NULL),
(13, 'AZ', 'Aserbaidschan', 'Republik Aserbaidschan', 'Azǝrbaycan', 'Azerbaijan', NULL, NULL, NULL),
(14, 'ET', 'Äthiopien', 'Demokratische Bundesrepublik Äthiopien', 'Ityop\'iya', 'Ethiopia', NULL, NULL, NULL),
(15, 'AU', 'Australien', 'Australien', 'Australia', 'Australia', NULL, NULL, NULL),
(16, 'BS', 'Bahamas', 'Commonwealth der Bahamas', 'Bahamas', 'Bahamas', NULL, NULL, NULL),
(17, 'BH', 'Bahrain', 'Königreich Bahrain', 'al-Bahrayn', 'Bahrain', NULL, NULL, NULL),
(18, 'BD', 'Bangladesch', 'Volksrepublik Bangladesch', 'Bāṃlādeś', 'Bangladesh', NULL, NULL, NULL),
(19, 'BB', 'Barbados', 'Barbados', 'Barbados', 'Barbados', NULL, NULL, NULL),
(20, 'BE', 'Belgien', 'Königreich Belgien', 'België', 'Belgium', NULL, NULL, NULL),
(21, 'BZ', 'Belize', 'Belize', 'Belize', 'Belize', NULL, NULL, NULL),
(22, 'BJ', 'Benin', 'Republik Benin', 'Bénin', 'Benin', NULL, NULL, NULL),
(23, 'BT', 'Bhutan', 'Königreich Bhutan', 'Bhutan', 'Bhutan', NULL, NULL, NULL),
(24, 'BO', 'Bolivien', 'Plurinationaler Staat Bolivien', 'Bolivia', 'Bolivia', NULL, NULL, NULL),
(25, 'BA', 'Bosnien und Herzegowina', 'Bosnien und Herzegowina', 'Bosna i Hercegovina', 'Bosnia and Herzegovina', NULL, NULL, NULL),
(26, 'BW', 'Botswana', 'Republik Botsuana', 'Botswana', 'Botswana', NULL, NULL, NULL),
(27, 'BR', 'Brasilien', 'Föderative Republik Brasilien', 'Brasil', 'Brazil', NULL, NULL, NULL),
(28, 'BN', 'Brunei', 'Brunei Darussalam', 'Negara Brunei Darussalam', 'Brunei Darussalam', NULL, NULL, NULL),
(29, 'BG', 'Bulgarien', 'Republik Bulgarien', 'Bălgarija', 'Bulgaria', NULL, NULL, NULL),
(30, 'BF', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', NULL, NULL, NULL),
(31, 'BI', 'Burundi', 'Republik Burundi', 'Burundi', 'Burundi', NULL, NULL, NULL),
(32, 'CL', 'Chile', 'Republik Chile', 'Chile', 'Chile', NULL, NULL, NULL),
(33, 'TW', 'Republik China', 'Republik China ', '中華民國', 'Taiwan', NULL, NULL, NULL),
(34, 'CN', 'Volksrepublik China', 'Volksrepublik China', '中华人民共和国', 'China', NULL, NULL, NULL),
(35, 'CK', 'Cookinseln', 'Cookinseln', 'Cook Islands', 'Cook Islands', NULL, NULL, NULL),
(36, 'CR', 'Costa Rica', 'Republik Costa Rica', 'Costa Rica', 'Costa Rica', NULL, NULL, NULL),
(37, 'DK', 'Dänemark', 'Königreich Dänemark', 'Danmark', 'Denmark', NULL, NULL, NULL),
(38, 'DE', 'Deutschland', 'Bundesrepublik Deutschland', 'Deutschland', 'Germany', NULL, NULL, NULL),
(39, 'DM', 'Dominica', 'Commonwealth Dominica', 'Dominica', 'Dominica', NULL, NULL, NULL),
(40, 'DO', 'Dominikanische Republik', 'Dominikanische Republik', 'República Dominicana', 'Dominican Republic', NULL, NULL, NULL),
(41, 'DJ', 'Dschibuti', 'Republik Dschibuti', 'Djibouti', 'Djibouti', NULL, NULL, NULL),
(42, 'EC', 'Ecuador', 'Republik Ecuador', 'Ecuador', 'Ecuador', NULL, NULL, NULL),
(43, 'SV', 'El Salvador', 'Republik El Salvador', 'El Salvador', 'El Salvador', NULL, NULL, NULL),
(44, 'CI', 'Elfenbeinküste', 'Republik Côte d’Ivoire', 'Côte d’Ivoire', 'Ivory Coast', NULL, NULL, NULL),
(45, 'ER', 'Eritrea', 'Staat Eritrea', 'Ertra', 'Eritrea', NULL, NULL, NULL),
(46, 'EE', 'Estland', 'Republik Estland', 'Eesti', 'Estonia', NULL, NULL, NULL),
(47, 'FJ', 'Fidschi', 'Republik Fidschi', 'Fiji', 'Fiji', NULL, NULL, NULL),
(48, 'FI ', 'Finnland', 'Republik Finnland', 'Suomi', 'Finland', NULL, NULL, NULL),
(49, 'FR', 'Frankreich', 'Französische Republik', 'France', 'France', NULL, NULL, NULL),
(50, 'GA', 'Gabun', 'Gabunische Republik', 'Gabon', 'Gabon', NULL, NULL, NULL),
(51, 'GM', 'Gambia', 'Republik Gambia', 'Gambia, the', 'Gambia, the', NULL, NULL, NULL),
(52, 'GE', 'Georgien', 'Georgien', 'Sak\'art\'velo', 'Georgia', NULL, NULL, NULL),
(53, 'GH', 'Ghana', 'Republik Ghana', 'Ghana', 'Ghana', NULL, NULL, NULL),
(54, 'GD', 'Grenada', 'Grenada', 'Grenada', 'Grenada', NULL, NULL, NULL),
(55, 'GR', 'Griechenland', 'Hellenische Republik', 'Elláda, Ellás', 'Greece', NULL, NULL, NULL),
(56, 'GT', 'Guatemala', 'Republik Guatemala', 'Guatemala', 'Guatemala', NULL, NULL, NULL),
(57, 'GN', 'Guinea', 'Republik Guinea', 'Guinée', 'Guinea', NULL, NULL, NULL),
(58, 'GW', 'Guinea-Bissau', 'Republik Guinea-Bissau', 'Guiné-Bissau', 'Guinea-Bissau', NULL, NULL, NULL),
(59, 'GY', 'Guyana', 'Kooperative Republik Guyana', 'Guyana', 'Guyana', NULL, NULL, NULL),
(60, 'HT', 'Haiti', 'Republik Haiti', 'Haïti', 'Haiti', NULL, NULL, NULL),
(61, 'HN', 'Honduras', 'Republik Honduras', 'Honduras', 'Honduras', NULL, NULL, NULL),
(62, 'IN', 'Indien', 'Republik Indien', 'Bharat', 'India', NULL, NULL, NULL),
(63, 'ID', 'Indonesien', 'Republik Indonesien', 'Indonesia', 'Indonesia', NULL, NULL, NULL),
(64, 'IQ', 'Irak', 'Republik Irak', 'al-ʿIrāq', 'Iraq', NULL, NULL, NULL),
(65, 'IR', 'Iran', 'Islamische Republik Iran', 'Īrān', 'Iran', NULL, NULL, NULL),
(66, 'IE', 'Irland', 'Irland', 'Éire ,', 'Ireland', NULL, NULL, NULL),
(67, 'IS', 'Island', 'Republik Island', 'Ísland', 'Iceland', NULL, NULL, NULL),
(68, 'IL', 'Israel', 'Staat Israel', 'Yisra\'el', 'Israel', NULL, NULL, NULL),
(69, 'IT', 'Italien', 'Italienische Republik', 'Italia', 'Italy', NULL, NULL, NULL),
(70, 'JM', 'Jamaika', 'Jamaika', 'Jamaica', 'Jamaica', NULL, NULL, NULL),
(71, 'JP', 'Japan', 'Japan', '日本 Nihon/Nippon', 'Japan', NULL, NULL, NULL),
(72, 'YE', 'Jemen', 'Republik Jemen', 'al-Yaman', 'Yemen', NULL, NULL, NULL),
(73, 'JO', 'Jordanien', 'Haschemitisches Königreich Jordanien', 'al-Urdunn', 'Jordan', NULL, NULL, NULL),
(74, 'KH', 'Kambodscha', 'Königreich Kambodscha', 'Kampuchea', 'Cambodia', NULL, NULL, NULL),
(75, 'CM', 'Kamerun', 'Republik Kamerun', 'Cameroun', 'Cameroon', NULL, NULL, NULL),
(76, 'CA', 'Kanada', 'Kanada', 'Canada', 'Canada', NULL, NULL, NULL),
(77, 'CV', 'Kap Verde', 'Republik Cabo Verde', 'Cabo Verde', 'Cape Verde', NULL, NULL, NULL),
(78, 'KZ', 'Kasachstan', 'Republik Kasachstan', 'Qazaqstan', 'Kazakhstan', NULL, NULL, NULL),
(79, 'QA', 'Katar', 'Staat Katar', 'Dawlat Qatar', 'Qatar', NULL, NULL, NULL),
(80, 'KE', 'Kenia', 'Republik Kenia', 'Kenya', 'Kenya', NULL, NULL, NULL),
(81, 'KG', 'Kirgisistan', 'Kirgisische Republik', 'Kyrgyzstan', 'Kyrgyzstan', NULL, NULL, NULL),
(82, 'KI', 'Kiribati', 'Republik Kiribati', 'Kiribati oder Kiribas', 'Kiribati', NULL, NULL, NULL),
(83, 'CO', 'Kolumbien', 'Republik Kolumbien', 'Colombia', 'Colombia', NULL, NULL, NULL),
(84, 'KM', 'Komoren', 'Union der Komoren', 'Comores', 'Comoros', NULL, NULL, NULL),
(85, 'CD', 'Kongo, Demokratische Republik', 'Demokratische Republik Kongo', 'Congo, République Démocratique du', 'Congo, Democratic Republic of the ', NULL, NULL, NULL),
(86, 'CG', 'Kongo, Republik', 'Republik Kongo', 'Congo, République du', 'Congo, Republic of ', NULL, NULL, NULL),
(87, 'KP', 'Korea, Nord', 'Demokratische Volksrepublik Korea', '조선민주주의인민공화국, 朝鮮民主主義人民共和國 ', 'Korea, Democratic People\'s Republic of (North Korea)', NULL, NULL, NULL),
(88, 'KR', 'Korea, Süd', 'Republik Korea', '대한민국, 大韓民國 ', 'Korea, Republic of (South Korea)', NULL, NULL, NULL),
(89, 'XK', 'Kosovo', 'Republik Kosovo', 'Kosova', 'Kosovo', NULL, NULL, NULL),
(90, 'HR', 'Kroatien', 'Republik Kroatien', 'Hrvatska', 'Croatia', NULL, NULL, NULL),
(91, 'CU', 'Kuba', 'Republik Kuba', 'Cuba', 'Cuba', NULL, NULL, NULL),
(92, 'KW', 'Kuwait', 'Staat Kuwait', 'al-Kuwayt', 'Kuwait', NULL, NULL, NULL),
(93, 'LA', 'Laos', 'Demokratische Volksrepublik Laos', 'Lao', 'Lao, People’s Democratic Republic of', NULL, NULL, NULL),
(94, 'LS', 'Lesotho', 'Königreich Lesotho', 'Lesotho', 'Lesotho', NULL, NULL, NULL),
(95, 'LV', 'Lettland', 'Republik Lettland', 'Latvija', 'Latvia', NULL, NULL, NULL),
(96, 'LB', 'Libanon', 'Libanesische Republik', 'Lubnān', 'Lebanon', NULL, NULL, NULL),
(97, 'LR', 'Liberia', 'Republik Liberia', 'Liberia', 'Liberia', NULL, NULL, NULL),
(98, 'LY', 'Libyen', 'Staat Libyen', 'Lībiyā', 'Libya', NULL, NULL, NULL),
(99, 'LI', 'Liechtenstein', 'Fürstentum Liechtenstein', 'Liechtenstein', 'Liechtenstein', NULL, NULL, NULL),
(100, 'LT', 'Litauen', 'Republik Litauen', 'Lietuva', 'Lithuania', NULL, NULL, NULL),
(101, 'LU', 'Luxemburg', 'Großherzogtum Luxemburg', ' Lëtzebuerg', 'Luxembourg', NULL, NULL, NULL),
(102, 'MG', 'Madagaskar', 'Republik Madagaskar', 'Madagascar', 'Madagascar', NULL, NULL, NULL),
(103, 'MW', 'Malawi', 'Republik Malawi', 'Malawi', 'Malawi', NULL, NULL, NULL),
(104, 'MY', 'Malaysia', 'Malaysia', 'Malaysia', 'Malaysia', NULL, NULL, NULL),
(105, 'MV', 'Malediven', 'Republik Malediven', 'Dhivehi Raajje', 'Maldives', NULL, NULL, NULL),
(106, 'ML', 'Mali', 'Republik Mali', 'Mali', 'Mali', NULL, NULL, NULL),
(107, 'MT', 'Malta', 'Republik Malta', 'Malta', 'Malta', NULL, NULL, NULL),
(108, 'MA', 'Marokko', 'Königreich Marokko', 'al-Maghrib', 'Morocco', NULL, NULL, NULL),
(109, 'MH', 'Marshallinseln', 'Republik Marshallinseln', 'Marshall Islands', 'Marshall Islands', NULL, NULL, NULL),
(110, 'MR', 'Mauretanien', 'Islamische Republik Mauretanien', 'Mūrītānīya', 'Mauritania', NULL, NULL, NULL),
(111, 'MU', 'Mauritius', 'Republik Mauritius', 'Mauritius', 'Mauritius', NULL, NULL, NULL),
(112, 'MK', 'Mazedonien', 'Ehemalige jugoslawische Republik Mazedonien', 'Makedonija', 'Macedonia', NULL, NULL, NULL),
(113, 'MX', 'Mexiko', 'Vereinigte Mexikanische Staaten', 'México', 'Mexico', NULL, NULL, NULL),
(114, 'FM', 'Mikronesien', 'Föderierte Staaten von Mikronesien', 'Micronesia', 'Micronesia, Federal States of', NULL, NULL, NULL),
(115, 'MD', 'Moldau', 'Republik Moldau', 'Moldova', 'Moldova', NULL, NULL, NULL),
(116, 'MC', 'Monaco', 'Fürstentum Monaco', 'Monaco', 'Monaco', NULL, NULL, NULL),
(117, 'MN', 'Mongolei', 'Mongolei', 'Mongol Uls', 'Mongolia', NULL, NULL, NULL),
(118, 'ME', 'Montenegro', 'Montenegro', 'Crna Gora', 'Montenegro', NULL, NULL, NULL),
(119, 'MZ', 'Mosambik', 'Republik Mosambik', 'Moçambique', 'Mozambique', NULL, NULL, NULL),
(120, 'MM', 'Myanmar', 'Republik der Union Myanmar', 'Myanma Naingngandaw', 'Myanmar oder Burma', NULL, NULL, NULL),
(121, 'NA', 'Namibia', 'Republik Namibia', 'Namibia', 'Namibia', NULL, NULL, NULL),
(122, 'NR', 'Nauru', 'Republik Nauru', 'Nauru', 'Nauru', NULL, NULL, NULL),
(123, 'NP', 'Nepal', 'Demokratische Bundesrepublik Nepal', 'Nepal', 'Nepal', NULL, NULL, NULL),
(124, 'NZ', 'Neuseeland', 'Neuseeland', 'New Zealand ,', 'New Zealand', NULL, NULL, NULL),
(125, 'NI', 'Nicaragua', 'Republik Nicaragua', 'Nicaragua', 'Nicaragua', NULL, NULL, NULL),
(126, 'NL', 'Niederlande', 'Königreich der Niederlande', 'Nederland', 'Netherlands', NULL, NULL, NULL),
(127, 'NE', 'Niger', 'Republik Niger', 'Niger', 'Niger', NULL, NULL, NULL),
(128, 'NG', 'Nigeria', 'Bundesrepublik Nigeria', 'Nigeria', 'Nigeria', NULL, NULL, NULL),
(129, 'NU', 'Niue', 'Niue', 'Niue', 'Niue', NULL, NULL, NULL),
(130, NULL, 'Nordzypern', 'Türkische Republik Nordzypern', 'Kuzey Kıbrıs Türk Cumhuriyeti', 'Turkish Republic of Northern Cyprus', NULL, NULL, NULL),
(131, 'NO', 'Norwegen', 'Königreich Norwegen', 'Norge', 'Norway', NULL, NULL, NULL),
(132, 'OM', 'Oman', 'Sultanat Oman', 'ʿUmān', 'Oman', NULL, NULL, NULL),
(133, 'AT', 'Österreich', 'Republik Österreich', 'Österreich', 'Austria', NULL, NULL, NULL),
(134, 'TL ', 'Osttimor / Timor-Leste', 'Demokratische Republik Timor-Leste', 'Timor-Leste', 'East Timor oder', NULL, NULL, NULL),
(135, 'PK', 'Pakistan', 'Islamische Republik Pakistan', 'Pākistān', 'Pakistan', NULL, NULL, NULL),
(136, 'PS', 'Palästina', '–', 'Dawlat Filastīn', 'Palestine', NULL, NULL, NULL),
(137, 'PW', 'Palau', 'Republik Palau', 'Belau', 'Palau', NULL, NULL, NULL),
(138, 'PA', 'Panama', 'Republik Panama', 'Panamá', 'Panama', NULL, NULL, NULL),
(139, 'PG', 'Papua-Neuguinea', 'Unabhängiger Staat Papua-Neuguinea', 'Papua Niu Gini', 'Papua New Guinea', NULL, NULL, NULL),
(140, 'PY', 'Paraguay', 'Republik Paraguay', 'Paraguay', 'Paraguay', NULL, NULL, NULL),
(141, 'PE', 'Peru', 'Republik Peru', 'Perú', 'Peru', NULL, NULL, NULL),
(142, 'PH', 'Philippinen', 'Republik der Philippinen', 'Pilipinas', 'Philippines', NULL, NULL, NULL),
(143, 'PL', 'Polen', 'Republik Polen', 'Polska', 'Poland', NULL, NULL, NULL),
(144, 'PT', 'Portugal', 'Portugiesische Republik', 'Portugal', 'Portugal', NULL, NULL, NULL),
(145, 'RW', 'Ruanda', 'Republik Ruanda', 'Rwanda', 'Rwanda', NULL, NULL, NULL),
(146, 'RO', 'Rumänien', 'Rumänien', 'România', 'Romania', NULL, NULL, NULL),
(147, 'RU', 'Russland', 'Russische Föderation', 'Россия', 'Russia oder Russian Federation', NULL, NULL, NULL),
(148, 'SB', 'Salomonen', 'Salomonen', 'Solomon Islands', 'Solomon Islands', NULL, NULL, NULL),
(149, 'ZM', 'Sambia', 'Republik Sambia', 'Zambia', 'Zambia', NULL, NULL, NULL),
(150, 'WS', 'Samoa', 'Unabhängiger Staat Samoa', 'Samoa', 'Samoa', NULL, NULL, NULL),
(151, 'SM', 'San Marino', 'Republik San Marino', 'San Marino', 'San Marino', NULL, NULL, NULL),
(152, 'ST', 'São Tomé und Príncipe', 'Demokratische Republik São Tomé und Príncipe', 'São Tomé e Príncipe', 'São Tomé and Príncipe', NULL, NULL, NULL),
(153, 'SA', 'Saudi-Arabien', 'Königreich Saudi-Arabien', 'al-ʿArabīya as-Saʿudīya', 'Saudi Arabia', NULL, NULL, NULL),
(154, 'SE', 'Schweden', 'Königreich Schweden', 'Sverige', 'Sweden', NULL, NULL, NULL),
(155, 'CH', 'Schweiz', 'Schweizerische Eid­genossen­schaft', 'Schweiz', 'Switzerland', NULL, NULL, NULL),
(156, 'SN', 'Senegal', 'Republik Senegal', 'Sénégal', 'Senegal', NULL, NULL, NULL),
(157, 'RS', 'Serbien', 'Republik Serbien', 'Srbija', 'Serbia', NULL, NULL, NULL),
(158, 'SC', 'Seychellen', 'Republik Seychellen', 'Seychelles', 'Seychelles', NULL, NULL, NULL),
(159, 'SL', 'Sierra Leone', 'Republik Sierra Leone', 'Sierra Leone', 'Sierra Leone', NULL, NULL, NULL),
(160, 'ZW', 'Simbabwe', 'Republik Simbabwe', 'Zimbabwe', 'Zimbabwe', NULL, NULL, NULL),
(161, 'SG', 'Singapur', 'Republik Singapur', 'Singapore', 'Singapore', NULL, NULL, NULL),
(162, 'SK', 'Slowakei', 'Slowakische Republik', 'Slovensko', 'Slovakia', NULL, NULL, NULL),
(163, 'SI', 'Slowenien', 'Republik Slowenien', 'Slovenija', 'Slovenia', NULL, NULL, NULL),
(164, 'SO', 'Somalia', 'Bundesrepublik Somalia', 'Soomaaliya ,', 'Somalia', NULL, NULL, NULL),
(165, NULL, 'Somaliland', 'Republik Somaliland', 'Soomaaliland', 'Somaliland', NULL, NULL, NULL),
(166, 'ES', 'Spanien', 'Königreich Spanien', 'España', 'Spain', NULL, NULL, NULL),
(167, 'LK', 'Sri Lanka', 'Demokratische Sozialistische Republik Sri Lanka', 'Sri Lanka', 'Sri Lanka', NULL, NULL, NULL),
(168, 'KN', 'St. Kitts und Nevis', 'Föderation St. Kitts und Nevis', NULL, 'Saint Kitts and Nevis', NULL, NULL, NULL),
(169, 'LC', 'St. Lucia', 'St. Lucia', 'Saint Lucia', 'Saint Lucia', NULL, NULL, NULL),
(170, 'VC', 'St. Vincent und die Grenadinen', 'St. Vincent und die Grenadinen', NULL, 'Saint Vincent and the Grenadines', NULL, NULL, NULL),
(171, 'ZA', 'Südafrika', 'Republik Südafrika', 'Suid-Afrika ,', 'South Africa', NULL, NULL, NULL),
(172, 'SD', 'Sudan', 'Republik Sudan', 'as-Sūdān', 'Sudan', NULL, NULL, NULL),
(173, NULL, 'Südossetien', 'Südossetien', 'Južnaja Osetija', 'South Ossetia', NULL, NULL, NULL),
(174, 'SS', 'Südsudan', 'Republik Südsudan', 'South Sudan', 'South Sudan', NULL, NULL, NULL),
(175, 'SR', 'Suriname', 'Republik Suriname', 'Suriname', 'Suriname', NULL, NULL, NULL),
(176, 'SZ', 'Swasiland', 'Königreich Eswatini', 'Swaziland', 'Swaziland', NULL, NULL, NULL),
(177, 'SY', 'Syrien', 'Arabische Republik Syrien', 'Sūriyā', 'Syria', NULL, NULL, NULL),
(178, 'TJ', 'Tadschikistan', 'Republik Tadschikistan', 'Todschikiston', 'Tajikistan', NULL, NULL, NULL),
(179, 'TZ', 'Tansania', 'Vereinigte Republik Tansania', 'Tanzania', 'Tanzania', NULL, NULL, NULL),
(180, 'TH', 'Thailand', 'Königreich Thailand', 'Prathet Thai', 'Thailand', NULL, NULL, NULL),
(181, 'TG', 'Togo', 'Republik Togo', 'Togo', 'Togo', NULL, NULL, NULL),
(182, 'TO', 'Tonga', 'Königreich Tonga', 'Tonga', 'Tonga', NULL, NULL, NULL),
(183, NULL, 'Transnistrien', 'Transnistrische Moldauische Republik', 'Pridnestrowje', 'Transnistria', NULL, NULL, NULL),
(184, 'TT', 'Trinidad und Tobago', 'Republik Trinidad und Tobago', 'Trinidad and Tobago', 'Trinidad and Tobago', NULL, NULL, NULL),
(185, 'TD', 'Tschad', 'Republik Tschad', 'Tchad', 'Chad', NULL, NULL, NULL),
(186, 'CZ', 'Tschechien', 'Tschechische Republik', 'Česká republika', 'Czech Republic', NULL, NULL, NULL),
(187, 'TN', 'Tunesien', 'Tunesische Republik', 'Tunis', 'Tunisia', NULL, NULL, NULL),
(188, 'TR', 'Türkei', 'Republik Türkei', 'Türkiye', 'Turkey', NULL, NULL, NULL),
(189, 'TM', 'Turkmenistan', 'Turkmenistan', 'Türkmenistan', 'Turkmenistan', NULL, NULL, NULL),
(190, 'TV', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', NULL, NULL, NULL),
(191, 'UG', 'Uganda', 'Republik Uganda', 'Uganda', 'Uganda', NULL, NULL, NULL),
(192, 'UA', 'Ukraine', 'Ukraine', 'Ukrajina', 'Ukraine', NULL, NULL, NULL),
(193, 'HU', 'Ungarn', 'Ungarn', 'Magyarország', 'Hungary', NULL, NULL, NULL),
(194, 'UY', 'Uruguay', 'Republik Östlich des Uruguay', 'Uruguay', 'Uruguay', NULL, NULL, NULL),
(195, 'UZ', 'Usbekistan', 'Republik Usbekistan', 'Oʻzbekiston', 'Uzbekistan', NULL, NULL, NULL),
(196, 'VU', 'Vanuatu', 'Republik Vanuatu', 'Vanuatu', 'Vanuatu', NULL, NULL, NULL),
(197, 'VA', 'Vatikanstadt', 'Staat Vatikanstadt', 'Status Civitatis Vaticanæ', 'Vatican City', NULL, NULL, NULL),
(198, 'VE', 'Venezuela', 'Bolivarische Republik Venezuela', 'Venezuela', 'Venezuela', NULL, NULL, NULL),
(199, 'AE', 'Vereinigte Arabische Emirate', 'Vereinigte Arabische Emirate', 'al-Imārāt al-ʿArabīya al-Muttahida', 'United Arab Emirates', NULL, NULL, NULL),
(200, 'US', 'Vereinigte Staaten', 'Vereinigte Staaten von Amerika', 'United States', 'United States', NULL, NULL, NULL),
(201, 'GB', 'Vereinigtes Königreich', 'Vereinigtes Königreich Großbritannien und Nordirland', 'United Kingdom', 'United Kingdom', NULL, NULL, NULL),
(202, 'VN', 'Vietnam', 'Sozialistische Republik Vietnam', 'Việt Nam', 'Vietnam', NULL, NULL, NULL),
(203, 'BY', 'Weißrussland', 'Republik Belarus', 'Belarus', 'Belarus', NULL, NULL, NULL),
(204, 'EH', 'Westsahara', 'Demokratische Arabische Republik Sahara', 'Sahara Occidental', 'Western Sahara', NULL, NULL, NULL),
(205, 'CF', 'Zentral­afrikanische Republik', 'Zentral­afrikanische Republik', 'République Centrafricaine', 'Central African Republic', NULL, NULL, NULL),
(206, 'CY', 'Zypern', 'Republik Zypern', 'Kýpros', 'Cyprus', NULL, NULL, NULL);

--
-- Daten für Tabelle `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `symbol_long`, `created_at`, `updated_at`) VALUES
(1, 'Euro', '€', NULL, NULL, NULL),
(2, 'Dollar', '$', NULL, NULL, NULL);

--
-- Daten für Tabelle `languages`
--

INSERT INTO `languages` (`id`, `iso2`, `name`, `name_long`, `name_local`, `name_english`, `created_at`, `updated_at`) VALUES
(1, 'EN', 'Englisch', NULL, NULL, 'English', NULL, NULL),
(2, 'DE', 'Deutsch', NULL, NULL, 'German', NULL, NULL);

--
-- Daten für Tabelle `regions`
--

INSERT INTO `regions` (`id`, `name`, `name_alternative`, `name_english`, `created_at`, `updated_at`) VALUES
(1, 'Brandenburg', 'BB', NULL, NULL, NULL),
(2, 'Berlin', 'BE', NULL, NULL, NULL),
(3, 'Baden-Württemberg', 'BW', NULL, NULL, NULL),
(4, 'Bayern', 'BY', NULL, NULL, NULL),
(5, 'Hansestadt Bremen', 'HB', NULL, NULL, NULL),
(6, 'Hessen', 'HE', NULL, NULL, NULL),
(7, 'Hamburg', 'HH', NULL, NULL, NULL),
(8, 'Mecklenburg-Vorpommern', 'MV', NULL, NULL, NULL),
(9, 'Niedersachsen', 'NI', NULL, NULL, NULL),
(10, 'Nordrhein-Westfalen', 'NRW', NULL, NULL, NULL),
(11, 'Rheinland-Pfalz', 'RP', NULL, NULL, NULL),
(12, 'Schleswig-Holstein', 'SH', NULL, NULL, NULL),
(13, 'Saarland', 'SL', NULL, NULL, NULL),
(14, 'Sachsen', 'SN', NULL, NULL, NULL),
(15, 'Sachsen-Anhalt', 'ST', NULL, NULL, NULL),
(16, 'Thüringen', 'TH', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
