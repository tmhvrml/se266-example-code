<?php

class Team
{

    private $id;
    private $teamName;
    private $division;

    public function setTeamId($theId)
    {
        $this->id = $theId;
    }

    public function setTeamName($theName)
    {
        $this->teamName = $theName;
    }

    public function setTeamDivision($theDivision)
    {
        $this->division = $theDivision;
    }


    public function getTeamId()
    {
        return $this->id;
    }

    public function getTeamName()
    {
        return $this->teamName;
    }

    public function getTeamDivision()
    {
        return $this->division;
    }

}

?>