<?php

namespace App\Tests\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertEquals;

class ProduitControllerKernelTest extends KernelTestCase
{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        //$routerService = static::getContainer()->get('router');
        //$myCustomService = static::getContainer()->get(CustomService::class);
    }
    public function testProduitRepository(): void
    {
        $kernel = self::bootKernel();

        $container = static::getContainer();
        $repo = $container->get(ProduitRepository::class);
        $produitList = $repo->findAll();
        assertEquals(10, count($produitList), "on attends 10 produits");
    }
    public function testFindByName_ProduitRepository(): void
    {
        $kernel = self::bootKernel();

        $container = static::getContainer();
        $repo = $container->get(ProduitRepository::class);
        $produitList = $repo->findByName("produit1");
        assertEquals(1, count($produitList), "on attends 1 produit");
        assertEquals(3, $produitList[0]->getPrix(), "3");
    }
}
