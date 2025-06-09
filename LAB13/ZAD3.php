<?php
trait A {
    public function smallTalk() {
    echo 'a';
    }
    public function bigTalk() {
    echo 'A';
    }
}
trait B {
    public function smallTalk() {
    echo 'b';
    }
    public function bigTalk() {
    echo 'B';
    }
}

class c
{
    use A, B {
        A::smallTalk insteadof B;
        A::bigTalk insteadof B;
    }
}

$c = new c();
echo $c->bigTalk();
echo $c->smallTalk();

