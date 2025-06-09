<?php
    trait Speed {
        public $speed;

        function increaseSpeed($speed)
        {
            $this->speed += $speed;
        }

        function decreaseSpeed($speed)
        {
            if (($this->speed - $speed) < 0) {
                $this->speed = 0;
            } else {
                $this->speed -= $speed;
            }
        }
    }

    class Car
    {
        use Speed;
        function start()
        {
            $this->speed = 0;
            $this->increaseSpeed(10);
        }

    }

    $c = new Car();
    $c->start();
echo $c->speed;
