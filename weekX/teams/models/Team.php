<?php

class Team
{

    private $id;
    private $teamName;
    private $division;

    public setTeamId($theId)
    {
        $this->id = $theId;
    }

    public setTeamName($theName)
    {
        $this->teamName = $theName;
    }

    public setTeamDivision($theDivison)
    {
        $this->division = $theDivision;
    }


    public getTeamId()
    {
        return $this->id;
    }

    public getTeamName()
    {
        return $this->teamName;
    }

    public getTeamDivision()
    {
        return $this->division;
    }

}

?>