<?php

namespace App\Form;

use App\Entity\Audit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichFileType;



class AuditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name :',
                'attr' => ['placeholder' => 'Organisation name'],
            ])
            ->add('logoFile', VichFileType::class, [
                'label' => 'logo :',
            ])
            ->add('foundationDate', BirthdayType::class, [
                'label' => 'Foundation date :',
                'widget' => 'choice',
                'input' => 'timestamp',
                'format' => 'dd.MMMM.yyyy',
            ])
            ->add('mission', TextType::class, [
                'label' => 'Mission :',
            ])
            ->add('name', TextType::class, [
                'label' => 'Name :',
            ])
            ->add('website', UrlType::class, [
                'label' => 'Website :',
            ])
            ->add('place', TextType::class, [
                'label' => 'Headquarter adress :',
            ])
            ->add('city', TextType::class, [
                'label' => 'City :',
            ])
            ->add('country', CountryType::class, [
                'label' => 'Country :',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email :',
            ])
            ->add('direction', TextType::class, [
                'label' => 'Director :',
            ])
            ->add('directionArrivalYear', BirthdayType::class, [
                'label' => 'Arrival date :',
            ])
            ->add('directionProfile', CKEditorType::class, [
                'label' => 'Profile :',
                'config' => array('toolbar' => 'standard')
            ])
            ->add('transparencyOwner', RangeType::class, [
                'label' => 'Access to the owner identity :',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'rangeOwner'
            ]])
            ->add('identityOwner', TextType::class, [
                'label' => 'Owner identity :',
            ])
            ->add('identityOwnerProfile', CKEditorType::class, [
                'label' => 'Owner profile :',
                'config' => array('toolbar' => 'standard')
            ])
            ->add('transparencyAccounts', RangeType::class, [
                'label' => 'Access to the accounts :',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'rangeAccounts'
            ]])
            ->add('transparencyAccountsComment', CKEditorType::class, [
                'label' => 'Comment :',
                'config' => array('toolbar' => 'standard')
            ])
            ->add('accreditedBy', CKEditorType::class, [
                'label' => 'Accredited by :',
                'config' => array('toolbar' => 'standard')
            ])
            ->add('numberEmployee', IntegerType::class, [
                'label' => 'Number of employee :',
            ])
            ->add('numbervolunteerbyyear', IntegerType::class, [
                'label' => 'Number of volunteer by year :',
            ])
            ->add('feeExistence', ChoiceType::class, [
                'label' => 'Fee Existence :',
                'choices'  => [
                    'Yes' => true,
                    'No' => false,
                ],
            ])
            ->add('fee', MoneyType::class, [
                'label' => 'Fee :',
            ])
            ->add('servicesIncluded', CollectionType::class, [
                'label' => 'Services Included :',
                'entry_type' => TextType::class,
                'allow_add' => 'true',
                'allow_delete' => 'true',
            ])
            ->add('securitySelectionProcess', RangeType::class, [
                'label' => 'Security selection process :',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'rangeSecurity'
            ]])
            ->add('securitySelectionProcessComment', CKEditorType::class, [
                'label' => 'Comment :',
                'config' => array('toolbar' => 'standard')
            ])
            ->add('qualitySelectionProcess', RangeType::class, [
                'label' => 'Quality selection process :',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'rangeQuality'
            ]])
            ->add('qualitySelectionProcessComment', CKEditorType::class, [
                'label' => 'Comment :',
                'config' => array('toolbar' => 'standard')
            ])
            ->add('longTermeResults', RangeType::class, [
                'label' => 'Long term results :',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'rangeResults'
            ]])
            ->add('longTermeResultsComment', CKEditorType::class, [
                'label' => 'Comment :',
                'config' => array('toolbar' => 'standard')
            ])
            ->add('futurprojects', CKEditorType::class, [
                'label' => 'Futurs projects :',
                'config' => array('toolbar' => 'standard')
            ])
            ->add('relationshipLocalCommunity', RangeType::class, [
                'label' => 'Relationship with the local community : ',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'rangeRelationship'
            ]])
            ->add('relationshipLocalCommunityComment', CKEditorType::class, [
                'label' => 'Comment : ',
            ])
            ->add('localFinancialImpact', RangeType::class, [
                'label' => 'Local financial impact : ',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'rangeFinancial'
            ]])
            ->add('localFinancialImpactComment', CKEditorType::class, [
                'label' => 'Comment : ',
                'config' => array('toolbar' => 'standard')
            ])
            ->add('localEcologicalImpact', RangeType::class, [
                'label' => 'Local ecological impact : ',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'rangeEcological'
            ]])
            ->add('localEcologicalImpactComment', CKEditorType::class, [
                'label' => 'Comment : ',
                'config' => array('toolbar' => 'standard')
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Audit::class,
        ]);
    }
}
