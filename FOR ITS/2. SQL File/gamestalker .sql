-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2015 at 04:45 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gamestalker`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `Co_id` int(20) NOT NULL AUTO_INCREMENT,
  `U_username` text NOT NULL,
  `Co_content` varchar(350) NOT NULL,
  `Co_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `C_id` int(20) NOT NULL,
  PRIMARY KEY (`Co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Co_id`, `U_username`, `Co_content`, `Co_date`, `C_id`) VALUES
(8, 'ContributerTest', 'Test comment from contributer in review', '2015-05-17 00:05:18', 15),
(14, 'AdminTest', 'Test Comment from admin in review', '2015-05-17 13:04:58', 15),
(32, 'ContributorTest', '\r\nedited comment twice', '2015-05-18 00:54:42', 16),
(45, 'UserTest2', 'T1', '2015-05-18 02:07:05', 13),
(46, 'UserTest2', 'T2', '2015-05-18 02:07:09', 13),
(47, 'AdminTest', 'Test', '2015-05-18 02:17:03', 13),
(49, 'AdminTest', '\r\nT1', '2015-05-18 02:24:55', 12);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `C_id` int(20) NOT NULL AUTO_INCREMENT,
  `C_title` text NOT NULL,
  `C_type` int(1) NOT NULL,
  `C_description` text NOT NULL,
  `C_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `U_username` text NOT NULL,
  PRIMARY KEY (`C_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`C_id`, `C_title`, `C_type`, `C_description`, `C_date`, `U_username`) VALUES
