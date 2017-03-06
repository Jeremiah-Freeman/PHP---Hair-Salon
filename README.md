![alt tag](https://static-s.aa-cdn.net/img/ios/785913304/0026aaca85bdcdad0525caade7b77e2f)

#### By Jeremiah Freeman

  ## Description/Specs
   * This in an application for a hair salon. The owner can add stylists and display stylists.  The owner can add clients to a stylist as well as see all clients for each stylist.


| Behavior | Input 1 | Output |
|----------|---------|--------|
| Client getName test | Sonya Blade | match/pass |
| Client getId test | 5 | match/pass |
| Client save() test | save Object 1 | Object 1 passes |
| Client getAll() test | get Object 1 and Object 2 | Object 1 and 2 gotten ( passes )|
| Client find() test | find Object 1 and Object 2 | Object 1 found |
| Client setName() test | new name = Kathy | Kathy = $new_name |
| Client stylist_id property addition | add stylist_id and test all construct tests | all test passing |
| Client delete single test | delete object one | object one deleted |
| Client deleteAll  test | delete Stylist and Client | all deleted |
| Client update test  | update object one | object one updated |
| Stylist getName test | Jesse G | match/pass |
| Stylist getId test | 500 | match/pass |
| Stylist save() test | save Object 1 | Object 1 passes |
| Stylist getAll() test | get Object 1 and Object 2 | Object 1 and 2 gotten ( passes )|
| Stylist find() test | find Object 1 and Object 2 | Object 1 found |
| Stylist setName() test | new name = Sophia | Sophia = $new_name |
| Stylist deleteAll  test | delete Clients and Stylist | all deleted |
| Stylist delete single test | delete object one | object one deleted |
| Stylist update test | update object one | object one updated |
| Stylist getClient test | get clients of single Stylist | all Clients of single Stylist gathered |

----
  list of all commands
 -- Database: `hair_salon`
 --
 CREATE DATABASE IF NOT EXISTS `hair_salon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
 USE `hair_salon`;

 -- --------------------------------------------------------

 --
 -- Table structure for table `clients`
 --

 CREATE TABLE `clients` (
   `id` bigint(20) UNSIGNED NOT NULL,
   `name` varchar(255) DEFAULT NULL,
   `stylist_id` bigint(20) DEFAULT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 -- --------------------------------------------------------

 --
 -- Table structure for table `stylists`
 --

 CREATE TABLE `stylists` (
   `id` bigint(20) UNSIGNED NOT NULL,
   `name` varchar(255) DEFAULT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 --
 -- Dumping data for table `stylists`
 --

 INSERT INTO `stylists` (`id`, `name`) VALUES
 (30, 'summerdats'),
 (31, 'sarah'),
 (32, 'happ');

 --
 -- Indexes for dumped tables
 --

 --
 -- Indexes for table `clients`
 --
 ALTER TABLE `clients`
   ADD PRIMARY KEY (`id`),
   ADD UNIQUE KEY `id` (`id`);

 --
 -- Indexes for table `stylists`
 --
 ALTER TABLE `stylists`
   ADD PRIMARY KEY (`id`),
   ADD UNIQUE KEY `id` (`id`);

 --
 -- AUTO_INCREMENT for dumped tables
 --

 --
 -- AUTO_INCREMENT for table `clients`
 --
 ALTER TABLE `clients`
   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
 --
 -- AUTO_INCREMENT for table `stylists`
 --
 ALTER TABLE `stylists`
   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

 ---------

  ## Setup / Installation Requirements

  * MAMP is required for viewing. If you do not have MAMP please download it here 'https://www.mamp.info/en/'.  After installation please select 'start servers'.
  * Open web browser.
  * Clone this, "https://github.com/jaythinkshappiness/PHP---Hair-Salon" repository.
  * Before preceding, download the two (2) database zip files in the repository named:
    - hair_salon.sql (1).zip
    - hair_salon_test.sql (1).zip
  * Next, open 'http://localhost:8888/phpmyadmin/' and select the tab 'Import'.
  * Import the two zip files you just downloaded. 
  * Open Terminal.
  * If using Mac computer run this code in terminal if 'Composer' has not been previously installed.
 - cd ~
 -sudo mkdir -p /usr/local/bin
 -sudo chown -R $USER /usr/local/
 -curl -sS https://getcomposer.org/installer | php
 -mv composer.phar /usr/local/bin/composer
 * If running a windows computer and 'Composer' has not been previously installed:
     -please go to this address, a download will automatically install: "https://getcomposer.org/Composer-Setup.exe".
     -follow all setup and installation instructions.
 * Change directory to PHP---Hair-Salon and type 'composer install'.
 * Change directory to the 'web' folder and type 'php -S localhost:8000'.
 * Finally enter 'localhost:8000' into your local browser and press enter.


 ## Known Bugs

 There are no known bugs.

 ## Support and contact details

 If you notice bugs or would like to contribute in any way please contact me at jaythinkshappiness@gmail.com

 ## Technologies Used

 HTML
 PHP
 Twig
 Silex
 Bootstrap
 Mysql



 ### License
 GNU GENERAL PUBLIC LICENSE Version 3
 Copyright (c) 2017 Epidocus, Jeremiah Freeman
