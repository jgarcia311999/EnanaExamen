<?php

class Enana
{
    private $nombre; #Nombre de la enana
    private $puntosVida; #Valor de la vida que posee
    private $situacion; #La enana estará 'viva', 'muerta' o 'limbo', dependiendo de sus puntos de vida. >0 = viva;
    #<0 = muerta; =0 = limbo

    /* public function __construct($a1, $a2)
    {
        #El constructor tiene tan solo 2 parámetros. No añadas más.
        #Deberás de completar situación dependiendo de puntosVida.
        $this->nombre = $a1;
        $this->puntosVida = $a2;
        $this->situacion = "muerta";
    } */

    public function __construct($a1, $a2)
{
    # El constructor tiene tan solo 2 parámetros. No añadas más.
    # Deberás de completar situación dependiendo de puntosVida.
    $this->nombre = $a1;
    $this->puntosVida = $a2;

    if ($a2 > 0) {
        $this->situacion = "viva";
    } elseif ($a2 < 0) {
        $this->situacion = "muerta";
    } else {
        $this->situacion = "limbo";
    }
}


    /* public function heridaLeve()
    {
        #Se le quitan 10 puntos de vida a la Enana y además se cambia el valor de situacion (si fuera necesario)
        $this->puntosVida -= 10;
    } */

    public function heridaLeve() {
        # Se le quitan 10 puntos de vida a la Enana
        $this->puntosVida -= 10;
    
        # Se actualiza la situación si es necesario
        if ($this->puntosVida < 0) {
            $this->situacion = "muerta";
        } elseif ($this->puntosVida == 0) {
            $this->situacion = "limbo";
        }
    }


    /* public function heridaGrave()
    {
        #Se le quita toda la vida que posea hasta tener 0 puntos de vida y cambiarle la situacion a limbo
        $this->situacion = "limbo";
    } */

    public function heridaGrave()
    {
        # Se quitan todos los puntos de vida de la Enana
        $this->puntosVida = 0;

        # Se cambia la situación a limbo
        $this->situacion = "limbo";
    }


    /* public function pocima()
    {
        #Recupera 10 puntos de vida y además cambia el valor de situacion si así fuera necesario.
        #Si la Enana está en el limbo, la pocima no le afecta, seguirá en el limbo con 0 puntos de vida.
        #Solo pocimaExtra puede rescatarla del limbo.
        $this->puntosVida += 20;
    } */

    public function pocima() {
        # Si la Enana no está en el limbo, se le recuperan 10 puntos de vida
        if ($this->situacion != "limbo") {
            $this->puntosVida += 10;
        }
    
        # Se actualiza la situación si es necesario
        if ($this->puntosVida > 0) {
            $this->situacion = "viva";
        }
    }
    

    /* public function pocimaExtra()
    {
        #Única manera de devolver a la vida del limbo. Además se otorgarán 50 puntos de vida.
        #Solo afecta a enanas en el limbo.
        $this->situacion = "viva";
    } */

    public function pocimaExtra() {
        # Si la Enana está en el limbo, se le devuelve a la vida y se le otorgan 50 puntos de vida
        if ($this->situacion == "limbo") {
            $this->situacion = "viva";
            $this->puntosVida += 50;
        }
    }
    

    //Getter's & setter's
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPuntosVida()
    {
        return $this->puntosVida;
    }

    public function setPuntosVida($puntosVida): self
    {
        $this->puntosVida = $puntosVida;

        return $this;
    }

    public function getSituacion()
    {
        return $this->situacion;
    }

    public function setSituacion($situacion): self
    {
        $this->situacion = $situacion;

        return $this;
    }
}
?>