CREATE TABLE `users` (
`uid` int(11) AUTO_INCREMENT PRIMARY KEY,
`username` varchar(255) UNIQUE KEY,
`password` varchar(100),
`profile_image` varchar(200)
)
