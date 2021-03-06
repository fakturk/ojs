<?php

namespace Ojstr\JournalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Lang
 * @ExclusionPolicy("all")
 */
class Lang {

    /**
     * @var integer
     * @Expose()
     */
    private $id;

    /**
     * @var string
     * @Expose()
     */
    private $code;

    /**
     * @var string
     * @Expose()
     */
    private $name;

    /**
     * @var boolean
     * @Expose()
     */
    private $rtl;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $articles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $journals;

    public function __construct() {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->journals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add article
     *
     * @param \Ojstr\JournalBundle\Entity\Article $article
     * @return Language
     */
    public function addArticle(\Ojstr\JournalBundle\Entity\Article $article) {
        $this->articles[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \Ojstr\JournalBundle\Entity\Article $article
     */
    public function removeArticle(\Ojstr\JournalBundle\Entity\Article $article) {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticles() {
        return $this->articles;
    }

    /**
     * Add journal
     *
     * @param \Ojstr\JournalBundle\Entity\Journal $journal
     * @return Language
     */
    public function addJournal(\Ojstr\JournalBundle\Entity\Journal $journal) {
        $this->journals[] = $journal;
        return $this;
    }

    /**
     * Remove journal
     *
     * @param \Ojstr\JournalBundle\Entity\Journal $journal
     */
    public function removeJournal(\Ojstr\JournalBundle\Entity\Journal $journal) {
        $this->journals->removeElement($journal);
    }

    /**
     * Get journals 
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJournals() {
        return $this->journals;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Lang
     */
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Lang
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set rtl
     *
     * @param boolean $rtl
     * @return Lang
     */
    public function setRtl($rtl) {
        $this->rtl = $rtl;
        return $this;
    }

    /**
     * Get rtl
     *
     * @return boolean 
     */
    public function getRtl() {
        return $this->rtl;
    }

}
