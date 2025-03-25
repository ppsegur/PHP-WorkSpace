<?php 

/**
 *Instrucciones
*Su tarea es implementar cuentas bancarias que admitan apertura/cierre, retiros y depósitos de dinero.

*Dado que se puede acceder a las cuentas bancarias de diversas maneras 
*(internet, teléfonos móviles, cargos automáticos), el software de su banco debe permitir el acceso 
*seguro a las cuentas desde múltiples hilos/procesos (la terminología depende del lenguaje de programación) 
*en paralelo. Por ejemplo, puede haber muchos depósitos y retiros en paralelo; debe asegurarse de que no haya
* condiciones de competencia entre la lectura del saldo de la cuenta y la configuración del nuevo saldo.

*Debería ser posible cerrar una cuenta; las operaciones contra una cuenta cerrada deben fallar.

 */



 declare(strict_types=1);

 class BankAccount
 {
    public int $balance = 0;
    public bool $open = false;
     public function open()
     {
        if($this->open){
            throw new Exception('account already open');
        }
        $this->open = true;

         //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
     }
 
     public function close()
     {
        if(!$this->open){
            throw new Exception('account not open');
        }
        $this->open = false;
        $this->balance = 0;
        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
     }
 
     public function balance(): int
     {
        if(!$this->open){
            throw new Exception('account not open');
        }
            return $this->balance;
        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
     }
 
     public function deposit(int $amt)
     {
        if($amt < 0){
            throw new InvalidArgumentException('amount must be greater than 0');
        }
        if($this->open){
            $this->balance += $amt;

        }else{
            throw new Exception('account not open');
        }
         //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
     }
 
     public function withdraw(int $amt)
     {
        if($amt < 0){
            throw new InvalidArgumentException('amount must be greater than 0');
        }
        if($this->open){
            if($this->balance < $amt){
                throw new InvalidArgumentException('amount must be less than balance');
            }

            $this->balance -= $amt;
        } 
        
        else{
            throw new Exception('account not open');
        }
        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
     }
 }
 





?>