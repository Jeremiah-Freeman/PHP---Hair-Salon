<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";


    $app = new Silex\Application();

    $app['debug']= true;

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
    return $app['twig']->render('index.html.twig', array('all-stylists' => Stylist::getAll()));
    });

    $app->get("/stylists", function() use ($app) {
    return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });



    $app->post("/stylists", function() use ($app) {
        $new_name = new Stylist($_POST['name'] , $_POST['id']);
        $new_name->save();
        return $app['twig']->render('stylists.html.twig', array('new_stylist' => $new_name , 'stylists' => Stylist::getAll()));
    });

    $app->get("/editstylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app ['twig']-> render ('editstylist.html.twig' , array('stylist' => $stylist , 'client' => Client::getAll(), 'all_stylists' => Stylist::getAll()));
    });

    $app->post("/addnewclient" , function($id) use ($app) {
        $new_client = new Client($_POST['new_client'], $_POST['id'], $_POST['stylist_id']);
        $new_client->save();
        $stylist = Stylist::find($id);

        return $app ['twig'] -> render ('editstylist.html.twig' , array(
            'clients' => $new_client ,
            'stylist' => $stylist,
            'allclients' => Client::getAll()));
    });

    $app->post("/delete_stylists" , function() use ($app) {
        Stylist::deleteAll();

        return $app['twig']->render('stylists.html.twig' , array('stylists' => Stylist::getAll()));
    });
    return $app;
?>
