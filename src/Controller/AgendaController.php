<?php


namespace App\Controller;

use App\Manager\AgendaManager;
use Plugo\Controller\AbstractController;
use App\Entity\Agenda;

class AgendaController extends AbstractController
{

  public function add()
  {
    return $this->renderView('main/add.php', [
      'title' => "Ajouter une date",
    ]);
  }
  
  public function details()
  {
    $id = $_GET['id'];
    $agendaManager = new AgendaManager();
    return $this->renderView('main/details.php', [
      'agenda' => $agendaManager->findOneBy(['id' => $id]),
      'title' => "Details"
    ]);
  }

  public function delete()
  {
    $id = $_GET['id'];
    $agendaManager = new AgendaManager();
    $agendaManager->destroy($id);
    return $this->redirectToRoute('home');
  }

}
