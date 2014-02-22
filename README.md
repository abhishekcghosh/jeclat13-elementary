jeclat13-elementary
===================

Source code for JECLAT '13 website, together with the source code for the first season of "Elementary", the open-to-all online treasure hunt competition.

Note:
* To run the website, manual configuration of MySQL database needs to be done. Create a database, user, password and provide the same access token inside the **module-config.php** file to make the website work.
* **SQL-Help.txt** file contains a set of SQL statements that can be copied and run directly to generate the required tables in the database.
* The **j13_general** database table must have the following two entries:
	attribname = hitcount_high, attribvalue = 0,
	attribname = hitcount_low, attribvalue = 0.
* Since **elementary** season 1 was long over, and the entire questions are included in the code, so are the answers to the puzzles :)
* Also, the **.htaccess** file provided has some entries that must be added to the websites' .htaccess file. Otherwise, Gzipped SVG image that is used will not be recognized and rendered by all browsers properly, especially Mozilla Firefox.
