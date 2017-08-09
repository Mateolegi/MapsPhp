<?php 

/**
 * 	Class who manage the database connection
 *	@return the connection
 */

class Connection {
		private const dbname = "heatmap";
		private const host = "localhost";
		private const user = "root";
		private const password = "";

		public static function connect (){
			try {
				$cn = new PDO( "mysql:host=".self::host.";dbname=".self::dbname.";",self::user, self::password);
				return $cn;

			} catch (PDOException $e) {
					echo $e->getMessage();
			}
		}
}