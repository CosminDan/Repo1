-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2015 at 07:20 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pubapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bf_activities`
--

DROP TABLE IF EXISTS `bf_activities`;
CREATE TABLE IF NOT EXISTS `bf_activities` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `activity` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `deleted` tinyint(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `bf_activities`
--

INSERT INTO `bf_activities` (`activity_id`, `user_id`, `activity`, `module`, `created_on`, `deleted`) VALUES
(1, 1, 'logged in from: 127.0.0.1', 'users', '2015-05-28 00:13:50', 0),
(2, 1, 'Created Module: Articles : 127.0.0.1', 'modulebuilder', '2015-05-28 00:18:03', 0),
(3, 1, 'Created record with ID: 1 : 127.0.0.1', 'articles', '2015-05-28 00:23:56', 0),
(4, 1, 'logged in from: ::1', 'users', '2015-05-28 00:41:54', 0),
(5, 1, 'App settings saved from: ::1', 'core', '2015-05-28 00:46:28', 0),
(6, 1, 'logged in from: 127.0.0.1', 'users', '2015-06-17 22:26:39', 0),
(7, 1, 'logged in from: 127.0.0.1', 'users', '2015-06-22 21:35:07', 0),
(8, 1, 'logged in from: 127.0.0.1', 'users', '2015-06-24 22:31:08', 0),
(9, 1, 'modified user: admin', 'users', '2015-06-24 22:32:22', 0),
(10, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-01 22:25:14', 0),
(11, 1, 'created a new Editor: Editor', 'users', '2015-07-01 23:14:57', 0),
(12, 1, 'modified user: Editor', 'users', '2015-07-01 23:15:20', 0),
(13, 2, 'logged in from: 127.0.0.1', 'users', '2015-07-01 23:15:38', 0),
(14, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-01 23:17:33', 0),
(15, 2, 'logged in from: 127.0.0.1', 'users', '2015-07-01 23:26:12', 0),
(16, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-01 23:27:02', 0),
(17, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-01 23:27:56', 0),
(18, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-05 12:20:35', 0),
(19, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-05 20:12:19', 0),
(20, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-05 21:57:49', 0),
(21, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-05 23:47:41', 0),
(22, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-05 23:53:16', 0),
(23, 1, 'logged in from: ::1', 'users', '2015-07-06 00:10:04', 0),
(24, 1, 'logged in from: ::1', 'users', '2015-07-06 00:38:55', 0),
(25, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-12 18:50:29', 0),
(26, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-21 16:47:02', 0),
(27, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-21 17:30:13', 0),
(28, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-22 13:17:42', 0),
(29, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-23 11:01:27', 0),
(30, 1, 'App settings saved from: 127.0.0.1', 'core', '2015-07-23 17:00:55', 0),
(31, 1, 'logged in from: 127.0.0.1', 'users', '2015-07-24 12:55:00', 0),
(32, 1, 'logged in from: 127.0.0.1', 'users', '2015-08-01 14:58:26', 0),
(33, 1, 'created a new User: Cosmin', 'users', '2015-08-01 15:45:53', 0),
(34, 1, 'logged in from: 127.0.0.1', 'users', '2015-08-01 18:27:49', 0),
(35, 1, 'logged in from: 127.0.0.1', 'users', '2015-08-01 18:28:37', 0),
(36, 1, 'logged in from: 127.0.0.1', 'users', '2015-08-01 18:57:16', 0),
(37, 1, 'App settings saved from: 127.0.0.1', 'core', '2015-08-01 18:57:58', 0),
(38, 1, 'logged in from: 127.0.0.1', 'users', '2015-08-01 19:02:30', 0),
(39, 1, 'logged in from: 127.0.0.1', 'users', '2015-08-02 11:14:38', 0),
(40, 1, 'logged in from: 127.0.0.1', 'users', '2015-08-02 18:01:35', 0),
(41, 1, 'logged in from: ::1', 'users', '2015-08-03 19:41:01', 0),
(42, 1, 'logged in from: ::1', 'users', '2015-08-06 19:19:25', 0),
(43, 1, 'logged in from: ::1', 'users', '2015-09-23 21:25:48', 0),
(44, 3, 'registered a new account.', 'users', '2015-09-27 14:26:11', 0),
(45, 1, 'logged in from: ::1', 'users', '2015-09-29 00:16:40', 0),
(46, 1, 'logged in from: 79.112.24.48', 'users', '2015-10-24 05:22:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bf_articles`
--

