<?php
class A
{
    function testThis()
    {
        if (isset($this)) {
            echo '$this está definida (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this no está definida.\n";
        }
    }
}

class B
{
    function testB()
    {
       // A::testThis();
        $a= new A();
         $a->testThis();
    }
}

//Crea clase C con método estático que llame a testThis de A
class C {
    public static function callTestThis() {
        $a = new A();
        $a->testThis();
    }
}


$a = new A();
$a->testThis();

//A::testThis();

$b = new B();
$b->testB();

// B::bar();
C::callTestThis();
?>