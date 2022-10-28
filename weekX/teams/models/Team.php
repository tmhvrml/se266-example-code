<?php

class Team
{

    private teamId;
    private teamName;
    private teamDivision;

    public setTeamId($theId)
    {
        $this->teamId = $theId;
    }

    public setTeamName($theName)
    {
        $this->teamName = $theName;
    }

    public setTeamDivision($theDivison)
    {
        $this->teamDivison = $theDivision;
    }


    public getTeamId()
    {
        return $this->teamId;
    }

    public getTeamName()
    {
        return $this->teamName;
    }

    public getTeamDivision()
    {
        return $this->teamDivison;
    }

}

?>