(12, 'Dota 2 new updates!', 1, '<p style="text-align: center;">This is just a test to see how far the string will take me to the end</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="/gs/assets/cImg/W3.jpg" alt="" /></p>\r\n<ul>\r\n<ul>\r\n<li>AoE Bonus Gold component based on Team Net Worth difference reduced by 25%</li>\r\n<li>AoE Bonus XP component based on Team XP difference reduced by 40%</li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>Melee lane creep bounty reduced from 43 to 40 (-7%)</li>\r\n<li>Range lane creep bounty reduced from 48 to 45 (-6.25%)</li>\r\n<li>Hero kills (the non-net worth portions) are worth 10% more</li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<p><img src="/gs/assets/cImg/W2.png" alt="" /></p>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>Reduced the direct hero last hit bounty by 100 and redistributed that gold into AoE gold (in ratio of 100/75/40/25/20 for 1/2/3/4/5 heroes)<a class="ChangeDetailsTrigger" href="http://www.dota2.com/684/">[?]</a></li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>AoE Bonus Gold is now distributed based on the relative net worth amongst the heroes involved in killing the hero by +/- 25% <a class="ChangeDetailsTrigger" href="http://www.dota2.com/684/">[?]</a></li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>The amount of AoE Bonus Gold given is now increased/decreased by up to 20% based on the dying hero’s relative rank in net worth amongst all the enemies on that team.<a class="ChangeDetailsTrigger" href="http://www.dota2.com/684/">[?]</a></li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>Instead of Buyback temporarily preventing unreliable gold gain, it now reduces all gold gained (including hero and aoe gold) by 60% <a class="ChangeDetailsTrigger" href="http://www.dota2.com/684/">[?]</a></li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>Melee Barracks team bounty increased from 175 to 275</li>\r\n<li>Ranged Barracks team bounty increased from 100 to 225</li>\r\n<li>Tier 2 and 3 towers armor reduced from 25 to 22</li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>Extra melee creeps additions spawn time changed from 17:30/34:00/50:30 to 15:00/30:00/45:00 <a class="ChangeDetailsTrigger" href="http://www.dota2.com/684/">[?]</a></li>\r\n<li>Extra range/siege creep additions spawntime from 45:30 to 45:00</li>\r\n<li>Creeps now meet slightly closer to the Dire safelane</li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>Ancient Black Dragon bounty reduced from 199 to 170</li>\r\n<li>Ancient Black Drake bounty reduced from 50 to 40</li>\r\n<li>Ancient Rumblehide bounty reduced from 83 to 65</li>\r\n<li>Satyr Tormenter gold bounty reduced from 104 to 84</li>\r\n<li>Hellbear health reduced from 950 to 700</li>\r\n<li>Hellbear bounty reduced from 65 to 50</li>\r\n<li>Ogre Frostmage bounty reduced from 52 to 40</li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>Reworked Mud Golems:</li>\r\n</ul>\r\n</ul>\r\n<p><input id="eToggle0" class="ChangeDetailsEToggle" type="button" value="+ Show Details" /><br /><br /></p>\r\n<ul>\r\n<ul>\r\n<li>Hero kills achieved by units under your control now provide XP credit to your hero (Affects things like Spirit Bear, Golems, Familiars, etc getting kills)</li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>Melee attacks now miss if the target is farther than 350 range more than their attack range</li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<ul>\r\n<li>Reduced All Pick drafting time from 40 to 35 seconds per turn</li>\r\n</ul>\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n<li>The following abilities no longer ignore units classified as Ancients (Neutral Ancients, Warlock''s Golem, etc): Ice Vortex, Mana Void, Berserker''s Call, Blood Rite, Bladefury, Omnislash, Torrent, Ghost Ship, Smokescreen, Static Remnant, Primal Roar, Earth Spike, Heartstopper Aura, Shrapnel, Golem''s Immolation, Sticky Napalm, Primal Split''s Immolation, Call Down, Invoker''s Tornado, EMP, Chaos Meteor, Sun Strike, Ice Wall, Deafening Blast, Pulse Nova, Eclipse, Battery Assault, Rocket Flare, Shadow Poison, Dispersion, The Swarm, Kinetic Field, Static Storm, Ancestral Spirit, Echo Stomp, Overwhelming Odds, Stone Gaze, Earth Bind, Poof, Rip Tide, Nyx''s Impale, Fire Spirits, Supernova, Mystic Flare, Dark Pact, Suicide Squad, Ravage, Demonic Purge, Fortune''s End <a class="ChangeDetailsTrigger" href="http://www.dota2.com/684/">[?]</a></li>\r\n</ul>\r\n<p> </p>\r\n<p style="text-align: center;"><img src="/gs/assets/cImg/W1.jpg" alt="" /></p>', '2015-05-16 21:43:39', 'AdminTest'),
(13, 'Assasin''s creed IV game ', 3, '<p>Welcome to the <a class="mw-redirect" title="Assassin''s Creed 4: Black Flag" href="http://www.ign.com/wikis/assassins-creed-4-black-flag/Assassin%27s_Creed_4:_Black_Flag">Assassin''s Creed 4: Black Flag</a> <strong class="selflink">Walkthrough</strong>. Here, you will find all the information you need for a 100% Sync Guide as well as information on all of the <a title="Collectibles" href="http://www.ign.com/wikis/assassins-creed-4-black-flag/Collectibles">Collectibles</a>, <a title="Cheats and Secrets" href="http://www.ign.com/wikis/assassins-creed-4-black-flag/Cheats_and_Secrets">Cheats and Secrets</a>, <a title="Side Missions" href="http://www.ign.com/wikis/assassins-creed-4-black-flag/Side_Missions">Side Missions</a>and tons more. Please help out by editing the wiki with any helpful information you may find!</p>\r\n<p> </p>\r\n<p style="text-align: center;"><img src="/gs/assets/cImg/D1.jpg" alt="" /></p>\r\n<p>As soon as the game begins, you take control of Edward Kenway. Start off by approaching the ship''s steering wheel and taking control. Follow the onscreen prompts and fire the ship''s cannons at the enemy ships.</p>\r\n<p>There are FIVE ships to destroy, four schooners and a frigate. Fire the cannons at the first four schooners to blow them up. When all four are gone, fire more cannons at the frigate until a cutscene occurs.</p>\r\n<p style="text-align: center;"><img src="/gs/assets/cImg/D2.jpg" alt="" /></p>\r\n<p style="text-align: center;"> </p>\r\n<p style="text-align: left;">When control returns to Edward, swim towards the beach to meet with the Assassin. After some choice words, the Assassin runs off. From here, you can stick to the plot and chase after him OR....explore the island to find some goodies.</p>\r\n<p style="text-align: left;"> </p>\r\n<p style="text-align: center;"><img src="/gs/assets/cImg/D3.jpg" alt="" /></p>', '2015-05-16 23:51:11', 'AdminTest'),
(15, 'Eve Online review', 2, '<p>"All of it surprises me."</p>\r\n<p>Alex "The Mittani" Gianturco is a long-time <em>Eve Online</em> player. In real life, he''s a retired DC attorney. In <em>Eve</em>, he''s a ruthless space dictator. Thinking about his journey from fresh-faced player to being arguably the most powerful person in the game, he tells me none of it was planned. "If you were to tell me five years ago I''d be living in Wisconsin and running a space empire full time, I''d think you were crazy." But that''s what he now does. Most of his days are spent managing people in his space alliance, running his own video game news website and doing yoga.</p>\r\n<p>I''ve sought out Gianturco because I want to understand the draw of the game. Whenever <em>Eve Online</em> makes headlines, there''s a good chance Gianturco has had something to do with it. A quick search of his name reveals that he''s helped start wars, spied on enemies, orchestrated espionage missions and made a name for himself by leading the biggest and baddest group of players in the game. His experience with <em>Eve</em> has been so full of drama, back-stabbing and deception, there''s enough juicy fodder for a tell-all memoir.</p>\r\n<p>As someone who has tried to play the game and quit multiple times out of sheer boredom, all of this surprises <em>me</em>.</p>\r\n<p>Few games have such a conflicting outward image. <em>Eve Online</em> is famously exciting, but also notoriously dull. <em>Eve Online</em> will lure in players with its stories of spying, trust and betrayal, but even long-time players will say that most people tune out before they even get past the tutorial. <em>Eve Online</em> is the most fun you''ll ever have in a game. <em>Eve Online</em>will put you into a coma.</p>\r\n<p>I want to know what I''m missing. Is the game really just "spreadsheets in space," as many players have joked? Or have players like Gianturco found the key to another part of the universe that I''ve not yet seen?</p>\r\n<p>"The fun stuff in <em>Eve</em> is something that most players don''t get to experience until they''ve played the game for six months to a year," Gianturco says. Patience is key. It takes time to learn the game''s mechanics. It takes time to learn the game''s economy. Most importantly, it takes time to realize everything is connected, whether the players like it or not. "Everyone is trapped in the same galaxy," Gianturco says, "like rats in a cage."</p>\r\n<p><img src="http://assets.sbnation.com.s3.amazonaws.com/polygon/eve2-17-2014/corp-color.jpg" alt="" /></p>\r\n<div class="chorus-snippet section_title">\r\n<h2>Origins in Iceland</h2>\r\n</div>\r\n<p>I meet with the developer of <em>Eve Online</em>, CCP CEO Hilmar Pétursson at the company''s exhibition space during the 2013 Electronic Entertainment Expo (E3) in Los Angeles. Most publishers at E3 have brightly-lit booths, often accompanied by loud, thumping music and strobe lights to draw attention. CCP''s booth is tucked away in a room upstairs, far from the main show floor. The room is deliberately dark — an attempt to mimic the sensation of being in space. Speakers play the sound you hear when you''re sitting in your ship in <em>Eve Online</em> (think: the hum of a hardworking air-conditioner).</p>\r\n<p>Pétursson takes a seat opposite me in a cordoned-off room. There''s a calmness and patience to the way he speaks and carries himself. He has a thick Icelandic accent that makes his words sound like they''re underlined. If he told you he was disappointed in you, you''d believe it. He tells me he just came from a meeting with Hollywood executives — they were having talks about turning the stories from <em>Eve Online</em> into a television series.</p>\r\n<p>"About those stories," I say, interrupting him. I tell him what I''ve heard. I tell him about the stories of spying, of huge battles, of intrigue and espionage. I tell him I know that <em>Eve Online</em> has these stories, but as someone who has flown around in one of its little spaceship myself, I have no idea where they''re coming from.</p>\r\n<p><em>Eve Online</em> is, in gaming terms, a "sandbox" game. Like a sandbox found in a playground, the game has provided players with the tools and environment to make and do what they want. There''s no story to follow and unravel. The game doesn''t give players a good guy to help or a bad guy to defeat. Everyone plays on the same server.</p>\r\n<p>Within the server are solar systems and regions, each with different minerals that players can mine and use to craft items. These items and resources can be bought and sold on the in-game marketplace using the in-game currency, ISK.</p>\r\n<p>ISK is an unusual video game currency. For one, it''s not stagnant. It fluctuates like real-world currencies do. It also has a real-world value, which many <em>Eve</em> players take advantage of. ISK can''t be converted into real-world money, but it can be used to buy an item called PLEX. PLEX can be used for two things: it can be converted back into a sizable chunk of ISK, or it can be used to buy game time. The cost of a monthly subscription to <em>Eve</em> is approximately $15, so as the price of PLEX fluctuates on the in-game market, the real-world value of ISK also fluctuates. This means if someone makes enough ISK in the game, they can use that ISK to buy PLEX, and use that PLEX to pay for their monthly <em>Eve</em> subscription. That''s the simple side of it, at least.</p>', '2015-05-16 23:55:03', 'AdminTest'),
(16, 'This is the new NEWS', 1, '<p>Test article</p>\r\n<p> </p>\r\n<p style="text-align: center;"><img src="/gs/assets/cImg/D0.jpg" alt="" /></p>', '2015-05-18 00:52:05', 'ContributorTest');

