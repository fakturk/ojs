<?php

namespace Ojstr\JournalBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ojstr\JournalBundle\Entity\Journal;

class LoadJournalData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $languages = $manager->getRepository('OjstrJournalBundle:Lang')->findAll();

        $journal = new Journal();
        $journal->setIssn("1300-7041");
        $journal->setMission("Mission text");
        $journal->setPeriod("2");
        $journal->setPublishStatus(0);
        $journal->setScope("Scope text");
        $journal->setSubtitle("Subtitle text");
        $journal->setTitle("Example Journal");
        $journal->setTitleAbbr("EXJ");
        $journal->setTitleTransliterated(NULL);
        $journal->setUrl("https://example.gov");
        $manager->persist($journal);

        $journal2 = new Journal();
        $journal2->setIssn("1300-7040");
        $journal2->setMission("Mission text 2");
        $journal2->setPeriod("2");
        $journal2->setPublishStatus(0);
        $journal2->setScope("Scope text 2");
        $journal2->setSubtitle("Subtitle text 2");
        $journal2->setTitle("Antother Example Journal of Example University");
        $journal2->setTitleAbbr("EXJ2");
        $journal2->setTitleTransliterated(NULL);
        $journal2->setUrl("https://example2.edu");
        $manager->persist($journal2);

        $manager->flush();
        /* @var $lang  \Ojstr\JournalBundle\Entity\Lang */
        foreach ($languages as $lang) {
            $journal->addLanguage($lang);
            $journal2->addLanguage($lang);
        }
        $manager->persist($journal);
        $manager->persist($journal2);
        $manager->flush();
        $this->addReference('ref-journal', $journal);
        $this->addReference('ref-journal2', $journal2);
    }

    public function getOrder() {
        return 8;
    }

}
