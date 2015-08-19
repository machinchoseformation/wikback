<?php

namespace Manager;

class TermManager extends \W\Manager\Manager {

	/**
	 * Récupère le mot du jour actuel
	 */
	public function getCurrentWordOfTheDay()
	{
		$sql = "SELECT * FROM $this->table WHERE is_wotd = 1";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetch();
	}

	public function getRandomWord()
	{
		$sql = "SELECT * FROM $this->table 
				WHERE is_wotd = 0 
				ORDER BY RAND() LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetch();
	}

}