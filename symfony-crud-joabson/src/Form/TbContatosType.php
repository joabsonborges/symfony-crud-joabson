<?php

namespace App\Form;

use App\Entity\TbContatos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TbContatosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cpf', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => 'name.not_blank',
                ])
            ])
            ->add('nome', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => 'name.not_blank',
                ])
            ])
             ->add('email', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => 'name.not_blank',
                ])
            ])
            ->add('telefone', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => 'name.not_blank',
                ])
            ])
        ;
 
        ;
        $builder->get('telefone')
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
        $builder->get('cpf')
                ->addModelTransformer(new CallbackTransformer(
                    function ($cpfInt) {
                        return $cpfInt;
                    },
                    function ($cpfInt) {
                        if(!empty($cpfInt)){
                            $number = str_replace('.','', $cpfInt);
                            $number = str_replace('-','', $number);
                            return $number;
                        }
                        return false;
                    }
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TbContatos::class,
        ]);
    }
}
