<?php
    interface Animal {
        function makeSound();
        function eat();
    }

    class Dog implements Animal
    {
        function makeSound()
        {
            return "Woof!";
        }
        function eat()
        {
            return "The dog is eating.";
        }
    }