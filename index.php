<?php




use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';


$app = AppFactory::create();


$app->setBasePath('/EjercicioSlim');


$app->addErrorMiddleware(true, true, true);



$app->group('/alumno', function ($group) {


    /* 
    $group->get('/{id}', function(Request $request, Response $response){
        $response->getBody()->write('/alumno/{id}');



        return $response
        ->withHeader("Content-Type", "application/json")
    
        ->withStatus(200);


    }); */



    $group->map(["GET", "POST"], '[/]', function (Request $request, Response $response) {
        /*         $response->getBody()->write('/alumno[/]');
 */

        $response->getBody()->write('MAP');
        return $response
            ->withHeader("Content-Type", "application/json")

            ->withStatus(200);
    });
});

$app->post('/persona/{id}',  function (Request $request, Response $response, array $args) {


    $body = $request->getParsedBody();
    $file = $_FILES;

    $rta = array(
        'sucess' => true,

        'data' => 'POST',
        'files' => $file,
        'body' => $body
    );

    $arrayJson = json_encode($rta);
    $response->getBody()->write($arrayJson);

    return $response
        ->withHeader("Content-Type", "application/json")

        ->withStatus(200);
});

$app->put('/persona',  function (Request $request, Response $response, array $args) {


    return $response
        ->withHeader("Content-Type", "application/json")

        ->withStatus(200);
});

$app->delete('/persona/{id}',  function (Request $request, Response $response, array $args) {

    return $response
        ->withHeader("Content-Type", "application/json")

        ->withStatus(200);
});



/* $app->get('/persona[/]', function (Request $request, Response $response, array $args) {
    //$response->getBody()->write("Hello world!");
    $queryString = $request->getQueryParams();


    $headers = $request->getHeaders('token');



    $rta = array('sucess' => true, 
    "data" => $args,
    "query" => $queryString);
    

    $rtaJson = json_encode($rta);

    $response->getBody()->write($rtaJson);
    
    return $response
    ->withHeader("Content-Type", "application/json")

    ->withStatus(200);

});
 */



$app->get('/persona[/{id}]', function (Request $request, Response $response, array $args) {
    //$response->getBody()->write("Hello world!");
    $queryString = $request->getQueryParams();


    $headers = $request->getHeaders('token');



    $rta = array(
        'sucess' => true,
        "data" => $args,
        "query" => $queryString
    );


    $rtaJson = json_encode($rta);

    $response->getBody()->write($rtaJson);

    return $response
        ->withHeader("Content-Type", "application/json")

        ->withStatus(200);
});




$app->run();
