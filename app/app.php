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

    return $app['twig']->render('index.html.twig', array(
        'all-stylists' => Stylist::getAll()));
    });

    $app->get("/stylists", function() use ($app) {

    return $app['twig']->render('stylists.html.twig', array(
        'stylists' => Stylist::getAll()));
    });

    $app->post("/add/stylists", function() use ($app) {

        $new_name = new Stylist($_POST['name'] , $_POST['id']);
        $new_name->save();
        return $app['twig']->render('stylists.html.twig', array(
            'stylists' => Stylist::getAll()));
    });

    $app->get("/viewstylists/{id}", function($id) use ($app) {

        $stylist = Stylist::find($id);
        return $app ['twig']-> render ('view_stylist.html.twig' , array(
            'stylist' => $stylist,
            'clients' => $stylist->getClient()));
    });

    $app->post("/addclient" , function() use ($app) {

        $name = $_POST['newclient'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($name, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        return $app ['twig'] -> render ('view_stylist.html.twig' , array(
            'clients' => $stylist->getClient(),
            'stylist' => $stylist));

    });

    $app->get("/stylist/{id}/edit" , function($id) use ($app) {

        $current_stylist = Stylist::find($id);
        return $app ['twig'] -> render ('stylist_edit.html.twig' , array(
            'stylist' => $current_stylist));
    });

    $app->patch("/stylist/{id}", function($id) use ($app) {

        $name = $_POST['name'];
        $current_stylist = Stylist::find($id);
        $current_stylist->update($name);
        return $app ['twig'] -> render ('view_stylist.html.twig' , array(
                'stylist' => $current_stylist,
                'clients' => $current_stylist->getClient()));
    });
    $app->delete("/deletestylist/{id}" , function ($id) use ($app) {

        $current_stylist = Stylist::find($id);
        $current_stylist->delete();
        return $app ['twig']-> render('index.html.twig' , array(
            'stylist' => Stylist::getAll()));
    });


    $app->post("/delete_stylists" , function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig');
    });


    return $app;


?>
