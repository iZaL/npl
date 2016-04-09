-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: npl
-- ------------------------------------------------------
-- Server version	5.5.38-0+wheezy1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body_en` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_question_id_index` (`question_id`),
  KEY `answers_parent_id_index` (`parent_id`),
  KEY `answers_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,1,0,2,'<p>Because of electron-electron repulsion in multi electron atoms</p>','2016-04-08 14:48:21','2016-04-08 14:48:21',NULL),(2,1,1,2,'<p>Is this OK for you?</p>','2016-04-08 14:49:17','2016-04-08 14:49:17',NULL),(3,1,1,2,'<p>Because of electron-electron repulsion in multi electron atoms. Is this OK for you?</p>','2016-04-08 14:56:08','2016-04-08 14:56:08',NULL),(4,2,0,2,'<p>The Shrordinger equation predicts n, l, m quantum numbers, while the spin quantum number is predicted experimentally</p>','2016-04-08 18:17:03','2016-04-08 18:17:03',NULL),(5,2,4,2,'<p>The Shrordinger equation predicts n, l, m quantum numbers, while the spin quantum number is predicted experimentally</p>','2016-04-08 18:17:41','2016-04-08 18:17:41',NULL);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,1,'','Veniam adipisci debitis id ad dolores nulla nihil qui asperiores perspiciatis deserunt corporis dolor quasi voluptatem nostrum nihil hic sit ratione commodi et qui dignissimos facere quas omnis qui et et praesentium ullam ea commodi culpa quam reiciendis ',NULL,'','Soluta et incidunt dolor velit unde voluptatem earum voluptates facere et ex velit aut rerum assumenda voluptates odit sit veniam dolore sit veniam eligendi accusantium quasi cum nisi reprehenderit ipsum nisi aut adipisci sed porro et et repellat et veniam nostrum voluptas animi fugiat quis vel voluptates aliquid qui delectus ut ut voluptatem sint voluptatem id maiores necessitatibus minus voluptatem sed voluptas et magni aut sunt assumenda impedit quos praesentium praesentium accusamus quod quis voluptas libero aperiam iste et recusandae minima eaque ut accusamus distinctio quas perferendis nihil eius perferendis impedit minus omnis impedit blanditiis facere ipsa reiciendis aut aperiam voluptatibus earum nulla officiis magnam laboriosam eos quis atque voluptates in omnis atque ducimus maxime quidem repellat et modi voluptatem accusamus culpa magnam enim consectetur et ea quae sunt cumque perferendis non debitis nam quisquam eos quia non repellendus ipsum distinctio earum est vel voluptatibus deserunt veritatis dicta possimus in nostrum quas molestias et voluptas rem placeat omnis sed repellendus sed quam sed ipsam architecto aut quo aut vitae omnis quibusdam totam vero culpa sunt qui autem molestias et dolorum rem qui pariatur iste reiciendis hic dolore necessitatibus molestiae quia molestiae voluptatem iusto voluptatem repellendus praesentium est ut minus minima incidunt vero laudantium ut ipsum sed quam aperiam dignissimos recusandae eos nulla repellendus possimus recusandae voluptate laudantium sequi voluptas quod animi voluptatum velit ullam quia assumenda voluptatibus ab ipsum dolor ducimus necessitatibus doloribus ut et qui illo et error dolores quia nulla vel aliquid rerum eos voluptas cumque omnis doloribus pariatur et amet id saepe provident error quia rerum autem sint qui magnam aut odio vel inventore ut velit laboriosam officiis velit incidunt et facilis numquam architecto amet est libero rerum est reiciendis velit quis vel dolor assumenda ducimus mollitia ut qui laboriosam voluptatem aliquid eius porro quia dolor odio eveniet aut voluptate a laborum culpa minus ullam ratione sed perferendis sit sed sit fugiat mollitia sit et quas quis fugit est adipisci necessitatibus voluptatibus deleniti qui odio consectetur et dolorum eligendi eum ut hic voluptatem temporibus eos dolor dolores vel dignissimos expedita optio qui quisquam aperiam eos totam enim laborum quisquam quo eaque pariatur quia earum quis inventore sint eos veritatis asperiores tempore quibusdam et tempora veritatis illo laboriosam aut assumenda beatae corporis nostrum voluptas esse maxime et omnis molestias est aliquid temporibus nostrum quia eius provident porro vel est aut ut beatae eveniet corrupti vel ipsa aut illum quia impedit dolores consequatur distinctio fugit deleniti omnis ducimus aut impedit non est qui non quos accusantium et ea nulla sed qui vero sequi provident magnam odio quos quia culpa quia quisquam voluptatem rerum doloremque et aut quas eaque maiores et molestiae quia est non nam dolore autem mollitia repellat officiis expedita mollitia placeat unde nihil maiores quisquam ex asperiores magnam mollitia incidunt placeat tenetur et dignissimos et dolorem minus molestias optio quasi incidunt ad ab quisquam libero ducimus recusandae similique facere ea sunt deleniti veritatis necessitatibus corrupti a ipsam est rem rerum et nihil animi quibusdam sint nesciunt qui et magni eum ducimus odit atque autem doloribus soluta cum nam laboriosam ratione animi saepe aliquam voluptatem ut earum voluptatem ipsum similique quasi voluptas reprehenderit magnam nemo suscipit accusamus id rerum nobis quas sequi accusantium sequi dolorem maiores magni alias rerum qui est accusantium accusantium provident consequuntur at vel quidem dicta a ex ut aliquid deleniti alias qui et tenetur possimus qui non sed sed aut consequatur quis placeat ut quidem repellat eum modi reiciendis placeat consequatur rerum necessitatibus tempora eligendi eligendi placeat sunt quam quia odit error ab unde praesentium similique aut at molestias dolor in tempora eos dolorum temporibus illum velit assumenda voluptates blanditiis placeat aut ab aliquam velit exercitationem exercitationem numquam quaerat voluptatem ab nihil aliquam quo nisi a est expedita nobis magni impedit quia consectetur aspernatur sed magnam dicta omnis qui facilis odit nam repellendus consectetur asperiores voluptas aspernatur natus reiciendis quia blanditiis ducimus sint ducimus unde sunt doloribus odio minima rerum nesciunt adipisci autem vitae quas magnam sunt officia sunt maiores porro id fugiat sunt voluptate quia ex eum ut ipsa hic laborum ut qui perspiciatis dolore doloremque et voluptatem est ut quas sequi aliquam ut autem accusamus ratione ducimus quasi deleniti et sunt tempora nesciunt repellat molestias explicabo sit voluptatem cum qui cumque dolorum aut odit consectetur omnis aspernatur dolor aut aliquam voluptate quidem voluptatibus ipsam ipsum occaecati sint eveniet distinctio tenetur sint praesentium debitis et tempora voluptates ullam rerum dolore doloribus at eaque odit et magni placeat corrupti mollitia libero maiores rerum et tempora numquam delectus eveniet et ut et nihil quas ut nobis aut adipisci qui officiis laboriosam nulla unde voluptates consequatur modi accusamus ipsa incidunt aliquid aspernatur soluta repudiandae vitae quis omnis mollitia accusantium error in odio perspiciatis eaque sunt sed corrupti ratione iste qui voluptates temporibus dolorum facere omnis incidunt odit nemo sed exercitationem et et qui nobis occaecati doloremque quisquam architecto commodi quasi assumenda quia libero voluptatibus aliquam laborum itaque possimus nobis quia autem repudiandae rerum rerum maxime ut quisquam quam enim nostrum quisquam nisi neque temporibus fugiat iusto veritatis minus libero voluptate nisi fuga illum nihil sit laborum ex qui qui expedita eos consequatur esse inventore enim nemo quo commodi possimus ut sunt consequatur pariatur quidem ducimus ut sit fuga aut quis similique illo et consequuntur et magni animi dolores dignissimos sit animi autem consequatur odio ratione aut enim occaecati in sed consequatur maiores harum nihil sint delectus ipsum libero natus et sunt sint distinctio voluptatem ipsam architecto et nulla rerum explicabo nostrum perferendis et excepturi quasi voluptatum totam velit nesciunt mollitia quibusdam quibusdam ea repudiandae aut rerum dolor voluptatum rerum in nemo veritatis libero eaque facere earum rerum in ut hic dolore soluta et id consequatur perferendis aut est et quis quas rerum nostrum rerum quas nulla voluptas consequuntur odit et voluptatibus et consequuntur delectus voluptas vitae quo asperiores esse ratione ut et impedit a officia id sapiente voluptas exercitationem et est voluptas nobis error distinctio molestias sit omnis sit velit magni quo temporibus labore adipisci consequuntur rerum laudantium et laboriosam ut fuga harum alias illo eos aut architecto quia sed est numquam accusantium quasi dolor tempore quis sint ratione porro vel corporis est delectus sint voluptatem voluptates facere voluptas ducimus saepe voluptas et fugit necessitatibus aut consequatur error expedita quidem accusantium quo non error amet dicta aperiam debitis repudiandae voluptas odio adipisci reprehenderit sit iste veniam soluta consectetur neque aperiam et et cum rerum labore aut repellendus eos sed ipsum assumenda est quod earum nobis omnis magni saepe molestiae odit ut sit blanditiis rem ut hic optio non incidunt culpa quo illum et est aut aut nulla consequuntur nisi qui vel aut repellendus mollitia est quia quia distinctio reiciendis impedit iusto delectus hic aliquam consequatur magni autem aut aliquid sed voluptas fugit velit voluptatum quasi sed in.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,1,'','Et fugiat sunt sequi ducimus quod et dolore quibusdam dolor praesentium eum non incidunt nam omnis aut dolores amet aspernatur impedit laborum tempore qui nihil qui quos voluptates aliquid dicta laborum sit nam libero molestiae et reiciendis dolorem dicta',NULL,'','Iusto saepe labore natus ipsam autem perferendis nostrum et rerum a reprehenderit nesciunt molestiae excepturi cum ex voluptatem culpa quod voluptatem sit reprehenderit et blanditiis qui totam velit ducimus rem voluptas iure sit et et non fugit molestiae similique voluptate ut odio culpa aut reiciendis in ab alias ut quo voluptatum impedit quae modi magni aliquam provident autem est iure ratione placeat aspernatur et assumenda recusandae ut consequatur quis eos qui inventore dignissimos autem ea est accusamus non doloribus amet odit dolorem iste quidem consequatur distinctio veritatis et voluptates in sint quia nihil et harum est labore et quaerat incidunt expedita velit enim et consequatur animi soluta nemo possimus sit et pariatur explicabo et quia reprehenderit esse rerum pariatur qui unde ut enim consequatur aliquam esse enim odio eaque sed quis qui ut vel aliquam quam id aut vitae quaerat omnis qui voluptas iste ratione libero ad et iure dignissimos cupiditate voluptates voluptas neque saepe sed cum qui et voluptatum ut sint veniam minus recusandae quo iusto debitis eius aut voluptatem consectetur odio nostrum et delectus repellat odio nam tempora sapiente velit aperiam voluptates quia sunt dolorum sit occaecati quia et eum aut dolorem quam labore recusandae tempore sint rem qui corporis voluptate sed ut porro beatae labore et ab quasi quo molestiae maiores explicabo laudantium tempore ipsam mollitia natus voluptas possimus deserunt eos repellat sapiente ex dolores cupiditate est dolorem voluptas dolore deleniti quia unde et officiis omnis magnam quasi quia ad est earum maiores soluta rerum voluptatem dignissimos magni rerum dolores quam qui dicta quasi tempore minima eum est tempora sit vitae vitae officiis quasi enim et qui perferendis corporis ut qui et blanditiis iusto repellat qui voluptas officia autem ipsa enim dolore sed excepturi sunt illo rerum repudiandae animi necessitatibus aperiam laborum fugit qui asperiores reiciendis beatae molestias sint vel aut sed quibusdam eligendi voluptatum sed praesentium totam blanditiis reiciendis rerum ab saepe nam id similique aut minus expedita quasi laborum illum animi ut doloribus molestiae voluptatem natus neque repellendus totam et exercitationem ex facere quis distinctio consequuntur et accusamus provident labore sit et architecto dolores asperiores amet aliquam quas sint consequuntur error ut mollitia eius expedita autem odit impedit illo amet autem iste ducimus facere doloribus vel nobis possimus distinctio cumque quia nulla dolores et recusandae repellat ad vel corrupti at autem quibusdam incidunt et minima quod distinctio laborum quia et similique et minus nesciunt nulla id veniam itaque aut saepe consectetur ad illo aut qui animi adipisci nisi quod et ullam quis ducimus voluptatem ea reprehenderit inventore placeat omnis quisquam explicabo corporis nam id sequi illum dolorem accusantium et at quae numquam in quis dicta neque dolorum mollitia eveniet quae quia eos sequi voluptatem non eius ex qui nihil tempore quas quidem sed aut harum velit saepe quis rerum dolorem aspernatur autem ut neque consectetur in dolorem voluptas eos nesciunt rerum voluptatum fuga magnam consequatur dolor perspiciatis aperiam eos quae quis delectus sed odio nostrum sapiente a minus consequatur sit praesentium itaque dolores architecto est omnis fugiat cum modi quasi quis est velit qui quam occaecati aperiam veritatis dolore vel voluptatibus occaecati nisi iste rem doloribus et enim eius reprehenderit omnis repudiandae animi laboriosam et quidem officia iusto odit soluta culpa fugiat error quo dolores illo animi eius magni et reiciendis iusto laboriosam aut hic enim laboriosam vitae nam architecto velit beatae maxime dolor ut consequatur tempora dolor minus pariatur deserunt soluta facilis qui consequatur quo nisi nam ea repellendus soluta ipsam iusto doloremque adipisci deleniti qui molestiae excepturi id doloribus inventore repellendus distinctio repudiandae et laudantium dolores ducimus ut eum totam beatae sed aspernatur alias id accusamus id doloremque in quis minima vitae recusandae consequuntur harum non dolor provident magni enim eum sed totam nihil accusamus est dolorem dolorem sit provident eum et optio unde dolor molestiae et velit excepturi asperiores molestiae qui est voluptatem iure nulla sed necessitatibus sequi similique iste quia provident maiores fuga minus debitis ut tenetur est culpa nostrum minima repellendus voluptas dolorum vel odit voluptas nostrum suscipit voluptates pariatur et incidunt minus voluptatibus sit voluptatem est voluptatibus temporibus aut nobis illo voluptatem blanditiis sint eius aut recusandae adipisci non expedita sit hic dolorem sint qui et aut eaque possimus omnis veniam dolorem illo eius in laudantium dolores quaerat praesentium velit et inventore reprehenderit aut sit impedit omnis delectus sunt distinctio libero ipsa qui cumque quia ipsa expedita nisi corrupti laborum non nemo itaque nam possimus ea voluptas sed mollitia in autem ut corrupti minima omnis et et voluptatem debitis consequuntur reprehenderit ipsam eveniet sint incidunt non consequuntur deleniti doloribus quibusdam incidunt alias et aperiam nam aspernatur vitae sint id ut adipisci ducimus dolorem aliquam iusto omnis voluptatem vero non architecto veritatis quia quia ut veniam explicabo voluptas ipsam veritatis quisquam qui voluptate adipisci dolor asperiores et est quia illo quisquam distinctio iure quasi ut hic accusantium id doloremque ut labore aliquid aliquid quo qui laudantium explicabo maiores sunt necessitatibus eveniet modi nobis nostrum quaerat sunt a eaque quam incidunt dolorem non quod sit animi ullam accusamus molestiae sint iure temporibus consequatur et est rem sunt commodi sint quaerat error necessitatibus est minima quaerat itaque voluptatum quis id et dolorem reiciendis omnis ipsum ea saepe at voluptatem blanditiis eius consequatur dolorem et aspernatur rerum quidem quas nisi sapiente sit quia officia cumque provident iste in veritatis labore commodi omnis in distinctio facilis ratione sint necessitatibus aut aspernatur quae voluptatem rem soluta illo corrupti omnis sit quasi unde esse fuga nihil aliquid.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,1,'','Quidem delectus rerum hic nulla et et voluptatum tempore hic dolor provident assumenda quaerat quasi libero et iste quis iure atque dignissimos eum magnam voluptas quasi in molestias impedit dicta aut sed omnis aliquam aut reiciendis eveniet qui corrupti ',NULL,'','Rem ea facilis nam velit animi vel ad nulla harum sunt qui cupiditate nam aliquam in autem et ad numquam quis beatae et est nam fuga animi blanditiis neque asperiores soluta pariatur voluptatibus aut exercitationem aliquam autem voluptas accusantium et non voluptatem repellendus sit quis eos possimus laboriosam minus rerum et quas et quia nobis nobis sunt amet ut eveniet molestias voluptates alias ratione natus provident aut et at et aspernatur qui cupiditate eos quia doloremque nemo inventore est corrupti voluptate dicta aliquid iusto in deleniti sit reprehenderit ullam sed numquam consequuntur et voluptatum quisquam qui labore voluptatem cumque consequatur qui quo unde aliquid et quis quaerat cum incidunt quisquam velit maxime voluptatem eligendi voluptatibus et similique aut maxime nisi deleniti qui doloremque facilis deleniti repudiandae cumque consectetur consequuntur qui numquam rerum recusandae voluptatibus perferendis rem hic cum quis dolor quo nemo sed ea alias est dignissimos at culpa soluta beatae quam animi aliquam quibusdam est magnam alias mollitia voluptatem velit ullam eos excepturi molestias et deserunt impedit maxime nobis placeat pariatur ut enim quo est alias sit vel voluptatibus eius cumque sint ex qui soluta voluptates et ducimus voluptas voluptas atque quis eaque veritatis illum sapiente consequuntur voluptate voluptatem quisquam voluptatem exercitationem dolor eaque incidunt necessitatibus eius maxime error sunt qui fugit exercitationem id et rerum voluptas cum ipsum nam animi facere labore ea magni autem possimus voluptatem ea ea reprehenderit qui illum ipsam voluptas magni maxime velit nihil dolorum et itaque qui ullam aspernatur corrupti ducimus voluptatem non consequatur corrupti explicabo id odio cumque ea deserunt et error modi officiis sit quidem et est distinctio dolorem assumenda et hic cum labore iste numquam explicabo possimus quo non deserunt est qui id nihil occaecati excepturi recusandae et rerum commodi minus nemo et hic atque nihil eum exercitationem ab sed autem nihil voluptatem repellendus sed expedita laborum non sunt deleniti aut quia quam est quia sed dignissimos ullam id quis corrupti aut odio eaque eaque qui magnam quibusdam labore rerum enim asperiores optio nulla recusandae labore dolor ad quia nam consequatur architecto et occaecati officia non officiis qui libero quidem illo nihil cumque et quod consequatur aut id vero vero iste eligendi voluptatibus numquam asperiores laudantium earum neque qui veniam neque natus cum maxime velit id est excepturi laboriosam voluptatum officia ea beatae ipsum et et ut enim quae voluptatem nemo atque eum hic dolor reiciendis ut est aliquid labore molestiae aliquid perferendis harum vitae voluptatum iure nobis non ut voluptas cum consequatur beatae consequatur soluta velit repellendus sequi magnam accusamus aut excepturi dolorum quidem dignissimos tempore inventore voluptas explicabo a et quas tempora voluptatibus quisquam incidunt suscipit qui id explicabo nisi magnam nesciunt illo non qui suscipit excepturi et quod aut voluptas omnis illo tenetur ex reiciendis fugiat dolores cupiditate vel quibusdam labore adipisci nam iure sed commodi ut distinctio voluptas voluptatem est laudantium quas nisi consequatur beatae soluta minus quam tempore hic ea qui voluptas natus laborum debitis et omnis quia quibusdam quia impedit quia illo aliquam excepturi delectus laborum doloribus rerum dolores provident quia odio dolorem et doloremque distinctio hic dolor omnis fuga quos veritatis qui consequatur recusandae qui sit nihil magni similique autem est eaque officia iure libero aliquam accusantium et non itaque autem beatae et mollitia ipsam hic labore eos at dolores voluptatem ipsam enim fugiat voluptatibus eveniet vero ad quidem sapiente corrupti voluptas excepturi voluptatum deserunt dolores magnam esse commodi deserunt et corporis et sapiente ea quaerat velit ducimus iure rerum praesentium voluptates sit necessitatibus quisquam reiciendis deleniti consequuntur est molestias laboriosam eum est eius assumenda et cupiditate voluptates dolores aut totam aut blanditiis provident est quidem ut non voluptatum molestiae sint repellat dolorem recusandae quos vel autem reiciendis et et est est ipsum quos odit voluptates nihil inventore et doloribus minima sed atque rerum quia voluptatem ullam ut facere eum repellendus in nisi labore officia nisi est nostrum qui suscipit officiis omnis dolorum eligendi ea magnam illum error nisi repellat deserunt dolor et hic doloribus est voluptas aut iusto quae et sapiente dolore itaque et sequi et rem nemo eum quas nam sed quia nobis nesciunt aliquid quia omnis molestiae vel deserunt beatae quis fuga quasi molestiae et quae aperiam voluptas ut voluptatem excepturi molestiae tempora sit doloremque eveniet et non nam non quibusdam delectus quod quasi omnis similique ut dolorem laborum velit error est velit aperiam et distinctio vel id quis nihil ipsa in dolores autem rerum qui consequuntur eos accusamus ut qui laboriosam veritatis et animi architecto molestiae quibusdam tempora praesentium explicabo non molestias aut itaque ipsam dolorum sapiente ut praesentium tempora aut dicta ut corporis odit error voluptatem adipisci exercitationem consectetur libero ut aspernatur quisquam hic nulla aliquid sequi error architecto rerum illum facilis sit provident aut esse eius sunt et est iure provident qui ut velit dolore in ex architecto vero aliquid explicabo iusto ea quam inventore accusamus quo earum esse consequatur eligendi illum qui sapiente id omnis quam maiores facilis omnis ipsa deserunt quia minus sed quia aut magni quasi dicta non harum ea est at optio aut et in repellat beatae id harum iusto cum id doloribus et modi praesentium ullam magnam quisquam eos voluptas in quia et non velit repudiandae consectetur non expedita commodi ullam quia in deleniti dolorem dolore blanditiis ut voluptas mollitia repudiandae omnis accusantium quia consequatur libero consequuntur suscipit quia et praesentium aperiam dolor ea consequatur quisquam fugit iure eum sed corrupti quo omnis saepe porro explicabo reprehenderit quas et molestias dignissimos labore iure placeat velit voluptas necessitatibus aut facilis in ut aut nihil quia non temporibus ut illum officia porro ratione suscipit commodi ut optio ad magnam harum totam facere cum delectus nostrum ullam quis repudiandae molestias fugit fugit quasi est architecto esse quia repellat incidunt quia ex architecto inventore dolorem pariatur minus id vel minima velit et alias libero ut sit maxime mollitia sunt perspiciatis qui soluta maxime commodi est placeat aut harum labore sit reiciendis accusantium quaerat magni quia velit eius maxime non voluptatum nemo vero quo qui qui reprehenderit et non consectetur laboriosam odio quod labore qui porro consequatur dignissimos ab natus quibusdam sapiente temporibus alias adipisci quis ea aut officiis fuga et sed facilis modi et nihil aliquid unde qui a quis eum harum eius sunt consequatur non odio quo velit aut ducimus velit autem sit quaerat similique veritatis aut officiis rem rem provident non autem sit a et est fugit et optio laudantium rerum suscipit temporibus sit quasi quo quidem similique cumque similique adipisci quidem laboriosam similique dolorem eligendi optio minus dolore libero aliquam quo consequatur quidem dolores.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(4,1,'','Assumenda temporibus vel nam perspiciatis repudiandae soluta quod incidunt atque dolorem voluptates exercitationem quo excepturi nemo enim eveniet et maxime iste est nesciunt officiis quod rerum ducimus non quo sed voluptate ut laborum ipsa corrupti volup',NULL,'','Ut ullam blanditiis excepturi quia labore eos exercitationem cupiditate laudantium necessitatibus sunt natus aspernatur aut nihil deleniti ut molestiae dignissimos aperiam sunt magnam voluptas et aut alias tempora culpa eum amet ut aliquam magni id mollitia voluptatum ea recusandae culpa sed nam aliquam dolores nulla qui officiis dolorem fugit omnis labore natus et et cum error amet laboriosam nisi et et libero provident neque ex accusantium adipisci optio ipsa nihil id pariatur consequatur et nesciunt molestias ut magnam quod ad eum eius quod sint architecto numquam facere temporibus et qui delectus quod quam eveniet est dolorem cumque iste aut quo eveniet veniam in quia sed ad rerum eligendi sed facilis animi voluptatibus est labore culpa est est sit occaecati expedita quaerat saepe nostrum eveniet beatae sit at et aperiam totam voluptas nesciunt iusto veritatis accusantium in aut aliquid magnam rerum fugit consequatur nemo ducimus fugit omnis quo et id nisi autem dolorum alias qui reprehenderit ut delectus ipsa dicta voluptate aut est facere enim nobis consequatur sunt eum voluptates facilis nisi totam autem atque sed autem vitae ratione eveniet molestiae ut omnis nemo excepturi sit aut voluptas qui ab aliquam at illum et molestiae id harum et dolor ad nostrum ut esse dolores ipsum aut cumque ullam quia nesciunt corporis ut libero nesciunt molestias culpa quaerat illo doloremque incidunt neque quia debitis maiores aut iste facere voluptate maxime esse et molestias odio commodi ut facere temporibus qui temporibus eum omnis consectetur sed qui omnis accusamus qui nostrum similique ad fuga saepe sed consequatur facilis explicabo voluptatem officiis neque ut sit ullam omnis deleniti dolorem enim qui est voluptatem aperiam dolorem sapiente quam quasi aliquam nemo repellat voluptas omnis delectus incidunt vel fugiat excepturi et animi est minus ea sapiente earum placeat qui velit est perspiciatis quasi deserunt qui perspiciatis repellendus autem et accusantium ipsa sunt qui dolores aliquam omnis voluptatum sint blanditiis delectus autem quibusdam consequatur omnis voluptas commodi ad ducimus pariatur adipisci ut pariatur repellendus hic modi eos natus eos quo sed non commodi dignissimos ut ut in sed eos dolore dolorem commodi aut distinctio vero placeat voluptatem nulla aliquam dolorem explicabo consequuntur quod eaque molestiae voluptatum est natus cupiditate et nisi neque quia officia quis itaque illo amet est quibusdam qui sed velit itaque dolorum qui quia earum consectetur illum omnis sapiente ut odio tempore velit sed quos soluta at ut praesentium sint ut quia quasi alias magnam tenetur nobis quisquam ex commodi veritatis est sequi aut est maiores eligendi ut numquam sunt et cum ea minima et rem quisquam quod dignissimos necessitatibus laborum molestias explicabo sit voluptatem laudantium enim labore nihil explicabo magnam pariatur et ducimus aut quam ut nesciunt animi rerum nulla et voluptatem amet qui ipsum excepturi dolorem quia eveniet quibusdam non facilis et nulla et nobis ea architecto soluta eum dolor inventore rerum quas porro quis ipsam dolore libero in recusandae dolore voluptas quisquam dolores velit iusto error vitae sunt quibusdam enim qui vel maiores minima harum sint fugiat assumenda provident ut debitis aperiam dolorum cupiditate excepturi neque itaque ratione repellat dolor et ea aut quis dignissimos est autem aut corrupti minima eum quidem qui incidunt consequatur ea vitae ratione eum minima dignissimos id excepturi architecto et consectetur rerum et nihil illo modi eum dolorem sequi nihil omnis repellendus et saepe aliquid eos reprehenderit perferendis animi totam eaque et aut et est qui sit tenetur amet alias quia repudiandae ducimus aut repellat ut itaque quo adipisci asperiores atque autem unde optio et earum quis ipsam ut qui neque atque ipsa eum enim quis quam aut dolorem suscipit voluptatem nisi nemo quos odio voluptatibus maiores dicta hic error et eum fugit nostrum modi laudantium cumque dolorum enim sint non mollitia molestiae omnis est non minus qui sunt quod ut exercitationem facilis odio dolorem dolorem ratione dolor dolores et earum voluptatibus voluptatibus vero possimus voluptate culpa aut eligendi quasi veritatis error aspernatur doloremque voluptatum eum vero suscipit et aut necessitatibus rerum illum a est ut aut voluptatem inventore omnis assumenda ducimus quo id velit quasi rerum at maiores molestiae accusamus quia praesentium sunt enim earum magni dolores ad sed dolorum nihil ipsum culpa adipisci eum molestias et consequatur quia quia aut rerum id officiis suscipit maxime odio enim sunt odit et et nostrum veritatis et at modi fugit dolorem cupiditate accusamus sunt et dolorem eligendi magnam alias.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(5,1,'','Quod asperiores asperiores illum aut repudiandae illo similique optio id sit aut vitae voluptas repellendus est rerum voluptatem sint pariatur cum vitae labore libero aut modi inventore mollitia blanditiis minus eum ad sit aliquid laborum qui a et invento',NULL,'','Aut id optio reiciendis iure et quia sit dignissimos rerum id temporibus perspiciatis omnis et neque officiis quaerat commodi enim inventore non nihil eius quibusdam incidunt eum asperiores similique est illo nisi et facilis vitae voluptatem nobis ut maiores non nobis voluptatem est exercitationem beatae unde sed sint ut nisi qui qui atque nam at magnam debitis blanditiis qui in perspiciatis illum eaque aut quis soluta veritatis aut ad et voluptatem dolor et sit asperiores ad deserunt magni vitae qui ullam nostrum voluptate error veniam aut dignissimos debitis molestiae minus et aut esse voluptates molestiae aut quae perspiciatis architecto in illo aliquam at praesentium aut nihil sunt accusamus sit voluptas nobis nam commodi dolor quidem quo harum ut est vel aut debitis voluptatem odit dicta reprehenderit ipsa ut repudiandae autem commodi aut maiores nisi consequatur impedit quia velit fugiat iusto et a quia rerum aut blanditiis voluptas vero ipsa maiores harum magnam tempora aut et distinctio quaerat et suscipit nesciunt enim neque doloribus placeat sed dolore animi nam libero tenetur id delectus veniam consequatur earum voluptatem cum dignissimos dolore quod doloremque nemo molestiae illum et praesentium cum quia voluptates id incidunt ducimus quo ut expedita excepturi eos unde non velit unde incidunt praesentium quibusdam facilis quae sint dolores eius illum voluptas id id voluptatem laudantium et quis ea qui quae dolorum deleniti aut recusandae ut reprehenderit dolorem sit laboriosam quia sed dolores rerum cupiditate neque ducimus qui placeat rem omnis facere id qui ipsa aliquam sunt voluptatem rerum nesciunt adipisci excepturi excepturi veritatis asperiores tempore dolor at et sit debitis quis soluta laborum et corrupti eos fugiat corrupti quo quae et eum architecto aspernatur iste unde corrupti doloribus nihil alias provident qui dolorem quibusdam illum beatae ab ea quibusdam hic ducimus ducimus nam qui sapiente minima iste iure voluptatibus id enim reiciendis nihil deserunt beatae quis asperiores atque odit architecto aut laborum dolorem optio ea aut error molestiae rerum aut et reiciendis velit provident maxime deleniti perferendis earum voluptate et eveniet nobis assumenda sed laboriosam fugit ullam cupiditate id molestiae nesciunt sit molestias voluptate aut quae dolore magni itaque et fuga molestias sed sed vel ad velit voluptatem optio id sunt qui sit reprehenderit modi dolorum sed quaerat et dolor omnis autem quae cupiditate molestias et ea et vel non quod in earum incidunt deleniti molestiae excepturi ex non repudiandae ducimus magni nam dolorem vitae at placeat hic voluptatem architecto eveniet quia provident magnam totam quasi quo vitae est blanditiis omnis sed facere molestiae dolorum id delectus sed officia eveniet consequatur et inventore deleniti quia rerum repellendus et iure velit iste ad dolor vero voluptatem necessitatibus itaque ullam mollitia mollitia et itaque quod repellendus magnam dolorem est id optio itaque error qui unde aut illo ipsa sit enim in cupiditate hic consequuntur vitae quo quidem est vel sint eos provident eum nesciunt optio voluptas a impedit veritatis necessitatibus necessitatibus et exercitationem non consectetur et ex non dolor similique culpa necessitatibus aut sint hic accusamus ut nihil ratione quas eos ipsam et sit dolorem ut eos amet et vero qui nostrum quae voluptas quam aperiam praesentium facilis dignissimos magnam inventore distinctio temporibus repellat minima dicta sapiente voluptas quisquam voluptas necessitatibus tenetur aut voluptas sunt alias et ut aperiam placeat est voluptates in at ratione et id et quas perspiciatis ducimus hic labore eligendi accusantium porro amet ea modi et vel maxime sed provident voluptatum enim qui ea non et omnis cumque molestiae veritatis rem voluptatum sit aspernatur amet enim consequuntur et quos omnis reiciendis quae similique atque recusandae non perferendis accusamus qui non magnam qui eum minima id dolor natus quo ex rerum exercitationem a vel quos provident cupiditate voluptate dignissimos qui voluptatibus laudantium impedit debitis voluptatibus nostrum fugit ipsa ipsum voluptate ab autem explicabo aliquam pariatur et odit omnis placeat nobis quia occaecati praesentium quia earum omnis ullam suscipit repellat ad consequatur doloribus harum voluptatem dolore commodi voluptatem et dolor odit asperiores aspernatur impedit perferendis aut qui recusandae quod voluptate dolores itaque dolorum ut ea iste consequatur et exercitationem animi eos possimus et dolores alias sint ea nam voluptatibus qui eum esse quod sint sequi cupiditate ut id eligendi officia rem laborum officiis consequatur laborum facilis labore voluptas aut qui ea ad optio aut qui cum quidem fugiat occaecati illo aut sapiente vitae rerum enim et labore aut sunt ipsam nulla quidem doloribus voluptate autem nemo praesentium non accusantium quia est autem vero labore eos incidunt delectus sed corporis ut animi doloribus alias iure neque assumenda quia distinctio cum dolorem voluptates ut deserunt quia sunt quisquam ducimus amet ipsam illo libero ipsum soluta reprehenderit in hic dolor ut magnam consequatur earum fuga nisi nesciunt error molestiae aut fugit quia totam facere omnis quis aut et maiores vel et omnis et quia voluptas molestiae recusandae aut praesentium atque error sapiente atque harum consectetur voluptatem ullam neque et quae sapiente aspernatur est dignissimos doloribus rerum voluptatem reprehenderit non possimus culpa ea quis in ipsam ut est animi sequi voluptates maxime accusamus dolorem nemo magnam aut omnis eligendi commodi ratione sequi soluta qui molestiae distinctio officia veritatis consequatur ipsa maiores ut provident voluptate ut quidem deserunt non itaque voluptas sapiente pariatur nemo ipsam aliquid architecto iste dolorem qui vel et et laborum cumque tenetur qui modi aliquam voluptas porro perspiciatis neque quia facilis quo quia sint qui laborum veniam ipsum autem mollitia assumenda nobis ullam delectus quod alias in in a reprehenderit officiis magnam eos incidunt rem nihil corrupti autem et atque voluptatum voluptatem aut eius non officia ipsa veniam autem in similique eveniet dolores fugiat nihil qui dicta qui rerum est est inventore vel fugiat veritatis suscipit quis in earum quo sed quod est sint consequatur quasi dolor qui sint aspernatur eos voluptatem qui quaerat expedita suscipit est eaque hic unde a at commodi doloremque voluptatum molestiae perspiciatis illum facilis dolores eos quia enim tenetur hic atque facere et amet ut quis enim et molestias quasi quod ratione voluptatum nesciunt eius ab et laborum eaque nobis vel sed qui reiciendis saepe ex ex et provident fugiat veniam qui qui totam quia ut incidunt asperiores quidem est est beatae natus nemo autem incidunt et qui dolorem commodi ea id quas esse voluptatibus deserunt optio sunt reprehenderit eos minus quia quam et omnis consequatur ut sed quia aspernatur consequatur dolores corrupti quibusdam incidunt aspernatur non error facilis sunt voluptates consequatur ipsa laudantium qui omnis natus facere voluptatem itaque quo qui et ut ea dolor aut modi ullam rerum ut odio consequatur excepturi velit est porro magni voluptatem eligendi aspernatur quisquam quia consequatur temporibus ipsam et quo rerum officia dolores numquam repellat non reprehenderit consequatur numquam qui recusandae omnis inventore velit dicta consequatur vero natus in beatae natus dolorem doloribus mollitia sint voluptatem consectetur repellendus quo modi nihil excepturi quos necessitatibus adipisci suscipit molestiae id eveniet aliquid ut quisquam et est dolore repellat ut quis reprehenderit.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(6,1,'','Aperiam voluptatem minima quam ipsam doloribus est quae eligendi odit eos vel aliquam est architecto voluptatum est perferendis voluptatum aut dignissimos distinctio optio fuga earum vel ut ea et ea sint quidem earum deserunt vero qui nesciunt facilis fac',NULL,'','Ipsum nesciunt necessitatibus omnis dignissimos at ea perferendis voluptatem corrupti qui itaque mollitia praesentium culpa perspiciatis veritatis magnam voluptas qui odio ut est maiores possimus mollitia et perferendis qui ratione dolorem cupiditate eum ipsa est sint quos id voluptatibus reprehenderit repudiandae corporis vero ullam earum voluptatem eveniet explicabo at exercitationem et incidunt aliquam dignissimos expedita velit sit modi omnis aperiam cumque animi ratione deserunt quas suscipit recusandae et sed ratione voluptates culpa aut est sapiente qui voluptatem et accusamus hic culpa tenetur consequuntur accusantium atque est accusamus ab rem voluptate dolor atque dolores aspernatur deleniti soluta et minima dolorem fugit magnam ut beatae harum sunt nostrum consequuntur qui quasi magnam minus et aut delectus magni ex nostrum minima tenetur in est occaecati et rerum qui placeat libero voluptatem odit nisi voluptatem impedit excepturi ut velit tempore consequuntur quibusdam repudiandae alias et qui ipsam sequi enim cupiditate est fuga nihil minus ut non illo ab laudantium ullam quis quod animi nam occaecati consectetur facilis qui temporibus voluptas incidunt deserunt rerum quibusdam quae officiis sed et minima non aut tempora iure velit non porro alias aut perspiciatis illum ut consequatur dignissimos magni officiis nemo harum saepe hic sunt natus sint quam temporibus et enim voluptatem rerum ut enim libero maxime omnis et dignissimos similique ipsam ducimus nihil nobis et at dolores sunt aliquid saepe nesciunt porro exercitationem ut nobis expedita incidunt facilis aut repudiandae voluptatem consequuntur omnis necessitatibus eos illo explicabo omnis enim consequuntur id aut perspiciatis similique officia eos magnam voluptatum ut ut est inventore beatae illum provident similique recusandae voluptatem ut repellat fugit ea fugit iste corporis natus corporis reprehenderit dolor id quas et omnis vel voluptas minus pariatur quaerat explicabo necessitatibus corporis atque dicta omnis eos earum dicta cum adipisci ad fugit aspernatur officiis in et tempora beatae dignissimos incidunt repellendus explicabo facere incidunt quam repudiandae placeat nihil aliquid perferendis quaerat dignissimos culpa ea in molestiae necessitatibus inventore nihil mollitia ducimus quia porro sunt quo quo ut impedit suscipit eaque vero sit expedita harum voluptatem et et consequuntur animi voluptatem vel labore amet nostrum odit nulla illum quia qui fugiat harum beatae velit quo ut deleniti adipisci perferendis pariatur mollitia totam cupiditate eaque laborum placeat nostrum aut nobis qui quo facilis maiores incidunt incidunt vel neque aut ipsam nisi temporibus atque architecto eum dicta dolores quod ipsam nam et voluptates tempore aut laboriosam reiciendis vel aperiam nemo odio ut dolores alias quidem explicabo et sed praesentium perferendis assumenda rerum deserunt dolor a aut sunt autem et vel modi quia nam repudiandae odit ipsam explicabo cum minus error fugiat provident cum corrupti labore incidunt sint eius alias odit suscipit quae aut modi et molestias autem repellendus qui qui dolorem enim reprehenderit error aspernatur odio nostrum inventore rerum est et aut omnis quia est aspernatur veniam odit sed tenetur dolores vero dolor quisquam vel eos molestiae eius tempora dolorem eum deserunt libero odio magni ab molestias et quia est dolor consequatur velit laboriosam similique et iusto accusantium nisi deleniti qui sed et placeat velit sint aliquid incidunt ab ea quibusdam quam optio voluptatem et animi cum repellendus accusantium perspiciatis culpa velit ut adipisci consequatur non nam distinctio sequi placeat accusamus totam non quia magni rerum beatae quia molestiae autem dolore quasi aliquid voluptas laborum non ducimus quia et aut quisquam culpa illum et numquam ad quis quo harum recusandae quidem quo voluptatem adipisci veniam ut temporibus aut ut dolor officia explicabo tempora eum labore ut quibusdam et qui voluptate aspernatur porro unde minima quod eum voluptas sapiente itaque amet distinctio mollitia voluptatibus ipsa ipsam consequatur necessitatibus et ducimus eum vero dolorem incidunt qui quasi quaerat rerum aliquid consequatur voluptas voluptates voluptatem ut ut pariatur nesciunt aspernatur eaque voluptas aut quos exercitationem omnis vel itaque ullam velit consectetur esse enim enim eligendi quo voluptatem porro nostrum repellendus dolor dignissimos et omnis omnis architecto mollitia dolor odio neque esse sit autem velit magnam rem fugiat exercitationem aut enim praesentium laboriosam maxime porro est repellat quo esse aut similique voluptatum itaque est vitae aliquid sit dolorem est et eos temporibus porro ut quos tempora omnis et ut laboriosam voluptates reiciendis qui tenetur porro voluptatem velit molestias quisquam omnis aspernatur est eaque atque veritatis totam quidem odit ad aperiam corrupti porro id non animi voluptates et quae placeat quisquam enim veritatis vitae et voluptas est dignissimos pariatur dignissimos quae animi occaecati sit quis nihil quia sapiente molestiae sit ex eos expedita qui omnis ducimus voluptas illum esse sunt optio deleniti distinctio incidunt accusantium et in nisi dolore neque sint est sapiente facilis a eos est at consequatur cupiditate tempore assumenda ducimus reiciendis molestias maxime alias numquam ex vel atque molestiae suscipit fugiat voluptas omnis rem explicabo excepturi quis sapiente aut debitis illum dolore iure rem et ratione voluptas officiis saepe delectus deleniti voluptas magni repudiandae culpa error in aut officiis deserunt ducimus ea officiis consequatur asperiores et sint suscipit nam hic natus eum repellat ut doloremque esse voluptatibus quia sint omnis impedit neque eum quo ipsam facilis et facilis et doloribus laudantium vel ea voluptas consectetur quasi eveniet quia quos consequuntur dicta tenetur perspiciatis id quidem consectetur illum nihil aspernatur nihil sed qui vel nostrum delectus doloremque consequatur quia iure ratione non voluptatibus qui recusandae impedit ipsum quibusdam impedit ut asperiores consequatur rerum molestias voluptas dolorum et quos maiores ipsum occaecati consequatur et velit sit ea id aliquam omnis libero et voluptatem est vitae et natus eaque quia aliquid doloribus non dolor quia eum repellat error corrupti aut consequuntur error sit dolorem quia voluptas fuga sint et aspernatur porro consequatur rerum laborum ut accusantium amet autem cupiditate rem aspernatur aut dolorum sed nobis quis ut fugiat optio omnis sapiente quia sunt ipsam nisi sunt magni nisi magnam unde illum aut similique soluta ratione nobis soluta delectus voluptatibus praesentium et amet eos molestias sit dolorem tempora quia quam eos quo velit vero qui ut et repellat blanditiis saepe neque voluptatum maiores ut placeat et tempora quia ex expedita repellat tenetur et harum autem assumenda eius minus impedit quas veniam repudiandae voluptatem omnis nulla possimus assumenda harum repellat ratione ut voluptates cumque eaque consectetur molestiae debitis voluptatum sed unde dignissimos ipsam optio voluptas eum id corporis et omnis consequuntur non itaque dolores beatae delectus maxime consequuntur provident facilis quia eos aut illum placeat molestiae amet id similique beatae aliquam dolor veritatis aperiam quisquam dicta assumenda adipisci voluptatem error molestiae repellat saepe sapiente consequatur vel officia nulla consectetur repudiandae voluptate eius error omnis consequatur animi magnam consectetur consequatur consequuntur adipisci possimus esse velit eveniet nam exercitationem iste accusantium assumenda praesentium voluptatum tempora voluptas aliquam non sit odit at hic ut voluptate placeat iure non consequuntur quia quisquam nihil quasi dolores esse error consequatur perferendis ut consequatur placeat iusto id voluptas explicabo exercitationem magni aut suscipit fugiat repellendus voluptatum distinctio labore nesciunt et aut non dolorem accusamus sit molestiae rem laboriosam ullam fugit illum pariatur rerum natus nam voluptatem ea alias non quia facere veniam quibusdam distinctio libero et debitis neque qui odit quia eos necessitatibus maiores veniam soluta expedita et numquam non vero quae quo repudiandae eum voluptate harum.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(7,1,'','Alias quas modi ab voluptatum eos qui quisquam quo vel explicabo dolor quae quas fugit placeat sint architecto ducimus veritatis id possimus ipsum recusandae deleniti nisi omnis labore voluptates dolor inventore corporis dolorem quo perferendis dolorem as',NULL,'','Maiores nihil ipsum doloremque laudantium doloremque amet soluta at molestiae dolores ut ipsam et unde non pariatur molestiae distinctio quam qui qui harum totam sint nesciunt repudiandae aut consequuntur assumenda deserunt reiciendis aut quo repudiandae eos qui voluptatem ut error dolor harum et voluptatem at inventore molestiae rerum qui consequatur voluptas eveniet ut architecto id vel numquam quae ea voluptates quia aut ut adipisci placeat ratione ut commodi sed voluptas et necessitatibus aperiam et autem et consequatur sed minima nostrum sapiente aut possimus numquam sit est quisquam porro rem quia quis facere qui recusandae molestiae libero expedita consequuntur numquam incidunt veritatis et rerum ducimus rerum ratione consequuntur magnam quisquam earum saepe eum et ut doloribus laborum voluptas qui a doloremque quisquam eos est est id inventore et fugiat accusantium qui labore est sed tempore eligendi aperiam dolorum perferendis eligendi nobis quas aut ducimus sint porro ipsam aut impedit neque possimus aliquam quia minima rerum occaecati assumenda sunt ut incidunt recusandae est non occaecati in in quam nam autem repudiandae ea temporibus atque voluptas est iste nihil qui quia est aperiam iusto dolor porro qui veniam modi reprehenderit explicabo nostrum culpa rerum ratione mollitia non ratione blanditiis dolorum id aliquam voluptatem facere in omnis voluptas maiores hic est beatae voluptatem atque consequuntur ut dignissimos quisquam voluptatem tempore numquam labore nobis sequi autem tenetur sunt provident omnis aliquam unde ratione facilis dignissimos impedit in qui cumque et magnam quibusdam perspiciatis assumenda atque reiciendis rem id voluptatibus possimus illo dolores eaque soluta animi magnam ipsum et voluptas rerum sunt dolorem excepturi ut voluptatum id blanditiis corrupti ex perferendis amet officiis quidem quisquam fugiat debitis unde commodi quod maxime illo exercitationem dolorem repudiandae non blanditiis impedit molestiae sequi ea ut sed magni velit accusantium explicabo nisi esse odio inventore ipsam est nesciunt eaque ipsam in dolores beatae dolor culpa repudiandae numquam nemo dolore sed quas quasi corporis sunt velit voluptatum illo est inventore et dolorem optio sint cumque earum ut recusandae itaque repudiandae eligendi recusandae sunt repudiandae sunt modi fugiat adipisci reiciendis esse consequatur est omnis ullam nisi quos minus quia est necessitatibus a omnis ab voluptatem qui molestiae fugit beatae voluptatem sint eos dolor libero ad et sit modi quae suscipit consequatur sed quidem mollitia assumenda consectetur provident sed perferendis voluptas in et doloremque eum alias quis alias suscipit quaerat porro optio fuga illo illum cumque temporibus omnis sapiente rem aut ut quia doloremque explicabo aut vel voluptate architecto consequatur nemo velit totam consequatur nam aut quo odio alias cum incidunt quia omnis corporis fuga qui ipsa debitis iste hic nostrum repellendus porro et nobis qui molestiae dolorum distinctio asperiores adipisci sapiente nostrum culpa in suscipit quia commodi voluptatum vero voluptatem fugit non qui et nobis quia qui similique ducimus iure ab nihil explicabo iste sed magnam accusantium sit perspiciatis dolore quo ipsam ex minima et corrupti molestiae ipsum fugiat veniam nisi et ea quasi nesciunt molestiae voluptatem dolor vel voluptatem doloremque voluptatem porro sint repellendus consequuntur ex aut et ab ab sint voluptate ipsum assumenda quisquam voluptatum repudiandae eligendi at autem rerum aut error ducimus quae ut eligendi quis voluptatem quas in eos illo ea praesentium sed hic rem qui pariatur libero ipsa hic iusto sed et aut assumenda officiis animi voluptatem alias in omnis modi ut nostrum officia quos consequatur sunt temporibus sed voluptatem accusantium veritatis quisquam sit deserunt quis sed facere fugit vitae pariatur quaerat quae ab voluptatum et nam suscipit perspiciatis assumenda rerum quasi perferendis fugit optio est assumenda in voluptatem est similique consequatur laborum vel incidunt commodi culpa ducimus qui autem suscipit unde commodi deleniti qui qui id eum quaerat ut ab aspernatur doloribus eos adipisci cupiditate consequatur in ipsam repellat distinctio laborum nostrum reiciendis necessitatibus consequatur commodi et eum sit minus voluptates nemo debitis atque aliquam beatae expedita ipsa expedita eius quasi dolorum et neque quis sed voluptatem voluptatem animi maxime reiciendis eum iusto officiis iusto cum asperiores eius voluptatibus nisi aut quasi voluptatibus eum rerum omnis eum id eum non aut nihil corrupti sequi nemo adipisci consequatur incidunt et maiores qui consectetur et earum minima quidem fugiat expedita quo ex id inventore facere non voluptas aut rerum tempore mollitia reprehenderit similique aliquid ad est sed dolores assumenda sed et sit ratione similique libero placeat a qui ipsam iste est earum sunt iure aspernatur est aut voluptatum facilis qui dolor culpa alias sint dolores a corporis maiores illo voluptatem enim et autem animi amet et error libero consequatur delectus veritatis voluptatem doloremque est doloribus est possimus et repellendus quaerat corporis fuga nesciunt praesentium tempora in qui numquam ea aperiam voluptas at iste magnam sequi voluptates dolores dignissimos deserunt id explicabo molestiae quibusdam et rerum asperiores itaque quidem nulla eum corporis doloremque tempore accusamus perferendis quod ratione nisi eum sed facilis quia praesentium nam cumque qui consequuntur dolores iusto praesentium magni nesciunt delectus laborum qui iure voluptas qui dolor eum soluta eum repellendus quo architecto reiciendis magni qui eligendi distinctio optio aut harum libero aut id consequatur quam non qui ex est vel quisquam consequatur vel repellat molestias doloremque molestiae repellendus sed aut quisquam aut quasi et fuga fugit sapiente quisquam voluptas eum et qui aut quo ullam qui ad est autem adipisci impedit ex id earum alias nihil vero neque perferendis expedita cupiditate distinctio nisi dolorum occaecati labore nostrum quod fugit provident quasi distinctio ipsum iusto eaque cupiditate eligendi dolores in veritatis voluptatem molestiae assumenda ratione enim sunt ut cumque quia quae sapiente similique molestiae atque qui vitae rerum libero recusandae laboriosam illum voluptatum quia et laborum officiis reprehenderit voluptatem sunt ullam quis perferendis eveniet consequatur dicta quod esse nostrum ipsam modi consequuntur qui voluptatum quos veritatis hic et voluptatem libero sunt accusamus numquam ducimus sit qui commodi natus aut assumenda officia tenetur sit impedit beatae sint ut officiis quam voluptatem quis doloremque consectetur sint tempore incidunt ea dolor sed velit blanditiis quaerat fugiat quo nihil ullam sunt nulla sunt facere non voluptas harum incidunt est dignissimos doloremque voluptas et modi sed quisquam voluptatem excepturi deserunt est deserunt totam debitis voluptas enim dolorem non ex tenetur dolor assumenda ut suscipit nobis cum qui et architecto id est explicabo earum sit alias enim doloremque laboriosam tempora inventore molestias dolore voluptatum optio tempora impedit repellendus voluptate qui sapiente ipsam aliquid ad eum quas exercitationem quia tenetur eos dolore aut quas consequatur facilis ad voluptatem voluptatem tempora illum praesentium explicabo consequatur beatae nobis eligendi amet pariatur nihil enim vero aliquid cum dolorum vitae excepturi eligendi et consequatur harum ab molestiae ea ab enim consequatur eos reiciendis odio dolor est eos cupiditate cum officia repellat dolores aliquid aut aut architecto esse natus deserunt sunt voluptatem rerum esse dolore quo facere rerum deserunt sed asperiores unde provident dolores ullam corrupti sequi velit dolor atque est aspernatur voluptate aperiam sapiente qui aspernatur illo repudiandae consequatur est qui deserunt expedita amet ab aspernatur minus quod deleniti consectetur dolorem et eum pariatur aut qui iusto voluptatem dolor non et suscipit aut quam quos molestiae aspernatur iure rerum aspernatur necessitatibus distinctio nobis cum et qui et aut dolorem vel ab autem ut cumque et rem neque laboriosam soluta nihil quia natus voluptate quo laboriosam tenetur maxime aperiam quam iste expedita atque et voluptas quo a veritatis dolore porro error iste vel qui dolores sunt harum et sunt consequatur perspiciatis velit enim recusandae quis hic mollitia omnis dolore dolores aut dolorem qui harum explicabo aliquam quia pariatur hic aut laborum non et qui neque et non odio quia et aliquam ipsum consequatur similique explicabo neque est recusandae repudiandae dignissimos autem id harum sunt dolorum non omnis dolorem alias.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(8,1,'','Nisi non dolorem qui dolores a voluptatibus aliquam et quis nam dolorum nesciunt doloribus fuga sed et animi perspiciatis blanditiis eum rerum sed perspiciatis aliquam perspiciatis itaque commodi corrupti ex laborum sunt repellat ducimus sint a vitae volu',NULL,'','Voluptatibus doloremque tempora vel impedit est architecto aliquid consectetur ea magni possimus ipsam quae asperiores est rerum officiis qui neque numquam ea quasi eaque voluptate neque ut doloremque assumenda officia eveniet reiciendis dolorem eaque nesciunt blanditiis eos dolor autem reprehenderit voluptates ex perspiciatis et laudantium et voluptatibus saepe dolorum harum voluptatibus adipisci sint sint maiores assumenda ea beatae ratione maiores vel commodi id illum architecto dicta corrupti dolorum soluta quidem dolore itaque vel dolorum ducimus dolores eum fugit nostrum reprehenderit quibusdam temporibus aut mollitia neque numquam officia voluptatum qui autem dicta architecto ipsam qui enim odit ad exercitationem est possimus debitis eius tenetur ad esse quisquam modi animi id molestias quia excepturi facere illum labore at est ut quia ut autem sunt beatae quo voluptas magni in consectetur facilis hic pariatur quasi quis quos quo ullam aspernatur est quis ad et tempora quia recusandae quas itaque dolores quae et eos doloremque explicabo autem dolores quis quisquam fugiat ut illo facere nihil nihil sint beatae ab dicta repudiandae saepe aut dolorem voluptatem repellat harum aut ducimus odio temporibus iure soluta omnis nulla temporibus voluptatem laudantium quos porro aut et dicta soluta accusantium laudantium aspernatur reiciendis qui nobis perspiciatis occaecati ut facere mollitia aperiam ut incidunt eos molestiae et nihil nihil dicta eos numquam magnam maiores laudantium nisi et accusamus molestiae doloremque accusantium qui veritatis quo incidunt enim saepe expedita sit quis aliquid dolores optio iusto maxime rem voluptatum dignissimos commodi alias quam sequi pariatur neque voluptates temporibus quia est rem omnis et alias nulla et suscipit voluptates vero accusantium velit laboriosam et itaque voluptatem praesentium nesciunt soluta aperiam eum omnis sunt tenetur alias ut et quis optio repellat ut et accusantium aspernatur cupiditate ad quam temporibus saepe assumenda consequatur autem blanditiis repudiandae ut est ullam temporibus provident ipsum delectus est molestiae nemo maxime aut et aut voluptates unde et dolorem numquam molestiae aliquid ducimus in ut quis et ut maiores non excepturi nihil animi asperiores at et itaque mollitia magni magni et dolorum qui aspernatur laudantium sapiente a sit similique minus sequi error soluta incidunt numquam ipsum unde dolor perspiciatis quidem natus voluptas et eos repellendus sequi dolor praesentium quos velit maiores possimus quidem ducimus libero itaque velit aut quia soluta qui ad exercitationem quis beatae exercitationem inventore expedita vero et sapiente et amet voluptates ut qui iusto tempore molestias sint et omnis voluptas laborum velit corrupti et magni animi qui quia necessitatibus nemo et labore modi voluptatem sit illum consectetur iusto sit dolor culpa debitis et ut nobis doloribus dolorum eos blanditiis quia dolore corrupti quia id quae omnis enim nam sunt recusandae nobis ex magnam a ipsum delectus perferendis cupiditate nemo nulla sapiente sit error velit exercitationem et dignissimos dolore quae est est non nostrum quos aut amet aliquam error rerum accusamus ut consequatur molestiae aut dignissimos inventore temporibus non in nobis repellendus ut mollitia nobis officia labore tenetur reprehenderit odio odio maxime architecto id a est quia quis inventore qui maxime qui molestiae qui expedita aliquid sit soluta eum aspernatur voluptas dolore consequuntur sapiente ullam voluptates porro voluptas deserunt numquam impedit velit dolores enim occaecati enim laborum nihil quos iusto ex accusantium voluptatem quas consequuntur nesciunt rerum possimus repudiandae assumenda odio fuga quam nihil aut voluptatem beatae ullam quasi voluptatem nihil praesentium optio magnam quis eum id delectus officiis mollitia est quae qui fugiat voluptas explicabo veritatis quidem ut qui nihil est magnam maiores ex sint placeat perferendis qui blanditiis facere molestiae illo nihil eaque ut impedit dolorum aut nisi adipisci sapiente aut occaecati et velit et maxime non explicabo quidem maiores et quia est non ut rem deleniti vero repellendus excepturi illum fuga vel et consequuntur et harum similique ducimus sit consequatur laudantium dignissimos excepturi explicabo aliquam tempora laborum voluptatem pariatur sequi quo qui et molestiae assumenda aut qui dicta est tempora enim enim maxime consequatur voluptatem qui et aspernatur nihil sed dolorem et sint et non deleniti numquam ullam aliquam ut quod numquam a repellendus adipisci architecto et sit corrupti temporibus facilis illum voluptas distinctio veniam eum ut quos dicta minus sunt impedit quos sunt vero aut aliquid dolorum itaque qui doloremque consequatur rem est praesentium quaerat officia molestiae ut dolores qui nulla repudiandae odio fugiat dignissimos quia ab mollitia assumenda earum quo magni modi ex at hic ea corporis perferendis aliquid maxime illum sed est culpa dolorum iste doloremque perferendis voluptas velit cum odio dolorem dolorem veritatis mollitia aut voluptas animi alias voluptatem ut aspernatur velit at quia ipsum voluptatem est aliquid officia veritatis dolor tempore aut error sunt unde et eaque qui ducimus rem incidunt harum sit corporis voluptatem sint repellat sed repudiandae aut nesciunt accusamus facilis velit ad quaerat iusto id ullam fugit architecto aut dolor soluta qui sit illo pariatur perferendis quam quidem eaque consequatur vero fugit molestias cum odio qui sequi earum.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(9,1,'','Quo dolorem porro fuga at ipsum rerum aperiam deleniti quisquam aut odit rerum eos minima iste optio a minus ullam adipisci earum dolor accusantium aut dolor ut quia voluptate eum occaecati placeat qui est aut enim unde rerum amet laborum fuga inventore e',NULL,'','Debitis aut voluptate alias et eum voluptate error iste inventore autem sunt autem illum ea sit et facilis ullam dolor eum nostrum quam ut doloribus earum in quibusdam error suscipit cumque placeat ut recusandae excepturi et ex et et voluptatem mollitia id et soluta at blanditiis repellendus eius autem facilis ut modi quidem et voluptatum cupiditate nostrum voluptatem dolores doloribus eum quam similique est consectetur omnis consequatur sunt maiores qui quia et numquam labore culpa aut dolores ut soluta quam deleniti sunt reprehenderit minima molestiae voluptas et veniam eius et ab porro veniam similique perferendis beatae repellendus placeat quaerat dolor veritatis voluptas accusamus beatae similique non quis est perferendis perferendis laborum doloribus perspiciatis rerum amet id nesciunt distinctio quis quia molestias voluptas aut odio sunt tenetur doloremque ex libero dolore mollitia fuga ut sint rerum vero omnis rem possimus odit esse sint maxime iste in consectetur dicta illum blanditiis voluptatem nesciunt a corrupti incidunt tempora ducimus incidunt nisi quo quis vitae ut est ut dolorem quo ut illo iste commodi ab sunt expedita cumque rerum omnis enim dolor nobis enim consequuntur ut adipisci ut enim vero officia maiores fugiat et sunt rerum occaecati quia et temporibus ab facilis recusandae et perspiciatis aspernatur eveniet voluptatem repellat iure autem dignissimos optio sint impedit et molestias cumque nostrum occaecati et cum minus aut repudiandae vero sequi qui doloremque officiis est atque accusantium quisquam porro ut ea vel fugiat tempore ea aut aut necessitatibus magnam amet nihil hic nesciunt fugiat corrupti error quibusdam quia est dolorem fugiat aut ad ea quisquam quam fugit labore expedita ut consectetur rerum tempora et vitae in deleniti beatae placeat ratione aut hic illo omnis quibusdam commodi recusandae esse ab officiis atque et voluptatem non et rerum incidunt quod qui consequatur eos et aut tempora ea dolor ullam quia quam quo reprehenderit aperiam corporis voluptatum ratione dolorum non officia delectus veniam eum et quo ipsum aperiam unde quae ab molestiae maiores dolore nostrum voluptas velit id esse saepe eos consectetur repellendus ut dolor fugit dicta nemo et sit quod est dignissimos voluptatem at repudiandae porro exercitationem et in eius et rem totam eligendi dolor odio consequatur vel deleniti dolores recusandae necessitatibus quos nesciunt sunt qui dolor sint est consequatur beatae et qui illum autem ipsum optio unde consectetur corporis blanditiis consequatur at veritatis voluptatem ut aut hic veniam quia tempora labore voluptatibus sed ut placeat voluptates et ab ipsam eveniet culpa provident ea quibusdam voluptas quisquam tempora dolor quo qui consectetur nemo culpa nobis ut in atque provident aut iste ut recusandae aut et eos voluptatem et ipsam est aut incidunt officiis dolores excepturi in exercitationem culpa voluptates adipisci laudantium aspernatur explicabo eos quod a expedita eum qui aut iure voluptates mollitia placeat sit aut eaque officiis sed itaque esse velit beatae beatae aut non iusto non eius provident et laborum est pariatur error natus explicabo vero totam totam rem voluptatibus sunt omnis omnis quisquam nam in quia et temporibus totam dignissimos doloremque aut commodi aut in occaecati porro asperiores qui quisquam est quo totam fugit saepe enim eos nisi quaerat mollitia et perferendis nam quibusdam expedita facilis eius praesentium quibusdam odit distinctio ea ipsum dignissimos rerum cumque rerum maxime modi perspiciatis et ipsum quisquam necessitatibus non quo minima impedit delectus id autem illum iusto amet pariatur sed provident quasi unde illum voluptatem et harum nobis iste ipsum maiores aspernatur omnis voluptatem sed eos voluptas aut necessitatibus et laudantium dolores enim nesciunt assumenda in eveniet eveniet enim dolores placeat aut consequuntur magnam et est quis nam explicabo et et modi architecto nulla hic odio hic laborum illum atque quia maxime ea asperiores autem sed omnis quia odit deleniti et culpa sed nisi et eligendi ut id magnam commodi porro dolor et consequuntur hic quaerat fuga perspiciatis deleniti qui eos quia rerum ea aut dolorem id velit qui pariatur fugit labore iure doloremque exercitationem temporibus ipsum iusto similique itaque ut ut dolores quis porro rem sequi fuga est vero debitis et quod beatae vitae quaerat voluptate asperiores atque aut sed sit et iste nisi quia ullam nihil error non ut et temporibus et nobis exercitationem consequuntur possimus expedita maxime voluptate expedita perferendis blanditiis error omnis distinctio sapiente est non aliquid praesentium magni quos placeat voluptatem alias nostrum voluptatem dolorem hic ullam rerum et et rerum sunt voluptas quasi iusto dolores nihil quas corrupti reprehenderit voluptas corrupti ab omnis earum et eligendi est ut nostrum quasi omnis et hic molestiae sunt earum voluptatem odio voluptas quia dolor earum eius neque corporis qui omnis molestiae quia tenetur numquam tenetur ut rerum dolorem est ex aspernatur consectetur enim temporibus aut aliquid voluptatem voluptatem dolorem quidem dignissimos sit consectetur provident incidunt et eos cupiditate voluptas qui fugiat dolorem et aliquid dolore deleniti velit officiis veniam harum vel nesciunt inventore sequi ea nobis magnam aspernatur nihil dolorem nemo repudiandae modi tenetur corporis similique ipsam iste nesciunt vitae et omnis veritatis mollitia voluptates error a aut magnam quia qui qui animi atque repellat dignissimos ratione modi iste repudiandae vitae quia ea hic inventore explicabo at atque similique quod laborum perspiciatis in officia dolore numquam inventore non eligendi quia tempore dolor quam voluptatem cum rerum soluta rerum voluptas rerum alias molestias rerum voluptatem quia est quas ab molestiae iste voluptate distinctio omnis voluptate ut corporis minus a quidem commodi perspiciatis optio et nisi eveniet rerum voluptatibus debitis aspernatur voluptatibus minima et enim qui recusandae quia ut aut nobis minus minus animi quis repellendus ex vel dolorum harum iure reprehenderit totam omnis expedita quas nemo eos qui molestiae aut ea qui sit voluptatum possimus ut non debitis similique voluptatum doloremque molestiae architecto unde qui nihil accusantium et aut libero iure dicta non debitis adipisci ducimus necessitatibus quasi minima aut rerum molestiae debitis sit earum porro quod illum necessitatibus expedita sit in qui et ut sed deserunt et nulla aut dolorem est sunt ipsum laborum dolorem ipsa voluptate odit pariatur ducimus et officia minima sed ut ratione nihil fuga adipisci iste perspiciatis facere odio omnis facilis praesentium voluptas sapiente amet animi vel et rerum nisi reiciendis officia consequatur hic voluptas ratione eum corrupti velit repellat voluptates ullam laborum impedit perferendis quia fugit error distinctio culpa rerum odio quia fuga totam eius ipsa magni possimus sit ipsa dolores eius labore porro dolorem autem accusamus nihil est pariatur corrupti quia unde quae officia eaque vel earum non et qui aliquid suscipit dignissimos placeat numquam aliquid consequatur rem delectus quia expedita delectus nam maxime saepe aut commodi qui repellat ut omnis quia neque reprehenderit sed amet id delectus animi saepe id tenetur sit vel necessitatibus voluptas voluptas culpa id tempore quae in natus nam natus ex dolore aut reiciendis autem molestiae doloremque fuga nulla laudantium illum nemo soluta perferendis nisi aut rerum itaque sed quo veniam iure natus dolores ea praesentium quae reprehenderit rerum eligendi animi est quo velit eum totam quia incidunt tempore magnam minus quis omnis porro quia doloremque adipisci fugit alias minus quia eligendi cumque non et et vel consequuntur non et qui rem placeat et explicabo sit et voluptatem ullam perferendis at est ipsam nihil sed vel cum unde ipsum debitis laudantium repudiandae eius cupiditate hic nemo repudiandae cumque ex laborum nisi impedit inventore consequatur voluptatem laborum quis porro sequi aut sed dolore consequatur consequatur sunt vel at perferendis ea voluptatem soluta rem rerum accusamus hic odio aliquam qui ipsum fugit saepe quod qui rerum rerum et ducimus omnis odio eos officiis similique tempora qui iure praesentium odio numquam ipsa delectus et distinctio et iure et id sunt est occaecati voluptatem nihil illo libero quia enim facere consequuntur totam dolores quidem sunt sed quo illo sint quia ea est eos voluptates eos in vitae non amet dolorem occaecati ad.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(10,1,'','Similique veniam fuga a omnis voluptatem et nostrum eum in sunt dolorem beatae quae non eos et aliquid voluptatem eligendi dignissimos non impedit qui non eligendi magnam accusamus dolor error nisi voluptate quia necessitatibus non modi saepe accusamus ex',NULL,'','Possimus non enim laboriosam accusantium deserunt repellendus hic placeat id at voluptatem quod eum dolorem totam enim sapiente voluptas quidem quaerat aut perspiciatis non qui optio eaque voluptate voluptas fuga veniam molestiae voluptatem sed quas ex enim repudiandae porro voluptate architecto itaque iure dolores cum quaerat hic nihil tempora repudiandae et saepe at aliquam illum officia sed ut excepturi nihil consequatur aliquid et ab iusto quisquam beatae tempora in est vel doloremque sunt atque quos reiciendis accusantium et animi id amet in aut ipsum porro exercitationem sapiente praesentium quae aliquam cum animi error doloribus delectus quo et repudiandae voluptatibus tenetur molestiae illo iure expedita et quas incidunt ipsum deserunt alias et eum est facilis nihil impedit ea debitis cumque aut doloribus consequatur ut recusandae dolores culpa eveniet cum voluptas sunt et consectetur exercitationem dolorem et soluta incidunt vero totam illum enim tempora sequi sed id dolorem et dolorum voluptate voluptatem aut ratione ipsum laborum sint sed est adipisci corporis doloremque qui ea doloremque sunt corporis quas distinctio pariatur blanditiis porro dolorum doloremque qui esse omnis perspiciatis tempora voluptates perferendis et reprehenderit ut nihil nobis alias accusantium eligendi velit consectetur est placeat excepturi quis similique nisi ut sunt quisquam numquam sed officiis magnam recusandae voluptates voluptas quod quis et odit atque minus saepe error laboriosam eum nesciunt quidem autem fugit repellat rerum quasi aut alias ipsa laboriosam vero rerum voluptatem unde deserunt aperiam eum nostrum dolores labore recusandae non nobis porro aut voluptas tempora sit a animi sed vitae est tempore tempore fugiat eligendi velit ipsam vero porro magni voluptatem neque non voluptas adipisci ipsum doloremque praesentium rerum natus dolore voluptatem nihil assumenda ut aliquid unde commodi blanditiis doloribus et ab tenetur itaque omnis facere aut est ut soluta nulla dolores est aliquid autem quia debitis quod occaecati sunt ut animi fugiat asperiores nisi nobis et impedit quo totam omnis dolores ut omnis officiis mollitia officia ab odio expedita ut facilis numquam odio et et necessitatibus cumque nulla officia vero voluptatum aut sapiente a aliquid voluptatem recusandae vel sint itaque sed dolorem nihil quia ut velit quae sequi omnis minus tempora ipsa laborum ducimus magnam velit est aut quia nulla quos voluptatem est ullam deleniti quis optio et facilis maxime corrupti harum enim harum vero numquam recusandae suscipit facere sit autem cum qui repudiandae unde facere illum qui qui optio eaque laudantium ea vel impedit debitis consequatur animi quaerat eos in dolor rerum modi dolor sunt maxime animi ea a consequatur commodi non provident dignissimos rerum perspiciatis aut numquam nobis atque ut animi voluptatem quos alias consequatur voluptatem qui qui quis provident sunt sunt et maxime sed ea impedit et quae aut temporibus eum quas reprehenderit deleniti eos quia maxime nobis veritatis quia magni et nisi ullam laboriosam repellendus amet facilis voluptatem sed quibusdam expedita voluptatibus quas veniam dolorum odit libero iusto minus vel labore veniam corporis at voluptatem consequuntur aut explicabo ipsum et excepturi cupiditate reiciendis temporibus eveniet fuga labore libero illum ducimus quidem officia dolorem est nostrum recusandae non nesciunt tempora neque nesciunt tenetur eius aliquid itaque officiis unde dolor porro nemo aliquam alias omnis quod natus a id qui rerum velit mollitia omnis mollitia laudantium aut perspiciatis enim quo provident consequatur sit laudantium qui eum eligendi praesentium vel ea pariatur officiis nihil similique consequatur aperiam necessitatibus ut placeat sed soluta dignissimos atque ut quis quis amet maxime architecto est quos et quod blanditiis quia vel provident eos numquam architecto quisquam hic consequatur quidem ipsum sit nobis illum aut nulla sequi vitae odit omnis repellendus laborum harum omnis recusandae repudiandae aut possimus delectus asperiores itaque ex nihil sit molestiae doloribus error sequi aspernatur reiciendis eum voluptatem ab et quos quis saepe quas beatae dolor vel facilis dolorem aspernatur adipisci deleniti dolores ab ut amet aut sunt odio aliquid sunt ea sit qui fugit corporis omnis beatae et ut ipsa temporibus nulla perspiciatis molestiae in et quis nemo ratione impedit dolorem consequuntur maiores et quia dolores quisquam dolores dignissimos quia aut eos dolore tenetur autem unde est aliquam dolorum aut nam quo ratione molestiae et modi voluptatem voluptatem dolorum ratione explicabo est in quasi voluptatem excepturi provident consequatur quos est nihil deserunt autem assumenda adipisci temporibus aut fugiat repudiandae ut fuga omnis reiciendis non quam mollitia rem cumque et deleniti voluptatem magni maxime corporis quod non ducimus architecto aspernatur ullam ullam eveniet quidem illum ipsam assumenda rerum maxime quia in voluptatem adipisci facere excepturi nulla dolorum aut aut laboriosam ea commodi libero labore rerum quis voluptatem voluptas consequatur soluta laborum reprehenderit voluptas sit natus pariatur voluptas debitis est saepe esse optio voluptates nostrum tempora quidem neque minus velit suscipit architecto est sed doloribus eaque aut ea eos quia tenetur autem reprehenderit similique dicta et consequatur laboriosam rerum dolor commodi blanditiis est nam non dolores qui non esse molestias incidunt possimus modi aut amet ut voluptates error veritatis libero suscipit praesentium iste laboriosam soluta earum eum asperiores et molestiae consectetur et voluptates dolores distinctio illo sunt voluptatum sit sint quia consequatur quisquam vero expedita possimus et sed non beatae perferendis eum et qui accusantium ad mollitia tenetur iste excepturi cumque asperiores consequatur inventore perspiciatis dolorem sint est id odio quasi ratione qui repellendus sed nisi unde perspiciatis cumque quia est rem ut.','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL);
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educators`
--

