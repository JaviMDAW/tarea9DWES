<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestionLibrosTest1
 *
 * @author Javier
 */
class gestionLibrosTest1 {
    //put your code here
    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

<?php
//gestionLibrosTest.php

    require_once( 'gestionLibros.php' );
    use PHPUnit\Framework\TestCase;

    class gestionLibrosTest extends TestCase
    {
        public function testConexionOK()
        {
            $o = new gestionLibros();

            $resultado = $o->conexion("localhost", "otro", "otro", "foc3");

            $this->assertNotNull($resultado);
        }

    public function testConexionKO()
    {
        $o = new gestionLibros();

        $resultado = $o->conexion("localhost", "otr", "otro", "foc3");

        $this->assertNull($resultado);
    }

    public function testConsultarAutores()
    {
        $esperado = array(["id"=> "1", "nombre"=>"Isaac", "apellidos"=>"Asimov", "nacionalidad"=>"Rusia"]);

        $o = new gestionLibros();
        $mysqli = $o->conexion("localhost", "otro", "otro", "foc3");
        $resultado = $o->consultarAutores($mysqli, 1);
        $this->assertEquals($esperado, $resultado);
    }

    public function testConsultarLibros()
    {
        $esperado = array(["id"=>"4", "titulo"=>"Un guijarro en el cielo", "f_publicacion"=>"19/01/1950", "id_autor"=>"1"],
            ["id"=>"5", "titulo"=> "Fundación", "f_publicacion"=> "01/06/1951", "id_autor"=>"1"],
            ["id"=>"6", "titulo"=> "Yo, robot", "f_publicacion"=> "02/12/1950", "id_autor"=>"1"]);

        $o = new gestionLibros();
        $mysqli = $o->conexion("localhost", "otro", "otro", "foc3");
        $resultado = $o->consultarLibros($mysqli, 1);
        $this->assertEquals($esperado, $resultado);
    }

        public function testConsultarDatosLibro()
    {
        $esperado = ["id"=>"1", "titulo"=>"La Comunidad del Anillo", "f_publicacion"=>"29/07/1954", "id_autor"=>"0"];

        $o = new gestionLibros();
        $mysqli = $o->conexion("localhost", "otro", "otro", "foc3");
        $resultado = $o->consultarDatosLibro($mysqli, 1);
        $this->assertEquals($esperado, $resultado);
    }

    public function testConsultarBorrarLibro()
    {
        $o = new gestionLibros();
        $mysqli = $o->conexion("localhost", "otro", "otro", "foc3");
        //Borrar libro 2
        $resultado = $o->borrarLibro($mysqli, 2);
        $this->assertEquals(true, $resultado);
        //Comprobar que el libro 2 ya no está
        $resultado = $o->consultarDatosLibro($mysqli, 2);
        $this->assertNull($resultado);
    }

    public function testConsultarBorrarAutor()
    {
        $o = new gestionLibros();
        $mysqli = $o->conexion("localhost", "otro", "otro", "foc3");
        //Borrar autor 2
        $resultado = $o->borrarAutor($mysqli, 2);
        $this->assertEquals(true, $resultado);
        //Comprobar que el autor 2 ya no está
        $resultado = $o->consultarAutores($mysqli, 2);
        $this->assertNull($resultado);
        //Comprobar que el autor 2 ya no tiene libros
        $resultado = $o->consultarLibros($mysqli, 2);
        $this->assertNull($resultado);
    }

}

?>
}
