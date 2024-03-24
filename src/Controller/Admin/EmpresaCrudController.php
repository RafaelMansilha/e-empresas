<?php

namespace App\Controller\Admin;

use App\Entity\Empresa;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;

class EmpresaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Empresa::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(), // Esconde o campo ID no formulário, pois é gerado automaticamente
            TextField::new('nome', 'Nome'),
            TextField::new('endereco', 'Endereço'),
            TelephoneField::new('telefone', 'Telefone')
                ->setFormTypeOptions([
                    'attr' => [
                        'pattern' => '\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}', // Exemplo: (99) 99999-9999 ou (99) 9999-9999
                        'title' => 'O número do telefone deve seguir o padrão (xx) xxxx-xxxx ou (xx) xxxxx-xxxx',
                    ],
                ])
                ->setHelp('Digite o telefone no formato (xx) xxxx-xxxx ou (xx) xxxxx-xxxx'),
            EmailField::new('email', 'Email'),
            TextField::new('cnpj', 'CNPJ')
                ->setFormTypeOptions([
                    'attr' => [
                        'pattern' => '[0-9]{2}\.[0-9]{3}\.[0-9]{3}/[0-9]{4}-[0-9]{2}', // Exemplo: 00.000.000/0000-00
                        'title' => 'O CNPJ deve seguir o padrão xx.xxx.xxx/xxxx-xx',
                    ],
                ])
                ->setHelp('Digite o CNPJ no formato xx.xxx.xxx/xxxx-xx'),
            DateTimeField::new('dataFundacao', 'Data de Fundação')->setFormat('dd/MM/yyyy HH:mm:ss')
                ->renderAsNativeWidget(true) // Use o widget nativo para seleção de data/hora
                ->setHelp('Defina a data e hora da fundação da empresa'),
        ];
    }
}
