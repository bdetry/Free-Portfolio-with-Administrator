
PERSONAL FORTFOLIO WITH MANAGEMENT INTERFACE
Boris Detry
13/02/2018

-----------------------------------------------------------------------------------------------------------

Free and Simple to use -- Basic portfolio based on the Model/View/Controller PHP design pattern.

-----------------------------------------------------------------------------------------------------------
Instructions:

-Insert the new admin manually on your database.
-Connect your admin : index.php?c=admin

-----------------------------------------------------------------------------------------------------------

 ./conf/config.php -> SET DATABASE CONFIG
 ./conf/SQL/db_struc.sql -> The empty database

-----------------------------------------------------------------------------------------------------------

[CONTROLLERS]
[MODALS]
-----------------------------------------------------------------------------------------------------------
[CONTROLLERS]
*Admin controller
*Main Controller
*Contact Controller
*Service controller
*Realisation controller
*CV controller



/**
 * Admin controller
 * 
 * Method -> Connect admin Line ->63|
 * Method -> Show admin Line ->27|
 * Method -> Show admin Log In Line ->51|
 * Method -> __construct Line ->13|
 */

/**
 * Main Controller
 * 
 * Method -> Add link to database Line ->116|
 * Method -> Array from string - Links  Line ->185|
 * Method -> Delete link from databese Line ->90|
 * Method -> Html Head Line ->216|
 * Method -> Html foot Line ->226|
 * Method -> Main Construct Line ->15|
 * Method -> Main Show Line ->27|
 * Method -> Post Intro Line ->72|
 * Method -> Show Admin Bar Line ->62|
 * Method -> Show Info Editor for admin Line ->154|
 * Method -> Show link administrator Line ->142|
 * Method -> Show links Line ->175|
 * Method -> Show main body Line ->204|
 * Method -> Show main menu Line ->165|
 */

/**
 * Contact Controller
 *
 * Method -> Send Email Line ->61|
 * Method -> Show Bck Bottom Line ->30|
 * Method -> Show Contact Line ->14|
 * Method -> Show contact form Line ->40|
 * Method -> Show html footer Line ->94|
 * Method -> Show html head Line ->84|
 * Method -> Show main menu Line ->50|
 */

/**
 * Service controller
 *
 * Method -> Delete a service Line ->75|
 * Method -> Post a service Line ->55|
 * Method -> SHow main body Line ->92|
 * Method -> Show Services Line ->27|
 * Method -> Show admin bar Line ->104|
 * Method -> Show admin post service Line ->114|
 * Method -> Show back bottom Line ->124|
 * Method -> Show html footer Line ->154|
 * Method -> Show html header Line ->144|
 * Method -> Show main menu Line ->134|
 * Method -> __construct Line ->14|
 */

/**
 * Realisation controller
 *
 * Method -> Delete a realisation Line ->70|
 * Method -> Post a new Realisation Line ->88|
 * Method -> Show Go Back Line ->131|
 * Method -> Show Realisation Line ->26|
 * Method -> Show admin bar Line ->120|
 * Method -> Show admin post new Line ->107|
 * Method -> Show htlm head Line ->153|
 * Method -> Show html footer Line ->164|
 * Method -> Show main body Line ->57|
 * Method -> Show main menu Line ->142|
 * Method -> __construct Line ->14|
 */

/**
 * CV controller
 *
 * Method -> Delet CV Line ->97|
 * Method -> Post new CV Line ->80|
 * Method -> Show CV Line ->27|
 * Method -> Show admin bar Line ->112|
 * Method -> Show admin tab Line ->69|
 * Method -> Show back bottom Line ->122|
 * Method -> Show html footer Line ->152|
 * Method -> Show html header Line ->142|
 * Method -> Show main body Line ->56|
 * Method -> Show main menu Line ->132|
 * Method -> __construct Line ->14|
 */

-----------------------------------------------------------------------------------------------------------

[MODALS]
*Main Modal
*Admin Modal
*Realisation Modal
*Services Mod
*CV modal


/**
 * Main Modal
 * 
 * Method -> Add link (UPDATE) Line ->133|
 * Method -> Delete link (UPDATE) Line ->112|
 * Method -> Extract all info from subject Line ->26|
 * Method -> Post a new intro Line ->54|
 * Method -> __construct Line ->13|
 */

/**
 * Admin Modal
 * Method -> Make session Line ->24|
 * Method -> __construct Line ->11|
 */

/**
 * Realisation Modal
 * 
 * Method -> Delete realisations Line ->48|
 * Method -> Extract all Realisations Line ->23|
 * Method -> Post new realisation Line ->74|
 * Method -> __construct Line ->11|
 */

/**
 * Services Mod
 * Method -> Delete a service Line ->78|
 * Method -> Extract all services Line ->105|
 * Method -> Post a new Service Line ->23|
 * Method -> __construct Line ->10|
 */

/**
 * CV modal
 *
 * Method -> Delet CV info (UPDATE) Line ->85|
 * Method -> Extract CV src Line ->24|
 * Method -> Post a new cv Line ->52|
 * Method -> __construct Line ->12|
 */

 -----------------------------------------------------------------------------------------------------------