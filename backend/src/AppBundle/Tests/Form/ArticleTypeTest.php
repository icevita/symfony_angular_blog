<?php

namespace AppBundle\Tests\Form;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;
use Symfony\Component\Form\Test\TypeTestCase;

class ArticleTypeTest extends TypeTestCase
{

    public function testSubmitValidData()
    {
        $formData = array(
            'title' => 'test',
            'content' => 'test content',
        );

        $form = $this->factory->create(ArticleType::class);

        $article = (new Article())
            ->setTitle($formData['title'])
            ->setContent($formData['content']);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($article, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