-- --------------------------------------------------------

--
-- Table structure for table `content_picture`
--

CREATE TABLE IF NOT EXISTS `content_picture` (
  `CP_id` int(11) NOT NULL AUTO_INCREMENT,
  `CP_filename` varchar(60) NOT NULL,
  `CP_dir` text NOT NULL,
  `C_id` int(11) NOT NULL,
  PRIMARY KEY (`CP_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `content_picture`
--

INSERT INTO `content_picture` (`CP_id`, `CP_filename`, `CP_dir`, `C_id`) VALUES
(67, 'A News Article5548cb51ce57e0.83910219.jpg', 'assets/images/uploadsA News Article5548cb51ce57e0.83910219.jpg', 83),
(68, 'A News Article5548cb51cf2423.85258015.jpg', 'assets/images/uploadsA News Article5548cb51cf2423.85258015.jpg', 83),
(69, 'A Review Article5548cb6c2274b0.37783520.jpg', 'assets/images/uploadsA Review Article5548cb6c2274b0.37783520.jpg', 84),
(70, 'A Review Article5548cb6c232df7.97335910.jpg', 'assets/images/uploadsA Review Article5548cb6c232df7.97335910.jpg', 84),
(71, 'Walk with me!5548cb7e9f9808.94325823.jpg', 'assets/images/uploadsWalk with me!5548cb7e9f9808.94325823.jpg', 85),
(72, 'Walk with me!5548cb7ea068d7.39447570.jpg', 'assets/images/uploadsWalk with me!5548cb7ea068d7.39447570.jpg', 85),
(81, 'HAAA554d9e82364d85.51820659.jpg', 'assets/images/uploadsHAAA554d9e82364d85.51820659.jpg', 94),
(82, 'GOGO554da08cb5c344.91731455.jpg', 'assets/images/uploadsGOGO554da08cb5c344.91731455.jpg', 95),
(83, 'A1554da56c6117e4.12525812.jpg', 'assets/images/uploadsA1554da56c6117e4.12525812.jpg', 96),
(84, 'tester554dade4a080e0.68436008.jpg', 'assets/images/uploadstester554dade4a080e0.68436008.jpg', 97),
(85, 'a554dbe337a60a6.54115963.jpg', 'assets/images/uploadsa554dbe337a60a6.54115963.jpg', 98),
(86, 'Test554dc168522161.18311536.jpg', 'assets/images/uploadsTest554dc168522161.18311536.jpg', 99),
(87, 'Test2554dc2771c3c65.66360734.jpg', 'assets/images/uploadsTest2554dc2771c3c65.66360734.jpg', 100),
(102, 'Css5557ba0bc9f6a5.13361639.jpg', 'assets/images/uploadsCss5557ba0bc9f6a5.13361639.jpg', 12),
(103, 'Assasin''s creed IV game 5557d7ef3651b5.84605254.jpg', 'assets/images/uploadsAssasin''s creed IV game 5557d7ef3651b5.84605254.jpg', 13),
(105, 'Eve Online review5557d8d7a1f7d2.84281023.jpg', 'assets/images/uploadsEve Online review5557d8d7a1f7d2.84281023.jpg', 15),
(106, 'This is the new NEWS555937b5643110.53159107.jpg', 'assets/images/uploadsThis is the new NEWS555937b5643110.53159107.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `U_username` varchar(32) NOT NULL,
  `U_password` varchar(32) NOT NULL,
  `U_email` varchar(30) NOT NULL,
  `U_type` int(1) NOT NULL,
  `U_status` int(1) NOT NULL,
  `U_dateRegistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`U_username`),
  UNIQUE KEY `U_email` (`U_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_username`, `U_password`, `U_email`, `U_type`, `U_status`, `U_dateRegistered`) VALUES
('AdminTest', '25d55ad283aa400af464c76d713c07ad', 'default_admin@admin.com', 0, 1, '2015-05-16 23:59:08'),
('ContributorTest', '25d55ad283aa400af464c76d713c07ad', 'default_contributor@contribute', 1, 1, '2015-05-17 00:01:35'),
('TestAnother', '25f9e794323b453885f5181f1b624d0b', 'gag@gmail.com', 2, 1, '2015-05-18 00:34:25'),
('UserTest2', '25d55ad283aa400af464c76d713c07ad', 'default_user@user.com', 1, 1, '2015-05-17 00:01:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
