-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 jan. 2019 à 17:16
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd-acdi`
--

-- --------------------------------------------------------

--
-- Structure de la table `mon-admin`
--

DROP TABLE IF EXISTS `mon-admin`;
CREATE TABLE IF NOT EXISTS `mon-admin` (
  `identifiant` varchar(30) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`identifiant`,`mdp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Identifiants pour accéder à l''espace admin';

--
-- Déchargement des données de la table `mon-admin`
--

INSERT INTO `mon-admin` (`identifiant`, `mdp`) VALUES
('152049', 'dd6c1fba2d07e3d07d272219d1ac13c790f6648285bbabc8d588a55475f08739');

-- --------------------------------------------------------

--
-- Structure de la table `mon-articles`
--

DROP TABLE IF EXISTS `mon-articles`;
CREATE TABLE IF NOT EXISTS `mon-articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre_fr` varchar(50) NOT NULL,
  `contenu_fr` text NOT NULL,
  `tags_fr` text,
  `titre_en` varchar(50) NOT NULL,
  `contenu_en` text NOT NULL,
  `tags_en` text,
  `id_rubrique` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articles_rubrique` (`id_rubrique`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mon-articles`
--

INSERT INTO `mon-articles` (`id`, `titre_fr`, `contenu_fr`, `tags_fr`, `titre_en`, `contenu_en`, `tags_en`, `id_rubrique`) VALUES
(1, 'Présentation', '<p>Contenu français</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemque diviserunt naturam hominis in animum et corpus. Consequens enim est et post oritur, ut dixi. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? <a href=\"http://loripsum.net/\" target=\"_blank\">Sed ad illum redeo.</a> Tum Triarius: Posthac quidem, inquit, audacius. </p>\r\n\r\n<p>Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. <b>Duo Reges: constructio interrete.</b> <b>Huius ego nunc auctoritatem sequens idem faciam.</b> Et quod est munus, quod opus sapientiae? Nec enim, dum metuit, iustus est, et certe, si metuere destiterit, non erit; Nam Pyrrho, Aristo, Erillus iam diu abiecti. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. </p>\r\n\r\n<p>Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Non risu potius quam oratione eiciendum? Torquatus, is qui consul cum Cn. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem. Minime vero, inquit ille, consentit. </p>\r\n\r\n', 'description, formation', 'Presentation', '<p>Contenu anglais</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemque diviserunt naturam hominis in animum et corpus. Consequens enim est et post oritur, ut dixi. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? <a href=\"http://loripsum.net/\" target=\"_blank\">Sed ad illum redeo.</a> Tum Triarius: Posthac quidem, inquit, audacius. </p>\r\n\r\n<p>Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. <b>Duo Reges: constructio interrete.</b> <b>Huius ego nunc auctoritatem sequens idem faciam.</b> Et quod est munus, quod opus sapientiae? Nec enim, dum metuit, iustus est, et certe, si metuere destiterit, non erit; Nam Pyrrho, Aristo, Erillus iam diu abiecti. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. </p>\r\n\r\n<p>Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Non risu potius quam oratione eiciendum? Torquatus, is qui consul cum Cn. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem. Minime vero, inquit ille, consentit. </p>\r\n\r\n', 'description, education', 1),
(2, 'Revues de presse', '<p>Contenu français</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemque diviserunt naturam hominis in animum et corpus. Consequens enim est et post oritur, ut dixi. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? <a href=\"http://loripsum.net/\" target=\"_blank\">Sed ad illum redeo.</a> Tum Triarius: Posthac quidem, inquit, audacius. </p>\r\n\r\n<p>Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. <b>Duo Reges: constructio interrete.</b> <b>Huius ego nunc auctoritatem sequens idem faciam.</b> Et quod est munus, quod opus sapientiae? Nec enim, dum metuit, iustus est, et certe, si metuere destiterit, non erit; Nam Pyrrho, Aristo, Erillus iam diu abiecti. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. </p>\r\n\r\n<p>Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Non risu potius quam oratione eiciendum? Torquatus, is qui consul cum Cn. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem. Minime vero, inquit ille, consentit. </p>\r\n\r\n', 'articles', 'Press reviews', '<p>Contenu anglais</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemque diviserunt naturam hominis in animum et corpus. Consequens enim est et post oritur, ut dixi. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? <a href=\"http://loripsum.net/\" target=\"_blank\">Sed ad illum redeo.</a> Tum Triarius: Posthac quidem, inquit, audacius. </p>\r\n\r\n<p>Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. <b>Duo Reges: constructio interrete.</b> <b>Huius ego nunc auctoritatem sequens idem faciam.</b> Et quod est munus, quod opus sapientiae? Nec enim, dum metuit, iustus est, et certe, si metuere destiterit, non erit; Nam Pyrrho, Aristo, Erillus iam diu abiecti. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. </p>\r\n\r\n<p>Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Non risu potius quam oratione eiciendum? Torquatus, is qui consul cum Cn. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem. Minime vero, inquit ille, consentit. </p>\r\n\r\n', 'articles', 1),
(3, 'Programme', '<p>Contenu français</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'matières, cours, leçons', 'Program', '<p>Contenu anglais</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'subjects, courses, lessons', 2),
(4, 'Programme Pédagogique National', '<p>Contenu français</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'PPN', 'National Pedagogical Program', '<p>Contenu anglais</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'NPP', 2),
(5, 'Débouchés', '<p>Contenu français</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'métiers, emplois', 'Prospects', '<p>Contenu anglais</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'professions, jobs', 3),
(6, 'Poursuite d\'étude', '<p>Contenu français</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'écoles, universités', 'Study pursuit', '<p>Contenu anglais</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'schools, universities', 3),
(7, 'Evènements', '<p>Contenu français</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'nouveautés, concours, actualités', 'Events', '<p>Contenu anglais</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? <i>Si id dicis, vicimus.</i> Moriatur, inquit. Duo Reges: constructio interrete. Progredientibus autem aetatibus sensim tardeve potius quasi nosmet ipsos cognoscimus. Sed audiamus ipsum: Compensabatur, inquit, tamen cum his omnibus animi laetitia, quam capiebam memoria rationum inventorumque nostrorum. Primum in nostrane potestate est, quid meminerimus? Non autem hoc: igitur ne illud quidem. </p>\r\n\r\n<p>Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? An tu me de L. Erit enim instructus ad mortem contemnendam, ad exilium, ad ipsum etiam dolorem. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Ac tamen hic mallet non dolere. Non potes, nisi retexueris illa. <a href=\"http://loripsum.net/\" target=\"_blank\">Ratio enim nostra consentit, pugnat oratio.</a> Et quidem, inquit, vehementer errat; </p>\r\n\r\n<p>Quippe: habes enim a rhetoribus; Ille enim occurrentia nescio quae comminiscebatur; Qualem igitur hominem natura inchoavit? Ostendit pedes et pectus. Eadem nunc mea adversum te oratio est. Ita graviter et severe voluptatem secrevit a bono. Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Indicant pueri, in quibus ut in speculis natura cernitur. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Hoc enim identidem dicitis, non intellegere nos quam dicatis voluptatem. </p>\r\n\r\n', 'contests, news', 4),
(8, 'Suis-je fait pour l\'IUT info ?', '<p>Contenu français</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemque diviserunt naturam hominis in animum et corpus. Consequens enim est et post oritur, ut dixi. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? <a href=\"http://loripsum.net/\" target=\"_blank\">Sed ad illum redeo.</a> Tum Triarius: Posthac quidem, inquit, audacius. </p>\r\n\r\n<p>Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. <b>Duo Reges: constructio interrete.</b> <b>Huius ego nunc auctoritatem sequens idem faciam.</b> Et quod est munus, quod opus sapientiae? Nec enim, dum metuit, iustus est, et certe, si metuere destiterit, non erit; Nam Pyrrho, Aristo, Erillus iam diu abiecti. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. </p>\r\n\r\n<p>Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Non risu potius quam oratione eiciendum? Torquatus, is qui consul cum Cn. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem. Minime vero, inquit ille, consentit. </p>\r\n\r\n', 'profil, compétences', 'Do I have the right profile for the IT IUT?', '<p>Contenu anglais</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemque diviserunt naturam hominis in animum et corpus. Consequens enim est et post oritur, ut dixi. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? <a href=\"http://loripsum.net/\" target=\"_blank\">Sed ad illum redeo.</a> Tum Triarius: Posthac quidem, inquit, audacius. </p>\r\n\r\n<p>Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. <b>Duo Reges: constructio interrete.</b> <b>Huius ego nunc auctoritatem sequens idem faciam.</b> Et quod est munus, quod opus sapientiae? Nec enim, dum metuit, iustus est, et certe, si metuere destiterit, non erit; Nam Pyrrho, Aristo, Erillus iam diu abiecti. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. </p>\r\n\r\n<p>Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Non risu potius quam oratione eiciendum? Torquatus, is qui consul cum Cn. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem. Minime vero, inquit ille, consentit. </p>\r\n\r\n', 'profile, skills', 1),
(9, 'L\'info au féminin', '<p>Contenu français</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemque diviserunt naturam hominis in animum et corpus. Consequens enim est et post oritur, ut dixi. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? <a href=\"http://loripsum.net/\" target=\"_blank\">Sed ad illum redeo.</a> Tum Triarius: Posthac quidem, inquit, audacius. </p>\r\n\r\n<p>Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. <b>Duo Reges: constructio interrete.</b> <b>Huius ego nunc auctoritatem sequens idem faciam.</b> Et quod est munus, quod opus sapientiae? Nec enim, dum metuit, iustus est, et certe, si metuere destiterit, non erit; Nam Pyrrho, Aristo, Erillus iam diu abiecti. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. </p>\r\n\r\n<p>Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Non risu potius quam oratione eiciendum? Torquatus, is qui consul cum Cn. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem. Minime vero, inquit ille, consentit. </p>\r\n\r\n', 'fille, femme, parité', 'The computer science department for women', '<p>Contenu anglais</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemque diviserunt naturam hominis in animum et corpus. Consequens enim est et post oritur, ut dixi. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? <a href=\"http://loripsum.net/\" target=\"_blank\">Sed ad illum redeo.</a> Tum Triarius: Posthac quidem, inquit, audacius. </p>\r\n\r\n<p>Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. <b>Duo Reges: constructio interrete.</b> <b>Huius ego nunc auctoritatem sequens idem faciam.</b> Et quod est munus, quod opus sapientiae? Nec enim, dum metuit, iustus est, et certe, si metuere destiterit, non erit; Nam Pyrrho, Aristo, Erillus iam diu abiecti. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Est enim tanti philosophi tamque nobilis audacter sua decreta defendere. </p>\r\n\r\n<p>Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. An vero, inquit, quisquam potest probare, quod perceptfum, quod. Non risu potius quam oratione eiciendum? Torquatus, is qui consul cum Cn. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. Quae iam oratio non a philosopho aliquo, sed a censore opprimenda est. Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem. Minime vero, inquit ille, consentit. </p>\r\n\r\n', 'fille, femme, parité', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mon-contact`
--

DROP TABLE IF EXISTS `mon-contact`;
CREATE TABLE IF NOT EXISTS `mon-contact` (
  `mail` varchar(30) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='adresse mail pour le formulaire de contact';

--
-- Déchargement des données de la table `mon-contact`
--

INSERT INTO `mon-contact` (`mail`) VALUES
('webmaster@iut-informatique.fr');

-- --------------------------------------------------------

--
-- Structure de la table `mon-instituts`
--

DROP TABLE IF EXISTS `mon-instituts`;
CREATE TABLE IF NOT EXISTS `mon-instituts` (
  `institut` varchar(50) NOT NULL,
  `universite` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `region` varchar(30) DEFAULT NULL,
  `adresse` varchar(100) NOT NULL,
  `code_postal` int(10) UNSIGNED NOT NULL,
  `gmaps` tinytext COMMENT 'lien de l''établissement vers Google Maps',
  `site` text NOT NULL,
  `tel` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_responsable` int(10) UNSIGNED DEFAULT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  PRIMARY KEY (`institut`),
  KEY `fk_instituts_responsable` (`id_responsable`),
  KEY `fk_instituts_region` (`region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='liste des IUT info';

--
-- Déchargement des données de la table `mon-instituts`
--

INSERT INTO `mon-instituts` (`institut`, `universite`, `ville`, `region`, `adresse`, `code_postal`, `gmaps`, `site`, `tel`, `id_responsable`, `longitude`, `latitude`) VALUES
('IUT de Montpellier', 'Université Montpellier 2 des Sciences et Techniques', 'Montpellier', 'Occitanie', '99 avenue d\'Occitanie', 34296, 'https://goo.gl/maps/SUoEskhKrQC2', 'http://iutdepinfo.iutmontp.univ-montp2.fr/', 0499585180, 35, 3.85201, 43.6363),
('IUT de Montreuil', 'Université Paris 8', 'Paris', 'Île-de-France', '140 rue de la Nouvelle France', 93100, 'https://goo.gl/maps/XtEYBiNh9s32', 'http://www.iut.univ-paris8.fr/fr/Formations/DUT_Informatique', 0148703712, 101, 2.46441, 48.8624),
('IUT de Nantes', 'Université de Nantes', 'Nantes cedex 1', 'Pays de la Loire', '3 Rue Maréchal Joffre BP 34103', 44041, 'https://goo.gl/maps/PX2sCLhL3Fq', 'http://www.iutnantes.univ-nantes.fr/91745/0/fiche___defaultstructureksup/&RH=1183119182323', 0240306050, 102, -1.54468, 47.2235),
('IUT de Nice Côte d\'Azur', 'Université de Nice Sophia Antipolis', 'Nice cedex 3', 'Provence-Alpes-Côte d\'Azur', '41 Boulevard Napoléon III', 6206, 'https://goo.gl/maps/k13iUedFNJL2', 'http://www-iut.unice.fr', 0497258211, 11, 7.22783, 43.687),
('IUT de Reims-Châlons-Charleville', 'Université de Reims Champagne-Ardenne', 'Reims cedex 2', 'Grand Est', 'Rue des crayères BP 1035', 51687, 'https://goo.gl/maps/HRrSZet8Gtw', 'http://www.univ-reims.fr/index.php', 0326913050, 103, 4.06437, 49.2408),
('IUT de Rodez', 'Université de Toulouse 1 Sciences Sociales', 'Rodez', 'Occitanie', '33 Avenue du 8 Mai 1945', 12000, 'https://goo.gl/maps/ui2zeXWJdHB2', 'http://www.iut-rodez.fr/index.php?page=informatique/index', 0565771080, 104, 2.57583, 44.3602),
('IUT de Saint-Dié des Vosges', 'Université Henri Poincaré Nancy 1', 'Saint-Dié des Vosges', 'Grand Est', '11 rue de l\'Université', 88100, 'https://goo.gl/maps/xCiX1sLr5u82', 'http://www.iutsd.uhp-nancy.fr/index1.htm', 0329536002, 105, 6.94223, 48.29),
('IUT de Sénart Fontainebleau', 'Université Paris-Est Créteil (UPEC)', 'Fontainebleau', 'Île-de-France', 'Route Hurtault', 77300, 'https://goo.gl/maps/DhjGMC7c3uR2', 'http://www.iutsf.com/', 0160746802, 106, 2.68723, 48.3982),
('IUT de Valence', 'Université Pierre Mendès France Grenoble', 'Valence cedex 9', 'Auvergne-Rhône-Alpes', '51 rue Barthélémy de Laffemas BP 29', 26901, 'https://goo.gl/maps/Em3caozcMa32', 'http://www.iut-valence.fr/index-pole.html', 0475418840, 107, 4.91568, 44.9157),
('IUT de Vannes', 'Univeristé de Bretagne-Sud', 'Vannes cedex', 'Bretagne', '8 rue Montaigne BP 561', 56017, 'https://goo.gl/maps/25Nu3SCr9W32', 'http://www.iu-vannes.fr/Formations/info/presentation.asp', 0297626431, 108, -2.77662, 47.6442);

-- --------------------------------------------------------

--
-- Structure de la table `mon-lpros`
--

DROP TABLE IF EXISTS `mon-lpros`;
CREATE TABLE IF NOT EXISTS `mon-lpros` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `institut` varchar(50) NOT NULL,
  `sigle` varchar(10) DEFAULT NULL,
  `site` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lpro_institut` (`institut`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Liste des licences professionnelles informatique à l''IUT';

--
-- Déchargement des données de la table `mon-lpros`
--

INSERT INTO `mon-lpros` (`id`, `nom`, `institut`, `sigle`, `site`) VALUES
(1, 'Progiciels et systèmes de gestion intégrés', 'IUT de Montpellier', 'PSGI', 'http://iut-montpellier-sete.edu.umontpellier.fr/licence-professionnelle-metiers-de-linformatique-systemes-dinformation-et-gestion-de-donnees-psgi/'),
(2, 'Assistant Chef de Projet Informatique', 'IUT de Montpellier', 'ACPI', 'http://iut-montpellier-sete.edu.umontpellier.fr/licence-professionnelle-metiers-de-linformatique-conception-developpement-et-test-de-logiciels-acpi/'),
(3, 'Assistant de projet informatique, développement d\'application e-business', 'IUT de Montpellier', 'API DAE', 'http://iut-montpellier-sete.edu.umontpellier.fr/licence-metiers-de-linformatique-applications-web-apidae/'),
(4, 'Développement Applications Mobiles', 'IUT de Nice Côte d\'Azur', 'DAM', 'dam.unice.fr'),
(5, 'Internet des Objets : Technologies, Infrastructures, Applications', 'IUT de Nice Côte d\'Azur', 'IOTIA', 'iotia.unice.fr');

-- --------------------------------------------------------

--
-- Structure de la table `mon-nombres`
--

DROP TABLE IF EXISTS `mon-nombres`;
CREATE TABLE IF NOT EXISTS `mon-nombres` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `intitule_fr` varchar(50) NOT NULL,
  `intitule_en` varchar(50) NOT NULL,
  `valeur` float NOT NULL,
  `unite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Nombres affichés sur la page d''accueil du site';

--
-- Déchargement des données de la table `mon-nombres`
--

INSERT INTO `mon-nombres` (`id`, `intitule_fr`, `intitule_en`, `valeur`, `unite`) VALUES
(1, 'enseignent la formation', 'teach the formation', 45, 'IUT'),
(2, 'étudiants en 2016/2017', 'students in 2016/2017', 8886, NULL),
(3, 'de formation', 'of training', 1800, 'h');

-- --------------------------------------------------------

--
-- Structure de la table `mon-partenaires`
--

DROP TABLE IF EXISTS `mon-partenaires`;
CREATE TABLE IF NOT EXISTS `mon-partenaires` (
  `nom` varchar(20) NOT NULL,
  `site` text NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mon-partenaires`
--

INSERT INTO `mon-partenaires` (`nom`, `site`) VALUES
('Atos', 'https://atos.net/'),
('Capgemini', 'https://www.capgemini.com/'),
('Cigref', 'https://www.cigref.fr/'),
('IBM', 'https://www.ibm.com/'),
('Microsoft', 'https://www.microsoft.com/'),
('Syntec numérique', 'https://syntec-numerique.fr/'),
('Unilog', 'https://web.archive.org/web/20111201060011/http://www.logica.fr/');

-- --------------------------------------------------------

--
-- Structure de la table `mon-regions`
--

DROP TABLE IF EXISTS `mon-regions`;
CREATE TABLE IF NOT EXISTS `mon-regions` (
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Liste des régions de France';

--
-- Déchargement des données de la table `mon-regions`
--

INSERT INTO `mon-regions` (`nom`) VALUES
('Auvergne-Rhône-Alpes'),
('Bourgogne-Franche-Comté'),
('Bretagne'),
('Centre-Val de Loire'),
('Grand Est'),
('Hauts-de-France'),
('Île-de-France'),
('Normandie'),
('Nouvelle-Aquitaine'),
('Occitanie'),
('Pays de la Loire'),
('Provence-Alpes-Côte d\'Azur');

-- --------------------------------------------------------

--
-- Structure de la table `mon-responsables`
--

DROP TABLE IF EXISTS `mon-responsables`;
CREATE TABLE IF NOT EXISTS `mon-responsables` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mon-responsables`
--

INSERT INTO `mon-responsables` (`id`, `nom`, `prenom`, `mail`) VALUES
(1, 'Voiron', 'Nicolas', 'nicolas.voiron@univ-smb.fr'),
(2, 'Damas', 'Luc', 'luc.damas@univ-smb.fr'),
(3, 'Couturier', 'Vincent', 'info@tetras.univ-smb.fr'),
(4, 'Coat', 'Françoise', 'alternance-info@iut2.univ-grenoble-alpes.fr'),
(5, 'Dupuy-Chessa', 'Sophie', 'alternance-info@iut2.univ-grenoble-alpes.fr'),
(6, 'Roisin', 'Cécile', 'alternance-info@iut2.univ-grenoble-alpes.fr'),
(7, 'Martin', 'Philippe', 'alternance-info@iut2.univ-grenoble-alpes.fr'),
(8, 'Rety', 'Jean-Hugues', 'csid@iut.univ-paris8.fr'),
(9, 'Cataldi', 'Mario', 'cim@iut.univ-paris8.fr'),
(10, 'Duvallet', 'Claude', 'claude.duvallet@univ-lehavre.fr'),
(11, 'Donati', 'Léo', 'leo.donati@unice.fr'),
(12, 'Le Thanh', 'Nhan', 'nlt@unice.fr'),
(13, 'Bourdon', 'François', 'francois.bourdon@unicaen.fr'),
(14, 'Journet', 'Nicholas', 'nicholas.journet@u-bordeaux.fr'),
(15, 'Roose', 'Philippe', 'Philippe.Roose@iutbayonne.univ-pau.fr'),
(16, 'Aniorté', 'Philippe', 'philippe.aniorte@iutbayonne.univ-pau.fr'),
(17, 'Charr', 'Jean-Claude', 'jean-claude.charr@univ-fcomte.fr'),
(18, 'Hemery', 'Fred', 'fred.hemery@univ-artois.fr'),
(19, 'Guibert', 'Olivier', 'olivier.guibert@u-bordeaux.fr'),
(20, 'Martin-Nevot', 'Mickaël', 'mickael.martin-nevot@univ-amu.fr'),
(21, 'Dosch', 'Philippe', 'philippe.dosch@univ-lorraine.fr'),
(22, 'Salva', 'Sebastien', 'sebastien.salva@uca.fr'),
(23, 'Lanoix Brauer', 'Arnaud', 'Arnaud.Lanoix@univ-nantes.fr'),
(24, 'Leblanc', 'Hervé', 'herve.leblanc@iut-tlse3.fr'),
(25, 'Raspaud', 'Pascale', 'pascale.raspaud@iut-tlse3.fr'),
(26, 'Lohou', 'Christophe', 'christophe.lohou@uca.fr'),
(27, 'Loyer', 'Yann', 'yann.loyer@uvsq.fr'),
(33, 'Chastagner', 'Michel', 'michel.chastagner@unilim.fr'),
(34, 'Eggrickx', 'Ariel', 'ariel.eggrickx@umontpellier.fr'),
(35, 'Garcia', 'Francis', 'francis.garcia@umontpellier.fr'),
(36, 'Palleja', 'Xavier', 'xavier.palleja@umontpellier.fr'),
(37, 'Bellahsene', 'Zohra', 'zohra.bellahsene@umontpellier.fr'),
(38, 'Bourdé', 'Pascal', 'pascal.bourde@u-picardie.fr'),
(39, 'Kraemer', 'Pierre', 'kraemer@unistra.fr'),
(40, 'Guidet', 'Alexandre', 'rplpbigdata@iut-dijon.u-bourgogne.fr'),
(41, 'Bouhours', 'Cédric', 'cedric.bouhours@uca.fr'),
(42, 'Peter', 'Yvan', 'Yvan.Peter@univ-lille1.fr'),
(43, 'Hauspie', 'Michaël', 'da2i@univ-lille1.fr'),
(44, 'Boughanem', 'Mohand', 'mohand.boughanem@iut-tlse3.fr'),
(45, 'Marquié', 'Olivier', 'olivier.marquie@iut-tlse3.fr'),
(46, 'Farrugia', 'Jean-Philippe', 'iut.lp.iem@univ-lyon1.fr'),
(47, 'Valette', 'Franck', 'iut.lp.metinet@univ-lyon1.fr'),
(48, 'Benouaret', 'Karim', 'iut.lp.metinet@univ-lyon1.fr'),
(49, 'Kerkeni', 'Insaf', 'kerkeni@univ-littoral.fr'),
(50, 'Raïevsky', 'Clément', 'casir@iut-valence.fr'),
(51, 'Martin', 'Arnaud', 'Arnuad.Martin@univ-rennes1.fr'),
(52, 'Vautrot', 'Philippe', 'philippe.vautrot@univ-reims.fr'),
(53, 'Dupuis', 'Richard', 'richard.dupuis@univ-reims.fr'),
(54, 'Vanier', 'Pascal', 'pascal.vanier@u-pec.fr'),
(55, 'Laroche', 'Pierre', 'pierre.laroche@univ-lorraine.fr'),
(56, 'Khaldi', 'Mohamed', 'mohamed.khaldi@univ-lyon1.fr'),
(57, 'Fenet', 'Serge', 'serge.fenet@univ-lyon1.fr'),
(58, 'Merrheim', 'Xavier', 'xavier.merrheim@univ-lyon1.fr'),
(59, 'Oubahssi', 'Lahcen', 'lahcen.oubahssi@univ-lemans.fr'),
(60, 'Keller', 'Chantal', 'chantal.keller@u-psud.fr'),
(61, 'Brown-Brulant', 'Nathalie', 'nathalie.brown-brulant@u-psud.fr'),
(62, 'Zargayouna', 'Haïfa', 'secrinfo@iutv.univ-paris13.fr'),
(63, 'Hellegouarc\'h', 'Pascale', 'secrappi@iutv.univ-paris13.fr'),
(64, 'Le Lain', 'Matthieu', 'matthieu.le-lain@univ-ubs.fr'),
(65, 'Ledjou', 'Jean-Michel', 'jean-michel.ledjou@u-psud.fr'),
(66, 'Crépel', 'Frédérique', 'frederique.crepel@u-psud.fr'),
(67, 'Teste', 'Olivier', 'olivier.teste@univ-tlse2.fr'),
(68, 'Rozsavolgy', 'Gérard', 'gerard.rozsavolgy@univ-orleans.fr'),
(69, 'Fessy', 'Jérome', 'jerome.fessy@parisdescartes.fr'),
(70, 'Canals', 'Gérôme', 'gerome.canals@univ-lorraine.fr'),
(71, 'Lassus', 'Annick', 'alassus@univ-lr.fr'),
(72, 'Ghamri', 'Yacine', 'yacine.ghamri@univ-lr.fr'),
(73, 'Nitschke', 'Pascal', 'pascal.nitschke@univ-lorraine.fr'),
(74, 'Frauensohn', 'Hubert', 'hubert.frauensohn@univ-lorraine.fr'),
(75, 'Habbas', 'Zineb', 'zineb.habbas@univ-lorraine.fr'),
(76, 'Delacroix', 'Joëlle', 'delacroix@cnam.fr'),
(77, 'Blanco-Lainé', 'Gaëlle', 'gaelle.blanco-laine@iut2.upmf-grenoble.fr'),
(78, 'Secq', 'Yann', 'yann.secq@univ-lille1.fr'),
(79, 'Busson', 'Anthony', 'anthony.busson@univ-lyon1.fr'),
(80, 'Effantin', 'Brice', 'brice.effantin-dit-toussaint@univ-lyon1.fr'),
(81, 'Magnaud', 'Patrick', 'patrick.magnaud@iut-tlse3.fr'),
(82, 'Brigoulet', 'Pascale', 'pascale.brigoulet@udamail.fr'),
(83, 'Casali', 'Alain', 'alain.casali@univ-amu.fr'),
(84, 'Desbenoit', 'Brett', 'brett.desbenoit@univ-amu.fr'),
(85, 'Clérentin', 'Arnaud', 'arnaud.clerentin@u-picardie.fr'),
(86, 'Colin', 'Pascal', 'pascal.colin@univ-savoie.fr'),
(87, 'Cleuziou', 'Guillaume', 'guillaume.cleuziou@univ-orleans.fr'),
(88, 'Lopez', 'Rafael', 'rafael.lopez@u-psud.fr'),
(89, 'Reynaud', 'Chantal', 'chantal.reynaud@u-psud.fr'),
(90, 'Deschinkel', 'Karine', 'karine.deschinkel@univ-fcomte.fr'),
(91, 'Nonne', 'Laurent', 'laurent.nonne@univ-tlse2.fr'),
(92, 'Pêcher', 'Arnaud', 'arnaud.pecher@u-bordeaux.fr'),
(93, 'Loudni', 'Samir', 'samir.loudni@unicaen.fr'),
(94, 'Pacou', 'Anne', 'anne.pacou@univ-littoral.fr'),
(95, 'Rampacek', 'Sylvain', 'sylvain.rampacek@iut-dijon.u-bourgogne.fr'),
(96, 'Rahmouni', 'Abib', 'adib.rahmouni@univ-rennes1.fr'),
(97, 'Vieillard', 'Nathalie', 'nathalie.vieillard@univ-lemans.fr'),
(98, 'Chmeiss', 'Assef', 'assef.chmeiss@univ-artois.fr'),
(99, 'Kyriacopoulou', 'Tita', 'tita@univ-mlv.fr'),
(100, 'Polet', 'Philippe', 'philippe.polet@univ-valenciennes.fr'),
(101, 'Lamolle', 'Myriam', 'm.lamolle@iut.univ-paris8.fr'),
(102, 'Jacquin', 'Christine', 'Christine.Jacquin@univ-nantes.fr'),
(103, 'Nourrit', 'Jean-Michel', 'jm.nourrit@univ-reims.fr'),
(104, 'Bélières', 'Bruno', 'bruno.belieres@iut-rodez.fr'),
(105, 'Finck', 'Denis', 'denis.finck@univ-lorraine.fr'),
(106, 'Valarcher', 'Pierre', 'valarcher@u-pec.fr'),
(107, 'Jean', 'Sébastien', 'sebastien.jean@iut-valence.fr'),
(108, 'Kamp', 'Jean-François', 'jean-francois.kamp@univ-ubs.fr'),
(109, 'Barbot', 'Emmanuelle', 'emmanuelle.barbot@iut-velizy.uvsq.fr'),
(110, 'Dubacq', 'Jean-Christophe', 'jean-christophe.dubacq@iutv.univ-paris13.fr'),
(111, 'Le Pivert', 'Philippe', 'philippe.le-pivert@univ-lehavre.fr'),
(112, 'Merillou', 'Nicolas', 'nicolas.merillou@unilim.fr'),
(113, 'Sauvage', 'Vincent', 'vincent.sauvage@uca.fr'),
(114, 'Crottereau', 'Philippe', 'philippe.crottereau@univ-lr.fr'),
(115, 'Bellalem', 'Nadia', 'nadia.bellalem@univ-lorraine.fr'),
(116, 'Dirani', 'Hélène', 'helene.dirani@parisdescartes.fr'),
(117, 'Wemmert', 'Cédric', 'wemmert@unistra.fr');

-- --------------------------------------------------------

--
-- Structure de la table `mon-responsables-lpros`
--

DROP TABLE IF EXISTS `mon-responsables-lpros`;
CREATE TABLE IF NOT EXISTS `mon-responsables-lpros` (
  `id_lpro` int(10) UNSIGNED NOT NULL,
  `id_responsable` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_lpro`,`id_responsable`),
  KEY `fk_resp-lp_id_responsable` (`id_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mon-responsables-lpros`
--

INSERT INTO `mon-responsables-lpros` (`id_lpro`, `id_responsable`) VALUES
(4, 11),
(5, 12),
(1, 34),
(1, 35),
(2, 36),
(3, 37);

-- --------------------------------------------------------

--
-- Structure de la table `mon-rubriques`
--

DROP TABLE IF EXISTS `mon-rubriques`;
CREATE TABLE IF NOT EXISTS `mon-rubriques` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_fr` varchar(50) NOT NULL,
  `nom_en` varchar(50) NOT NULL,
  `rubrique_mere` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rubriques_id` (`rubrique_mere`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mon-rubriques`
--

INSERT INTO `mon-rubriques` (`id`, `nom_fr`, `nom_en`, `rubrique_mere`) VALUES
(1, 'L\'IUT info, c\'est quoi ?', 'What\'s the IT IUT ?', NULL),
(2, 'Programme', 'Program', NULL),
(3, 'Après l\'IUT', 'After the IUT', NULL),
(4, 'Evènements', 'Events', NULL),
(5, 'Présentation', 'Presentation', 1),
(6, 'Témoignages', 'Testimonies', 1),
(7, 'Revues de presse', 'Press review', 1),
(8, 'Débouchés', 'Prospects', 3),
(9, 'Poursuite d\'étude', 'Study pursuit', 3);

-- --------------------------------------------------------

--
-- Structure de la table `mon-slides`
--

DROP TABLE IF EXISTS `mon-slides`;
CREATE TABLE IF NOT EXISTS `mon-slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_fr` varchar(100) NOT NULL,
  `titre_en` varchar(100) NOT NULL,
  `lien` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Slides pour le diaporama de la page index';

--
-- Déchargement des données de la table `mon-slides`
--

INSERT INTO `mon-slides` (`id`, `titre_fr`, `titre_en`, `lien`) VALUES
(1, 'Découvrez les résultats et la vidéo de la Nuit de l\'info 2018 !', 'Discover the results and the video from the 2018\'s Nuit de l\'info', 'https://www.nuitdelinfo.com/'),
(2, 'Envie de redécouvrir l\'ancien site officiel des IUT informatique ?', 'Want to rediscover the old computer\'s UIT\'s website ?', 'http://iut-informatique.fr/'),
(3, 'Quelques actualités...', 'Some news...', 'https://www.lemondeinformatique.fr/'),
(4, 'Coder facilement en SEULEMENT 13 étapes !!', 'Code easily in ONLY 13 steps !!', 'https://fr.wikihow.com/coder');

-- --------------------------------------------------------

--
-- Structure de la table `mon-temoignages`
--

DROP TABLE IF EXISTS `mon-temoignages`;
CREATE TABLE IF NOT EXISTS `mon-temoignages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `statut_fr` varchar(50) NOT NULL,
  `message_fr` text NOT NULL,
  `statut_en` varchar(50) NOT NULL,
  `message_en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mon-temoignages`
--

INSERT INTO `mon-temoignages` (`id`, `nom`, `prenom`, `age`, `statut_fr`, `message_fr`, `statut_en`, `message_en`) VALUES
(1, 'Dorellon', 'Guillaume', 20, 'Ancien étudiant', 'Beaucoup de bons souvenirs à l\'IUT de Montpellier, où j\'ai pu apprendre et développer beaucoup de compétences autour de l\'informatique', 'Former student', 'Many good memories at the UIT of Montpellier, where I could learn and develop a lot of skills around IT'),
(2, 'Trinquier', 'Sébastien', 21, 'Développeur d\'applications et de sites web', 'Si j\'étais honnête, je dirais que j\'ai passé plus de temps chez moi qu\'à l\'IUT de Montpellier. Mais c\'est avant tout 3 belles années avec des bon moments, dans un cadre limite parfait. Je recommande vivement ce cursus et cette ville.', 'App and web developer', 'If I were honest, I would say that I spent more time at home than at the UIT of Montpellier. But above all, it was 3 beautiful years with good moments in an almost perfect setting. I highly recommend this education and this city.'),
(3, 'Mondo', 'Laure', 21, 'Développeuse web front-end', 'Je peux sans honte dire que les années que j\'ai passé à l\'IUT ont été celles où j\'ai le plus pris plaisir à apprendre ! Le mieux dans cette histoire c\'est que la grande majorité de ces savoirs me sont utiles aujourd\'hui dans le monde professionnel.', 'Front-end web developer', 'I can say without shame that the years I spent at the UIT were the ones I enjoyed the most! The best part of this story is that the vast majority of this knowledge is useful, to me today, in the professional world.'),
(4, 'Gasquet', 'Malo', 21, 'Master 1 AIGLE', 'Le DUT informatique m\'a apporté un enseignement de qualité avec un juste milieu entre le savoir théorique et technique, je considère toujours aujourd\'hui que c\'est la meilleure formation pour débuter un parcours dans le monde informatique tellement la variété des thèmes et technologies abordées ouvre des portes vers de multiples secteurs.', 'Master 1 AIGLE', 'The DUT gave me a quality education with a balance between theoretical and technical knowledge, I still consider today that it is the best training to start a career in the computer world so the variety of themes and technologies addressed opens doors to multiple sectors.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mon-articles`
--
ALTER TABLE `mon-articles` ADD FULLTEXT KEY `idx_search` (`titre_fr`,`contenu_fr`,`tags_fr`,`titre_en`,`contenu_en`,`tags_en`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mon-articles`
--
ALTER TABLE `mon-articles`
  ADD CONSTRAINT `fk_articles_rubrique` FOREIGN KEY (`id_rubrique`) REFERENCES `mon-rubriques` (`id`);

--
-- Contraintes pour la table `mon-instituts`
--
ALTER TABLE `mon-instituts`
  ADD CONSTRAINT `fk_instituts_region` FOREIGN KEY (`region`) REFERENCES `mon-regions` (`nom`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_instituts_responsable` FOREIGN KEY (`id_responsable`) REFERENCES `mon-responsables` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `mon-lpros`
--
ALTER TABLE `mon-lpros`
  ADD CONSTRAINT `fk_lpro_institut` FOREIGN KEY (`institut`) REFERENCES `mon-instituts` (`institut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mon-responsables-lpros`
--
ALTER TABLE `mon-responsables-lpros`
  ADD CONSTRAINT `fk_resp-lp_id_lpro` FOREIGN KEY (`id_lpro`) REFERENCES `mon-lpros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resp-lp_id_responsable` FOREIGN KEY (`id_responsable`) REFERENCES `mon-responsables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mon-rubriques`
--
ALTER TABLE `mon-rubriques`
  ADD CONSTRAINT `fk_rubriques_id` FOREIGN KEY (`rubrique_mere`) REFERENCES `mon-rubriques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
