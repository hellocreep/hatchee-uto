/*
Navicat MySQL Data Transfer

Source Server         : uto
Source Server Version : 50148
Source Host           : 223.4.120.3:3306
Source Database       : uto

Target Server Type    : MYSQL
Target Server Version : 50148
File Encoding         : 65001

Date: 2012-07-09 12:27:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activity_groups`
-- ----------------------------
DROP TABLE IF EXISTS `activity_groups`;
CREATE TABLE `activity_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity_groups
-- ----------------------------
INSERT INTO `activity_groups` VALUES ('1', '家庭');
INSERT INTO `activity_groups` VALUES ('2', '朋友');
INSERT INTO `activity_groups` VALUES ('3', '公司');
INSERT INTO `activity_groups` VALUES ('4', '商务');

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '0' COMMENT '姓名',
  `password` char(50) NOT NULL DEFAULT '0' COMMENT '密码',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `level` int(2) DEFAULT '0' COMMENT '权限等级',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'utoadmin', '144aa276d7ebfa17066c23f57dc796e2', '363897046@qq.com', '0');
INSERT INTO `admin` VALUES ('2', 'chenzhao', '6cccd22d79134abd43cafaa4236af224', 'remaintears@163.com', '0');
INSERT INTO `admin` VALUES ('5', 'liwen', '202cb962ac59075b964b07152d234b70', 'hellocreep@gmail.com', '2');
INSERT INTO `admin` VALUES ('6', '77', 'd57788b455df8da7a78507a09bb83af3', '437183236@qq.com', '1');
INSERT INTO `admin` VALUES ('7', 'shaoyan', 'dcb505d4ef5c03bbe2d60e090e1ba926', '727263617@qq.com', '1');

-- ----------------------------
-- Table structure for `custom_inquiry`
-- ----------------------------
DROP TABLE IF EXISTS `custom_inquiry`;
CREATE TABLE `custom_inquiry` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL COMMENT '订单号',
  `user` int(8) NOT NULL COMMENT '用户ID',
  `tour` int(5) NOT NULL COMMENT '线路ID',
  `tour_theme` varchar(100) DEFAULT NULL COMMENT '活动主题',
  `tour_time` date DEFAULT NULL COMMENT '出发时间',
  `car` varchar(100) DEFAULT NULL COMMENT '选用车型',
  `people` varchar(50) DEFAULT NULL COMMENT '参加人数',
  `add_day` varchar(50) DEFAULT NULL COMMENT '增加的旅行天数',
  `add_des` varchar(255) DEFAULT NULL COMMENT '增加的旅行目的地',
  `other` varchar(255) DEFAULT NULL COMMENT '其他要求',
  `special_day` varchar(255) DEFAULT NULL COMMENT '是否有特别纪念的日子？',
  `create_date` date DEFAULT NULL COMMENT '下单时间',
  `is_worked` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否处理',
  `handle_time` datetime DEFAULT NULL COMMENT '订单处理时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of custom_inquiry
-- ----------------------------

-- ----------------------------
-- Table structure for `destination`
-- ----------------------------
DROP TABLE IF EXISTS `destination`;
CREATE TABLE `destination` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `img` varchar(255) DEFAULT NULL COMMENT '主题图',
  `synopsis` text NOT NULL COMMENT '简介',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of destination
-- ----------------------------
INSERT INTO `destination` VALUES ('1', '四姑娘山', null, '');
INSERT INTO `destination` VALUES ('2', '九寨沟', null, '');
INSERT INTO `destination` VALUES ('3', '峨眉乐山', null, '');
INSERT INTO `destination` VALUES ('5', '红原若尔盖', null, '');
INSERT INTO `destination` VALUES ('6', '青城山都江堰', null, '');
INSERT INTO `destination` VALUES ('7', '新都桥', null, '');
INSERT INTO `destination` VALUES ('8', '贡嘎', null, '');
INSERT INTO `destination` VALUES ('9', '丹巴', null, '');
INSERT INTO `destination` VALUES ('10', '稻城亚丁', null, '');
INSERT INTO `destination` VALUES ('11', '西昌', null, '');
INSERT INTO `destination` VALUES ('12', '色达', null, '');
INSERT INTO `destination` VALUES ('15', '米亚罗', null, '');
INSERT INTO `destination` VALUES ('16', '金川', null, '');
INSERT INTO `destination` VALUES ('17', '泸定', null, '');
INSERT INTO `destination` VALUES ('18', '马尔康', null, '');
INSERT INTO `destination` VALUES ('19', '雅安', null, '');
INSERT INTO `destination` VALUES ('20', '二郎山', null, '');
INSERT INTO `destination` VALUES ('21', '理塘', null, '');
INSERT INTO `destination` VALUES ('22', '康定', null, '');
INSERT INTO `destination` VALUES ('23', '雅拉', null, '');
INSERT INTO `destination` VALUES ('24', '都江堰', null, '');
INSERT INTO `destination` VALUES ('25', '日隆', null, '');
INSERT INTO `destination` VALUES ('26', '映秀', null, '');
INSERT INTO `destination` VALUES ('27', '卧龙', null, '');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL COMMENT '路径',
  `size` char(10) DEFAULT NULL COMMENT '大小',
  `type` char(10) DEFAULT NULL COMMENT '格式',
  `alt` varchar(255) DEFAULT NULL COMMENT '描述',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `des` varchar(255) DEFAULT NULL COMMENT '图片的详细描述',
  `middle` varchar(255) DEFAULT NULL COMMENT '中图',
  `small` varchar(255) DEFAULT NULL COMMENT '小图',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COMMENT='图片';

-- ----------------------------
-- Records of images
-- ----------------------------

-- ----------------------------
-- Table structure for `inquiry`
-- ----------------------------
DROP TABLE IF EXISTS `inquiry`;
CREATE TABLE `inquiry` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT '订单号',
  `user` int(11) NOT NULL DEFAULT '0' COMMENT '用户',
  `tour` int(11) NOT NULL DEFAULT '0' COMMENT '活动',
  `people` int(3) DEFAULT NULL COMMENT '人数',
  `create_date` datetime DEFAULT NULL COMMENT '下单日期',
  `tour_term` varchar(255) DEFAULT NULL COMMENT '排期',
  `tour_time` date DEFAULT NULL COMMENT '出发日期',
  `car` varchar(255) DEFAULT NULL COMMENT '车型',
  `comment` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(1) DEFAULT '0' COMMENT '订单状态(0-未付款，1-已付款，2-已发团)',
  `is_worked` tinyint(1) DEFAULT '0' COMMENT '订单是否处理',
  `handle_time` datetime DEFAULT NULL COMMENT '订单处理时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='订单';

-- ----------------------------
-- Records of inquiry
-- ----------------------------
INSERT INTO `inquiry` VALUES ('15', '4fed5d0df1796', '16', '25', '8', '2012-06-29 15:45:17', '', null, null, '留言试试', '0', '0', null);
INSERT INTO `inquiry` VALUES ('16', '4fed5d39b9930', '17', '24', '2', '2012-06-29 15:46:01', '', null, null, 'fdfsdfsfsfsd', '0', '0', null);
INSERT INTO `inquiry` VALUES ('17', '4ff244af48561', '18', '24', '3', '2012-07-03 09:02:39', '', null, null, '', '0', '0', null);

-- ----------------------------
-- Table structure for `route`
-- ----------------------------
DROP TABLE IF EXISTS `route`;
CREATE TABLE `route` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COMMENT '内容',
  `img` varchar(255) DEFAULT NULL COMMENT '配图',
  `course` char(50) DEFAULT NULL COMMENT '出发与目的地',
  `tips` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COMMENT='行程';

-- ----------------------------
-- Records of route
-- ----------------------------

-- ----------------------------
-- Table structure for `tour`
-- ----------------------------
DROP TABLE IF EXISTS `tour`;
CREATE TABLE `tour` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '页面标题',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT 'seo description',
  `intro` varchar(255) DEFAULT NULL COMMENT '线路简介',
  `name` varchar(100) NOT NULL DEFAULT '0' COMMENT '线路名字',
  `days` int(2) DEFAULT NULL COMMENT '行程天数',
  `price` int(11) DEFAULT NULL COMMENT '价格',
  `price_detail` text COMMENT '费用说明',
  `route` varchar(255) DEFAULT NULL COMMENT '每天行程',
  `route_intro` varchar(255) DEFAULT NULL COMMENT '行程简报',
  `content` text COMMENT '线路内容',
  `gallery` varchar(255) DEFAULT NULL COMMENT '相关图片',
  `notice` text COMMENT '注意事项',
  `thumbnail` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `who_edit` char(50) DEFAULT NULL COMMENT '正在编辑',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `edit_time` datetime DEFAULT NULL COMMENT '最后编辑时间',
  `term` text COMMENT '排期',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `theme` varchar(255) DEFAULT NULL COMMENT '主题',
  `destination` varchar(255) DEFAULT NULL COMMENT '目的地',
  `groups` varchar(200) NOT NULL,
  `is_private` int(2) DEFAULT '0' COMMENT '是否小包团',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='线路';

-- ----------------------------
-- Records of tour
-- ----------------------------
INSERT INTO `tour` VALUES ('24', '金川•丹巴 观梨花', '金川，丹巴，川西，四川，梨花，旅游', '陶渊明有”芳草鲜美，落英缤纷”世外桃源的理想净土,到头来只存在于笔者的异想世界.假如世间竟有如此美景,你是否早已动容?穿梭于钢筋混凝土的城市地带,奔波忙碌.四角天空里做不完的工作,紧绷的神经充斥着身体的每一个器官.此时你需要的正是一场自由自在的旅行.远离城市的喧嚣,置身于”峡谷柔情”间,赏横断山谷的陡峭险峻,品田间屋舍后万亩梨园,观甲居藏寨独特民居,略“千碉之国”丹巴碉楼.自然与人文的完美契合,展现在你眼前的是美景更是文化. 你准备好了吗?一场属于你的旅行.', '此线路有两个最大的特点，一是该线路穿越嘉绒藏区的腹地，我们可以深度了解嘉绒藏族的民俗文化和风情，看寨子、看民居、看服饰、看姑娘，绚丽多彩的的民族文化，一定会让我们眼花缭乱。二是该线路穿越横断山区六江流域的岷江峡谷（部分）和大渡河峡谷（部分），初步了解青藏高原的地形地貌特征，一方面看峡谷之雄险，以及5.12大地震给岷江峡谷带来得次生灾害，另一方面看峡谷之春，桃花、梨花在大渡河峡谷中争艳开放的盛境，您一定会被这样的壮美、这样的气势所征服。', '7 天横断山谷中的梨花源—金川•丹巴观梨花', '0', '0', '', '', '', null, '', null, '', '', '2012-06-26 10:26:06', '2012-07-02 18:19:58', null, '清明,五一,端午,中秋,国庆,暑假,', '休闲度假,摄影旅行,徒步旅行,心灵之旅,', '丹巴,米亚罗,金川,泸定,马尔康,', '家庭,朋友,公司,商务,', '0');
INSERT INTO `tour` VALUES ('25', '一半是天堂 一半是人间--新都桥、稻城、亚丁三神山八日寻梦之旅', '新都桥，稻城，亚丁，川西，旅游，四川', '这个传说中“最后的香格里拉”、“香格里拉之魂”，曾经震撼了著名的探险家、植物学家约瑟夫•洛克，他曾在《美国国家地理》写道：“在这个世界上，再也不会有如此美丽的风光等待着探险家和摄影家去发现了!”那么稻城亚丁到底是什么在吸引人们？是稻城亚丁神秘的藏传佛教传说和圣洁雪山，还是稻城亚丁的绝美秋色，抑或稻城亚丁的“从地狱到天堂”的经典徒步路线 在烦嚣的都市里呆厌了，想找块清净的能体味纯粹风情的地方，那么，跟我们到稻城来吧，这儿的雪山、圣水、秋林、蓝天和高原的清风、漂浮的云朵、淳朴的民俗、会给你一次超凡脱俗的心灵的', '川西的徒步线路大气而壮美，但绝美的风景往往需要长时间舟车劳顿，高强度高海拔的徒步登山才能瞻仰，让很多户外爱好者望而止步。为了让更多的旅行者可以享受到低强度的徒步旅行乐趣，我们的活动行程都经过了精心设计和安排，低强度的行程设计加上贴心的后勤服务，让您更加轻松的沉醉于神山圣湖中……<br>\n★人文的多元化：全程经过康巴藏族、木雅藏族、安多藏族和彝族等少数民族聚居区，通过了解她们的居住环境、服饰装扮、生活习惯，让你体味不同的民俗风情；<br>\n★景观的多样性：一路雄伟壮观的雪山、古老的冰川、原始茂密的森林、开阔', '新都桥、稻城、亚丁三神山八日寻梦之旅', '0', '0', '', '', '2323', '<p>\n	1.海子山--海子山自然保护区位于稻城北部,总面积3287平方公里,平均海拔4300-4700米。该高原面是青藏高原最大的古冰体遗迹,即“稻城古冰帽”。冰蚀后的怪石及大小海子(冰蚀岩盆)星罗棋布,大小海子1145个,其规模密度为我国之最。景象壮观,撼人心魄。这里还栖息着大量野生动物,如鹿、獐、熊、豹、野羊、白唇鹿等。\n</p>\n<p>\n	2.桑堆小镇--桑堆小镇距稻城县城金珠镇28公里,公路沿线牧场开阔、溪流平缓、山峦起伏、气象万千,村寨、牧人、牛羊群点缀其间,宁静祥和。金秋十月的桑堆红草地,其旖旎美景成为稻城上镜率最高的景点。\n</p>\n<p>\n	3.色拉晨雾、傍河夕照--色拉晨雾、傍河夕照是稻城风光的经典之一。稻城县城周围到处散布着树形优美的青杨树、白杨树,金秋十月,色拉村傍河的田园风光如诗如画,每当朝阳初升、夕阳西沉时,恍如仙境的风光成为油画家、摄影家的天堂\n</p>\n<p>\n	4.贡嘎郎吉岭寺--贡嘎郎吉岭寺为全县最大黄教寺院，理塘长青科尔寺属寺。因念青贡嘎日松贡神山得名。该寺建筑宏伟，壁画精美，寺中珍藏了一尊五世达赖莲花生大师所赠弥勒铜像，为珍贵文物。\n</p>\n<p>\n	5.俄初山--藏语意为“闪光的山”,海拔5145米,俄初山山形平缓、森林广袤,山上风云变幻莫测。每年10月,初霜便降临于俄初山的山岭峰谷,雪线以下的林涛树海换上了秋的盛装。火红的枫叶,翠绿的松柏,金黄的桦树林与蓝天白云、皑皑雪峰交相辉映。俄初山的秋天,像艺术大师精心绘出的一幅幅绝伦无比的经典画作,让你不敢相信自己眼里看到的美景,居然真实的存在。\n</p>\n<p>\n	6.冲古寺--冲古寺(3885)米,位于仙乃日雪峰脚下。寺院残垣断壁毁坏严重,建寺年代无从考证。冲古寺隶属贡嘎朗吉岭寺,根戈活佛派有扎巴在此念经诵佛,小经堂内供有泥塑释迦。\n</p>\n<p>\n	7.洛绒牛场--洛绒牛场(4180米),为附近山民放牧的高山牧场,洛绒牛场被仙乃日、央迈勇、夏诺多吉三座雪峰环绕。雪峰、森林、草场、溪流、湖泊、瀑布和牧场、木屋相映成趣。在这里三座雪峰尽收眼底,是观赏三座雪山的最佳地点。\n</p>\n<p>\n	8.仙乃日、央迈勇、夏诺多吉神山--仙乃日、央迈勇、夏诺多吉神山是亚丁自然保护区内三座圣洁美丽的雪峰,其峰名相传为五世达赖所封：北峰仙乃日,意为观世音菩萨,海拔6032米；南峰央迈勇,意为文殊菩萨,海拔5958米；东峰夏诺多吉,意为金刚手菩萨,海拔5958米。三座神山呈“品”字形排列,被当地藏民称之为捻青贡嘎日松贡布神山,参拜者络绎不绝,成为藏区信教群众朝拜的圣地。\n</p>\n<p>\n	9.牛奶海、珍珠海--从洛绒牛场出发,朝央迈勇与仙乃日之间的山谷上行,到达曲九扎阿神泉。通常香客们都在这里用神泉洗眼、洗脸,以求护法神曲九的保护。继续上行,即到达央迈勇脚下的牛奶海(4720米)。再往上就是仙乃日脚下的珍珠海(4600米)。因山道险峻、崎岖难行,徒步前行需注意安全。\n</p>\n<p>\n	10.丹巴甲居臧寨--丹巴，2005年曾评为中国最美的乡村，色彩鲜艳的典型嘉绒式民居让他获得了千碉古国，众多臧寨中，又以甲居臧寨最具代表性。在大金川河边的山坡上，色彩鲜艳的碉楼错落有致地分布着，让人仿如置身童话的世界。\n</p>', '', '1、除领队授意外，行程中如需离队单独外出必须征得领队同意，并告知外出时间、意图，严禁擅自单独行动。 \n2、请尊重当地民族的传统习俗和生活中的禁忌，藏区不可吃狗肉、鱼肉。该地区开发开放时间较短，服务理念有很大不同，请能用宽容的态度看待，切记不可与当地人发生冲突 。\n3、在活动报名前请仔细阅读活动行程，如和自己的活动方案有冲突的，请谨慎报名，在没有特殊情况的前提下将严格按照既定方案执行，如发生中途退出，因自身原因改变行程的情况，原计划预定的宾馆、交通等费用由队员承担。\n4、高原含氧量比低海拔地区低20%左右。大部分人初到高原都会有不同程度的高原反应，如：胸闷、气短、四肢无力、头晕等，严重者会流鼻血、呕吐。高原反应是人体为适应自然环境而出现的自然现象，您千万不要因此过度担忧和紧张，以免加重身体的不适症状。入藏前可服用高原安、红景天、诺迪康等药。初到时应多喝水、多休息、多吃水果，不要作剧烈运动。高原反应严重时可吸氧。最佳心态是把高原反应作为一种体验！\n5、有严重高血压、心脏病患者不宜去高原旅游。建议计划去高原旅游的客人自行咨询医生，以便掌握自己近期的身体状况是否适宜去高原。身体瘦弱者不要担心，强壮者不要自负，运动员进入高原可能比普通人更要注意身体反应。没必要为去高原而刻意锻炼身体，但进高原前应充分休息，把自己的身体调整在最佳状态，不要带着感冒入高原。\n6、注意环保、尊重原著文化、爱惜马匹。\n7、本次活动强制购买保险。\n8、本次行程途中吃住条件一般，请对自己吃苦能力作正确评估后报名', '', '', '2012-06-26 10:35:07', '2012-07-02 10:33:09', '', '清明,五一,端午,中秋,国庆,暑假,', '休闲度假,摄影旅行,徒步旅行,心灵之旅,', '新都桥,丹巴,稻城亚丁,泸定,雅安,二郎山,理塘,康定,', '家庭,朋友,公司,商务,', '0');
INSERT INTO `tour` VALUES ('26', '朝圣贡嘎神山  探寻莲花仙境 ---新都桥、子梅垭口、泉华滩、莲花湖摄影之旅', '新都桥，子梅垭口，泉华滩，莲花湖，川西，旅游，四川，四川旅游', '“ 行四方,知风物,探幽深,会人文;踏艰险,悟精神.”这便是一个旅游爱好者的自白.我们感激生命如此多情,总觉人生最幸福的事情是在路上做回了本色的自己,在有限的生命里去感受无限的世界.不知疲倦的游走,把感动在自己的思绪里无尽的积累再积累,压缩再压缩,留待一群知心好友,留待某本泛黄的日记薄里不经意的翻起.旅行的意义,仅此而已.    贡嘎山是国际上享有盛名的高山探险和登山圣地,主峰周围林立着145座海拔五六千的冰峰,形成群峰簇拥,雪山相接的宏伟景象.其山体雄伟壮观,叹为观止. 莲花湖,一处尚未开发的处女地. ', '川西的徒步线路大气而壮美，但绝美的风景往往需要长时间舟车劳顿，高强度高海拔的徒步登山才能瞻仰，让很多旅行者望而止步。为让更多的旅行者可以轻松体验户外旅行的乐趣，我们对活动线路进行了精心的设计和安排，低强度的行程设计加上贴心的后勤服务，让您更加轻松的沉醉于神山圣湖中……\n★	人文的多元化：人文的多元化：让你体味康巴藏族的特有风情；神山下的五色经幡，臧寨的巧夺天工，藏乡的美丽传说，哪一样不令人怦然心动？\n★	景观的多样性：；一路可以从新都桥、子梅垭口、泉华滩欣赏到贡嘎雪山的雄伟壮观，莲花湖的海子、森林、草场、', '新都桥、子梅垭口、泉华滩、莲花湖摄影之旅', '0', '0', null, '', null, '1.“摄影天堂” 新都桥--在川藏线南北分叉路口，有一片如诗如画的世外桃源。神奇的光线，无垠的草原，弯弯的小溪，金黄的柏杨，山峦连绵起伏，藏寨散落其间，牛羊安详地吃草……这，就是新都桥，令人神往的“光与影的世界”、“摄影家的天堂”…\n2.莲花湖--莲花湖位于四川省甘孜州康定县普沙绒乡境内，是一处尚未开发的处女地，保持着康西高原原始的面貌：绿毯般的高山草甸、灿若繁星的野花、蓝宝石般的高原湖泊、银链般的溪流迂回盘旋、无声注视着我们的康巴骏马、还有在风中猎猎飞舞的经幡……\n3.木雅贡嘎--贡嘎山，又称木雅、贡噶山，在康定县城南约55公里处。藏语“贡”为冰雪之意，“嘎”意为白色，贡嘎山就是白色的雪山或是万年不化的雪山。周围有海拔6,000公尺以上的山峰45座，主峰更耸立于群峰之巅，海拔7,556公尺。高出其东侧大渡河6,000公尺，被喻为“蜀山之王”。\n4.泉华滩钙化池--泉华滩位于贡嘎山西麓,顶部有约百米, 因一种含有大量化学物质的泉水在地表产生化学沉淀而成，自上而下形成8个泉华滩阶地,每个阶地有一喷泉,泉流长达900米,宽2—4个大小不同,形态各异的五色彩池,面积为3—5亩,池水深40—70厘米,如巨龙欲腾似跃,十分壮观,池水清澈透底,彩池石花装点,水草相依相伴,叫人留连忘返。类似的地貌也出现在四川的黄龙和云南的白水台，但以有非常宏伟 的“蜀山之王 ”贡嘎山为大背景的，非这一个海拔达4000多米的泉华滩莫属。在宏伟的“蜀山之王”贡嘎山为背景构成一绝美的图画，从泉华滩遥望贡嘎主峰及其周围姊妹峰，特别是在朝阳霞光下，其日照金山瑰丽辉煌，非亲历无法想象其辉煌。\n\n\n\n\n', '', '1、除领队授意外，行程中如需离队单独外出必须征得领队同意，并告知外出时间、意图，严禁擅自单独行动。 \n2、请尊重当地民族的传统习俗和生活中的禁忌，该地区开发开放时间较短，服务理念有很大不同，请能用宽容的态度看待，切记不可与当地人发生冲突 。\n3、高原含氧量比低海拔地区低20%左右。大部分人初到高原都会有不同程度的高原反应，如：胸闷、气短、四肢无力、头晕等，严重者会流鼻血、呕吐。高原反应是人体为适应自然环境而出现的自然现象，身体瘦弱者不要担心，强壮者不要自负，运动员进入高原可能比普通人更要注意身体反应。没必要为去高原而刻意锻炼身体，但进高原前应充分休息，把自己的身体调整在最佳状态，不要带着感冒入高原。最佳心态是把高原反应作为一种体验！\n4、本次活动强制购买保险。\n5、本次徒步基本轻装，徒步途中吃住条件一般，请对自己吃苦能力作正确评估后报名。一旦报名确认，，在没有特殊情况的前提下将严格按照既定方案执行，如发生中途退出，因自身原因改变行程的情况，原计划预定的宾馆、交通等费用由队员承担。\n', '', '', '2012-06-26 11:50:28', '2012-06-26 12:07:56', null, '五一,端午,中秋,国庆,暑假,', '休闲度假,摄影旅行,徒步旅行,心灵之旅,', '新都桥,贡嘎,泸定,雅安,二郎山,康定,', '家庭,朋友,公司,商务,', '1');
INSERT INTO `tour` VALUES ('27', ' 放马高原  穿行众神守护的家园 －－雅拉神山、中国最美乡村丹巴甲居藏寨之旅', '雅拉神山，丹巴甲居藏寨，川西，旅游，四川，四川旅游', '人的心总是在远方，走得越远离自己的心越近；人的灵魂总是在空中，海拔越高离自己的灵魂越近，每个人的梦中都有个天堂，而雅拉就是一个可以寄放身心的天堂。一次心灵的洗礼，一次灵魂的自我拷问，触碰5000海拔高原的生命存在。 雅拉雪山与贡嘎山遥遥相望，山体气势磅礴，山顶云雾缭绕，是藏民顶礼膜拜的神山。观其山体，从西面看雅拉如同燃烧的大火，从北方看如同娴熟的八美女子，火的激情，女子的婉约，亦静亦动，楚楚动人。丹巴甲居藏寨，有保存完整的嘉荣居民建筑，造型独特且色彩明快，与蓝天白云遥相呼应。 一个精妙绝伦，充满神秘；一个', '川西的徒步线路大气而壮美，但绝美的风景往往需要长时间舟车劳顿，高强度高海拔的徒步登山才能瞻仰，让很多旅行者望而止步。为让更多的旅行者可以轻松体验户外旅行的乐趣，我们对活动线路进行了精心的设计和安排，低强度的行程设计加上贴心的后勤服务，让您更加轻松的沉醉于神山圣湖中……\n\n★人文的多元化：粗犷豪放的康巴汉子，能歌善舞的嘉绒美女，让你体味康巴藏族和嘉绒藏族的不同风情；雅拉神山下的五色经幡，丹巴甲居臧寨的巧夺天工，藏乡的美丽传说，哪一样不令人怦然心动？\n★景观的多样性：雅拉徒步线路，涵盖了古驿道、天然牧场、雪山', '雅拉神山、中国最美乡村丹巴甲居藏寨之旅', '0', '0', null, '', null, '1.康定古城--一曲“康定情歌”让这座小城蜚声海内外。由于语言和地理因素，它已经成为了整个西南“民族走廊”的核心，藏传佛教、汉地佛教、伊斯兰教、天主教、基督教都在这里繁衍生息，形成以藏汉为主题的多元文化景观。\n2.雅拉自然风景保护区--位于四川省康定、丹巴、道孚三县交界，是康巴地区立体自然景观最集中、最完美、地理位置最好的自然风景保护区。自然保护区内有天然温泉药池16个，古驿道两旁为天然牧场、雪山、冰川、瀑布、海子、森林、草场、河流、温泉……\n3.雅拉神山--雅拉雪山，藏语意为“东方的牦牛山”，海拔5820米，系大雪山山脉的第二高峰，其山体气势磅礴，山顶终年积雪，云雾缭绕，是惠远寺和周边藏民顶礼膜拜的神山.\n4.高山海子（垭拉措、镇朗措和雅拉友措）--垭拉措和镇朗措(又名姐妹海，海拔4200米) 湖面开阔壮观，水深莫测，，阳光照射，满湖银碎；雅拉友措(又叫玉石海，海拔3980米)湖水呈五色，雪峰倒印，经幡飞舞，早上湖面宁静，神山倒影，十分迷人，可以近距离观看雅拉圣山，还有瀑布。\n5.丰富的植被--雅拉自然保护区内有浩瀚稀有的红杉木原始森林，杜鹃林、松树林、沙棘林带、高山草甸，每年的春夏季节，鲜花盛开，牛羊成群，恍若世外仙境。进入秋季，红叶斑斓，仿佛走进了一个色彩缤纷的童话世界。雪山草甸，森林湖泊，在蓝天白云的衬映下，组合成一幅幅色彩斑斓的图案，徜徉期间，移步换景，让人目不暇接。\n6.丹巴甲居臧寨--丹巴，2005年曾评为中国最美的乡村，色彩鲜艳的典型嘉绒式民居让他获得了千碉古国，众多臧寨中，又以甲居臧寨最具代表性。在大金川河边的山坡上，色彩鲜艳的碉楼错落有致地分布着，让人仿如置身童话的世界。\n\n\n', '', '1、除领队授意外，行程中如需离队单独外出必须征得领队同意，并告知外出时间、意图，严禁擅自单独行动。 \n2、请尊重当地民族的传统习俗和生活中的禁忌，该地区开发开放时间较短，服务理念有很大不同，请能用宽容的态度看待，切记不可与当地人发生冲突 。\n3、高原含氧量比低海拔地区低20%左右。大部分人初到高原都会有不同程度的高原反应，如：胸闷、气短、四肢无力、头晕等，严重者会流鼻血、呕吐。高原反应是人体为适应自然环境而出现的自然现象，身体瘦弱者不要担心，强壮者不要自负，运动员进入高原可能比普通人更要注意身体反应。没必要为去高原而刻意锻炼身体，但进高原前应充分休息，把自己的身体调整在最佳状态，不要带着感冒入高原。最佳心态是把高原反应作为一种体验！\n4、本次活动强制购买保险。\n5、本次旅程徒步途中吃住条件一般，请对自己吃苦能力作正确评估后报名。一旦报名确认，，在没有特殊情况的前提下将严格按照既定方案执行，如发生中途退出，因自身原因改变行程的情况，原计划预定的宾馆、交通等费用由队员承担。\n', '', '', '2012-06-26 12:04:14', '2012-06-26 12:09:02', null, '五一,端午,中秋,国庆,暑假,', '休闲度假,摄影旅行,徒步旅行,心灵之旅,', '丹巴,泸定,雅安,二郎山,康定,雅拉,', '家庭,朋友,公司,商务,', '1');
INSERT INTO `tour` VALUES ('28', '雪山初体验  挑战人生的第一个5000米----四姑娘山二峰攀登计划', '四姑娘山二峰 登山 川西 旅游 四川 雪山', '四姑娘山 四姑娘山二峰 雪山 攀登 勇气 5000米 川西旅游 川西 登山 旅行 日隆 双桥沟 ', '假如你已经有过高海拔徒步经验，假如你想尝试攀登一座5000米以上的雪山。假如你更倾心于一座美丽的雪山，那么，跟我们去四姑娘山二峰吧!二峰山型俊俏，酷似珠峰。以其便利的交通条件，完善的后勤保障，相对容易的攀登难度，优美的风光，同样也是众多山友第一次登山首选山峰。', '四姑娘山二峰攀登计划', '0', '2880', '【费用包含项目及服务标准】\n全程交通：成都到日隆往返交通（全程越野车）；\n住宿安排：按行程所列标准入住。\n沿途餐饮：按行程所列餐饮。\n野外餐食参考（实际标准不低于此参考）：咖啡、茶、面包、卤牛肉、曲奇饼、水果沙拉、干果；\n景点门票：双桥沟门票、观光车、海子沟门票、资源管理费、登山注册备案费用；\n马匹驮运：已包含马匹驮运装备费用；\n户外装备：个人装备及公用装备损耗（燃料、炉具、炊具、部分餐具、通讯工具等）；\n领队协作：户外领队,持证高山向导；\n旅游保险：旅游意外险、美亚专业户外保险，为每位队员购买高额双份保险，专业户外高山险和旅游意外险。因道路交通事故造成的客人意外伤害，按《道路交通事故处理方法》由保险公司赔偿。本公司不承担另外的赔偿责任。旅游保险不含财产险，请保管好自己的财物；\n【费用不含及自费项目】\n出发地到成都的来回大交通、个人骑马费用、行程未列的餐费、购物费用、以及其他奢侈性消', '', 'D1：全国各地－成都；\nD2：成都－日隆；\nD3：日隆－双桥沟－日隆；\nD4：日隆－二峰大本营；\nD5：二峰大本营－登顶－日隆；\nD6：日隆－成都', '四姑娘山双桥沟：如果可以选择的话，我愿意生活在那个世界中，而不是让他们变成相片化成记忆中中的那抹绚丽色彩。', '', '1.高原反应是人体为适应自然环境而出现的自然现象，身体瘦弱者不要担心，强壮者不要自负，没必要为去高原而刻意锻炼身体，但进高原前应充分休息，把自己的身体调整在最佳状态，不要带着感冒入高原。最佳心态是把高原反应作为一种体验！\n2.本次旅行属藏地高原旅行，吃住条件一般，请作正确评估后报名。一旦报名确认，因自身原因改变行程的情况，原计划预定的宾馆、交通等费用由队员承担。\n3.本次活动强制购买保险。', '', '', '2012-06-26 13:22:47', '2012-07-03 10:03:44', null, '清明,五一,端午,中秋,国庆,暑假,', '休闲度假,摄影旅行,徒步旅行,心灵之旅,', '四姑娘山,都江堰,日隆,映秀,卧龙,', '家庭,朋友,公司,商务,', '1');

-- ----------------------------
-- Table structure for `tour_theme`
-- ----------------------------
DROP TABLE IF EXISTS `tour_theme`;
CREATE TABLE `tour_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tour_theme
-- ----------------------------
INSERT INTO `tour_theme` VALUES ('1', '休闲度假');
INSERT INTO `tour_theme` VALUES ('2', '摄影旅行');
INSERT INTO `tour_theme` VALUES ('3', '美食之旅');
INSERT INTO `tour_theme` VALUES ('4', '徒步旅行');
INSERT INTO `tour_theme` VALUES ('5', '心灵之旅');
INSERT INTO `tour_theme` VALUES ('6', '公益旅行');

-- ----------------------------
-- Table structure for `travel_note`
-- ----------------------------
DROP TABLE IF EXISTS `travel_note`;
CREATE TABLE `travel_note` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `tour` int(11) NOT NULL COMMENT '相关活动',
  `type` varchar(50) DEFAULT NULL COMMENT '活动类型',
  `title` varchar(255) DEFAULT NULL COMMENT '游记标题',
  `description` varchar(255) DEFAULT NULL COMMENT 'SEO',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'keywords',
  `content` text COMMENT '游记正文',
  `editor` varchar(50) DEFAULT NULL COMMENT '小编',
  `edit_time` date DEFAULT NULL COMMENT '更新日期',
  `who_edit` varchar(50) DEFAULT NULL COMMENT '正在编辑',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of travel_note
-- ----------------------------

-- ----------------------------
-- Table structure for `travel_time`
-- ----------------------------
DROP TABLE IF EXISTS `travel_time`;
CREATE TABLE `travel_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taveltime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of travel_time
-- ----------------------------
INSERT INTO `travel_time` VALUES ('1', '春节');
INSERT INTO `travel_time` VALUES ('2', '圣诞');
INSERT INTO `travel_time` VALUES ('3', '元旦');
INSERT INTO `travel_time` VALUES ('4', '清明');
INSERT INTO `travel_time` VALUES ('5', '五一');
INSERT INTO `travel_time` VALUES ('6', '端午');
INSERT INTO `travel_time` VALUES ('7', '中秋');
INSERT INTO `travel_time` VALUES ('8', '国庆');
INSERT INTO `travel_time` VALUES ('9', '暑假');
INSERT INTO `travel_time` VALUES ('10', '寒假');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL COMMENT '姓名',
  `email` varchar(255) NOT NULL DEFAULT '0' COMMENT '邮箱',
  `password` char(20) NOT NULL DEFAULT '0' COMMENT '密码',
  `tel` char(51) DEFAULT NULL COMMENT '联系电话',
  `qq` varchar(255) DEFAULT NULL COMMENT '扣扣号',
  `city` varchar(50) DEFAULT NULL COMMENT '来自哪个城市',
  `order` text COMMENT '订单号',
  `avtar` varchar(255) DEFAULT NULL COMMENT '头像',
  `registered` datetime NOT NULL,
  `logintime` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='用户';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('16', '李文', 'liwen@liwen.com', '123', '774949384', null, null, '', '', '2012-06-29 15:45:17', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('17', '陈照', 'chenzhao@chenzhao.com', '123', '32329392', null, null, '', '', '2012-06-29 15:46:01', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('18', 'Ivan', 'guilinivan@gmail.com', '100192', '13308180640', null, null, '', '', '2012-07-03 09:02:39', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `web_page`
-- ----------------------------
DROP TABLE IF EXISTS `web_page`;
CREATE TABLE `web_page` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL COMMENT '页面类型',
  `title` varchar(50) DEFAULT NULL COMMENT 'title',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT 'seo',
  `content` text COMMENT '页面内容',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_page
-- ----------------------------
INSERT INTO `web_page` VALUES ('1', 'index', null, null, null, null);
INSERT INTO `web_page` VALUES ('2', 'regular_tour', '定期活动', '', '', '');
INSERT INTO `web_page` VALUES ('3', 'theme_tour', '主题旅行', '', '', '');
INSERT INTO `web_page` VALUES ('4', 'company_tour', '公司旅行', '', '', '');
INSERT INTO `web_page` VALUES ('5', 'about_us', null, null, null, null);
