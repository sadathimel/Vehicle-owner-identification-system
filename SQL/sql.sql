CREATE TABLE `vehicle` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `vnplate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `vmodel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `speed` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `fine` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;