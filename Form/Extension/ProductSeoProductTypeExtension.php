<?php

namespace Plugin\ProductSeo\Form\Extension;

use Eccube\Form\Type\Admin\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;

class ProductSeoProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('pseo_title', TextType::class, [
                'label' => '[SEO]タイトル',
                'required' => false,
                'eccube_form_options' => [
                    'auto_render' => true,
                ],
                'constraints' => [
                    new Assert\Length(['max' => 60]),
                ],
        ]);
        $builder
            ->add('pseo_description', TextType::class, [
                'label' => '[SEO]ディスクリプション',
                'required' => false,
                'eccube_form_options' => [
                    'auto_render' => true,
                ],
                'constraints' => [
                    new Assert\Length(['max' => 320]),
                ],
        ]);
    }

    public function getExtendedType()
    {
        return ProductType::class;
    }

    /**
    * Return the class of the type being extended.
    */
    public static function getExtendedTypes(): iterable
    {
      return [ProductType::class];
    }

}
