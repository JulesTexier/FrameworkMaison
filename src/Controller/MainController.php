<?php
 
namespace App\Controller;

use App\Manager\AgendaManager;
use App\Entity\Agenda;
//use Plugo\Services\Foo\Bar;
use Plugo\Controller\AbstractController;
 
class MainController extends AbstractController {
 
  public function index() {
    $agendaManager = new AgendaManager();
    $criteria = [];
    return $this->renderView('main/index.php', [
      'agendas' => $agendaManager->findAll($criteria),
      'title' => 'Home',
      ]);
  }


  public function get() {
    $agendaManager = new AgendaManager();
    $strParams = [];
    !empty($_POST['search']) ? $strParams['title'] = $_POST['search']: '';
    !empty($_POST['important']) ? $strParams['important'] = $_POST['important']: '';
    !empty($_POST['date']) ? $strParams['date'] =  strtotime($_POST['date']) : '';
    !empty($_POST['limit']) ? array_push($strParams, ['limit' => $_POST['limit']]):'';
    //var_dump("array à l'entréee", $strParams);


    return $this->renderView('main/index.php', [
      'agendas' => $agendaManager->findBy($strParams),
      'title' => 'Home'
    ]);

    // return $this->renderView('main/index.php', [
    //   'agendas' => $agendaManager->findBy([
    //     'important' => $important,
    //     'title' => $search
    //   ]),
    //   'title' => 'Home'
    // ]);
  }

  public function post() {
    $agendaManager = new AgendaManager();
    $agenda = new Agenda();
    $dateTitle = $_POST['dateTitle'];
    $date = $_POST['date'];
    $details = $_POST['details'];
    $important = $_POST['important'];

    $agenda -> setTitle($dateTitle);
    $agenda -> setDatetime(strtotime($date));
    $agenda -> setDetails($details);
    $agenda-> setImportant($important);

    $agendaManager->add($agenda);


  return $this->redirectToRoute('home');
  }
    
}