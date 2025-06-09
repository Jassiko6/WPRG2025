<?php
    interface Volume
    {
        function increaseVolume();
        function decreaseVolume();
    }

    interface Playable
    {
        function play();
        function stop();
    }

    class MusicPlayer implements Volume, Playable
    {
        private $isPlaying;
        private $volume;

        public function __construct()
        {
            $this->volume=5;
        }

        function increaseVolume()
        {
            if ($this->isPlaying && $this->volume < 10) {
                $this->volume++;
            }
        }
        function decreaseVolume()
        {
            if ($this->isPlaying && $this->volume > 1) {
                $this->volume--;
            }
        }

        function play()
        {
            if (!$this->isPlaying) {
                $this->isPlaying=true;
            }
        }

        function stop()
        {
            if ($this->isPlaying) {
                $this->isPlaying=false;
            }
        }

        function getVolume()
        {
            return $this->volume;
        }

        function getStatus()
        {
            return $this->isPlaying;
        }
    }
