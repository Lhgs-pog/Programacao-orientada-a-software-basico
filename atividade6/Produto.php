<?php

class Produto {
    public function __construct(
        private string $nome,
        private float $preco
    ) {}

    public function getNome(): string {
        return $this->nome;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }
    
    public function setPreco(float $preco): void {
        if($preco < 0) {
            throw new InvalidArgumentException("O preço deve ser maior que 0");
        }
        $this->preco = $preco;
    }
    
}