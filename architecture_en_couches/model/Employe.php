<?php

class Employe
{

    private $noemp;
    private $nom;

    /**
     * Get the value of noemp
     */
    public function getNoemp()
    {
        return $this->noemp;
    }

    /**
     * Set the value of noemp
     *
     * @return  self
     */
    public function setNoemp($noemp)
    {
        $this->noemp = $noemp;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}