DROP TABLE IF EXISTS `educators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `experience` text COLLATE utf8_unicode_ci,
  `qualification` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educators`
--

LOCK TABLES `educators` WRITE;
/*!40000 ALTER TABLE `educators` DISABLE KEYS */;
INSERT INTO `educators` VALUES (1,2,NULL,NULL,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,4,NULL,NULL,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(5,8,NULL,NULL,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(6,9,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `educators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'university','university',NULL,NULL,'university','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,'medium','medium',NULL,NULL,'university','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,'elementary','elementary',NULL,NULL,'university','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(4,'high school','high school',NULL,NULL,'university','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL);
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_05_03_192528_create_categories_table',1),('2015_06_06_114013_create_blogs_table',1),('2015_06_07_090615_create_photos_table',1),('2015_08_01_010134_create_educators_table',1),('2015_08_01_010302_create_students_table',1),('2015_08_01_011155_create_subjects_table',1),('2015_08_01_011258_create_levels_table',1),('2015_08_01_011545_create_user_levels_table',1),('2015_08_01_011624_create_user_subjects_table',1),('2015_10_06_203049_create_answers_table',1),('2015_12_07_130107_create_questions_table',1),('2015_12_08_182133_create_participants_table',1),('2016_02_14_021620_create_notifications_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_read` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `read` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,5,1,'Answer','0000-00-00 00:00:00',0,'2016-04-08 14:48:21','2016-04-08 14:48:21'),(2,5,2,'Answer','0000-00-00 00:00:00',0,'2016-04-08 14:49:17','2016-04-08 14:49:17'),(3,5,3,'Answer','0000-00-00 00:00:00',0,'2016-04-08 14:56:08','2016-04-08 14:56:08'),(4,5,4,'Answer','0000-00-00 00:00:00',0,'2016-04-08 18:17:03','2016-04-08 18:17:03'),(5,5,5,'Answer','0000-00-00 00:00:00',0,'2016-04-08 18:17:41','2016-04-08 18:17:41');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_read` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participants_question_id_index` (`question_id`),
  KEY `participants_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageable_id` int(11) DEFAULT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `body_en` text COLLATE utf8_unicode_ci,
  `body_ar` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,5,1,2,'<p>Why Bohr\'s theory is applicable onl&nbsp;for hydrogen atom?</p>',NULL,'2016-04-08 14:44:46','2016-04-08 14:44:46',NULL),(2,5,1,2,'<p>What is the origin of quantum numbers?</p>',NULL,'2016-04-08 18:08:37','2016-04-08 18:08:37',NULL),(3,5,2,2,'<p>What is the meaning of pH?</p>',NULL,'2016-04-08 18:25:59','2016-04-08 18:25:59',NULL),(4,5,1,2,'<p>What is the black body radiation ?</p>',NULL,'2016-04-09 20:55:27','2016-04-09 20:55:27',NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `qualification_en` text COLLATE utf8_unicode_ci,
  `qualification_ar` text COLLATE utf8_unicode_ci,
  `experience_en` text COLLATE utf8_unicode_ci,
  `experience_ar` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,3,NULL,NULL,NULL,NULL,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,5,NULL,NULL,NULL,NULL,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,10,NULL,NULL,NULL,NULL,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'physics','physics',NULL,'physics5706983b65d99','physics5706983b65d5c','flaticon-science65','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,'chemistry','chemistry',NULL,'physics5706983b666b7','physics5706983b6667d','flaticon-science62','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,'math','math',NULL,'physics5706983b66cf6','physics5706983b66cbc','flaticon-calculating12','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(4,'english','english',NULL,'physics5706983b672f7','physics5706983b672bd','flaticon-abecedary2','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(5,'french','french',NULL,'physics5706983b678ae','physics5706983b67874','flaticon-monument33','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(6,'arabic','arabic',NULL,'physics5706983b67e90','physics5706983b67e56','flaticon-islam55','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_levels`
--

DROP TABLE IF EXISTS `user_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_levels`
--

LOCK TABLES `user_levels` WRITE;
/*!40000 ALTER TABLE `user_levels` DISABLE KEYS */;
INSERT INTO `user_levels` VALUES (1,2,2,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,2,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,2,3,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(4,4,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(5,3,2,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(6,5,2,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(13,8,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(14,8,2,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(15,8,4,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(16,9,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(17,9,2,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(18,9,4,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(19,10,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL);
/*!40000 ALTER TABLE `user_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_subjects`
--

DROP TABLE IF EXISTS `user_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_subjects`
--

LOCK TABLES `user_subjects` WRITE;
/*!40000 ALTER TABLE `user_subjects` DISABLE KEYS */;
INSERT INTO `user_subjects` VALUES (1,2,1,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,4,2,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,3,5,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(4,3,6,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(5,5,1,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(6,5,2,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(9,8,1,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(10,9,1,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(11,10,1,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL);
/*!40000 ALTER TABLE `user_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `np_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `city_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_en` text COLLATE utf8_unicode_ci,
  `address_ar` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'NP1234','zal','zal',NULL,NULL,'admin@test.com','$2y$10$SWNrAzsmek7t6gN4feYdnuIr.kp3KQRtVkC/XnF0Flga.UmVqRa.a',1,'2odUsC0MAmyES0V5iScES6xpTZ6upQ',1,NULL,NULL,NULL,NULL,NULL,NULL,'PMuOhXUSm7LosJmcN9VxvaQrmgn2Yf9duZ4nPyEsYrTbL4YCr7pY25kh8y7T','2016-04-08 00:26:18','2016-04-09 20:52:15',NULL),(2,'NP99001','zal','zal',NULL,NULL,'educator@test.com','$2y$10$7ffBeSkEnydNjhcCC33KhOM0cLBxwCG6AQ7cAO3QfOkV8FZlgHNoq',1,'1MpOK2izzdiSO1ipOoN13DWXIr5Fs9',0,NULL,NULL,NULL,NULL,NULL,NULL,'C3EsbsWxY90BaJaslrHWVbuvR0axpRJUC20FyPGI0zmuy95TIEHVIvXO3vCn','2016-04-08 00:26:19','2016-04-08 18:31:52',NULL),(3,'NP1001','zal','zal',NULL,NULL,'student@test.com','$2y$10$BJG/zS9v4z1BDyIqe3Uc.O/Ab3mWaa3jN9hsr5KuEpyIsB.pU.OSa',1,'9RVvB4hdeQ5C1evKY4cDG9O3u7Zntz',0,NULL,NULL,NULL,NULL,NULL,NULL,'MBWWN1N04H05P5mywenIZhLOhQHyjiOuuGuvTwZpnlUjMMUxT65j09heSHfV','2016-04-08 00:26:19','2016-04-08 13:55:54',NULL),(4,'NP99002','zal','zal',NULL,NULL,'educator1@test.com','$2y$10$w8b24MRZ6zySTV75O7yZseEYIb5mksA13BSlklm8pt7zhKdM9v2s2',1,'QVk54Sy7bosXhny12IJC3JiyoxAayI',0,NULL,NULL,NULL,NULL,NULL,NULL,'PLzpn4gHHRIMWJ6h4gzJreGECmF59FfSeCRtYi38RievojC8zKnP7znuPe8d','2016-04-08 00:26:19','2016-04-09 21:04:21',NULL),(5,'NP1002','zal','zal',NULL,NULL,'student1@test.com','$2y$10$pueInO/aZ6uyG9tn1NkYyOTLah9KDV/HvM6g44uIAMD6Zth0OM85y',1,'XfXwi5QlxqpYsB3qAOD8itMIL4dxO9',0,NULL,NULL,NULL,NULL,NULL,NULL,'2wP0WF4ieoqxMTvk3dCzyeS56MWsfNgSk7CLzdYwEVokBmW81zoLTnl1vQex','2016-04-08 00:26:19','2016-04-09 20:56:00',NULL),(6,'NP993957','Ali',NULL,'KATRIB',NULL,'a.katrib@yahoo.com','$2y$10$DAyWfWpwC7kDEbZnYN1iEO2G2fhiOnRic8X18jjqhITCcj71jNojC',1,'',1,'67000 strasbourg',NULL,'France',NULL,'22 rue de Verdun-',NULL,'kqhlbUlawmgLlZ5sCLGBLohjsI6YdGp0bCw6N0d6Zxrj2QdCg7Zj9ss7L5Dj','2016-04-08 14:18:24','2016-04-08 23:32:48',NULL),(7,'NP992134','Ali',NULL,'KATRIB',NULL,'ali.katrib@ku.edu.kw','$2y$10$o7owBoMJmZWt24eXqzW6uunWGrnhsJAFzK4Mg8sXHny16e6gQgZDe',1,'',0,'67000 strasbourg',NULL,'',NULL,'22 rue de Verdun-',NULL,'4LZzIg7h6KPHW7AYJlKSJMVjREWMFUjLsfGj7KykIKZwIRqphRVAik33cZuy','2016-04-08 14:22:50','2016-04-09 21:00:56',NULL),(8,'NP99003','zal','zal',NULL,NULL,'educator2@test.com','$2y$10$OnbIz3mzel/fQarMcsy4y.M3e0cVWT1KtuZ/r7fYdFRPMFjLa9SLO',1,'PHnWTRqHhzahCs6fdjw2dLL3aOQxJS',0,NULL,NULL,NULL,NULL,NULL,NULL,'tYXHKqhMyU','2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(9,'NP99004','zal','zal',NULL,NULL,'educator3@test.com','$2y$10$QV1Sz.XfkTMjxbi6zGcmeu8LNmpcncSx/RCXgv9X6MDqic/vjH1pm',1,'p3XD0HWJLIdTlQ6r9diZawwgofbjVs',0,NULL,NULL,NULL,NULL,NULL,NULL,'6XJATm5Wb2','2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(10,'NP1003','zal','zal',NULL,NULL,'student2@test.com','$2y$10$exL/slpx.FN7jGO.po8XF.I7MZGI7t6.pGlXaPTynuayahqgWR7iO',1,'CCWeSvSP01MvurPut1MW17q1IV9Ajv',0,NULL,NULL,NULL,NULL,NULL,NULL,'GxSzJ5SvL2','2016-04-09 20:32:44','2016-04-09 20:32:44',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-09 10:06:05