DROP TABLE IF EXISTS `bf_articles`;
CREATE TABLE IF NOT EXISTS `bf_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_id` int(11) NOT NULL DEFAULT '0',
  `page` int(11) DEFAULT NULL,
  `title` varchar(256) NOT NULL,
  `affiliation` varchar(256) DEFAULT NULL,
  `author_email` varchar(256) DEFAULT NULL,
  `references` text,
  `summary` text,
  `tags` text,
  `views` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_on` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=284 ;

--
-- Dumping data for table `bf_articles`
--

INSERT INTO `bf_articles` (`id`, `issue_id`, `page`, `title`, `affiliation`, `author_email`, `references`, `summary`, `tags`, `views`, `deleted`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(275, 31, 159, 'Social Implication of Gender Issues within Contemporary Academic Policies', '7', NULL, 'ALTBACH, GP. (ed) (2000) The Changing Academic Workplace: Comparative Perspectives, Boston College C', 'Gender subject represented a neglected theme on the\ntransitional agenda in most of the post-communist societies.\nThe presence of a conflictual memory regarding gender\ncommunist policies and the resurrection of a traditionalist\ntransitional culture nourished a set of multiple cultural and\nstructural cleavages. The general status of women within\nEast European Academia was depreciating, contrary to\nsome apparently positive evolutions. The central paradox\nof women`s condition in the field of Higher Education was\nconcerned with an apparent equilibration of gender gap in\nthe upper levels of academic pyramid while, at the bottom\nof hierarchies, women became a subject of a double\nmarginalization mechanism. The study aims at investigating\nthe main sources of gender inequalities in the sphere of\nacademic formation, with a focus point on the social\nimplications of post-welfare state paradigm.', 'gender,Higher Education,social implication,academic policies,transitional societies', 0, 0, '2015-10-24', 1, '2015-10-24', 1),
(276, 31, 170, 'Press Information, from Objectivity to Manipulation (II)', '8', NULL, 'ARISTOTEL (1988) Etica NicomahicÄ, BucureÅti: Scientific and Pedagogic Publishing House. BACHELARD, ', 'Postmodern public looks for its identity in front of the\nTV screen, and identity becomes common for the consumers\nof the same audio-visual products. In this way, media has\nthe power to create social identity. The individual of our\ndays is the victim of stress, of an agglomerated and\ntensioned life, so that what he looks for in TV shows is\nrelaxation, ease, leaving aside, for at least a few moments,\nhis daily problems. TV media takes full advantage of this\nsituation, offering to its audience the amusement it\nrequires. Unfortunately, hidden behind are the real\nintentions of the ones who control and compel by means\nof mass media: manipulation and false information.', 'mass-media,public,manipulation,public poll,persuasion', 0, 0, '2015-10-24', 1, '2015-10-24', 1),
(277, 31, 176, 'Entrepreneurship Education in Romania in Comparison to the European Union', '9', NULL, 'BOLDUREANU, G., LACHE, C., PÄDURARU T., BOLDUREANU D. & NICULESCU N. (2013) Studentsâ entrepreneuria', 'Developing the entrepreneurial spirit in the young\ngeneration is one of the priorities the European Commission\nhas set under the Lisbon Conference in 2000 concerning\nthe competitiveness and innovation in the knowledgebased\nsociety. The current concerns of the Commission in\nthis field relate mainly the contribution of instruction in\nschools and universities in the development of the\nentrepreneurial capacity of young people.\nThe paper meets the European concerns in the field of\nentrepreneurial education by investigating the role of\neducation in entrepreneurship in Romania in comparison\nto the European Union. For this analysis we used the\nâFlash Eurobarometer 354, Entrepreneurship in the EU and\nbeyond conducted in June - August 2012â.', 'entrepreneurship education,entrepreneurship,competencies,schools,universities', 0, 0, '2015-10-24', 1, '2015-10-24', 1),
(278, 31, 183, 'The Importance of Cultural Magazines in Reconsolidating the National Identity', '10', NULL, 'ConstituÅ£ia RomÃ¢niei, Art. 30, alin. 1, 2003. Colocviul NaÅ£ional al Revistelor de CulturÄ, Arad: Arc', 'In this article we intend to present the role that the cultural magazines must have in the reinforcing process of national identity. Cultural magazines are part of the\nforming process of modern Romanian state. Thus, the starting point was highlighted in 1840 by âDacia LiterarÄâ magazine. National identity is an actual term in the context of globalization and its European Union but tends to be\nalmost replaced by the so-called multi - national identity. National identity must be maintained even in conditions of globalization and decrease of cultural borders, a process that happens in the European Union today.', 'cultural magazines,reconsolidation,national identity,the European Union', 0, 0, '2015-10-24', 1, '2015-10-24', 1),
(279, 31, 191, 'An X-RAY of Upe (African Flute) in African Communication System', '11', NULL, 'AKPABIO, E. (2003) African communication systems: An introductory text, Lagos: B print Publications.', 'Scholars in communication especially in mass\ncommunication have their views reflected in Western\ncommunication and see no serious business in discussing\nAfrican communication in African context as if Africans\nhad no means of communication before their contact with\nthe western world. Assumptions of such scholars are just\nan attempt to cannibalise the effective traditional media\nwhich Africans have explored over the ages to reach and\nachieve their target within a specific culture. This paper\nthrough personal interviews explores the African flute, its\nuses, limitations and how it can be combined with other\nmedia in traditional settings to achieve the maximum\neffect. It however recommends, among other things, the\nsupport of African governments (both at a local and\nnational level) to find experts on traditional media in order\nto develop and advance the hardwares.', 'Indigenous Media,Modern Communication,Non-verbal Communication,Verbal Communication,Selective Exposure', 0, 0, '2015-10-24', 1, '2015-10-24', 1),
(280, 31, 199, 'The truth about Sancho Panza by F. Kafka in the Aspects of Humanization of Myth', '12', NULL, 'BENJAMIN, W. (1968) Illuminations. New York: Schocken books. DURÃN, M. (1989) Franz Kafka interpreta', 'The tradition established by European literature is\nrevealed within the framework of the authorâs concept of\nhumanization of myth (applying its terms and concepts\nsuch as the myth of laughter, the myth of non-totem-deathâs\nabolition, beneficent trickster, etc.). This tradition implies\nusing in a trickster manner the reminiscences of the Book\nof Job and implementing in a laughter way the intention\noffered by the mythologem of Job, i.e. abolishing non-totemdeath\nby joint efforts of God and man. The tradition is\nrepresented by such names as J. W. Goethe, F. Kafka and\nTh. Mann. According to Goethe, the story of the torment\npredetermined by God of a man known to be righteous\n(Job) is replaced by the story of the salvation predetermined\nby God of a man known as a sinner (Faust), who has sold\nhis soul to the devil. God Himself is a trickster. According\nto Goethe, God actually verbalizes the postulate of the\npowerlessness of evil. Kafka accentuates human actions.\nSancho makes a righteous choice when faced by evil-nontotem:\nthe protagonist is haunted by a demon who is\nsupposed to destroy him and initiate a lot of disasters\nthrough him. However, Sancho, using the books of\nchivalry, in a laughter manner frees himself, the Universe\nand even the demon from the terrible predestination:\nSancho gives the demon a human name (Don Quixote),\ntempts him by good and never abandons him.According\nto Th. Mann, the aspect of cooperation between God and\nman is verbalized in a trickster way.', 'European tradition,humanization of myth,mythologem of Job,myth of laughter,myth of non-totem-deathâs abolition', 0, 0, '2015-10-24', 1, '2015-10-24', 1),
(281, 31, 209, 'Understanding Magic: Magical Thinking and the Generation Gap', '13', NULL, 'AARNIO, K. (2007) Paranormal, superstitious, magical, and religious beliefs, Department of Psycholog', 'The article analyzes the possible connections one can\nestablish between understanding magic (the way\nindividuals view magic), magical thinking, generations\nand other factors, such as anomia, stress reaction, wellbeing,\nexistential anxiety, locus of control, risk avoidance.\nThe here presented ideas are based on an extended study\non magical thinking, the data supporting the theoretical\nmodel having been collected from 102 applied scales. We\nstart by describing the method, the scales used in the study\nand the variables of interest. Once our method is clear, we\nshow a number of tables and the general results obtained.\nThe aim is to show significant correlations between magical\nthinking and well-being, locus of control, anomia,\nexistential anxiety, stress reaction, sociabiliy. Moreover,\ncorrelations of interest were made in two separate groups:\nthose who believe that magic is an alternative system, a\ndifferent manner of viewing the world, and those who see\nmagic as old, useless ideas - a hoax. This distinction allows\nus to go even further: the first group is part of what\nresearchers called generation Y or the Millennials, while\nthe second group is part of generation X. We found an\ninteresting connection between understanding magic and\nthese two distinct generations.', 'generations,magical thinking,magic', 0, 0, '2015-10-24', 1, '2015-10-24', 1),
(282, 31, 218, 'Initiation Rites and Pagan Religion in the 19th Century: The Case of Cagliostro of Les IlluminÃ©s', '14', NULL, 'AMADOU, R. (dir.) (1960), Aspects de lâilluminisme au XVIIIe siÃ¨cle, Les Cahiers de La Tour de Saint', 'Our analysis is dedicated to the portraits of the eccentric\nenlightened Cagliostro. The hatching of the eccentric\nilluminisme, as fanciful opinion, of this character cannot\nabandon the historic period in which the visionaries\nreproduce their ideas concerning the religion, aimed at the\nChristianity and the Paganism. Nerval finds a good\nopportunity to center himself on spiritual e(x)ccentricities\nof the other one. This paper aims to show how Nerval, at\nthe same time fascinated and critical with regard to the\nsystems of his character, look himself through this one for\nhis own religious way with all the more fervor and concern\nas he knows that he is not able to be connected with what\nthat dogma whether it is.', 'antique superstition,dogma,illuminisme,lights,pagan religion,rites,spiritual e(x)ccentricities', 0, 0, '2015-10-24', 1, '2015-10-24', 1),
(283, 31, 222, 'Educational Discourse Analysis', '15', NULL, 'ALBULESCU, I. (2009) The Pragmatics of Teaching, PiteÅti: Paralela 45. BOREL, MJ. (1980) Discours Ex', 'The academic teaching and learning involves the\ntransmission of information from the teacher, as a\ntransmitter,to the students, the recipients of the message,\nand in this process training them, shaping their intellect.\nWhen Jackbson described the function of language, starting\nfrom the realities of the linguistic communication, he\nintroduced the concepts of destinator (the teacher in the\nteaching activities), recipient /destinatar (the student),\nmessage (the information/knowledge), all within a context\nand using code . The understanding, the interpretation of\nthe information sent to students as recipients, its decoding,\ninvolves explaining the meanings contained in the message,\nwhich rests upon the destinator who, in his didactic\ndiscourse, âtranslatesâ, explains, creates representations\nleading to the understanding of concepts, to their\nacquisition.', 'didactic discourse,discourse procedures,knowledge,communication,locutor,interlocutor', 0, 0, '2015-10-24', 1, '2015-10-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bf_articles_categories`
--

DROP TABLE IF EXISTS `bf_articles_categories`;
CREATE TABLE IF NOT EXISTS `bf_articles_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `bf_articles_categories`
--

INSERT INTO `bf_articles_categories` (`id`, `article_id`, `category_id`) VALUES
(71, 275, 266),
(72, 276, 14),
(73, 277, 228),
(74, 278, 14),
(75, 279, 224),
(76, 280, 16),
(77, 281, 16),
(78, 282, 16),
(79, 283, 14);

-- --------------------------------------------------------

--
-- Table structure for table `bf_authors`
--

DROP TABLE IF EXISTS `bf_authors`;
CREATE TABLE IF NOT EXISTS `bf_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `bf_authors`
--

INSERT INTO `bf_authors` (`id`, `name`) VALUES
(37, 'Iulia ANGHEL'),
(38, 'Maria FLOREA'),
(39, 'Gabriela BOLDUREANU'),
(40, 'Adrian Rosentzveig'),
(41, 'Adi Cristi'),
(42, 'Felix OLAJIDE TALABI'),
(43, 'Benjamin KAYODE OGUNDEJI'),
(44, 'Solomon OKIOYA'),
(45, 'Jozefina CUÅNIR'),
(46, 'Dora-Alexandra CANA'),
(47, 'Elena Mihaela ANDREI'),
(48, 'Marius Narcis MANOLIU');

-- --------------------------------------------------------

--
-- Table structure for table `bf_authorsofarticles`
--

DROP TABLE IF EXISTS `bf_authorsofarticles`;
CREATE TABLE IF NOT EXISTS `bf_authorsofarticles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `bf_authorsofarticles`
--

INSERT INTO `bf_authorsofarticles` (`id`, `article_id`, `author_id`) VALUES
(35, 275, 37),
(36, 276, 38),
(37, 277, 39),
(38, 278, 40),
(39, 278, 41),
(40, 279, 42),
(41, 279, 43),
(42, 279, 44),
(43, 280, 45),
(44, 281, 46),
(45, 282, 47),
(46, 283, 48);

-- --------------------------------------------------------

--
-- Table structure for table `bf_categories`
--

DROP TABLE IF EXISTS `bf_categories`;
CREATE TABLE IF NOT EXISTS `bf_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `selectable` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=277 ;

--
-- Dumping data for table `bf_categories`
--

INSERT INTO `bf_categories` (`id`, `pid`, `name`, `selectable`) VALUES
(1, 0, 'Arts & Humanities', 1),
(2, 1, 'Archaeology', 1),
(3, 1, 'Architecture', 1),
(4, 1, 'Art', 1),
(5, 1, 'Asian Studies', 1),
(6, 1, 'Classics', 1),
(7, 1, 'Dance', 1),
(8, 1, 'Film, Radio, Television', 1),
(9, 1, 'Folklore', 1),
(10, 1, 'History', 1),
(11, 1, 'History & Philosophy Of Science', 1),
(12, 1, 'Humanities', 1),
(13, 12, 'Multidisciplinary', 1),
(14, 1, 'Language & Linguistics', 1),
(15, 1, 'Literary Reviews', 1),
(16, 1, 'Literary Theory & Criticism', 1),
(17, 1, 'Literature', 1),
(18, 17, 'African', 1),
(19, 17, 'Australian', 1),
(20, 17, 'Canadian', 1),
(21, 17, 'American', 1),
(22, 17, 'British Isles', 1),
(23, 17, 'German', 1),
(24, 17, 'Dutch', 1),
(25, 17, 'Scandinavian', 1),
(26, 17, 'Romance', 1),
(27, 17, 'Slavic', 1),
(28, 1, 'Medieval & Renaissance Studies', 1),
(29, 1, 'Music', 1),
(30, 1, 'Philosophy', 1),
(31, 1, 'Poetry', 1),
(32, 1, 'Religion', 1),
(33, 1, 'Theater', 1),
(34, 0, 'Science', 1),
(35, 34, 'Acoustics', 1),
(36, 34, 'Agricultural Economics & Policy', 1),
(37, 34, 'Agricultural Engineering', 1),
(38, 34, 'Agriculture', 1),
(39, 38, 'Dairy & Animal Science', 1),
(40, 38, 'Multidisciplinary', 1),
(41, 34, 'Agronomy', 1),
(42, 34, 'Allergy', 1),
(43, 34, 'Anatomy & Morphology', 1),
(44, 34, 'Andrology', 1),
(45, 34, 'Anesthesiology', 1),
(46, 34, 'Astronomy & Astrophysics', 1),
(47, 34, 'Automation & Control Systems', 1),
(48, 34, 'Behavioral Sciences', 1),
(49, 34, 'Biochemical Research Methods', 1),
(50, 34, 'Biochemistry & Molecular Biology', 1),
(51, 34, 'Biodiversity Conservation', 1),
(52, 34, 'Biology', 1),
(53, 34, 'Biophysics', 1),
(54, 34, 'Biotechnology & Applied Microbiology', 1),
(55, 34, 'Cardiac & Cardiovascular Systems', 1),
(56, 34, 'Cell Biology', 1),
(57, 34, 'Chemistry', 1),
(58, 57, 'Analytical', 1),
(59, 57, 'Applied', 1),
(60, 57, 'Inorganic & Nuclear', 1),
(61, 57, 'Medicinal', 1),
(62, 57, 'Multidisciplinary', 1),
(63, 57, 'Organic', 1),
(64, 57, 'Physical', 1),
(65, 34, 'Clinical Neurology', 1),
(66, 34, 'Computer Science', 1),
(67, 66, 'Artificial Intelligence', 1),
(68, 66, 'Cybernetics', 1),
(69, 66, 'Hardware & Architecture', 1),
(70, 66, 'Information Systems', 1),
(71, 66, 'Interdisciplinary Applications', 1),
(72, 66, 'Software Engineering', 1),
(73, 66, 'Theory & Methods', 1),
(74, 34, 'Construction & Building Technology', 1),
(75, 34, 'Critical Care Medicine', 1),
(76, 34, 'Crystallography', 1),
(77, 34, 'Dentistry', 1),
(78, 77, 'Oral Surgery & Medicine', 1),
(79, 34, 'Dermatology', 1),
(80, 34, 'Developmental Biology', 1),
(81, 34, 'Ecology', 1),
(82, 34, 'Education', 1),
(83, 82, 'Scientific Disciplines', 1),
(84, 34, 'Electrochemistry', 1),
(85, 34, 'Emergency Medicine', 1),
(86, 34, 'Endocrinology & Metabolism', 1),
(87, 34, 'Energy & Fuels', 1),
(88, 34, 'Engineering', 1),
(89, 88, 'Aerospace', 1),
(90, 88, 'Biomedical', 1),
(91, 88, 'Chemical', 1),
(92, 88, 'Civil', 1),
(93, 88, 'Electrical & Electronic', 1),
(94, 88, 'Environmental', 1),
(95, 88, 'Geological', 1),
(96, 88, 'Industrial', 1),
(97, 88, 'Manufacturing', 1),
(98, 88, 'Marine', 1),
(99, 88, 'Mechanical', 1),
(100, 88, 'Multidisciplinary', 1),
(101, 88, 'Ocean', 1),
(102, 88, 'Petroleum', 1),
(103, 34, 'Entomology', 1),
(104, 34, 'Environmental Sciences', 1),
(105, 34, 'Evolutionary Biology', 1),
(106, 34, 'Fisheries', 1),
(107, 34, 'Food Science & Technology', 1),
(108, 34, 'Forestry', 1),
(109, 34, 'Gastroenterology & Hepatology', 1),
(110, 34, 'Genetics & Heredity', 1),
(111, 34, 'Geochemistry & Geophysics', 1),
(112, 34, 'Geography', 1),
(113, 112, 'Physical', 1),
(114, 34, 'Geology', 1),
(115, 34, 'Geosciences', 1),
(116, 115, 'Multidisciplinary', 1),
(117, 34, 'Geriatrics & Gerontology', 1),
(118, 34, 'Health Care Sciences & Services', 1),
(119, 34, 'Hematology', 1),
(120, 34, 'History & Philosophy of Science', 1),
(121, 34, 'Horticulture', 1),
(122, 34, 'Imaging Science & Photographic Technology', 1),
(123, 34, 'Immunology', 1),
(124, 34, 'Infectious Diseases', 1),
(125, 34, 'Instruments & Instrumentation', 1),
(126, 34, 'Integrative & Complementary Medicine', 1),
(127, 34, 'Limnology', 1),
(128, 34, 'Marine & Freshwater Biology', 1),
(129, 34, 'Materials Science', 1),
(130, 129, 'Biomaterials', 1),
(131, 129, 'Ceramics', 1),
(132, 129, 'Characterization & Testing', 1),
(133, 129, 'Coatings & Films', 1),
(134, 129, 'Composites', 1),
(135, 129, 'Multidisciplinary', 1),
(136, 129, 'Paper & Wood', 1),
(137, 129, 'Textiles', 1),
(138, 34, 'Mathematical & Computational Biology', 1),
(139, 34, 'Mathematics', 1),
(140, 139, 'Applied', 1),
(141, 139, 'Interdisciplinary Applications', 1),
(142, 34, 'Mechanics', 1),
(143, 34, 'Medical Ethics', 1),
(144, 34, 'Medical Informatics', 1),
(145, 34, 'Medical Laboratory Technology', 1),
(146, 34, 'Medicine', 1),
(147, 146, 'General & Internal', 1),
(148, 146, 'Legal', 1),
(149, 146, 'Research & Experimental', 1),
(150, 34, 'Metallurgy & Metallurgical Engineering', 1),
(151, 34, 'Meteorology & Atmospheric Sciences', 1),
(152, 34, 'Microbiology', 1),
(153, 34, 'Microscopy', 1),
(154, 34, 'Mineralogy', 1),
(155, 34, 'Mining & Mineral Processing', 1),
(156, 34, 'Multidisciplinary Sciences', 1),
(157, 34, 'Mycology', 1),
(158, 34, 'Nanoscience & Nanotechnology', 1),
(159, 34, 'Neuroimaging', 1),
(160, 34, 'Neurosciences', 1),
(161, 34, 'Nuclear Science & Technology', 1),
(162, 34, 'Nursing', 1),
(163, 34, 'Nutrition & Dietetics', 1),
(164, 34, 'Obstetrics & Gynecology', 1),
(165, 34, 'Oceanography', 1),
(166, 34, 'Oncology', 1),
(167, 34, 'Operations Research & Management Science', 1),
(168, 34, 'Ophthalmology', 1),
(169, 34, 'Optics', 1),
(170, 34, 'Ornithology', 1),
(171, 34, 'Orthopedics', 1),
(172, 34, 'Otorhinolaryngology', 1),
(173, 34, 'Paleontology', 1),
(174, 34, 'Parasitology', 1),
(175, 34, 'Pathology', 1),
(176, 34, 'Pediatrics', 1),
(177, 34, 'Peripheral Vascular Disease', 1),
(178, 34, 'Pharmacology & Pharmacy', 1),
(179, 34, 'Physics', 1),
(180, 179, 'Applied', 1),
(181, 179, 'Atomic, Molecular & Chemical', 1),
(182, 179, 'Condensed Matter', 1),
(183, 179, 'Fluids & Plasmas', 1),
(184, 179, 'Mathematical', 1),
(185, 179, 'Multidisciplinary', 1),
(186, 179, 'Nuclear', 1),
(187, 179, 'Particles & Fields', 1),
(188, 34, 'Physiology', 1),
(189, 34, 'Plant Sciences', 1),
(190, 34, 'Polymer Science', 1),
(191, 34, 'Psychiatry', 1),
(192, 34, 'Psychology', 1),
(193, 34, 'Public, Environmental & Occupational Health', 1),
(194, 34, 'Radiology', 1),
(195, 194, 'Nuclear Medicine & Medical Imaging', 1),
(196, 34, 'Rehabilitation', 1),
(197, 34, 'Remote Sensing', 1),
(198, 34, 'Reproductive Biology', 1),
(199, 34, 'Respiratory System', 1),
(200, 34, 'Rheumatology', 1),
(201, 34, 'Robotics', 1),
(202, 34, 'Soil Science', 1),
(203, 34, 'Spectroscopy', 1),
(204, 34, 'Sport Sciences', 1),
(205, 34, 'Statistics & Probability', 1),
(206, 34, 'Substance Abuse', 1),
(207, 34, 'Surgery', 1),
(208, 34, 'Telecommunications', 1),
(209, 34, 'Thermodynamics', 1),
(210, 34, 'Toxicology', 1),
(211, 34, 'Transplantation', 1),
(212, 34, 'Transportation Science & Technology', 1),
(213, 34, 'Tropical Medicine', 1),
(214, 34, 'Urology & Nephrology', 1),
(215, 34, 'Veterinary Sciences', 1),
(216, 34, 'Virology', 1),
(217, 34, 'Water Resources', 1),
(218, 34, 'Zoology', 1),
(219, 0, 'Social Science', 1),
(220, 219, 'Anthropology', 1),
(221, 219, 'Area Studies', 1),
(222, 219, 'Business', 1),
(223, 222, 'Finance', 1),
(224, 219, 'Communication', 1),
(225, 219, 'Criminology & Penology', 1),
(226, 219, 'Demography', 1),
(227, 219, 'Economics', 1),
(228, 219, 'Education & Educational Research', 1),
(229, 219, 'Education, Special', 1),
(230, 219, 'Environmental Studies', 1),
(231, 219, 'Ergonomics', 1),
(232, 219, 'Ethics', 1),
(233, 219, 'Ethnic Studies', 1),
(234, 219, 'Family Studies', 1),
(235, 219, 'Geography', 1),
(236, 219, 'Gerontology', 1),
(237, 219, 'Health Policy & Services', 1),
(238, 219, 'History', 1),
(239, 219, 'History & Philosophy Of Science', 1),
(240, 219, 'History of Social Sciences', 1),
(241, 219, 'Hospitality, Leisure, Sport & Tourism', 1),
(242, 219, 'Industrial Relations & Labor', 1),
(243, 219, 'Information Science & Library Science', 1),
(244, 219, 'International Relations', 1),
(245, 219, 'Law', 1),
(246, 219, 'Linguistics', 1),
(247, 219, 'Management', 1),
(248, 219, 'Nursing', 1),
(249, 219, 'Planning & Development', 1),
(250, 219, 'Political Science', 1),
(251, 219, 'Psychiatry', 1),
(252, 219, 'Psychology', 1),
(253, 252, 'Applied', 1),
(254, 252, 'Biological', 1),
(255, 252, 'Clinical', 1),
(256, 252, 'Developmental', 1),
(257, 252, 'Educational', 1),
(258, 252, 'Experimental', 1),
(259, 252, 'Mathematical', 1),
(260, 252, 'Multidisciplinary', 1),
(261, 252, 'Psychoanalysis', 1),
(262, 252, 'Social', 1),
(263, 219, 'Public Administration', 1),
(264, 219, 'Public, Environmental & Occupational Health', 1),
(265, 219, 'Rehabilitation', 1),
(266, 219, 'Social Issues', 1),
(267, 219, 'Social Sciences', 1),
(268, 267, 'Biomedical', 1),
(269, 267, 'Interdisciplinary', 1),
(270, 267, 'Mathematical Methods', 1),
(271, 219, 'Social Work', 1),
(272, 219, 'Sociology', 1),
(273, 219, 'Substance Abuse', 1),
(274, 219, 'Transportation', 1),
(275, 219, 'Urban Studies', 1),
(276, 219, 'Women''s Studies', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bf_ci3_sessions`
--

DROP TABLE IF EXISTS `bf_ci3_sessions`;
CREATE TABLE IF NOT EXISTS `bf_ci3_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_ci3_sessions`
--

INSERT INTO `bf_ci3_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('050266a7bf3a99f51ef20f354b61476475cacba6', '5.13.202.179', 1445533914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353533333931343b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('0d76c91549e9d918e882ba002928f7767f1f914b', '107.173.154.90', 1445520330, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353532303333303b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('0d91065cdb73299a882eb2f0fa8ffe8f6b4a485a', '192.3.143.43', 1445536924, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353533363932343b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('1f7d931dc470b8f5c3fe44cc420868cf355028da', '79.112.3.136', 1445460524, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353436303334363b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('4a3ce74c4ce134bc5d3a2cf6351473b470d0d6b9', '79.112.124.29', 1445539212, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353533393231323b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('5f3893fdfa96fb0e832ac503de6bf088e6a8ec76', '79.112.107.39', 1445521973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353532313937333b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('86dcba9ad3a2b22b73e259ed3f8ac74d64d76486', '5.13.202.179', 1445539663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353533393636333b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('898962748351fff2f5e583f70abfe897228a4bf0', '46.102.175.250', 1445508606, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353530383630363b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('8fc5960547315b3dc97d62079f3a3a36a2fee9a2', '66.249.64.141', 1445470461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353437303436313b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('b3df20438933a2b4c601ce6c4628b978508cb603', '79.112.107.8', 1445460641, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353436303630353b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b6d6573736167657c733a303a22223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226e6577223b7d),
('b641e72116e1e6c03f3e997bb8cb59cc81058143', '172.245.120.201', 1445481097, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353438313039373b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('b67192b8e4d7767a35fbe750fc663d4bfe18c2ea', '79.112.107.8', 1445460594, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353436303239373b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('b7807e86cda3c48148bfd11b5b328fa4e36218e4', '107.173.250.38', 1445495318, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353439353331383b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('ce332e819bca8f495c716482f51300eed0e7fc11', '79.112.107.39', 1445495368, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353439353336383b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('d678669995899e8c85ff026a7670c9309c4ff841', '79.112.107.39', 1445501429, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353530313432393b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('def1ffb583d493f9637e2809586665e36ab58e17', '176.126.252.11', 1445518692, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353531383639323b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b),
('e53e2c2cb5b457c06b4ec940d5e009e94f9593ed', '172.245.110.132', 1445469745, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353436393734353b7265717565737465645f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b70726576696f75735f706167657c733a33353a22687474703a2f2f706f6c797068656d75732d6173692e636f6d2f696e6465782e706870223b);

-- --------------------------------------------------------

--
-- Table structure for table `bf_countries`
--

DROP TABLE IF EXISTS `bf_countries`;
CREATE TABLE IF NOT EXISTS `bf_countries` (
  `iso` char(2) NOT NULL DEFAULT 'US',
  `name` varchar(80) NOT NULL,
  `printable_name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`iso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_countries`
--

INSERT INTO `bf_countries` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES
('AD', 'ANDORRA', 'Andorra', 'AND', 20),
('AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784),
('AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4),
('AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28),
('AI', 'ANGUILLA', 'Anguilla', 'AIA', 660),
('AL', 'ALBANIA', 'Albania', 'ALB', 8),
('AM', 'ARMENIA', 'Armenia', 'ARM', 51),
('AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530),
('AO', 'ANGOLA', 'Angola', 'AGO', 24),
('AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL),
('AR', 'ARGENTINA', 'Argentina', 'ARG', 32),
('AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16),
('AT', 'AUSTRIA', 'Austria', 'AUT', 40),
('AU', 'AUSTRALIA', 'Australia', 'AUS', 36),
('AW', 'ARUBA', 'Aruba', 'ABW', 533),
('AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31),
('BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70),
('BB', 'BARBADOS', 'Barbados', 'BRB', 52),
('BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50),
('BE', 'BELGIUM', 'Belgium', 'BEL', 56),
('BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854),
('BG', 'BULGARIA', 'Bulgaria', 'BGR', 100),
('BH', 'BAHRAIN', 'Bahrain', 'BHR', 48),
('BI', 'BURUNDI', 'Burundi', 'BDI', 108),
('BJ', 'BENIN', 'Benin', 'BEN', 204),
('BM', 'BERMUDA', 'Bermuda', 'BMU', 60),
('BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96),
('BO', 'BOLIVIA', 'Bolivia', 'BOL', 68),
('BR', 'BRAZIL', 'Brazil', 'BRA', 76),
('BS', 'BAHAMAS', 'Bahamas', 'BHS', 44),
('BT', 'BHUTAN', 'Bhutan', 'BTN', 64),
('BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL),
('BW', 'BOTSWANA', 'Botswana', 'BWA', 72),
('BY', 'BELARUS', 'Belarus', 'BLR', 112),
('BZ', 'BELIZE', 'Belize', 'BLZ', 84),
('CA', 'CANADA', 'Canada', 'CAN', 124),
('CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL),
('CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180),
('CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140),
('CG', 'CONGO', 'Congo', 'COG', 178),
('CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756),
('CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384),
('CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184),
('CL', 'CHILE', 'Chile', 'CHL', 152),
('CM', 'CAMEROON', 'Cameroon', 'CMR', 120),
('CN', 'CHINA', 'China', 'CHN', 156),
('CO', 'COLOMBIA', 'Colombia', 'COL', 170),
('CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188),
('CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL),
('CU', 'CUBA', 'Cuba', 'CUB', 192),
('CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132),
('CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL),
('CY', 'CYPRUS', 'Cyprus', 'CYP', 196),
('CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203),
('DE', 'GERMANY', 'Germany', 'DEU', 276),
('DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262),
('DK', 'DENMARK', 'Denmark', 'DNK', 208),
('DM', 'DOMINICA', 'Dominica', 'DMA', 212),
('DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214),
('DZ', 'ALGERIA', 'Algeria', 'DZA', 12),
('EC', 'ECUADOR', 'Ecuador', 'ECU', 218),
('EE', 'ESTONIA', 'Estonia', 'EST', 233),
('EG', 'EGYPT', 'Egypt', 'EGY', 818),
('EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732),
('ER', 'ERITREA', 'Eritrea', 'ERI', 232),
('ES', 'SPAIN', 'Spain', 'ESP', 724),
('ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231),
('FI', 'FINLAND', 'Finland', 'FIN', 246),
('FJ', 'FIJI', 'Fiji', 'FJI', 242),
('FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238),
('FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583),
('FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234),
('FR', 'FRANCE', 'France', 'FRA', 250),
('GA', 'GABON', 'Gabon', 'GAB', 266),
('GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826),
('GD', 'GRENADA', 'Grenada', 'GRD', 308),
('GE', 'GEORGIA', 'Georgia', 'GEO', 268),
('GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254),
('GH', 'GHANA', 'Ghana', 'GHA', 288),
('GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292),
('GL', 'GREENLAND', 'Greenland', 'GRL', 304),
('GM', 'GAMBIA', 'Gambia', 'GMB', 270),
('GN', 'GUINEA', 'Guinea', 'GIN', 324),
('GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312),
('GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226),
('GR', 'GREECE', 'Greece', 'GRC', 300),
('GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
('GT', 'GUATEMALA', 'Guatemala', 'GTM', 320),
('GU', 'GUAM', 'Guam', 'GUM', 316),
('GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624),
('GY', 'GUYANA', 'Guyana', 'GUY', 328),
('HK', 'HONG KONG', 'Hong Kong', 'HKG', 344),
('HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL),
('HN', 'HONDURAS', 'Honduras', 'HND', 340),
('HR', 'CROATIA', 'Croatia', 'HRV', 191),
('HT', 'HAITI', 'Haiti', 'HTI', 332),
('HU', 'HUNGARY', 'Hungary', 'HUN', 348),
('ID', 'INDONESIA', 'Indonesia', 'IDN', 360),
('IE', 'IRELAND', 'Ireland', 'IRL', 372),
('IL', 'ISRAEL', 'Israel', 'ISR', 376),
('IN', 'INDIA', 'India', 'IND', 356),
('IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL),
('IQ', 'IRAQ', 'Iraq', 'IRQ', 368),
('IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364),
('IS', 'ICELAND', 'Iceland', 'ISL', 352),
('IT', 'ITALY', 'Italy', 'ITA', 380),
('JM', 'JAMAICA', 'Jamaica', 'JAM', 388),
('JO', 'JORDAN', 'Jordan', 'JOR', 400),
('JP', 'JAPAN', 'Japan', 'JPN', 392),
('KE', 'KENYA', 'Kenya', 'KEN', 404),
('KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417),
('KH', 'CAMBODIA', 'Cambodia', 'KHM', 116),
('KI', 'KIRIBATI', 'Kiribati', 'KIR', 296),
('KM', 'COMOROS', 'Comoros', 'COM', 174),
('KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659),
('KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408),
('KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410),
('KW', 'KUWAIT', 'Kuwait', 'KWT', 414),
('KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136),
('KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398),
('LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418),
('LB', 'LEBANON', 'Lebanon', 'LBN', 422),
('LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662),
('LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438),
('LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144),
('LR', 'LIBERIA', 'Liberia', 'LBR', 430),
('LS', 'LESOTHO', 'Lesotho', 'LSO', 426),
('LT', 'LITHUANIA', 'Lithuania', 'LTU', 440),
('LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442),
('LV', 'LATVIA', 'Latvia', 'LVA', 428),
('LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434),
('MA', 'MOROCCO', 'Morocco', 'MAR', 504),
('MC', 'MONACO', 'Monaco', 'MCO', 492),
('MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498),
('MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450),
('MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584),
('MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807),
('ML', 'MALI', 'Mali', 'MLI', 466),
('MM', 'MYANMAR', 'Myanmar', 'MMR', 104),
('MN', 'MONGOLIA', 'Mongolia', 'MNG', 496),
('MO', 'MACAO', 'Macao', 'MAC', 446),
('MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580),
('MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474),
('MR', 'MAURITANIA', 'Mauritania', 'MRT', 478),
('MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500),
('MT', 'MALTA', 'Malta', 'MLT', 470),
('MU', 'MAURITIUS', 'Mauritius', 'MUS', 480),
('MV', 'MALDIVES', 'Maldives', 'MDV', 462),
('MW', 'MALAWI', 'Malawi', 'MWI', 454),
('MX', 'MEXICO', 'Mexico', 'MEX', 484),
('MY', 'MALAYSIA', 'Malaysia', 'MYS', 458),
('MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508),
('NA', 'NAMIBIA', 'Namibia', 'NAM', 516),
('NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540),
('NE', 'NIGER', 'Niger', 'NER', 562),
('NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574),
('NG', 'NIGERIA', 'Nigeria', 'NGA', 566),
('NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558),
('NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528),
('NO', 'NORWAY', 'Norway', 'NOR', 578),
('NP', 'NEPAL', 'Nepal', 'NPL', 524),
('NR', 'NAURU', 'Nauru', 'NRU', 520),
('NU', 'NIUE', 'Niue', 'NIU', 570),
('NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554),
('OM', 'OMAN', 'Oman', 'OMN', 512),
('PA', 'PANAMA', 'Panama', 'PAN', 591),
('PE', 'PERU', 'Peru', 'PER', 604),
('PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258),
('PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598),
('PH', 'PHILIPPINES', 'Philippines', 'PHL', 608),
('PK', 'PAKISTAN', 'Pakistan', 'PAK', 586),
('PL', 'POLAND', 'Poland', 'POL', 616),
('PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666),
('PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612),
('PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630),
('PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL),
('PT', 'PORTUGAL', 'Portugal', 'PRT', 620),
('PW', 'PALAU', 'Palau', 'PLW', 585),
('PY', 'PARAGUAY', 'Paraguay', 'PRY', 600),
('QA', 'QATAR', 'Qatar', 'QAT', 634),
('RE', 'REUNION', 'Reunion', 'REU', 638),
('RO', 'ROMANIA', 'Romania', 'ROM', 642),
('RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643),
('RW', 'RWANDA', 'Rwanda', 'RWA', 646),
('SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682),
('SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90),
('SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690),
('SD', 'SUDAN', 'Sudan', 'SDN', 736),
('SE', 'SWEDEN', 'Sweden', 'SWE', 752),
('SG', 'SINGAPORE', 'Singapore', 'SGP', 702),
('SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654),
('SI', 'SLOVENIA', 'Slovenia', 'SVN', 705),
('SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744),
('SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703),
('SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694),
('SM', 'SAN MARINO', 'San Marino', 'SMR', 674),
('SN', 'SENEGAL', 'Senegal', 'SEN', 686),
('SO', 'SOMALIA', 'Somalia', 'SOM', 706),
('SR', 'SURINAME', 'Suriname', 'SUR', 740),
('ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678),
('SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222),
('SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760),
('SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748),
('TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796),
('TD', 'CHAD', 'Chad', 'TCD', 148),
('TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL),
('TG', 'TOGO', 'Togo', 'TGO', 768),
('TH', 'THAILAND', 'Thailand', 'THA', 764),
('TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762),
('TK', 'TOKELAU', 'Tokelau', 'TKL', 772),
('TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL),
('TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795),
('TN', 'TUNISIA', 'Tunisia', 'TUN', 788),
('TO', 'TONGA', 'Tonga', 'TON', 776),
('TR', 'TURKEY', 'Turkey', 'TUR', 792),
('TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780),
('TV', 'TUVALU', 'Tuvalu', 'TUV', 798),
('TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158),
('TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834),
('UA', 'UKRAINE', 'Ukraine', 'UKR', 804),
('UG', 'UGANDA', 'Uganda', 'UGA', 800),
('UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL),
('US', 'UNITED STATES', 'United States', 'USA', 840),
('UY', 'URUGUAY', 'Uruguay', 'URY', 858),
('UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860),
('VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336),
('VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670),
('VE', 'VENEZUELA', 'Venezuela', 'VEN', 862),
('VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92),
('VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850),
('VN', 'VIET NAM', 'Viet Nam', 'VNM', 704),
('VU', 'VANUATU', 'Vanuatu', 'VUT', 548),
('WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876),
('WS', 'SAMOA', 'Samoa', 'WSM', 882),
('YE', 'YEMEN', 'Yemen', 'YEM', 887),
('YT', 'MAYOTTE', 'Mayotte', NULL, NULL),
('ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710),
('ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894),
('ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);

-- --------------------------------------------------------

--
-- Table structure for table `bf_email_queue`
--

DROP TABLE IF EXISTS `bf_email_queue`;
CREATE TABLE IF NOT EXISTS `bf_email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_email` varchar(254) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `alt_message` text,
  `max_attempts` int(11) NOT NULL DEFAULT '3',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `date_published` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `csv_attachment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_institutions`
--

DROP TABLE IF EXISTS `bf_institutions`;
CREATE TABLE IF NOT EXISTS `bf_institutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `bf_institutions`
--

INSERT INTO `bf_institutions` (`id`, `name`, `created_on`, `created_by`) VALUES
(7, 'Researcher, Romanian Academy, IaÅi Branch', '2015-10-24', 1),
(8, 'Lecturer, PhD, âApolloniaâ University of IaÅi', '2015-10-24', 1),
(9, '1Researcher, Department for Interdisciplinary Research in Social Sciences and Humanities âAlexandru Ioan Cuzaâ University of Iasi', '2015-10-24', 1),
(10, 'PhD Student, Faculty of Philosophy and Social-Political Sciences, âAlexandru Ioan Cuzaâ University, Iasi', '2015-10-24', 1),
(11, 'Department of Mass Communication, Rufus Giwa Polytechnic, Owo, Ondo State, Nigeria.', '2015-10-24', 1),
(12, 'PhD, Institute of Cultural Patrimony of the Academy of Sciences of Moldova, Republic of Modova', '2015-10-24', 1),
(13, 'PhD. Candidate, SOP HRD/159/1.5/S/132400 Project, Alexandru Ioan Cuza University of IaÅi, Romania.', '2015-10-24', 1),
(14, 'Lecturer, PhD, âApolloniaâ University of Iasi', '2015-10-24', 1),
(15, 'Prof. âModern Languages Instituteâ of Apolloniaâ University of Iasi, PhD Candidate, âStefan cel Mareâ University of Suceava', '2015-10-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bf_login_attempts`
--

DROP TABLE IF EXISTS `bf_login_attempts`;
CREATE TABLE IF NOT EXISTS `bf_login_attempts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_magazines`
--

DROP TABLE IF EXISTS `bf_magazines`;
CREATE TABLE IF NOT EXISTS `bf_magazines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `issn` varchar(50) DEFAULT NULL,
  `language` varchar(30) DEFAULT NULL,
  `publisher` varchar(200) DEFAULT NULL,
  `editorial_address` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `founded_year` int(11) DEFAULT NULL,
  `description` text,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bf_magazines`
--

INSERT INTO `bf_magazines` (`id`, `title`, `issn`, `language`, `publisher`, `editorial_address`, `email`, `website`, `phoneno`, `founded_year`, `description`, `approved`) VALUES
(3, 'International Journal of Communication Research', '2246-9265', 'en', 'âApolloniaâ Publishing House', 'IaÅi, Str. Muzicii nr. 2 - Romania', 'contact@ijcr.eu', 'www.ijcr.eu', '', 0, 'Issued under the patronage of the Academy of Romanian Scientists with the support of the âOamenii CetÄÅ£iiâ Foundation and âApolloniaâ University of IaÅi â Romania', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bf_magazines_categories`
--

DROP TABLE IF EXISTS `bf_magazines_categories`;
CREATE TABLE IF NOT EXISTS `bf_magazines_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `magazine_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_magazine_categories`
--

DROP TABLE IF EXISTS `bf_magazine_categories`;
CREATE TABLE IF NOT EXISTS `bf_magazine_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `magazine_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_magazine_issues`
--

DROP TABLE IF EXISTS `bf_magazine_issues`;
CREATE TABLE IF NOT EXISTS `bf_magazine_issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `magazine_id` int(11) NOT NULL DEFAULT '0',
  `volume` int(11) DEFAULT '0',
  `number` int(11) DEFAULT '0',
  `year_issue` int(11) DEFAULT NULL,
  `year_published` int(11) DEFAULT NULL,
  `special` varchar(100) DEFAULT NULL,
  `pdf_file` varchar(200) DEFAULT NULL,
  `cover_file` varchar(200) DEFAULT NULL,
  `status` enum('draft','pending','published') NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `bf_magazine_issues`
--

INSERT INTO `bf_magazine_issues` (`id`, `magazine_id`, `volume`, `number`, `year_issue`, `year_published`, `special`, `pdf_file`, `cover_file`, `status`) VALUES
(31, 3, 5, 3, 0, 2015, '', 'mag_3/31-qc23RQuGrPhCQwXz.pdf', 'mag_3/31-uMfAjVlcipjjaGp3.jpg', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `bf_magazine_staff`
--

DROP TABLE IF EXISTS `bf_magazine_staff`;
CREATE TABLE IF NOT EXISTS `bf_magazine_staff` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `magazine_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `magazine_id` (`magazine_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bf_magazine_staff`
--

INSERT INTO `bf_magazine_staff` (`id`, `magazine_id`, `user_id`, `role_id`) VALUES
(1, 1, 1, 8),
(5, 1, 6, 8),
(6, 2, 7, 8),
(7, 2, 8, 8),
(10, 1, 8, 8),
(11, 2, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `bf_permissions`
--

DROP TABLE IF EXISTS `bf_permissions`;
CREATE TABLE IF NOT EXISTS `bf_permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `bf_permissions`
--

INSERT INTO `bf_permissions` (`permission_id`, `name`, `description`, `status`) VALUES
(2, 'Site.Content.View', 'Allow users to view the Content Context', 'active'),
(3, 'Site.Reports.View', 'Allow users to view the Reports Context', 'active'),
(4, 'Site.Settings.View', 'Allow users to view the Settings Context', 'active'),
(5, 'Site.Developer.View', 'Allow users to view the Developer Context', 'active'),
(6, 'Bonfire.Roles.Manage', 'Allow users to manage the user Roles', 'active'),
(7, 'Bonfire.Users.Manage', 'Allow users to manage the site Users', 'active'),
(8, 'Bonfire.Users.View', 'Allow users access to the User Settings', 'active'),
(9, 'Bonfire.Users.Add', 'Allow users to add new Users', 'active'),
(10, 'Bonfire.Database.Manage', 'Allow users to manage the Database settings', 'active'),
(11, 'Bonfire.Emailer.Manage', 'Allow users to manage the Emailer settings', 'active'),
(12, 'Bonfire.Logs.View', 'Allow users access to the Log details', 'active'),
(13, 'Bonfire.Logs.Manage', 'Allow users to manage the Log files', 'active'),
(14, 'Bonfire.Emailer.View', 'Allow users access to the Emailer settings', 'active'),
(15, 'Site.Signin.Offline', 'Allow users to login to the site when the site is offline', 'active'),
(16, 'Bonfire.Permissions.View', 'Allow access to view the Permissions menu unders Settings Context', 'active'),
(17, 'Bonfire.Permissions.Manage', 'Allow access to manage the Permissions in the system', 'active'),
(18, 'Bonfire.Roles.Delete', 'Allow users to delete user Roles', 'active'),
(19, 'Bonfire.Modules.Add', 'Allow creation of modules with the builder.', 'active'),
(20, 'Bonfire.Modules.Delete', 'Allow deletion of modules.', 'active'),
(21, 'Permissions.Administrator.Manage', 'To manage the access control permissions for the Administrator role.', 'active'),
(22, 'Permissions.Editor.Manage', 'To manage the access control permissions for the Editor role.', 'active'),
(24, 'Permissions.User.Manage', 'To manage the access control permissions for the User role.', 'active'),
(25, 'Permissions.Developer.Manage', 'To manage the access control permissions for the Developer role.', 'active'),
(27, 'Activities.Own.View', 'To view the users own activity logs', 'active'),
(28, 'Activities.Own.Delete', 'To delete the users own activity logs', 'active'),
(29, 'Activities.User.View', 'To view the user activity logs', 'active'),
(30, 'Activities.User.Delete', 'To delete the user activity logs, except own', 'active'),
(31, 'Activities.Module.View', 'To view the module activity logs', 'active'),
(32, 'Activities.Module.Delete', 'To delete the module activity logs', 'active'),
(33, 'Activities.Date.View', 'To view the users own activity logs', 'active'),
(34, 'Activities.Date.Delete', 'To delete the dated activity logs', 'active'),
(35, 'Bonfire.UI.Manage', 'Manage the Bonfire UI settings', 'active'),
(36, 'Bonfire.Settings.View', 'To view the site settings page.', 'active'),
(37, 'Bonfire.Settings.Manage', 'To manage the site settings.', 'active'),
(38, 'Bonfire.Activities.View', 'To view the Activities menu.', 'active'),
(39, 'Bonfire.Database.View', 'To view the Database menu.', 'active'),
(40, 'Bonfire.Migrations.View', 'To view the Migrations menu.', 'active'),
(41, 'Bonfire.Builder.View', 'To view the Modulebuilder menu.', 'active'),
(42, 'Bonfire.Roles.View', 'To view the Roles menu.', 'active'),
(43, 'Bonfire.Sysinfo.View', 'To view the System Information page.', 'active'),
(44, 'Bonfire.Translate.Manage', 'To manage the Language Translation.', 'active'),
(45, 'Bonfire.Translate.View', 'To view the Language Translate menu.', 'active'),
(46, 'Bonfire.UI.View', 'To view the UI/Keyboard Shortcut menu.', 'active'),
(49, 'Bonfire.Profiler.View', 'To view the Console Profiler Bar.', 'active'),
(50, 'Bonfire.Roles.Add', 'To add New Roles', 'active'),
(51, 'Articles.Content.View', 'View Articles Content', 'active'),
(52, 'Articles.Content.Create', 'Create Articles Content', 'active'),
(53, 'Articles.Content.Edit', 'Edit Articles Content', 'active'),
(54, 'Articles.Content.Delete', 'Delete Articles Content', 'active'),
(67, 'Magazines.Content.Create', '', 'active'),
(68, 'Magazines.Content.View', '', 'active'),
(69, 'Magazines.Content.Edit', '', 'active'),
(70, 'Magazines.Content.Delete', '', 'active'),
(71, 'Permissions.Manager.Manage', 'To manage the access control permissions for the Manager role.', 'active'),
(72, 'Permissions.Editor-in-Chief.Manage', 'To manage the access control permissions for the Editor-in-Chief role.', 'active'),
(73, 'Magazines.Manage.All', '', 'active'),
(74, 'Issues.Content.Create', '', 'active'),
(75, 'Issues.Content.Edit', '', 'active'),
(76, 'Issues.Content.Delete', '', 'active'),
(77, 'Issues.Content.View', '', 'active'),
(78, 'Permissions.Contributor.Manage', 'To manage the access control permissions for the Contributor role.', 'active'),
(79, 'Permissions.Staff Manager.Manage', 'To manage the access control permissions for the Staff Manager role.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bf_roles`
--

DROP TABLE IF EXISTS `bf_roles`;
CREATE TABLE IF NOT EXISTS `bf_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  `login_destination` varchar(255) NOT NULL DEFAULT '/',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `default_context` varchar(255) NOT NULL DEFAULT 'content',
  `magazine_role` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bf_roles`
--

INSERT INTO `bf_roles` (`role_id`, `role_name`, `description`, `default`, `can_delete`, `login_destination`, `deleted`, `default_context`, `magazine_role`) VALUES
(1, 'Administrator', 'Has full control over every aspect of the site.', 0, 0, '', 0, 'content', 0),
(2, 'Editor', 'Can handle day-to-day management, but does not have full power.', 0, 1, '', 0, 'content', 0),
(4, 'User', 'This is the default user with access to login.', 1, 0, '', 0, 'content', 0),
(6, 'Developer', 'Developers typically are the only ones that can access the developer tools. Otherwise identical to Administrators, at least until the site is handed off.', 0, 1, '', 0, 'content', 0),
(8, 'Editor-in-Chief', '', 0, 1, '', 0, 'content', 1),
(9, 'Contributor', '', 0, 1, '', 0, 'content', 1),
(10, 'Staff Manager', '', 0, 1, '', 0, 'content', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bf_role_permissions`
--

DROP TABLE IF EXISTS `bf_role_permissions`;
CREATE TABLE IF NOT EXISTS `bf_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_role_permissions`
--

INSERT INTO `bf_role_permissions` (`role_id`, `permission_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 24),
(1, 25),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(2, 2),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 68),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 49),
(8, 2),
(8, 51),
(8, 52),
(8, 53),
(8, 54),
(8, 67),
(8, 68),
(8, 69),
(10, 67),
(10, 68),
(10, 69),
(10, 70),
(10, 73);

-- --------------------------------------------------------

--
-- Table structure for table `bf_schema_version`
--

DROP TABLE IF EXISTS `bf_schema_version`;
CREATE TABLE IF NOT EXISTS `bf_schema_version` (
  `type` varchar(40) NOT NULL,
  `version` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_schema_version`
--

INSERT INTO `bf_schema_version` (`type`, `version`) VALUES
('core', 43);

-- --------------------------------------------------------

--
-- Table structure for table `bf_sessions`
--

DROP TABLE IF EXISTS `bf_sessions`;
CREATE TABLE IF NOT EXISTS `bf_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_sessions`
--

INSERT INTO `bf_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('8007562c203771a92176191de8b0fa68', '79.112.24.48', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', 1445668720, 'a:12:{s:9:"user_data";s:0:"";s:14:"requested_page";s:35:"http://polyphemus-asi.com/index.php";s:13:"previous_page";s:35:"http://polyphemus-asi.com/index.php";s:7:"user_id";s:1:"1";s:11:"auth_custom";s:5:"admin";s:10:"user_token";s:40:"c96526bce2ea545a3ce34495a4d1825ffea07747";s:8:"identity";s:15:"admin@pubapp.ro";s:7:"role_id";s:1:"1";s:9:"logged_in";b:1;s:8:"language";s:7:"english";s:11:"magazine_id";s:1:"3";s:8:"issue_id";s:2:"31";}'),
('d9930a2ea7e109fe24cfb56164c1083a', '79.112.24.48', 'Mozilla/5.0 (Linux; U; Android 4.4.4; en-us; HM 1S Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chro', 1445666255, 'a:3:{s:9:"user_data";s:0:"";s:14:"requested_page";s:61:"http://polyphemus-asi.com/index.php/magazines/view/pub-27-266";s:13:"previous_page";s:61:"http://polyphemus-asi.com/index.php/magazines/view/pub-27-266";}');

-- --------------------------------------------------------

--
-- Table structure for table `bf_settings`
--

DROP TABLE IF EXISTS `bf_settings`;
CREATE TABLE IF NOT EXISTS `bf_settings` (
  `name` varchar(30) NOT NULL,
  `module` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_settings`
--

INSERT INTO `bf_settings` (`name`, `module`, `value`) VALUES
('auth.allow_name_change', 'core', '1'),
('auth.allow_register', 'core', '1'),
('auth.allow_remember', 'core', '1'),
('auth.do_login_redirect', 'core', '1'),
('auth.login_type', 'core', 'email'),
('auth.name_change_frequency', 'core', '1'),
('auth.name_change_limit', 'core', '1'),
('auth.password_force_mixed_case', 'core', '0'),
('auth.password_force_numbers', 'core', '0'),
('auth.password_force_symbols', 'core', '0'),
('auth.password_min_length', 'core', '8'),
('auth.password_show_labels', 'core', '0'),
('auth.remember_length', 'core', '1209600'),
('auth.user_activation_method', 'core', '1'),
('auth.use_extended_profile', 'core', '0'),
('auth.use_usernames', 'core', '1'),
('form_save', 'core.ui', 'ctrl+s/⌘+s'),
('goto_content', 'core.ui', 'alt+c'),
('mailpath', 'email', '/usr/sbin/sendmail'),
('mailtype', 'email', 'text'),
('password_iterations', 'users', '8'),
('protocol', 'email', 'mail'),
('sender_email', 'email', 'admin@pubapp.ro'),
('site.languages', 'core', 'a:1:{i:0;s:7:"english";}'),
('site.list_limit', 'core', '25'),
('site.show_front_profiler', 'core', '1'),
('site.show_profiler', 'core', '1'),
('site.status', 'core', '1'),
('site.system_email', 'core', 'admin@mybonfire.com'),
('site.title', 'core', 'Article Scientific Index'),
('smtp_host', 'email', ''),
('smtp_pass', 'email', ''),
('smtp_port', 'email', ''),
('smtp_timeout', 'email', ''),
('smtp_user', 'email', ''),
('updates.bleeding_edge', 'core', '1'),
('updates.do_check', 'core', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bf_states`
--

DROP TABLE IF EXISTS `bf_states`;
CREATE TABLE IF NOT EXISTS `bf_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `abbrev` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `bf_states`
--

INSERT INTO `bf_states` (`id`, `name`, `abbrev`) VALUES
(1, 'Alaska', 'AK'),
(2, 'Alabama', 'AL'),
(3, 'American Samoa', 'AS'),
(4, 'Arizona', 'AZ'),
(5, 'Arkansas', 'AR'),
(6, 'California', 'CA'),
(7, 'Colorado', 'CO'),
(8, 'Connecticut', 'CT'),
(9, 'Delaware', 'DE'),
(10, 'District of Columbia', 'DC'),
(11, 'Florida', 'FL'),
(12, 'Georgia', 'GA'),
(13, 'Guam', 'GU'),
(14, 'Hawaii', 'HI'),
(15, 'Idaho', 'ID'),
(16, 'Illinois', 'IL'),
(17, 'Indiana', 'IN'),
(18, 'Iowa', 'IA'),
(19, 'Kansas', 'KS'),
(20, 'Kentucky', 'KY'),
(21, 'Louisiana', 'LA'),
(22, 'Maine', 'ME'),
(23, 'Marshall Islands', 'MH'),
(24, 'Maryland', 'MD'),
(25, 'Massachusetts', 'MA'),
(26, 'Michigan', 'MI'),
(27, 'Minnesota', 'MN'),
(28, 'Mississippi', 'MS'),
(29, 'Missouri', 'MO'),
(30, 'Montana', 'MT'),
(31, 'Nebraska', 'NE'),
(32, 'Nevada', 'NV'),
(33, 'New Hampshire', 'NH'),
(34, 'New Jersey', 'NJ'),
(35, 'New Mexico', 'NM'),
(36, 'New York', 'NY'),
(37, 'North Carolina', 'NC'),
(38, 'North Dakota', 'ND'),
(39, 'Northern Mariana Islands', 'MP'),
(40, 'Ohio', 'OH'),
(41, 'Oklahoma', 'OK'),
(42, 'Oregon', 'OR'),
(43, 'Palau', 'PW'),
(44, 'Pennsylvania', 'PA'),
(45, 'Puerto Rico', 'PR'),
(46, 'Rhode Island', 'RI'),
(47, 'South Carolina', 'SC'),
(48, 'South Dakota', 'SD'),
(49, 'Tennessee', 'TN'),
(50, 'Texas', 'TX'),
(51, 'Utah', 'UT'),
(52, 'Vermont', 'VT'),
(53, 'Virgin Islands', 'VI'),
(54, 'Virginia', 'VA'),
(55, 'Washington', 'WA'),
(56, 'West Virginia', 'WV'),
(57, 'Wisconsin', 'WI'),
(58, 'Wyoming', 'WY'),
(59, 'Armed Forces Africa', 'AE'),
(60, 'Armed Forces Canada', 'AE'),
(61, 'Armed Forces Europe', 'AE'),
(62, 'Armed Forces Middle East', 'AE'),
(63, 'Armed Forces Pacific', 'AP');

-- --------------------------------------------------------

--
-- Table structure for table `bf_users`
--

DROP TABLE IF EXISTS `bf_users`;
CREATE TABLE IF NOT EXISTS `bf_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `email` varchar(254) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password_hash` char(60) NOT NULL,
  `reset_hash` varchar(40) DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(45) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `reset_by` int(10) DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_message` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT '',
  `display_name_changed` date DEFAULT NULL,
  `timezone` varchar(40) NOT NULL DEFAULT 'UM6',
  `language` varchar(20) NOT NULL DEFAULT 'english',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activate_hash` varchar(40) NOT NULL DEFAULT '',
  `force_password_reset` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bf_users`
--

INSERT INTO `bf_users` (`id`, `role_id`, `email`, `username`, `password_hash`, `reset_hash`, `last_login`, `last_ip`, `created_on`, `deleted`, `reset_by`, `banned`, `ban_message`, `display_name`, `display_name_changed`, `timezone`, `language`, `active`, `activate_hash`, `force_password_reset`) VALUES
(1, 1, 'admin@pubapp.ro', 'admin', '$2a$08$19kGCJNxs6DyDf.eAvRuP.jzHgMZpBna2atQMiqK27m9UF2lMQWka', NULL, '2015-10-24 05:22:51', '79.112.24.48', '2015-05-27 11:53:04', 0, NULL, 0, NULL, 'admin', NULL, 'UP2', 'english', 1, '', 0),
(2, 2, 'editor@pubapp.ro', 'editor', '$2a$08$QaMk76T.YCSuguYKP9s/rehyAwPxOHFV3zI7oTlw4kATsu1AwdYmK', NULL, '2015-07-01 23:26:12', '127.0.0.1', '2015-07-01 23:14:57', 0, NULL, 0, NULL, 'Editor', NULL, 'UM8', 'english', 1, '', 0),
(3, 4, 'htn.cosmindan@gmail.com', 'Cosmin Dan', '$2a$08$PNlpzuFyrPuTzRwJ8jhCButcHdxozmTupdok2A.pTr.SBQuvyIrny', NULL, '0000-00-00 00:00:00', '', '2015-09-27 14:26:10', 0, NULL, 0, NULL, 'Cosmin Dan', NULL, 'UP2', 'english', 0, '6ad13cd0af59a0fcc94d3dea597d479a5bae20df', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bf_user_cookies`
--

DROP TABLE IF EXISTS `bf_user_cookies`;
CREATE TABLE IF NOT EXISTS `bf_user_cookies` (
  `user_id` bigint(20) unsigned NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_on` datetime NOT NULL,
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_user_cookies`
--

INSERT INTO `bf_user_cookies` (`user_id`, `token`, `created_on`) VALUES
(1, 'P6pgDLR4oMDANfBDBv3uhq394ckFD6anrCZcQFsWXoQjApLoulWvINkB1MLw3XnlZjfOyjtuFZhEyT8itFWSmgxOkdgfhBZdoJYuPjSBKwILqRfXfpvsmghZuxTkkayd', '2015-08-08 05:35:06'),
(1, 'GM5sQ3p0NcUUt0AP2KrvldFOzNAOTFDhi8eL51Uni5S5TSjFRADEWUFqFLOBdJlyGH6vFNrgfIpueJmZ1EMLu25lb5XjGvPoM98oBrPgUskIF5sU5IbYuEkbN76tG9ip', '2015-09-29 00:16:40'),
(1, 'DteCDYr4VmL72HJHP6mrpzdisbNCDoZX6Y74RzG0LeqxH3RM6mGe3PCyluyG0PTWoqrilXjcJbFcbG9aKm1iEdfXNmM8fx5N5y707YGfNnRfFQBpMnjADrKsNRkFHzGs', '2015-10-24 05:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `bf_user_meta`
--

DROP TABLE IF EXISTS `bf_user_meta`;
CREATE TABLE IF NOT EXISTS `bf_user_meta` (
  `meta_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) NOT NULL DEFAULT '',
  `meta_value` text,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bf_user_meta`
--

INSERT INTO `bf_user_meta` (`meta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'state', 'NY'),
(2, 1, 'country', 'RO'),
(3, 2, 'state', 'HI'),
(4, 2, 'country', 'US'),
(5, 1, 'magazine', '2'),
(6, 3, 'state', ''),
(7, 3, 'country', 'RO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
