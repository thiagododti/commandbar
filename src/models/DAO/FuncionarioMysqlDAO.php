<?php

namespace src\models\DAO;

use \core\Model;
use \src\models\Funcionario;

class FuncionarioMysqlDAO implements Funcionario
{
    
    public function buscarTodos(){
        
        $funcionarios = Funcionario::select([
            'FUNC_ID',
            'FUNC_NAME',
            'FUNC_CARG',
            'FUNC_CPF',
            'FUNC_EMAIL'
        ])->execute();
        $this->render('funclist', [
            'funcionarios' => $funcionarios
        ]);
        
    }
    
    public function buscarFuncionario($cpf){
        
        
        
    }
    
    public function inserirFuncionario(Funcionario $f){
        
    }
    
    public function atualizarFuncionario(Funcionario $f){
        
    }
    
    
    
    public function deletarFuncionario($id){
        
    }
    
    
}
