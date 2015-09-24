<?php
    require_once __DIR__ ."/../vendor/autoload.php";
    require_once __DIR__ ."/../src/job.php";

    session_start();

    if (empty($_SESSION["list_of_jobs"])){
        $SESSION["list_of_jobs"] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app){
        return $app['twig']->
        render('jobs.html.twig', array('jobs' => JobOpening::getAll()));
    });

    $app->post("/jobs", function() use ($app){
        $job = new JobOpening($_POST['name'], $_POST['title'], $_POST['job_description'], $_POST['contact_email'], $_POST['contact_phone']);
        $job->save();
        return $app['twig']->
        render('jobs.html.twig', array('jobs' => JobOpening::getAll()));

    });

    $app->post("/jobs_deleted", function() use ($app) {
        JobOpening::deleteALl();
        return $app['twig']->
        render('jobs.html.twig', array('jobs' => JobOpening::getAll()));

    });

    return $app;

 ?>
