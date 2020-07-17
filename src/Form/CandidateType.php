<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\JobCategory;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CandidateType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('email')
    // ->add('roles')
    ->add('password')
    ->add('isVerified')
    ->add('gender', ChoiceType::class,[
      'choices' => [
        'Female' => "Female",
        'Male' => 'Male',
        'Transgender' => 'Transgender',
      ],
    ])
    ->add('first_name')
    ->add('last_name')
    ->add('address')
    ->add('country')
    ->add('nationality')
    ->add('passport')
    ->add('passport_file')
    ->add('cv_file')
    ->add('profil_picture')
    ->add('current_location')
    ->add('birth_date')
    ->add('birth_place')
    ->add('availability')
    ->add('job_category', EntityType::class,[
      'class' => JobCategory::class,
      'choice_label' => 'category',
      'placeholder' => 'Choose an option',
    ])
    ->add('experience', ChoiceType::class,[
      'choices' => [
        '0-6 Months' => "0-6 Months",
        '6 Months - 1 Year' => '6 Months - 1 Year',
        '1-2 Years' => '1-2 Years',
        '2+ Years' => '2+ Years',
        '5+ Years' => '5+ Years',
        '10+ Years' => '10+ Years',
      ],
    ])
    ->add('short_description')
    ->add('notes_candidate')
    ->add('created_at')
    ->add('updated_at')
    ->add('deleted_at')
    ->add('files')
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Candidate::class,
    ]);
  }
}
