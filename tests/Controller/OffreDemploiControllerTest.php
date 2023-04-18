<?php

namespace App\Test\Controller;

use App\Entity\OffreDemploi;
use App\Repository\OffreDemploiRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OffreDemploiControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private OffreDemploiRepository $repository;
    private string $path = '/admin/offre/demploi/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(OffreDemploi::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('OffreDemploi index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'offre_demploi[title]' => 'Testing',
            'offre_demploi[experience]' => 'Testing',
            'offre_demploi[contratType]' => 'Testing',
            'offre_demploi[horaires]' => 'Testing',
            'offre_demploi[dexcription]' => 'Testing',
            'offre_demploi[mission]' => 'Testing',
            'offre_demploi[profilRecherhcer]' => 'Testing',
            'offre_demploi[posteAvantage]' => 'Testing',
            'offre_demploi[statut]' => 'Testing',
            'offre_demploi[createdAt]' => 'Testing',
        ]);

        self::assertResponseRedirects('/admin/offre/demploi/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new OffreDemploi();
        $fixture->setTitle('My Title');
        $fixture->setExperience('My Title');
        $fixture->setContratType('My Title');
        $fixture->setHoraires('My Title');
        $fixture->setDexcription('My Title');
        $fixture->setMission('My Title');
        $fixture->setProfilRecherhcer('My Title');
        $fixture->setPosteAvantage('My Title');
        $fixture->setStatut('My Title');
        $fixture->setCreatedAt('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('OffreDemploi');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new OffreDemploi();
        $fixture->setTitle('My Title');
        $fixture->setExperience('My Title');
        $fixture->setContratType('My Title');
        $fixture->setHoraires('My Title');
        $fixture->setDexcription('My Title');
        $fixture->setMission('My Title');
        $fixture->setProfilRecherhcer('My Title');
        $fixture->setPosteAvantage('My Title');
        $fixture->setStatut('My Title');
        $fixture->setCreatedAt('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'offre_demploi[title]' => 'Something New',
            'offre_demploi[experience]' => 'Something New',
            'offre_demploi[contratType]' => 'Something New',
            'offre_demploi[horaires]' => 'Something New',
            'offre_demploi[dexcription]' => 'Something New',
            'offre_demploi[mission]' => 'Something New',
            'offre_demploi[profilRecherhcer]' => 'Something New',
            'offre_demploi[posteAvantage]' => 'Something New',
            'offre_demploi[statut]' => 'Something New',
            'offre_demploi[createdAt]' => 'Something New',
        ]);

        self::assertResponseRedirects('/admin/offre/demploi/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getExperience());
        self::assertSame('Something New', $fixture[0]->getContratType());
        self::assertSame('Something New', $fixture[0]->getHoraires());
        self::assertSame('Something New', $fixture[0]->getDexcription());
        self::assertSame('Something New', $fixture[0]->getMission());
        self::assertSame('Something New', $fixture[0]->getProfilRecherhcer());
        self::assertSame('Something New', $fixture[0]->getPosteAvantage());
        self::assertSame('Something New', $fixture[0]->getStatut());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new OffreDemploi();
        $fixture->setTitle('My Title');
        $fixture->setExperience('My Title');
        $fixture->setContratType('My Title');
        $fixture->setHoraires('My Title');
        $fixture->setDexcription('My Title');
        $fixture->setMission('My Title');
        $fixture->setProfilRecherhcer('My Title');
        $fixture->setPosteAvantage('My Title');
        $fixture->setStatut('My Title');
        $fixture->setCreatedAt('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/admin/offre/demploi/');
    }
}
