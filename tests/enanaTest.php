<?php

use PHPUnit\Framework\TestCase;

include './src/Enana.php';

class EnanaTest extends TestCase
{

    public function testCreandoEnana()
    {
        # Creación de una enana viva con 50 puntos de vida
        $enanaViva = new Enana("Gimli", 50);
        $this->assertEquals("Gimli", $enanaViva->getNombre());
        $this->assertEquals(50, $enanaViva->getPuntosVida());
        $this->assertEquals("viva", $enanaViva->getSituacion());

        # Creación de una enana muerta con 0 puntos de vida
        $enanaMuerta = new Enana("Thorin", 0);
        $this->assertEquals("Thorin", $enanaMuerta->getNombre());
        $this->assertEquals(0, $enanaMuerta->getPuntosVida());
        $this->assertEquals("limbo", $enanaMuerta->getSituacion());

        # Creación de una enana en limbo con -20 puntos de vida
        $enanaLimbo = new Enana("Fili", -20);
        $this->assertEquals("Fili", $enanaLimbo->getNombre());
        $this->assertEquals(-20, $enanaLimbo->getPuntosVida());
        $this->assertEquals("muerta", $enanaLimbo->getSituacion());
    }


    public function testHeridaLeveVive()
    {
        # Creación de una enana con 30 puntos de vida (suficientes para sobrevivir a una herida leve)
        $enana = new Enana("Dwalin", 30);

        # Aplicación de una herida leve
        $enana->heridaLeve();

        # Verificar que la enana sigue viva y tiene puntos de vida mayores que 0
        $this->assertEquals("viva", $enana->getSituacion());
        $this->assertEquals(true, $enana->getPuntosVida() > 0);
    }



    public function testHeridaLeveMuere()
    {
        # Creación de una enana con 5 puntos de vida (insuficientes para sobrevivir a una herida leve)
        $enana = new Enana("Dori", 5);

        # Aplicación de una herida leve
        $enana->heridaLeve();

        # Verificar que la enana está muerta y tiene puntos de vida menores que 0
        $this->assertEquals("muerta", $enana->getSituacion());
        $this->assertEquals(true, $enana->getPuntosVida() < 0);
    }



    public function testHeridaGrave()
    {
        # Creación de una enana viva con 30 puntos de vida
        $enana = new Enana("Ori", 30);

        # Aplicación de una herida grave
        $enana->heridaGrave();

        # Verificar que la enana tiene 0 puntos de vida y su situación es limbo
        $this->assertEquals("limbo", $enana->getSituacion());
        $this->assertEquals(0, $enana->getPuntosVida());
    }

    public function testPocimaRevive()
    {
        # Creación de una enana muerta con -5 puntos de vida
        $enana = new Enana("Bombur", -5);

        # Aplicación de la pócima
        $enana->pocima();

        # Verificar que la enana está viva y tiene puntos de vida mayores que 0
        $this->assertEquals("viva", $enana->getSituacion());
        $this->assertEquals(true, $enana->getPuntosVida() > 0);
    }



    public function testPocimaNoRevive()
    {
        # Creación de una enana en limbo con 0 puntos de vida
        $enana = new Enana("Balin", 0);

        # Aplicación de la pócima
        $enana->pocima();

        # Verificar que la vida y la situación no han cambiado
        $this->assertEquals(0, $enana->getPuntosVida());
        $this->assertEquals("limbo", $enana->getSituacion());
    }


    public function testPocimaExtraLimbo()
    {
        # Creación de una enana en limbo con 0 puntos de vida
        $enana = new Enana("Balin", 0);

        # Aplicación de la pócima extra
        $enana->pocimaExtra();

        # Verificar que la vida es 50 y la situación ha cambiado a viva
        $this->assertEquals(50, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());

    }

}
?>