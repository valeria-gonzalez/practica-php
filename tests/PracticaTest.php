<?php declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

final class PracticaTest extends TestCase
{
    public function testFilesExistence(): void
    {
        $this->assertFileExists('formulario.php');
        $this->assertFileExists('store.php');
        $this->assertFileExists('connection.php');
    }

    public function testForm(): void
    {
        $form = file_get_contents('formulario.php');
        $this->assertStringContainsStringIgnoringCase('action = "store.php"', $form, $message = 'No se ha definido action');
        $this->assertStringContainsStringIgnoringCase('method = "post"', $form, $message = 'No está asignado el método post');
    }

    public function testStore(): void
    {
        $form = file_get_contents('store.php');
        $this->assertStringContainsStringIgnoringCase('$_POST', $form, $message = 'No se utiliza $_POST');
        $this->assertStringContainsStringIgnoringCase('header(', $form, $message = 'No se encuenra método header()');
        $this->assertStringContainsStringIgnoringCase('Location: formulario.php', $form, $message = 'No se redirecciona hacia index.php');
        $this->assertStringContainsStringIgnoringCase('INSERT INTO', $form, $message = 'No se llama a INSERT INTO');
    }

    public function testPost(): void
    {
        $client = new Client();
        $response = $client->post('http://localhost/practica-php/store.php', [
                'form_params' => [
                    'name' => 'Prueba Nombre',
                    'email' => 'prueba@test.com',
                    'gender' => 'male',
                    'password' => 'hi',
                    'comment' => 'cool',
                    'city' => 'hi again',
                    'hire' => '0'
                ]
            ]);

        $code = $response->getStatusCode();

        $this->assertStringContainsStringIgnoringCase('Prueba Nombre', (string) $response->getBody(), $message = 'No está muestra registro creado');
    }
}
