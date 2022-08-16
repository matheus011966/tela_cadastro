<?php

namespace Alura;

use Stringable;

class Usuario
{
    private $nome;
    private $sobrenome;
    private $senha;
    private $tratamento;

    public function __construct(string $nome, string $senha, string $genero)
    {
        $nomesobrenome = explode( " ", $nome, 2);
        if ($nomesobrenome[0] === "")
            {
                $this-> nome = "Nome inválido";
            }
        else 
            {
                $this-> nome = $nomesobrenome[0];
            }
        if ($nomesobrenome[1] === null)
            {
                $this-> sobrenome = "Sobrenome inválido";
            }
        else
            {
                $this-> sobrenome = $nomesobrenome[1];
            }
  
        $this->senha = $senha;
        $this->tratamentosobrenome($genero, $nome );
        }

    private function tratamentosobrenome(string $genero, string $nome)
        {
        if ($genero === "M")
            {
                $this-> tratamento = preg_replace('/^(\w+)\b/', 'Sr.', $nome, 1);
            
            }
        if ($genero === "F")
            {
                $this-> tratamento = preg_replace('/^(\w+)\b/', 'Sra.', $nome, 1);
            }
        } 
    public function getSenha( ): string 
        {
            return $this-> senha; 
        }


    public function getNome( ): string
        {
            return $this ->nome;
        }

    public function getSobrenome(): string
        {
            return $this -> sobrenome;
        }

    public function gettratamento(): string
    {
        return $this -> tratamento;
    }
}


class Contato 
{
    private $email; 
    private $endereco;
    private $cep;


    public function __construct(string $email,string $endereco, string $cep)
    {
        $this -> email = $email;
        if($this ->ValidaEmail($email) !== false)
            {
                $this-> email = $email;
            }
        else
            {
                $this->email = "Email Invalido";
            }
        $this -> endereco = $endereco;
        $this -> cep = $cep;
    }
    public function getContato(): string
    {
        $posicaoarroba = strpos($this-> email, "@");

        if ($posicaoarroba === false)
            {
                return "Email incorreto encontrado";
            }
        else
            return substr($this-> email, 0, $posicaoarroba );
    }
    public function GetEmail(): string
    {
        return $this -> email;
    }
    private function ValidaEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function getEnderecocompleto(): string
    {
        $enderecocompleto = [$this-> endereco, $this->cep]; 
        return implode(" - ", $enderecocompleto);
        
    }
}   



?>