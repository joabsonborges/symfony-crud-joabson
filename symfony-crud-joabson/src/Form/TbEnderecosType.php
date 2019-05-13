<?php

namespace App\Form;

use App\Entity\TbEnderecos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TbEnderecosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quadra_endereco', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => 'name.not_blank',
                ])
            ])

            ->add('numero_endereco', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => 'name.not_blank',
                ])
            ])

            ->add('observacao', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => 'name.not_blank',
                ])
            ])
        ;

        $builder->get('numero_endereco')
                ->addModelTransformer(new CallbackTransformer(
                    function ($toInt) {
                        if(!empty($toInt)){
                            return str_replace('.','', $toInt);
                        }
                    },
                    function ($toFloat) {
                        if(!empty($toFloat)){
                            $number = str_replace('.','', $toFloat);
                            $number = str_replace(',','.', $number);
                            return $number;
                        }
                    }
                ))
        ;
    }
}
