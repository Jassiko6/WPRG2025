<?php

class NoweAuto {
    protected string $model;
    protected float $cenaEuro;
    protected float $kursEuroPLN;

    public function __construct(string $model, float $cenaEuro, float $kursEuroPLN) {
        $this->model = $model;
        $this->cenaEuro = $cenaEuro;
        $this->kursEuroPLN = $kursEuroPLN;
    }

    public function obliczCene(): float {
        return $this->cenaEuro * $this->kursEuroPLN;
    }
}

class AutoZDodatkami extends NoweAuto {
    protected float $alarm;
    protected float $radio;
    protected float $klimatyzacja;

    public function __construct(string $model, float $cenaEuro, float $kursEuroPLN, float $alarm, float $radio, float $klimatyzacja) {
        parent::__construct($model, $cenaEuro, $kursEuroPLN);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function obliczCene(): float {
        $cenaPodstawowa = parent::obliczCene();
        return $cenaPodstawowa + $this->alarm + $this->radio + $this->klimatyzacja;
    }
}

class Ubezpieczenie extends AutoZDodatkami {
    private float $procentUbezpieczenia;
    private int $lata;

    public function __construct(string $model, float $cenaEuro, float $kursEuroPLN, float $alarm, float $radio, float $klimatyzacja, float $procentUbezpieczenia, int $lata) {
        parent::__construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja);
        $this->procentUbezpieczenia = $procentUbezpieczenia;
        $this->lata = $lata;
    }

    public function obliczCene(): float {
        $wartoscAuta = parent::obliczCene();
        $procentPoZnizce = (100 - $this->lata) / 100;
        $wartoscUbezpieczenia = $this->procentUbezpieczenia * $wartoscAuta * $procentPoZnizce;
        return $wartoscUbezpieczenia;
    }
}