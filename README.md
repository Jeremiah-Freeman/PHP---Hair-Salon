![alt tag](sadadaadadasdasd)

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
| Client deleteAll function test | delete Stylist and Client | all deleted |
| Stylist getName test | Jesse G | match/pass |
| Stylist getId test | 500 | match/pass |
| Stylist save() test | save Object 1 | Object 1 passes |
| Stylist getAll() test | get Object 1 and Object 2 | Object 1 and 2 gotten ( passes )|
| Stylist find() test | find Object 1 and Object 2 | Object 1 found |
| Stylist setName() test | new name = Sophia | Sophia = $new_name |
| Stylist deleteAll function test | delete Clients and Stylist | all deleted |



  ## Setup / Installation Requirements

  * Open web browser.
 +* Clone this, "" repository.
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
