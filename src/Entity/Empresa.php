<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpresaRepository::class)]
class Empresa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $endereco = null;

    #[ORM\Column(length: 20)]
    private ?string $telefone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 18)]
    private ?string $cnpj = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dataFundacao = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): static
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): static
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): static
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getDataFundacao(): ?\DateTimeInterface
    {
        return $this->dataFundacao;
    }

    public function setDataFundacao(?\DateTimeInterface $dataFundacao): static
    {
        $this->dataFundacao = $dataFundacao;

        return $this;
    }
}
